<?php 
include_once("../vista/formProfesor.php");
include_once("../vista/formNuevoProfesor.php");
include_once("../vista/formEditarProfesor.php");
include_once("../modelo/profesor.php");
include_once("../modelo/curso.php");
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
            $formProfesor = new formNuevoProfesor;
            $objCurso = new curso;
            $objTurno = new turno;
            $listaC = $objCurso -> listar();
            $listaT = $objTurno -> listar();
            $formProfesor -> formNPShow("NUEVO", $listaC, $listaT);
        break;
    
        case 'Editar':
            $formProfesor = new formEditarProfesor;
            $objProfesor = new profesor;
            $objCurso = new curso;
            $objTurno = new turno;
            $profesor = $objProfesor-> buscar($_POST["id"]);
            $listaC = $objCurso -> listar();
            $listaT = $objTurno -> listar();
            $formProfesor -> formEPShow("EDITAR", $listaC, $listaT, $profesor);
        break;
    
        case 'Guardar':
            $objProfesor = new profesor;
            switch ($_POST["registrar"]) {
                case 'NUEVO':
                    $datos = [trim($_POST["txtNombre"]), trim($_POST["txtApepat"]), trim($_POST["txtApemat"]), trim($_POST["txtDni"]), $_POST["curso"], $_POST["turno"], "1"];
                    $objProfesor->agregar($datos);
                break;
                case 'EDITAR':
                    $datos = [trim($_POST["txtNombre"]), trim($_POST["txtApepat"]), trim($_POST["txtApemat"]), trim($_POST["txtDni"]), $_POST["curso"], $_POST["turno"], $_POST["txtEstado"]];
                    $objProfesor->editar($_POST['id'],$datos);
                break;
            }
            $formProfesor = new formProfesor;
            $objProfesor = new profesor;
            $formProfesor->formProfesorShow($objProfesor->listar());
        break;
    
        default:
            $formProfesor = new formProfesor;
            $objProfesor = new profesor;
            $formProfesor->formProfesorShow($objProfesor->listar());
        break;
    }
}else{
    header('Location: ../index.php');
}
?>