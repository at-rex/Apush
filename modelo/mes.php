<?php 
    include_once("conexion.php");
    class mes{
        public function listar(){
            $user = Conexion::select("SELECT * FROM meses");
            return $user;
        }
    }
?>