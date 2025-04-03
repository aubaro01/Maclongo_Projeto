<?php
require_once '/Config/db.php';  

class User {
    private $conn;
    private $table_name = "admin"; 

    public $id;
    public $nome;
    public $LogName;
    public $Password;

    public function __construct($db) {
        $this->conn = $db;
    }

       public function getUser() {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":id", $this->id);

        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->nome = $row['nome'];
            $this->LogName = $row['LogName'];
            $this->Password = $row['Password'];
            $this->outro = $row['outro'];

            return true;
        }

        return false;
    }

    public function checkCredentials($db, $email, $password)
    {
        $sql = "SELECT * FROM login_dash WHERE Login = ? AND password = ?";
        $args = [$email, $password];
        $result = $db->send2db($sql, $args);
    
        if ($result->num_rows > 0) {
            return true;
        }
    
        return false;
    }

}
?>
