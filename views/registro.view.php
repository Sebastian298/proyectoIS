<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- <link rel="stylesheet" href="css/estilos.css"> -->
    <title>Registro de Empleado</title>
</head>
<body>
<div class="container">
		<br>
		<br>
		<header>
			<h1>Tabla de Usuarios</h1>
			<br>
			<br>	
			<div>
				<button id="btn_cargar_usuarios" class="btn btn-primary">Cargar Usuarios</button>
			</div>
		</header>
		<br>
		<br>
		<a href="cerrar.php">Cerrar</a>
		<main>
			<form action="" method="POST" id="formulario" class="formulario">
			    <input type="text" name="id" id="ID" placeholder="Id"> 
				<input type="text" name="nombre" id="nombre" placeholder="Nombre">
				<input type="text" name="apellidos" id="Apellidos" placeholder="Apellidos">
				<input type="password" name="password" id="Password" placeholder="Password">
				<button id="btn" type="submit" class="btn btn-success" onclick="agregarUsuarios()"class="btn">Agregar</button>
			</form>
			
			<button id="boton"onclick="validarEditar()" class="btn btn-warning" id="botn">Editar</button>
			
			
			<!-- <div class="error_box" id="error_box">
				<p>Se ha producido un error.</p>
			</div> -->
			<br>
			<br>
			<table class="table my-2">
        <thead class="thead-dark">
          <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Password</th>
            <th>Eliminar</th>
            <th>Editar</th>
          </tr>
        </thead>
        <tbody id="tabla">
        </tbody>
      </table>
			<div class="loader" id="loader"></div>
		</main>
	</div>
<script src="js/registro.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>