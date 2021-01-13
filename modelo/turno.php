<?php
include_once("conexion.php");
class turno{
    public function listar(){
        $user = Conexion::select("SELECT * FROM turnos");
        return $user;
    }
}
?>