<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

require_once '../DAO/MovimentoDAO.php';
require_once '../DAO/CategoriaDAO.php';
require_once '../DAO/EmpresaDAO.php';
require_once '../DAO/ContaDAO.php';

$objCategoria = new CategoriaDAO();
$objEmpresa = new EmpresaDAO();
$objConta = new ContaDAO();

$categorias = $objCategoria->ConsultarCategoria();
$empresas = $objEmpresa->ConsultarEmpresa();
$contas = $objConta->ConsultarConta();

if (isset($_POST['btnSalvar'])) {
    $tipo = ($_POST['tipo']);
    $data = ($_POST['data']);
    $valor = trim($_POST['valor']);
    $obs = trim($_POST['obs']);
    $categoria = ($_POST['categoria']);
    $empresa = ($_POST['empresa']);
    $conta = ($_POST['conta']);

    $objDAO = new MovimentoDAO();
    $ret = $objDAO->RealizarMovimento($tipo, $data, $valor, $obs, $categoria, $empresa, $conta);
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
                        <h2>Realizar movimento</h2>
                        <h5>Aqui você poderá realizar seus movimentos de entrada ou saída</h5>
                        <?php include_once '_msg.php'; ?>
                    </div>
                </div>
                <hr>

                <form action="realizar_movimento.php" method="POST">
                    <div class="col-md-4">
                        <div class=" form-group">
                            <label>Tipo do movimento*</label>
                            <select class="form-control" name="tipo" id="tipo">
                                <option value="">Selecione</option>
                                <option value="1">Entrada</option>
                                <option value="2">Saída</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Data*</label>
                            <input type="date" name="data" id="data" class="form-control" placeholder="Digite a data do movimento">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Valor do movimento*</label>
                            <input class="form-control" name="valor" id="valor" placeholder="Digite o valor do movimento">
                        </div>

                        <div class="form-group">
                            <label>Selecione uma Categoria Financeira*</label>
                            <select class="form-control" name="categoria" id="categoria">
                                <option value="">Selecione</option>
                                <?php for($i=0; $i < count($categorias); $i++){ ?>
                                    <option value="<?= $categorias[$i]['id_categoria'] ?>"><?= $categorias[$i]['nome_categoria'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Selecione uma Empresa*</label>
                            <select class="form-control" name="empresa" id="empresa">
                                <option value="">Selecione</option>
                                <?php foreach($empresas as $emp){ ?>
                                    <option value="<?= $emp['id_empresa'] ?>"><?= $emp['nome_empresa'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Selecione uma Conta Bancária*</label>
                            <select class="form-control" name="conta" id="conta">
                                <option value="">Selecione</option>
                                <?php foreach($contas as $ct){ ?>
                                    <option value="<?= $ct['id_conta'] ?>"><?= $ct['banco_conta'] ?> | R$ <?= number_format($ct['saldo_conta'], 2, ',', '.') ?></option>
                                <?php } ?>
                            <select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Observação (opcional)</label>
                            <textarea class="form-control" name="obs" rows="3" placeholder="Digite uma observação aqui..."></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" onclick="return RealizarMovimento()" name="btnSalvar" class="btn btn-success">Finalizar lançamento</button>
                </form>
            </div>
        </div>
</body>
</html>