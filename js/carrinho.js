// Array para armazenar os itens do carrinho
let carrinho = [];

// Referência ao link "Carrinho" e ao modal
var btnMostrarCarrinho = document.getElementById("btnMostrarCarrinho");
var modalCarrinho = document.getElementById("modalCarrinho");

// Evento de clique para abrir o modal
btnMostrarCarrinho.onclick = function() {
  modalCarrinho.style.display = "block"; // Exibir o modal
}

// Adicionar funcionalidade para fechar o modal ao clicar no botão 'X'
var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.onclick = function() {
  modalCarrinho.style.display = "none"; // Ocultar o modal
}

// Função para adicionar um produto ao carrinho
function addProduto(nome, preco) {
    let itemExiste = carrinho.find(item => item.nome === nome);

    if (itemExiste) {
        // Se o item já existe no carrinho, incrementar a quantidade
        itemExiste.quantidade++;

        // Mostrar notificação de quantidade
        mostrarNotificacao(itemExiste.nome, itemExiste.quantidade);
    } else {
        // Se o item não existe no carrinho, adicionar como um novo item
        let novoItem = {
            nome: nome,
            preco: preco,
            quantidade: 1
        };
        carrinho.push(novoItem);

        // Mostrar notificação de adição
        mostrarNotificacao(novoItem.nome, novoItem.quantidade);
    }
    atualizarCarrinho();
}

// Funcao para notificar um item adicionado no carrinho
function mostrarNotificacao(nome) {
    const notificacao = document.getElementById('notificacao');
    notificacao.textContent = nome + ' adicionado no carrinho.'
    notificacao.style.display = 'block';
    setTimeout(function() {
        notificacao.style.display = 'none';
    }, 3000); // Esconde a notificação após 3 segundos
}

// Função para remover um produto do carrinho
function removerProduto(index) {
    carrinho.splice(index, 1);
    atualizarCarrinho();
}

// Função para limpar o carrinho
function limparCarrinho() {
    carrinho = [];
    atualizarCarrinho();
}

// Função para atualizar a exibição do carrinho
function atualizarCarrinho() {
    let itensCarrinho = document.getElementById("itens-carrinho-modal");
    let totalElement = document.getElementById("total");
    let total = 0;

    // Limpa a lista de itens do carrinho
    itensCarrinho.innerHTML = "";


    // Adiciona cada item do carrinho à lista e calcula o total
    carrinho.forEach(function(item, index) {
        total += item.preco;
        itensCarrinho.innerHTML += "<li>" + item.quantidade + " - " + item.nome + " - R$" + item.preco + " <button class='remover' onclick='removerProduto(" + index + ")'>Remover</button></li>";
    });

    // Atualiza o total
    totalElement.textContent = total.toFixed(2);
}

// Função para mostrar ou ocultar o carrinho
function toggleCarrinho() {
    let carrinhoDiv = document.getElementById("carrinho");
    if (carrinhoDiv.style.display === "none") {
        carrinhoDiv.style.display = "block";
        atualizarCarrinho();
    } else {
        carrinhoDiv.style.display = "none";
    }
}
