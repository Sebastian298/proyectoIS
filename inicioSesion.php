<?php session_start();

// if(isset($_SESSION['usuario'])){
//     header('location: index.php');  //Es por si el usuario inicia sesion e intenta entrar al formulario de registro no pueda acceder a ellos
// }


if($_SERVER['REQUEST_METHOD']=='POST'){
   $usuario = filter_var(strtolower($_POST['Usuario']),FILTER_SANITIZE_STRING);
   $password = $_POST['Password'];
   $errores='';   
   try {
    $conexion= new PDO('mysql:host=127.0.0.1;dbname=laredohits','root','');
   } catch (PDOException $e) {
       echo "Error:".$e->getMessage();
   }

   $statement = $conexion->prepare
   ('SELECT * FROM empleado WHERE nombre = :nombre AND password = :pass');

   $statement->execute(array(
    ':nombre' => $usuario,
    ':pass' => $password
));

$statement2 = $conexion->prepare
('SELECT * FROM administrador WHERE Nombre = :nombre AND pass = :pass');

$statement2->execute(array(
 ':nombre' => $usuario,
 ':pass' => $password
));

   //Validacion de usuario administrador y usuario?
   $resultado = $statement->fetch();
   $resultado2 = $statement2->fetch();

   if ($resultado !== false) {
    //    echo 'usuario';
    $_SESSION['usuario'] = $usuario;
    header('Location: index.php');
    
    
}else if($resultado2!==false){
    // echo 'adm';
    $_SESSION['usuario'] = $usuario;
    header('Location: registroEmpleado.php');
}else{
    $errores .= '<li style="color: white;">Datos incorrectos</li>';
}
}


require 'views/inicio.view.php';
?>