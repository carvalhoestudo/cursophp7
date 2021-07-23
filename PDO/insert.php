<?php

//Conecção ao banco de dados
$conn = new PDO("mysql:host=localhost;dbname=dbphp7","root","");

//Preparando a query insert(inserir os dados em uma tabela)
$stmt = $conn->prepare("INSERT INTO tb_usuarios (deslogin, dessenha) VALUES(:LOGIN, :PASSWORD)");

//Enviando os dados dos parametros
$login = "Teste";
$password = "@123456";

//Fazendo o bind= "ligar os valores aos parametros"
$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);

//Executando o comando para inserir os dados
$stmt->execute();

//retornando confirmação da execução do comando
echo "Dados inseridos com sucesso!"


?>