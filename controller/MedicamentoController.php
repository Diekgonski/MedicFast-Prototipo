<?php

include_once '../conexion/Conexion.php';
include_once '../model/Medicamento.php';

class MedicamentoController {

    public function agregarMedicamento() {
        $itemMedicamento = new Medicamento();

        //Elementos para guardar en la db
        $codigo = $_POST['idMedicamento'];
        $idTipoMedicamento = $_POST['idTipoMedicamento'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $cantidadDisponible = $_POST['cantidadDisponible'];
        $estado = $_POST['estado'];
        //Imagen para la db
        //$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        //Objeto cargado con los elementos para ir a ladb
        $itemMedicamento->guardarMedicamento($codigo, $idTipoMedicamento, $nombre, $descripcion, $cantidadDisponible, $estado);
    }

    public function mostrarMedicamentos() {
        $objMedicamentos = new Medicamento();
        $datos = $objMedicamentos->mostrarMedicamento();

        $tabla = '<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Codigo</th>
                                                <th scope="col">Tipo</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Operaciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
        $datosTabla = '';
        foreach ($datos as $key => $row) {
            $datosTabla = $datosTabla . '<tr>
                    <th scope="row"> ' . $row['idmedicamento'] . '</th>
                    <td>' . $row['idTipo'] . '</td>
                    <td>' . $row['nombre'] . '</td>
                    <td>' . $row['descripcion'] . '</td>
                    <td>' . $row['cantidadDisponible'] . '</td>
                    <td>' . $row['estado'] . '</td>
                    <td>
                        <a class="btn btn-primary" onclick="obtenerDatos(' . $row['idmedicamento'] . ')" data-toggle="modal" data-target="#formularioActualizarMedicamentos">Editar</a>
                        <a class="btn btn-danger" onclick="eliminarDatos(' . $row['idmedicamento'] . ')">Borrar</a>
                    </td>
                </tr>';
        }

        echo $tabla . $datosTabla . '</tbody></table>';
    }
    
    public function listarMedicamentos() 
    {
        $objMedicamentos = new Medicamento();
        $datos = $objMedicamentos->mostrarMedicamento();
        
        $card = '';
        
        foreach ($datos as $key => $row)
        {
            $card = $card. '<div class="col-md-4 py-3">
                            <div class="card" style="width: 18rem;">
                                <img src="..." class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">'.$row['nombre'].'</h5>
                                    <p class="card-text">' . $row['descripcion'] . '</p>
                                    <a href="SolicitudMedicamentoView.php" class="btn btn-primary">Solicitar Medicamento</a>
                                </div>
                            </div>
                        </div>';
        }
        
        echo $card;
    }


    public function obtenerMedicamento($id) 
    {
        $objMedicamentos = new Medicamento();
        $datos = $objMedicamentos->obtenerMedicamento($id);
        echo json_encode($datos);
    }
    
    public function actualizarMedicamentos()
    {
        $itemMedicamento = new Medicamento();
        
        $codigo = $_POST['idMedicamentoActualizar'];
        //$idTipoMedicamento = $_POST['idTipoMedicamentoActualizar'];
        $nombre = $_POST['nombreActualizar'];
        $descripcion = $_POST['descripcionActualizar'];
        $cantidadDisponible = $_POST['cantidadDisponibleActualizar'];
        $estado = $_POST['estadoActualizar'];
        
        $itemMedicamento->editarMedicamento($codigo, $nombre, $descripcion, $cantidadDisponible, $estado);
    }
    
    public function eliminarMedicamento($idMedicamento) 
    {
        $objMedicamentos = new Medicamento();
        $objMedicamentos->eliminarMedicamento($idMedicamento);
    }
    
    public function solicitarMedicamento($codigoOrden) 
    {
        $objMedicamentos = new Medicamento();
        $datos = $objMedicamentos->solicitarMedicamento($codigoOrden);
        
        $tabla = '<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Codigo Orden</th>
                                                <th scope="col">Nombre Medicamento</th>
                                                <th scope="col">Cantidad</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Estado Orden</th>
                                                <th scope="col">Estado Medicamento</th>
                                                <th scope="col">Solicitar</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
        $datosTabla = '';
        foreach ($datos as $key => $row) {
            $datosTabla = $datosTabla . '<tr>
                    <th scope="row"> ' . $row['codigoOrden'] . '</th>
                    <td>' . $row['nombre'] . '</td>
                    <td>' . $row['cantidad'] . '</td>
                    <td>' . $row['descripcion'] . '</td>
                    <td>' . $row['estadoOrden'] . '</td>
                    <td>' . $row['estado'] . '</td>
                    <td>
                        <a class="btn btn-primary float-right" onclick="realizarEnvio(' . $row['codigoOrden'] . ')">Solicitar Envío</a>
                    </td>
                </tr>';
        }

        echo $tabla . $datosTabla . '</tbody></table>';
    }

}

if (isset($_POST) && !empty($_POST)) {
    $objControllerMedicamento = new MedicamentoController();
    $objControllerMedicamento->agregarMedicamento();
}

if (isset($_GET['funcion']) && !empty($_GET['funcion'])) 
{
    $funcion = $_GET['funcion'];
    
    if($funcion === "obtenerDatos")
    {
        $objControllerMedicamento = new MedicamentoController();
        $objControllerMedicamento->mostrarMedicamentos();
    }
    else {
        if($funcion ==="listarDatos")
        {
            $objControllerMedicamento = new MedicamentoController();
            $objControllerMedicamento->listarMedicamentos();
        }
         else{
             $objControllerMedicamento = new MedicamentoController();
             $objControllerMedicamento->solicitarMedicamento($funcion);
         }
    }
}

if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
    $objControllerMedicamento = MedicamentoController::obtenerMedicamento($id);
}