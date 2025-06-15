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

    <div class="centralizar_Conteudos">
        <div class="caixa">
            <h1>Cadastro de Usuário</h1>

            <!-- O formulário envia para o script de processamento -->
            <form method="POST" action="../funcoes/cadastro_processamento.php">
                <label for="nome">Nome de Usuário:</label>
                <input type="text" id="nome" name="nome" required><br>

                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" min="10" max="120" required><br>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required><br>

                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required><br>

                <fieldset>
                    <legend><strong>Deseja receber notificações por email?</strong></legend>
                    <label><input type="radio" name="notificacoes" value="sim"> Sim</label>
                    <label><input type="radio" name="notificacoes" value="nao" checked> Não</label>
                </fieldset>

                <fieldset>
                    <legend><strong>Quais categorias de jogos você se interessa?</strong></legend>
                    <small style="display: block; margin-bottom: 10px; color: #555;">Selecione uma ou mais opções para receber novidades.</small>

                    <label><input type="checkbox" name="categorias[]" value="Ação"> Ação</label>
                    <label><input type="checkbox" name="categorias[]" value="Esportes"> Esportes</label>
                    <label><input type="checkbox" name="categorias[]" value="RPG"> RPG</label>
                    <label><input type="checkbox" name="categorias[]" value="Corrida"> Corrida</label>
                    <label><input type="checkbox" name="categorias[]" value="Terror"> Terror</label>
                </fieldset>

                <button type="submit">Cadastrar</button>
            </form>

            <?php
            // Exibe mensagens de sucesso ou erro que vêm via parâmetros GET do script de processamento
            if (isset($_GET['success'])) {
                echo '<p class="success">' . htmlspecialchars($_GET['success']) . '</p>';
            }
            if (isset($_GET['error'])) {
                echo '<p class="error">' . htmlspecialchars($_GET['error']) . '</p>';
            }
            ?>

            <p style="text-align: center; margin-top: 20px;">Já tem conta? <a href="login.php">Voltar para o login</a></p>
        </div>
    </div>

    <?php include 'rodape.php'; ?> <!-- Inclui o rodapé (se você tiver) -->
</div>
</body>
</html>
