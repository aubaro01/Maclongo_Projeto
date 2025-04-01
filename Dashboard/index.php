<?php 
require '../models/funcs.php';
require_once '../Config/db.php';
require '../Config/config.php';

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: ./public/index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/images/iconHead.png" alt="Logotipo MacLongo">
    <link rel="stylesheet" href="/assets/css/Style_dash.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <script src="/assets/js/navDash.js" defer></script>
    <title>MacDash - Gestão</title>
</head>
<body>
<header   

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
    </div>
    <br>
    <div class="welcome-message">
        <h2>Bem-vindo ao Mydash</h2>
        <p>Algumas estatísticas do site</p>
    </div>

    <div class="cards-container">
        <div class="card">
            <i class="uil uil-users-alt"></i>
            <h3>Total de Contactos</h3>
            <p>
                <?php
                    $db = new db(); 
                    $totalContacts = countAllContact($db); 
                    echo $totalContacts;
                ?>
            </p>
        </div>

        <div class="card">
            <i class="uil uil-shopping-cart-alt"></i>
            <h3>Total de Clientes</h3>
            <p>
                <?php
                    $db = new db();
                    $totalProdutos = CountallClients($db);
                    echo $totalProdutos;
                ?>
            </p>
        </div>

        <div class="card">
            <i class="uil uil-comments"></i>
            <h3>Total de Carros</h3>
            <p>
                <?php
                    $db = new db();
                    $totalServiços = countAllCarrs($db);
                    echo $totalServiços;
                ?>
            </p>
        </div>
    </div>

    <!-- Marcações do Dia -->
    <div class="daily-appointments">
        <h3>Marcações do Dia</h3>
        <?php
            $appointments = getAppointmentsForToday($db);
            if (count($appointments) > 0) {
                echo '<table class="appointments-table">';
                echo '<thead><tr><th>ID</th><th>Cliente</th><th>Serviço</th><th>Hora</th></tr></thead>';
                echo '<tbody>';
                foreach ($appointments as $appointment) {
                    echo '<tr>';
                    echo '<td>' . $appointment['id'] . '</td>';
                    echo '<td>' . $appointment['cliente'] . '</td>';
                    echo '<td>' . $appointment['servico'] . '</td>';
                    echo '<td>' . $appointment['hora'] . '</td>';
                    echo '</tr>';
                }
                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>Não há marcações para hoje.</p>';
            }
        ?>
    </div>

</section>
</body>
</html>
