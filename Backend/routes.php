<?php
require_once '../App/Config/db.php'; // Configuração de banco de dados
//Rotas para contatos
require_once '/Controller/ContaController.php';
require_once '/models/ContactsM.php';


//Rotas para os produtps
require_once '/Controller/ProdController.php';
require_once '/models/productsM.php';

//Rotas para os serviços
require_once '/Controller/ServController.php';
require_once '/models/serviceM.php';

//Rotas para auth
require_once '/Controller/userController.php';
require_once '/models/user.php';


$uri = $_SERVER['REQUEST_URI']; 
$method = $_SERVER['REQUEST_METHOD']; 

switch ($uri) {
    case '/':
        if ($method === 'GET') {
            echo "Bem-vindo à página inicial!";
        }
        break;

    case '/contato':
        if ($method === 'GET') {
            $controller = new ContatoController();
            $controller->showContactForm();
        } elseif ($method === 'POST') {
            $controller = new ContatoController();
            $controller->handleFormSubmission();
        }
        break;

    case '/contatos':
        if ($method === 'GET') {
            $controller = new ContatoController();
            $controller->getContacts();
        }
        break;

    case '/contato/delete':
        if ($method === 'POST') {
            $id = $_POST['id'];
            $controller = new ContatoController();
            $controller->deleteContato($id);
        }
        break;

    case '/contato/edit':
        if ($method === 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $assunto = $_POST['assunto'];
            $controller = new ContatoController();
            $controller->editContato($id, $nome, $email, $assunto);
        }
        break;

    case '/produtos':
        if ($method === 'GET') {
            $controller = new ProdController();
            $controller->showProducts();
        }
        break;

    case '/servicos':
        if ($method === 'GET') {
            $controller = new ServController();
            $controller->showServices();
        }
        break;

    case '/login':
        if ($method === 'GET') {
            $controller = new UserController();
            $controller->showLoginForm();
        } elseif ($method === 'POST') {
            $controller = new UserController();
            $controller->handleLogin();
        }
        break;

    default:
        http_response_code(404);
        require_once '../Backend/view/error404.php';
        break;
}
?>
