<?php
// noticias.php

// Simulando um banco de dados com categorias de notícias sobre jogos
$categorias = [
    ["id" => 1, "nome" => "Lançamentos", "descricao" => "As novidades mais esperadas no mundo dos jogos."],
    ["id" => 2, "nome" => "Análises", "descricao" => "Avaliações detalhadas de novos títulos."],
    ["id" => 3, "nome" => "E-Sports", "descricao" => "Acompanhamento dos campeonatos de e-sports."],
    ["id" => 4, "nome" => "Indie Games", "descricao" => "Descubra jogos independentes incríveis."],
    ["id" => 5, "nome" => "Rumores", "descricao" => "Fique por dentro dos rumores mais quentes do mercado de jogos."]
];

header('Content-Type: application/json');

// Converte o array para JSON e envia para o frontend
echo json_encode($categorias);
?>
