<?php
session_start(); // Inicia a sessão PHP no início do script

// Inclui o arquivo de conexão com o banco de dados.
require '../conexao_com_banco/conexao.php'; // Ajuste o caminho conforme necessário

/**
 * Redireciona o usuário para a página de login com uma mensagem de erro.
 * @param string $message A mensagem de erro a ser exibida.
 */
function redirectLoginWithError($message) {
    header("Location: ../html/login.php?error=" . urlencode($message));
    exit();
}

/**
 * Redireciona o usuário para uma página de sucesso após o login.
 * @param string $page O caminho para a página de sucesso (ex: 'dashboard.php').
 */
function redirectLoginSuccess($page) {
    header("Location: ../html/" . $page); // Redireciona para a página do usuário logado
    exit();
}

// Verifica se a requisição HTTP foi feita usando o método POST.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Coleta e sanitiza os dados do formulário de login.
    $login_input = trim($_POST['login_input'] ?? ''); // Pode ser email ou nome de usuário
    $senha_digitada = $_POST['senha'] ?? '';

    // 2. Validação básica de campos vazios.
    if (empty($login_input) || empty($senha_digitada)) {
        redirectLoginWithError("Por favor, preencha todos os campos.");
    }

    // 3. Busca o usuário no banco de dados por nome de usuário OU email.
    try {
        // Prepara a consulta SQL para buscar o usuário pelo nome OU email.
        $stmt = $pdo->prepare("SELECT id, nome, email, senha FROM usuarios WHERE nome = :login_input OR email = :login_input LIMIT 1");
        $stmt->execute([':login_input' => $login_input]);
        $usuario = $stmt->fetch(); // Tenta buscar o usuário

        // 4. Verifica se o usuário foi encontrado e se a senha está correta.
        if ($usuario && password_verify($senha_digitada, $usuario['senha'])) {
            // Login bem-sucedido!
            // Armazena informações do usuário na sessão.
            $_SESSION['user_id'] = $usuario['id'];
            $_SESSION['user_name'] = $usuario['nome'];
            $_SESSION['user_email'] = $usuario['email'];
            $_SESSION['logged_in'] = true; // Flag para indicar que o usuário está logado

            // Redireciona para a página do dashboard/bem-vindo.
            redirectLoginSuccess('dashboard.php'); // Redireciona para sua página de "bem-vindo"

        } else {
            // Usuário não encontrado ou senha incorreta.
            redirectLoginWithError("Credenciais inválidas. Verifique seu email/nome de usuário e senha.");
        }

    } catch (PDOException $e) {
        // Em caso de erro no banco de dados durante o login.
        error_log("Erro de login no banco de dados: " . $e->getMessage() . " - SQLState: " . $e->getCode());
        redirectLoginWithError("Ocorreu um erro ao tentar fazer login. Por favor, tente novamente mais tarde.");
    }

} else {
    // Se o script for acessado diretamente (não via POST), redireciona com erro.
    redirectLoginWithError("Acesso inválido ao processamento de login. Por favor, use o formulário de login.");
}
?>
