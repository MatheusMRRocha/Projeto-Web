<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews - Game News</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <?php include 'cabecalho.php'; ?>

        <main class="conteudo">
            <h1 style="text-align: center; margin-bottom: 20px; color: #1a237e;">Análises Detalhadas dos Jogos</h1>
            <p class="intro-text" style="text-align: center; margin-bottom: 40px; color: #555; font-size: 1.1em;">Confira abaixo as últimas análises dos jogos mais esperados:</p>

            <section class="reviews-grid" style="
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* Layout responsivo de cards */
                gap: 30px; /* Espaço entre os cards */
            ">

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/cyberpun2077.jpg" alt="Cyberpunk 2077 Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Cyberpunk 2077: Phantom Liberty</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">O DLC "Phantom Liberty" traz uma nova narrativa envolvente, com melhorias significativas no combate e na exploração de Night City. A expansão é um must-play para os fãs do jogo.</p>
                        <a href="review_detalhe.php?id=cyberpunk-2077" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/godofwar.jpg" alt="God of War Ragnarok Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">God of War Ragnarok</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A nova expansão "Valhalla" leva Kratos a novos reinos e desafios, mantendo a qualidade narrativa que a série é conhecida.</p>
                        <a href="review_detalhe.php?id=gow-ragnarok" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/baldursgate3.jpg" alt="Baldur's Gate 3 Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Baldur's Gate 3</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">Com uma narrativa rica e escolhas impactantes, Baldur's Gate 3 redefine o gênero RPG com sua profundidade e complexidade.</p>
                        <a href="review_detalhe.php?id=baldurs-gate-3" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/dreadwolf.jpg" alt="Dragon Age: Dreadwolf Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Dragon Age: Dreadwolf</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">O novo título da BioWare promete revolucionar o sistema de escolhas e moralidade, trazendo uma experiência imersiva e envolvente.</p>
                        <a href="review_detalhe.php?id=dragon-age-dreadwolf" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/High_On_Life_2.jpg" alt="High On Life 2 Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">High On Life 2</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A sequência do jogo de tiro humorístico traz novas mecânicas e uma narrativa ainda mais divertida, mantendo o espírito único do original.</p>
                        <a href="review_detalhe.php?id=high-on-life-2" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/minecraft_2.jpg" alt="Minecraft 2 Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Minecraft 2</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">Apesar do cancelamento, o anúncio gerou grande expectativa entre os fãs. A Mojang promete continuar inovando no universo de Minecraft.</p>
                        <a href="review_detalhe.php?id=minecraft-2" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/forzahorizon.jpg" alt="Forza Horizon 6 Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Forza Horizon 6</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">Com um cenário vibrante no Brasil, Forza Horizon 6 traz uma nova era de corridas arcade, combinando gráficos impressionantes com jogabilidade divertida.</p>
                        <a href="review_detalhe.php?id=forza-horizon-6" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/Titanfall_3.jpg" alt="Titanfall 3 Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">Titanfall 3</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">Embora ainda não confirmado, o CEO da Respawn deixou os fãs esperançosos com a possibilidade de um novo título na franquia Titanfall.</p>
                        <a href="review_detalhe.php?id=titanfall-3" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/fifa26.jpg" alt="FIFA 26 Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">FIFA 26 (Modo Carreira Aprimorado)</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">O novo Modo Carreira traz inovações que prometem transformar a experiência de gerenciamento de clubes, com mais profundidade e realismo.</p>
                        <a href="review_detalhe.php?id=fifa-26" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

                <article class="review-card" style="
                    background-color: #ffffff;
                    border-radius: 12px;
                    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                    transition: transform 0.3s ease, box-shadow 0.3s ease;
                ">
                    <img src="../../index/img/The_Last_Of_Us_Parte_II.jpg" alt="The Last of Us Parte III Review" class="review-image">
                    <div style="padding: 20px;">
                        <h3 style="color: #1a237e; font-size: 1.4em; margin-bottom: 10px;">The Last of Us Parte III (Perspectivas)</h3>
                        <p style="color: #666; font-size: 0.95em; margin-bottom: 15px;">A produção do terceiro jogo da aclamada série foi confirmada, prometendo continuar a história emocional e intensa de Ellie e Joel.</p>
                        <a href="review_detalhe.php?id=the-last-of-us-3" class="review-link" style="
                            display: inline-block;
                            margin-top: 15px;
                            background-color: #3f51b5;
                            color: white;
                            padding: 8px 15px;
                            border-radius: 6px;
                            text-decoration: none;
                            transition: background-color 0.3s ease;
                        ">Ler Análise</a>
                    </div>
                </article>

            </section> <div style="text-align: center; margin-top: 50px; padding-top: 20px; border-top: 1px solid #eee;">
                <p style="font-size: 1.2em; color: #1a237e;">Quer ver sua análise aqui? <a href="submeter_review.php" style="color: #3f51b5; text-decoration: none; font-weight: bold;">Envie sua review!</a></p>
            </div>

        </main>

        <?php include 'rodape.php'; ?>
    </div>
</body>
</html>
