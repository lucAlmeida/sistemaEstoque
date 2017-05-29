<?php
    include_once('pessoa.php');
    class Fornecedor extends Pessoa {
        private $cpf;
        private $despesas;

        public function __construct($nome, $email, $endereco, $telefone, $cnpj, $credito) {
            parent::__construct($nome, $email, $endereco, $telefone);
            $this->cnpj = $cnpj;
            $this->despesas = $despesas;
        }

        public function getCnpj() {
            return $this->cnpj;
        }

        public function setCnpj($cnpj) {
            $this->cnpj = $cnpj;
        }
        
        public function getDespesas() {
            return $this->despesas;
        }

        public function setDespesas($despesas) {
            $this->despesas = $despesas;
        }

        public function incrementarDespesas($quantia) {
            $this->despesas += $quantia;
        }

        public function decrementarDespesas($quantia) {
            $this->despesas -= $quantia;
        }
    }
?>
