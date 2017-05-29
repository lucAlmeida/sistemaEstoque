<?php    
    include_once dirname(__DIR__).'/../config/config.php';
    include_once dirname(__DIR__).'/../config/db.php';
    include_once dirname(__DIR__).'/../controllers/handler.php';

    if (isset($_POST['operacao'])) {
        $clHandler = new Handler();
        $clHandler->handleView();
    }
?>

<?php include_once dirname(__DIR__).'/../inc/header.php'; ?>
<div class="container">
    <h1>Clientes</h1>
    <br />
    <?php 
          $_POST['operacao'] = CONSULTAR_TODOS;
          $clHandler = new Handler();
          $clientes = $clHandler->handlePost(false, false);          
    ?>
    <div class="table-responsive">
        <table class="table table-stripped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Logradouro</th>
                    <th>Numero</th>
                    <th>CEP</th>
                    <th>Complemento</th>
                    <th>Bairro</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>Telefone</th>
                    <th>CPF</th>
                    <th>Crédito</th>
                    <th>Data de Cadastro</th>
                <tr>
            </thead>
            <tbody>
                <?php foreach($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente['id'] ?></td>
                    <td><?php echo $cliente['nome'] ?></td>
                    <td><?php echo $cliente['email'] ?></td>
                    <td><?php echo $cliente['logradouro'] ?></td>
                    <td><?php echo $cliente['numero'] ?></td>
                    <td><?php echo $cliente['cep'] ?></td>
                    <td><?php echo $cliente['complemento'] ?></td>
                    <td><?php echo $cliente['bairro'] ?></td>
                    <td><?php echo $cliente['cidade'] ?></td>
                    <td><?php echo $cliente['estado'] ?></td>
                    <td><?php echo $cliente['telefone'] ?></td>
                    <td><?php echo $cliente['cpf'] ?></td>
                    <td><?php echo $cliente['credito'] ?></td>
                    <td><?php echo $cliente['dt_cadastro'] ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <form id="operacoes" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <button class="btn btn-success" type="submit" name="operacao" value="salvar">Inserir Cliente</button>
        <button class="btn btn-default" type="submit" name="operacao" value="alterar">Alterar Cliente</button>
        <button class="btn btn-primary" type="submit" name="operacao" value="consultar">Consultar Cliente</button>
        <button class="btn btn-danger" type="submit" name="operacao" value="excluir">Excluir Cliente</button>
    </form>
</div>
<?php include_once dirname(__DIR__)."/../inc/footer.php"; ?>
