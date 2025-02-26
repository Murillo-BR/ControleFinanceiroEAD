<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

if(isset($_GET['close']) && $_GET['close'] == '1'){
        UtilDAO::Deslogar();
}

?>

<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li class="text-center">
                <img src="assets/img/mad_logo.png" class="user-image img-responsive" />
            </li>

            <li>
                <a href="meus_dados.php"><i class="fa fa-user fa-2x"></i> Meus Dados</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-folder-o fa-2x"></i> Categoria<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="nova_categoria.php">Nova Categoria</a>
                    </li>
                    <li>
                        <a href="consultar_categoria.php">Consultar Categoria</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-building-o fa-2x"></i> Empresa<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="nova_empresa.php">Nova Empresa</a>
                    </li>
                    <li>
                        <a href="consultar_empresa.php">Consultar Empresa</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-money fa-2x"></i> Conta<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="nova_conta.php">Nova Conta</a>
                    </li>
                    <li>
                        <a href="consultar_conta.php">Consultar Conta</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="#"><i class="fa fa-exchange fa-2x"></i> Movimento<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="realizar_movimento.php">Realizar Movimento</a>
                    </li>
                    <li>
                        <a href="consultar_movimento.php">Consultar Movimento</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="login.php?close=1"><i class="fa fa-power-off fa-2x"></i> Sair</a>
            </li>

        </ul>

    </div>

</nav>