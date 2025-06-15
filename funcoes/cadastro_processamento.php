<?php

require '../conexao_com_banco/conexao.php';


function redirectWithError($message) {
    // Codifica a mensagem para que ela seja segura na URL.
    header("Location: ../html/cadastro.php?error=" . urlencode($message));
    exit(); // É crucial usar exit() após um header() para parar a execução do script.
}


function redirectWithSuccess($message) {
    // Codifica a mensagem para que ela seja segura na URL.
    header("Location: ../html/cadastro.php?success=" . urlencode($message));
    exit(); // É crucial usar exit() após um header() para parar a execução do script.
}

// --- Início do Processamento do Formulário ---


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nome = trim($_POST['nome'] ?? '');
    $idade = (int)($_POST['idade'] ?? 0); // Converte a idade para inteiro.
    $email = trim($_POST['email'] ?? '');
    $senha_plana = $_POST['senha'] ?? ''; // Senha em texto puro, antes de ser hashed.
    $notificacoes = $_POST['notificacoes'] ?? 'nao'; // Padrão 'nao' se nenhum rádio for selecionado.
    // As categorias são um array, então coletamos todas as selecionadas.
    $categorias_selecionadas_nomes = $_POST['categorias'] ?? [];

    // 2. Realiza validações básicas nos dados.
    // Se alguma validação falhar, redirecionamos imediatamente com uma mensagem de erro.
    if (empty($nome) || empty($email) || empty($senha_plana)) {
        redirectWithError("Nome, Email e Senha são campos obrigatórios e não podem estar vazios.");
    }
    // Validação de formato de email.
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        redirectWithError("Por favor, insira um formato de email válido.");
    }
    // Validação da faixa etária.
    if ($idade < 10 || $idade > 120) {
        redirectWithError("Idade inválida. A idade deve estar entre 10 e 120 anos.");
    }
    // Validação do comprimento da senha (exemplo: mínimo de 6 caracteres).
    if (strlen($senha_plana) < 6) {
        redirectWithError("A senha deve ter no mínimo 6 caracteres.");
    }

    
    $senha_hash = password_hash($senha_plana, PASSWORD_DEFAULT);

    
    try {
        $pdo->beginTransaction();

        // 4.1. Verifica se o email já está cadastrado na tabela 'usuarios'.
        $stmt_check_email = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $stmt_check_email->execute([':email' => $email]);
        if ($stmt_check_email->fetchColumn() > 0) {
            // Se o email já existe, desfaz a transação (embora nenhuma operação tenha sido feita ainda)
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

        
        $usuario_id = $pdo->lastInsertId();

        // 4.3. Processa e insere as categorias de interesse do usuário na tabela de junção 'usuarios_categorias'.
        if (!empty($categorias_selecionadas_nomes)) {
            foreach ($categorias_selecionadas_nomes as $categoria_nome) {
                // Primeiro, busca o ID da categoria na tabela 'categorias' pelo seu nome.
                $stmt_categoria_id = $pdo->prepare("SELECT id FROM categorias WHERE nome = :nome");
                $stmt_categoria_id->execute([':nome' => $categoria_nome]);
                $categoria = $stmt_categoria_id->fetch();

                if ($categoria) {
                    $categoria_id = $categoria['id'];
                    // Se a categoria existe, insere a relação na tabela de junção.
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

       
        $pdo->commit();
        redirectWithSuccess("Cadastro realizado com sucesso! Você já pode fazer login.");

    } catch (PDOException $e) {
        
        $pdo->rollBack();

       
        error_log("Erro no cadastro: " . $e->getMessage() . " - SQLState: " . $e->getCode());

        
        if ($e->getCode() == '23505') {
            redirectWithError("Este email já está cadastrado. Por favor, use outro email.");
        } else {
            // Mensagem genérica para outros tipos de erros de banco de dados.
            redirectWithError("Ocorreu um erro inesperado ao tentar cadastrar. Por favor, tente novamente mais tarde.");
        }
    }
} else {
    // Se o script for acessado diretamente (não via POST), redireciona com erro.
    redirectWithError("Acesso inválido ao processamento de cadastro. Por favor, use o formulário.");
}
?>
