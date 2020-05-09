
function ContarVentasDia(){ 
    let datos;
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'ventasDia.php');

    peticion.onload = function(){
        
        
	    datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
		  ventasDia.innerHTML +=  ` 
          <h5 class="card-tittle">Cantidad: ${datos[i].Cuantos} ventas</h5>
          `
          
        }
                
        
    }
    
    
    peticion.send();
   
}

function ObtenerGanancias(){ 
    let datos;
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'ganancias.php');

    peticion.onload = function(){
        
        
	    datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
		  ganancias.innerHTML +=  ` 
          <h5 class="card-tittle">Total $: ${datos[i].Total}</h5>
          `
          
        }
                
        
    }
    
    
    peticion.send();
   
}

function ContarProductos(){
    let datos;
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'leer-productos.php');

    peticion.onload = function(){
        
        
	    datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
		  existencia.innerHTML +=  ` 
          <h5 class="card-tittle">Existencia : ${datos[i].Cuantos} Productos</h5>
          `
          
        }
                
        
    }
    
    
    peticion.send();
}

ContarVentasDia();
ObtenerGanancias();
ContarProductos();