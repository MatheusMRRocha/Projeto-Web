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
        <label>Nome de Usuário:</label>
        <input type="text" name="login" required>

        <label>Idade:</label>
        <input type="number" name="idade" min="10" max="120" required>

        <label>Email:</label>
        <input type="email" name="email" required>

        <label>Senha:</label>
        <input type="password" name="senha" required>

        <fieldset style="margin-top: 20px;">
            <legend><strong>Deseja receber notificações por email?</strong></legend>
            <label><input type="radio" name="notificacoes" value="sim"> Sim</label>
            <label><input type="radio" name="notificacoes" value="nao" checked> Não</label>
        </fieldset><br>

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

