<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <meta charset="UTF-8">
        <title>medicamentos</title>
    </head>
    <body>
        <!-- Formulario -->

        <div id="formulario_clase">
            <div>
                <h2>Registrar<b> medicamento</b></h2>
            </div>
            <hr>
            <form action="" method="" enctype="">
                <div class="row">
                    <div class="col">
                        <input type="text"  class="form-control" placeholder="id medicamento" required autofocus>
                    </div>
                    <div class="col">
                        <input type="text"  class="form-control" placeholder="id tipo" required>
                    </div>
                </div> 
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text"  class="form-control" placeholder="nombre" required autofocus>
                    </div>
                    <div class="col">
                        <input type="text"  class="form-control" placeholder="descripcion" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col">
                        <input type="text"  class="form-control" placeholder="cantidad" required autofocus>
                    </div>
                    <div class="col">
                        <input type="text"  class="form-control" placeholder="estado" required>
                    </div>
                </div>  

                <br>

                <div>
                    <hr>
                    <button type="submit" id="btnReg" class="btn btn-success">Registrar medicamento</button>
                </div>
            </form>
        </div>

        <table id="tabla">
            <thead>

                <tr>

                    <th>idMedicamento </th>

                    <th>idTipo </th>

                    <th>Nombre </th>

                    <th>Descripcion </th>

                    <th>cantidad disponible </th>

                    <th>estado </th>

                </tr>

            </thead>

            <tbody>

                
            </tbody>


        </table>

        <script src="JS/controlador.js" type="text/javascript"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    </body>
</html>
