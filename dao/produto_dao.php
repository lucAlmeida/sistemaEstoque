<?php
    include_once('entidade_dominio_dao.php');
    class ProdutoDAO extends EntidadeDominioDAO {
        public function inserir($entidade) {
            parent::inserir($entidade);
            $id = $mysqli->insert_id;
            $descricao = mysqli_real_escape_string($this->conn, $entidade->getDescricao());
            $preco = mysqli_real_escape_string($this->conn, $entidade->getPreco());
            $quantidade = mysqli_real_escape_string($this->conn, $entidade->getQuantidade());

            $query = "INSERT INTO produtos(descricao, preco, quantidade, id) VALUES ('$descricao', '$preco', '$quantidade', '$id')";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function alterar($entidade) {
            parent::alterar($entidade);
            $id = mysqli_real_escape_string($this->conn, $entidade->getId());
            $descricao = mysqli_real_escape_string($this->conn, $entidade->getDescricao());
            $preco = mysqli_real_escape_string($this->conn, $entidade->getPreco());
            $quantidade = mysqli_real_escape_string($this->conn, $entidade->getQuantidade());

            $query = "UPDATE produtos SET descricao='$descricao',
                                          preco='$preco',
                                          quantidade='$quantidade',
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

            $query = "DELETE FROM produtos WHERE id_entidade={$id}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            parent::consultar($entidade);
            $id = mysqli_real_escape_string($this->conn, $entidade->getId());
            $query = "SELECT * FROM produtos WHERE id_entidade={$id}";
            $result = mysqli_query($this->conn, $query);
            $produto = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $produto;
        }
    }
?>
