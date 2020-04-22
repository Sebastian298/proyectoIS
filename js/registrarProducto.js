var btn_cargar = document.getElementById('btn_cargar_usuarios'),
    editar = document.getElementById('botn'),
	tabla = document.getElementById('tabla');
var nombre,descripcion,imagen,precio;

cargarProductos();

document.getElementById('ID').style.display = 'none';
document.getElementById('boton').style.display='none';
document.getElementById('Imagen').style.display='none';
function cargarProductos(){
	tabla.innerHTML = '<tr><th>id</th><th>Nombre</th><th>descripcion</th><th>precio</th><th>imagen</th></tr>';

	var peticion = new XMLHttpRequest();
	peticion.open('GET', 'cargarProductos.php');

	loader.classList.add('active');

	peticion.onload = function(){
		var datos = JSON.parse(peticion.responseText);
		tabla.innerHTML='';
		if(datos.error){
			error_box.classList.add('active');
		} else {
		for(var i = 0; i < datos.length; i++){
		  tabla.innerHTML +=  ` 
          <tr>
          <th>${datos[i].ID}</th>
          <td>${datos[i].nombre}</td>
          <td>${datos[i].descripcion}</td>
          <td>$${datos[i].precio}</td>
          <td>${datos[i].imagen}</td>
		  <td><button class="btn btn-danger" onclick="validarEliminacion('${datos[i].ID}')">Eliminar</button></td>
		  <td><button class="btn btn-warning" onclick="prueba('${datos[i].ID}','${datos[i].nombre}','${datos[i].descripcion}','${datos[i].precio}','${datos[i].imagen}')">Editar</button></td>
          </tr>
          `
		 }
		}
		
	}

	peticion.onreadystatechange = function(){
		if(peticion.readyState == 4 && peticion.status == 200){
			loader.classList.remove('active');
		}
	}

	peticion.send();
}

function agregarProducto(){
	var peticion = new XMLHttpRequest();
	nombre = document.getElementById('Nombre').value;
	descripcion = document.getElementById('Descripcion').value;
	precio = document.getElementById('Precio').value;
	imagen=formulario.Imagen.value = document.getElementById('imagen').files[0].name;
	if(formulario_valido()){
	 peticion.open('POST','agregarProducto.php');
	 var parametros = 'nombre='+ nombre + '&descripcion='+ descripcion +'&precio='+ precio+'&imagen='+ imagen;
	 peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   
	 peticion.onreadystatechange = ()=>{
	   if(peticion.readyState == 4 && peticion.status == 200){
		Swal.fire(
			'Excelente!',
			'Se a registrado un nuevo producto',
			'success'
		  )
		   cargarProductos();
		   document.getElementById('Nombre').value='';
		   document.getElementById('Descripcion').value='';
		   document.getElementById('Precio').value='';
		   document.getElementById('imagen').value='';
		 }
	 }
   
	peticion.send(parametros);
	}else{
		alert('Error al capturar los datos');
	}
 }


function formulario_valido(){
	if(nombre == ''){
		return false;
	} else if(descripcion == ''){
		return false;
	}else if(precio == ''){
		return false;
	}else if(imagen==''){
       return false;
	}

	return true;
}

function Eliminar(id){
	var peticion = new XMLHttpRequest();
	peticion.open('POST', 'eliminarProducto.php');
	var parametros = 'id='+ id;
	peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	peticion.onreadystatechange = function(){
		if(peticion.readyState == 4 && peticion.status == 200){
			cargarProductos();
		}
	}
	peticion.send(parametros);
}

function validarEliminacion(id){
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: '¿Estas seguro(a)?',
		text: "El producto se eliminara de forma permanente",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sí, ¡Borrar!',
		cancelButtonText: 'No, 	¡Cancelar!',
		reverseButtons: true
	  }).then((result) => {
		if (result.value) {
		  swalWithBootstrapButtons.fire(
			'Eliminado!',
			'El producto a sido eliminado.',
			'Exíto',
			Eliminar(id),
			cargarProductos(),
			
		  )
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'El producto no a sido eliminado:)',
			'error'
		  )
		}
	  })
}

function prueba(id,nombre,descripcion,precio,imagen){
	document.getElementById('boton').style.display='block';
	document.getElementById('btn').style.display='none';
	formulario.ID.value=id;
	formulario.Nombre.value = nombre;
	formulario.Descripcion.value=descripcion;
	formulario.Precio.value=precio;
	document.getElementById('Imagen').value=imagen;
}

function validarEditar(){
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: '¿Estas seguro(a)?',
		text: "Los datos del producto se editaran",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sí, ¡Editar!',
		cancelButtonText: 'No, 	¡Cancelar!',
		reverseButtons: true
	  }).then((result) => {
		if (result.value) {
		  swalWithBootstrapButtons.fire(
			'Editado!',
			'El producto a sido editado.',
			'Exíto',
			llenar()
		  )
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'El producto no a sido editado:)',
			'error'
		  )
		}
	  })
}

function llenar(){
	var ident = formulario.ID.value;
	var nombre = formulario.Nombre.value;
	var bandera = document.getElementById('imagen').value;
	var imagen;
	var descripcion = formulario.Descripcion.value;
	var precio = formulario.Precio.value;
	if(bandera==''){
		imagen = document.getElementById('Imagen').value;
	}else{
		document.getElementById('Imagen').value=document.getElementById("imagen").files[0].name;
		imagen= document.getElementById('Imagen').value;
	}
	var peticion = new XMLHttpRequest();
	peticion.open('POST', 'updateProducto.php');
	var parametros = 'id='+ ident+'&nombre='+ nombre+'&descripcion='+ descripcion+'&precio='+ precio+'&imagen='+ imagen;
	peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion.onreadystatechange = ()=>{
		if(peticion.readyState == 4 && peticion.status == 200){
			cargarProductos();
		    formulario.Nombre.value = '';
			formulario.Descripcion.value = '';
			formulario.Precio.value = '';
			document.getElementById('boton').style.display='none';
			document.getElementById('btn').style.display='block';
			}
	}
	
	peticion.send(parametros);
		

}
