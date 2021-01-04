<?php

include_once '../conexion/Conexion.php';

class LoginController
{
    function validarLogin()
    {
        //Valores sacados de html
        $cedula = $_POST['cedula'];
        $clave = $_POST['pass'];
        
        $sqlQuery = "SELECT cedula, idRol, nombre FROM usuarios WHERE cedula = :cedula AND clave = :clave";
        $stmt = Conexion::getConnection()->prepare($sqlQuery);
        $stmt->bindParam(":cedula", $cedula);
        $stmt->bindParam(":clave", $clave);
        $stmt->execute();

        while($row = $stmt->fetch(PDO::FETCH_ASSOC))
        {
            $sesionArr = array($row['cedula'], $row['idRol'], $row['nombre']);
        }
        
        
        //Iniciar sesion
        session_start();
        
        $_SESSION['sesionUser'] = $sesionArr;
        
        
        if($stmt->rowCount() > 0)
        {
            echo 'Sesion iniciada';
            header("Location: /MedicFast/view/Home.php");
        }
         else
         {
             echo '<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>';
             echo '<script type="text/javascript">
                        swal({
                            title: "¡Error al iniciar sesión!",
                            text: "Hubo un error al iniciar sesión",
                            icon: "error",
                          });
                        setTimeout(function ()
                        {
                            window.history.back();
                        },2000);
                    </script>
             ';
         }
    }
}

if (isset($_POST) && !empty($_POST)) {
    $objLoginController = LoginController::validarLogin();
}