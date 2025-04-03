<div id="addModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('addModal')">&times;</span>
        <h2>Adicionar Serviço</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            <label for="serviceName">Nome:</label>
            <input type="text" id="serviceName" name="Nome_ser" required>
            <label for="serviceDescription">Descrição:</label>
            <input type="text" id="serviceDescription" name="descricao_ser" required>
            <label for="img">Imagem do Serviço:</label>
            <input type="file" id="img" name="img_ser" required accept="image/*"><br>
            <button type="submit" class="btn">Adicionar</button>
        </form>
    </div>
</div>