<?php 
include_once("../vista/formEstudiante.php");
include_once("../vista/formNuevoEstudiante.php");
include_once("../vista/formEditarEstudiante.php");
include_once("../modelo/estudiante.php");
include_once("../modelo/carrera.php");
include_once("../modelo/turno.php");
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
            $formEstudiante = new formNuevoEstudiante;
            $objCarrera = new carrera;
            $objTurno = new turno;
            $listaC = $objCarrera -> listar();
            $listaT = $objTurno -> listar();
            $formEstudiante -> formNEShow("NUEVO", $listaC, $listaT);
        break;
    
        case 'Editar':
            $formEstudiante = new formEditarEstudiante;
            $objEstudiante = new estudiante;
            $objCarrera = new carrera;
            $objTurno = new turno;
            $estudiante = $objEstudiante-> buscar($_POST["id"]);
            $listaC = $objCarrera -> listar();
            $listaT = $objTurno -> listar();
            $formEstudiante -> formEEShow("EDITAR", $listaC, $listaT, $estudiante);
        break;
    
        case 'Guardar':
            $objEstudiante = new estudiante;
            switch ($_POST["registrar"]) {
                case 'NUEVO':
                    $datos = [trim($_POST["txtNombre"]), trim($_POST["txtApepat"]), trim($_POST["txtApemat"]), trim($_POST["txtDni"]), $_POST["carrera"], $_POST["turno"], "1"];
                    $objEstudiante->agregar($datos);
                break;
                case 'EDITAR':
                    $datos = [trim($_POST["txtNombre"]), trim($_POST["txtApepat"]), trim($_POST["txtApemat"]), trim($_POST["txtDni"]), $_POST["carrera"], $_POST["turno"], $_POST["txtEstado"]];
                    $objEstudiante->editar($_POST['id'],$datos);
                break;
            }
            $formEstudiante = new formEstudiante;
            $objEstudiante = new estudiante;
            $formEstudiante->formEstudianteShow($objEstudiante->listar());
        break;
    
        default:
            $formEstudiante = new formEstudiante;
            $objEstudiante = new estudiante;
            $formEstudiante->formEstudianteShow($objEstudiante->listar());
        break;
    }
}else{
    header('Location: ../index.php');
}
?>