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
    <!-- Incluindo Font Awesome para os ícones de navegação do carrossel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <?php include '../html/cabecalho.php'; ?>

        <main class="conteudo">
            <h1>Portal de Notícias de Jogos</h1>

            <section class="news-carousel-section">
                <h2>Últimas Notícias</h2>
                <div class="carousel-container">
                    <button class="carousel-nav-btn prev-btn" aria-label="Notícia Anterior"><i class="fas fa-chevron-left"></i></button>
                    <div class="carousel-wrapper">
                        <!-- Cada notícia será um item do carrossel -->
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=1">
                                <!-- Placeholder de imagem. Substitua por suas próprias imagens -->
                                <img src="https://placehold.co/400x225/3f51b5/ffffff?text=God+of+War+Ragnarok" alt="God of War Ragnarok">
                                <div class="item-title">God of War Ragnarok: Nova expansão anunciada!</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=2">
                                <img src="https://placehold.co/400x225/28a745/ffffff?text=FIFA+26" alt="FIFA 26">
                                <div class="item-title">FIFA 26: EA revoluciona o Modo Carreira</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=3">
                                <img src="https://placehold.co/400x225/ffc107/ffffff?text=Cyberpunk+2077" alt="Cyberpunk 2077">
                                <div class="item-title">Cyberpunk 2077: Phantom Liberty já está disponível</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=4">
                                <img src="https://placehold.co/400x225/dc3545/ffffff?text=The+Last+of+Us" alt="The Last of Us Parte III">
                                <div class="item-title">The Last of Us Parte III: Produção confirmada!</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=8">
                                <img src="https://placehold.co/400x225/6f42c1/ffffff?text=High+On+Life+2" alt="High On Life 2">
                                <div class="item-title">High On Life 2: Anunciado com Mais Humor e Ação!</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=10">
                                <img src="https://placehold.co/400x225/fd7e14/ffffff?text=Titanfall+3" alt="Titanfall 3">
                                <div class="item-title">Titanfall 3: CEO da Respawn Deixa Fãs Esperançosas!</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=9">
                                <img src="https://placehold.co/400x225/20c997/ffffff?text=Minecraft+2" alt="Minecraft 2">
                                <div class="item-title">Minecraft 2: Anúncio Gera Expectativa Apesar de Cancelamento</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=6">
                                <img src="https://placehold.co/400x225/17a2b8/ffffff?text=Forza+Horizon+6" alt="Forza Horizon 6">
                                <div class="item-title">Forza Horizon 6: Brasil como Mapa Confirmado!</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=5">
                                <img src="https://placehold.co/400x225/6610f2/ffffff?text=Baldurs+Gate+3" alt="Baldur's Gate 3">
                                <div class="item-title">Baldur’s Gate 3: Consagrado o Melhor RPG de 2024!</div>
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="../html/noticias/noticia.php?id=7">
                                <img src="https://placehold.co/400x225/e83e8c/ffffff?text=Dragon+Age" alt="Dragon Age: Dreadwolf">
                                <div class="item-title">Dragon Age: Dreadwolf promete revolução no sistema de escolhas</div>
                            </a>
                        </div>
                    </div>
                    <button class="carousel-nav-btn next-btn" aria-label="Próxima Notícia"><i class="fas fa-chevron-right"></i></button>
                </div>
            </section>

            <h2>Categorias</h2>
            <button id="btn-categorias">Mostrar Categorias</button>
            <ul id="lista-categorias"></ul>
        </main>

        <?php include '../html/rodape.php'; ?>
    </div>
</body>
</html>
