<?php

class Login
{
    private $cedula;
    private $clave;
    
    public function validarLogin($cedula, $clave) 
    {
        $this->cedula = $cedula;
        $this->clave = $clave;
        
        $sqlQuery = "SELECT cedula, idRol FROM usuarios WHERE cedula = :cedula AND clave = :clave";
        $stmt = Conexion::getConnection()->prepare($sqlQuery);
        $stmt->bindParam(":cedula", cedula);
        $stmt->bindParam(":clave", clave);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->close();
    }
}
