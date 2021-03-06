<?php
error_reporting(E_ALL);
function pruebaFichero($fich)
{

    if (!file_exists($fich)) :
        echo "Fichero no encontrado " . $fich;
        die();
    endif;
    $file = fopen($fich, "r");
    while (!feof($file)) :
        echo fgets($file) . "<br />";
    endwhile;
    fclose($file);
}

function generaAssocDesdeDesordenado($rutaFichero)
{
    $assoc = array();
    if (!file_exists($rutaFichero)) :
        echo "Fichero no encontrado " . $rutaFichero;
        die();
    endif;
// abrir el fichero
    $fich_desc = fopen($rutaFichero, 'r');



    while (($registro = fgets($fich_desc)) && !feof($fich_desc)) :
        //$registro = fgets($fich_desc); // leer siguiente ...
        $campos = explode("#", $registro);
        if (!isset($assoc[$campos[0]])) :
            $assoc[$campos[0]] = array();
        endif;
        array_push($assoc[$campos[0]], $campos[1]);

    endwhile;
    fclose($fich_desc);

    return $assoc;
}

function leerOrdenadoC1($rutaFichero)
{
    // comprobar si existe el fichero
    if (!file_exists($rutaFichero)) :
        echo "Fichero no encontrado " . $rutaFichero;
        die();
    endif;
// abrir el fichero
    $fich_desc = fopen($rutaFichero, 'r');
    $c1_total = 0;
    $c1_subtotal = 0;
    $registro = fgets($fich_desc); // lectura del primer registro
    while (!feof($fich_desc)) :
        $c1 = explode("#", $registro)[0];
        $c1_ant = $c1;
        while (!feof($fich_desc) && ($c1 == $c1_ant)) :
            $c1_subtotal += (int)explode("#", $registro)[1];
            echo $registro . "<br/>";
            $registro = fgets($fich_desc); // leer siguiente ...
            $c1 = explode("#", $registro)[0];
        endwhile;
        $c1_total += $c1_subtotal;
        echo "SUBTOTAL de " . $c1_ant . " : " . $c1_subtotal . "<br/>";
        $c1_subtotal = 0;
    endwhile;
    fclose($fich_desc);
    echo "TOTAL " . $c1_total . "<br/>";
}