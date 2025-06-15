<?php
session_start(); // Inicia a sessão para que o cabeçalho possa verificar o status de login
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial - Game News</title>
    <link rel="stylesheet" href="../css/style.css">
    <script src="../js/meuscript.js"></script>
</head>
<body>
    <div class="container">
        <?php include '../html/cabecalho.php'; ?>

        <main class="conteudo" style="margin-top: 20px;">
            <h1>Portal de Notícias de Jogos</h1>

            <div class="news-links">
                <h2>Últimas Notícias</h2>
                <ul class="latest-news-list">
                    <li><a href="../html/noticias/noticia.php?id=1">God of War Ragnarok: Nova expansão anunciada!</a></li>
                    <li><a href="../html/noticias/noticia.php?id=2">FIFA 26: EA revoluciona o Modo Carreira</a></li>
                    <li><a href="../html/noticias/noticia.php?id=3">Cyberpunk 2077: Phantom Liberty já está disponível</a></li>
                    <li><a href="../html/noticias/noticia.php?id=4">The Last of Us Parte III: Produção confirmada!</a></li>
                    <li><a href="../html/noticias/noticia.php?id=8">High On Life 2: Anunciado com Mais Humor e Ação!</a></li>
                    <li><a href="../html/noticias/noticia.php?id=10">Titanfall 3: CEO da Respawn Deixa Fãs Esperançosas!</a></li>
                    <li><a href="../html/noticias/noticia.php?id=9">Minecraft 2: Anúncio Gera Expectativa Apesar de Cancelamento</a></li>
                    <li><a href="../html/noticias/noticia.php?id=6">Forza Horizon 6: Brasil como Mapa Confirmado!</a></li>
                    <li><a href="../html/noticias/noticia.php?id=5">Baldur’s Gate 3: Consagrado o Melhor RPG de 2024!</a></li>
                    <li><a href="../html/noticias/noticia.php?id=7">Dragon Age: Dreadwolf promete revolução no sistema de escolhas</a></li>
                </ul>
            </div>

            <h2>Categorias</h2>
            <button id="btn-categorias">Mostrar Categorias</button>
            <ul id="lista-categorias"></ul>
        </main>

        <?php include '../html/rodape.php'; ?>
    </div>
</body>
</html>
