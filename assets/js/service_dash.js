
    function openEditModal(serviceId, serviceName, serviceDescription) {
        document.getElementById("serviceId").value = serviceId;
        document.getElementById("editServiceName").value = serviceName;
        document.getElementById("editServiceDescription").value = serviceDescription;
        document.getElementById("editServiceModal").style.display = "block";
    }

    function openDeleteModal(serviceId) {
        document.getElementById("deleteServiceId").value = serviceId;
        document.getElementById("deleteServiceModal").style.display = "block";
    }

    function closeModal(modalId) {
        document.getElementById(modalId).style.display = "none";
    }

    document.getElementById('addSaleBtn').onclick = function() {
        document.getElementById('addModal').style.display = 'block';
    };

    window.onclick = function(event) {
        if (event.target.classList.contains('modal')) {
            event.target.style.display = 'none';
        }
    };
