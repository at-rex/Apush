<?php
include_once("conexion.php");
class universidad{
    public function listar(){
        $user = Conexion::select("SELECT * FROM universidades");
        return $user;
    }
}
?>