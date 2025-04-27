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
            header('Location: index.php'); // Redireciona para sua página inicial
            exit();
        }
    }
    $error = 'Login ou senha incorretos!';
}
?>

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Login</h2>
    <form method="POST" action="">
        <label>Login:</label>
        <input type="text" name="login" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Entrar</button>
    </form>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <p>Não tem conta? <a href="register.php">Cadastre-se aqui</a></p>
</div>
