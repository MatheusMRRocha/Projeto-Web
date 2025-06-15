<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial - Game News</title>
    <link rel="stylesheet" href="../css/style.css">
    <script defer src="js/meuscript.js"></script>
</head>
<body>
    <div class="container">
        <?php include '../html/cabecalho.php'; ?> <main class="conteudo" style="margin-top: 20px;">
            <h1>Portal de Notícias de Jogos</h1>
            <div class="news-links">
                <p><a href="../html/noticias/noticia1.php">God of War Ragnarok: Nova expansão anunciada!</a></p>
                <p><a href="../html/noticias/noticia2.php">FIFA 26: EA revoluciona o Modo Carreira</a></p>
                <p><a href="../html/noticias/noticia3.php">Cyberpunk 2077: Phantom Liberty já está disponível</a></p>
                <p><a href="../html/noticias/noticia4.php">The Last of Us Parte III: Produção confirmada!</a></p>
                <p><a href="../html/noticias/noticia5.php">High On Life 2: Produção confirmada!</a></p>
                <p><a href="../html/noticias/noticia6.php">Titanfall 3 pode acontecer "na hora certa", diz CEO da Respawn.</a></p>
                <p><a href="../html/noticias/noticia7.php">Minecraft 2 é cancelado dias após seu 'anúncio'!</a></p>
                <p><a href="../html/noticias/noticia8.php">Forza Horizon 6 é anunciado com cenário no Brasil</a></p>
                <p><a href="../html/noticias/noticia9.php">Baldur’s Gate 3 ganha prêmios de Melhor RPG do Ano!</a></p>
                <p><a href="../html/noticias/noticia10.php">Dragon Age: Dreadwolf promete revolução no sistema de escolhas</a></p>
            </div>
            <h2>Categorias</h2>
            <button id="btn-categorias">Mostrar Categorias</button>
            <ul id="lista-categorias"></ul>
        </main>

        <?php include '../html/rodape.php'; ?>
    </div>
</body>
</html>
