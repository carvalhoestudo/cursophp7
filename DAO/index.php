<?php

require_once("config.php");

//Usando a classe usuarios
$user = new Usuarios();

$user->loadById(1);

echo $user;

?>