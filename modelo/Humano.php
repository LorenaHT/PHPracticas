<?php
/**
 * Created by PhpStorm.
 * User: lore9
 * Date: 21/01/2019
 * Time: 11:56
 */

namespace Datos;


interface Humano
{
    const FOO2 = "something else";
    public function caminar($numPasos);
    public function dormir($numHoras);
}