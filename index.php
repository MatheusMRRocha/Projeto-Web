<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Referência ao arquivo meuscript.js -->
    <script defer src="meuscript.js"></script>
    
</head>
<body>
    <div class="container">
        <?php include 'html/cabecalho.php'; ?>

        <main class="conteudo">
        <h1>Portal de Notícias de Jogos</h1>
            <div class="news-links">
                <p><a href="html/noticias/noticia1.php">God of War Ragnarok: Nova expansão anunciada!</a></p>
                <p><a href="html/noticias/noticia2.php">FIFA 26: EA revoluciona o Modo Carreira</a></p>
                <p><a href="html/noticias/noticia3.php">Cyberpunk 2077: Phantom Liberty já está disponível</a></p>
                <p><a href="html/noticias/noticia4.php">The Last of Us Parte III: Produção confirmada!</a></p>

                <hr>

                <p><a href="formulario.html">Contato</a></p>
                
            </div>
        </main>

        <?php include 'html/rodape.php'; ?>
    </div>
</body>
</html>
