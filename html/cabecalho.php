<?php
// É fundamental iniciar a sessão em qualquer arquivo que use ou precise verificar o status da sessão.
// A verificação 'session_status() == PHP_SESSION_NONE' impede erros caso session_start() já tenha sido chamado.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifica se o usuário está logado
$logado = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
$nome_usuario = $logado ? htmlspecialchars($_SESSION['user_name']) : 'Visitante';

// Define o caminho base do seu projeto.
// Isso é útil para links e recursos (como imagens e CSS) para garantir que funcionem
// independentemente de onde o arquivo PHP está sendo executado.
// Ajuste 'Projeto-Web' se o nome da sua pasta raiz for diferente no servidor.
$base_url = '/Projeto-Web/';
?>

<header class="cabecalho">
    <!-- A logo e o nome do site ficam à esquerda -->
    <div class="logo_nome">
        <img src="<?php echo $base_url; ?>img/logo.png" alt="Logo do Portal">
    </div>

    <!-- Os links de navegação e a seção de perfil/login ficam à direita -->
    <div class="cabecalho_links">
        <h2><a href="<?php echo $base_url; ?>index/index.php">Home</a></h2>
        <h2><a href="<?php echo $base_url; ?>html/novidades.php">Novidades</a></h2>
        <h2><a href="<?php echo $base_url; ?>html/reviews.php">Reviews</a></h2>

        <?php if ($logado): // Se o usuário estiver logado ?>
            <div class="perfil-dropdown">
                <button class="perfil-btn">
                    <img src="<?php echo $base_url; ?>img/logo.png" alt="Ícone de Perfil">
                    <span>Olá, <?php echo $nome_usuario; ?></span>
                </button>
                <div class="dropdown-content">
                    <a href="<?php echo $base_url; ?>html/dashboard.php">Dashboard</a>
                    <a href="<?php echo $base_url; ?>html/perfil.php">Meu Perfil</a>
                    <a href="<?php echo $base_url; ?>html/minhas_categorias.php">Minhas Categorias</a>
                    <a href="<?php echo $base_url; ?>funcoes/logout.php">Sair</a>
                </div>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const perfilDropdown = document.querySelector('.perfil-dropdown');
                    const dropdownContent = perfilDropdown.querySelector('.dropdown-content');
                    const perfilBtn = perfilDropdown.querySelector('.perfil-btn');

                    perfilBtn.addEventListener('click', function(event) {
                        dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
                        event.stopPropagation();
                    });

                    window.addEventListener('click', function(event) {
                        if (!perfilDropdown.contains(event.target)) {
                            dropdownContent.style.display = 'none';
                        }
                    });
                });
            </script>

        <?php else: // Se o usuário NÃO estiver logado ?>
            <h3><a href="<?php echo $base_url; ?>html/login.php">Login</a></h3>
            <h3><a href="<?php echo $base_url; ?>html/cadastro.php">Cadastro</a></h3>
        <?php endif; ?>
    </div>
</header>
