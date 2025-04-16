<?php

require_once ("config.php");

//Carrega um usuario
//$root = new Usuario();
//$root->loadById(3);
//echo $root;

//Carrega uma lista de usuarios
//$lista = Usuario::getList();
//echo json_encode($lista);


//Carrega lista de usuarios buscando pelo login
//$search = Usuario::search("jo");
//echo json_encode($search);

//Carrega um usuario usando o login e a senha
//$usuario = new Usuario();
//$usuario->login("user","123456");
//echo $usuario;

//Inserindo usuario novo
//$aluno = new Usuario("aluno", "@lun0");
//$aluno->insert();
//echo $aluno;

//modificando
//$usuario = new Usuario();
//$usuario->loadById(8);
//$usuario->update("professor", "!@#$%¨&*");
//echo $usuario;


//Delete
$usuario = new Usuario();
$usuario->loadById(8);
$usuario->delete();
echo $usuario;