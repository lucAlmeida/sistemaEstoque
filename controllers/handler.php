<?php
    include_once dirname(__DIR__).'/config/config.php';
    include_once dirname(__DIR__).'/config/db.php';
    include_once dirname(__DIR__).'/controllers/salvar_command.php';
    include_once dirname(__DIR__).'/controllers/alterar_command.php';
    include_once dirname(__DIR__).'/controllers/excluir_command.php';
    include_once dirname(__DIR__).'/controllers/consultar_command.php';
    include_once dirname(__DIR__).'/controllers/consultar_todos_command.php';
    include_once dirname(__DIR__).'/controllers/cliente_view_helper.php';
    
    class Handler {
        protected static $commands;
        protected static $view_helpers;

        public function __construct() {
            self::$commands = array();            
            self::$commands[SALVAR] = new SalvarCommand();
            self::$commands[EXCLUIR] = new ExcluirCommand();
            self::$commands[CONSULTAR] = new ConsultarCommand();
            self::$commands[ALTERAR] = new AlterarCommand();
            self::$commands[CONSULTAR_TODOS] = new ConsultarTodosCommand();

            self::$view_helpers = array();

            self::$view_helpers['/sistemaEstoque/views/clientes/opera_cliente.php'] = new ClienteViewHelper();
            self::$view_helpers['/sistemaEstoque/views/clientes/inserir_cliente.php'] = new ClienteViewHelper();
            self::$view_helpers['/sistemaEstoque/views/clientes/alterar_cliente.php'] = new ClienteViewHelper();
            self::$view_helpers['/sistemaEstoque/views/clientes/consultar_cliente.php'] = new ClienteViewHelper();
            self::$view_helpers['/sistemaEstoque/views/clientes/excluir_cliente.php'] = new ClienteViewHelper();

//            self::$view_helpers['/sistemaEstoque/views/clientes/opera_fornecedor.php'] = new FornecedorViewHelper();
//            self::$view_helpers['/sistemaEstoque/views/clientes/opera_produto.php'] = new ProdutoViewHelper();
        }

        public function handlePost($view=true, $entity=true) {
            $uri = $_SERVER['REQUEST_URI'];
            $operacao = $_POST['operacao'];            
            $vh = self::$view_helpers[$uri];

            $entidade = ($entity ? $vh->getEntidade($_POST) : $vh->getClasse());
            $cmd = self::$commands[$operacao];            
            $obj = $cmd->execute($entidade);

            if ($view) {
                $vh->setView($obj, $_POST);
            }
            return $obj;
        }

        public function handleView() {
            $uri = $_SERVER['REQUEST_URI'];
            $operacao = $_POST['operacao'];
            $vh = self::$view_helpers[$uri];
            $vh->setView(null, $_POST);
        }
    }
?>
