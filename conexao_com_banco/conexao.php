<?php

// Detalhes de conexão com o banco de dados PostgreSQL
$host = 'localhost';             // Onde seu servidor PostgreSQL está rodando
$db = 'banco_de_dados_web';      // Nome do seu banco de dados
$user = 'postegres';             // SEU nome de usuário do PostgreSQL
$pass = '123456';                // SUA senha do usuário do PostgreSQL
$port = '5432';                  // A porta padrão do PostgreSQL

// String de Conexão (DSN - Data Source Name)
// Ela informa ao PDO como se conectar ao seu banco de dados PostgreSQL
$dsn = "pgsql:host=$host;port=$port;dbname=$db";

// Opções para a conexão PDO
$options = [
    // Define como o PDO deve lidar com erros: lançará exceções (erros fatais)
    // Isso é ótimo para desenvolvimento, pois você verá exatamente onde algo deu errado.
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,

    // Define o modo de busca padrão para resultados de consultas: array associativo
    // Isso significa que as colunas serão acessíveis pelos seus nomes (ex: $row['nome'])
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    // Desativa a emulação de prepared statements.
    // Usar prepared statements nativos do banco de dados é mais seguro e geralmente mais performático.
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Tenta estabelecer a conexão com o banco de dados
try {
    // Cria uma nova instância da classe PDO, passando o DSN, usuário, senha e opções
    $pdo = new PDO($dsn, $user, $pass, $options);
    // Se a conexão for bem-sucedida, o objeto $pdo estará disponível para suas operações de banco de dados.

} catch (\PDOException $e) {
    // Se ocorrer um erro durante a conexão, este bloco 'catch' será executado.
    // É importante registrar esses erros e não exibi-los diretamente para o usuário final em um ambiente de produção.
    // Por enquanto, para depuração, estamos exibindo a mensagem formatada.

    echo "
        <div style='
            background-color: #ffe6e6;
            border: 1px solid #ff0000;
            padding: 15px;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
            font-family: Arial, sans-serif;
            color: #333;
        '>
            <h3 style='color: #ff0000; margin-top: 0;'>Erro de Conexão com o Banco de Dados!</h3>
            <p>Não foi possível conectar ao banco de dados. Por favor, verifique sua configuração.</p>
            <p><strong>Detalhes técnicos para depuração:</strong> " . htmlspecialchars($e->getMessage()) . "</p>
            <p>Verifique o arquivo <code>conexao.php</code> (host, nome do banco, usuário, senha) e se o serviço do PostgreSQL está rodando.</p>
        </div>
    ";
    // Interrompe a execução do script, pois o banco de dados é essencial.
    die();
}
