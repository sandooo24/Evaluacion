<?php
	require "conexion.php";

    $tipo = filter_input(INPUT_POST,'tipo');
    $descripcion = filter_input(INPUT_POST,'descripcion');
    $fechaSu = filter_input(INPUT_POST,'fecha');
    $cliente = filter_input(INPUT_POST,'nombre');
    $fecha = date("Y-m-d H:i:s");
    echo $tipo;
    
	$new_insert= $conexion->prepare("INSERT INTO `tickets` (`cliente`,`falla`, `descripcion`,`fechaSuceso`,`fecha`) VALUES ( :cli, :tip, :de, :fecS, :fec)");
    $new_insert->bindParam(':de',$descripcion);
    $new_insert->bindParam(':tip',$tipo);
    $new_insert->bindParam(':fec',$fecha);
    $new_insert->bindParam(':fecS',$fechaSu);
    $new_insert->bindParam(':cli',$cliente);
    $new_insert->execute();

    header('Location:cliente.php');
   
?>