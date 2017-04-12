<?php

//var_dump($_POST);
//var_dump($_FILES);
mkdir("fotos",0777);

$nameTmp = $_FILES["archivo"]["name"];

$name = explode(".",$nameTmp);

//$extension = pathinfo($_FILES["archivo"]["tmp_name"],PATHINFO_EXTENSION);

$archivoTmp = $_FILES["archivo"]["tmp_name"];

$nombre = $_POST["nombre"];

if(!file_exists("fotos"."/".$nombre.".".$name[1]))
{
    copy($archivoTmp,"fotos"."/".$nombre.".".$name[1]);
    echo "Se subio el archivo exitosamente";
    
}
    else
        {
            mkdir("backup",0777);
            $date = date('dmy');

            copy("fotos"."/".$nombre.".".$name[1],"backup"."/".$nombre.$date.".".$name[1]);
            echo "El archivo ya existia. Se realizo un backup del archivo";
            
        }



//var_dump($_FILES);





?>