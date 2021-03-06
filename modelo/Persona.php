<?php
/**
 * Created by PhpStorm.
 * User: mauricio
 * Date: 31/01/2018
 * Time: 11:41
 */

namespace Datos;
require("modelo/Humano.php");
class  Persona implements Humano, Interfaz2
    {
        private $nif;
        private $nombre;
        private $fecha;
        private $ecivil; //'S,C,D,A'
        private $altura; //entero cms.
        private static $contadorP = 0;

        /**
         * @return int
         */
        public static function getContadorP(): int
        {
            return self::$contadorP;
        }

        /**
         * @param int $contadorP
         */
        public static function setContadorP(int $contadorP): void
        {
            self::$contadorP = $contadorP;
        }

        /**
         * Persona constructor.
         * @param $nif
         * @param $nombre
         * @param $fecha
         * @param $ecivil
         * @param $altura
         */

        public  function __construct($nif, $nombre, $fecha, $ecivil, $altura)
        {
            $this->nif = $nif;
            $this->nombre = $nombre;
            $this->fecha = $fecha;
            $this->ecivil = $ecivil;
            $this->altura = $altura;
            self::$contadorP++;

        }


        /**
         * @return mixed
         */
        public function getNif()
        {
            return $this->nif;
        }

        /**
         * @param mixed $nif
         */
        public function setNif($nif): void
        {
            $this->nif = $nif;
        }

        /**
         * @return mixed
         */
        public function getNombre()
        {
            return $this->nombre;
        }

        /**
         * @param mixed $nombre
         */
        public function setNombre($nombre): void
        {
            $this->nombre = $nombre;
        }

        /**
         * @return mixed
         */
        public function getFecha()
        {
            return $this->fecha;
        }

        /**
         * @param mixed $fecha
         */
        public function setFecha($fecha): void
        {
            $this->fecha = $fecha;
        }

        /**
         * @return mixed
         */
        public function getEcivil()
        {
            return $this->ecivil;
        }

        /**
         * @param mixed $ecivil
         */
        public function setEcivil($ecivil): void
        {
            $this->ecivil = $ecivil;
        }

        /**
         * @return mixed
         */
        public function getAltura()
        {
            return $this->altura;
        }

        /**
         * @param mixed $altura
         */
        public function setAltura($altura): void
        {
            $this->altura = $altura;
        }

    public function caminar($numPasos)
    {
        // TODO: Implement caminar() method
        return $numPasos * 1.23;
    }

    public function dormir($numHoras)
    {
        // TODO: Implement dormir() method.
        return ($numHoras >= 8);
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        //return $this->nif . "#" . $this->nombre;
        return $this->nif . "#" . self::FOO2;
    }

    public function metodo2()
    {
        // TODO: Implement metodo2() method.
    }
}
    interface Interfaz2{
        public function metodo2();

}

