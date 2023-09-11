<?php

// Importa a classe modelo de Cliente
require "./config/Model.php";

class UsuarioModel extends Model
{
    /*Metodo construtor da classe*/
    public function __construct()
    {
    }

    /*Variaveis privadas que receberao os dados*/
    private $id = 0;
    private $nome = "";
    private $nomeAcesso = "";
    private $cpf = "";
    private $situacao = "";

    /*Metodos get e set que trazem o conteudo da variavel privada desejada*/
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = intval($id);
    }

    public function getNome()
    {
        return $this->nome;
    }
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getNomeAcesso()
    {
        return $this->nomeAcesso;
    }
    public function setNomeAcesso($nomeAcesso)
    {
        $this->nomeAcesso = $nomeAcesso;
    }
    public function getCpf()
    {
        return $this->cpf;
    }
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }
    public function getSituacao()
    {
        return $this->situacao;
    }
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }
}
