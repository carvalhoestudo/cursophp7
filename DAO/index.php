<?php

require_once("config.php");

/*Listando um determinado usuario da classe usuarios.
$user = new Usuarios();
$user->loadById(1);
echo $user;*/

/*Lista ordenada de usuários da classe usuarios.
$lista = Usuarios::getList();
echo json_encode($lista);*/

/*Lista de usuarios por login
$search = Usuarios::search("v");
echo json_encode($search);*/

//Exibindo usuário logado
$usuario = new Usuarios();
$usuario->Logged("carvalho","@1234");
echo ($usuario);

?>