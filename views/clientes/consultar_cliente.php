<?php    
    include_once dirname(__DIR__).'/../config/config.php';
    include_once dirname(__DIR__).'/../config/db.php';
    include_once dirname(__DIR__).'/../controllers/handler.php';

    $clHandler = new Handler();
    $cliente = $clHandler->handleGet();
?>

<?php include_once dirname(__DIR__).'/../inc/header.php'; ?>
<div class="container">
    <h1>Consultar Cliente</h1>
    <div class="form-group">
        <label>ID</label>
        <input type="text" name="id" class="form-control"
               value="<?php echo $cliente['id']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control"
               value="<?php echo $cliente['nome']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control"
               value="<?php echo $cliente['email']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Logradouro</label>
        <input type="text" name="logradouro" class="form-control"
               value="<?php echo $cliente['logradouro']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Número</label>
        <input type="text" name="numero" class="form-control"
               value="<?php echo $cliente['numero']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>CEP</label>
        <input type="text" name="cep" class="form-control"
               value="<?php echo $cliente['cep']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Complemento</label>
        <input type="text" name="complemento" class="form-control"
               value="<?php echo $cliente['complemento']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Bairro</label>
        <input type="text" name="bairro" class="form-control"
               value="<?php echo $cliente['bairro']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Cidade</label>
        <input type="text" name="cidade" class="form-control"
               value="<?php echo $cliente['cidade']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control"
               value="<?php echo $cliente['estado']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control"
               value="<?php echo $cliente['telefone']; ?>" readonly/>                   
    </div>
    <div class="form-group">
        <label>CPF</label>
        <input type="text" name="cpf" class="form-control"
               value="<?php echo $cliente['cpf']; ?>" readonly/>                   
    </div>
    <div class="form-group">
        <label>Crédito</label>
        <input type="text" name="credito" class="form-control"
               value="<?php echo $cliente['credito']; ?>" readonly/>
    </div>
    <div class="form-group">
        <label>Data de Cadastro</label>
        <input type="text" name="nome" class="form-control"
               value="<?php echo $cliente['dt_cadastro']; ?>" readonly/>
    </div>    
</div>
<?php include_once dirname(__DIR__).'/../inc/footer.php'; ?>
