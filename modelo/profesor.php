<?php
include_once("conexion.php");
class profesor{
    public function listar(){
        $user = Conexion::select("SELECT p.idprofesor, p.nombre, p.apepat, p.apemat, p.dni, c.nombre, t.nombre, p.estado
        FROM `profesores` AS p, `cursos` AS c, `turnos` AS t 
        WHERE p.idturno = t.idturno AND p.idcurso = c.idcurso ORDER BY p.estado DESC, p.apepat, p.apemat, p.nombre");
        return $user;
    }

    public function buscar($id){
        $user = Conexion::select("SELECT * FROM `profesores` WHERE idprofesor = '$id'");
        return $user[0];
    }

    public function agregar($datos){
        $user = Conexion::query("INSERT INTO profesores(nombre, apepat, apemat, dni, idcurso, idturno, estado) 
                                VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', 1)", 1);
        return $user;
    }

    public function editar($id, $datos){
        $user = Conexion::query("UPDATE profesores SET nombre = '$datos[0]', apepat = '$datos[1]', apemat = '$datos[2]', dni = '$datos[3]', idcurso = '$datos[4]', idturno = '$datos[5]', estado = '$datos[6]' WHERE idprofesor = $id");
        return $user;
    }
}
?>