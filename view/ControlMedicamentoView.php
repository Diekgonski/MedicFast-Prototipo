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

        <title>MedicFast | Agregar Medicamentos</title>

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

                <div class="container">
                    <section class="py-3">
                        <div class="container">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle float-right" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Crear Contenido
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                    <button class="dropdown-item" type="button" data-toggle="modal" data-target="#formularioMedicamentos">Crear Medicamento</button>
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary">
                                    Lista de medicamentos registrados:
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="text" class="form-control" placeholder="Filtrar Medicamentos">
                                        </div>
                                    </div>
                                    <br>
                                    <div id="tablaDatos">
                                        
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

            <!-- Modal -->
            <div class="modal fade" id="formularioMedicamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" onsubmit="return insertarDatos()" id="frmInsertarMedicamento">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Formulario Medicamentos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputName">Codigo del Medicamento</label>
                                    <input type="text" class="form-control" name="idMedicamento">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Tipo de medicamento</label>
                                        <select id="tipoDeMedicamento" class="form-control" name="idTipoMedicamento">
                                            <option selected>Elija una opción...</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Nombre</label>
                                        <input type="text" class="form-control" id="nombreMedicamento" name="nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Descripción</label>
                                    <input type="text" class="form-control" id="descripcionMedicamento" placeholder="" name="descripcion">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">Cantidad</label>
                                        <input type="text" class="form-control" id="inputCity" name="cantidadDisponible">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="inputZip">Estado</label>
                                        <select id="tipoDeMedicamento" class="form-control" name="estado">
                                            <option selected>Elija una opción...</option>
                                            <option>Disponible</option>
                                            <option>Agotado</option>
                                            <option>No Disponible</option>
                                        </select>
                                    </div>
<!--
                                    <div class="form-group col-md-8">
                                        <label for="exampleFormControlFile1">Inserte una Imagen:</label>
                                        <input type="file" class="form-control" id="image" name="image" multiple>
                                    </div> -->
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Medicamento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Modal Actualizar-->
            <div class="modal fade" id="formularioActualizarMedicamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" onsubmit="return actualizarDatos()" id="frmActualizarMedicamento">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Formulario Actualizar Medicamentos</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputName">Codigo del Medicamento</label>
                                    <input type="text" class="form-control" name="idMedicamentoActualizar" id="idMedicamentoActualizar" readonly="">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputState">Tipo de medicamento</label>
                                        <select id="tipoDeMedicamentoActualizar" class="form-control" name="idTipoMedicamentoActualizar" disabled="">
                                            <option selected>Elija una opción...</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Nombre</label>
                                        <input type="text" class="form-control" id="nombreMedicamentoActualizar" name="nombreActualizar">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputDescription">Descripción</label>
                                    <input type="text" class="form-control" id="descripcionMedicamentoActualizar" placeholder="" name="descripcionActualizar">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="inputCity">Cantidad</label>
                                        <input type="text" class="form-control" id="cantidadDisponibleActualizar" name="cantidadDisponibleActualizar">
                                    </div>

                                    <div class="form-group col-md-8">
                                        <label for="inputZip">Estado</label>
                                        <select id="estadoMedicamentoActualizar" class="form-control" name="estadoActualizar">
                                            <option selected>Elija una opción...</option>
                                            <option>Disponible</option>
                                            <option>Agotado</option>
                                            <option>No Disponible</option>
                                        </select>
                                    </div>
<!--
                                    <div class="form-group col-md-8">
                                        <label for="exampleFormControlFile1">Inserte una Imagen:</label>
                                        <input type="file" class="form-control" id="image" name="image" multiple>
                                    </div> -->
                                </div>  
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar Medicamento</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="../JS/CrudMedicamento.js" type="text/javascript"></script>
            <!-- Menu Toggle Script -->
            <script>
                $("#menu-toggle").click(function (e) {
                    e.preventDefault();
                    $("#wrapper").toggleClass("toggled");
                });
            </script>
            
            <script type="text/javascript">
                mostrar();
            </script>

    </body>

</html>