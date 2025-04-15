<?php

require_once ("config.php");

$sql = new Sql(); //Sql é o nome da classe

$usuarios = $sql->select("SELECT * FROM tb_usuarios");

echo json_encode($usuarios);