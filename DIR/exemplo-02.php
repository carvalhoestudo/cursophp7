<?php

//Verificando se existem arquivos dentro do diretorio.
$images = scandir("images");

//Convertendo dados em array.
$data = array();

//Buscando arquivos em uma pasta
foreach ($images as $img) {
    //Tratando array
    if (!in_array($img, array(".", ".."))) {
        //Tratando caminho do arquivo.
        $filename = "images" . DIRECTORY_SEPARATOR . $img;

        //Obtendo informações do arquivo.
        $info = pathinfo($filename);

        //Obtendo o tamanho do arquivo.
        $info ["size"] = filesize($filename);

        //Obtendo data hora da última modificão do arquivo.
        $info ["modified"] = date("d/m/Y H:i:s", filemtime($filename));

        //URL do arquivo com replace das barras.
        $info ["url"] = "http://cursohcode/cursophp7/DIR/" . str_replace("\\", "/", $filename);

        array_push($data, $info);

    } 

}
    
echo json_encode($data);


?>