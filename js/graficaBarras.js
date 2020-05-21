let nombres = [];
let precios = [];
let contador =0;
function Peticion(){
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'consultarBarras.php');
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
     type: 'bar',

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

Peticion();
setInterval(Peticion, 1000);
setInterval(cargarGanancias,3000);
    