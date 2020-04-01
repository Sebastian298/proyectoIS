var btn_cargar = document.getElementById('btn_cargar_usuarios'),
    editar = document.getElementById('botn'),
	tabla = document.getElementById('tabla');
var nombre,descripcion,imagen,precio;

cargarUsuarios();

document.getElementById('ID').style.display = 'none';
document.getElementById('boton').style.display='none';
document.getElementById('Imagen').style.display='none';
function cargarUsuarios(){
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
          <td>${datos[i].precio}</td>
          <td>${datos[i].imagen}</td>
		  <td><button class="btn btn-danger" onclick="validarEliminacion('${datos[i].id}')">Eliminar</button></td>
		  <td><button class="btn btn-warning" onclick="prueba('${datos[i].id}','${datos[i].nombre}','${datos[i].apellidos}','${datos[i].password}')">Editar</button></td>
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
		   cargarUsuarios();
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
	peticion.open('POST', 'eliminarEmpleado.php');
	var parametros = 'id='+ id;
	peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	peticion.onreadystatechange = function(){
		if(peticion.readyState == 4 && peticion.status == 200){
			cargarUsuarios();
		}
	}
	peticion.send(parametros);
}

function validarEliminacion(nombre){
	const swalWithBootstrapButtons = Swal.mixin({
		customClass: {
		  confirmButton: 'btn btn-success',
		  cancelButton: 'btn btn-danger'
		},
		buttonsStyling: false
	  })
	  
	  swalWithBootstrapButtons.fire({
		title: '¿Estas seguro(a)?',
		text: "El usuario se eliminara de forma permanente",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sí, ¡Borrar!',
		cancelButtonText: 'No, 	¡Cancelar!',
		reverseButtons: true
	  }).then((result) => {
		if (result.value) {
		  swalWithBootstrapButtons.fire(
			'Eliminado!',
			'El usuario a sido eliminado.',
			'Exíto',
			Eliminar(nombre)
		  )
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'El usuario no a sido eliminado:)',
			'error'
		  )
		}
	  })
}

function prueba(id,nombre,apellidos,password){
	document.getElementById('boton').style.display='block';
	document.getElementById('btn').style.display='none';
	formulario.id.value=id;
	formulario.nombre.value = nombre;
	formulario.apellidos.value=apellidos;
	formulario.password.value=password;

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
		text: "Los datos del usuario se editaran",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Sí, ¡Editar!',
		cancelButtonText: 'No, 	¡Cancelar!',
		reverseButtons: true
	  }).then((result) => {
		if (result.value) {
		  swalWithBootstrapButtons.fire(
			'Eliminado!',
			'El usuario a sido editado.',
			'Exíto',
			llenar()
		  )
		} else if (
		  /* Read more about handling dismissals below */
		  result.dismiss === Swal.DismissReason.cancel
		) {
		  swalWithBootstrapButtons.fire(
			'Cancelado',
			'El usuario no a sido editado:)',
			'error'
		  )
		}
	  })
}

function llenar(){
	var ident = formulario.id.value;
	var Nombre = formulario.nombre.value;
	var Apellidos = formulario.apellidos.value;
	var pass = formulario.password.value; 
	var peticion = new XMLHttpRequest();
	peticion.open('POST', 'updateEmpleado.php');
	var parametros = 'id='+ ident+'&nombre='+ Nombre+'&apellidos='+ Apellidos+'&password='+ pass;
	peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	peticion.onreadystatechange = ()=>{
		if(peticion.readyState == 4 && peticion.status == 200){
			cargarUsuarios();
		    formulario.nombre.value = '';
			formulario.apellidos.value = '';
			formulario.password.value = '';
			document.getElementById('boton').style.display='none';
			document.getElementById('btn').style.display='block';
			}
	}
	
	peticion.send(parametros);
		

}
