<?php
    include_once dirname(__DIR__).'/interfaces/istrategy.php';
    class ValidadorDadosCliente implements IStrategy {
        public function processar($entidade) {
            if (is_null($entidade->getCpf())) {
                return 'CPF é um campo obrigatório';
            }
            return null;
        }
    }    
?>
