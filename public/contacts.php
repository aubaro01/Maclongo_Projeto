<?php
require_once '../Backend/Config/db.php';  
require_once '../Backend/Controller/ContaController.php';  

$db = new DB();

$contactController = new ContactController($db);

$result = $contactController->handleFormSubmission();
$success = $result['success'];
$error_message = $result['error_message'];
?>


<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="MACLONGO: Produtos e serviços de alta qualidade para a indústria e ferramentas">
    <title>Contato - Maclongo</title>
    <link rel="stylesheet" href="/assets/css/Style_Main.css">
    <link rel="stylesheet" href="/assets/css/Style_pages.css">
    <link rel="shortcut icon" href="/assets/images/iconHead.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<header>
    <? include  '../Templates/navBar.php'; ?>
</header>

<main>
    <section class="success-message">
        <?php if ($success): ?>
            <h1>Contato Enviado!</h1>
            <p>O seu contato foi enviado com sucesso. Agradecemos por entrar em contato conosco!</p>
            <p>Em breve, entraremos em contato.</p>
            <a href="index.php" class="btn btn-primary">Voltar para a página inicial</a>
        <?php else: ?>
            <h1>Erro ao enviar o contato</h1>
            <p><?php echo htmlspecialchars($error_message); ?></p>
            <a href="index.php" class="btn btn-primary">Voltar para a página inicial</a>
        <?php endif; ?>
    </section>
</main>

<?php include_once '../Templates/footer.php'; ?>
</body>
</html>
