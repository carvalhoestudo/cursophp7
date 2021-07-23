<?php

//Conecção como Banco de dados.
$conn = new PDO("mysql:host=localhost; dbname=dbphp7", "root", "");

//Preparando a atualização de dados na tabela do BD.
$stmt = $conn->prepare("UPDATE tb_usuarios SET deslogin = :LOGIN, dessenha= :PASSWORD WHERE idusuario = :ID");

//Valores dos campos a serem trocados.
$login = "carvalho";
$password = "@1234";
$id = "1";

//Fazendo bindParam = "Ligando os valores aos parametros".
$stmt->bindParam(":LOGIN", $login);
$stmt->bindParam(":PASSWORD", $password);
$stmt->bindParam(":ID", $id);

//Executando o comando para atualizar dados.
$stmt->execute();

//Confirmação de atualizaçção de dados.
echo "Dados atualizados com sucesso!"."<br>"

?>