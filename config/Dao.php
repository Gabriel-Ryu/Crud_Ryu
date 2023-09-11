<?php

abstract class Dao
{
    public $bancoDados;

    public function __construct()
    {
        $this->bancoDados = $this->connectDB();
    }

    private function connectDB()
    {
        try{
            $PDO = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // $PDO = exec("set names utf8");
            return $PDO;
        }
        catch(PDOException $erro){
            echo "Erro na conexão:" . $erro->getMessage();
        }
    }
}
