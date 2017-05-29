<?php
    include_once('abstract_command.php');
    class ConsultarTodosCommand extends AbstractCommand {
        function execute($entidade = null) {
            return $this->fachada->consultarTodos($entidade);
        }
    }
?>
