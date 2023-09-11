<?php

class UsuarioController
{

    // Cria a instancia do DAO
    private $usuarioDao;

    public function __construct()
    {
        $this->usuarioDao = new UsuarioDao();
    }

    public function listar()
    {
        try {
            // Grava os dados no banco
            $executar = $this->usuarioDao->listar();

            return $executar;
        } catch (Exception $erro) {
            print_r($erro->getMessage());
        }
    }

    public function atualizar()
    {
        try {
            $usuarioModel = $this->retornaDados();
            $id = $usuarioModel->getId();
            // Grava os dados no banco
            $executar = $this->usuarioDao->atualizar($id, $usuarioModel);
            header('Location: ' . APP . 'usuarios.php');

            return $executar;
        } catch (Exception $erro) {
            print_r($erro->getMessage());
        }
    }

    public function gravar()
    {
        try {

            $usuarioModel = $this->retornaDados();

            // Grava os dados no banco
            $executar = $this->usuarioDao->gravar($usuarioModel);
            header('Location: ' . APP . 'usuarios.php');

            return $executar;
        } catch (Exception $erro) {
            print_r($erro->getMessage());
        }
    }

    public function remover()
    {
        try {
            $usuarioModel = $this->retornaDados();

            if (empty($_POST['id'])) {
                header("Location: " . APP . "usuarios.php");
            }

            // Grava os dados no banco
            $executar = $this->usuarioDao->remover($usuarioModel->getId());
            header('Location: ' . APP . 'usuarios.php');

            return $executar;
        } catch (Exception $erro) {
            print_r($erro->getMessage());
        }
    }

    public function ver()
    {
        try {
            if (empty($_GET['id'])) {
                header("Location: " . APP . "usuarios.php");
            }

            // Grava os dados no banco
            $executar = $this->usuarioDao->ver($_GET['id']);

            return $executar;
        } catch (Exception $erro) {
            print_r($erro->getMessage());
        }
    }

    // Pega a requisicao e cria o objeto do cliente
    private function retornaDados()
    {


        // Cria um novo objeto de cliente
        $usuarioModel = new UsuarioModel();

        //Pega dados do formulário e atribui
        $usuarioModel->setId(isset($_POST['id']) ? $_POST['id'] : null);
        $usuarioModel->setNome(isset($_POST['nome']) ? $_POST['nome'] : null);
        $usuarioModel->setNomeAcesso(isset($_POST['nome_acesso']) ? $_POST['nome_acesso'] : null);
        $usuarioModel->setCpf(isset($_POST['cpf']) ? $_POST['cpf'] : null);
        $usuarioModel->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : null);


        //Validar para evitar dados vazios
        if (!empty($_POST['acao']) && (empty($usuarioModel->getNome()) || empty($usuarioModel->getNomeAcesso()) || empty($usuarioModel->getCpf()) || empty($usuarioModel->getSituacao()))) {
            echo "Preencha todos os campos";
            exit;
        }

        return $usuarioModel;
    }
}
