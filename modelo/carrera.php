<?php 
include_once("conexion.php");
class carrera{
    public function listar(){
        $user = Conexion::select("SELECT * FROM `carreras`");
        return $user;
    }
}
?>