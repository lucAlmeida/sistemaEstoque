<?php
    include_once dirname(__DIR__).'/interfaces/istrategy.php';
    class ValidadorExistencia implements IStrategy {
        public function processar($entidade) {
            if (is_null($entidade)) {
                return 'Entidade não existe...';
            }
            return null;
        }
    }    
?>
