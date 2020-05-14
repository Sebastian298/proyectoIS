let nombres = [];
let precios = [];
let contador =0;
  function Peticion(){
    let peticion = new XMLHttpRequest();
    peticion.open('GET', 'consultarLineas.php');
    peticion.onload = function(){
    
    let datos = JSON.parse(peticion.responseText);
    
    
      if(contador!=0){
        nombres = [];
        precios = [];
      }
      
        for(var i = 0; i < datos.length; i++){
          nombres.push([`${datos[i].Nombre_Producto}`]);
          precios.push([`${datos[i].Precio}`]);
          ++contador;
        }
    }
   peticion.send();
   let ctx = document.getElementById('myChart').getContext('2d');
     let chart = new Chart(ctx, {
     type: 'line',

     data: {
        labels:nombres,
        datasets: [{
            label: 'Precio',
            backgroundColor: ['rgb(97, 11, 75)'],
            borderColor: ['rgb(97, 11, 75)'],
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
    