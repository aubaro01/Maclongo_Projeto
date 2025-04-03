<?php
require_once '../Backend/Config/config.php'; 
session_start();
session_unset();
session_destroy();
header('Location: ../public/index.php');
exit;
?>
