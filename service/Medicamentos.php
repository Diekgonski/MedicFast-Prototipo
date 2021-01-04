<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Medicamentos
 *
 * @author fabian
 */
class Medicamentos {
    
    private $conn;

    private $idMedicamento;
    private $idTipo;
    private $nombre;
    private $descripcion;
    private $cantidadDisp;
    private $estado;
    
    // Db connection
        public function __construct($db){
            $this->conn = $db;
        }
        
        //Metodos GET Y SET para cada atributo
        function getIdMedicamento() {
            return $this->idMedicamento;
        }

        function getIdTipo() {
            return $this->idTipo;
        }

        function getNombre() {
            return $this->nombre;
        }

        function getDescripcion() {
            return $this->descripcion;
        }

        function getCantidadDisp() {
            return $this->cantidadDisp;
        }

        function getEstado() {
            return $this->estado;
        }

        function setIdMedicamento($idMedicamento): void {
            $this->idMedicamento = $idMedicamento;
        }

        function setIdTipo($idTipo): void {
            $this->idTipo = $idTipo;
        }

        function setNombre($nombre): void {
            $this->nombre = $nombre;
        }

        function setDescripcion($descripcion): void {
            $this->descripcion = $descripcion;
        }

        function setCantidadDisp($cantidadDisp): void {
            $this->cantidadDisp = $cantidadDisp;
        }

        function setEstado($estado): void {
            $this->estado = $estado;
        }

        
    //funcion para crear los medicamentos
    public function registrarMedicamento() {
        
        $sqlQuery = "INSERT INTO medicamentos SET "
                . "idmedicamento = ?, "
                . "idTipo = ?,"
                . "nombre = ?,"
                . "descripcion = ?,"
                . "cantidadDisponible = ?,"
                . "estado = ?";
                 
            $stmt = $this->conn->prepare($sqlQuery);
        
            // bind data
            $stmt->bindParam(1, $this->idMedicamento);
            $stmt->bindParam(2, $this->idTipo);
            $stmt->bindParam(3, $this->nombre);
            $stmt->bindParam(4, $this->descripcion);
            $stmt->bindParam(5, $this->cantidadDisp);
            $stmt->bindParam(6, $this->estado);
        
            if($stmt->execute()){
                
               return true;
               
            }
            
            return false;
    }
    
    //funcion para obtener un medicamento a partir de idMedicamento
    public function obtenerMedicamento() {
        
        $sqlQuery = "SELECT `idmedicamento`, `idTipo`, `nombre`, `descripcion`, `cantidadDisponible`, `estado` FROM `medicamentos` "
                . "WHERE idmedicamento = ?";
        
        $stmt = $this->conn->prepare($sqlQuery);

            $stmt->bindParam(1, $this->idMedicamento);

            $stmt->execute();

            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $this->idMedicamento = $dataRow['idmedicamento'];
            $this->idTipo = $dataRow['idTipo'];
            $this->nombre = $dataRow['nombre'];
            $this->descripcion = $dataRow['descripcion'];
            $this->cantidadDisp = $dataRow['cantidadDisponible'];
            $this->estado = $dataRow['estado'];
    }

    //funcion para obtener la lista de medicamentos
    public function obtenerMedicamentos() {
        
        $sqlQuery = "SELECT `idmedicamento`, `idTipo`, `nombre`, `descripcion`, `cantidadDisponible`, `estado` FROM `medicamentos` ";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
            
        return $stmt;
        
    }
    
    //funcion para actualizar el medicamento
    public function actualizarMedicamento() {
        
        $sqlQuery = "UPDATE  `medicamentos` SET nombre = ?, descripcion = ?, cantidadDisponible = ?, estado = ?"
                . "WHERE idmedicamento = ?";

            $stmt = $this->conn->prepare($sqlQuery);

          
            // bind data
            $stmt->bindParam(1, $this->nombre);
            $stmt->bindParam(2, $this->descripcion);
            $stmt->bindParam(3, $this->cantidadDisp);
            $stmt->bindParam(4, $this->estado);
            $stmt->bindParam(5, $this->idMedicamento);

            if($stmt->execute()){
               return true;
            }
            return false;
    }
    
    //funcion para eliminar un medicamento por idMedicamento
    public function eliminarMedicamento() {
        
        $sqlQuery = "DELETE FROM medicamentos WHERE idmedicamento = ?";
            $stmt = $this->conn->prepare($sqlQuery);
        
            $stmt->bindParam(1, $this->idMedicamento);
        
            if($stmt->execute()){
                return true;
            }
            return false;
        
    }

}
