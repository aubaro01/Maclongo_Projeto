<div id="addProductModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addProductModal')">&times;</span>
        <h2>Adicionar Produto</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <label for="productName">Nome:</label>
            <input type="text" id="productName" name="nome" required>
            <label for="productDescription">Descrição:</label>
            <input type="text" id="productDescription" name="descricao" required>
            <label for="img">Imagem do Produto:</label>
            <input type="file" id="img" name="imagem" required accept="image/*"><br>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>