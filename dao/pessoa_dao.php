<?php
    include_once('entidade_dominio_dao.php');

    class PessoaDAO extends EntidadeDominioDAO {
        public function inserir($entidade) {
            parent::inserir($entidade);
            $id_entidade = mysqli_real_escape_string($this->conn, $entidade->getId());
            $nome = mysqli_real_escape_string($this->conn, $entidade->getNome());
            $email = mysqli_real_escape_string($this->conn, $entidade->getEmail());
            (new SalvarCommand())->execute($entidade->getEndereco());
            $id_endereco = mysqli_real_escape_string($this->conn, $entidade->getEndereco()->getId());
            $telefone = mysqli_real_escape_string($this->conn, $entidade->getTelefone());

            $query = "INSERT INTO pessoas(nome, email, id_endereco, telefone, id_entidade) VALUES ('$nome', '$email', '$id_endereco', '$telefone', '$id_entidade')";
            
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
            $email = mysqli_real_escape_string($this->conn, $entidade->getEmail());            
            (new AlterarCommand())->execute($entidade->getEndereco());
            $telefone = mysqli_real_escape_string($this->conn, $entidade->getTelefone());

            $query = "UPDATE pessoas SET nome='$nome',
                                         email='$email',
                                         telefone='$telefone'
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
            (new ExcluirCommand())->execute($entidade->getEndereco());

            $query = "DELETE FROM pessoas WHERE id_entidade={$id_entidade}";

            if (mysqli_query($this->conn, $query)) {
                return 'ok';
            } else {
                return 'ERROR: '.mysqli_error($this->conn);
            }
        }

        public function consultar($entidade) {
            $id = $entidade;
            $query = "SELECT * FROM pessoas WHERE `id`={$id}";
            $result = mysqli_query($this->conn, $query);
            $pessoa = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
            mysqli_close($this->conn);
            return $pessoa;
        }
    }
?>
