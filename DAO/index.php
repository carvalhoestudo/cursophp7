<?php

require_once("config.php");

/*Listando um determinado usuario da classe usuarios.
$user = new Usuario();
$user->loadById(1);
echo $user;*/

/*Lista ordenada de usuários da classe usuarios.
$lista = Usuario::getList();
echo json_encode($lista);*/

/*Lista de usuarios por login
$search = Usuario::search("v");
echo json_encode($search);*/

/*Exibindo usuário logado
$usuario = new Usuario();
$usuario->Logged("carvalho","@1234");
echo ($usuario);*/

/*Inserindo e retornando dados novo usuario.
$cliente = new Usuario("Teste", "!@#$%1");
$cliente->insert();
echo $cliente;*/

/*Atualizar dados de um usuario.
$usuario = new Usuario();
$usuario->LoadById(6);
$usuario->update("Andréia", "!@#2912");
echo $usuario;*/

//Deletar Usuário
$usuario = new Usuario();
$usuario->loadById(9);
$usuario->delete();
echo $usuario;


?>