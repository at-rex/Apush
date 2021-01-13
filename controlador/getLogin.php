<?php 
include_once("../vista/formMensaje.php");
include_once("../vista/formUsuario.php");
include_once("../vista/formMenu.php");
include_once("../modelo/usuario.php");
include_once("../modelo/rol.php");
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire');
    
$objMensaje = new formMensaje;

if(isset($_POST['login'])){
    $usuario = trim($_POST['txtUsuario']);
    $password = trim($_POST['txtPassword']);
    if(strlen($usuario) >= 1 && strlen($password) >= 1){
        $objUsuario =  new usuario;
        $respuesta = $objUsuario -> autenticacion($usuario, $password);
        if($respuesta[6] == 1){
            $formMenu = new formMenu;
            $objRol = new rol;
            $login = $objUsuario -> buscar($respuesta[0]);
            $lista = $objRol -> listarPorId($respuesta[0]);
            session_start();
            $_SESSION['roles'] = $lista;
            $_SESSION['acceso'] = 1;
            $_SESSION['nombre'] = $login[3];
            $_SESSION['apepat'] = $login[4];
            $_SESSION['apemat'] = $login[5];
            $formMenu -> formMenuShow($lista);
        }
        else{
            $objMensaje -> formMensajeShow("Error: El usuario o contraseña ingresados son incorrectos o el susuario ha sido deshabilitado","../index.php");
        }
    }
    else{
        $objMensaje -> formMensajeShow("Los datos no cumplen con los requisitos","../index.php");
    }
}
else{
    header('Location: ../index.php');
}

?>