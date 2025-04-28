<?php
session_start();

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [];
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $senha = $_POST['senha'];

    foreach ($_SESSION['users'] as $user) {
        if ($user['login'] == $login && $user['senha'] == $senha) {
            $_SESSION['logged_in'] = true;
            $success = 'Login realizado com sucesso!';
            header('Location: ../index.php'); // Redireciona para sua página inicial
            exit();
        }
    }
    $error = 'Login ou senha incorretos!';
}
?>