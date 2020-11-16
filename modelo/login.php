<?php

if((isset($_POST['enviar']))){

    if(!empty($_POST['correoForm']) &&  !empty($_POST['passwordForm'])){

        require_once("conexion.php");
        
        $correoForm = $_POST['correoForm'];
        $passwordForm = $_POST['passwordForm'];
        // $nombreForm = $_POST['nombreForm'];

        // $server = "localhost";
        // $userHost = "prirodadmin";
        // $passHost = "masterkey";
        // $dbHost = "gestionvehiculos";
    
        // $con = mysqli_connect($server, $userHost, $passHost, $dbHost) or die ("Error al conectar...");

        $query = "SELECT * FROM usuarios where (correo = '$correoForm') and (contrasenia = '$passwordForm')";
        $ejecutar = mysqli_query($con,$query);
            
        $numeroFilas=mysqli_num_rows($ejecutar);

            if($numeroFilas >=1){
                echo "Hay registros";

                // echo $correoForm . " " . $passwordForm;
                if($ejecutar){
                
                 // header ('location: bitacora.php');
                    echo "Bienvenido";
                    header('Location: http://localhost/gestionvehiculo/modelo/bitacora.php');
                    // $i=0;
    
                    // while($fila = mysqli_fetch_array($ejecutar)){
                    //     $id = $fila['codigo_usuario'];
                    //     $nombre = $fila['nombres'];
                    //     $apellidos = $fila['apellidos'];
                    //     $correo = $fila['correo'];
                    //     $contrasenia = $fila['contrasenia'];
                    //     $i++;
                    //  echo $id . " " . $nombre. " " . $correo. " " . $contrasenia;
                    //}
                }
                else{
                    echo "Redirigir al index";
                }
            }else{
                echo "Usuario o contraseña no válidos";
            }

            // if($ejecutar){
            //     echo "Insertado correcto";
            //     $i=0;
            //     while($fila = mysqli_fetch_array($ejecutar)){
            //         $id = $fila['codigo_usuario'];
            //         $nombre = $fila['nombres'];
            //         $apellidos = $fila['apellidos'];
            //         $correo = $fila['correo'];
            //         $contrasenia = $fila['contrasenia'];
            //         $i++;
            //      echo $id . " " . $nombre. " " . $correo. " " . $contrasenia;
            //     }
            // }else{
            //     echo "No hay registros";
            // }
    }else{
        // header ('location: ../index.php');
        echo " Error: los campos estan vacios";   
    }
}


?>