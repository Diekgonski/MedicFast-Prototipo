function mostrarUsuario(){
    $.ajax({
        type: 'GET',
        url: "../controller/UsuarioController.php",
        data: {funcion: "obtenerUsuarios"},
        success: function (r) {
            console.log(r);
            $('#tablaDatosUsuario').html(r);
        }
    });
}

function ingresarLogin()
{
    $.ajax({
        type: 'POST',
        url: "../controller/LoginController.php",
        data: $('#frmLogin').serialize(),
        success: function (r) {
            console.log(r);
            if(r === "Sesion iniciada")
            {
                $('#frmLogin')[0].reset();//Limpiar formulario
               // location.href = 'http://localhost/MedicFast/view/Home.php';
               swal("¡Correcto!", "Hubo un error al iniciar sesión", "success");
            }
             else
             {
                 swal("¡Error al iniciar sesión!", "Hubo un error al iniciar sesión", "error");
             }
        }
    });
}