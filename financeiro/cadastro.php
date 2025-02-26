<?php

require_once '../DAO/UsuarioDAO.php';

if (isset($_POST['btnCadastrar'])) {
    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $rsenha = trim($_POST['rsenha']);

    $objdao = new UsuarioDAO();
    $ret = $objdao->GravarMeusDados($nome,$email,$senha,$rsenha);
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include_once '_head.php';?>

<body>
    <div class="container">
        <div class="row text-center  ">
            <div class="col-md-12">
                <br><br>
                <?php include_once '_msg.php'?>
                <h2> Controle Financeiro: Cadastro</h2>
                <h5>( Faça seu cadastro )</h5>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <strong> Preencher todos os campos </strong>
                    </div>
                    <div class="panel-body">
                        <form action="cadastro.php" method="POST">
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" name="nome" class="form-control" placeholder="Digite seu Nome" id="nome" value="<?= isset($nome) ? ($nome) : ''?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" name="email" class="form-control" placeholder="Digite seu E-mail" id="email" value="<?= isset($email) ? ($email) : ''?>"/>
                            </div>
                            <span class="msgSenha">  A senha deve conter entre 6 e 8 caracteres </span>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="senha" class="form-control" placeholder="Crie uma senha (mínimo 6 caracteres)" id="senha" value="<?= isset($senha) ? ($senha) : ''?>"/>
                            </div>
                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input type="password" name="rsenha" class="form-control" placeholder="Repita a senha criada" id="rsenha" value="<?= isset($rsenha) ? ($rsenha) : ''?>"/>
                            </div>
                            <button class="btn btn-success" onclick="return GravarMeusDados()" name="btnCadastrar">Cadastrar</button>
                            <hr>
                            <span> Já possui Conta?</span> <a href="login.php">Clique aqui!</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>