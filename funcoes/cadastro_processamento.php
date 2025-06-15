<?php
// Inclui o arquivo de conexão com o banco de dados.
require '../conexao_com_banco/conexao.php';

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

// Verifica se a requisição HTTP foi feita usando o método POST.
// Isso impede que o script processe dados se for acessado diretamente sem um formulário.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Coleta e sanitiza os dados recebidos do formulário.
    // caso a chave não exista no $_POST, evitando avisos 'Undefined array key'.
    $nome = trim($_POST['nome'] ?? '');
    $idade = (int)($_POST['idade'] ?? 0);
    $email = trim($_POST['email'] ?? '');
    $senha_plana = $_POST['senha'] ?? ''; // Senha em texto puro ANTES de ser hashed.
    $notificacoes = $_POST['notificacoes'] ?? 'nao'; // Padrão 'nao' se nenhum rádio for selecionado.
    // As categorias são enviadas como um array de nomes (valores dos checkboxes).
    $categorias_selecionadas_nomes = $_POST['categorias'] ?? [];

    // 2. Realiza validações básicas nos dados.
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
    $senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

    // 4. Inicia uma transação no banco de dados.
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
            }
        }

        // 5. Confirma a transação.
        $pdo->commit();
        redirectWithSuccess("Cadastro realizado com sucesso! Agora você pode fazer login.");

    } catch (PDOException $e) {
        // 6. Em caso de qualquer erro (PDOException) no bloco 'try', a transação é desfeita.
        $pdo->rollBack();

        // Para depuração: Registra o erro completo no log de erros do PHP.
        error_log("Erro no cadastro: " . $e->getMessage() . " - SQLState: " . $e->getCode());

        // Fornece uma mensagem de erro.
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
