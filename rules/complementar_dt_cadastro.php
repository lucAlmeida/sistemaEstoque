<?php
    include_once dirname(__DIR__).'/interfaces/istrategy.php';
    class ComplementarDtCadastro implements IStrategy {
        public function processar($entidade) {
            $entidade->setDtCadastro(date('Y/m/d h:i:s'));
        }
    }
?>
