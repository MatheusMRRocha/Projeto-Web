<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <?php include 'cabecalho.php'; ?>
    <h2>Cadastro de Usuário</h2>

    <form method="POST" action="../funcoes/cadastro_processamento.php">
        <label>Nome de Usuário:</label>
        <input type="text" name="nome" required><br><br>

        <label>Idade:</label>
        <input type="number" name="idade" min="10" max="120" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <fieldset style="margin-top: 20px;">
            <legend><strong>Deseja receber notificações por email?</strong></legend>
            <label><input type="radio" name="notificacoes" value="sim"> Sim</label>
            <label><input type="radio" name="notificacoes" value="nao" checked> Não</label>
        </fieldset><br>

        <fieldset style="margin-top: 20px;">
            <legend><strong>Quais categorias de jogos você se interessa?</strong></legend>
            <small>Selecione uma ou mais opções para receber novidades.</small><br><br>

            <label><input type="checkbox" name="categorias[]" value="Ação"> Ação</label><br>
            <label><input type="checkbox" name="categorias[]" value="Esportes"> Esportes</label><br>
            <label><input type="checkbox" name="categorias[]" value="RPG"> RPG</label><br>
            <label><input type="checkbox" name="categorias[]" value="Corrida"> Corrida</label><br>
            <label><input type="checkbox" name="categorias[]" value="Terror"> Terror</label><br>
        </fieldset><br>

        <button type="submit">Cadastrar</button>
    </form>

    <?php
    // Exibe mensagens de sucesso ou erro, se existirem (vindas do processamento)
    if (isset($_GET['success'])) {
        echo '<p class="success" style="color: green;">' . htmlspecialchars($_GET['success']) . '</p>';
    }
    if (isset($_GET['error'])) {
        echo '<p class="error" style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
    }
    ?>

    <p>Já tem conta? <a href="login.php">Voltar para o login</a></p>
    <?php include 'rodape.php'; ?>
</div>
</body>
</html>
