<?php
require '../App/Config/db.php';
require_once '../App/models/funcs.php';
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - MacLongo</title>
    <link rel="stylesheet" href="/assets/css/Style_pages.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="/assets/images/logo.png">
    <script src="/assets/js/navBar.js"></script>
    <script src="/assets/js/script_m.js"></script> 
    <script src="/assets/js/Produtos.js"></script>   
</head>
<body>
<header>
   <?php include '../Templates/navBar.php' ?>
</header>
<main>
    <section>
        <h1 style="text-align:center;">Produtos</h1>

        <div class="product-grid" id="productGrid">
           <?php
                $db = new db();
                $Produtos = showUserProdutos($db);
                echo $Produtos;
           ?>
            </div>
    </section>
</main>
<?php include_once '../Templates/footer.php'; ?>
</body>
</html>
