      
 <?php
  session_start();
  // $correo = $_POST['correoForm'];
  // echo $correo;
//   if(isset($_SESSION["nombre"])){
//     echo "Gestión de vehículos </br>";
    
//     echo "Nombre del login: " . $_SESSION["nombre"] . "</br>";
//     echo "Correo del login: " . $_SESSION["correo"] . "</br>";
//     echo "Codigo del User: " . $_SESSION["codigo_user"] . "</br>";


// }else{
//     header('Location: http://localhost/gestionvehiculo');
// }
?> 

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <link rel="stylesheet" href="../css/estilos-bitacora.css">
    <title>Registro Vehículos</title>
  </head>
  <body>


    <header>
      <div class="formulario-cerrar-sesion">
        <form action="" method="post">
 
        <input class="boton-cerrar-sesion" type="submit" value="Cerrar Sesión" name="cerrar">
        <?php
          // if(isset($_POST['cerrar'])){
          //   session_start();
          //   session_destroy();
          //   header('Location: http://localhost/gestionvehiculo');
          // }else{
          //   echo "No entró al if de cerrar";
          // }
          require_once('cerrar-sesion.php');
        ?>
        </form>
      </div>
    </header>
    
    <div class="titulo-bitacora">
      <p>Gestión de Vehículos <i class="fas fa-car"></i> </p>

    </div>

    <div class="datos-session">

    <?php


      if(isset($_SESSION["nombre"])){
        // echo "Gestión de vehículos </br>";
         
        echo "<i class='fas fa-user-astronaut'></i> Bienvenid@: " . $_SESSION["nombre"] . "</br>";
        // echo "Correo del login: " . $_SESSION["correo"] . "</br>";
        // echo "Codigo del User: " . $_SESSION["codigo_user"] . "</br>";


      }else{
        header('Location: http://localhost/gestionvehiculo');
      }
    ?>

    </div>

    <div class="datos-salida-entrada">


        <div class="formulario-salida">
          <p>DATOS  DE SALIDA</p>
          <form action="" method="POST">
            <label for="">Placa</label>
            <input class="placa" type="text" name="placa-vehiculo" placeholder="ABC-1234" > 
            
            <label for="">Actividad</label>
            <textarea name="actividad-vehiculo" id="" placeholder="Motivo de salida"></textarea>
            
            <label for="">Km de Salida</label>
            <input class="km-salida" type="number" name="km-salida-vehiculo" placeholder="23254" > 
    
            <br>
            <div class="btn-e-s">
              <input class="boton-e-s"  type="submit" name="boton-salida-vehiculo" value="Enviar" > 

            </div>
    
            <?php
                include_once ("datos-salida.php");
            ?>
    
    
          </form>
        </div>
    
    
        <div class="formulario-llegada">
          <p>DATOS  DE LLEGADA</p>
          <form action="" method="POST">
            
            <label for="">Km de llegada</label>
            <input class="km-llegada" type="number" name="km-llegada-vehiculo" placeholder="23254" > 
            
            <br>
            <label for="">Observación</label>
            <textarea name="observacion-vehiculo" id="" placeholder="Ingrese alguna novedad"></textarea>
    
            <br>
            <div class="btn-e-s">

              <input class="boton-e-s" type="submit" name="boton-llegada-vehiculo" value="Enviar" > 

            </div>
    
            <?php
                include_once ("datos-llegada.php");
              ?>
    
    
          </form>
        </div>


    </div> 


    <div class="consulta-historial">

      <div class="mostrar-datos">

            <form action="" method="post">
            
              <div class="resultado-consulta">
  
                <?php
                  include_once ("consultar-historico.php");
                ?>
  
              </div>
            <div class="container-consulta">

              <input class="boton-consul" type="submit" name="boton-consulta" value="Consultar Historial" > 
              <label for="">Desde:</label>
              <input type="date" name="km-salida-vehiculo"> 
              <label for="">Hasta:</label>
              <input type="date" name="km-llegada-vehiculo"> 
            
            </div>

            </form>
      </div>

    </div>
  </body>
</html>
      