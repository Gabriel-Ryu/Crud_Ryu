function editarUsuario(){
    var idUpdate = document.getElementById("id").value;
    var nomeUpdate = document.getElementById("nome").value;
    var nomeAcessoUpdate = document.getElementById("nome_acesso").value;
    var cpfUpdate = document.getElementById("cpf").value;
    var situacaoUpdate = document.getElementById("situacao").value;
    var nomeDB = document.getElementById("nome_DB").value;
    var nomeAcessoDB = document.getElementById("nomeAcesso_DB").value;
    var cpfDB = document.getElementById("cpf_DB").value;
    var situacaoDB = document.getElementById("situacao_DB").value;
    if (nomeUpdate == nomeDB && nomeAcessoUpdate == nomeAcessoDB && cpfUpdate == cpfDB && situacaoUpdate == situacaoDB){
         alert('Ta tudo igual');
        return;
    }
    $.post("usuariosRota.php", {
        "acao":"edita",
        "id": idUpdate,
        "nome": nomeUpdate,
        "nome_acesso": nomeAcessoUpdate,
        "cpf": cpfUpdate,
        "situacao": situacaoUpdate
    })
    .done(function(){
        alert('Usuário editado com sucesso');
        location.reload();
    })
}

function insereUsuario() {
    var nomeInsert = document.getElementById("nome-insert").value;
    var nomeAcessoInsert = document.getElementById("nome-acesso-insert").value;
    var cpfInsert = document.getElementById("cpf-insert").value;
    var situacaoInsert = document.getElementById("situacao-insert").value;
    $.post("usuariosRota.php", {
        "acao":"novo",
        "nome": nomeInsert,
        "nome_acesso": nomeAcessoInsert,
        "cpf": cpfInsert,
        "situacao": situacaoInsert
    }, function (dados) {
        console.log(dados);
    })
        .done(function () {
            alert('Usuário inserido com sucesso');
            location.reload();
        })
}

function excluirUsuario() {
    var idDelete = document.getElementById("id").value;
    var nomeDelete = document.getElementById("nome").value;
    var nomeAcessoDelete = document.getElementById("nome_acesso").value;
    var cpfDelete = document.getElementById("cpf").value;
    var situacaoDelete = document.getElementById("situacao").value;
    $.post("usuariosRota.php", {
        "acao":"deletar",
        "id": idDelete,
        "nome": nomeDelete,
        "nome_acesso": nomeAcessoDelete,
        "cpf": cpfDelete,
        "situacao": situacaoDelete
    }, function (dados){
        console.log(dados);
    })
        .done(function () {
            alert('Usuário excluído com sucesso');
            location.reload();
        })
}