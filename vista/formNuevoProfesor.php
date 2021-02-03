<?php 
class formNuevoProfesor{
    public function formNPShow($tipo, $listaC, $listaT){
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Datos de profesor</title>
                <link rel="stylesheet" href="../CSS/datos_profesores.css">

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
                        <form class="form-1" action="../controlador/getProfesor.php" method="POST">

                            <h2>Registrar Nuevo Profesor</h2>

                            <div class="row-input">

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
                            
                            <div class="contenedor_input">
                                <label class="labe" for="">DNI:</label>  
                                <input type="text" placeholder="Ingrese DNI" name="txtDni" minlength="8" maxlength="8"
                                onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
                            </div>

                            <div class="contenedor_input">
                                <label class="labe">Curso</label>
                                <select name="curso">
                                <?php  
                                foreach ($listaC as $value) { ?>
                                    <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option> 
                                <?php } ?>
                                </select>                              
                            </div>

                            <div class="contenedor_input">
                                <label class="labe">Turno</label>
                                <select name="turno">
                                <?php
                                foreach ($listaT as $value) { ?>
                                    <option value="<?php echo $value[0] ?>"><?php echo $value[1] ?></option> 
                                <?php } ?>
                                </select>                              
                            </div>

                            <input type="hidden" name="accion" value="Guardar">
                            <input type="hidden" name="registrar" value="<?php echo $tipo?>">

                                </div> 
                            <button type="submit" class="guardar">Guardar</button>   
                        </form>
                        <form class="form" action="../controlador/getProfesor.php" method="POST">
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