<?php
include_once '../../model/Medicamento.php';
include_once '../../conexion/Conexion.php';

if (isset($_POST) && !empty($_POST)) {
    
    $itemMedicamento = new Medicamento();
        
        $codigo = $_POST['idMedicamentoActualizar'];
        //$idTipoMedicamento = $_POST['idTipoMedicamentoActualizar'];
        $nombre = $_POST['nombreActualizar'];
        $descripcion = $_POST['descripcionActualizar'];
        $cantidadDisponible = $_POST['cantidadDisponibleActualizar'];
        $estado = $_POST['estadoActualizar'];
        
        $itemMedicamento->editarMedicamento($codigo, $nombre, $descripcion, $cantidadDisponible, $estado);
}

