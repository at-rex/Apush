<?php

class formEditarUsuario{

    public function formEUShow($tipo, $user = null, $roles, $estado){
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
                            <h2>Modificar datos del usuario</h2>
                            
                            <div class="row-input">
                                 <div class="mitad1">
                                    <div class="contenedor_input">

                                        <label class="labe" for="">Usuario:</label>  
                                        <input type="text" placeholder="Ingrese su nombre" name="txtUsuario" <?php if($user != null) echo "value='".$user[1]."'"?> required>  
                                    </div>

                                    <div class="contenedor_input">
                                        <label class="labe" for="">Contraseña:</label>                      
                                        <input type="password" placeholder="Ingrese apellido paterno" name="txtPassword" <?php if($user != null) echo "value='".$user[2]."'"?> required >
                                    </div>

                                    <div class="contenedor_input">
                                        <label class="labe" for="">Nombres:</label>                      
                                        <input type="text" placeholder="Ingrese apellido materno" name="txtNombre" <?php if($user != null) echo "value='".$user[3]."'"?>required >
                                    </div>

                                    <div class="contenedor_input">
                                        <label class="labe" for="">Apellido paterno:</label>  
                                        <input type="text" placeholder="Ingrese usuario" name="txtApepat" <?php if($user != null) echo "value='".$user[4]."'"?> required>
                                    </div>

                                    <div class="contenedor_input">
                                        <label class="labe" for="">Apellido Materno:</label>  
                                        <input type="text" placeholder="Ingrese Contraseña" name="txtApemat" <?php if($user != null) echo "value='".$user[5]."'"?> required>  
                                    </div>

                                    <div class="contenedor_input">
                                        <label class="labe" for="">Estado:</label>
                                        <select name = "txtEstado">
                                            <option value="<?php echo $user[6] ?>" selected ><?php echo $user[6] == 1 ? "Habilitado":"Deshabilitado"?></option>
                                            <option value="<?php echo $user[6] == 1 ? "0" : "1" ?>" ><?php echo $user[6] == 1 ? "Deshabilitado":"Habilitado"?></option>
                                        </select>
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
                                                <td><input  type='checkbox' name="rol<?php echo $i;?>" value="1" <?php if($estado[$i][0] == 1){ echo "checked='checked'";}++$i;?> ><!--br--></td>
                                                </tr>
                                            <?php } ?>   
                                        </table>                                 
                                        </div>     
                                    </div>
                                </div>
                            </div>
                                <input type="hidden" name="accion" value="Guardar">
                                <input type="hidden" name="registrar" value="<?php echo $tipo?>">
                                <input type="hidden" name="id" value="<?php echo $user[0]?>">
                                <button type="submit" class="guardar">Guardar</button>        
                        </form>

                        <form class="form-2" action="../controlador/getUsuario.php" method="POST">
                            <button type="submit" class="cancelar">Cancelar</button> 
                        </form>
                    </div>

                </div>

            </body>
        </html>
        <?php
    }

}