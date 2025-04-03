<?php

require_once '/models/productsM.php'; 
require_once '/Config/db.php';  

class ProdutoController {

    private $db;
    private $produtoModel;

    public function __construct() {
        $this->db = (new Database())->getConnection();  
        $this->produtoModel = new ProdutoModel($this->db); 
    }

   
    public function getProduts() {
        $result = $this->produtoModel->getAllProdutos();

                if ($r->num_rows > 0) {
                    echo '<section class="products-container">';
                    while ($row = $r->fetch_assoc()) {
                        $produtoNome = htmlspecialchars($row['Nome_produto'], ENT_QUOTES);
                        $produtoDescricao = htmlspecialchars($row['Produto_descricao'], ENT_QUOTES);
                        $produtoId = $row['Produto_id'];
                        $produtoImagem = base64_encode($row['Produto_img']);
            
                        echo '<div class="product-card">';
                        echo '<img class="product-image" src="data:image/jpeg;base64,' . $produtoImagem . '" alt="' . $produtoNome . '">';
                        echo '<h3 class="product-title">' . $produtoNome . '</h3>';
                        echo '<p class="product-description">' . $produtoDescricao . '</p>';
                        echo '<div class="product-actions">';
                        echo '<button type="button" class="btn btn-edit" onclick="openEditModal(' . $produtoId . ', \'' . addslashes($produtoNome) . '\', \'' . addslashes($produtoDescricao) . '\')">Editar</button>';
                        echo '<form method="post" style="display:inline-block;">';
                        echo '<input type="hidden" name="action" value="delete">';
                        echo '<input type="hidden" name="id" value="' . $produtoId . '">';
                        echo '<button type="submit" class="btn btn-delete">Excluir</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                    }
            
                    echo '</section>';
                } else {
                    echo '<p>Nenhum produto encontrado.</p>';
                }
            }

    public function showUserProduts($id) {
        $this->produtoModel->id = $id;

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

    public function criarProduto($nome, $descricao, $imagem, $preco, $quantidade) {
        $this->produtoModel->nome = $nome;
        $this->produtoModel->descricao = $descricao;
        $this->produtoModel->imagem = $imagem;
        $this->produtoModel->preco = $preco;
        $this->produtoModel->quantidade = $quantidade;

        if ($this->produtoModel->createProduto()) {
            echo "Produto criado com sucesso!";
        } else {
            echo "Erro ao criar produto.";
        }
    }

    public function atualizarProduto($id, $nome, $descricao, $imagem, $preco, $quantidade) {
        $this->produtoModel->id = $id;
        $this->produtoModel->nome = $nome;
        $this->produtoModel->descricao = $descricao;
        $this->produtoModel->imagem = $imagem;
        $this->produtoModel->preco = $preco;
        $this->produtoModel->quantidade = $quantidade;

        if ($this->produtoModel->updateProduto()) {
            echo "Produto atualizado com sucesso!";
        } else {
            echo "Erro ao atualizar produto.";
        }
    }

    public function excluirProduto($id) {
        $this->produtoModel->id = $id;

        if ($this->produtoModel->deleteProduto()) {
            echo "Produto excluído com sucesso!";
        } else {
            echo "Erro ao excluir produto.";
        }
    }
}
?>
