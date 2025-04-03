<div id="editServiceModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('editServiceModal')">&times;</span>
        <h2>Editar Serviço</h2>
        <form id="editServiceForm" method="post" enctype="multipart/form-data">
            <input type="hidden" name="action" value="edit">
            <input type="hidden" name="id" id="serviceId">
            <label for="editServiceName">Nome do Serviço:</label>
            <input type="text" id="editServiceName" name="Nome" required>
            
            <label for="editServiceDescription">Descrição do Serviço:</label>
            <textarea id="editServiceDescription" name="descricao" rows="3" required></textarea>
            
            <label for="editImgService">Imagem do Serviço:</label>
            <input type="file" id="editImgService" name="ImgService" accept="image/*">
            <button type="submit" class="btn">Salvar</button>
        </form>
    </div>