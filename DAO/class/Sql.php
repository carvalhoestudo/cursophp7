<?php

class Sql extends PDO {

    //Nomeando conexão com Banco de Dados.
    private $conn;

    //Método construtor para conexão com o Banco de Dados.
    public function __construct(){

        $this->conn = new PDO("mysql:host=localhost;dbname=dbphp7", "root","");
    }

    //Método inteligente para outros comandos.
    private function setParams($statement, $paramenters = array()){

        //Associando os comandos.
        foreach ($paramenters as $key => $value) {

            $this->setParam($statement, $key, $value);
        }
    }

    private function setParam($statement, $key, $value){

        $statement->bindParam($key, $value);
    }

    //Preparando execução dos comandos no BD.
    public function query($rawQuery, $params = array()){

        //Declarando valores da query Com o statment.
        $stmt = $this->conn->prepare($rawQuery);

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    //Preparando o método select
    public function select($rawQuery, $params = array()):array {

        $stmt = $this->query($rawQuery, $params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}

?>