<?php
class ContatoModel {

    private $db;

    public function __construct($db) {
        $this->db = $db; 
    }

    public function addContato($nome, $email, $telefone, $assunto) {
        $sql = "INSERT INTO contatos (Nome_Cliente, Email, Telefone, Assunto) VALUES (?, ?, ?, ?)";
        $stmt = $this->db->send2db($sql, [$nome, $email, $telefone, $assunto]);

        if ($stmt === false) {
            return false; 
        }
        return true; 
    }

  
    public function editContato($id, $nome, $email, $assunto) {
        $sql = "UPDATE contatos SET Nome_Cliente=?, Email=?, Assunto=? WHERE Cont_id=?";
        $stmt = $this->db->send2db($sql, [$nome, $email, $assunto, $id]);

        if ($stmt === false) {
            return false; 
        }
        return true; 
    }

    public function deleteContato($id) {
        $sql = "DELETE FROM contatos WHERE Cont_id=?";
        $stmt = $this->db->send2db($sql, [$id]);

        if ($stmt === false) {
            return false; 
        }
        return true; 
    }

    
    public function countAllContacts() {
        $sql = "SELECT COUNT(*) AS total_contacts FROM contatos";
        $result = $this->db->send2db($sql);

        if ($result === false) {
            return false;
        }

        $row = $result->fetch_assoc();
        return $row['total_contacts'];
    }

    
    public function getContacts() {
        $sql = "SELECT Cont_id, Nome_Cliente, Telefone, Email, Assunto FROM contatos";
        $result = $this->db->send2db($sql);

        if ($result === false) {
            return false;
        }

        return $result; 
    }
}
?>
