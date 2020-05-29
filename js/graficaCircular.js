

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

function cargarGrafica(){
  let peticion = new XMLHttpRequest();
    peticion.open('GET', 'cargarCard.php');
    peticion.onload = function(){
    
    let datos = JSON.parse(peticion.responseText);
    
    
        let data=[];
      
        for(var i = 0; i < datos.length; i++){
          data.push({y:datos[i].Porcentaje_Ganancia,label:datos[i].Nombre_Producto})   
        }
        var chart = new CanvasJS.Chart("chartContainer", {
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          exportEnabled: true,
          animationEnabled: false,
          title: {
              text: "Ganancias"
          },
          data: [{
              type: "pie",
              startAngle: 25,
              toolTipContent: "<b>{label}</b>: {y}%",
              showInLegend: "true",
              legendText: "{label}",
              indexLabelFontSize: 16,
              indexLabel: "{label} - {y}%",
              dataPoints: data
          }]
      });
      chart.render();
    }
    peticion.send();
    
}

cargarGanancias();
cargarGrafica();
setInterval(cargarGrafica, 1000);
