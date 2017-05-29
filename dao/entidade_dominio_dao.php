<?php
    include_once dirname(__DIR__).'/dao/abstract_dao.php';

    class EntidadeDominioDAO extends AbstractDAO {
        public function inserir($entidade) {
            $dt_cadastro = mysqli_escape_string($this->conn, $entidade->getDtCadastro());
            $query = "INSERT INTO entidades_dominio(dt_cadastro) VALUES ('$dt_cadastro')";

            if (mysqli_query($this->conn, $query)) {
                $entidade->setId(mysqli_insert_id($this->conn));
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }            
        }

        public function alterar($entidade) {
            $query = "UPDATE entidades_dominio SET dt_cadastro='$dt_cadastro',
                                               WHERE id_entidade={$id_entidade}";
            $dt_cadastro = mysqli_real_escape_string($conn, $entidade->getDtCadastro());

            if (mysqli_query($conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }            
        }

        public function excluir($entidade) {
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());

            $query = "DELETE FROM entidades_dominio WHERE id_entidade={$id_entidade}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $query = "SELECT * FROM entidades_dominio WHERE `id_entidade`={$id_entidade}";
            $result = mysqli_query($this->conn, $query);            
            $ent = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $ent;
        }
    }
?>
