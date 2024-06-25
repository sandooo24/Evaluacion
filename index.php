<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soporte</title>
    <link rel="stylesheet" type="text/css" href="./login.css">
</head>

<body>
<center><div class="mainbox">
		<form method="post">
			<h1>Inicia Sesión</h1>

			<div class="input-box">
				<input type="number" name="DNI" maxlength="10" placeholder="DNI" required>
				<i class='bx bxs-user'></i>
			</div>
			<div class="input-box">
				<input type="Password" name="Clave" placeholder="Contraseña" required>
				<i class='bx bxs-lock-alt'></i>
			</div>
            <div class="boton">
				<button type="submit" class="btn">Ingresar</button>
			</div>
		</form>
	</center>
</body>
</html>

<?php
    $user=filter_input(INPUT_POST,'DNI');
    $pass=filter_input(INPUT_POST,'Clave');
    
    if(isset($user) &&  isset($pass)){
        if($user==1234 && $pass=="admin"){
            header("Location:admin.php");
        }
        else if($user==2024 && $pass=="cliente"){
            header("Location:cliente.php");
        }
        
    }
?>