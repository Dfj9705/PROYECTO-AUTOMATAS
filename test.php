<?php
require 'vendor/autoload.php';
$caracteres = ['+', 'E', '-', '*', '/'];
// echo "<pre>";
// print_r($_POST);
// echo "</pre>";
$graph = new Graphviz\Digraph();
$graph->set('rankdir', 'LR');
$graph->beginNode('q0');

foreach ($_POST as $key => $value) {
    if($key != 'cadena'){
        $final = isset($_POST[$key][6]);  
        foreach($_POST[$key] as $clave => $valor){
            $edge = [];
            $edge[]= $key;
            $valores = $final ? ['peripheries' =>  '2'] : [];
            if($valor != '' && $clave != 6){
                $nodo1 = $graph->node($key);
                $edge[] = "q$valor";
                $nodo2 = $graph->node("q$valor");
                $graph->edge($edge, ['label'=> $clave < 4  ? "\\" . $caracteres[$clave] : 'DIGITO'] );
            }
        }
        // foreach($_POST[$key] as $clave => $valor){
        //     $edge = [];
        //     $edge[]= $key;
        //     if($valor != '' && $clave != 6){
        //         $edge[] = "q$valor";
        //         $graph->edge($edge, ['label'=> $clave < 4  ? "\\" . $caracteres[$clave] : 'DIGITO'] );
        //         print_r($edge);   
        //         echo "<br>";
        //         // $edge =
        //     }
        // }

        // if(count($edge) > 1){
        // }


    }
}
// exit;

// $graph->edge(['q0', 'q0']);

// $foo =$graph->node('foo');


$dotCode = $graph->render();
// $dotCode = 'digraph G {
//     q0 -> q1;
//     q1 -> q1;
// }';

// Ruta al archivo DOT
$dotFilePath = 'temp.dot';

// Ruta al archivo de imagen de salida
$imageFilePath = 'output.png';

// Guardar el código DOT en un archivo
file_put_contents($dotFilePath, $dotCode);

// // Ejecutar Graphviz para convertir el archivo DOT en una imagen
exec("dot -Tpng $dotFilePath -o $imageFilePath");

// // Verificar si se generó la imagen con éxito
// if (file_exists($imageFilePath)) {
//     echo 'La imagen se ha generado con éxito: <br>';
//     echo '<img src="' . $imageFilePath . '" alt="Gráfico DOT">';
// } else {
//     echo 'No se pudo generar la imagen.';
// }

// exit;
?>
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
                <img src="<?= $imageFilePath ?>" alt="Gráfico DOT">

<?php

    for ($i=0; $i < 7; $i++) { 
        $nombre = "q$i";
        $$nombre = $_POST[$nombre];
    }

    $cadena = $_POST['cadena'];
    $arrayCadena = str_split($cadena);

    echo "<p><span class='fw-bold'>CADENA INGRESADA: </span>";
    echo $cadena;
    echo "</p>";


    $estadoActual = 0;
    $counterCadena = 1;

    $valido = false;

  

    echo "<hr>";
    $nombre = "q$estadoActual";
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
                $nombre = "q$estadoActual";
                $valido = true;
                $valido = isset($$nombre[6]);
                echo "<p><span class='fw-bold'>CARACTER A EVALUAR: </span>";
                echo $caracter;
                echo "</p>";
    
               
            } else if($numerico){
                
                $estadoActual = $$nombre[5];
                $nombre = "q$estadoActual";
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
        echo "<p><span class='fw-bold'>ESTADO FINAL: </span> q";
        echo $estadoActual;
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