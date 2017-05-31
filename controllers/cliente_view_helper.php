<?php
    include_once dirname(__DIR__).'/config/config.php';
    include_once dirname(__DIR__).'/config/db.php';
    include_once dirname(__DIR__).'/interfaces/iviewhelper.php';
    include_once dirname(__DIR__).'/domain/estado.php';
    include_once dirname(__DIR__).'/domain/cidade.php';
    include_once dirname(__DIR__).'/domain/endereco.php';
    include_once dirname(__DIR__).'/domain/cliente.php';

    class ClienteViewHelper implements IViewHelper {

        public function getEntidade($request) {
            $nome = $request['nome'];
            $email = $request['email'];
             
            $estado = new Estado($request['estado'], "UF");
            $cidade = new Cidade($request['cidade'], $estado);
            $logradouro = $request['logradouro'];
            $numero = $request['numero'];
            $cep = $request['cep'];
            $complemento = $request['complemento'];
            $bairro = $request['bairro'];
            $endereco = new Endereco($logradouro, $numero, $cep, $complemento, $bairro, $cidade);
            if (isset($request['id_endereco'])) {
                $endereco->setId($request['id_endereco']);
            }
            $telefone = $request['telefone'];
            $cpf = $request['cpf'];
            $credito = $request['credito'];

            $cliente = new Cliente($nome, $email, $endereco, $telefone, $cpf, $credito);
            if (isset($request['id_entidade'])) {
                $cliente->setId($request['id_entidade']);
            }
            if (isset($request['dt_cadastro'])) {
                $cliente->setDtCadastro($request['dt_cadastro']);
            }

            return $cliente;
        }

        public function getClasse() {
            return Cliente::class;
        }

        public function setView($msg, $request) {
            $op = $request['operacao'];

            if ($op == SALVAR) {
                if (is_null($msg)) {                    
                    header('Location: '.ROOT_URL.'/views/clientes/inserir_cliente.php');
                } else if ($msg === 'ok') { 
                    header('Location: '.ROOT_URL.'/views/clientes/opera_cliente.php');
                } else {
                    header('Location: '.ROOT_URL."/views/clientes/inserir_cliente.php?msg={$msg}");
                }
            } else if ($op == ALTERAR) {
                header('Location: '.ROOT_URL."/views/clientes/consultar_cliente.php?id={$request['id']}&operacao=consultar");
            } else if ($op == CONSULTAR) {
                header('Location: '.ROOT_URL.'/views/clientes/consultar_cliente.php');
            } else if ($op == CONSULTAR_TODOS) {
            } else if ($op == EXCLUIR) {
                header('Location: '.ROOT_URL.'/views/clientes/opera_cliente.php');
            } else {
                header('Location: '.ROOT_URL);
                return null;
            }
            return 'ok';
        }
    }
?>
