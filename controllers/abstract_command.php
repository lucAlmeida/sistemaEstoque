<?php
    include_once('fachada.php');
    include_once dirname(__DIR__).'/interfaces/icommand.php';

    abstract class AbstractCommand implements ICommand {
        protected $fachada;
        public function __construct() {
            $this->fachada = new Fachada();
        }
        abstract function execute($entidade);
    }
?>
