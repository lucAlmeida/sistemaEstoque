<?php
    include_once('entidade_dominio_dao.php');
    include_once dirname(__DIR__).'/config/config.php';

    class CidadeDAO extends EntidadeDominioDAO {
        public function inserir($entidade) {
            parent::inserir($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $nome = mysqli_real_escape_string($this->conn, $entidade->getNome());
            $estado = mysqli_real_escape_string($this->conn, $entidade->getEstado()->getUf());

            $query = "INSERT INTO cidades(nome, estado, id_entidade) VALUES ('$nome', '$estado', '$id_entidade')";
            
            if (mysqli_query($this->conn, $query)) {                
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function alterar($entidade) {
            parent::alterar($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $nome = mysqli_real_escape_string($this->conn, $entidade->getNome());
            $estado = mysqli_real_escape_string($this->conn, $entidade->getEstado()->getUf());

            $query = "UPDATE cidades SET nome='$nome',
                                         estado='$estado'
                                         WHERE id_entidade={$id_entidade}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function excluir($entidade) {
            parent::excluir($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());

            $query = "DELETE FROM cidades WHERE id_entidade={$id_entidade}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            parent::consultar($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $query = "SELECT * FROM cidades WHERE id_entidade={$id_entidade}";
            $result = mysqli_query($this->conn, $query);
            $cidade = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $cidade;
        }
    }
?>
