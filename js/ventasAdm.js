
function ContarVentasDia(){ 
    let datos;
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'ventasDia.php');

    peticion.onload = function(){
        
        
	    datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
		  cantidad.innerHTML +=  ` 
          <h5 class="card-tittle">Cantidad: ${datos[i].Cuantos} ventas</h5>
          `
          
        }
                
        
    }
    
    
    peticion.send();
   
}

function ContarVentasAyer(){
    let datos;
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'contarVentasAyer.php');

    peticion.onload = function(){
        
        
	    datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
		  ayer.innerHTML +=  ` 
          <h5 class="card-tittle">Porcentaje: ${datos[i].Porcentaje} en ventas</h5>
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
          <h5>Existencia : ${datos[i].Cuantos} Productos</h5>
          `
          
        }
                
        
    }
    
    
    peticion.send();
}

function ContarEmpleados(){
    let datos;
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'contarEmpleados.php');

    peticion.onload = function(){
        
        
	    datos = JSON.parse(peticion.responseText);
        
        for(var i = 0; i < datos.length; i++){
		  empleados.innerHTML +=  ` 
          <h4><p class="card-text">Registrados: ${datos[i].Cuantos}</p></h4>
          `
          
        }
                
        
    }
    
    
    peticion.send();
}

function mostrarHoy(){
	tabla.innerHTML = '<tr><th>Id Producto</th><th>Precio</th><th>Nombre Producto</th></tr>';

	let peticion = new XMLHttpRequest();
	peticion.open('GET', 'ventas.php');

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
          <td>${datos[i].Nombre_Producto}</td>
          </tr>
          `
		 }
		}
		
	}

	peticion.send();
}

function Generar(){
    let data = [];
    let peticion = new XMLHttpRequest();
    peticion.open('GET','ventas.php');
    peticion.onload=function(){
        let datos = JSON.parse(peticion.responseText);
        
        for (let index = 0; index < datos.length; index++) {
            data.push([`${datos[index].IdProducto}`,`${datos[index].Nombre_Producto}`,`$${datos[index].Precio}`]);
    };
    let fecha = new Date();
    
    let pdf = new jsPDF();
    let columns = ["Id", "Nombre", "Precio"];
    pdf.text(20,20,"Reporte de las ventas del día de hoy");
    pdf.autoTable(columns,data,
        { margin:{ top: 25  }}
      );
      pdf.save('Reporte del'+' '+fecha.getDate() + "/" + (fecha.getMonth() +1) + "/" + fecha.getFullYear()+'.pdf');
      }
    peticion.send();
}

mostrarHoy();
ContarEmpleados();
ContarVentasDia();
ObtenerGanancias();
ContarProductos();
ContarVentasAyer();
