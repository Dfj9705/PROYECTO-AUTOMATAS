<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>AUTOMATAS</title>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Resultados:</h1>
        <div class="row justify-content-center">
            <div class="col-lg-6 border rounded bg-light">

         
<?php

    for ($i=0; $i < 7; $i++) { 
        $nombre = "estado$i";
        $$nombre = $_POST[$nombre];
    }

    $cadena = $_POST['cadena'];
    $arrayCadena = str_split($cadena);
    $caracteres = ['+', 'E', '-', '*', '/'];
    echo "<p><span class='fw-bold'>CADENA INGRESADA: </span>";
    echo $cadena;
    echo "</p>";


    $estadoActual = 0;
    $counterCadena = 1;

    $valido = false;

  

    echo "<hr>";
    $nombre = "estado$estadoActual";
    if(count($arrayCadena) > 0){
        foreach ($arrayCadena as $key => $caracter) {
            
            $valido = false;
            
            $indice =  array_search($caracter, $caracteres, true);
            $numerico = is_numeric($caracter);
            if(!isset($$nombre[$indice])){
                break;
            }
            echo "<p><span class='fw-bold'>ITERACIÓN $counterCadena</span></p>";
            echo "<p><span class='fw-bold'>ESTADO ACTUAL: </span> q";
            echo $estadoActual;
            echo "</p>";
            if(is_int($indice) ){

               
                $estadoActual = $$nombre[$indice];
                $nombre = "estado$estadoActual";
                $valido = true;
                $valido = isset($$nombre[6]);
                echo "<p><span class='fw-bold'>CARACTER A EVALUAR: </span>";
                echo $caracter;
                echo "</p>";
    
               
            } else if($numerico){
                
                $estadoActual = $$nombre[5];
                $nombre = "estado$estadoActual";
                $valido = true;
                $valido = isset($$nombre[6]);
                echo "<p><span class='fw-bold'>CARACTER A EVALUAR: </span>";
                echo $caracter;
                echo "</p>";
    
            } else {
                $valido = false;
                break;
            }

            echo "<hr>";
            echo "<br>";
            $counterCadena++;
        }
    }else{
        $valido = isset($$nombre[6]);
    }


    if($valido){
        echo "<div class='alert alert-success'>CADENA VALIDA</div>";
    }else{
        echo "<div class='alert alert-danger'>CADENA INVALIDA</div>";
    }

?>
            </div>
        </div>
    </div>
</body>
</html>