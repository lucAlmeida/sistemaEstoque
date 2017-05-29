<?php
    class EntidadeDominio {
        private $id;
        private $dtCadastro;

        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getDtCadastro() {
            return $this->dtCadastro;
        }

        public function setDtCadastro($dtCadastro) {
            $this->dtCadastro = $dtCadastro;
        }
    }
?>
