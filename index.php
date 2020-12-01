<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos-index.css">
    <title> GESTIÓN VEHÍCULOS PG</title>
</head>
<body>

    <div class="container">
        
        <div class="formulario-login">
    
            <form action="" method="post">
                <div class="img-login">
                    <img src="img/login.png" alt="">
                </div>
                <input type="email" name="correoForm" placeholder=" Correo ">
                <input type="password" name="passwordForm" placeholder=" Contraseña ">
                <!-- <input type="text" name="nombreForm" placeholder="CI: "> -->
              
                <input class="boton-login" type="submit" name="enviar" value="Ingresar">
             
                <p>
                <?php include_once("modelo/login.php"); ?>
                
                </p>
            
            </form>
    
        </div>

    </div>

      
</body>
</html>