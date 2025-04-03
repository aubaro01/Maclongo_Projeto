<?php
require '../Config/config.php';
require_once '../Config/db.php';  
require '../models/funcs.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new DB();

    if ($_POST['action'] === 'edit') {
        // Código de edição do serviço
        $id = $_POST['id'];
        $nome = $_POST['Nome'];
        $descricao = $_POST['descricao'];

        if (isset($_FILES['ImgService']) && $_FILES['ImgService']['error'] === UPLOAD_ERR_OK) {
            $imagem = file_get_contents($_FILES['ImgService']['tmp_name']);
        } else {
            $imagem = null; 
        }

        editServices($db, $id, $nome, $descricao, $imagem);
    } elseif ($_POST['action'] === 'delete') {
        // Código de exclusão do serviço
        $id = $_POST['id'];
        deleteServices($db, $id); // Chama a função para deletar o serviço do banco de dados
    } elseif ($_POST['action'] === 'add') {
        // Código de adição de novo serviço
        $nome = $_POST['Nome_ser'];
        $descricao = $_POST['descricao_ser'];

        if (isset($_FILES['img_ser']) && $_FILES['img_ser']['error'] === UPLOAD_ERR_OK) {
            $imagem = file_get_contents($_FILES['img_ser']['tmp_name']);
        } else {
            die('Erro ao fazer upload da imagem.');
        }

        addServices($db, $nome, $descricao, $imagem);
    }

    // Redireciona para a mesma página após a ação
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MacDash - Gestão de Serviços</title>
    <link rel="stylesheet" href="/assets/css/Style_dash.css">
    <link rel="shortcut icon" href="/assets/images/iconHead.png">
    <script src="/assets/js/navDash.js" defer></script>
    <script src="/assets/js/service_dash.js" defer></script>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
<nav>
<div class="logo-name">
        <div class="logo-image">
            <img src="/assets/images/logo.png" alt="LOGO ICON">
        </div>
        <span class="logo_name">MacDash</span>
    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="DashMac.php">
                <i class="uil uil-estate"></i>
                <span class="link-name">Home</span>
            </a></li>
            <li><a href="Dash_contactos.php">
                <i class="uil uil-users-alt"></i>
                <span class="link-name">Contactos</span>
            </a></li>
            <li><a href="Dash_produtos.php">
                <i class="uil uil-shopping-cart-alt"></i>
                <span class="link-name">Produtos</span>
            </a></li>
        </ul>
        
        <ul class="logout-mode">
            <li><a href="/App/Auth/logout.php">
                <i class="uil uil-signout"></i>
                <span class="link-name">Logout</span>
            </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Modo Escuro</span>
                </a>
                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <div class="button-container">
        <button id="addSaleBtn" class="btn-btn-add">Adicionar Serviço</button>
    </div>
    <div class="dash-content">
        <?php
        $db = new DB();
        getServices($db);
        ?>
    </div> 
</section>

<?php  include '/assest/view/modalServ.php';?>


<?php include '/assest/view/modalEditServ.php'?>


<?php include '/assest/view/deleteServ.php'?>


<script>
function openDeleteModal(serviceId) {
    document.getElementById('deleteServiceId').value = serviceId;
    document.getElementById('deleteServiceModal').style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

</script>
</body>
</html>

