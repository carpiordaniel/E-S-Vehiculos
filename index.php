<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GESTIÓN VEHÍCULOS PG</title>
</head>
<body>

<form action="" method="post">
    <input type="email" name="correoForm" placeholder="Correo ">
    <input type="password" name="passwordForm" placeholder="Contraseña ">
    <!-- <input type="text" name="nombreForm" placeholder="CI: "> -->
    <br>
    <br>
    <input type="submit" name="enviar" value="Ingresar">
    <br>
    <strong>
    <?php include_once("modelo/login.php"); ?>
    
    </strong>

</form>