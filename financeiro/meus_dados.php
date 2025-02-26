<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

require_once '../DAO/UsuarioDAO.php';

// Objeto Global!
$objDAO = new UsuarioDAO();

if (isset($_POST['btnSalvar'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);

    $ret = $objDAO->GravarMeusDados($nome, $email, $senha);
}

    // Essa Variável recebe o Array do PDO, sendo assim, ela também é um Array!
    $dados_user = $objDAO->CarregarMeusDados();

//    echo '<pre>';
//    var_dump($dados_user);
//    echo '</pre>';

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<?php
include_once '_head.php';
?>

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

                        <?php include_once '_msg.php'; ?>

                        <h2>Meus dados</h2>
                        <h5>Nesta página, você poderá alterar seus dados. </h5>

                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <form action="meus_dados.php" method="POST">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Digite seu Nome:</label>
                            <input class="form-control" name="nome" placeholder="Digite seu Nome aqui..." id="nome" value="<?= $dados_user[0]['nome_usuario'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Digite seu E-mail:</label>
                            <input type="email" name="email" class="form-control" placeholder="Digite seu E-mail aqui..." id="email" value="<?= $dados_user[0]['email_usuario'] ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Altere sua Senha:</label>
                            <div class="ajuste">
                                <input type="password" name="senha" class="form-control" placeholder="Digite seu Senha aqui..." id="senha" value="<?= $dados_user[0]['senha_usuario'] ?>">
                                <img src="./assets/img/img_senha.png" id="olho" alt="Clique para ver a Senha" title="Clique para ver a Senha!" class="iconSenha">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button class="btn btn-success" name="btnSalvar">Salvar</button>
                </form>
            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>

    <script>
        // Quando o clique for pressionado, o tipo senha é convertido em texto!
        $("#olho").mousedown(function(){
            $("#senha").attr("type", "text");
        });

        // Quando o clique for solto, o tipo texto é convertido em password!
        $("#olho").mouseup(function(){
            $("#senha").attr("type", "password");
        });
    </script>

</body>

</html>