<?php

//Criando arquivo caso não exista.
$file = fopen("teste.txt", "w+");

fclose($file);

//Excluindo/Removendo o arquivo
unlink("teste.txt");

echo "Arquivo excluído/removido com sucesso!"

?>