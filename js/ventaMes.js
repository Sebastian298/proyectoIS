function mostrarMes(){
	tabla.innerHTML = '<tr><th>Id Producto</th><th>Precio</th><th>Fecha de Venta</th></tr>';

	let peticion = new XMLHttpRequest();
	peticion.open('GET', 'ventaMes.php');

	peticion.onload = function(){
		var datos = JSON.parse(peticion.responseText);
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