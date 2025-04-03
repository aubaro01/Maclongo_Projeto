<?php
session_start();

require_once '../Backend/Controller/userController.php';

$controller = new LoginController();

$controller->handleLogin();
?>


<<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Área Corporativa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Arial', 'Helvetica', sans-serif;
        }
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f5f5f5;
        }
        
        .login-container {
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 420px;
            padding: 35px;
        }
        
        .login-header {
            margin-bottom: 30px;
        }
        
        .login-header h1 {
            color: #333;
            font-size: 24px;
            font-weight: 500;
            margin-bottom: 8px;
        }
        
        .login-header p {
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .input-group {
            margin-bottom: 22px;
        }
        
        .input-group label {
            display: block;
            color: #333;
            margin-bottom: 6px;
            font-size: 13px;
            font-weight: 500;
        }
        
        .input-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            font-size: 14px;
            color: #333;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #fafafa;
        }
        
        .input-group input:focus {
            border-color: #4d4d4d;
            outline: none;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.05);
            background-color: #fff;
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            font-size: 13px;
        }
        
        .remember-forgot label {
            color: #555;
            display: flex;
            align-items: center;
        }
        
        .remember-forgot input {
            margin-right: 8px;
        }
        
        .remember-forgot a {
            color: #555;
            text-decoration: none;
        }
        
        .remember-forgot a:hover {
            color: #000;
            text-decoration: underline;
        }
        
        .login-button {
            background-color: #333;
            color: white;
            border: none;
            border-radius: 3px;
            padding: 12px;
            width: 100%;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .login-button:hover {
            background-color: #222;
        }
        
        .signup-link {
            text-align: center;
            margin-top: 25px;
            font-size: 13px;
            color: #666;
        }
        
        .signup-link a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }
        
        .signup-link a:hover {
            text-decoration: underline;
        }

        .divider {
            margin: 25px 0;
            text-align: center;
            position: relative;
        }

        .divider::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #e0e0e0;
        }

        .divider span {
            position: relative;
            background-color: white;
            padding: 0 15px;
            color: #888;
            font-size: 12px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #888;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Acesso ao Sistema</h1>
            <p>Insira suas credenciais para acessar sua conta</p>
        </div>
        
        <form action="#" method="post">
            <div class="input-group">
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="username" required>
            </div>
            
            <div class="input-group">
                <label for="password">Senha</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="login-button">Login</button>
  
        </form>

        <div class="footer">
            © 2025 Maclongo. Todos os direitos reservados.
        </div>
    </div>
</body>
</html>
