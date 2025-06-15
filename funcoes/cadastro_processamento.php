<?php
require 'conexao.php'; 

$error = '';
$success = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $idade = $_POST['idade']; 
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); 
    $notificacoes = $_POST['notificacoes'];

    try {
        
        $stmt_check = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email = :email");
        $stmt_check->execute([':email' => $email]);
        if ($stmt_check->fetchColumn() > 0) {
            $error = 'Este email já está cadastrado. Por favor, use outro email.';
        } else {
            
            $stmt = $pdo->prepare("INSERT INTO usuarios (nome, idade, email, senha, notificacoes) VALUES (:nome, :idade, :email, :senha, :notificacoes)");
            $stmt->execute([
                ':nome' => $nome,
                ':idade' => $idade,
                ':email' => $email,
                ':senha' => $senha,
                ':notificacoes' => $notificacoes
            ]);
            $success = 'Cadastro realizado com sucesso! <a href="../html/login.php">Faça login</a>';
        }
    } catch (PDOException $e) {
        $error = "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>
