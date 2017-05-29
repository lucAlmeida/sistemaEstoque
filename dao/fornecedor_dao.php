<?php
    include_once('pessoa_dao.php');
    class FornecedorDAO extends PessoaDAO {
        public function inserir($entidade) {
            parent::inserir($entidade);
            $id_pessoa = $mysqli->insert_id;
            $id_entidade = $entidade->getId();
            $cnpj = mysqli_real_escape_string($this->conn, $entidade->getCnpj());
            $despesas = mysqli_real_escape_string($this->conn, $entidade->getDespesas());

            $query = "INSERT INTO fornecedores(cnpj, despesas, id_pessoa, id_entidade) VALUES ('$cnpj', '$despesas', '$id_pessoa', '$id_entidade')";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function alterar($entidade) {
            parent::alterar($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $cnpj = mysqli_real_escape_string($this->conn, $entidade->getCnpj());
            $despesas = mysqli_real_escape_string($this->conn, $entidade->getDespesas());

            $query = "UPDATE fornecedores SET cnpj='$cnpj',
                                              despesas='$despesas'
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

            $query = "DELETE FROM fornecedores WHERE id_entidade={$id_entidade}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            parent::consultar($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $query = "SELECT * FROM fornecedores WHERE id_entidade={$id_entidade}";
            $result = mysqli_query($this->conn, $query);
            $fornecedor = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $fornecedor;
        }
    }
?>
