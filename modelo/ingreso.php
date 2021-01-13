<?php 
include_once("conexion.php");
class ingreso{
    public function listar(){
        $user = Conexion::select("SELECT DISTINCT i.idingreso, e.nombre, e.apepat, e.apemat, e.dni, i.fecha, u.nombre, e.estado, i.estado
        FROM `estudiantes` AS e, `ingresos` as i, `universidades` AS u 
        WHERE e.idestudiante = i.idestudiante AND u.iduniversidad = i.iduniversidad AND i.estado = 1 
        ORDER BY e.estado DESC, e.apepat, e.apemat, e.nombre");
        return $user;
    }

    public function listarLimpieza(){
        $user = Conexion::select("SELECT DISTINCT i.idingreso, e.idestudiante, i.fecha
        FROM `estudiantes` AS e, `ingresos` as i, `universidades` AS u 
        WHERE e.idestudiante = i.idestudiante AND u.iduniversidad = i.iduniversidad AND i.estado = 1 
        ORDER BY e.estado DESC, e.apepat, e.apemat, e.nombre");
        return $user;
    }

    public function buscar($id){
        $user = Conexion::select("SELECT i.idingreso, e.nombre, e.apepat, e.apemat, e.dni, i.fecha, u.nombre, e.estado, i.estado 
        FROM `estudiantes` AS e, `ingresos` as i, `universidades` AS u WHERE e.idestudiante = i.idestudiante AND u.iduniversidad = i.iduniversidad AND idingreso = '$id'");
        return $user[0];
    }

    public function buscarEstudiante($id){
        $user = Conexion::select("SELECT i.idingreso, e.nombre, e.apepat, e.apemat, e.dni, i.fecha, u.nombre, e.estado, i.estado 
        FROM `estudiantes` AS e, `ingresos` as i, `universidades` AS u 
        WHERE e.idestudiante = i.idestudiante AND u.iduniversidad = i.iduniversidad AND i.idestudiante = '$id'");
        return $user[0];
    }

    public function agregar($datos){
        $user = Conexion::query("INSERT INTO ingresos(fecha, idestudiante, iduniversidad, estado) 
                                VALUES ('$datos[0]', '$datos[1]', '$datos[2]', 1)", 1);
        return $user;
    }

    public function editar($id, $datos){
        $user = Conexion::query("UPDATE ingresos SET fecha = '$datos[0]', iduniversidad = '$datos[1]', estado = '$datos[2]' WHERE idingreso = $id");
        return $user;
    }

    public function editarEstado($id){
        $user = Conexion::query("UPDATE ingresos SET estado = 0 WHERE idingreso = '$id'");
        return $user;
    }
}
?>