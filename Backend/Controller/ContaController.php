<?php
require_once '/models/contactM.php'; 

class ContactController {

    private $contactModel;

    public function __construct($db) {
        $this->contactModel = new ContactModel($db);
    }

    public function handleFormSubmission() {
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
            }
            else if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($mensagem)) {
                try {
                    $result = $this->contactModel->addContact($nome, $email, $telefone, $mensagem);

                    if ($result) {
                        $success = true;
                    } else {
                        $error_message = "Falha ao salvar os dados. Por favor, tente novamente.";
                        $success = false;
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

        return ['success' => $success, 'error_message' => $error_message];
    }
}
?>
