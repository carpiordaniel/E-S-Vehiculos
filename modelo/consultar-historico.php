<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos-bitacora-consulta.css">
    
  </head>

<?php


if(isset($_POST['boton-consulta'])){
    
    require_once("conexion.php");
    $desde = $_POST['km-salida-vehiculo'];
    $hasta= $_POST['km-llegada-vehiculo'];
        // echo "desde " . $desde . " hasta " . $hasta;
 
        echo "
            
        <div class='titulo-tabla'>
            <strong>Nombre </strong>
            <strong>Apellidos</strong>
            <strong>Placa Vehículo</strong>
            <strong>Actividad</strong>
            <strong>Fecha Salida</strong>
            <strong>Km Salida</strong>
            <strong>Fecha Llegada</strong>
            <strong>Km Llegada</strong>
            <strong></strong>
        </div>
        
        ";

    $queryConsulta = "
    select u.nombres, u.apellidos, b.placa_vehiculo, b.actividad, b.fecha_salida, b.km_salida, b.fecha_llegada, b.km_llegada
    from usuarios u inner join bitacora b on u.codigo_usuario= b.codigo_usuario
    where fecha_salida between  '$desde' and '$hasta' order by fecha_salida desc";
    
    $ejecucionConsulta = mysqli_query($con, $queryConsulta);
    
    $numeroFilaConsulta = mysqli_num_rows($ejecucionConsulta);
    
    
    if($numeroFilaConsulta >=1){
        
        if($ejecucionConsulta){
            $j=0;      
            
            while ($fila = mysqli_fetch_array($ejecucionConsulta)){
               
                $nombre = $fila['nombres'];
                $apellidos = $fila['apellidos'];
                $correo = $fila['placa_vehiculo'];
                $actividad = $fila['actividad'];
                
                $fecha_salida = $fila['fecha_salida'];
                $km_salida = $fila['km_salida'];
                $fecha_llegada = $fila['fecha_llegada'];
                $km_llegada = $fila['km_llegada'];
                
                
                $j++;
                // echo $nombre . " || " . $apellidos  . " |" . $correo  . " |" . $actividad 
                // . " " . $fecha_salida . " " . $km_salida . " " . $fecha_llegada . " " . $km_llegada
                
                // . "</br>";

                // echo $nombre . " || " . $apellidos  . " |" . $correo  . " |" . $actividad 
                // . " " . $fecha_salida . " " . $km_salida . " " . $fecha_llegada . " " . $km_llegada
                
                // . "</br>";

                echo "
            
                <div class='contenido-tabla'>
                    <strong>$nombre </strong>
                    <strong>$apellidos</strong>
                    <strong>$correo</strong>
                    <strong>$actividad</strong>
                    <strong>$fecha_salida</strong>
                    <strong>$km_salida</strong>
                    <strong>$fecha_llegada</strong>
                    <strong>$km_llegada</strong>
                    <strong></strong>
                </div>
                
                ";
                
            }   

        }
    }else{
        
            $queryConsulta = "
            select u.nombres, u.apellidos, b.placa_vehiculo, b.actividad, b.fecha_salida, b.km_salida, b.fecha_llegada, b.km_llegada
            from usuarios u inner join bitacora b on u.codigo_usuario=b.codigo_usuario
            order by fecha_salida desc limit 150 ";
            
            $ejecucionConsulta = mysqli_query($con, $queryConsulta);
            $j=0;
            while ($fila = mysqli_fetch_array($ejecucionConsulta)){
               
                $nombre = $fila['nombres'];
                $apellidos = $fila['apellidos'];
                $correo = $fila['placa_vehiculo'];
                $actividad = $fila['actividad'];
                
                $fecha_salida = $fila['fecha_salida'];
                $km_salida = $fila['km_salida'];
                $fecha_llegada = $fila['fecha_llegada'];
                $km_llegada = $fila['km_llegada'];
                
                
                $j++;
                // echo $nombre . " || " . $apellidos  . " |" . $correo  . " |" . $actividad 
                // . " " . $fecha_salida . " " . $km_salida . " " . $fecha_llegada . " " . $km_llegada
                
                // . "</br>";

                echo "
            
                <div class='contenido-tabla'>
                    <strong>$nombre </strong>
                    <strong>$apellidos</strong>
                    <strong>$correo</strong>
                    <strong>$actividad</strong>
                    <strong>$fecha_salida</strong>
                    <strong>$km_salida</strong>
                    <strong>$fecha_llegada</strong>
                    <strong>$km_llegada</strong>
                    <strong></strong>
                </div>
                
                ";
                
            }
    }

}else{
    // echo "";
}


?>