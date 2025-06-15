<?php
// É fundamental iniciar a sessão em qualquer arquivo que use ou precise verificar o status da sessão.
// A verificação 'session_status() == PHP_SESSION_NONE' impede erros caso session_start() já tenha sido chamado.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
$logado = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$nome_usuario = $logado ? htmlspecialchars($_SESSION['user_name']) : 'Visitante';
?>

<header class="cabecalho" style="
    /* Esses estilos inline são apenas exemplos rápidos para testar. */
    /* Mova-os para seu arquivo CSS (../css/style.css) para melhor organização. */
    background-color: #333;
    color: white;
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
">
    <section>
        <div id="cabecalho" style="
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%; /* Garante que o conteúdo ocupe o espaço disponível */
        ">
            <div class="logo_nome" style="display: flex; align-items: center;">
                <img src="../img/logo.png" alt="Logo do Portal" style="height: 50px; margin-right: 15px;">
                <h1 class="logo_nome" style="font-size: 24px; margin: 0;">Game News</h1>
            </div>

            <div class="cabecalho_links" style="display: flex; align-items: center; gap: 20px;">
                <h2 class="cabecalho_links" style="margin: 0;"><a href="/Projeto-Web/index/index.php" style="color: white; text-decoration: none;">Home</a></h2>
                <h2 class="cabecalho_links" style="margin: 0;"><a href="/Projeto-Web/html/novidades.php" style="color: white; text-decoration: none;">Novidades</a></h2>
                <h2 class="cabecalho_links" style="margin: 0;"><a href="/Projeto-Web/html/reviews.php" style="color: white; text-decoration: none;">Reviews</a></h2>

                <?php if ($logado): // Se o usuário estiver logado ?>
                    <div class="perfil-dropdown" style="position: relative; display: inline-block;">
                        <button class="perfil-btn" style="
                            background: none;
                            border: none;
                            color: white;
                            font-size: 16px;
                            cursor: pointer;
                            display: flex;
                            align-items: center;
                            gap: 8px; /* Espaço entre ícone e texto */
                        ">
                            <img src="../img/logo.png" alt="Ícone de Perfil" style="border-radius: 50%; width: 40px; height: 40px; object-fit: cover;">
                            <span style="font-weight: bold;">Olá, <?php echo $nome_usuario; ?></span>
                        </button>
                        <div class="dropdown-content" style="
                            display: none; /* Escondido por padrão */
                            position: absolute;
                            background-color: #f9f9f9;
                            min-width: 180px;
                            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                            z-index: 1000; /* Garante que o dropdown fique acima de outros elementos */
                            right: 0; /* Alinha o dropdown à direita do botão */
                            border-radius: 5px;
                            overflow: hidden;
                            top: 100%; /* Posiciona abaixo do botão */
                            margin-top: 10px; /* Pequeno espaçamento do botão */
                        ">
                            <a href="/Projeto-Web/html/dashboard.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Dashboard</a>
                            <a href="/Projeto-Web/html/perfil.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Meu Perfil</a>
                            <a href="/Projeto-Web/html/minhas_categorias.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block;">Minhas Categorias</a>
                            <a href="/Projeto-Web/funcoes/logout.php" style="color: black; padding: 12px 16px; text-decoration: none; display: block; border-top: 1px solid #eee;">Sair</a>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const perfilDropdown = document.querySelector('.perfil-dropdown');
                            const dropdownContent = perfilDropdown.querySelector('.dropdown-content');
                            const perfilBtn = perfilDropdown.querySelector('.perfil-btn');

                            perfilBtn.addEventListener('click', function(event) {
                                // Alterna a visibilidade do dropdown
                                dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                                event.stopPropagation(); // Impede que o clique se propague e feche o dropdown imediatamente
                            });

                            // Fecha o dropdown se clicar em qualquer lugar fora dele
                            window.addEventListener('click', function(event) {
                                if (!perfilDropdown.contains(event.target)) {
                                    dropdownContent.style.display = 'none';
                                }
                            });
                        });
                    </script>

                <?php else: // Se o usuário NÃO estiver logado ?>
                    <h3 class="cabecalho_links" style="margin: 0;"><a href="/Projeto-Web/html/login.php" style="color: white; text-decoration: none;">Login</a></h3>
                    <h3 class="cabecalho_links" style="margin: 0;"><a href="/Projeto-Web/html/cadastro.php" style="color: white; text-decoration: none;">Cadastro</a></h3>
                <?php endif; ?>
            </div>
        </div>
    </section>
</header>
