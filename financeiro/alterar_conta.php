<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

require_once '../DAO/ContaDAO.php';

$objDAO = new ContaDAO();

if (isset($_GET['cod']) && is_numeric($_GET['cod'])) {
    $idConta = $_GET['cod'];

    $dados = $objDAO->DetalharConta($idConta);

    if (count($dados) == 0) {
        header('location: consultar_conta.php');
        exit;
    }
} else if (isset($_POST['btnSalvar'])) {
    $banco = trim($_POST['banco']);
    $agencia = trim($_POST['agencia']);
    $numero = trim($_POST['numero']);
    $saldo = trim($_POST['saldo']);
    $idConta = $_POST['cod'];

    $ret = $objDAO->AlterarConta($banco, $agencia, $numero, $saldo, $idConta);

    header('location: consultar_conta.php?ret=' . $ret);
    exit;
} else if (isset($_POST['btnExcluir'])) {
    $idConta = $_POST['cod'];

    $ret = $objDAO->ExcluirConta($idConta);

    header('location: consultar_conta.php?ret=' . $ret);
    exit;
} else {
    header('location: consultar_conta.php');
    exit;
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php include_once '_head.php'; ?>

<body>
    <div id="wrapper">
        <?php
        include_once '_topo.php';
        include_once '_menu.php';
        ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Alterar Conta</h2>
                        <h5>Aqui você poderá alterar suas contas</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr />
                <form action="alterar_conta.php" method="POST">
                    <input type="hidden" name="cod" value="<?= $dados[0]['id_conta'] ?>">
                    <div class="form-group">
                        <label>Nome da banco*</label>
                        <input class="form-control" placeholder="Digite o nome do banco" name="banco" id="banco" value="<?= $dados[0]['banco_conta'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Agência*</label>
                        <input type="number" class="form-control" placeholder="Digite o número da agência" name="agencia" id="agencia" value="<?= $dados[0]['agencia_conta'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Número da conta*</label>
                        <input type="number" class="form-control" placeholder="Digite o número da conta" name="numero" id="numero" value="<?= $dados[0]['numero_conta'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Saldo (R$)*</label>
                        <input class="form-control" placeholder="Digite o saldo da conta" name="saldo" id="saldo" value="<?= $dados[0]['saldo_conta'] ?>">
                    </div>
                    <button type="submit" onclick="return AlterarConta()" name="btnSalvar" class="btn btn-success">Salvar</button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Excluir</button>

                    <div class="panel-body">
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                        <h4 class="modal-title" id="myModalLabel">Deseja realmente excluir a Conta Bancária?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <span>Nome da Banco: </span><strong><?= $dados[0]['banco_conta'] ?></strong>
                                        <br>
                                        <span>Agência: </span><strong><?= $dados[0]['agencia_conta'] ?></strong>
                                        <br>
                                        <span>Número da Conta: </span><strong><?= $dados[0]['numero_conta'] ?></strong>
                                        <br>
                                        <span>Saldo da Conta: </span><strong><?= number_format($dados[0]['saldo_conta'], 2, ',', '.') ?></strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">Não</button>
                                        <button type="submit" class="btn btn-danger" name="btnExcluir">Sim</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

</body>

</html>