<?php
//Constantes com as credenciais de acesso ao banco MySQL
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bd_projeto');

// Configuração da url da aplicação
define('URL', 'http://localhost:80'); // se o localhost possuir outra porta é so trocar 80 pela porta específica
define('APP', URL . dirname($_SERVER['PHP_SELF']) . '/');

//Habilita todas as exibições de erro
ini_set('display_errors', true);
error_reporting(E_ALL);

// Define o horário
date_default_timezone_set('America/Sao_Paulo');

//Inclui o arquivo de banco de dados
// require_once 'config/Dao.php';

require_once "interface/ModelInterface.php";
require_once 'dao/UsuarioDao.php';   
require_once 'model/UsuarioModel.php';
require_once 'Controller/UsuarioController.php';
