<?php
// Detalhes de conexão com o banco de dados PostgreSQL
$host = 'localhost';
$db = 'banco_de_dados_web'; // Nome do seu banco de dados
$user = 'postegres';       // Seu nome de usuário do PostgreSQL
$pass = '123456';          // Sua senha do usuário do PostgreSQL
$port = '5432';            // Porta padrão do PostgreSQL

// String de Conexão (DSN)
$dsn = "pgsql:host=$host;port=$port;dbname=$db";

// Opções para a conexão PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Tenta estabelecer a conexão com o banco de dados
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Em caso de erro de conexão, exibe uma mensagem amigável e detalhes para depuração
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
    die(); // Interrompe a execução do script
}
?>
