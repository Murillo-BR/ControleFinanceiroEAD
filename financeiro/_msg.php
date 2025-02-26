<?php

// Validação para capturar o retorno númerico das mensagens pela URL! //

if (isset($_GET['ret'])) {
    $ret = $_GET['ret'];
}

if (isset($ret)) {

    switch ($ret) {
        case 1:
            echo '<div class="alert alert-success">Ação realizada com sucesso!</div>';
            break;
        case 0:
            echo '<div class="alert alert-warning">Preencher o(s) campo(s) obrigatório(s)!</div>';
            break;
        case -1:
            echo '<div class="alert alert-danger">Ocorreu um erro na operação. Tente novamente mais tarde!</div>';
            break;
        case -2:
            echo '<div class="alert alert-danger">A senha deverá conter, no mínimo, 6 caracteres!</div>';
            break;
        case -3:
            echo '<div class="alert alert-danger">As senhas devem ser iguais!</div>';
            break;
        case -4:
            echo '<div class="alert alert-danger">Esse item não pode ser excluído, pois está em uso!</div>';
            break;
        case -5:
                echo '<div class="alert alert-danger">Já existe um cadastro com esse e-mail!</div>';
            break;
        case -6:
                echo '<div class="alert alert-danger">Cadastro inexistente. Usuário não encontrado!</div>';
            break;
    }
}
