<?php
require 'init.php';

$usuarioController = new UsuarioController();


if (isset($_POST['acao']) && $_POST['acao'] == 'novo') {
    $usuarioController->gravar();
} elseif (isset($_POST['acao']) && $_POST['acao'] == 'edita') {
    $usuarioController->atualizar();
} elseif (isset($_POST['acao']) && $_POST['acao'] == 'deletar') {
    $usuarioController->remover();
}
