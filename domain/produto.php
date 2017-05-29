<?php
    include_once('entidade_dominio.php');
    class Produto extends EntidadeDominio {
        private $descricao;
        private $preco;
        private $quantidade;

        public function __construct($descricao, $preco, $quantidade) {
            $this->descricao = $descricao;
            $this->preco = $preco;
            $this->quantidade = $quantidade;
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
    }
?>
