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
// Verifica se o formulário foi enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Dados recebidos (POST):</h2>";

    // Proteção básica com htmlspecialchars
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);

    echo "Nome: $nome<br>";
    echo "Email: $email<br>";
    echo "Mensagem: $mensagem<br>";

    // Verifica se categorias foram selecionadas
    if (isset($_POST["categorias"])) {
        echo "Categorias selecionadas:<ul>";
        foreach ($_POST["categorias"] as $categoria) {
            echo "<li>" . htmlspecialchars($categoria) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhuma categoria selecionada.<br>";
    }
}

// Verifica se a busca foi feita via GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["busca"])) {
    echo "<h2>Resultado da busca (GET):</h2>";

    $busca = htmlspecialchars($_GET["busca"]);
    echo "Você buscou por: <strong>$busca</strong><br>";

    // Aqui você poderia fazer uma busca real no banco ou em um array
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
