<?php
/*
== REFERENCE ==
w+ = Criar e escrever um arquivo.
a+ = Adiciona conteúdo, move ponteiro para a próxima linha.
\r = Pula uma linha.
\n = Cria uma nova linha
\t = Separa com TAB(tabulação)
*/

/*Criando arquivo txt
$file = fopen("log.txt", "w+");

fwrite($file, date("d/M/Y H:i:s"));

fclose($file);

echo "Arquivo criado com sucesso!";*/

//Criando e adicionando arquivo txt.

$file = fopen("log.txt", "a+");

fwrite($file, date("d/M/Y H:i:s") . "\r\n");

fclose($file);

echo "Arquivo criado com sucesso!";

?>