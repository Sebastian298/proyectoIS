let editar = document.getElementById("botn"),
  tabla = document.getElementById("tabla");

document.getElementById("ID").style.display = "none";
document.getElementById("boton").style.display = "none";
cargarUsuarios();
function cargarUsuarios() {
  tabla.innerHTML =
    "<tr><th>Id</th><th>Nombre</th><th>Apellidos</th><th>Eliminar</th><th>Editar</th></tr>";
  let peticion = new XMLHttpRequest();
  peticion.open("GET", "leer-datos.php");

  peticion.onload = function () {
    let datos = JSON.parse(peticion.responseText);
    tabla.innerHTML = "";
    if (datos.error) {
      error_box.classList.add("active");
    } else {
      for (var i = 0; i < datos.length; i++) {
        tabla.innerHTML += ` 
          <tr>
          <th>${datos[i].id}</th>
		  <td>${datos[i].nombre}</td>
		  <td>${datos[i].apellidos}</td>
		  <td><button class="btn btn-danger" onclick="validarEliminacion('${datos[i].id}')">Eliminar</button></td>
		  <td><button class="btn btn-warning" onclick="Cargar('${datos[i].id}','${datos[i].nombre}','${datos[i].apellidos}')">Editar</button></td>
          </tr>
          `;
      }
    }
  };
  peticion.send();
}

function agregarUsuarios(nombre, apellidos, duplicado) {
  let password;
  var peticion = new XMLHttpRequest();
  password = document.getElementById("Password").value;
  if (
    formulario_valido(nombre, apellidos, password) &&
    validarCaptura(nombre, apellidos) &&
    !duplicado
  ) {
    peticion.open("POST", "registroEmpleado.php");
    var parametros =
      "nombre=" + nombre + "&apellidos=" + apellidos + "&password=" + password;
    peticion.setRequestHeader(
      "Content-Type",
      "application/x-www-form-urlencoded"
    );
    peticion.onreadystatechange = () => {
      if (peticion.readyState == 4 && peticion.status == 200) {
        console.log(peticion.responseText);
        Swal.fire(
          "Excelente!",
          "Se a registrado un nuevo empleado!",
          "success"
        );
        cargarUsuarios();
        formulario.nombre.value = "";
        formulario.apellidos.value = "";
        formulario.password.value = "";
      }
    };

    peticion.send(parametros);
  } else {
    Swal.fire(
      "Error!",
      "No a capturado correctamente algún campo, lo dejo vacio o duplico algún usuario",
      "error"
    );
    formulario.nombre.value = "";
	formulario.apellidos.value = "";
	formulario.password.value = "";
  }
}

function validarCaptura(nombre, apellidos) {
  if (isNaN(nombre)) {
    if (isNaN(apellidos)) {
      return true;
    } else {
      return false;
    }
  }
  return false;
}

function validarDuplicados() {
  let nombre = document.getElementById("nombre").value;
  let apellidos = document.getElementById("Apellidos").value;
  let peticion = new XMLHttpRequest();
  peticion.open("GET", "leer-datos.php");

  peticion.onload = function () {
    let duplicado = false;
    let datos = JSON.parse(peticion.responseText);
    for (let i = 0; i < datos.length; i++) {
      if (datos[i].nombre == nombre && datos[i].apellidos == apellidos) {
        duplicado = true;
        break;
      }
    }
    agregarUsuarios(nombre, apellidos, duplicado);
  };
  peticion.send();
}

function formulario_valido(nombre, apellidos, password) {
  if (nombre == "") {
    return false;
  } else if (apellidos == "") {
    return false;
  } else if (password == "") {
    return false;
  }

  return true;
}

function Eliminar(id) {
  let peticion = new XMLHttpRequest();
  peticion.open("POST", "eliminarEmpleado.php");
  let parametros = "id=" + id;
  peticion.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );

  peticion.onreadystatechange = function () {
    if (peticion.readyState == 4 && peticion.status == 200) {
      cargarUsuarios();
    }
  };
  peticion.send(parametros);
}

function validarEliminacion(id) {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
  });

  swalWithBootstrapButtons
    .fire({
      title: "¿Estas seguro(a)?",
      text: "El usuario se eliminara de forma permanente",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, ¡Borrar!",
      cancelButtonText: "No, 	¡Cancelar!",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.value) {
        swalWithBootstrapButtons.fire(
          "Eliminado!",
          "El usuario a sido eliminado.",
          "Exíto",
          Eliminar(id)
        );
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          "Cancelado",
          "El usuario no a sido eliminado:)",
          "error"
        );
      }
    });
}

function Cargar(id, nombre, apellidos) {
  document.getElementById("boton").style.display = "block";
  document.getElementById("btn").style.display = "none";
  formulario.password.style.display="none";
  formulario.id.value = id;
  formulario.nombre.value = nombre;
  formulario.apellidos.value = apellidos;
}

function validarEditar() {
  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: "btn btn-success",
      cancelButton: "btn btn-danger",
    },
    buttonsStyling: false,
  });

  swalWithBootstrapButtons
    .fire({
      title: "¿Estas seguro(a)?",
      text: "Los datos del usuario se editaran",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Sí, ¡Editar!",
      cancelButtonText: "No, 	¡Cancelar!",
      reverseButtons: true,
    })
    .then((result) => {
      if (result.value) {
        swalWithBootstrapButtons.fire(
          "Editado!",
          "El usuario a sido editado.",
          "Exíto",
          Editar()
        );
      } else if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.cancel
      ) {
        swalWithBootstrapButtons.fire(
          "Cancelado",
          "El usuario no a sido editado:)",
          "error"
        );
      }
    });
}

function Editar() {
  let ident = formulario.id.value;
  let Nombre = formulario.nombre.value;
  let Apellidos = formulario.apellidos.value;
  let peticion = new XMLHttpRequest();
  peticion.open("POST", "updateEmpleado.php");
  let parametros =
    "id=" +
    ident +
    "&nombre=" +
    Nombre +
    "&apellidos=" +
    Apellidos;
  peticion.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded"
  );
  peticion.onreadystatechange = () => {
    if (peticion.readyState == 4 && peticion.status == 200) {
      cargarUsuarios();
      formulario.nombre.value = "";
      formulario.apellidos.value = "";
      formulario.password.value = "";
      document.getElementById("boton").style.display = "none";
      document.getElementById("btn").style.display = "block";
      formulario.password.style.display="block";
    }
  };

  peticion.send(parametros);
}
