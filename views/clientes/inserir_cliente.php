<?php    
    include_once dirname(__DIR__).'/../config/config.php';
    include_once dirname(__DIR__).'/../config/db.php';
    include_once dirname(__DIR__).'/../controllers/handler.php';

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
    <h1>Inserir Novo Cliente</h1>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control"
                   placeholder="Seu nome" />            
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="text" name="email" class="form-control"
                   placeholder="Seu email" />            
        </div>
        <div class="form-group">
            <label>Logradouro</label>
            <input type="text" name="logradouro" class="form-control"
                   placeholder="Seu logradouro" />
        </div>
        <div class="form-group">
            <label>Número</label>
            <input type="text" name="numero" class="form-control"
                   placeholder="Seu número" />
        </div>
        <div class="form-group">
            <label>CEP</label>
            <input type="text" name="cep" class="form-control"
                   placeholder="Seu CEP" />
        </div>
        <div class="form-group">
            <label>Complemento</label>
            <input type="text" name="complemento" class="form-control"
                   placeholder="Seu complemento" />
        </div>
        <div class="form-group">
            <label>Bairro</label>
            <input type="text" name="bairro" class="form-control"
                   placeholder="Seu bairro" />
        </div>
        <div class="form-group">
            <label>Cidade</label>
            <input type="text" name="cidade" class="form-control"
                   placeholder="Sua cidade" />
        </div>
        <div class="form-group">
            <label>Estado</label>
            <input type="text" name="estado" class="form-control"
                   placeholder="Seu número" />
        </div>

        <div class="form-group">
            <label>Telefone</label>
            <input type="text" name="telefone" class="form-control"
                   placeholder="Seu telefone" />                   
        </div>
        <div class="form-group">
            <label>CPF</label>
            <input type="text" name="cpf" class="form-control"
                   placeholder="Seu CPF" />                   
        </div>
        <div class="form-group">
            <label>Crédito</label>
            <input type="text" name="credito" class="form-control"
                   placeholder="Seu crédito" />
        </div>
        <input type="hidden" name="operacao" value="salvar" />
        <input type="submit" class="btn btn-success" value="Inserir" />
    </form>
</div>
<?php include_once dirname(__DIR__).'/../inc/footer.php'; ?>
