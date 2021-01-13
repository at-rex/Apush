<?php
include_once("../vista/formUsuario.php");
include_once("../vista/formNuevoUsuario.php");
include_once("../vista/formEditarUsuario.php");
include_once("../modelo/usuario.php");
include_once("../modelo/rol.php");
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
            $formUsuario = new formNuevoUsuario;
            $objRol = new rol;
            $lista = $objRol -> listar();
            $formUsuario -> formNUShow("NUEVO", $lista);
        break;
    
        case 'Editar':
            $formUsuario = new formEditarUsuario;
            $objUsuario= new usuario;
            $objRol = new rol;
            $usuario = $objUsuario-> buscar($_POST["id"]);
            $lista = $objRol -> listar();
            $estado = $objRol -> listarEstadoPorId($_POST["id"]);
            $formUsuario -> formEUShow("EDITAR", $usuario, $lista, $estado);
        break;
    
        case 'Guardar':
            $usuario = new usuario;
            $objRol = new rol;
            switch ($_POST["registrar"]) {
                case 'NUEVO':
                    if(isset($_POST['rol0'])){}else{$_POST['rol0'] = "0";}
                    if(isset($_POST['rol1'])){}else{$_POST['rol1'] = "0";}
                    if(isset($_POST['rol2'])){}else{$_POST['rol2'] = "0";}
                    if(isset($_POST['rol3'])){}else{$_POST['rol3'] = "0";}
                    if(isset($_POST['rol4'])){}else{$_POST['rol4'] = "0";}
                    $datos = [trim($_POST["txtUsuario"]), trim($_POST["txtPassword"]), trim($_POST["txtNombre"]), trim($_POST["txtApepat"]), trim($_POST["txtApemat"]), "1"];
                    $roles = [$_POST["rol0"],$_POST["rol1"],$_POST["rol2"],$_POST["rol3"],$_POST["rol4"]];
                    $id =  $usuario->agregar($datos);
                    $objRol -> agregar($roles, $id);
                break;
                case 'EDITAR':
                    if(isset($_POST['rol0'])){}else{$_POST['rol0'] = "0";}
                    if(isset($_POST['rol1'])){}else{$_POST['rol1'] = "0";}
                    if(isset($_POST['rol2'])){}else{$_POST['rol2'] = "0";}
                    if(isset($_POST['rol3'])){}else{$_POST['rol3'] = "0";}
                    if(isset($_POST['rol4'])){}else{$_POST['rol4'] = "0";}
                    $datos = [trim($_POST["txtUsuario"]), trim($_POST["txtPassword"]), trim($_POST["txtNombre"]), trim($_POST["txtApepat"]), trim($_POST["txtApemat"]), trim($_POST["txtEstado"])];
                    $roles = [$_POST["rol0"],$_POST["rol1"],$_POST["rol2"],$_POST["rol3"],$_POST["rol4"]];
                    $usuario->editar($_POST['id'],$datos);
                    $objRol->editar($roles,$_POST['id']);
                break;
            }
            $formUsuario = new formUsuario;
            $objUsuario = new usuario;
            $formUsuario->formUsuarioShow($objUsuario->listar());
        break;
    
        default:
            $formUsuario = new formUsuario;
            $objUsuario = new usuario;
            $formUsuario->formUsuarioShow($objUsuario->listar());
        break;
    }
}else{
    header('Location: ../index.php');
}

?>