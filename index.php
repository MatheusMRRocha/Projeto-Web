<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial - Game News</title>
    <link rel="stylesheet" href="css/style.css"> <script defer src="js/meuscript.js"></script> </head>
<body>
    <div class="container">
        <?php include 'html/cabecalho.php'; ?> <main class="conteudo" style="margin-top: 20px;"> <h1>Portal de Notícias de Jogos</h1>
            <div class="news-links">
                <p><a href="html/noticias/noticia1.php">God of War Ragnarok: Nova expansão anunciada!</a></p>
                <p><a href="html/noticias/noticia2.php">FIFA 26: EA revoluciona o Modo Carreira</a></p>
                <p><a href="html/noticias/noticia3.php">Cyberpunk 2077: Phantom Liberty já está disponível</a></p>
                <p><a href="html/noticias/noticia4.php">The Last of Us Parte III: Produção confirmada!</a></p>
            </div>
            <h2>Categorias</h2>
            <button id="btn-categorias">Mostrar Categorias</button>
            <ul id="lista-categorias"></ul>
        </main>

        <?php include 'html/rodape.php'; ?>
    </div>
</body>
</html>
