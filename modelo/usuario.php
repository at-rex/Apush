<?php
include_once("conexion.php");

class usuario{
	
	public function autenticacion($txtUser, $txtPass){
        $user = Conexion::select("SELECT * FROM usuarios WHERE usuario = '$txtUser' and estado = 1");
        if($user[0][6] == 1 && $user[0][2] == $txtPass){
            return  $user[0];
        }
        else{
            return 0;
        }
    }

    public function listar(){
        $user = Conexion::select("SELECT * FROM usuarios ORDER BY estado DESC, apepat, apemat, nombre");
        return $user;
    }

    public function buscar($id){
        $user = Conexion::select("SELECT * FROM usuarios WHERE idusuario = $id");
        return $user[0];
    }

    public function editar($id, $datos){
        $user = Conexion::query("UPDATE usuarios SET usuario = '$datos[0]',`password` = '$datos[1]', nombre = '$datos[2]', apepat = '$datos[3]', apemat = '$datos[4]', estado = '$datos[5]' WHERE idusuario = $id");
        return $user;
    }

    public function eliminar($id, $estado){
        $user = Conexion::query("UPDATE usuarios SET estado = $estado WHERE idusuario = $id");
        return $user;
    }

    /*public function eliminar($id){
        $user = Conexion::query("DELETE FROM usuarios WHERE idUsuario = $id");
        return $user;
    }*/

    public function agregar($datos){
        $user = Conexion::query("INSERT INTO usuarios(usuario, `password`, nombre, apepat, apemat, estado) 
                                VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', 1)", 1);
        return $user;
    }
}
?>