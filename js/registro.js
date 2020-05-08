let editar = document.getElementById('botn'),
tabla = document.getElementById('tabla');

let nombre,apellidos,password;

document.getElementById('ID').style.display = 'none';
document.getElementById('boton').style.display='none';

cargarUsuarios();

function cargarUsuarios(){
	tabla.innerHTML = '<tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Password</th><th>Eliminar</th><th>Editar</th></tr>';

	let peticion = new XMLHttpRequest();
	peticion.open('GET', 'leer-datos.php');

	peticion.onload = function(){
		let datos = JSON.parse(peticion.responseText);
		tabla.innerHTML='';
		if(datos.error){
			error_box.classList.add('active');
		} else {
		for(var i = 0; i < datos.length; i++){
		  tabla.innerHTML +=  ` 
          <tr>
          <th>${datos[i].id}</th>
		  <td>${datos[i].nombre}</td>
		  <td>${datos[i].apellidos}</td>
		  <td>${datos[i].password}</td>
		  <td><button class="btn btn-danger" onclick="validarEliminacion('${datos[i].id}')">Eliminar</button></td>
		  <td><button class="btn btn-warning" onclick="Cargar('${datos[i].id}','${datos[i].nombre}','${datos[i].apellidos}','${datos[i].password}')">Editar</button></td>
          </tr>
          `
		 }
		}
		
	}

	peticion.send();
}

function agregarUsuarios(){
   var peticion = new XMLHttpRequest();
   nombre = document.getElementById('nombre').value;
   apellidos = document.getElementById('Apellidos').value;
   password = document.getElementById('Password').value;
   if(formulario_valido()&&validarCaptura()){
	peticion.open('POST','registroEmpleado.php');
	var parametros = 'nombre='+ nombre + '&apellidos='+ apellidos +'&password='+ password;
	peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
	peticion.onreadystatechange = ()=>{
	  if(peticion.readyState == 4 && peticion.status == 200){
		Swal.fire(
			'Excelente!',
			'Se a registrado un nuevo empleado!',
			'success'
		  )
		   cargarUsuarios();
		   formulario.nombre.value = '';
			formulario.apellidos.value = '';
			formulario.password.value = '';
		}
	}
  
   peticion.send(parametros);
   }else{
	Swal.fire(
		'Error!',
		'No a capturado correctamente algún campo o lo dejo vacio',
		'error'
	  )
	  formulario.nombre.value = '';
	  formulario.apellidos.value = '';
   }
}

function validarCaptura(){
	if(isNaN(nombre)){
        if(isNaN(apellidos)){
           return true;
		}else{
			return false;
		}
	}
	return false
}

function formulario_valido(){
	if(nombre == ''){
		return false;
	} else if(apellidos == ''){
		return false;
	}else if(password == ''){
		return false;
	}

	return true;
}


function Eliminar(id){
	let peticion = new XMLHttpRequest();
	peticion.open('POST', 'eliminarEmpleado.php');
	let parametros = 'id='+ id;
	peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	
	peticion.onreadystatechange = function(){
		if(peticion.readyState == 4 && peticion.status == 200){
			cargarUsuarios();
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
			Eliminar(id)
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

function Cargar(id,nombre,apellidos,password){
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
			'Editado!',
			'El usuario a sido editado.',
			'Exíto',
			Editar()
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

function Editar(){
	let ident = formulario.id.value;
	let Nombre = formulario.nombre.value;
	let Apellidos = formulario.apellidos.value;
	let pass = formulario.password.value; 
	let peticion = new XMLHttpRequest();
	peticion.open('POST', 'updateEmpleado.php');
	let parametros = 'id='+ ident+'&nombre='+ Nombre+'&apellidos='+ Apellidos+'&password='+ pass;
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



