<?php

function showUserServices($db) {
    $sql = "SELECT Nome_serviço, descricao_serviço, img_serviço FROM serviços"; 
    $result = $db->send2db($sql);

    if ($result === false) {
        die('Erro ao executar a consulta de serviços.');
    }

    if ($result->num_rows > 0) {
        echo '<section class="container_service">'; SS

        while ($row = $result->fetch_assoc()) {
            echo '<article class="service_card">';
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img_serviço']) . '" alt="' . htmlspecialchars($row['Nome_serviço']) . '">';
            echo '<h3>' . htmlspecialchars($row['Nome_serviço']) . '</h3>';
            echo '<p>' . htmlspecialchars($row['descricao_serviço']) . '</p>';
            echo '<button href="/public/index.php#contactos" class="service-button">Reservar Serviço</button>';
            echo '</article>';
        }

        echo '</section>';
    } else {
        echo '<p>Nenhum serviço disponível.</p>';
    }
}


function showUserProdutos($db) {
    $sql = "SELECT Nome_produto, Produto_descricao, Produto_img FROM produtos"; 
    $result = $db->send2db($sql);

    if ($result === false) {
        die('Erro ao executar a consulta de produtos.');
    }

    if ($result->num_rows > 0) {
        echo '<section class="product-container">'; // Container for products

        while ($row = $result->fetch_assoc()) {
            $nomeProduto = htmlspecialchars($row['Nome_produto'], ENT_QUOTES);
            $descricaoProduto = htmlspecialchars($row['Produto_descricao'], ENT_QUOTES);

            echo '<div class="product-item" onclick="openModal(\'' . addslashes($nomeProduto) . '\', \'' . addslashes($descricaoProduto) . '\', \'data:image/jpeg;base64,' . base64_encode($row['Produto_img']) . '\')">';
            echo '<img class="product-image" src="data:image/jpeg;base64,' . base64_encode($row['Produto_img']) . '" alt="' . $nomeProduto . '">';
            echo '<h3 class="product-title">' . $nomeProduto . '</h3>';
            echo '</div>';
        }

        echo '</section>';
    } else {
        echo '<p>Nenhum produto disponível no momento.</p>';
    }


    echo '
<div id="product-modal" class="custom-modal" style="display:none;">
    <div class="custom-modal-content">
        <span class="custom-close" onclick="closeModal()">&times;</span>
        <img id="modal-product-image" src="" alt="Imagem do Produto" class="modal-image">
        <h3 id="modal-product-title" class="modal-title"></h3>
        <p id="modal-product-category" class="modal-category"><strong>Acessórios:</strong></p>
        <p id="modal-product-description" class="modal-description"></p>
        <p class="modal-greeting">Para mais informações e orçamentos, por favor contacte-nos!</p>
        <button class="modal-quote-button" onclick="window.location.href=\'/index.php#contactos\'">Pedir Orçamento</button>
    </div>
</div>';
}

