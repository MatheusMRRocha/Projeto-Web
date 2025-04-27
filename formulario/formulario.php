<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Formulário de Contato</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="formulario.js"></script> <!-- Aqui importamos o JS -->
</head>
<body>

    <div class="container">
        <h1>Formulário de Contato</h1>

        <!-- Formulário usando POST -->
        <form id="formContato" action="processa.php" method="post">
            <label for="nome">Nome:</label><br>
            <input type="text" id="nome" name="nome" required><br><br>

            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>

            <label for="mensagem">Mensagem:</label><br>
            <textarea id="mensagem" name="mensagem" required></textarea><br><br>

            <button type="submit">Enviar</button>
        </form>

        <div id="mensagemUsuario" style="margin-top:20px; font-weight:bold;"></div>

        <hr>

        <!-- Formulário usando GET -->
        <h2>Buscar informações</h2>
        <form id="formBusca" action="processa.php" method="get">
            <label for="busca">Digite uma palavra para busca:</label><br>
            <input type="text" id="busca" name="busca" required><br><br>

            <button type="submit">Pesquisar</button>
        </form>

        <div id="mensagemBusca" style="margin-top:20px; font-weight:bold;"></div>

    </div>

</body>
</html>
