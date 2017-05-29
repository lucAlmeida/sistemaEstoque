<?php
    include_once('entidade_dominio.php');
    
    class Endereco extends EntidadeDominio {
        private $logradouro;
        private $numero;
        private $cep;
        private $complemento;
        private $bairro;
        private $cidade;

        public function __construct($logradouro, $numero, $cep, 
                                    $complemento, $bairro, $cidade) {
            $this->logradouro = $logradouro;
            $this->numero = $numero;
            $this->cep = $cep;
            $this->complemento = $complemento;
            $this->bairro = $bairro;
            $this->cidade = $cidade;
        }

        public function getLogradouro() {
            return $this->logradouro;
        }

        public function setLogradouro($logradouro) {
            $this->logradouro = $logradouro;
        }

        public function getNumero() {
            return $this->numero;
        }

        public function setNumero($numero) {
            $this->numero = $numero;
        }

        public function getCep() {
            return $this->cep;
        }

        public function setCep($cep) {
            $this->cep = $cep;
        }

        public function getComplemento() {
            return $this->complemento;
        }

        public function setComplemento($complemento) {
            $this->complemento = $complemento;
        }

        public function getBairro() {
            return $this->bairro;
        }

        public function setBairro($bairro) {
            $this->bairro = $bairro;
        }

        public function getCidade() {
            return $this->cidade;
        }

        public function setCidade($cidade) {
            $this->cidade = $cidade;
        }
    }
?>
