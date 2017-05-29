<?php
    include_once('abstract_command.php');
    class SalvarCommand extends AbstractCommand {
        function execute($entidade) {
            return $this->fachada->salvar($entidade);
        }
    }
?>
