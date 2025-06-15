<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novidades - Game News</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

    <div class="container">
        <?php include 'cabecalho.php'; ?>

        <main class="conteudo">
            <h1 style="text-align: center; margin-bottom: 40px;">Últimas Notícias e Lançamentos do Mundo dos Games</h1>

            <section class="news-grid" style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); /* Layout responsivo de cards */
                gap: 30px; /* Espaço entre os cards */
            ">

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/godofwar.jpg" alt="God of War Ragnarok" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">God of War Ragnarok: Nova expansão anunciada!</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A Santa Monica Studio surpreendeu os fãs ao anunciar "Valhalla", a nova expansão que traz Kratos de volta à ação...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 15 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=1" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/fifa26.jpg" alt="FIFA 26" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">FIFA 26: EA revoluciona o Modo Carreira</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A Electronic Arts promete mudanças drásticas no Modo Carreira, com maior imersão e opções de gerenciamento...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 14 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=2" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/cyberpun2077.jpg" alt="Cyberpunk 2077" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Phantom Liberty: Cyberpunk 2077 já está disponível!</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A tão aguardada expansão Phantom Liberty já pode ser baixada, trazendo uma nova história e personagens...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 12 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=3" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/The_Last_Of_Us_Parte_II.jpg" alt="The Last of Us Parte III" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">The Last of Us Parte III: Produção confirmada!</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A Naughty Dog finalmente confirmou que a produção de The Last of Us Parte III está em andamento...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 10 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=4" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/baldursgate3.jpg" alt="Baldur's Gate 3" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Baldur's Gate 3: Consagrado o Melhor RPG de 2024!</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">Baldur’s Gate 3 foi consagrado com o prêmio de Melhor RPG de 2024, elogiado por sua narrativa...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 08 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=5" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/forzahorizon.jpg" alt="Forza Horizon 6 Brazil" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Forza Horizon 6: Brasil como Mapa Confirmado!</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A Playground Games confirmou que Forza Horizon 6 terá como mapa o Brasil, com cidades, florestas...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 05 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=6" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/dreadwolf.jpg" alt="Dragon Age: Dreadwolf" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Dragon Age: Dreadwolf promete revolução no sistema de escolhas</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">O novo título da BioWare promete revolucionar o sistema de escolhas e moralidade, trazendo uma experiência imersiva...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 03 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=7" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/High_On_Life_2.jpg" alt="High On Life 2" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">High On Life 2 Anunciado com Mais Humor e Ação!</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A sequência do irreverente jogo de tiro humorístico foi oficialmente anunciada, prometendo novas mecânicas...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 01 de Junho de 2025</span><br>
                        <a href="noticias/noticia.php?id=8" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/minecraft_2.jpg" alt="Minecraft 2" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Minecraft 2: Anúncio Gera Expectativa Apesar de Cancelamento</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">Apesar do recente cancelamento do projeto de Minecraft 2, o mero anúncio gerou grande expectativa...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 28 de Maio de 2025</span><br>
                        <a href="noticias/noticia.php?id=9" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

                <article class="news-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/Titanfall_3.jpg" alt="Titanfall 3" style="width: 100%; height: 200px; object-fit: cover; border-bottom: 1px solid #eee;">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Titanfall 3: CEO da Respawn Deixa Fãs Esperançosos!</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">Embora ainda não confirmado, o CEO da Respawn Entertainment, Vince Zampella, deixou os fãs esperançosos...</p>
                        <span style="font-size: 0.85em; color: #999;">Publicado em: 25 de Maio de 2025</span><br>
                        <a href="noticias/noticia.php?id=10" style=" /* APONTA PARA O ARQUIVO ÚNICO COM ID */
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Mais</a>
                    </div>
                </article>

            </section> <div style="text-align: center; margin-top: 50px; padding-top: 20px; border-top: 1px solid #eee;">
                <p style="font-size: 1.2em; color: #1a237e;">Para ver todo o arquivo de notícias, <a href="#" style="color: #3f51b5; text-decoration: none; font-weight: bold;">clique aqui!</a></p>
            </div>

        </main>

        <?php include 'rodape.php'; ?>
    </div>
</body>
</html>
