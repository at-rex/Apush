<?php 
include_once("../vista/formIngreso.php");
include_once("../vista/formNuevoIngreso.php");
include_once("../vista/formEditarIngreso.php");
include_once("../modelo/estudiante.php");
include_once("../modelo/ingreso.php");
include_once("../modelo/universidad.php");
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');

session_start();
if(isset($_POST['accion'])){

}else{
    $_POST['accion'] = "";
}

if($_SESSION['acceso'] == 1){
    switch ($_POST['accion']) {
        case 'Registrar':
            $objIngreso = new ingreso;
            $objUniversidad = new universidad;
            $test = $objIngreso-> buscarEstudiante($_POST["id"]);
            if($test != null){
                $formIngreso = new formEditarIngreso;
                $ingreso = $objIngreso-> buscarEstudiante($_POST["id"]);
                $lista = $objUniversidad -> listar();
                $formIngreso -> formEIShow("EDITAR", $lista, $ingreso, "../controlador/getEstudiante.php");
            }else{
                $formIngreso = new formNuevoIngreso;
                $objEstudiante = new estudiante;
                $lista = $objUniversidad -> listar();
                $estudiante = $objEstudiante-> buscar($_POST["id"]);
                $formIngreso -> formNIShow("NUEVO", $lista, $estudiante);
            }
        break;
    
        case 'Editar':
            $formIngreso = new formEditarIngreso;
            $objIngreso = new ingreso;
            $objUniversidad = new universidad;
            $ingreso = $objIngreso-> buscar($_POST["id"]);
            $lista = $objUniversidad -> listar();
            $formIngreso -> formEIShow("EDITAR", $lista, $ingreso, "../controlador/getIngreso.php");
        break;
    
        case 'Guardar':
            $objIngreso = new ingreso;
            switch ($_POST["registrar"]) {
                case 'NUEVO':
                    $datos = [$_POST["fecha"], trim($_POST["id"]), trim($_POST["universidad"])];
                    $objIngreso->agregar($datos);
                break;
                case 'EDITAR':
                    $datos = [$_POST["fecha"], trim($_POST["universidad"]), $_POST["txtEstado"]];
                    $objIngreso->editar($_POST['id'],$datos);
                break;
            }
            
            $formIngreso = new formIngreso;
            $objIngreso = new ingreso;
            $formIngreso->formIngresoShow($objIngreso->listar());
        break;
        
        case 'Limpieza':
            $objIngreso = new ingreso;
            $objEstudiante = new estudiante;
            $lista = $objIngreso -> listarLimpieza();
            foreach($lista as $value){
                $date1 = new DateTime($value[2]);
                $date2 = new DateTime(date("Y-m-d"));
                $diff = $date2->diff($date1);
                if($diff->days >= (365*5)){
                    $objIngreso -> editarEstado($value[0]);
                    $objEstudiante -> editarEstado($value[1]);
                }
            }
            /*$formIngreso = new formIngreso;
            $formIngreso->formIngresoShow($objIngreso->listar());*/
            header('Location: ../controlador/getIngreso.php');
        break;

        default:
            $formIngreso = new formIngreso;
            $objIngreso = new ingreso;
            $formIngreso->formIngresoShow($objIngreso->listar());
        break;
    }
}else{
    header('Location: ../index.php');
}
?>