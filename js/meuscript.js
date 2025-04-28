document.addEventListener('DOMContentLoaded', () => {
    const botaoCategorias = document.getElementById('btn-categorias');
    const listaCategorias = document.getElementById('lista-categorias');

    let categoriasCarregadas = false; // controle para carregar só uma vez
    let categoriasVisiveis = false; // controle para esconder/mostrar

    botaoCategorias.addEventListener('click', () => {
        if (!categoriasCarregadas) {
            // Primeira vez: busca as categorias no servidor
            fetch('html/noticias.php')
                .then(response => response.json())
                .then(categorias => {
                    listaCategorias.innerHTML = '';

                    categorias.forEach(categoria => {
                        const li = document.createElement('li');
                        li.textContent = `${categoria.nome} - ${categoria.descricao}`;
                        listaCategorias.appendChild(li);
                    });

                    listaCategorias.style.display = 'block'; // mostra a lista
                    categoriasCarregadas = true;
                    categoriasVisiveis = true;
                    botaoCategorias.textContent = 'Esconder Categorias';
                })
                .catch(error => {
                    console.error('Erro ao carregar categorias:', error);
                });
        } else {
            // Se já carregou, só alterna entre mostrar e esconder
            if (categoriasVisiveis) {
                listaCategorias.style.display = 'none'; // esconde a lista
                botaoCategorias.textContent = 'Mostrar Categorias';
            } else {
                listaCategorias.style.display = 'block'; // mostra a lista
                botaoCategorias.textContent = 'Esconder Categorias';
            }
            categoriasVisiveis = !categoriasVisiveis;
        }
    });
});