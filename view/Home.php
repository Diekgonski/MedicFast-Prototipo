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

        <title>MedicFast | Home</title>

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
                                    Vista Rápida
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <?php if($_SESSION['sesionUser'][1] === "1") { ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="icon ion-md-person mr-2"></i> Usuario</h5>
                                                    <p class="card-text">Ver y actualizar perfil del afiliado de la EPS.</p>
                                                    <a href="UsuarioView.php" class="btn btn-primary">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } ?>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="icon ion-md-medkit mr-2"></i> Medicamento</h5>
                                                    <p class="card-text">Realice la solicitud de los medicamentos asignados por su medico.</p>
                                                    <a href="MedicamentoView.php" class="btn btn-primary">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title"><i class="icon ion-md-pin mr-2"></i> Envío</h5>
                                                    <p class="card-text">Ver el estado de su envío, rastrear y estimar tiempo de llegada.</p>
                                                    <a href="EnvioView.php" class="btn btn-primary">Ver más</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
                <!-- /#page-content-wrapper -->
            </div>
            <!-- /#wrapper -->

            <?php
            require_once 'elementos/Footer.php';
            ?>

            <!-- Bootstrap core JavaScript -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            </script>

    </body>

</html>