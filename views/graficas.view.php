<?php
$host='localhost';
$dbname='laredohits';
$user='root';
$pass='';

try{
    $dbcon= new PDO("mysql:host={$host};dbname={$dbname}",$user,$pass);
    $dbcon->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $ex){
   die($ex->getMessage());
}

$statement = $dbcon->prepare("SELECT * FROM venta WHERE DATE(fecha) = CURRENT_DATE()");
$statement->execute();
$json=[];
$json2=[];

while($row=$statement->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $json[]=$IdVenta;
  $json2[]=$Precio;
}

$stat = $dbcon->prepare("SELECT * FROM venta WHERE DATE(fecha) = CURRENT_DATE()-1");
$stat->execute();
$json3=[];
$json4=[];

while($row=$stat->fetch(PDO::FETCH_ASSOC)){
  extract($row);
  $json3[]=$IdVenta;
  $json4[]=$Precio;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadisticas</title>
    <script src="https://kit.fontawesome.com/8b850b0e85.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
        <h1><i class="fas fa-user-tie text-center font-weight-bold text-info"><br>Administrador</h1></i>
          <a href="cerrar.php" class="navbar-toggler" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" href="cerrar.php"></span>
                Cerrar Sesión</a>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <h1><a class="nav-link font-weight-bold text-danger" href="cerrar.php">Cerrar Sesión
                      <span class="sr-only">(current)</span>
                    </a></h1>
              </li>
            </ul>
          </div>
        </div>
</nav>
<br>
<br>
<h1 class="text-center font-weight-bold text-primary">Estadísticas de las ventas de Hoy y Ayer</h1>
<br>
<br>
<br>
<canvas id="myChart">

</canvas> 


<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>
// 
var speedCanvas = document.getElementById("myChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var dataFirst = {
    label: "Precios de los productos vendidos hoy",
    data: <?php echo json_encode($json2)?>,
    lineTension: 0,
    fill: false,
    borderColor: 'red'
  };

var dataSecond = {
    label: "Precios de los productos vendidos ayer",
    data: <?php echo json_encode($json4)?>,
    lineTension: 0,
    fill: false,
  borderColor: 'blue'
  };

var speedData = {
  labels: <?php echo json_encode($json)?>,
  datasets: [dataFirst, dataSecond]
};

// var speedData = {
//   labels: <?php echo json_encode($json3)?>,
//   datasets: [dataFirst, dataSecond]
// };

var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});
</script>
</body>
</html>