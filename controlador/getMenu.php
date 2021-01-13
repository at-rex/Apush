<?php 
include_once("../vista/formMensaje.php");
include_once("../vista/formLogin.php");
include_once("../vista/formMenu.php");
include_once("../modelo/rol.php");
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire');
    

session_start();
if($_SESSION['acceso'] == 1){
    if(isset($_POST['volver'])){
        $formMenu = new formMenu;
        $formMenu -> formMenuShow($_SESSION['roles']);
    }
    else{
        session_destroy();
        header('Location: ../index.php');
    }
}else{
    header('Location: ../index.php');
}


?>