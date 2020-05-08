
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

