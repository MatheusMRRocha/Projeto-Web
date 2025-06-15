<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="../css/style.css"> <!-- Ajuste o caminho para seu CSS -->
</head>
<body>

<div class="container">
    <?php include 'cabecalho.php'; ?> <!-- Inclui o cabeçalho (se você tiver) -->
    <h2>Cadastro de Usuário</h2>

    <!-- O formulário envia para o script de processamento -->
    <form method="POST" action="../funcoes/cadastro_processamento.php">
        <label>Nome de Usuário:</label>
        <input type="text" name="nome" required><br><br>

        <label>Idade:</label>
        <input type="number" name="idade" min="10" max="120" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" required><br><br>

        <label>Senha:</label>
        <input type="password" name="senha" required><br><br>

        <fieldset style="margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 8px;">
            <legend style="font-weight: bold;">Deseja receber notificações por email?</legend>
            <label><input type="radio" name="notificacoes" value="sim"> Sim</label>
            <label><input type="radio" name="notificacoes" value="nao" checked> Não</label>
        </fieldset><br>

        <fieldset style="margin-top: 20px; padding: 15px; border: 1px solid #ccc; border-radius: 8px;">
            <legend style="font-weight: bold;">Quais categorias de jogos você se interessa?</legend>
            <small style="display: block; margin-bottom: 10px; color: #555;">Selecione uma ou mais opções para receber novidades.</small>

            <label style="display: block; margin-bottom: 5px;"><input type="checkbox" name="categorias[]" value="Ação"> Ação</label>
            <label style="display: block; margin-bottom: 5px;"><input type="checkbox" name="categorias[]" value="Esportes"> Esportes</label>
            <label style="display: block; margin-bottom: 5px;"><input type="checkbox" name="categorias[]" value="RPG"> RPG</label>
            <label style="display: block; margin-bottom: 5px;"><input type="checkbox" name="categorias[]" value="Corrida"> Corrida</label>
            <label style="display: block;"><input type="checkbox" name="categorias[]" value="Terror"> Terror</label>
        </fieldset><br>

        <button type="submit" style="
            background-color: #4CAF50; /* Green */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        ">Cadastrar</button>
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

    <p style="margin-top: 20px;">Já tem conta? <a href="login.php" style="color: #007bff; text-decoration: none;">Voltar para o login</a></p>
    <?php include 'rodape.php'; ?> <!-- Inclui o rodapé (se você tiver) -->
</div>
</body>
</html>
