<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

require_once '../DAO/EmpresaDAO.php';

if (isset($_POST['btnSalvar'])) {
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    $objDAO = new EmpresaDAO();
    $ret = $objDAO->CadastrarEmpresa($nome, $telefone, $endereco);
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
                        <h2>Nova Empresa</h2>
                        <h5>Aqui você poderá cadastrar todas as suas empresas</h5>
                        <?php include_once '_msg.php' ?>
                    </div>
                </div>
                <hr>
                <form action="nova_empresa.php" method="POST">
                    <div class="form-group">
                        <label>Nome da empresa*</label>
                        <input class="form-control" name="nome" id="nome" placeholder="Digite o nome da empresa..." value="<?= isset($nome) ? $nome : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Telefone*</label>
                        <input type="number" class="form-control" name="telefone" id="telefone" placeholder="Digite o telefone da empresa." value="<?= isset($telefone) ? $telefone : '' ?>">
                    </div>
                    <div class="form-group">
                        <label>Endereço da empresa*</label>
                        <input class="form-control" name="endereco" id="endereco" placeholder="Digite o endereço da empresa." value="<?= isset($endereco) ? $endereco : '' ?>">
                    </div>
                    <button class="btn btn-success" name="btnSalvar" onclick="return ValidarEmpresa();">Salvar</button>
                </form>
            </div>
        </div>
</body>
</html>