<?php

class formMensaje{

    public function formMensajeShow($mensaje, $ruta){
        ?>    
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../CSS/estilo_principal.css">
            <link rel="shorcut icon" type="image/x-icon" href="../img/sh.ico">
            <title>Mensaje</title>
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
                    <h1 style="text-align:center"><?=$mensaje?></h1>
                    <h2 style="text-align:center"><a href="<?=$ruta?>"> Volver a mostrar formulario</a></h2>
                           
            </div>
        </body>
        </html>
        <?php
    }

}

?>