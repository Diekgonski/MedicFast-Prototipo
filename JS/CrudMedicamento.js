function mostrar(){
    $.ajax({
        type: 'GET',
        url: "../controller/MedicamentoController.php",
        data: {funcion: "obtenerDatos"},
        success: function (r) {
            $('#tablaDatos').html(r);
        }
    });
}

function listar(){
    $.ajax({
        type: 'GET',
        url: "../controller/MedicamentoController.php",
        data: {funcion: "listarDatos"},
        success: function (r) {
            $('#tarjeta').html(r);
        }
    });
}

function obtenerDatos(id)
{
    $.ajax({
        type: 'GET',
        url: "../controller/MedicamentoController.php",
        data: {id: id},
        success: function (r) {
            r = JSON.parse(r);
            $('#idMedicamentoActualizar').val(r['idmedicamento']);
            $('#tipoDeMedicamentoActualizar').val(r['idTipo']);
            $('#nombreMedicamentoActualizar').val(r['nombre']);
            $('#descripcionMedicamentoActualizar').val(r['descripcion']);
            $('#cantidadDisponibleActualizar').val(r['cantidadDisponible']);
            $('#estadoMedicamentoActualizar').val(r['estado']);
        }
    });
}

function actualizarDatos()
{
    $.ajax({
        type: 'POST',
        url: "../controller/redireccion/ActualizarMedicamento.php",
        data: $('#frmActualizarMedicamento').serialize(),
        success: function (r) {
            if(r === "Correcto")
            {
                mostrar();
                swal("¡Medicamento Actualizado!", "El medicamento se actualizo con exito", "success");
            }
             else
             {
                 swal("¡Error, Medicamento no actualizado!", "Hubo un error al actualizar el medicamento", "error");
             }
        }
    });
    
    return false;
}

function eliminarDatos(id){
	swal({
		title: "¿Estas seguro de eliminar este registro?",
		text: "!Una vez eliminado no podra recuperarse¡",
		icon: "warning",
		buttons: true,
		dangerMode: true,
	})
	.then((willDelete) => {
		if (willDelete) {
			$.ajax({
                            type: 'POST',
                            url: "../controller/redireccion/EliminarMedicamento.php",
                            data: {id: id},
                            success: function (r) {
                                console.log(r);
                                if(r === "Eliminado")
                                {
                                    mostrar();
                                    swal("¡Medicamento Eliminado!", "El medicamento se elimino con exito", "info");
                                }
                                 else
                                 {
                                     swal("¡Error, Medicamento no Eliminado!", "Hubo un error al eliminado el medicamento", "error");
                                 }
                            }
                        });
		} 
	});
}

function insertarDatos()
{
    $.ajax({
        type: 'POST',
        url: "../controller/MedicamentoController.php",
        data: $('#frmInsertarMedicamento').serialize(),
        success: function (r) {
            if(r === "Success")
            {
                $('#frmInsertarMedicamento')[0].reset();//Limpiar formulario
                mostrar();
                swal("¡Medicamento Agregado!", "El medicamento se agrego con exito", "success");
            }
             else
             {
                 swal("¡Error, Medicamento no agregado!", "Hubo un error al insertar el medicamento", "error");
             }
        }
    });
    
    return false;
}

function solicitarMedicamento()
{
    $('#button-addon2').click(function (e)
    {
       e.preventDefault();
       var codigoOrden = $('#orden').val();
       $.ajax({
           type: 'GET',
           url: "../controller/MedicamentoController.php",
           data: {funcion: codigoOrden},
           success: function (r) {
               console.log(r)
                $('#tablaSoliticarMedicamentos').html(r);
           }
       });
    });
    
}