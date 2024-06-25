<?php
  require 'conexion.php';

  $op=filter_input(INPUT_POST,'op');
  date_default_timezone_set("AMerica/Argentina/Buenos_Aires");
  //var_dump($op);
  //$cuenta=$consulta->rowCount();
  
  $datos=[];
  if (isset($op)) {
    switch ($op) {
      case 'Año':
          $actual=date("Y-m-d");
          $titulo="Mes";
          $infoL=["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio" , "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        break;

      case 'Mes':
          $infoL=[];
          for ($i=1; $i < 32; $i++) { 
            array_push($infoL,$i);
          }
          $titulo="Dia";
          break;

      case 'Dia':
          $infoL=[];
          for ($i=1; $i < 25; $i++) { 
            array_push($infoL,$i.":00");
          }
          $titulo="Hora";
        break;
            
    }  
  }
  else{
    $op="Año";
    $titulo="Mes";
    $infoL=["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio" , "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  }
  
  $consulta=$conexion->prepare("SELECT * FROM tickets");// prepara la consulta SQL
  $consulta->execute();// ejecuta la consulta SQL
  $tablaReportes=$consulta->fetchAll(PDO::FETCH_ASSOC);// genera un diccionario con datos de PACIENTE 
  
  $datos=json_encode($datos);
  $infoL=json_encode($infoL);
  $titulo=json_encode($titulo);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafico</title>
    <link rel="stylesheet" href="style.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
</head>
<body>
    <?php include 'header.php';  ?>
    <section>
        <h1 style="border-bottom:1px solid">Estadisticas</h1>
        
        <form method="post" style="display:flex;gap:10px;margin:10px;align-items:center">
            <h2>Filtrar Por Este</h2>
            <input type="submit" name="op" value="Año" class="form-s">
            <input type="submit" name="op" value="Mes" class="form-s">
            <input type="submit" name="op" value="Dia" class="form-s">
        </form>
        <div style="margin: 20px; padding:10px;box-shadow:0px 0px 10px 0px rgba(0,0,0,0.5)">
          <h2>Grafico de este <?= $op ?></h2>
          <canvas id="a1" style="width:100%;"></canvas>
        </div>
        
        <script>
            var datos = [1,3,4,5,6,6,7,1,7,3,10,4];  
            var barColors = "rgba(54,162,235,0.2)"; 

            new Chart("a1", {//ANIO ACTUAL
              type: "bar",
              data: {
                labels: <?= $infoL ?>,
                datasets: [{
                  backgroundColor: barColors,
                  borderColor: "rgba(54,162,235,1)",
                  data:  datos ,
                  label: <?= $titulo ?>
                }]
              },
              
            });//ANIO ACTUAL 
        </script>
    </section>
</body>
</html>