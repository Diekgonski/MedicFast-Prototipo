<?php

include_once '../../model/Medicamento.php';
include_once '../../conexion/Conexion.php';

if(isset($_POST['id']) && !empty($_POST['id']))
{
    $id = $_POST['id'];
    $itemMedicamento = Medicamento::eliminarMedicamento($id);  
}