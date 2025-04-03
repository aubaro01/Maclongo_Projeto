document.getElementById('addProductBtn').onclick = function() {
    document.getElementById('addProductModal').style.display = 'block';
};

function openEditModal(productId, productName, productDescription) {
    document.getElementById("editProductId").value = productId;
    document.getElementById("editProductName").value = productName;
    document.getElementById("editProductDescription").value = productDescription;
    document.getElementById("editProductModal").style.display = "block";
}

function openDeleteModal(productId) {
    document.getElementById("deleteProductId").value = productId;
    document.getElementById("deleteProductModal").style.display = "block";
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = "none";
}

window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
        event.target.style.display = 'none';
    }
};
