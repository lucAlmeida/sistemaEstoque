<?php
    include_once dirname(__DIR__).'/interfaces/istrategy.php';

    class ValidadorCPF implements IStrategy {
        public function processar($entidade) {
            if (is_null($entidade->getCpf()) or (strlen($entidade->getCpf()) != 11)) {
                return "O CPF deve ter apenas 11 dígitos";
            }
            return null;
        }
    }    
?>
