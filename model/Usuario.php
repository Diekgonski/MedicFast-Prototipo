<?php

class Usuario
{   
    function mostrarUsuarios() 
    {
        $sqlQuery = "SELECT u.cedula, r.nombreRol, u.clave, u.fechaRegistro, u.email, u.nombre, u.apellido, u.edad, u.telefono
                     FROM usuarios u 
                     INNER JOIN roles r ON r.id = u.idRol";
        $db = new Conexion();
        $stmt = $db->getConnection()->prepare($sqlQuery);
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
    }
}

