<?php 
class formPago{
    public function formPagoShow($lista){ ?>
        <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Gestionar Pagos | Stephen Hawking</title>
                <link rel="shorcut icon" type="image/x-icon" href="../img/sh.ico">

                <link rel="stylesheet" href="../CSS/usuarios.css">
            </head>
            <body>
            <div class="container">

            <!-- ######################## logo  ################### -->
                <div class="div-nom">

                    <div class="div-img">
                            <img src="../img/nombre_academia.png" alt="">
                    </div>	

                    <div class="div-nombre">
                                    
                    </div>

                </div>
            <!-- #################################################### -->
                <h1>Gestionar Pagos</h1>

            <!-- ####### botones agregar y volver a la pagina principal #### -->
                <div class="btn-group" >
                    <form action="../controlador/getPago.php" method="post">
                        <select name="idmes">
                                <option value="1"><?php echo "Enero" ?></option> 
                                <option value="2"><?php echo "Febrero" ?></option> 
                                <option value="3"><?php echo "Marzo" ?></option> 
                                <option value="4"><?php echo "Abril" ?></option> 
                                <option value="5"><?php echo "Mayo" ?></option> 
                                <option value="6"><?php echo "Junio" ?></option> 
                                <option value="7"><?php echo "Julio" ?></option> 
                                <option value="8"><?php echo "Agosto" ?></option>
                                <option value="9"><?php echo "Septiembre" ?></option> 
                                <option value="10"><?php echo "Octubre" ?></option> 
                                <option value="11"><?php echo "Noviembre" ?></option> 
                                <option value="12"><?php echo "Diciembre" ?></option>
                                <option value="13"><?php echo "----" ?></option>
                        </select>
                        <input type="text" placeholder="Año" name="year" minlength="4" maxlength="4"
                            onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                        <input type="hidden" name="accion" value="Buscar">
                        <button class="open-modal">Buscar</button>
                    </form>

                    <form action="../controlador/getPago.php" method="post">
                        <input type="hidden" name="accion" value="Registrar">
                        <button class="open-modal">Registrar</button>
                    </form>

                    <form action="../controlador/getMenu.php" method="post">
                        <input type="hidden" name="volver" value="Go">
                        <button  class="volver">Volver a la pagina principal</button>
                    </form>
                    
                </div>
            <!-- ################# Tabla usuarios #################### -->
                <table>
                    <tr>
                        <th>N°</th>
                        <th>Estudiante</th>
                        <th>DNI</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Responsable</th>
                        <th>Mensualidad</th>
                        <th>Estado</th>
                        <th>Acción</th>
                    </tr>
                    <?php $i = 1; 
                    foreach ($lista as $value) { ?>
                        <tr>
                            <td><?php echo $i; $i++; ?></td>
                            <td><?php echo $value[1]." ".$value[2]." ".$value[3]?></td>
                            <td><?php echo $value[4]?></td>
                            <td><?php echo $value[5]?></td>
                            <td><?php echo $value[6]?></td>
                            <td><?php echo $value[7]." ".$value[8]." ".$value[9]?></td>
                            <td><?php echo $value[10]." ".$value[11]?></td>
                            <td><?php echo $value[12] == 1 ? "<label style='color: green'>Habilitado</label>":"<label style='color: red'>Deshabilitado</label>"?></td>
                            <td><div>
                                <form action="../controlador/getPago.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $value[0]?>">
                                    <input type="hidden" name="accion" value="Editar">
                                    <button class="btn-modificar">Editar</button>
                                </form>       
                            </div>
                            </td>
                        </tr>
                    <?php }?>

                </table>

            </div>	

        </html>
    <?php
    }
}
?>