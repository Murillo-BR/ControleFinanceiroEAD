<?php

// ======= SESSÃO DO USUÁRIO =======
require_once '../DAO/UtilDAO.php';
UtilDAO::ValidarLogin();
// =================================

?>

<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">Financeiro</a>
    </div>
    <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
        <span>Dúvidas, ligue para: (43)99999-0000</span>
    </div>
</nav>