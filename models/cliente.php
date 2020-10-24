<?php

    Class Cliente{
        private $nombre;
        private $apellido;
        private $correoElectronico;
        private $fechaNacimiento;
        private $direccion;
        private $contrasena;

        function __construct()
        { }
    
        function getNombre(){
            return $this->nombre;
        }
        function getApellido(){
            return $this->apellido;
        }
        function getCorreoElectronico(){
            return $this->correoElectronico;
        }
        function getFechaNacimiento(){
            return $this->fechaNacimiento;
        }
        function getDireccion(){
            return $this->direccion;
        }
        function getContrasena(){
            return $this->contrasena;
        }
        //
        function setNombre($nombre)
        {
            $this->nombre = $nombre;
        }
        function setApellido($apellido)
        {
            $this->apellido = $apellido;
        }
        function setCorreoElectronico($correoElectronico)
        {
            $this->correoElectronico = $correoElectronico;
        }
        function setFechaNacimiento($fechaNacimiento)
        {
            $this->fechaNacimiento = $fechaNacimiento;
        }
        function setDireccion($direccion)
        {
            $this->direccion = $direccion;
        }
        function setContrasena($contrasena)
        {
            $this->contrasena = $contrasena;
        }

    }

?>