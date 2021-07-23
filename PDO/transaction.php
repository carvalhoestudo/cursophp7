<?php

//Conetando o Banco de Dados
$conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "");

//Abrindo a transação.
$conn->beginTransaction();

//Preparando a query para excluir os dados utilizando paramentro.
$stmt = $conn->prepare("DELETE FROM tb_usuarios WHERE idusuario = ?");

//Valores dos campos a serem excluídos.
$id = "5";

//Executando o comando para excluir dados por parametro.
$stmt->execute(array($id));

//Confirmação de exclusão de dados.
echo "Dados excluídos com sucesso!"."<br/>";

//cancelando o comando de exclusão com rollback.
/*$conn->rollBack();

//Confirmação do cancelamento da exclusão de dados.
echo "Exclusão cancelada com sucesso!"."<br/>";
*/
//Para confirma o comando da query usar commit.
$conn->commit();

//Confirmação de exclusão de dados.
echo "Exclusão confirmada com sucesso!"."<br/>";

?>