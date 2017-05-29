<?php
    include_once('abstract_command.php');
    class ExcluirCommand extends AbstractCommand {
        function execute($entidade) {
            return $this->fachada->excluir($entidade);
        }
    }
?>
