<?php

// Detalhes de conexão com o banco de dados PostgreSQL
$host = 'localhost';    
$db = 'banco_de_dados_web';      // Nome do seu banco de dados
$user = 'postgres';             // Seu nome de usuário do PostgreSQL
$pass = '123456';                // Sua senha do usuário do PostgreSQL
$port = '5432';                  // Porta padrão do PostgreSQL

// String de Conexão (DSN - Data Source Name)
$dsn = "pgsql:host=$host;port=$port;dbname=$db";

// Opções para a conexão PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // PDO lançará exceções em caso de erros SQL
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Retorna resultados como arrays associativos
    PDO::ATTR_EMULATE_PREPARES   => false,                // Usa prepared statements nativos do banco, mais seguro
];

// Tenta estabelecer a conexão com o banco de dados
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // A conexão foi bem-sucedida, o objeto $pdo está pronto para ser usado.

} catch (\PDOException $e) {
    // Se ocorrer um erro durante a conexão, este bloco será executado.
    // Em produção, é essencial registrar o erro (log) e exibir uma mensagem genérica para o usuário.
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
            <p>Não foi possível conectar ao banco de dados. Por favor, tente novamente mais tarde.</p>
    ";

    // Mostra os detalhes técnicos do erro apenas em ambiente de desenvolvimento (REMOVER EM PRODUÇÃO!)
    // Você pode usar uma variável de ambiente (ex: getenv('APP_ENV') === 'development') para controlar isso.
    if (true) { // Defina como 'false' ou remova este 'if' em produção para não expor detalhes
        echo "<p><strong>Detalhes técnicos para depuração:</strong> " . htmlspecialchars($e->getMessage()) . "</p>";
        echo "<p>Verifique o arquivo <code>conexao.php</code> (host, nome do banco, usuário, senha) e se o serviço do PostgreSQL está rodando.</p>";
    }

    echo "</div>";

    // Interrompe a execução do script, pois a conexão com o banco é crucial.
    die();
}
