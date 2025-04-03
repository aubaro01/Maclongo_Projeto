<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de Serviço</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h2>Reserva de Serviço</h2>

    <?php
    $servico = isset($_GET['servico']) ? $_GET['servico'] : 'Serviço Não Especificado';
    echo "<h3>Serviço: $servico</h3>";
    ?>

    <form action="confirmar_reserva.php" method="post">
        <input type="hidden" name="servico" value="<?php echo $servico; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="data">Data da Reserva:</label>
        <input type="date" id="data" name="data" required>

        <label for="observacoes">Observações:</label>
        <textarea id="observacoes" name="observacoes"></textarea>

        <button type="submit">Confirmar Reserva</button>
    </form>
</body>
</html>
