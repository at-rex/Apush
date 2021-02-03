<?php 
include_once("conexion.php");
class pago{
    public function listar(){
        $user = Conexion::select("SELECT p.idpago, 
        e.nombre, e.apepat, e.apemat, 
        e.dni,
        p.monto, 
        p.fecha, 
        u.nombre, u.apepat, u.apemat, 
        m.nombre, p.year, 
        p.estado
        FROM pagos AS p, usuarios AS u, estudiantes AS e, meses AS m
        WHERE p.idestudiante = e.idestudiante AND p.idusuario = u.idusuario AND p.idmes = m.idmes
        ORDER BY p.year DESC, m.idmes ASC");
        return $user;
    }

    public function buscar($id){
        $user = Conexion::select("SELECT * FROM `pagos` WHERE idpago = '$id'");
        return $user[0];
    }

    public function buscarPorMes($id, $year){
        $user = Conexion::select("SELECT p.idpago, 
        e.nombre, e.apepat, e.apemat, 
        e.dni,
        p.monto, 
        p.fecha, 
        u.nombre, u.apepat, u.apemat, 
        m.nombre, p.year, 
        p.estado
        FROM pagos AS p, usuarios AS u, estudiantes AS e, meses AS m
        WHERE p.idestudiante = e.idestudiante AND p.idusuario = u.idusuario AND p.idmes = m.idmes AND p.idmes = '$id' AND `year` = $year
        ORDER BY p.year DESC, m.idmes ASC");
        return $user;
    }

    public function buscarPorMensualidad($id,$idmes,$year){
        $user = Conexion::select("SELECT * FROM `pagos` WHERE idestudiante = '$id' AND idmes = $idmes AND `year`='$year'");
        return $user[0];
    }

    public function agregar($datos){
        $user = Conexion::query("INSERT INTO pagos(monto, fecha, idmes, `year`, idusuario, idestudiante, estado) 
                                VALUES ('$datos[0]', '$datos[1]', $datos[2], '$datos[3]', '$datos[4]', '$datos[5]', 1)", 1);
        return $user;
    }

    public function editar($id, $datos){
        $user = Conexion::query("UPDATE pagos SET fecha = '$datos[0]', idmes = $datos[1], `year` = '$datos[2]', idusuario = '$datos[3]', idestudiante = '$datos[4]', estado = '$datos[5]' WHERE idpago = $id");
        return $user;
    }
}
?>