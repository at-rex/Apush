<?php

class formMensaje{

    public function formMensajeShow($mensaje, $ruta){
        ?>    
        <!DOCTYPE html>
        <html lang="en">
            <head>
                <title>Mensaje</title>
            </head>
            <body>
                <div>
                <p ><small> <b><br><?=$mensaje?></b> </h1></small></p><br><br>
                </div>
                <div>
                    <a href="<?=$ruta?>"> Volver a mostrar formulario</a>
                </div>
            </body>
        </html>
        <?php
    }

}

?>