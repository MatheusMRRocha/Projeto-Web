🎮 Sobre o Projeto
O "Game News" é um portal de notícias e reviews dedicado ao universo dos videogames. Nosso objetivo é manter os entusiastas de jogos atualizados com as últimas novidades, análises aprofundadas dos lançamentos mais esperados e informações relevantes sobre a indústria.

O projeto foi desenvolvido utilizando uma arquitetura robusta com PHP para o backend, PostgreSQL como sistema de gerenciamento de banco de dados e as tecnologias web fundamentais HTML5, CSS3 e JavaScript para o frontend e interatividade.

✨ Funcionalidades Principais
Cadastro de Usuário: Permite que novos usuários se registrem no portal, fornecendo nome, idade, e-mail, senha e suas categorias de jogos de interesse.
Login de Usuário: Sistema de autenticação seguro, onde os usuários podem acessar suas contas utilizando e-mail ou nome de usuário e senha.
Sessões de Usuário: Gerenciamento de sessão para manter o usuário logado e oferecer uma experiência personalizada, alterando o cabeçalho dinamicamente.
Página Inicial (Home): Exibe um carrossel interativo com as últimas notícias para um acesso rápido e visualmente agradável aos destaques.
Página de Novidades: Lista todas as notícias mais recentes em um formato de cards, com resumos e links para as notícias completas.
Páginas de Notícias Dinâmicas: Um único arquivo PHP (noticia.php) é utilizado para exibir o conteúdo completo de qualquer notícia, buscando as informações de forma dinâmica com base no ID da notícia.
Página de Reviews: Apresenta análises detalhadas de jogos, organizadas em um layout de cards, com notas e breves descrições.
Rodapé Dinâmico: Um rodapé consistente em todas as páginas, contendo informações de direitos autorais e links úteis.
Estrutura de Pastas Organizada: O projeto segue uma convenção de organização de arquivos, separando HTML, CSS, JavaScript, imagens, funções PHP e a conexão com o banco de dados.
🚀 Tecnologias Utilizadas
Backend:
PHP 8.x: Linguagem de programação do lado do servidor.
PostgreSQL: Sistema de gerenciamento de banco de dados relacional, utilizado para armazenar dados de usuários, categorias e seus relacionamentos.
PDO (PHP Data Objects): Interface para conexão segura e preparada com o banco de dados.
Frontend:
HTML5: Estrutura e conteúdo das páginas.
CSS3: Estilização e design responsivo, com foco em uma interface moderna e atraente.
JavaScript: Para interatividade no lado do cliente, como o menu dropdown do perfil e futuras funcionalidades de carrossel.
💡 Curiosidades e Desafios de Desenvolvimento
Autenticação Segura: Implementação de password_hash() e password_verify() para armazenar e verificar senhas de forma segura, protegendo os dados dos usuários.
Transações de Banco de Dados: Uso de PDO::beginTransaction(), commit(), e rollBack() nas operações de cadastro para garantir a integridade dos dados, assegurando que múltiplos inserts (usuário + categorias) sejam atômicos.
Caminhos Relativos: Um desafio constante foi a gestão de caminhos relativos (../, ../../) devido à estrutura de pastas aninhada (index/, html/, funcoes/, noticias/). A solução envolveu a padronização e o teste cuidadoso de cada href e src.
Cabeçalho Dinâmico: A lógica PHP no cabecalho.php para alternar entre links de Login/Cadastro e um menu de perfil com base no status da sessão ($_SESSION['logged_in']) foi um ponto chave para a usabilidade.
Conteúdo Dinâmico de Notícias: A decisão de usar um único arquivo noticia.php para todas as notícias, carregando o conteúdo de um array PHP via parâmetro GET (?id=X), demonstra uma abordagem mais escalável e organizada do que ter múltiplos arquivos estáticos para cada notícia.
Design Responsivo com Grid: A utilização de CSS Grid para organizar cards de notícias e reviews permitiu um layout flexível que se adapta a diferentes tamanhos de tela.
Tratamento de Erros: Implementação de um robusto tratamento de erros de banco de dados e validações de formulário para feedback claro ao usuário e registro de logs para depuração.
👥 Membros da Equipe
Matheus Marques Reis Rocha
Fellipe Moura Pereira
Wagner Martins Alves

