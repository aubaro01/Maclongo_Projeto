<?php

require '../Config/config.php'; 
require_once '../Config/db.php';
require '../models/funcs.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new DB();

    if ($_POST['action'] === 'edit') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        
        if (isset($_FILES['imagem'])) {
            if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            } else {
                switch ($_FILES['imagem']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        die('Erro: O arquivo excede o tamanho permitido.');
                    case UPLOAD_ERR_PARTIAL:
                        die('Erro: O upload foi feito parcialmente.');
                    case UPLOAD_ERR_NO_FILE:
                        die('Erro: Nenhum arquivo foi enviado.');
                    default:
                        die('Erro desconhecido ao fazer upload.');
                }
            }
        } else {
            die('Erro: Nenhuma imagem foi enviada.');
        }

        editProduct($db, $id, $nome, $descricao, $imagem);
    } elseif ($_POST['action'] === 'delete') {
        $id = $_POST['id'];
        deleteProduct($db, $id);
    } elseif ($_POST['action'] === 'add') {
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        
        if (isset($_FILES['imagem'])) {
            if ($_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
                $imagem = file_get_contents($_FILES['imagem']['tmp_name']);
            } else {
                switch ($_FILES['imagem']['error']) {
                    case UPLOAD_ERR_INI_SIZE:
                    case UPLOAD_ERR_FORM_SIZE:
                        die('Erro: O arquivo excede o tamanho permitido.');
                    case UPLOAD_ERR_PARTIAL:
                        die('Erro: O upload foi feito parcialmente.');
                    case UPLOAD_ERR_NO_FILE:
                        die('Erro: Nenhum arquivo foi enviado.');
                    default:
                        die('Erro desconhecido ao fazer upload.');
                }
            }
        } else {
            die('Erro: Nenhuma imagem foi enviada.');
        }

        addProduct($db, $nome, $descricao, $imagem);
    }

    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}


?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacDash - Gestão de Produtos</title>
    <link rel="stylesheet" href="/assets/css/Style_dash.css">
    <link rel="shortcut icon" href="/assets/images/iconHead.png">
    <script src="/assets/js/navDash.js" defer></script>
    <script src="/assets/js/products_dash.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<nav>
    <div class="logo-name">
        <div class="logo-image">
            <img src="/assets/images/logo.png" alt="LOGO ICON">
        </div>
        <span class="logo_name">MacDash - Produtos</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="DashMac.php"><i class="uil uil-estate"></i><span class="link-name">Home</span></a></li>
            <li><a href="Dash_contactos.php"><i class="uil uil-users-alt"></i><span class="link-name">Contactos</span></a></li>
            <li><a href="Dash_servicos.php"><i class="uil uil-comments"></i><span class="link-name">Serviços</span></a></li>
        </ul>
        <ul class="logout-mode">
            <li><a href="../Auth/logout.php"><i class="uil uil-signout"></i><span class="link-name">Logout</span></a></li>
            <li class="mode">
                <a href="#"><i class="uil uil-moon"></i><span class="link-name">Modo Escuro</span></a>
                <div class="mode-toggle"><span class="switch"></span></div>
            </li>
        </ul>
    </div>
</nav>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <div class="button-container">
        <button id="addProductBtn" class="btn-btn-add">Adicionar Produto</button>
    </div>
    <div class="dash-content">
        <?php
        $db = new DB();
        getProducts($db);
        ?>
    </div> 
</section>

<?php  include '/assest/view/modalProd.php';?>


<?php include '/assest/view/modalEditProd.php'?>


<script>
function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

document.getElementById('addProductBtn').onclick = function() {
    document.getElementById('addProductModal').style.display = 'block';
};
</script>
</body>
</html>

