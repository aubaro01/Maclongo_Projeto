<?php
require_once '../App/models/funcs.php';
require '../App/Config/db.php';
?>

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serviços - MacLongo</title>
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/assets/css/Style_pages.css">
    <script src="/assets/js/services.js"></script>
    
</head>
<body>

<header>
<?php  include '../Templates/navBar.php'?>
</header>


<main>
   <section id="servicos" class="sec_servicos">
      <h2 style="text-align: center;"><strong>Nossos Serviços</strong></h2>
      <div class="container_service">
      <?php
                $db = new db();
                $Services = showUserServices($db);
                echo $Services;
            ?>
      </div>
   </section>
</main>

<?php include_once '../Templates/footer.php'; ?>
</body>
</html>