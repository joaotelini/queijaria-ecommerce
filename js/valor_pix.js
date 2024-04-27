function getParametroURL(nome) {
    const parametros = new URLSearchParams(window.location.search);
    return parametros.get(nome);
}

// Obter o valor do pedido da URL
const valorPedido = getParametroURL('total_pedido');
const numPedido = getParametroURL('num_pedido');

// Exibir o numero do pedido
document.getElementById('numPedido').textContent = `Número do pedido: ${numPedido}`;

// Exibir o valor do pedido na página
document.getElementById('valorPedido').textContent = `Valor do Pedido: R$ ${valorPedido}`;

// Copiar chave pix para o clipboard
function copiar(){
    chave_pix = "00020126580014br.gov.bcb.pix01365e5f36b4-bbb9-4beb-80bc-5d17bac169935204000053039865802BR5924Joao Pedro Domingues Tel6008Brasilia62090505fzsfx6304A65D"
    navigator.clipboard.writeText(chave_pix)
    let tooltip = document.getElementById("tooltip");
    tooltip.innerHTML = "copiada"
    document.getElementById('h3').textContent = `Basta enviar o comprovante para o numero (19)9 9707-7917, com o número do pedido acima.`;
}