<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login de Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <?php include 'cabecalho.php'; ?>

    <div class="centralizar_Conteudos">
        <div class="caixa">
            <h1>Login de Usuário</h1>

            <form method="POST" action="../funcoes/login_processamento.php">
                <label for="login_input">Email ou Nome de Usuário:</label>
                <input type="text" id="login_input" name="login_input" required>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>

                <button type="submit">Entrar</button>
            </form>

            <?php
            if (isset($_GET['success'])) {
                echo '<p class="success">' . htmlspecialchars($_GET['success']) . '</p>';
            }
            if (isset($_GET['error'])) {
                echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
            }
            ?>

            <p style="text-align: center; margin-top: 20px;">Não tem conta? <a href="cadastro.php">Cadastre-se aqui</a></p>
        </div>
    </div>

    <?php include 'rodape.php'; ?>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has('success')) {
            setTimeout(() => {
                window.location.href = '../index/index.php';
            }, 1500); // Redireciona após 1.5 segundos
        }
    </script>
</div>
</body>
</html>
