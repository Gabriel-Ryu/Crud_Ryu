<?php

// Importa a interface do banco
require "./interface/DBInterface.php";
// Inporta a classe onde sera herdado o DAO
require "./config/Dao.php";

class UsuarioDao extends Dao implements DBInterface
{
    public function listar()
    {
        $sql = "SELECT * FROM tb_usuarios ORDER BY nome ASC";
        //Seleciona os registros
        $stmt = $this->bancoDados->prepare($sql);

        $stmt->execute();

        $response = [];

        while ($usuario = $stmt->fetch(PDO::FETCH_ASSOC)) :
            $response[] = $usuario;
        endwhile;

        return $response;
    }
    public function gravar($usuario)
    {

        $sql = "INSERT INTO tb_usuarios (nome, nome_acesso, cpf, situacao) VALUES (:nome, :nomeAcesso, :cpf, :situacao)";
        $stmt = $this->bancoDados->prepare($sql);
        $stmt->bindParam(':nome', $usuario->getNome());
        $stmt->bindParam(':nomeAcesso',  $usuario->getNomeAcesso());
        $stmt->bindParam(':cpf',  $usuario->getCpf());
        $stmt->bindParam(':situacao',  $usuario->getSituacao());

        if ($stmt->execute()) {
            return true;
        } else {
            throw ($stmt->errorInfo());
        }
    }
    public function atualizar($codigo, $usuario)
    {
        $sql = "UPDATE tb_usuarios SET nome = :nome, nome_acesso = :nomeAcesso, cpf = :cpf, situacao = :situacao WHERE id = :id";
        $stmt = $this->bancoDados->prepare($sql);
        $stmt->bindParam(':id', $codigo, PDO::PARAM_INT);
        $stmt->bindParam(':nome', $usuario->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':nomeAcesso',  $usuario->getNomeAcesso(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf',  $usuario->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':situacao',  $usuario->getSituacao(), PDO::PARAM_STR);

        if ($stmt->execute()) {
            return true;
        } else {
            throw ($stmt->errorInfo());
        }
    }
    public function remover($codigo)
    {

        $codigo  = isset($_POST['id']) ? $_POST['id'] : null;

        // valida o ID
        if (empty($codigo)) {
            echo "ID não informado";
            exit;
        }

        // remove do banco
        $sql = "DELETE FROM tb_usuarios WHERE id = :id";
        $stmt = $this->bancoDados->prepare($sql);
        $stmt->bindParam(':id', $codigo, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return true;
        } else {
            throw ($stmt->errorInfo());
        }

        return false;
    }
    public function ver($codigo)
    {
        // Prepara a query de listagem
        $stmt = $this->bancoDados->prepare("SELECT * FROM tb_usuarios WHERE id = :id ORDER BY nome ASC");
        // Atribui ao valor ficticio :id o valor real que vem do get
        $stmt->bindParam(":id", $_GET["id"]);
        // Executa a query
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
