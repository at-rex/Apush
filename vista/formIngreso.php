<?php 
class formIngreso{
    public function formIngresoShow($lista){ ?>
        <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Gestionar Ingresantes | Stephen Hawking</title>
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
                <h1>Gestionar Ingresantes</h1>

            <!-- ####### botones agregar y volver a la pagina principal #### -->
                <div class="btn-group">
                    <form action="../controlador/getIngreso.php" method="post">
                        <input type="hidden" name="accion" value="Limpieza">
                        <button class="open-modal">Limpieza</button>
                    </form>

                    <form action="../controlador/getEstudiante.php" method="post">
                        <input type="hidden" name="volver" value="">
                        <button  class="volver">Volver</button>
                    </form>
                    
                </div>
            <!-- ################# Tabla usuarios #################### -->
                <table>
                    <tr>
                        <th>N°</th>
                        <th>Nombres</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>DNI</th>
                        <th>Fecha de ingreso<br>(Año-Mes-Día)</th>
                        <th>Universidad</th>
                        <th>Estado de estudiante</th>
                        <th>Accion</th>
                    </tr>
                    <?php $i = 1; 
                    foreach ($lista as $value) { ?>
                        <tr>
                            <td><?php echo $i; $i++; ?></td>
                            <td><?php echo $value[1]?></td>
                            <td><?php echo $value[2]?></td>
                            <td><?php echo $value[3]?></td>
                            <td><?php echo $value[4]?></td>
                            <td><?php echo $value[5]?></td>
                            <td><?php echo $value[6]?></td>
                            <td><?php echo $value[7] == 1 ? "<label style='color: green'>Habilitado</label>":"<label style='color: red'>Deshabilitado</label>"?></td>
                            <td><div>
                                <form action="../controlador/getIngreso.php" method="post">
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