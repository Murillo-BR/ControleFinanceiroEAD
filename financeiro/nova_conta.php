<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

require_once '../DAO/ContaDAO.php';

if (isset($_POST['btnSalvar'])) {
    $banco = trim($_POST['banco']);
    $agencia = trim($_POST['agencia']);
    $numero = trim($_POST['numero']);
    $saldo = trim($_POST['saldo']);

    $objdao = new ContaDAO();
    $ret = $objdao->CadastrarConta($banco, $agencia, $numero, $saldo);
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
                        <h2>Nova Conta</h2>
                        <h5>Aqui você poderá cadastrar todas as suas contas</h5>
                        <?php include_once '_msg.php' ?>
                    </div>
                </div>
                <hr>
                <form action="nova_conta.php" method="POST">
                    <div class="form-group">
                        <label>Nome da banco*</label>
                        <input class="form-control" name="banco" id="banco" placeholder="Digite o nome do banco" value="<?= isset($banco) ? $banco : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Agência*</label>
                        <input type="number" class="form-control" name="agencia" id="agencia" placeholder="Digite o número da agência" value="<?= isset($agencia) ? $agencia : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Número da conta*</label>
                        <input type="number" class="form-control" name="numero" id="numero" placeholder="Digite o número da conta" value="<?= isset($numero) ? $numero : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Saldo*</label>
                        <input class="form-control" name="saldo" id="saldo" placeholder="Digite o saldo da conta" value="<?= isset($saldo) ? $saldo : '' ?>">
                    </div>
                    <button class="btn btn-success" name="btnSalvar" onclick="return ValidarConta();" >Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>