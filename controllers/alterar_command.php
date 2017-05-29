<?php
    include_once('abstract_command.php');
    class AlterarCommand extends AbstractCommand {
        function execute($entidade) {
            return $this->fachada->alterar($entidade);
        }
    }
?>
