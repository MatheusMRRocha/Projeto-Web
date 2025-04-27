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

<link rel="stylesheet" href="style.css">

<div class="container">
    <h2>Cadastro</h2>
    <form method="POST" action="">
        <label>Login:</label>
        <input type="text" name="login" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <button type="submit">Cadastrar</button>
    </form>

    <?php if ($error): ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?php echo $success; ?></p>
    <?php endif; ?>

    <p>Já tem conta? <a href="login.php">Voltar para o login</a></p>
</div>
