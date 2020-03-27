console.log('conectado');



function registrarProducto(id,precio){
  

  var peticion = new XMLHttpRequest();
  peticion.open('POST','ventaProducto.php');
  var parametros = 'id='+ id+'&precio='+precio;
  peticion.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

  peticion.onreadystatechange = ()=>{
    if(peticion.readyState == 4 && peticion.status == 200){
        console.log('Capturado');
      }
  }

 peticion.send(parametros);

}