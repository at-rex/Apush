<?php

class formMenu{

    public function formMenuShow($lista){
        ?>       
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="../CSS/estilo_principal.css">
            <link rel="shorcut icon" type="image/x-icon" href="../img/sh.ico">
            <title>Menú principal</title>
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
        
                    <section class="section">
                        <?php $i = 1; 
                        foreach ($lista as $value) { ?>
                            <div class=<?php echo "div-opcion".$i."     caja" ?>> 
                                <form class="form" action="<?php echo $value[1] ?>" method = "post">
                                    <button class="privilegio">
                                        <img src="<?php echo $value[2] ?>" height="" width="" alt=""><?php echo $value[0]; $i++ ?>
                                    </button>
                                </form>
                            </div>
                        <?php } ?>
                    </section>
        
                    <footer class="footer">
        
                            <a href="../controlador/getMenu.php"> salir <img src="../img/logout.png" class="salir"alt=""> </a>
        
                    </footer>
        
                
            </div>
        </body>
        </html>
        
        <?php
    }

}

?>