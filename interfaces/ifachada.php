<?php
    interface IFachada {
        public function executarRegras($entidade, $op);
        public function salvar($entidade);
        public function alterar($entidade);
        public function excluir($entidade);
        public function consultar($entidade);
    }
?>
