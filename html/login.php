<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../funcoes/login_processamento.php'; ?>

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

    <p>Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
</div>

</body>
</html>