<?php 
class formNuevoIngreso{
    public function formNIShow($tipo, $lista, $estudiante){
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Datos de ex-estudiante</title>
                <link rel="stylesheet" href="../CSS/datos_estudiantes.css">

                <link rel="shorcut icon" type="image/x-icon" href="../img/sh.ico">
            </head>
            <body>
                 <div class="conteiner">   


                     <header class="header">
            
                        <div class="div-img">
                            <img src="../img/nombre_academia.png" alt="">
                        </div>  
            
                        <div class="div-nombre">
                                    
                        </div>
            
                    </header>

              <div class="cont-form">

                    <form class="form-1" action="../controlador/getIngreso.php" method="POST">

                        <h2>Registrar ingreso</h2>

                    <div class="row-input">
                         <div class="contenedor_input">
                            <label class="labe" for="">Nombres:</label>                      
                            <input type="text" placeholder="Ingrese apellido materno" name="txtNombre" value= "<?php echo $estudiante[1] ?>" disabled required>
                        </div>
                        <div class="contenedor_input">
                            <label class="labe" for="">Apellido paterno:</label>  
                            <input type="text" placeholder="Ingrese usuario" name="txtApepat" value= "<?php echo $estudiante[2] ?>" disabled required>
                        </div>
                         <div class="contenedor_input">
                            <label class="labe" for="">Apellido Materno:</label>  
                            <input type="text" placeholder="Ingrese Contraseña" name="txtApemat" value= "<?php echo $estudiante[3] ?>" disabled required>
                        </div>
                        <div class="contenedor_input">
                            <label class="labe" for="">DNI:</label>  
                            <input type="text" placeholder="Ingrese Contraseña" name="txtDni" value= "<?php echo $estudiante[4] ?>" disabled required>
                        </div>
                        <div class="contenedor_input">
                            <label class="labe">Universidad</label>
                            <select name="universidad">
                            <?php  
                            foreach ($lista as $value) { ?>
                                <option value="<?php echo $value[0] ?>"><?php echo $value[2] ?></option> 
                            <?php } ?>
                            </select>                              
                        </div>
                        <div class="contenedor_input">
                            <label class="labe">Fecha</label>
                            <input type="date" name="fecha" min="2014-01-01" max="2030-12-31" value="<?php echo date("Y-m-d");?>" required>                             
                        </div>
                        <input type="hidden" name="accion" value="Guardar">
                        <input type="hidden" name="registrar" value="<?php echo $tipo?>">
                        <input type="hidden" name="id" value="<?php echo $estudiante[0]?>">
                        </div>    
                        <button type="submit" class="guardar">Guardar</button>   

                   
                    </form>
                    <form class="form" action="../controlador/getEstudiante.php" method="POST">
                        <button type="submit" class="cancelar">Cancelar</button> 
                    </form>
                    </div>
                </div>
            </body>
        </html>
        <?php
    }
}
?>