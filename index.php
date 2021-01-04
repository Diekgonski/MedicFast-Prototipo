<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!--        CSS Extras       -->
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">
        <link href="CSS/EstiloLogin.css" rel="stylesheet" type="text/css"/>

        <title>MedicFast: envió de medicamentos más efectivo</title>
    </head>

    <body>

        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #2E4272">

            <!-- Boton responsive -->
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#icono_navbar_responsive" aria-controls="icono_navbar_responsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Icono y nombre del aplicativo -->
            <a class="navbar-brand" id="Nombre_Soft" href="index.php">
                <img src="imagenes/MedicFastLogo.png" width="70" height="70" class="d-inline-block align-top" alt="Logo MedicFast" loading="lazy">
                MedicFast
            </a>


            <div class="collapse navbar-collapse" id="icono_navbar_responsive">

                <!-- Boton ingresar -->
                <div class="navbar-nav ml-auto">
                    <button type="button" id="btnIng" class="btn btn-light" data-toggle="modal" data-target="#formulario_i" aria-pressed="true" >Ingresar</button>
                </div>

            </div>
        </nav>
        <!-- /.navbar -->


        <!-- Modal INGRESO(LOGIN) -->
        <div class="modal fade" id="formulario_i" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="titulomodal">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="frmLogin" action="controller/LoginController.php"">

                            <input type="text" id="Cedula" name="cedula" class="form-control" placeholder="Cedula" required autofocus>

                            <br>
                            <input type="password" id="Pass"name="pass" class="form-control" placeholder="Contraseña" required>
                            <br>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <!-- /Modal INGRESO(LOGIN) -->


        <!-- Jumbotron -->
        <div class="jumbotron" id="jumbotron">
            <h1 class="display-4">¡Todos los envios sin costo adicional!</h1>
            <p class="lead">Lo mejor para el cuidado y bienestar tuyo</p>
            <hr class="my-4">
            <p>Pide tu domicilio sin costo adicional.</p>
            <a class="btn btn-primary btn-lg" href="#" role="button">Solicitar medicamentos</a>
        </div>
        <!-- /Jumbotron -->




        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="JS/mostrarUsuario.js" type="text/javascript"></script>
    </body>
</html>