<?php

include_once '../conexion/Conexion.php';
include_once '../model/Usuario.php';

class UsuarioController
{
    function mostrarUsuario() 
    {
        $objUsuario = new Usuario();
        $datos = $objUsuario->mostrarUsuarios();
        
        $tabla = '<table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Cedula</th>
                                                <th scope="col">Rol</th>
                                                <th scope="col">Clave</th>
                                                <th scope="col">FechaRegistro</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellido</th>
                                                <th scope="col">Edad</th>
                                                <th scope="col">Telefono</th>
                                            </tr>
                                        </thead>
                                        <tbody>';
        
        $datosTabla = '';
        foreach ($datos as $key => $row) {
            $datosTabla = $datosTabla . '<tr>
                    <th scope="row"> ' . $row['cedula'] . '</th>
                    <td>' . $row['nombreRol'] . '</td>
                    <td>' . $row['clave'] . '</td>
                    <td>' . $row['fechaRegistro'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['nombre'] . '</td>
                    <td>' . $row['apellido'] . '</td>
                    <td>' . $row['edad'] . '</td>
                    <td>' . $row['telefono'] . '</td>
                </tr>';
        }
        
        echo $tabla . $datosTabla . '</tbody></table>';
    }
}

if (isset($_GET['funcion']) && !empty($_GET['funcion'])) 
{
    $funcion = $_GET['funcion'];
    
    if($funcion === "obtenerUsuarios")
    {
        $objControllerUsuario = new UsuarioController();
        $objControllerUsuario->mostrarUsuario();
    }
}