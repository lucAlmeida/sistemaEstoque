<?php
    include_once('entidade_dominio_dao.php');
    class EstadoDAO extends EntidadeDominioDAO {
        public function inserir($entidade) {
            parent::inserir($entidade);
            $id_entidade = $entidade->getId();
            $nome = mysqli_real_escape_string($this->conn, $entidade->getNome());
            $uf = mysqli_real_escape_string($this->conn, $entidade->getUf());

            $query = "INSERT INTO estados(nome, uf, id) VALUES ('$nome', '$uf', '$id')";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function alterar($entidade) {
            parent::alterar($entidade);
            $id = mysqli_real_escape_string($this->conn, $entidade->getId());
            $nome = mysqli_real_escape_string($this->conn, $entidade->getNome());
            $uf = mysqli_real_escape_string($this->conn, $entidade->getUf());

            $query = "UPDATE estados SET nome='$nome',
                                         uf='$uf'
                                         WHERE id_entidade={$id}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function excluir($entidade) {
            parent::excluir($entidade);
            $id = mysqli_real_escape_string($this->conn, $entidade->getId());

            $query = "DELETE FROM estados WHERE id_entidade={$id}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            $id = $entidade;
            $query = "SELECT * FROM estados WHERE id={$id}";
            $result = mysqli_query($this->conn, $query);
            $estado = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $estado;
        }
    }
?>
