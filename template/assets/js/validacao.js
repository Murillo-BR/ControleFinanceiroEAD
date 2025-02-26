function ValidarMeusDados() {
    var nome = documento.getElementById("nome").value;
    var email = $("#email").val();

    if (nome.trim() = '') {
        alert("Preencher o campo Nome");
        $("#nome").focus();
        return false;
    }
    if (email.trim() = '') {
        alert("Preencher o campo E-mail");
        $("#email").focus();
        return false;
    }
}

function ValidarCategoria() {
    if ($("nomecategoria").val().trim() == '') {
        alert("Preencher o campo Nome da Categoria");
        $("#nomecategoria").focus();
        return false;
    }
}

function ValidarEmpresa() {
    if ($("#nomeempresa").val().trim() == '') {
        alert("Preencher o campo nome da Empresa");
        $("#nomeempresa").focus();
        return false;
    }
}

function ValidarConta() {
    if ($("#banco").val().trim() == '') {
        alert("Preencher o campo Nome do Banco");
        $("#banco").focus();
        return false;
    }

    if ($("#agencia").val().trim() == '') {
        alert("Preencher o campo Agência");
        $("#agencia").focus();
        return false;
    }

    if ($("#numero").val().trim() == '') {
        alert("Preencher o campo Número da Conta");
        $("#numero").focus();
        return false;
    }

    if ($("#saldo").val().trim() == '') {
        alert("Preencher o campo Saldo");
        $("#saldo").focus();
        return false;
    }

}

function ValidarMovimento() {
    if ($("#tipo").val() == '') {
        alert("Preencher o campo Tipo de Movimento");
        $("#tipo").focus();
        return false;
    }

    if ($("#data").val().trim() == '') {
        alert("Preencher o campo Data");
        $("#data").focus();
        return false;
    }

    if ($("#valor").val().trim() == '') {
        alert("Preencher o campo Valor");
        $("#valor").focus();
        return false;
    }

    if ($("#categoria").val().trim() == '') {
        alert("Preencher o campo Categoria");
        $("#categoria").focus();
        return false;
    }

    if ($("#empresa").val().trim() == '') {
        alert("Preencher o campo Empresa");
        $("#empresa").focus();
        return false;
    }

    if ($("#conta").val().trim() == '') {
        alert("Preencher o campo Conta");
        $("#conta").focus();
        return false;
    }

}

function ValidarConsultaPeriodo() {
    if ($("#data_inicial").val().trim() == '') {
        alert("Preencher o campo Data inicial");
        $("#data_inicial").focus();
        return false;
    }

    if ($("#data_final").val().trim() == '') {
        alert("Preencher o campo Data final");
        $("#data_final").focus();
        return false;
    }
}

function ValidarLogin() {
    if ($("#email").val().trim() == '') {
        alert("Preencher o campo E-mail");
        $("#email").focus();
        return false;
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher o campo Senha");
        $("#senha").focus();
        return false;
    }
}

function ValidarCadastro() {
    if ($("#nome").val().trim() == '') {
        alert("Preencher o campo Nome");
        $("#nome").focus();
        return false;
    }

    if ($("#email").val().trim() == '') {
        alert("Preencher o campo E-mail");
        $("#email").focus();
        return false;
    }

    if ($("#senha").val().trim() == '') {
        alert("Preencher o campo Senha");
        $("#senha").focus();
        return false;
    }

    if ($("#senha").val().trim().lenght < 6) {
        alert("A senha deverá conter, no mínimo, 6 caracteres");
        $("#senha").focus();
        return false;
    }

    if ($("#senha").val().trim() != $("#rsenha").val().trim()) {
        alert("As senhas não coincidem");
        $("#senha").focus();
        return false;
    }
}