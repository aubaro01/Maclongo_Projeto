<?php

require_once 'Config/db.php';  

class ProdutoModel {

    private $conn;
    private $table_name = ""; 

    public $id;
    public $nome;
    public $descricao;
    public $preco;
    public $quantidade;
    public $imagem;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function createProduto() {
        $query = "INSERT INTO " . $this->table_name . " (Nome_produto, Produto_descricao, Produto_img, Preco, Quantidade) 
                  VALUES (:nome, :descricao, :imagem, :preco, :quantidade)";
        
        $stmt = $this->conn->prepare($query);
        

        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":imagem", $this->imagem);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":quantidade", $this->quantidade);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function getAllProdutos() {
        $query = "SELECT id, Nome_produto, Produto_descricao, Produto_img, Preco, Quantidade FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        
        return $stmt;
    }

    public function getProdutoById() {
        $query = "SELECT id, Nome_produto, Produto_descricao, Produto_img, Preco, Quantidade FROM " . $this->table_name . " WHERE id = :id LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":id", $this->id);
        $stmt->execute();

 
        if ($stmt->rowCount() > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->nome = $row['Nome_produto'];
            $this->descricao = $row['Produto_descricao'];
            $this->imagem = $row['Produto_img'];
            $this->preco = $row['Preco'];
            $this->quantidade = $row['Quantidade'];
            return true;
        }

        return false;
    }


    public function updateProduto() {
        $query = "UPDATE " . $this->table_name . " SET Nome_produto = :nome, Produto_descricao = :descricao, Produto_img = :imagem, Preco = :preco, Quantidade = :quantidade WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);

        
        $stmt->bindParam(":nome", $this->nome);
        $stmt->bindParam(":descricao", $this->descricao);
        $stmt->bindParam(":imagem", $this->imagem);
        $stmt->bindParam(":preco", $this->preco);
        $stmt->bindParam(":quantidade", $this->quantidade);
        $stmt->bindParam(":id", $this->id);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function deleteProduto() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        
        $stmt->bindParam(":id", $this->id);
        
        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

     public function showUserProdutos($db) {
        $sql = "SELECT Nome_produto, Produto_descricao, Produto_img FROM produtos"; 
        $result = $db->send2db($sql);
    
        if ($result === false) {
            die('Erro ao executar a consulta de produtos.');
        }
    
        if ($result->num_rows > 0) {
            echo '<section class="product-container">'; 
    
            while ($row = $result->fetch_assoc()) {
                $nomeProduto = htmlspecialchars($row['Nome_produto'], ENT_QUOTES);
                $descricaoProduto = htmlspecialchars($row['Produto_descricao'], ENT_QUOTES);
    
                echo '<div class="product-item" onclick="openModal(\'' . addslashes($nomeProduto) . '\', \'' . addslashes($descricaoProduto) . '\', \'data:image/jpeg;base64,' . base64_encode($row['Produto_img']) . '\')">';
                echo '<img class="product-image" src="data:image/jpeg;base64,' . base64_encode($row['Produto_img']) . '" alt="' . $nomeProduto . '">';
                echo '<h3 class="product-title">' . $nomeProduto . '</h3>';
                echo '</div>';
            }
    
            echo '</section>';
        } else {
            echo '<p>Nenhum produto disponível no momento.</p>';
        }
    
    
        echo '
    <div id="product-modal" class="custom-modal" style="display:none;">
        <div class="custom-modal-content">
            <span class="custom-close" onclick="closeModal()">&times;</span>
            <img id="modal-product-image" src="" alt="Imagem do Produto" class="modal-image">
            <h3 id="modal-product-title" class="modal-title"></h3>
            <p id="modal-product-category" class="modal-category"><strong>Acessórios:</strong></p>
            <p id="modal-product-description" class="modal-description"></p>
            <p class="modal-greeting">Para mais informações e orçamentos, por favor contacte-nos!</p>
            <button class="modal-quote-button" onclick="window.location.href=\'/index.php#contactos\'">Pedir Orçamento</button>
        </div>
    </div>';
    }
}
?>
