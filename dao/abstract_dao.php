<?php
    include_once dirname(__DIR__).'/interfaces/idao.php';
    include_once dirname(__DIR__).'/config/config.php';
    include_once dirname(__DIR__).'/config/db.php';

    abstract class AbstractDAO implements IDAO {
        protected $conn;

        public function __construct() {
            $this->openConnection();
        }
        
        public function openConnection() {
            $this->conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
            mysqli_set_charset($this->conn, "utf8");
            if (mysqli_connect_errno()) {
                return 'Failed to connect to MySQL '.mysqli_connect_error();
            }
            return 'ok';
        }

        public function getConnection() {
            return $this->conn;
        }

        abstract public function inserir($entidade);
        abstract public function alterar($entidade);
        abstract public function consultar($entidade);
        abstract public function excluir($entidade);
    }
?>
