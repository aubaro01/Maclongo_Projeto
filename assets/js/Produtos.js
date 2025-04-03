function openModal(nomeProduto, descricao, imgUrl) {
    document.getElementById('modal-product-image').src = imgUrl;
    document.getElementById('modal-product-title').innerText = nomeProduto;
    
    document.getElementById('modal-product-category').innerText = "Acessórios:";
    var linhasDescricao = descricao.split(',').map(function(linha) {
        return '> ' + linha.trim(); 
    }).join('<br>'); 
    document.getElementById('modal-product-description').innerHTML = linhasDescricao;
    document.getElementById('product-modal').style.display = 'flex';
}
function closeModal() {
    document.getElementById('product-modal').style.display = 'none';
}
