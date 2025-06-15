<?php
session_start();

$_SESSION = array();

// Se a sessão for controlada por cookies, exclui o cookie de sessão também.
// Isso irá destruir a sessão, e não apenas os dados da sessão!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// destrói a sessão.
session_destroy();

// Redireciona o usuário para a página de login com uma mensagem de sucesso.
header('Location: ../html/login.php?success=' . urlencode('Você foi desconectado com sucesso.'));
exit();
?>