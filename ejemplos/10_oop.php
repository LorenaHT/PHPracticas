<?php
/**
 * Created by PhpStorm.
 * User: lore9
 * Date: 14/01/2019
 * Time: 13:32
 */
require("modelo/Estudiante.php");

//use Datos\Estudiante as E;
use Datos\Persona as P;
//$est1 = new E("443332211G", "Paco", "19930215",'S',183);
$est1 = new Datos\Estudiante(123, "20180612","443332211G", "Paco", "19930215",'S',183);
var_dump($est1);
echo("<br/>");
echo("Número de estudiantes : " . Datos\Estudiante::getContadorE());
echo("<br/>");
echo("<br/>");
$per1 = new P("443332211G", "Paco", "19930215",'S',183);
var_dump($per1);
echo("<br/>");
echo("Número de personas : " . P::getContadorP());
echo("<br/>");
echo("<br/>");
printf("%d -> %s", $per1->getAltura(), $per1->__toString());





