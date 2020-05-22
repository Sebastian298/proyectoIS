let nombres = [];
let precios = [];
let contador =0;
function Peticion(){
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'consultarCircular.php');
    peticion.onload = function(){
    
    let datos = JSON.parse(peticion.responseText);
    
    
      if(contador!=0){
        nombres = [];
        precios = [];
      }
      
        for(var i = 0; i < datos.length; i++){
          nombres.push([`${datos[i].Nombre}`]);
          precios.push([`${datos[i].Precio}`]);
          ++contador;
        }
    }
   peticion.send();
   let ctx = document.getElementById('myChart').getContext('2d');
     let chart = new Chart(ctx, {
     type: 'pie',

     data: {
        labels:nombres,
        datasets: [{
            label: 'Precio de los productos más vendidos',
            backgroundColor: ['rgb(97, 11, 75)',
                'rgb(254, 46, 100)',
                'rgb(46, 100, 254)',
                'rgb(8, 138, 75)',
                'rgb(4, 180, 174)',
                'rgb(28, 28, 28)',
                'rgb(11, 76, 95)',
                'rgb(138, 41, 8)'],
            borderColor: ['rgb(97, 11, 75)',
                'rgb(254, 46, 100)',
                'rgb(46, 100, 254)',
                'rgb(8, 138, 75)',
                'rgb(4, 180, 174)',
                'rgb(28, 28, 28)',
                'rgb(11, 76, 95)',
                'rgb(138, 41, 8)'],
            data:precios
        }]
    },
    options: {
        layout: {
            padding: {
                left: 50,
                right: 0,
                top: 0,
                bottom: 0
            }
        },animation:false
        
    }
   });
  
}

function cargarGanancias() {
    tabla.innerHTML =
      "<tr><th>Id</th><th>Nombre</th><th>Precio</th><th>Total de Ganancia</th><th>Porcentaje de Ganancia</th></tr>";
    let peticion = new XMLHttpRequest();
    peticion.open("GET", "cargarCard.php");
  
    peticion.onload = function () {
      let datos = JSON.parse(peticion.responseText);
      tabla.innerHTML = "";
      if (datos.error) {
        error_box.classList.add("active");
      } else {
        for (var i = 0; i < datos.length; i++) {
          tabla.innerHTML += ` 
            <tr>
            <th>${datos[i].idProducto}</th>
            <td>${datos[i].Nombre_Producto}</td>
            <td>$${datos[i].Precio}</td>
            <td>$${datos[i].Total_Ganancia}</td>
            <td>${datos[i].Porcentaje_Ganancia}</td>
             </tr>
            `;
        }
      }
    };
    peticion.send();
}


Peticion();
cargarGanancias();
setInterval(Peticion, 1000);
