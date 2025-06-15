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
// Inclua o arquivo de conexão com o banco de dados
require 'conexao.php'; // Certifique-se de que o caminho para seu 'conexao.php' está correto

$mensagem_processamento = ''; // Variável para armazenar mensagens de sucesso/erro do banco

// Verifica se o formulário foi enviado por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<h2>Dados recebidos (POST):</h2>";

    // Proteção básica com htmlspecialchars para exibição
    $nome = htmlspecialchars($_POST["nome"]);
    $email = htmlspecialchars($_POST["email"]);
    $mensagem = htmlspecialchars($_POST["mensagem"]);
    $categorias_selecionadas_nomes = $_POST['categorias'] ?? []; // Pega as categorias selecionadas

    echo "Nome: " . $nome . "<br>";
    echo "Email: " . $email . "<br>";
    echo "Mensagem: " . $mensagem . "<br>";

    // Exibe as categorias selecionadas no HTML
    if (!empty($categorias_selecionadas_nomes)) {
        echo "Categorias selecionadas:<ul>";
        foreach ($categorias_selecionadas_nomes as $categoria_nome) {
            echo "<li>" . htmlspecialchars($categoria_nome) . "</li>";
        }
        echo "</ul>";
    } else {
        echo "Nenhuma categoria selecionada.<br>";
    }

    // --- Lógica de inserção no banco de dados ---
    try {
        // 1. Insere os dados do usuário na tabela 'usuarios'
        $stmt_usuario = $pdo->prepare("INSERT INTO usuarios (nome, email, mensagem) VALUES (:nome, :email, :mensagem)");
        $stmt_usuario->execute([
            ':nome' => $_POST["nome"], // Usa o valor original para inserção no banco
            ':email' => $_POST["email"],
            ':mensagem' => $_POST["mensagem"]
        ]);

        // Pega o ID do usuário recém-inserido
        $usuario_id = $pdo->lastInsertId();

        // 2. Insere as categorias selecionadas na tabela de junção 'usuarios_categorias'
        if (!empty($categorias_selecionadas_nomes)) {
            foreach ($categorias_selecionadas_nomes as $categoria_nome) {
                // Primeiro, busca o ID da categoria pelo nome
                $stmt_categoria = $pdo->prepare("SELECT id FROM categorias WHERE nome = :nome");
                $stmt_categoria->execute([':nome' => $categoria_nome]);
                $categoria = $stmt_categoria->fetch();

                if ($categoria) {
                    $categoria_id = $categoria['id'];

                    // Insere na tabela de junção (usuario_id e categoria_id)
                    $stmt_usuario_categoria = $pdo->prepare("INSERT INTO usuarios_categorias (usuario_id, categoria_id) VALUES (:usuario_id, :categoria_id)");
                    $stmt_usuario_categoria->execute([
                        ':usuario_id' => $usuario_id,
                        ':categoria_id' => $categoria_id
                    ]);
                }
            }
        }
        $mensagem_processamento = '<p style="color: green;">Dados enviados e salvos no banco de dados com sucesso!</p>';

    } catch (PDOException $e) {
        // Se o erro for de violação de UNIQUE (ex: email já cadastrado), você pode personalizar a mensagem
        if ($e->getCode() == '23505') { // Código de erro para violação de restrição UNIQUE no PostgreSQL
            $mensagem_processamento = '<p style="color: red;">Erro: Este email já está cadastrado. Por favor, use outro.</p>';
        } else {
            $mensagem_processamento = '<p style="color: red;">Erro ao salvar dados no banco: ' . $e->getMessage() . '</p>';
        }
    }
    // --- Fim da lógica de inserção ---

    echo $mensagem_processamento; // Exibe a mensagem de sucesso ou erro do banco

}

// Verifica se a busca foi feita via GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["busca"])) {
    echo "<h2>Resultado da busca (GET):</h2>";

    $busca = htmlspecialchars($_GET["busca"]);
    echo "Você buscou por: <strong>" . $busca . "</strong><br>";

    // Exemplo de busca no banco para usuários/contatos
    try {
        // Ajuste a consulta conforme as colunas da sua tabela 'usuarios'
        $stmt_busca = $pdo->prepare("SELECT id, nome, email FROM usuarios WHERE nome ILIKE :busca OR email ILIKE :busca OR mensagem ILIKE :busca");
        $stmt_busca->execute([':busca' => '%' . $busca . '%']);
        $resultados = $stmt_busca->fetchAll();

        if ($resultados) {
            echo "<h3>Usuários/Contatos encontrados:</h3><ul>";
            foreach ($resultados as $usuario) {
                echo "<li>ID: " . htmlspecialchars($usuario['id']) . ", Nome: " . htmlspecialchars($usuario['nome']) . ", Email: " . htmlspecialchars($usuario['email']) . "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>Nenhum resultado encontrado para '" . $busca . "'.</p>";
        }
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erro na busca: " . $e->getMessage() . "</p>";
    }
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
