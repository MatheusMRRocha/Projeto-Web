<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="../css/style.css"> </head>
<body>

<div class="container">
    <?php include 'cabecalho.php'; ?> <h2>Login de Usuário</h2>

    <form method="POST" action="../funcoes/login_processamento.php">
        <label for="login_input">Email ou Nome de Usuário:</label>
        <input type="text" id="login_input" name="login_input" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit" style="
            background-color: #007bff; /* Blue */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        ">Entrar</button>
    </form>

    <?php
    // Exibe mensagens de sucesso ou erro que vêm via parâmetros GET do script de processamento
    if (isset($_GET['success'])) {
        echo '<p class="success" style="color: green; font-weight: bold; margin-top: 20px;">' . htmlspecialchars($_GET['success']) . '</p>';
    }
    if (isset($_GET['error'])) {
        echo '<p class="error" style="color: red; font-weight: bold; margin-top: 20px;">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>

    <p style="margin-top: 20px;">Não tem conta? <a href="cadastro.php" style="color: #007bff; text-decoration: none;">Cadastre-se aqui</a></p>
    <?php include 'rodape.php'; ?> </div>
</body>
</html>
