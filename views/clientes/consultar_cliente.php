<?php    
    include_once dirname(__DIR__).'/../config/config.php';
    include_once dirname(__DIR__).'/../config/db.php';
    include_once dirname(__DIR__).'/../controllers/handler.php';
?>

<?php include_once dirname(__DIR__).'/../inc/header.php'; ?>
<?php
    $clHandler = new Handler();
    $cliente = $clHandler->handleGet();
?>

<div class="container">
    <h1>Consultar Cliente</h1>
    <div class="form-group">
        <label>ID</label>
        <input type="text" name="nome" class="form-control"
               value="<?php echo $cliente['id']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control"
               value="<?php echo $cliente['nome']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control"
               value="<?php echo $cliente['email']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Logradouro</label>
        <input type="text" name="logradouro" class="form-control"
               value="<?php echo $cliente['logradouro']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Número</label>
        <input type="text" name="numero" class="form-control"
               value="<?php echo $cliente['numero']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>CEP</label>
        <input type="text" name="cep" class="form-control"
               value="<?php echo $cliente['cep']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Complemento</label>
        <input type="text" name="complemento" class="form-control"
               value="<?php echo $cliente['complemento']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Bairro</label>
        <input type="text" name="bairro" class="form-control"
               value="<?php echo $cliente['bairro']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Cidade</label>
        <input type="text" name="cidade" class="form-control"
               value="<?php echo $cliente['cidade']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Estado</label>
        <input type="text" name="estado" class="form-control"
               value="<?php echo $cliente['estado']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control"
               value="<?php echo $cliente['telefone']; ?>" disabled/>                   
    </div>
    <div class="form-group">
        <label>CPF</label>
        <input type="text" name="cpf" class="form-control"
               value="<?php echo $cliente['cpf']; ?>" disabled/>                   
    </div>
    <div class="form-group">
        <label>Crédito</label>
        <input type="text" name="credito" class="form-control"
               value="<?php echo $cliente['credito']; ?>" disabled/>
    </div>
    <div class="form-group">
        <label>Data de Cadastro</label>
        <input type="text" name="nome" class="form-control"
               value="<?php echo $cliente['dt_cadastro']; ?>" disabled/>
    </div>    
</div>
<?php include_once dirname(__DIR__).'/../inc/footer.php'; ?>
