<?php

//Conetando o Banco de Dados
$conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "");

//Preparando a query para excluir os dados.
$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario=:ID");

//Valores dos campos a serem excluídos.
$id = "2";

//Fazendo bindParam = "Ligando os valores aos parametros".
$stmt->bindParam(":ID", $id);

//Executando o comando para excluir dados.
$stmt->execute();

//Confirmação de exclusão de dados.
echo "Dados excluídos com sucesso!"."<br>"


?>