<?php
    include_once('entidade_dominio.php');
    class Cidade extends EntidadeDominio {
        private $nome;
        private $estado;

        public function __construct($nome, $estado) {
            $this->nome = $nome;
            $this->estado = $estado;
        }

        public function getNome() {
            return $this->nome;
        }

        public function setNome($nome) {
            $this->nome = $nome;
        }

        public function getEstado() {
            return $this->estado;
        }

        public function setEstado($estado) {
            $this->estado = $estado;
        }
    }
?>
