<?php

//Verificando se um diretorio existe.
$name = "img";

if (!is_dir($name)) {
    //Criando diretorio caso não exista.
    mkdir($name);
    echo "Diretório $name foi criado com sucesso!";

}  elseif($name) {
    // Caso o diretório já exista.
    echo "O diretório $name já existe no projeto";

    // Remover diretório.
    rmdir($name);
    echo " e foi removido.";

}


?>