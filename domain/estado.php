<?php
    include_once('entidade_dominio.php');

    class Estado extends EntidadeDominio {
        private $nome;
        private $uf;

        public function __construct($nome, $uf) {
            $this->nome = $nome;
            $this->uf = $uf;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getUf() {
            return $this->uf;
        }

        public function setUf($uf) {
            $this->uf = $uf;
        }
    }
?>
