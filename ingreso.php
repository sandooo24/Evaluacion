<?php include 'header_user.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Ingreso</title>
</head>
<body>
    <section class="menu">   
        <form action="ingreso_base.php" method="post" class="form">
            <h1 style="text-align: center; padding: 10px 0px;">Crear Reporte</h1>
            <label for="">Nombre</label>
            <input type="text" name="nombre" placeholder="Ingrese su nombre" required>
            <label>Tipo de problema</label>
            <input type="text" name="tipo" list="info" required>
            <datalist id="info">
                <option value="Computadora"></option>
                <option value="Impresora"></option>
                <option value="Luz"></option>
                <option value="Gas"></option>
                <option value="Electrico"></option>
            </datalist>
            <label for="">Fecha de lo sucedido</label>
            <input type="date" name="fecha" value="<?= date("Y-m-d") ?>" required>
            <label>Descripcion del problema</label><br>
            <textarea name="descripcion" placeholder="escribe aqui..." required></textarea>
            <br>
            <input type="submit" value="Enviar" class="form-s"> 
        </form>
    </section>
</body>
</html>