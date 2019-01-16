<?php
/**
 * Created by PhpStorm.
 * User: lore9
 * Date: 14/01/2019
 * Time: 12:26
 */

namespace Datos;

include_once ("modelo/Persona.php");
class Estudiante extends Persona
{
    private $idGrupo;
    private $fecha_matricula; //aaaammdd
    private static $contadorE = 0;

    /**
     * @return mixed
     */
    public function getIdGrupo()
    {
        return $this->idGrupo;
    }

    /**
     * @param mixed $idGrupo
     */
    public function setIdGrupo($idGrupo): void
    {
        $this->idGrupo = $idGrupo;
    }

    /**
     * @return mixed
     */
    public function getFechaMatricula()
    {
        return $this->fecha_matricula;
    }

    /**
     * @param mixed $fecha_matricula
     */
    public function setFechaMatricula($fecha_matricula): void
    {
        $this->fecha_matricula = $fecha_matricula;
    }

    /**
     * @return int
     */
    public static function getContadorE(): int
    {
        return self::$contadorE;
    }

    /**
     * @param int $contadorE
     */
    public static function setContadorE(int $contadorE): void
    {
        self::$contadorE = $contadorE;
    }


    /**
     * Estudiante constructor.
     */
    public function __construct($idGrupo, $fecha_matricula, $nif, $nombre, $fecha, $ecivil, $altura)
    {
        parent::__construct($nif, $nombre, $fecha, $ecivil, $altura);
        $this->idGrupo=$idGrupo;
        $this->fecha_matricula = $fecha_matricula;
        self::$contadorE++;
        echo get_parent_class($this);

    }
}