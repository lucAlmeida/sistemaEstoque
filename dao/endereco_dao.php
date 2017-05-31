<?php
    include_once('entidade_dominio_dao.php');
    class EnderecoDAO extends EntidadeDominioDAO {
        public function inserir($entidade) {
            parent::inserir($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $logradouro = mysqli_real_escape_string($this->conn, $entidade->getLogradouro());
            $numero = mysqli_real_escape_string($this->conn, $entidade->getNumero());
            $complemento = mysqli_real_escape_string($this->conn, $entidade->getComplemento());            
            $cep = mysqli_real_escape_string($this->conn, $entidade->getCep());
            $bairro = mysqli_real_escape_string($this->conn, $entidade->getBairro());
            $cidade = mysqli_real_escape_string($this->conn, $entidade->getCidade()->getNome());
            $estado = mysqli_real_escape_string($this->conn, $entidade->getCidade()->getEstado()->getNome());

            $query = "INSERT INTO enderecos(logradouro, numero, complemento, cep, bairro, cidade, estado, id_entidade)
                             VALUES ('$logradouro', '$numero', '$complemento', '$cep', '$bairro', '$cidade', '$estado', '$id_entidade')";
            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function alterar($entidade) {
            parent::alterar($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $logradouro = mysqli_real_escape_string($this->conn, $entidade->getLogradouro());
            $numero = mysqli_real_escape_string($this->conn, $entidade->getNumero());
            $complemento = mysqli_real_escape_string($this->conn, $entidade->getComplemento());
            $cep = mysqli_real_escape_string($this->conn, $entidade->getCep());
            $bairro = mysqli_real_escape_string($this->conn, $entidade->getBairro());
            $cidade = mysqli_real_escape_string($this->conn, $entidade->getCidade()->getNome());
            $estado = mysqli_real_escape_string($this->conn, $entidade->getCidade()->getEstado()->getNome());

            $query = "UPDATE enderecos SET logradouro='$logradouro',
                                           numero='$numero',
                                           complemento = '$complemento',
                                           cep='$cep',
                                           bairro='$bairro',
                                           cidade='$cidade',
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

            $query = "DELETE FROM enderecos WHERE id_entidade={$id_entidade}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            $id = $entidade;
            $query = "SELECT * FROM enderecos WHERE id={$id}";
            $result = mysqli_query($this->conn, $query);
            $endereco = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $endereco;
        }
    }
?>
