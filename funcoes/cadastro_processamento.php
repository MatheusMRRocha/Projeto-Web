<?php
// Inclui o arquivo de conexão com o banco de dados.
// O caminho '../conexao_com_banco/conexao.php' assume que este arquivo PHP está em 'funcoes/',
// e 'conexao.php' está dentro de uma pasta 'conexao_com_banco' no diretório raiz do seu projeto.
require '../conexao_com_banco/conexao.php';

// --- Funções Auxiliares para Redirecionamento e Feedback ---
// Estas funções são usadas para redirecionar o usuário de volta ao formulário de cadastro,
// passando mensagens de sucesso ou erro via URL (parâmetros GET).

/**
 * Redireciona o usuário para a página de cadastro com uma mensagem de erro.
 * @param string $message A mensagem de erro a ser exibida.
 */
function redirectWithError($message) {
    // Codifica a mensagem para que ela seja segura para ser incluída na URL.
    header("Location: ../html/cadastro.php?error=" . urlencode($message));
    exit(); // É crucial usar exit() após um header() para parar a execução do script.
}

/**
 * Redireciona o usuário para a página de cadastro com uma mensagem de sucesso.
 * @param string $message A mensagem de sucesso a ser exibida.
 */
function redirectWithSuccess($message) {
    // Codifica a mensagem para que ela seja segura para ser incluída na URL.
    header("Location: ../html/cadastro.php?success=" . urlencode($message));
    exit(); // É crucial usar exit() após um header() para parar a execução do script.
}

// --- Início do Processamento do Formulário ---

// Verifica se a requisição HTTP foi feita usando o método POST.
// Isso impede que o script processe dados se for acessado diretamente sem um formulário.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Coleta e sanitiza os dados recebidos do formulário.
    // 'trim()' remove espaços em branco no início e no fim.
    // '?? ''' (operador null coalescing) define um valor padrão de string vazia
    // caso a chave não exista no $_POST, evitando avisos 'Undefined array key'.
    $nome = trim($_POST['nome'] ?? '');
    $idade = (int)($_POST['idade'] ?? 0); // Converte a idade para inteiro.
    $email = trim($_POST['email'] ?? '');
    $senha_plana = $_POST['senha'] ?? ''; // Senha em texto puro ANTES de ser hashed.
    $notificacoes = $_POST['notificacoes'] ?? 'nao'; // Padrão 'nao' se nenhum rádio for selecionado.
    // As categorias são enviadas como um array de nomes (valores dos checkboxes).
    $categorias_selecionadas_nomes = $_POST['categorias'] ?? [];

    // 2. Realiza validações básicas nos dados.
    // Se alguma validação falhar, redirecionamos imediatamente com uma mensagem de erro.
    if (empty($nome) || empty($email) || empty($senha_plana)) {
        redirectWithError("Nome, Email e Senha são campos obrigatórios e não podem estar vazios.");
    }
    // Validação de formato de email usando filter_var.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirectWithError("Por favor, insira um formato de email válido.");
    }
    // Validação da faixa etária.
    if ($idade < 10 || $idade > 120) {
        redirectWithError("Idade inválida. A idade deve estar entre 10 e 120 anos.");
    }
    // Validação do comprimento mínimo da senha (exemplo: 6 caracteres).
    if (strlen($senha_plana) < 6) {
        redirectWithError("A senha deve ter no mínimo 6 caracteres.");
    }

    // 3. Gera o hash da senha.
    // É CRÍTICO SEMPRE armazenar hashes de senhas no banco de dados, NUNCA a senha em texto puro.
    // password_hash() usa um algoritmo seguro e adiciona um "salt" automaticamente.
    $senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

    // 4. Inicia uma transação no banco de dados.
    // As transações são fundamentais para garantir a integridade dos dados:
    // Todas as operações dentro do bloco 'try' (inserção do usuário e das categorias)
    // devem ser bem-sucedidas para que as mudanças sejam salvas (commit).
    // Se qualquer parte falhar, todas as mudanças são desfeitas (rollback),
    // deixando o banco de dados em um estado consistente, sem dados incompletos.
    try {
        $pdo->beginTransaction();

        // 4.1. Verifica se o email já está cadastrado na tabela 'usuarios'.
        // Isso evita duplicatas e dá um feedback específico ao usuário.
        $stmt_check_email = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $stmt_check_email->execute([':email' => $email]);
        if ($stmt_check_email->fetchColumn() > 0) {
            // Se o email já existe, desfaz qualquer operação que porventura tenha sido iniciada
            // e redireciona com uma mensagem de erro específica.
            $pdo->rollBack();
            redirectWithError("Este email já está cadastrado. Por favor, use outro email.");
        }

        // 4.2. Insere os dados do novo usuário na tabela 'usuarios'.
        $stmt_usuario = $pdo->prepare("
            INSERT INTO usuarios (nome, idade, email, senha, notificacoes)
            VALUES (:nome, :idade, :email, :senha, :notificacoes)
        ");
        $stmt_usuario->execute([
            ':nome' => $nome,
            ':idade' => $idade,
            ':email' => $email,
            ':senha' => $senha_hash,
            ':notificacoes' => $notificacoes
        ]);

        // Pega o ID do usuário recém-inserido.
        // É essencial ter este ID para poder associar as categorias a este usuário na tabela de junção.
        $usuario_id = $pdo->lastInsertId();

        // 4.3. Processa e insere as categorias de interesse do usuário na tabela de junção 'usuarios_categorias'.
        if (!empty($categorias_selecionadas_nomes)) {
            foreach ($categorias_selecionadas_nomes as $categoria_nome) {
                // Primeiro, busca o ID da categoria na tabela 'categorias' pelo seu nome.
                // Isso garante que estamos usando IDs válidos do banco de dados.
                $stmt_categoria_id = $pdo->prepare("SELECT id FROM categorias WHERE nome = :nome");
                $stmt_categoria_id->execute([':nome' => $categoria_nome]);
                $categoria = $stmt_categoria_id->fetch();

                if ($categoria) {
                    $categoria_id = $categoria['id'];
                    // Se a categoria existe, insere a relação (usuario_id e categoria_id) na tabela de junção.
                    $stmt_insert_categoria_usuario = $pdo->prepare("
                        INSERT INTO usuarios_categorias (usuario_id, categoria_id)
                        VALUES (:usuario_id, :categoria_id)
                    ");
                    $stmt_insert_categoria_usuario->execute([
                        ':usuario_id' => $usuario_id,
                        ':categoria_id' => $categoria_id
                    ]);
                }
                // Se uma categoria selecionada no formulário não for encontrada na sua tabela 'categorias'
                // (por exemplo, um valor inválido foi manipulado no HTML), ela será simplesmente ignorada aqui.
                // Você pode adicionar um log de erro ou uma mensagem específica se precisar monitorar isso.
            }
        }

        // 5. Confirma a transação.
        // Se todas as operações foram bem-sucedidas no bloco 'try', as mudanças são salvas permanentemente no banco.
        $pdo->commit();
        redirectWithSuccess("Cadastro realizado com sucesso! Agora você pode fazer login.");

    } catch (PDOException $e) {
        // 6. Em caso de qualquer erro (PDOException) no bloco 'try', a transação é desfeita.
        $pdo->rollBack();

        // Para depuração: Registra o erro completo no log de erros do PHP.
        // IMPORTANTE: REMOVA/COMENTE ESTA LINHA EM AMBIENTE DE PRODUÇÃO para evitar exposição de dados sensíveis.
        error_log("Erro no cadastro: " . $e->getMessage() . " - SQLState: " . $e->getCode());

        // Fornece uma mensagem de erro mais amigável para o usuário no navegador.
        // Verifica o código de erro específico para violação de restrição UNIQUE no PostgreSQL (SQLSTATE 23505).
        if ($e->getCode() == '23505') {
            redirectWithError("Este email já está cadastrado. Por favor, use outro email.");
        } else {
            // Mensagem genérica para outros tipos de erros de banco de dados.
            redirectWithError("Ocorreu um erro inesperado ao tentar cadastrar. Por favor, tente novamente mais tarde.");
        }
    }
} else {
    // Se o script for acessado diretamente (não via POST de um formulário), redireciona com um erro.
    redirectWithError("Acesso inválido ao processamento de cadastro. Por favor, use o formulário de cadastro.");
}
