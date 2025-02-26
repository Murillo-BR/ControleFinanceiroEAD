<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

require_once '../DAO/MovimentoDAO.php';

$tipoMov = '';

if (isset($_POST['btnPesquisar'])) {
    $tipoMov = ($_POST['tipoMov']);
    $data_inicial = ($_POST['data_inicial']);
    $data_final = ($_POST['data_final']);

    $objDAO = new MovimentoDAO();
    $movs = $objDAO->ConsultarMovimento($tipoMov, $data_inicial, $data_final);

    //echo '<pre>';
    //var_dump($movs);
    //echo '</pre>';

} else if (isset($_POST['btnExcluir'])) {
    $idMov = $_POST['idMov'];
    $idConta = $_POST['idConta'];
    $tipo = $_POST['tipo'];
    $valor = $_POST['valor'];

    $objDAO = new MovimentoDAO();
    $ret = $objDAO->ExcluirMovimento($idMov, $idConta, $tipo, $valor);
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
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <?php include_once '_msg.php' ?>
                        <h2>Consultar Movimento</h2>
                        <h5>Consulte todos os movimentos em um determinado período</h5>
                    </div>
                </div>

                <hr />

                <form method="POST" action="consultar_movimento.php">
                    <div class="col-md-4">
                        <div class=" form-group">
                            <label>Tipo do movimento</label>
                            <select class="form-control" id="tipoMov" name="tipoMov" required>
                                <option value="">Selecione</option>
                                <option value="0" <?= $tipoMov == 0 ? 'selected' : '' ?>>Todos</option>
                                <option value="1" <?= $tipoMov == 1 ? 'selected' : '' ?>>Entrada</option>
                                <option value="2" <?= $tipoMov == 2 ? 'selected' : '' ?>>Saída</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data inicial*</label>
                            <input type="date" class="form-control" name="data_inicial" id="data_inicial" value="<?= isset($data_inicial) ? $data_inicial : '' ?>" />
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Data final*</label>
                            <input type="date" class="form-control" name="data_final" id="data_final" value="<?= isset($data_final) ? $data_final : '' ?>" />
                        </div>
                    </div>
                    <div class="alignBtn">
                        <center>
                            <button class="btn-info" onclick="return ConsultarMovimento()" name="btnPesquisar">Pesquisar</button>
                        </center>
                    </div>
                    <hr>
                </form>
                <?php if (isset($movs)) { ?>
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Resultado encontrado
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th class="alignBtn">Data do movimento</th>
                                                <th class="alignBtn">Tipo</th>
                                                <th class="alignBtn">Categoria</th>
                                                <th class="alignBtn">Empresa</th>
                                                <th class="alignBtn">Conta</th>
                                                <th class="alignBtn">Valor (R$)</th>
                                                <th class="alignBtn">Observação</th>
                                                <th class="alignBtn">Ação</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            //Uma variável que será subscrita quando receber o valor do movimento para impressão na tela!
                                            $total = 0;
                                            for ($i = 0; $i < count($movs); $i++) {
                                                if ($movs[$i]['tipo_movimento'] == 1) {
                                                    $total = $total + $movs[$i]['valor_movimento'];
                                                } else {
                                                    $total = $total - $movs[$i]['valor_movimento'];
                                                }
                                            ?>
                                                <tr>

                                                    <td><?= $movs[$i]['data_movimento'] ?></td>
                                                    <td><?= $movs[$i]['tipo_movimento'] == 1 ? '<strong style="color: #006400;">Entrada</strong>' : '<strong style="color: #ff0000;">Saída</strong>' ?></td>
                                                    <td><?= $movs[$i]['nome_categoria'] ?></td>
                                                    <td><?= $movs[$i]['nome_empresa'] ?></td>
                                                    <td><?= $movs[$i]['banco_conta'] ?> | Agência: <?= $movs[$i]['agencia_conta'] ?> | Nº Conta: <?= $movs[$i]['numero_conta'] ?> | Saldo: R$ <?= number_format($movs[$i]['saldo_conta'], 2, ',', '.') ?> </td>
                                                    <td><?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></td>
                                                    <td><?= $movs[$i]['obs_movimento'] ?></td>
                                                    <td>
                                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#myModal<?= $i ?>">Excluir</a>
                                                        <form action="consultar_movimento.php" method="POST">

                                                            <!-- Campos acultos com os dados necessários para realizar a exclusão domovimento financeiro" -->
                                                            <input type="hidden" name="idMov" value="<?= $movs[$i]['id_movimento'] ?>">
                                                            <input type="hidden" name="idConta" value="<?= $movs[$i]['id_conta'] ?>">
                                                            <input type="hidden" name="tipo" value="<?= $movs[$i]['tipo_movimento'] ?>">
                                                            <input type="hidden" name="valor" value="<?= $movs[$i]['valor_movimento'] ?>">

                                                            <div>
                                                                <div class="modal fade" id="myModal<?= $i ?>" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                                                <h4 class="modal-title" id="myModalLabel">Deseja realmente excluir o Movimento Financeiro?</h4>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <span>Tipo de Movimento:</span><strong><?= $movs[$i]['tipo_movimento'] == 1 ? '<strong style="color: #006400;">Entrada</strong>' : '<strong style: #ff0000;">Saída</strong>' ?></strong><br>
                                                                                <span>Data:</span><strong><?= $movs[$i]['data_movimento'] ?></strong><br>
                                                                                <span>Valor do Movimento:</span><strong><?= number_format($movs[$i]['valor_movimento'], 2, ',', '.') ?></strong><br>
                                                                                <span>Nome da Categoria:</span><strong><?= $movs[$i]['nome_categoria'] ?></strong><br>
                                                                                <span>Nome da Empresa:</span><strong><?= $movs[$i]['nome_empresa'] ?></strong><br>
                                                                                <span>Conta Bancária:</span><strong><?= $movs[$i]['banco_conta'] ?> | Agência: <?= $movs[$i]['agencia_conta'] ?> | Nº Conta: <?= $movs[$i]['numero_conta'] ?> | Saldo: R$ <?= number_format($movs[$i]['saldo_conta'], 2, ',', '.') ?></strong><br>
                                                                                <span>Observação:</span><strong><?= $movs[$i]['obs_movimento'] ?></strong><br>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
                                                                                <button type="submit" class="btn btn-danger" name="btnExcluir">Excluir</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <center>
                                        <label style="color: <?= $total < 0 ? 'red' : 'green' ?>">TOTAL: R$ <?= number_format($total, 2, ',', '.'); ?></label>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>