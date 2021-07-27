<?php
// Convertendo os arrays de dados para arquivo .CSV.//
/*
== REFERENCE ==
w+ = Criar e escrever um arquivo.
a+ = Adiciona conteúdo, move ponteiro para a próxima linha.
\r = Pula uma linha.
\n = Cria uma nova linha
\t = Separa com TAB(tabulação)
*/
require_once("../DAO/class/Sql.php");
require_once("../DAO/config.php");

//Acessando o BD.
$sql = new Sql();

//Selecionando a tabela do BD.
$usuarios = $sql->select("SELECT * FROM tb_usuarios ORDER BY deslogin");

//Detectando os nomes das colunas.
$header = array();

foreach ($usuarios[0] as $key => $value) {
    array_push($header, ucfirst($key));

}

//Incluindo o cabeçalho no arquivo (.CSV)
$file = fopen("usuarios.csv", "w+");

//Definindo o tipo de separador da cobeçalho.
fwrite($file, implode(" | ", $header) . "\r\n\n");

//Alimentando o arquivo com os dados da tabela.
foreach ($usuarios as $row) {
    //Criando foreach de linhas.
    $data = array();
    //Criando foreach de colunas.
    foreach($row as $key => $value){
        array_push($data, $value);

    }//Fim foreach de colunas.

    //Adicionando os dados nas linhas do arquivo.
    fwrite($file, implode(" | ", $data) . "\r\n");

}//Fim foreach linhas

//Fechando o arquivo.
fclose($file)

?>