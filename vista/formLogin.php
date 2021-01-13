<?php

class formLogin{

    public function formLoginShow(){ ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="shorcut icon" type="image/x-icon" href="img/sh.ico">
            <link rel="StyleSheet" href="css/Estilos_login.css" type="text/css">

            <title>Stephen Hawking</title>

            <!-- fuente-->
            <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

            <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

            <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

            <!-- sweet alert-->

            <link rel="stylesheet" href="plugins/dist/sweetalert2.all.min.css">

        </head>

        <body>
            <div class="conteiner">

                <div class="cont-login">

                    <div class="div-logo">

                        <img src="img/logo.png" height="100" width="80" alt="">

                    </div>


                    <form class="form" action="controlador/getLogin.php" method="post">

                        <h2>Bienvenido</h2>

                        <div class="div-input" for="">
                            <h3>Usuario:</h3>
                            <input class="input" name="txtUsuario" id="usuario" type="text">
                        </div>

                        <div class="div-input" for="">
                            <h3>Contraseña:</h3>
                            <input class="input" name="txtPassword" id="password" type="password">
                        </div>
                        <input type="hidden" value="Ingresar" name="login"> 
                        <button class="btn btn-second">ingresar</button>

                        <div class="link-text">

                            <!--a href="#">Recordar Contraseña</a-->

                        </div>
                        <div class="alert"> <?php echo isset($alert) ? $alert : ''; ?></div>
                    </form>

                </div>

            </div>
            <script src="js/validar_login.js"></script>
            <!-- alert sweet -->
            <script src="plugins/dist/sweetalert2.all.min.js"></script>

        </body>

        </html><?php 
    }
}
?>