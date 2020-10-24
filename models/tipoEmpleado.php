<?php
    Class TipoEmpleado{
        private $idTipoEmpleado;
        private $descripcion;
        private $estado;


        function __construct()
        { }

        public function getIdTipoEmpleado(){
            return $this->idTipoEmpleado;
        }

        public function getDescripcion(){
            return $this->descripcion;
        }

        public function getEstado(){
            return $this->estado;
        }

        public function setIdTipoEmpleado($idTipoEmpleado){
            $this->idTipoEmpleado = $idTipoEmpleado;
        }

        public function setDescripcion($descripcion){
            $this->descripcion = $descripcion;
        }

        public function setEstado($estado){
            $this->estado = $estado;
        }
    }

?>