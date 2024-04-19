// Array para armazenar os itens do carrinho
let carrinho = [];

// Referência ao link "Carrinho" e ao modal
var btnMostrarCarrinho = document.getElementById("btnMostrarCarrinho");
var modalCarrinho = document.getElementById("modalCarrinho");

// Evento de clique para abrir o modal
btnMostrarCarrinho.onclick = function() {
  modalCarrinho.style.display = "block"; // Exibir o modal
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

    // Enviar os dados do carrinho para o servidor
    enviarCarrinhoParaServidor();
}

// Função para enviar os dados do carrinho para o servidor
function enviarCarrinhoParaServidor() {
    // Converter o carrinho para JSON
    let carrinhoJSON = JSON.stringify(carrinho);

    // Configurar a requisição AJAX
    let xhr = new XMLHttpRequest();
    let url = "php/processar_carrinho.php";
    xhr.open("POST", url, true);
    xhr.setRequestHeader("Content-Type", "application/json");

    // Lidar com a resposta do servidor
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log(xhr.responseText); // Exibir a resposta do servidor no console (opcional)
        }
    };

    // Enviar a requisição com os dados do carrinho
    xhr.send(carrinhoJSON);
}


// Adicionar funcionalidade para fechar o modal ao clicar no botão 'X'
var closeBtn = document.getElementsByClassName("close")[0];
closeBtn.onclick = function() {
  modalCarrinho.style.display = "none"; // Ocultar o modal
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