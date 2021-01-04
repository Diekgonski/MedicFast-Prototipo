<?php

    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Origin: *");

    require_once '../conexion/DataConexion1.php';
    require_once '../model/Medicamentos.php';

    $conexion = new DataConexion1();
    $db = $conexion->getConexion();
    $envio = new Medicamentos($db);

    //Registro de medicamentos
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $data = json_decode(file_get_contents('php://input'));

        $envio->setIdMedicamento($data->idMedicamento);
        $envio->setIdTipo($data->idTipo);
        $envio->setNombre($data->nombre);
        $envio->setDescripcion($data->descripcion);
        $envio->setCantidadDisp($data->cantDisp);
        $envio->setEstado($data->estado);
    
        if ($envio->registrarMedicamento()) {
        
            $respuesta = 'Medicamento creado exitosamente';
        
        } else {

        $respuesta = 'Medicamento no pudo ser creado correctamente';
        }
    
        $resultado = ["mensaje" => $respuesta];
        echo json_encode($resultado);
    }
    //Busqueda de medicamentos por id
    elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {

        if (isset($_GET['id'])) {

            $envio->setIdMedicamento($_GET['id']);
            $envio->obtenerMedicamento();

            if ($envio->getNombre() != null) {

                // create array
                $emp_arr = array(
                    "idMedicamento" => $envio->getIdMedicamento(),
                    "idTipo" => $envio->getIdTipo(),
                    "nombre" => $envio->getNombre(),
                    "descripcion" => $envio->getDescripcion(),
                    "cantDisp" => $envio->getCantidadDisp(),
                    "estado" => $envio->getEstado(),
                );

                http_response_code(200);
                echo json_encode($emp_arr);
            }else {

                http_response_code(404);
                echo json_encode("Medicamento no encontrado");
            }
        }
        //Listado de medicamentos
        else {

            $stmt = $envio->obtenerMedicamentos();
            $itemCount = $stmt->rowCount();

            if ($itemCount > 0) {

                $comboArr = array();
                

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    extract($row);
                    $e = array(
                        "idMedicamento" => $idmedicamento,
                        "idTipo" => $idTipo,
                        "nombre" => $nombre,
                        "descripcion" => $descripcion,
                        "cantDisp" => $cantidadDisponible,
                        "estado" => $estado
                    );

                    array_push($comboArr,$e);
                }
                echo json_encode($comboArr);
            } else {
            
                http_response_code(404);
                echo json_encode(array("message" => "No se encontraron registros."));
            }
        }
    }
    //Actualizacion de medicamentos
    elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {

        $data = json_decode(file_get_contents('php://input'));
    
        $envio->setIdMedicamento($data->idMedicamento);
        $envio->setNombre($data->nombre);
        $envio->setDescripcion($data->descripcion);
        $envio->setCantidadDisp($data->cantDisp);
        $envio->setEstado($data->estado);
    
        if($envio->actualizarMedicamento()){
        
            $respuesta = "Medicamento actualizado correctamente";
        
        } else{
        
            $respuesta = "No se pudo actualizar el medicamento";
        
        }
        $resultado = ["mensaje" => $respuesta];
        echo json_encode($resultado);
    
    
    }
    elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    //    $data = json_decode(file_get_contents("php://input"));
    
        $envio->setIdMedicamento($_GET['id']);
    
        if($envio->eliminarMedicamento()){
        
            $respuesta = "Medicamento eliminado.";
        
        } else{
        
            $respuesta = "No se pudo eliminar el medicamento.";
        }
    
        $resultado = ["mensaje" => $respuesta];
        echo json_encode($resultado);
    }
?>

