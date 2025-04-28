<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<?php include '../funcoes/cadastro_processamento.php'; ?>

<div class="container">
    <?php include 'cabecalho.php'; ?>
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
    <?php include 'rodape.php'; ?>
</div>
</body>
</html>
