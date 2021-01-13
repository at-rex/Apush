<?php
include_once("conexion.php");

class rol{

    public function listar(){
        $user = Conexion::select("SELECT * FROM `roles`");
        return $user;
    }

    public function listarPorId($id){
        $user = Conexion::select("SELECT r.nombre, r.path, r.imagen FROM `usuariosroles` AS ur, `roles` as r WHERE r.idrol = ur.idrol AND ur.estado = 1 AND ur.idusuario = $id");
        return $user;
    }

    public function listarEstadoPorId($id){
        $user = Conexion::select("SELECT estado FROM `usuariosroles` WHERE idusuario = $id");
        return $user;
    }

    public function agregar($datos, $id){
        $i = 1;
        foreach ($datos as $value) {
            $user = Conexion::query("INSERT INTO usuariosroles(idusuario, idrol, estado) 
                                VALUES ($id, $i, $value)");
            $i++;
        }
        return $user;
    }

    public function editar($datos, $id){
        $i = 1;
        foreach ($datos as $value) {
            $user = Conexion::query("UPDATE usuariosroles SET estado = $value WHERE idusuario = $id AND idrol = $i");
            $i++;
        }
        return $user;
        
    }
}
?>