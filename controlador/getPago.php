<?php
include_once("../vista/formMensaje.php");
include_once("../vista/formPago.php");
include_once("../vista/formNuevoPago.php");
include_once("../vista/formEditarPago.php");
include_once("../modelo/pago.php");
include_once("../modelo/estudiante.php");
include_once("../modelo/usuario.php");
include_once("../modelo/mes.php");
header('Cache-Control: no cache');
session_cache_limiter('private_no_expire');

session_start();
if(isset($_POST['accion'])){

}else{
    $_POST['accion'] = "";
}

if($_SESSION['acceso'] == 1){
    $objMes = new mes;
    $mes = $objMes -> listar();
    switch ($_POST['accion']) {
        case 'Buscar':
            if($_POST["idmes"] > 0 && $_POST["idmes"]<13){
                if($_POST["year"] != null){
                    $formPago = new formPago;
                    $objPago = new pago;
                    $formPago->formPagoShow($objPago->buscarPorMes($_POST["idmes"],$_POST["year"]));
                }else{
                    $formPago = new formPago;
                    $objPago = new pago;
                    $formPago->formPagoShow($objPago->listar());
                }           
            }else{
                $formPago = new formPago;
                $objPago = new pago;
                $formPago->formPagoShow($objPago->listar());
            }
        break;

        case 'Registrar':
            $formPago = new formNuevoPago;
            $objUsuario = new usuario;
            $objEstudiante = new estudiante;
            $listaU = $objUsuario -> listar();
            $listaE = $objEstudiante -> listar();
            $formPago -> formNPShow("NUEVO", $listaE, $listaU,$mes);
        break;
    
        case 'Editar':
            $formPago = new formEditarPago;
            $objPago = new pago;
            $objUsuario = new usuario;
            $objEstudiante = new estudiante;
            $pago = $objPago-> buscar($_POST["id"]);
            $estudiante = $objEstudiante->buscar($pago[6]);
            $listaU = $objUsuario -> listar();
            $listaE = $objEstudiante -> listar();
            $formPago -> formEPShow("EDITAR", $listaE, $listaU,$mes,$pago,$estudiante[4]);
        break;
    
        case 'Guardar':
            switch ($_POST["registrar"]) {
                case 'NUEVO':
                    if(($_POST["year"]>=2014) && ($_POST["year"]<=2300)){
                        $objPago = new pago;
                        $objEstudiante = new estudiante;
                        $estudiante = $objEstudiante->buscarPorDni($_POST["txtDni"]);
                        if($estudiante != null){
                            $pago = $objPago -> buscarPorMensualidad($estudiante[0],$_POST["mes"],$_POST["year"]);
                            if ($pago != null){
                                $formMensaje = new formMensaje;
                                $formMensaje -> formMensajeShow("El pago ya existe para la mensualidad
                                de ".$_POST["mes"]." de ".$_POST["year"]." del 
                                estudiante ".$estudiante[1]." ".$estudiante[2]." ".$estudiante[3],
                                "../controlador/getPago.php");
                            }else{
                                $datos = [200, trim($_POST["fecha"]), $_POST["mes"], trim($_POST["year"]), $_POST["idusuario"], $estudiante[0]];
                                $objPago->agregar($datos);
                            }
                        }else{
                            $formMensaje = new formMensaje;
                            $formMensaje -> formMensajeShow("El DNI ingresado no corresponde a ningún estudiante",
                            "../controlador/getPago.php");
                        }
                    }else{
                        $formMensaje = new formMensaje;
                        $formMensaje -> formMensajeShow("El año ingresado es inválido",
                        "../controlador/getPago.php");
                    }
                    
                break;
                case 'EDITAR':
                    if(($_POST["year"]>=2014) && ($_POST["year"]<=2300)){
                        $objEstudiante = new estudiante;
                        $objPago = new pago;
                        $estudiante = $objEstudiante->buscarPorDni($_POST["txtDni"]);
                        if($estudiante != null){
                            $pago = $objPago -> buscarPorMensualidad($estudiante[0],$_POST["mes"],$_POST["year"]);
                            if ($pago != null){
                                $malPago = $objPago -> buscar($_POST["id"]);
                                $malDatos = [$malPago[2],$malPago[3],$malPago[4],$malPago[5],$malPago[6],0];
                                $objPago->editar($malPago[0],$malDatos);
                                $datos = [trim($_POST["fecha"]), trim($_POST["mes"]), trim($_POST["year"]), $_POST["idusuario"], $estudiante[0], $_POST["txtEstado"]];
                                $objPago->editar($pago[0],$datos);
                            }else{
                                $datos = [trim($_POST["fecha"]), trim($_POST["mes"]), trim($_POST["year"]), $_POST["idusuario"], $estudiante[0], $_POST["txtEstado"]];
                                $objPago->editar($_POST["id"],$datos);
                            }
                        }else{
                            $formMensaje = new formMensaje;
                            $formMensaje -> formMensajeShow("El DNI ingresado no corresponde a ningún estudiante",
                            "../controlador/getPago.php");
                        }
                    }else{
                        $formMensaje = new formMensaje;
                        $formMensaje -> formMensajeShow("El año ingresado es inválido",
                        "../controlador/getPago.php");
                    }
                break;
            }
            $formPago = new formPago;
            $objPago = new pago;
            $formPago->formPagoShow($objPago->listar());
        break;
    
        default:
            $formPago = new formPago;
            $objPago = new pago;
            $formPago->formPagoShow($objPago->listar());
        break;
    }
}else{
    header('Location: ../index.php');
}
?>