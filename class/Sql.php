<?php

class Sql extends PDO {

    private $conn; //só pode ser usado dentro da classe

    public function __construct() { //metodo que vai ser rodado assim que a função for chamada

        $this->conn = new PDO("mysql:host=localhost;dbname=mota", "root", "Desenv#6");//conexão com o banco
    }


    private function setParam($statment, $key, $value) {

        $statment->bindParam($key, $value);

    }

    private function setParams($statment, $parameters = array()) { //funcao para modificar valores

        foreach ($parameters as $key => $value) { //for para arrays, no caso o array params

            $this->setParam($key, $value); //associa os indices do array (chaves) com os valores

        }
    }


    //$rawQuery = código puro do SQL informado
    //params = array com os dados do banco
    public function runquery($rawQuery, $params = array()) {

        $stmt = $this->conn->prepare($rawQuery); //executa o comando SQL

        $this->setParams($stmt, $params);

        $stmt->execute();

        return $stmt;
    }

    public function select($rawQuery, $params = array()):array{ //funcao para mostrar dados

        $stmt = $this->runquery($rawQuery, $params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}
