<?php
    include_once('pessoa_dao.php');
    class ClienteDAO extends PessoaDAO {
        public function inserir($entidade) {
            parent::inserir($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $cpf = mysqli_real_escape_string($this->conn, $entidade->getCpf());
            $credito = mysqli_real_escape_string($this->conn, $entidade->getCredito());            

            $query = "INSERT INTO clientes(cpf, credito, id_entidade) VALUES ('$cpf', '$credito', '$id_entidade')";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function alterar($entidade) {
            parent::alterar($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $cpf = mysqli_real_escape_string($this->conn, $entidade->getCpf());
            $credito = mysqli_real_escape_string($this->conn, $entidade->getCredito());

            $query = "UPDATE clientes SET cpf='$cpf',
                                          credito='$credito'
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

            $query = "DELETE FROM clientes WHERE id_entidade={$id_entidade}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            $id = $entidade;
            $query = "SELECT c.*, p.*, e.*, ed.dt_cadastro
                      FROM clientes c
                      INNER JOIN pessoas p ON c.id_entidade = p.id_entidade
                      INNER JOIN enderecos e ON p.id_endereco = e.id_entidade
                      INNER JOIN entidades_dominio ed ON c.id_entidade = ed.id
                      WHERE c.id = {$id}";
            $result = mysqli_query($this->conn, $query);
            $cliente = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $cliente;
        }

        public function consultarTodos($entidade) {
            $query = "SELECT c.*, p.*, e.*, ed.dt_cadastro
                      FROM clientes c
                      INNER JOIN pessoas p ON c.id_entidade = p.id_entidade
                      INNER JOIN enderecos e ON p.id_endereco = e.id_entidade
                      INNER JOIN entidades_dominio ed ON c.id_entidade = ed.id";
            $result = mysqli_query($this->conn, $query);
            $entidades = mysqli_fetch_all($result, MYSQLI_ASSOC);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $entidades;
        }
    }
?>
