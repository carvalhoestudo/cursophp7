<?php
// criando uma pasta no diretório
if(!is_dir("images")) mkdir("images");

// Função para ler um diretório e transforma-lo em array.
foreach (scandir("images") as $item) {
    if (!in_array($item, array('.', '..'))){
        //Excluindo/Removendo imagem.
        unlink("images/" . $item);

    }
}

echo "O Arquivo $item foi removido/excluído com sucesso!";

?>
