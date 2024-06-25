<?php include 'header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ver turnos</title>
    <style>
        table{

            text-align: center;
            border-collapse: collapse;
            background: #D6DBDF;
            padding: 20px;


            }

            td{
            padding-top:2px;
            padding-bottom:2px;
            }
            th{
            padding: 20px;
            background: cadetblue;
            color:white;

            }
            tr:nth-child(even){
            background: #AEB6BF;
            }
            tr:hover{
            background: #5D6D7E;
            }
    </style>
</head>
<body>
    <section>
        <h1 style="border-bottom:1px solid">Reportes</h1>
        <div style="display: flex;justify-content: center;gap:10px;margin:10px">
            <?php
            require 'conexion.php';
                $consulta=$conexion->prepare("SELECT * FROM tickets");// prepara la consulta SQL
                $consulta->execute();// ejecuta la consulta SQL
                $datos=$consulta->fetchAll(PDO::FETCH_ASSOC);// genera un diccionario con datos de PACIENTE 

                $cuenta=$consulta->rowCount();
                if($cuenta>0){
                    $n=1;
                    foreach ($datos as $elem) {
                        ?>
                        <div class="ticket">
                            <h1 style="text-align: center; padding: 10px 0px;">Reporte</h1>
                            <p >Fecha: <?= $elem['fecha'] ?></p>
                            <p><span>Cliente:</span> <?= $elem['cliente'] ?></p>
                            <p><span>Tipo de Problema:</span> <?= $elem['falla'] ?></p>
                            <p><span>Fecha de lo sucedido:</span> <?= $elem['fechaSuceso'] ?></p>
                            <p><span>Descripción del problema:</span><br> <ul><?= $elem['descripcion'] ?></ul></p>
                        </div>
                        <?php
                    }
                }
                else{
                    echo "<h2>No se enviaron reportes en dia de hoy</h2>";
                }
            
            ?>    
        </div>
        
    </section>
    
</body>
</html>