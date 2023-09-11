<?php

interface DBInterface
{
    public function listar();
    public function atualizar($id, $dados);
    public function gravar($dados);
    public function remover($id);
    public function ver($id);
}
