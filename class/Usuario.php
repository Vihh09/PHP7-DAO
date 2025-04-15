<?php

class Usuario {

    private $idusuario;
    private $deslogin;
    private $dessenha;
    private $dtcadastro;

    public function getIdusuario(){
        return $this->idusuario;
    }

    public function setIdusuario($value){
        $this->idusuario = $value;
    }

    public function getDeslogin(){
        return $this->deslogin;
    }

    public function setDeslogin($value){
        $this->deslogin = $value;
    }

    public function getDessenha(){
        return $this->dessenha;
    }

    public function setDessenha($value){
        $this->dessenha = $value;
    }

    public function getDtcadastro(){
        return $this->dtcadastro;
    }

    public function setDtcadastro($value){
        $this->dtcadastro = $value;
    }

    public function loadById($id){
        $sql = new Sql(); //em toda função precisa colocar de novo esse objeto
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE `idusuario` = :ID", array(
            ":ID" => $id
        ));

        if (count($results) > 0) { //verifica se existe

            $row = $results[0];

            $this->setDeslogin($row["deslogin"]);
            $this->setDessenha($row["dessenha"]);
            $this->setDtcadastro($row["dtcadastro"]);
            $this->setIdusuario($row["idusuario"]);


        }
    }

    public static function getList() //como nao usou nenhum $this, pode ser transformado em static e nao precisa ser colocado em um objeto quando chamado
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");
    }

    public static function search($login)
    {
        $sql = new Sql();
        return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(
            ':SEARCH' => "%$login%"
        ));
    }
    public function __toString()
    {
        return json_encode(array(
            "idusuario" => $this->getIdusuario(),
            "deslogin" => $this->getDeslogin(),
            "dessenha" => $this->getDessenha(),
            "dtcadastro" => $this->getDtcadastro(),
        ));
    }


    public function login($login, $password)
    {
        $sql = new Sql(); //em toda função precisa colocar de novo esse objeto
        $results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin = :LOGIN AND dessenha = :PASSWORD", array(
            ":LOGIN" => $login,
            ":PASSWORD" => $password
        ));

        if (count($results) > 0) { //verifica se existe

            $row = $results[0];

            $this->setDeslogin($row["deslogin"]);
            $this->setDessenha($row["dessenha"]);
            $this->setDtcadastro($row["dtcadastro"]);
            $this->setIdusuario($row["idusuario"]);


        }else{
            throw new Exception("Login e/ou senha inválidos", 1);
        }
    }

}