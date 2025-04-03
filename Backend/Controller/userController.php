<?php

session_start();

require_once '/Config/db.php';  
require_once '/models/user.php'; 

class LoginController {
    

    public function showLoginForm() {
       
        include '../Views/loginForm.php';
    }
    

    public function handleLogin() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
            $email = $_POST['email'];
            $password = $_POST['password'];

            $db = new DB();

          
            if ($this->checkCredentials($db, $email, $password)) {
              
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;

                $sql = "SELECT Nome_log FROM login_dash WHERE Login = ?";
                $args = array($email);
                $result = $db->send2db($sql, $args);
                
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $_SESSION['Nome_log'] = $row['Nome_log'];
                }

              
                header('Location: ../Dashboard/index.php');
                exit;

            } else {
                $_SESSION['error'] = "Credenciais inválidas. Por favor, tente novamente.";
                header('Location: ../Auth/login.php');
                exit;
            }
        }
    }
}
?>
