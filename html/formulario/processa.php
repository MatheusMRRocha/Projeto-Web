<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado do Formulário</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>Resultado</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Recebendo dados via POST
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $mensagem = $_POST['mensagem'] ?? '';

            echo "<h2>Dados Recebidos via POST:</h2>";
            echo "<p><strong>Nome:</strong> " . htmlspecialchars($nome) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Mensagem:</strong> " . nl2br(htmlspecialchars($mensagem)) . "</p>";

        } elseif ($_SERVER["REQUEST_METHOD"] == "GET") {
            // Recebendo dados via GET
            $busca = $_GET['busca'] ?? '';

            echo "<h2>Dados Recebidos via GET:</h2>";
            echo "<p><strong>Busca:</strong> " . htmlspecialchars($busca) . "</p>";
        }
        ?>

        <div style="text-align: center; margin-top: 30px;">
            <a href="../../index.php">
                <button>Voltar para a Home</button>
            </a>
        </div>

    </div>

</body>
</html>
