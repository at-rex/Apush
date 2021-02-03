<?php 
include_once("conexion.php");
class estudiante{
    public function listar(){
        $user = Conexion::select("SELECT DISTINCT  e.idestudiante, e.nombre, e.apepat, e.apemat, e.dni, c.nombre, t.nombre, e.estado
        FROM `estudiantes` AS e, `carreras` as c, `turnos` AS t, `ingresos` AS i WHERE 
        NOT EXISTS (SELECT * FROM `ingresos` WHERE idestudiante = e.idestudiante AND estado = 1) 
        AND e.idturno = t.idturno AND e.idcarrera = c.idcarrera 
        ORDER BY e.estado DESC, e.apepat, e.apemat, e.nombre");
        return $user;
    }
    
    public function buscar($id){
        $user = Conexion::select("SELECT * FROM `estudiantes` WHERE idestudiante = '$id'");
        return $user[0];
    }

    public function buscarPorDni($dni){
        $user = Conexion::select("SELECT * FROM `estudiantes` WHERE dni = '$dni'");
        return $user[0];
    }

    public function agregar($datos){
        $user = Conexion::query("INSERT INTO estudiantes(nombre, apepat, apemat, dni, idcarrera, idturno, estado) 
                                VALUES ('$datos[0]', '$datos[1]', '$datos[2]', '$datos[3]', '$datos[4]', '$datos[5]', 1)", 1);
        return $user;
    }

    public function editar($id, $datos){
        $user = Conexion::query("UPDATE estudiantes SET nombre = '$datos[0]', apepat = '$datos[1]', apemat = '$datos[2]', dni = '$datos[3]', idcarrera = '$datos[4]', idturno = '$datos[5]', estado = '$datos[6]' WHERE idestudiante = $id");
        return $user;
    }

    public function editarEstado($id){
        $user = Conexion::query("UPDATE estudiantes SET estado = 0 WHERE idestudiante = $id");
        return $user;
    }
}
?>