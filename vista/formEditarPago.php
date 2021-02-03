<?php
class formEditarPago{
    public function formEPShow($tipo, $listaE, $listaU, $mes, $pago, $dni){
        ?>
        <!DOCTYPE html>
        <html lang="es">
            <head>
                <title>Datos de pago</title>
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

                    <form class="form-1" action="../controlador/getPago.php" method="POST">

                        <h2>Registrar pago</h2>

                    <div class="row-input">
                        <div class="contenedor_input">
                            <label class="labe">DNI de estudiante:</label>
                            <input type="text" name="txtDni" list="dni" placeholder="Ingrese DNI" 
                            value="<?php echo $dni?>" minlength="8" maxlength="8"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                            <datalist id="dni">
                            <?php  
                            foreach ($listaE as $value) { ?>
                                <option value="<?php echo $value[4] ?>" ></option> 
                            <?php } ?>
                            </datalist>                             
                        </div>
                        <div class="contenedor_input">
                            <label class="labe" for="">Monto:</label>  
                            <input type="text" placeholder="" name="txtMonto" value= "200"  disabled required>
                        </div>
                        <div class="contenedor_input">
                            <label class="labe">Fecha:</label>
                            <input type="date" name="fecha" min="2014-01-01" max="2050-12-31" value="<?php echo $pago[2]?>" required>                             
                        </div>
                        <div class="contenedor_input">
                            <label class="labe">Encargado:</label>
                            <select name="idusuario">
                            <?php  
                            foreach ($listaU as $value) { ?>
                                <option value="<?php echo $value[0] ?>" <?php if($value[0] == $pago[5]) echo "selected"?> ><?php echo $value[3].$value[4].$value[5] ?></option> 
                            <?php } ?>
                            </select>                              
                        </div>
                        <div class="contenedor_input">
                            <label class="labe">Mensualidad:</label>
                            <select name="mes">
                            <?php  
                            foreach ($mes as $value) { ?>
                                <option value="<?php echo $value[0]?>" <?php if($value[0] == $pago[3]) echo "selected"?> > <?php echo $value[1] ?> </option> 
                            <?php } ?>
                            </select>    
                        </div>
                        <div class="contenedor_input">
                            <label class="labe"></label>
                            <input type="text" placeholder="Año" name="year" minlength="4" maxlength="4" value="<?php echo $pago[4] ?>"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>                             
                        </div>
                        <div class="contenedor_input">
                            <label class="labe" for="">Estado del pago:</label>
                            <select name = "txtEstado">
                                <option value="<?php echo $pago[7] ?>" selected ><?php echo $pago[7] == 1 ? "Habilitado":"Deshabilitado"?></option>
                                <option value="<?php echo $pago[7] == 1 ? "0" : "1" ?>" ><?php echo $pago[7] == 1 ? "Deshabilitado":"Habilitado"?></option>
                            </select>
                        </div>
                        <input type="hidden" name="accion" value="Guardar">
                        <input type="hidden" name="registrar" value="<?php echo $tipo?>">
                        <input type="hidden" name="id" value="<?php echo $pago[0]?>">
                        </div>    
                        <button type="submit" class="guardar">Guardar</button>   

                   
                    </form>
                    <form class="form" action="../controlador/getPago.php" method="POST">
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