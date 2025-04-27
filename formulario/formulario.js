// DOM para o formulário de contato
document.addEventListener("DOMContentLoaded", () => {

    const formContato = document.getElementById("formContato");
    const mensagemUsuario = document.getElementById("mensagemUsuario");

    formContato.addEventListener("submit", (e) => {
        const nome = document.getElementById("nome").value.trim();
        const email = document.getElementById("email").value.trim();
        const mensagem = document.getElementById("mensagem").value.trim();

        // Validação simples
        if (nome === "" || email === "" || mensagem === "") {
            e.preventDefault(); // Impede o envio
            mensagemUsuario.textContent = "Por favor, preencha todos os campos antes de enviar.";
            mensagemUsuario.style.color = "red";
        } else {
            mensagemUsuario.textContent = "Formulário enviado com sucesso!";
            mensagemUsuario.style.color = "green";
            // Aqui o formulário é enviado normalmente
        }
    });

    // DOM para o formulário de busca
    const formBusca = document.getElementById("formBusca");
    const mensagemBusca = document.getElementById("mensagemBusca");

    formBusca.addEventListener("submit", (e) => {
        const busca = document.getElementById("busca").value.trim();

        if (busca === "") {
            e.preventDefault();
            mensagemBusca.textContent = "Digite algo para buscar!";
            mensagemBusca.style.color = "red";
        } else {
            mensagemBusca.textContent = "Busca enviada!";
            mensagemBusca.style.color = "green";
        }
    });

});
