<?php
    include_once dirname(__DIR__).'/config/config.php';
    include_once dirname(__DIR__).'/config/db.php';
    include_once dirname(__DIR__).'/interfaces/ifachada.php';
    include_once dirname(__DIR__).'/rules/complementar_dt_cadastro.php';
    include_once dirname(__DIR__).'/rules/validador_cpf.php';
    include_once dirname(__DIR__).'/rules/validador_credito.php';
    include_once dirname(__DIR__).'/rules/validador_dados_cliente.php';
    include_once dirname(__DIR__).'/rules/validador_dados_endereco.php';
    include_once dirname(__DIR__).'/rules/validador_existencia.php';
    include_once dirname(__DIR__).'/dao/cliente_dao.php';
    include_once dirname(__DIR__).'/dao/fornecedor_dao.php';
    include_once dirname(__DIR__).'/dao/entidade_dominio_dao.php';
    include_once dirname(__DIR__).'/dao/endereco_dao.php';
    include_once dirname(__DIR__).'/dao/cidade_dao.php';
    include_once dirname(__DIR__).'/dao/estado_dao.php';
    include_once dirname(__DIR__).'/dao/produto_dao.php';
    include_once dirname(__DIR__).'/dao/pessoa_dao.php';
    include_once dirname(__DIR__).'/domain/cliente.php';
    include_once dirname(__DIR__).'/domain/fornecedor.php';
    include_once dirname(__DIR__).'/domain/endereco.php';

    class Fachada implements IFachada {
        private $requisitos;
        private $daos;

        public function __construct() {
            $valCpf = new ValidadorCpf();
            $cDt = new ComplementarDtCadastro();
            $valCliente = new ValidadorDadosCliente();
            $valExiste = new ValidadorExistencia();
            $valCredito = new ValidadorCredito();

            $arrClienteSalvar = array($valCliente,
                                      $valCpf,
                                      $valCredito,
                                      $valExiste,
                                      $cDt);
            $arrClienteAlterar = array($valCliente,
                                       $valExiste,
                                       $cDt);
            $arrFornecedorSalvar = array($cDt);
            $arrEnderecoSalvar = array($cDt);

            $contextoCliente = array();
            $contextoCliente[SALVAR] = $arrClienteSalvar;
            $contextoCliente[ALTERAR] = $arrClienteAlterar;

            $contextoFornecedor = array();
            $contextoFornecedor[SALVAR] = $arrFornecedorSalvar;

            $contextoEndereco = array();
            $contextoEndereco[SALVAR] = $arrEnderecoSalvar;

            $this->requisitos = array();
            $this->requisitos[Cliente::class] = $contextoCliente;
            $this->requisitos[Fornecedor::class] = $contextoFornecedor;
            $this->requisitos[Endereco::class] = $contextoEndereco;

            $this->daos = array();
            $this->daos[EntidadeDominio::class] = new EntidadeDominioDAO();
            $this->daos[Pessoa::class] = new PessoaDAO();
            $this->daos[Cliente::class] = new ClienteDAO();
            $this->daos[Fornecedor::class] = new FornecedorDAO();
            $this->daos[Endereco::class] = new EnderecoDAO();
            $this->daos[Cidade::class] = new CidadeDAO();
            $this->daos[Estado::class] = new EstadoDAO();
            $this->daos[Produto::class] = new ProdutoDAO();
        }
        
        public function executarRegras($entidade, $op) {
            $message = '';
            $contextoEntidade = $this->requisitos[get_class($entidade)];
            $reqs = $contextoEntidade[$op];

            foreach ($reqs as $req) {
                $msg = '';
                $msg .= $req->processar($entidade);
                if ($msg !== '') {
                    $message .= $msg;
                }
            }

            return ($message !== '' ? $message : 'ok');
        }

        public function salvar($entidade) {
            $message = $this->executarRegras($entidade, SALVAR);            
            if (strlen($message) > 0 and $message !== 'ok') {
                return $message;
            } else {
                $dao = $this->daos[get_class($entidade)];
                $msg = $dao->inserir($entidade);
                if (strlen($msg) > 0 and $msg !== 'ok') {
                    return $msg;
                }
                return 'ok';
            }
        }

        public function alterar($entidade) {
            $message = $this->executarRegras($entidade, ALTERAR);
            if (strlen($message) > 0) {
                return $message;
            } else {
                $dao = $this->daos[get_class($entidade)];
                $dao->alterar($entidade);
                return 'ok';
            }
        }

        public function excluir($entidade) {
            $message = $this->executarRegras($entidade, EXCLUIR);
            if (strlen($message) > 0) {
                return $message;
            } else {
                $dao = $this->daos[get_class($entidade)];
                $dao->excluir($entidade);
                return 'ok';
            }
        }

        public function consultar($entidade) {
            $dao = $this->daos[get_class($entidade)];
            return $dao->consultar($entidade);
        }

        public function consultarTodos($entidade) {
            $dao = $this->daos[$entidade];
            return $dao->consultarTodos($entidade);
        }
    }
?>
