<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../Config/db.php';
    require_once '../models/funcs.php';
    
    $db = new DB();
    
    if (isset($_POST['email']) && isset($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if (checkCredentials($db, $email, $password)) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;

            $sql = "SELECT Nome_log FROM login_dash WHERE Login = ?";
            $args = array($email);
            $result = $db->send2db($sql, $args);
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $_SESSION['Nome_log'] = $row['Nome_log'];
            }

            header('Location: ../admin/DashMac.php');
            exit;
        } else {
            $error = "Credenciais inválidas. Por favor, tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MacDash</title>
    <link rel="shortcut icon" href="/assets/images/iconHead.png">
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #121212;
            color: #ffffff; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            margin: 0;
            padding: 0 20px; 
            box-sizing: border-box; 
        }

        .login-container {
            background-color: #f0f4f8;
            border-radius: 8px; 
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3); 
            padding: 40px; 
            width: 100%; 
            max-width: 400px; 
            text-align: center; 
        }

        .logo {
            margin-bottom: 20px; 
            width: 100px; 
        }

        h2 {
            color: #333; 
            margin-bottom: 20px; 
            font-size: 24px; 
        }

        .form-group {
            margin-bottom: 20px; 
        }

        label {
            display: block; 
            margin-bottom: 5px; 
            color: #555; 
            font-weight: bold; 
        }

        input[type="text"],
        input[type="password"] {
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            box-sizing: border-box; 
            font-size: 16px; 
            transition: border-color 0.3s ease; 
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff; 
            outline: none; 
        }

        button {
            width: 100%; 
            padding: 12px; 
            background-color: #007bff; 
            color: #ffffff; 
            border: none; 
            border-radius: 4px; 
            cursor: pointer; 
            font-size: 16px; 
            transition: background-color 0.3s ease; 
        }

        button:hover {
            background-color: #0056b3; 
        }

        .error-message {
            color: red; 
            margin: 10px 0; 
            font-weight: bold; 
        }

        .btn-voltar3 {
            display: inline-block; 
            margin-top: 15px; 
            text-decoration: none; 
            color: #007bff; 
            transition: color 0.3s ease; 
        }

        .btn-voltar3:hover {
            color: #0056b3; 
        }

        @media (max-width: 600px) {
            .login-container {
                padding: 30px; 
            }

            input[type="text"],
            input[type="password"],
            button {
                font-size: 18px; 
                padding: 15px; 
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <img src="/assets/images/logo.png" alt="Logo" class="logo"> 
        <h2>Login</h2>
        <form method="POST">
            <div class="form-group">
                <label for="email">Login</label>
                <input type="text" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
        </form>
        <?php if (isset($error)) { ?>
            <div class="error-message"><?php echo $error; ?></div>
        <?php } ?>
        <div class="detalhes-produto3">
            <a href="/public/index.php" class="btn-voltar3">Voltar</a>
        </div>
    </div>
</body>
</html>
