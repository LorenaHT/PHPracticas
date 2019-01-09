<section class="resume-section p-3 p-lg-5 d-flex d-column" id="about">
    <div class="my-auto">
        <h1 class="mb-0">Recorrido de ficheros de texto</h1>
<?php

include ("includes/listados.php");
//leerOrdenadoC1("datos/ordenado.txt");
$datosFichero= generaAssocDesdeDesordenado("datos/desordenado.txt");
//var_dump($datosFichero);
ksort($datosFichero);
foreach ($datosFichero as $k => $v) {
    echo"<ul> $k :";
    foreach ($v as $v1)
        echo "<li>$v1</li>";
    echo "</ul>";
}
?>
</section>