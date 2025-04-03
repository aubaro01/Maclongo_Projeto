<div id="deleteServiceModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal('deleteServiceModal')">&times;</span>
        <h2>Excluir Serviço</h2>
        <p>Tem certeza de que deseja excluir este serviço?</p>
        <form id="deleteServiceForm" method="post">
            <input type="hidden" name="action" value="delete">
            <input type="hidden" name="Serviço_id" id="deleteServiceId">
            <button type="submit" class="btn btn-delete">Excluir</button>
            <button type="button" class="btn" onclick="closeModal('deleteServiceModal')">Cancelar</button>
        </form>
    </div>
</div>