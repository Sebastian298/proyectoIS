var btn_cargar = document.getElementById('btn_cargar_usuarios'),
    editar = document.getElementById('botn'),
	error_box = document.getElementById('error_box'),
	tabla = document.getElementById('tabla'),
	loader = document.getElementById('loader');

var usuario_nombre,
	usuario_apellidos,
	usuario_password;
document.getElementById('ID').style.display = 'none';
document.getElementById('boton').style.display='none';
function cargarUsuarios(){
	tabla.innerHTML = '<tr><th>ID</th><th>Nombre</th><th>Apellidos</th><th>Password</th></tr>';

	var peticion = new XMLHttpRequest();
	peticion.open('GET', 'leer-datos.php');

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
          <th>${datos[i].id}</th>
          <td>${datos[i].nombre}</td>
          <td>${datos[i].apellidos}</td>
          <td>${datos[i].password}</td>
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

function agregarUsuarios(){
	// function POST_PHP(url, succes_function, param) {
	// 	$.ajax({
	// 		data: param,
	// 		url: url,
	// 		method: "post",
	// 		success: succes_function
	// 	});
	// }
	//
	//
    // var parm = {
    //     usuario_nombre: formulario.nombre.value.trim(),
    //     usuario_apellidos: formulario.apellidos.value.trim(),
    //     usuario_password: formulario.password.value.trim()
    // };
	// 
	// POST_PHP('registroEmpleado.php', succes_function, parm);
	// 
	// function succes_function(res){
	// 	console.log(res.usuario_apellidos);
	// }


	var peticion = new XMLHttpRequest();
	peticion.open('GET', 'registroEmpleado.php');
	usuario_nombre = formulario.nombre.value.trim();
	usuario_apellidos = formulario.apellidos.value.trim();
	usuario_password = formulario.password.value.trim();

	if(formulario_valido()){
		error_box.classList.remove('active');
		var parametros = 'nombre='+ usuario_nombre + '&apellidos='+ usuario_apellidos +'&password='+ usuario_password;

		peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

		loader.classList.add('active');

		peticion.onload = function(){
			cargarUsuarios();
			formulario.nombre.value = '';
			formulario.apellidos.value = '';
			formulario.password.value = '';

		}

		peticion.onreadystatechange = function(){
			if(peticion.readyState == 4 && peticion.status == 200){
				loader.classList.remove('active');
			}
		}

		peticion.send(parametros);

		
	} else {
		// error_box.classList.add('active');
		// error_box.innerHTML = 'Por favor completa el formulario correctamente';
		alert('ERROR, Por favor rellene correctamente el formulario');
		
	}
}

btn_cargar.addEventListener('click', function(){
	cargarUsuarios();
});



function formulario_valido(){
	if(usuario_nombre == ''){
		return false;
	} else if(usuario_apellidos == ''){
		return false;
	}else if(usuario_password == ''){
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



