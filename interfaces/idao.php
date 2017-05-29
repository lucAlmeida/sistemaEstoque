<?php
    interface IDAO {
        public function inserir($entidade);
        public function alterar($entidade);
        public function excluir($entidade);
        public function consultar($entidade);
    }
?>
