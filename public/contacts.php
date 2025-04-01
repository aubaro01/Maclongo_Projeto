<?php
require_once '../App/models/funcs.php';
require '../App/Config/db.php';

$success = null;
$error_message = null; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = htmlspecialchars(trim($_POST['nome']));
    $email = htmlspecialchars(trim($_POST['email']));
    $telefone = htmlspecialchars(trim($_POST['telefone']));
    $mensagem = htmlspecialchars(trim($_POST['mensagem']));

    if (!isset($_POST['privacidade'])) {
        $error_message = "Por favor, aceite os termos de privacidade.";
        $success = false;
    } else if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($mensagem)) {
        try {
            $db = new DB();
            $success = addContact($db, $nome, $email, $telefone, $mensagem);

            if (!$success) {
                $error_message = "Falha ao salvar os dados. Por favor, tente novamente.";
            }
        } catch (Exception $e) {
            $error_message = "Erro: " . $e->getMessage();
            $success = false;
        }
    } else {
        $error_message = "Por favor, preencha todos os campos obrigatórios.";
        $success = false;
    }
}
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
