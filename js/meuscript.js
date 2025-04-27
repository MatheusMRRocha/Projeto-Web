

document.addEventListener("DOMContentLoaded", () => {
    // Função para buscar as categorias de notícias
    fetch('noticias.php')
        .then(response => response.json()) // Converte a resposta em JSON
        .then(data => {
            const listaCategorias = document.getElementById("lista-categorias");

            // Itera sobre as categorias e as adiciona à lista
            data.forEach(categoria => {
                const item = document.createElement("li");
                item.textContent = `${categoria.nome}: ${categoria.descricao}`;
                listaCategorias.appendChild(item);
            });
        })
        .catch(error => {
            console.error("Erro ao carregar as categorias:", error);
        });
});
