<?php
/**
 * Created by PhpStorm.
 * User: lore9
 * Date: 14/01/2019
 * Time: 13:32
 */
include_once ("modelo/Estudiante.php");
//use Datos\Estudiante as E;
//$est1 = new E("443332211G", "Paco", "19930215",'S',183);
$est1 = new Estudiante(123, "20180612","443332211G", "Paco", "19930215",'S',183);

var_dump($est1);





