<?php
    include_once('abstract_command.php');
    class ConsultarCommand extends AbstractCommand {
        function execute($entidade) {
            return $this->fachada->consultar($entidade);
        }
    }
?>
