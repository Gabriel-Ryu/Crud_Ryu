<?php
require_once 'init.php';
$usuarioController = new UsuarioController();
$listaUsuarios = $usuarioController->listar();
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Usuarios</title>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="usuarios.js"></script>
</head>

<body>
    <div class="body-container">
        <header>
            <h1 class="titulo">Listagem de Usuarios</h1><br>
        </header>
        <div class="caixa">
            <div class="criar-usuario">
                <input placeholder="Adicione um usuário" type="text" class="novo-nome-usuario" id="nome-insert"> <br>
                <input placeholder="Nome de acesso" type="text" class="novo-nome-acesso" id="nome-acesso-insert"> <br>
                <input placeholder="CPF" type="text" class="novo-cpf" id="cpf-insert"> <br>
                <input placeholder="Situacao" type="text" class="novo-situacao-usuario" id="situacao-insert"> <br>
                <input type="button" class="btn-insert" value="Inserir" onclick="insereUsuario()">
            </div>
            <br>
            <div class="container">
                <form method="post" action="<?= APP  ?>usuariosRota.php">
                    <table class="table">
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Nome acesso</th>
                            <th>CPF</th>
                            <th>Situacao</th>
                        </tr>
                        <?php
                        foreach ($listaUsuarios as $usuarios) {
                            $id = $usuarios['id'];
                            $nome = $usuarios['nome'];
                            $nomeAcesso = $usuarios['nome_acesso'];
                            $cpf = $usuarios['cpf'];
                            $situacao = $usuarios['situacao'];
                        ?>
                            <tr>
                                <th id="codigo"><?= $usuarios['id'] ?></th>
                                <input type="hidden" id="id" value="<?= $id ?>"></input>
                                <input type="hidden" id="nome_DB" value="<?= $nome ?>"></input>
                                <input type="hidden" id="nomeAcesso_DB" value="<?= $nomeAcesso ?>"></input>
                                <input type="hidden" id="cpf_DB" value="<?= $cpf ?>"></input>
                                <input type="hidden" id="situacao_DB" value="<?= $situacao ?>"></input>
                                <th><input type="text" class="input-text" id="nome" value="<?= $usuarios['nome'] ?>"></th>
                                <th><input type="text" class="input-text" id="nome_acesso" value="<?= $usuarios['nome_acesso'] ?>"></th>
                                <th><input type="text" class="input-text" id="cpf" value="<?= $usuarios['cpf'] ?>"></th>
                                <th><input type="text" class="input-text" id="situacao" value="<?= $usuarios['situacao'] ?>"></th>
                                <th>
                                    <input type="button" class="btn-edit" value="Editar" onclick="editarUsuario()">
                                    <input type="button" class="btn-delete" value="Excluir" onclick="excluirUsuario()">
                                </th>
                            </tr>
                        <?php } ?>
                    </table>
                </form>
            </div>
            <div class="btn-voltar-container"><a class="voltar" href="index.php">Voltar</a></div>
        </div>
    </div>
</body>

</html>