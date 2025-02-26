<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

require_once '../DAO/CategoriaDAO.php';

if (isset($_POST['btnSalvar'])) {
    $nome = trim($_POST['nome']);

    $objdao = new CategoriaDAO();
    $ret = $objdao->CadastrarCategoria($nome);
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
                        <h2>Nova Categoria</h2>
                        <h5>Aqui você poderá cadastrar todas as suas categorias</h5>
                        <?php include_once '_msg.php' ?>
                    </div>
                </div>
                <hr>
                <form action="nova_categoria.php" method="POST">
                    <div class="form-group">
                        <label>Categoria</label>
                        <input class="form-control" name="nome" id="nome" placeholder="Digite o nome da categoria aqui..." value="<?= isset($nome) ? $nome : '' ?>">
                    </div>
                    <button name="btnSalvar" onclick="return ValidarCategoria();" class="btn btn-success">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>