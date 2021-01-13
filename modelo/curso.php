<?php
include_once("conexion.php");
class curso{
    public function listar(){
        $user = Conexion::select("SELECT * FROM cursos");
        return $user;
    }
}
?>