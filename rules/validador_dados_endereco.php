<?php
    include_once dirname(__DIR__).'/interfaces/istrategy.php';
    class ValidadorDadosEndereco implements IStrategy {
        public function processar($entidade) {
            if (is_null($entidade->cep)) {
                return 'CEP é um campo obrigatório';
            }
            return null;
        }
    }
?>
