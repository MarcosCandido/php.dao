<?php

require_once("config.php");


//$root = new Usuario();

//$root->loadById(2);

//echo $root;

//CARREGA UMA LISTA DE USUÁRIO MÉTODO STATIC

/*$lista = Usuario::getList();

echo json_encode($lista);*/

//$search = Usuario::search("Pau");

//echo json_encode($search);

$usuario = new Usuario();
$usuario->login("Paulo","1234");

echo $usuario;



?>