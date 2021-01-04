<?php

class Medicamento {

    private $codigo;
    private $idTipoMedicamento;
    private $nombre;
    private $descripcion;
    private $cantidadDisponible;
    private $estado;
    private $imagen;
    //Conexion
    private $conn;

    public function guardarMedicamento($codigo, $idTipoMedicamento, $nombre, $descripcion, $cantidadDisponible, $estado) {
        $this->codigo = $codigo;
        $this->idTipoMedicamento = $idTipoMedicamento;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->cantidadDisponible = $cantidadDisponible;
        $this->estado = $estado;
        //$this->imagen = $imagen;

        $sqlQuery = "INSERT INTO medicamentos(idmedicamento, idTipo, nombre, descripcion, cantidadDisponible, estado)"
                . "VALUES ('$codigo','$idTipoMedicamento','$nombre','$descripcion','$cantidadDisponible','$estado')";

        $db = new Conexion();
        $stmt = $db->getConnection()->query($sqlQuery);


        if ($stmt) {
            echo "Success";
        } else {
            echo "Error";
        }
        
    }

    public function eliminarMedicamento($idMedicamento) 
    {
        $sqlQuery = "DELETE FROM medicamentos WHERE idmedicamento = :idMedicamento";
        $stmt = Conexion::getConnection()->prepare($sqlQuery);
        
        $stmt->bindParam(":idMedicamento", $idMedicamento);
        $stmt->execute();
        
        if($stmt)
        {
           echo "Eliminado";
        }
         else
         {
             echo "Error";
         }
         
    }

    public function editarMedicamento($codigo, $nombre, $descripcion, $cantidadDisponible, $estado) {
        $this->codigo = $codigo;
        //$this->idTipoMedicamento = $idTipoMedicamento;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->cantidadDisponible = $cantidadDisponible;
        $this->estado = $estado;
        //$this->imagen = $imagen;

        $sqlQuery = "UPDATE medicamentos SET nombre = :nombre,
                                             descripcion = :descripcion,
                                             cantidadDisponible = :cantidadDisponible,
                                             estado = :estado
                                         WHERE idmedicamento = :idmedicamento";
        $db = new Conexion();
        $stmt = $db->getConnection()->prepare($sqlQuery);

        $stmt->bindParam(":nombre", $this->nombre);
        $stmt->bindParam(":descripcion", $this->descripcion);
        $stmt->bindParam(":cantidadDisponible", $this->cantidadDisponible);
        $stmt->bindParam(":estado", $this->estado);
        $stmt->bindParam(":idmedicamento", $this->codigo);

        $stmt->execute();

        if ($stmt) {
            echo "Correcto";
        } else {
            echo "Error";
        }
    }

    public function mostrarMedicamento() {
        $sqlQuery = "SELECT idmedicamento, idTipo, nombre, descripcion, cantidadDisponible, estado, imagen "
                . "FROM medicamentos";
        $db = new Conexion();
        $stmt = $db->getConnection()->prepare($sqlQuery);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }

    public function obtenerMedicamento($idMedicamento) {
        $sqlQuery = "SELECT idmedicamento, idTipo, nombre, descripcion, cantidadDisponible, estado, imagen "
                . "FROM medicamentos WHERE idmedicamento = :id LIMIT 0,1";
        $stmt = Conexion::getConnection()->prepare($sqlQuery);
        $stmt->bindParam(":id", $idMedicamento, PDO::PARAM_INT);
        $stmt->execute();

        //$dataRow = $stmt->fetch(PDO::FETCH_ASSOC);

        /*
          $this->codigo = $dataRow['idmedicamento'];
          $this->idTipoMedicamento = $dataRow['idTipo'];
          $this->nombre = $dataRow['nombre'];
          $this->descripcion = $dataRow['descripcion'];
          $this->cantidadDisponible = $dataRow['cantidadDisponible'];
          $this->estado = $dataRow['estado']; */

        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->close();
    }
    
    public function solicitarMedicamento($codigoOrden) 
    {
        $sqlQuery = "SELECT d.codigoOrden, m.nombre, d.cantidad, d.descripcion, d.estadoOrden, m.estado
                     FROM detalleordenes d 
                     INNER JOIN medicamentos m ON d.idMedicamento = m.idmedicamento 
                     WHERE d.codigoOrden = :codigoOrden";
        $stmt = Conexion::getConnection()->prepare($sqlQuery);
        $stmt->bindParam(":codigoOrden", $codigoOrden);
        $stmt->execute();
        
        return $stmt->fetchAll();
        $stmt->close();
    }

}
