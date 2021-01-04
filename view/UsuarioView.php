<?php
    session_start();
    $cedulaSesion = $_SESSION['sesionUser'][0];
    $idRol = $_SESSION['sesionUser'][1];

if (($cedulaSesion == null || $cedulaSesion = '') || ($idRol == null || $idRol = '')) {
    echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
    echo'<script type="text/javascript">
            swal("¡No se a iniciado sesion!", "Por favor inicie sesión", "info",
            window.location.href="../index.php";
        </script>';
    die();
}
?>
<!DOCTYPE html>
<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>MedicFast | Usuario</title>

        <!-- CSS del Bootstrap -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

        <!-- Ionicons CSS -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

        <!-- CSS -->
        <link href="../CSS/EstiloIndex.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>

        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <?php
            require_once 'elementos/Plantilla.php';
            ?>

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <?php
                require_once 'elementos/Navbar.php';
                ?>

                <div class="content">
                    <section class="py-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    Lista de Usuarios registrados:
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="Filtrar Usuario">
                                        </div>
                                    </div>
                                    <br>
                                    <div id="tablaDatosUsuario">
                                        
                                    </div>


                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /#page-content-wrapper -->





            </div>
            <!-- /#wrapper -->
        </div>
        <!-- /#page-content-wrapper -->




        <?php
        require_once 'elementos/Footer.php';
        ?>

        <!-- Bootstrap core JavaScript -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="../JS/mostrarUsuario.js" type="text/javascript"></script>
        

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function (e) {
                e.preventDefault();
                $("#wrapper").toggleClass("toggled");
            });
        </script>
        
        <script type="text/javascript">
                mostrarUsuario();
            </script>

    </body>

</html>