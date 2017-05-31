<?php    
    include_once dirname(__DIR__).'/../config/config.php';
    include_once dirname(__DIR__).'/../config/db.php';
    include_once dirname(__DIR__).'/../controllers/handler.php';

    if (isset($_GET['operacao'])) {
        $_GET['operacao'] = 'consultar';
        $clHandler = new Handler();
        $cliente = $clHandler->handleGet();
    }

    if (isset($_POST['operacao'])) {        
        $clHandler = new Handler();
        $clHandler->handlePost();
    }
?>

<?php include_once dirname(__DIR__).'/../inc/header.php'; ?>
<?php
    if (isset($_GET['msg'])) {
        $msg = htmlentities($_GET['msg']);
        echo $msg;
    }    
?>

<div class="container">
    <h1>Alterar Cliente</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input type="hidden" name="id_entidade" value="<?php echo $cliente['id_entidade']; ?>" />
        <input type="hidden" name="id_endereco" value="<?php echo $cliente['id_endereco']; ?>" />
        <input type="hidden" name="dt_cadastro" value="<?php echo $cliente['dt_cadastro']; ?>" />
        <div class="form-group">
            <label>ID</label>
            <input type="text" name="id" class="form-control"
                   value="<?php echo $cliente['id']; ?>" readonly/>
        </div>
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control"
                   value="<?php echo $cliente['nome']; ?>" placeholder="Seu nome" />            
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control"
                   value="<?php echo $cliente['email']; ?>" placeholder="Seu email" />            
        </div>
        <div class="form-group">
            <label>Logradouro</label>
            <input type="text" name="logradouro" class="form-control"
                   value="<?php echo $cliente['logradouro']; ?>" placeholder="Seu logradouro" />
        </div>
        <div class="form-group">
            <label>Número</label>
            <input type="text" name="numero" class="form-control"
                   value="<?php echo $cliente['numero']; ?>" placeholder="Seu número" />
        </div>
        <div class="form-group">
            <label>CEP</label>
            <input type="text" name="cep" class="form-control"
                   value="<?php echo $cliente['cep']; ?>" placeholder="Seu CEP" />
        </div>
        <div class="form-group">
            <label>Complemento</label>
            <input type="text" name="complemento" class="form-control"
                   value="<?php echo $cliente['complemento']; ?>" placeholder="Seu complemento" />
        </div>
        <div class="form-group">
            <label>Bairro</label>
            <input type="text" name="bairro" class="form-control"
                   value="<?php echo $cliente['bairro']; ?>" placeholder="Seu bairro" />
        </div>
        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control"
                   value="<?php echo $cliente['cidade']; ?>" placeholder="Sua cidade" />
        </div>
        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control"
                   value="<?php echo $cliente['estado']; ?>" placeholder="Seu estado" />
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control"
                   value="<?php echo $cliente['telefone']; ?>" placeholder="Seu telefone" />                   
        </div>
        <div class="form-group">
            <label>CPF</label>
            <input type="text" name="cpf" class="form-control"
                   value="<?php echo $cliente['cpf']; ?>" placeholder="Seu CPF" />                   
        </div>
        <div class="form-group">
            <label>Crédito</label>
            <input type="text" name="credito" class="form-control"
                   value="<?php echo $cliente['credito']; ?>" placeholder="Seu crédito" />
        </div>
        <input type="hidden" name="operacao" value="alterar" />
        <input type="submit" class="btn btn-default" value="Alterar" />
    </form>
</div>
<?php include_once dirname(__DIR__).'/../inc/footer.php'; ?>
