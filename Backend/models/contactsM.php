<?php

class Produto {
    // Atributos
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $quantidade;


    public function __construct($id, $nome, $descricao, $preco, $quantidade) {
        $this->id = $id;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->quantidade = $quantidade;
    }


    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

    // Métodos adicionais
    public function aumentarEstoque($quantidade) {
        $this->quantidade += $quantidade;
    }

    public function diminuirEstoque($quantidade) {
        if ($this->quantidade >= $quantidade) {
            $this->quantidade -= $quantidade;
        } else {
            echo "Estoque insuficiente!";
        }
    }

    // Método para exibir as informações do produto
    public function exibirProduto() {
        echo "ID: " . $this->getId() . "\n";
        echo "Nome: " . $this->getNome() . "\n";
        echo "Descrição: " . $this->getDescricao() . "\n";
        echo "Preço: " . number_format($this->getPreco(), 2, ',', '.') . "\n";
        echo "Quantidade em estoque: " . $this->getQuantidade() . "\n";
    }
}
?>
