<?php
    include_once('pessoa.php');

    class Cliente extends Pessoa {
        private $cpf;
        private $credito;

        public function __construct($nome, $email, $endereco, $telefone, $cpf, $credito) {
            parent::__construct($nome, $email, $endereco, $telefone);
            $this->cpf = $cpf;
            $this->credito = $credito;
        }

        public function getCpf() {
            return $this->cpf;
        }

        public function setCpf($cpf) {
            $this->cpf = $cpf;
        }

        public function getCredito() {
            return $this->credito;
        }

        public function setCredito($credito) {
            $this->credito = $credito;
        }

        public function depositar($quantia) {
            $this->credito += $quantia;
        }

        public function sacar($quantia) {
            $this->credito -= $quantia;
        }
    }
?>
