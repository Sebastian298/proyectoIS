
function registrarProducto(nombre,precio,id){
  let peticion = new XMLHttpRequest();
  peticion.open('POST','ventaProducto.php');
  let parametros = 'nombreProducto='+ nombre+'&precio='+precio+'&id='+id;
  peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  peticion.onreadystatechange = ()=>{
    if(peticion.readyState == 4 && peticion.status == 200){
      Swal.fire(
        'Excelente!',
        'Se a registrado una nueva venta!',
        'success'
      )
      }
  }

 peticion.send(parametros);

}

function mostrarVentas(){
	tabla.innerHTML = '<tr><th>Id Producto</th><th>Precio</th><th>Fecha de Venta</th></tr>';

	let peticion = new XMLHttpRequest();
	peticion.open('GET', 'leerVentas.php');

	peticion.onload = function(){
		let datos = JSON.parse(peticion.responseText);
		tabla.innerHTML='';
		if(datos.error){
			error_box.classList.add('active');
		} else {
		for(var i = 0; i < datos.length; i++){
		  tabla.innerHTML +=  ` 
          <tr>
          <th>${datos[i].IdProducto}</th>
          <td>$${datos[i].Precio}</td>
          <td>${datos[i].fecha}</td>
          </tr>
          `
		 }
		}
		
	}

	peticion.send();
}

// function crearCards(){
//   let datos;
//   let peticion = new XMLHttpRequest();
//   peticion.open('GET', 'cargarProductos.php');

//   peticion.onload = function(){
      
      
//     datos = JSON.parse(peticion.responseText);
      
//     padre.innerHTML="";
//       for(var i = 0; i < datos.length; i++){
        
        
//     padre.innerHTML +=  ` 
//     <div class="card col-xs-4 col-sm-4 col-md-4 col-lg-4 col-xl-4" style="max-width:319px;">
//     <img src="img/${datos[i].imagen}>"
//          class="card-img-top" alt="Card image"/>

//     <div class="card-block text-center">
//         <h4 class="card-title font-weight-bold text-info">Nombre: ${datos[i].nombre}</h4>
//         <p class="card-text font-weight-bold text-info">ID: ${datos[i].id}</p>
//         <p class="card-text font-weight-bold text-info">Descripción: ${datos[i].descripcion}</p>
//         <p class="card-text font-weight-bold text-info">Precio$: ${datos[i].precio}</p>
//         <button class="btn btn-warning btn-lg active" onclick="registrarProducto('${datos[i].nombre}','${datos[i].precio}','${datos[i].id}')">Registrar</button>
//     </div>
    
// </div>
//         `
        
//       }
              
      
//   }
  
  
//   peticion.send();
// }

// crearCards();
// setInterval(crearCards,5000);
