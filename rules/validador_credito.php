<?php
    include_once dirname(__DIR__).'/interfaces/istrategy.php';
    class ValidadorCredito implements IStrategy {
        public function processar($entidade) {
            if ($entidade->getCredito() < 100) {
                return "Crédito deve ser maior ou igual a 100!";
            }
            return null;
        }
    }    
?>
