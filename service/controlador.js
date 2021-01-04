var usuarios = [];
const url = '/MedicFast/services/gestionMedicamentos.php';

function obtenerMedicamentos(){
    
    axios({
        method: 'GET',
        url: url,
        responseType:'json'
    
    }).then(respuesta =>{
        
        console.log(respuesta.data);
        this.usuarios = respuesta.data;
        listarMedicamentos();
        
    }).catch (error =>{
        
        console.log(error);
        
    });
    
}

obtenerMedicamentos();

function listarMedicamentos(){
    
    if(usuarios.length == 0){
        
        document.querySelector('#tabla tbody').innerHTML = '';
        
    }
    
    else{
        
        for (let i = 0; i < usuarios.length; i++) {
        
        document.querySelector('#tabla tbody').innerHTML +=
                `<tr>
                 <td>${usuarios[i].idMedicamento}</td>
                 <td>${usuarios[i].idTipo}</td>
                 <td>${usuarios[i].nombre}</td>
                 <td>${usuarios[i].descripcion}</td>
                 <td>${usuarios[i].cantDisp}</td>
                 <td>${usuarios[i].estado}</td>
                 <td><button type="button" class="btn btn-danger" onclick="eliminarMedicamento(${usuarios[i].idMedicamento})">Eliminar</button></td>
                 </tr>`;
            
    }
        
    }    
}

function eliminarMedicamento(id){
    
    console.log('Eliminar el medicamento ' + id);
    axios({
        method: 'DELETE',
        url: url + `?id=${id}`,
        responseType:'json'
    
    }).then(respuesta =>{
        
        console.log(respuesta.data);
        obtenerMedicamentos();
        
        
    }).catch (error =>{
        
        console.log(error);
        
    });
    
}
           