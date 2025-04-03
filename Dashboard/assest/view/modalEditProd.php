<div id="editProductModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editProductModal')">&times;</span>
        <h2>Editar Produto</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" id="editProductId">
            <label for="editProductName">Nome do Produto:</label>
            <input type="text" id="editProductName" name="nome" required>
            <label for="editProductDescription">Descrição:</label>
            <input type="text" id="editProductDescription" name="descricao" required>
            <label for="editImgProduto">Imagem do Produto:</label>
            <input type="file" id="editImgProduto" name="imagem" accept="image/*">
            <button type="submit" class="btn">Salvar</button>
        </form>
    </div>
</div>