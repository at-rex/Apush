<?php

class formNuevoUsuario{

    public function formNUShow($tipo, $roles){
        ?>    
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Datos de usuario</title>
                <link rel="stylesheet" href="../CSS/editar_usuario.css">

                <link rel="shorcut icon" type="image/x-icon" href="../img/sh.ico">
            </head>
            <body>
                <div class="conteiner">              
                     <!-- Nombre de la academia  :v  -->
                    <header class="header">
            
                            <div class="div-img">
                                <img src="../img/nombre_academia.png" alt="">
                            </div>  
            
                            <div class="div-nombre">
                                    
                            </div>
            
                    </header>

                <div class="cont-form">

                    <form class="form-1" action="../controlador/getUsuario.php" method="POST">
                         <h2>Registrar Usuario</h2>

                    <div class="row-input">
                      <div class="mitad1">
                       <div class="contenedor_input">
                            <label class="labe" for="">Usuario:</label>  
                            <input type="text" placeholder="Ingrese usuario" name="txtUsuario" maxlength="20" required>
                        </div>
                        <div class="contenedor_input">
                            <label class="labe" for="">Contraseña:</label>                      
                            <input type="password" placeholder="Ingrese contraseña" name="txtPassword" minlength="6" maxlength="20" required>
                        </div>
                        <div class="contenedor_input">
                            <label class="labe" for="">Nombres:</label>                      
                            <input type="text" placeholder="Ingrese nombres" name="txtNombre" maxlength="30" required >
                        </div>
                         <div class="contenedor_input">
                            <label class="labe" for="">Apellido paterno:</label>  
                            <input type="text" placeholder="Ingrese apellido paterno" name="txtApepat" maxlength="20" required>
                        </div>
                         <div class="contenedor_input">
                            <label class="labe" for="">Apellido Materno:</label>  
                            <input type="text" placeholder="Ingrese apellido materno" name="txtApemat" maxlength="20" required>
                        </div>
                        </div> 
                    <div class="mitad2">
                        
                         <div class="contenedor-privilegios">
                                <label class="labe">Privilegios</label>  

                                <div class="row-privilegio">
                                    <table>
                                        <?php $i=0; 
                                        foreach ($roles as $value) { ?>
                                            <tr>
                                            <td><?php echo $value[1] ?></td>
                                            <td><input  type='checkbox' name="rol<?php echo $i; ++$i;?>" value="1"  ></td>
                                            </tr>
                                        <?php } ?>   
                                    </table>                                   
                               </div>
                        </div>
                    </div>         
                         
                    </div>                        
                        <input type="hidden" name="accion" value="Guardar">
                        <input type="hidden" name="registrar" value="<?php echo $tipo?>">
                        <button type="submit" class="guardar">Guardar</button>   
                    </form>

                    <form class="form-2" action="../controlador/getUsuario.php" method="POST">
                        <button type="submit"  class="cancelar">Cancelar</button> 
                    </form>
                </div>

            </div>
            </body>
        </html>
        <?php
    }

}

?>