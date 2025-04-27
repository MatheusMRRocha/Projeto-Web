<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['login'] == $login) {
            $error = 'Usuário já cadastrado!';
            break;
        }
    }

    if ($error == '') {
        $_SESSION['users'][] = [
            'login' => $login,
            'senha' => $senha
        ];
        $success = 'Cadastro realizado com sucesso! <a href="login.php">Faça login</a>';
    }
}
?>