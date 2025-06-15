<?php
session_start(); // Inicia a sessão para acessar os dados do usuário

// Verifica se o usuário está logado. Se não, redireciona para a página de login.
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: login.php?error=' . urlencode('Você precisa fazer login para acessar esta página.'));
    exit();
}

$nome_usuario = htmlspecialchars($_SESSION['user_name']); // Pega o nome do usuário da sessão
$email_usuario = htmlspecialchars($_SESSION['user_email']); // Pega o email do usuário da sessão
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Usuário</title>
    <link rel="stylesheet" href="../css/style.css"> </head>
<body>

<div class="container">
    <?php include 'cabecalho.php'; ?> <h2>Bem-vindo, <?php echo $nome_usuario; ?>!</h2>

    <p>Seu login foi bem-sucedido. Aqui estão algumas de suas informações:</p>
    <ul>
        <li>**Nome de Usuário:** <?php echo $nome_usuario; ?></li>
        <li>**Email:** <?php echo $email_usuario; ?></li>
        <li>**ID do Usuário:** <?php echo htmlspecialchars($_SESSION['user_id']); ?></li>
    </ul>

    <p style="margin-top: 30px;">
        <a href="minhas_categorias.php" style="color: #007bff; text-decoration: none;">Ver minhas categorias de interesse</a> |
        <a href="../funcoes/logout.php" style="color: #dc3545; text-decoration: none;">Sair (Logout)</a>
    </p>

    <?php include 'rodape.php'; ?> </div>
</body>
</html>