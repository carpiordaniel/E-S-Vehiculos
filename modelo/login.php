<?php

if((isset($_POST['enviar']))){

    if(!empty($_POST['correoForm']) &&  !empty($_POST['passwordForm'])){

        require_once("conexion.php");
        
        $correoForm = $_POST['correoForm'];
        $passwordForm = $_POST['passwordForm'];
        
        $query = "
        SELECT * FROM usuarios where (correo = '$correoForm') and (contrasenia = '$passwordForm')";
        $ejecutar = mysqli_query($con,$query);
            
        $numeroFilas=mysqli_num_rows($ejecutar);

            if($numeroFilas =1){
                // echo "Hay registros";

                // echo $correoForm . " " . $passwordForm;
                if($ejecutar){
                 // header ('location: bitacora.php');
                    // echo "Bienvenido";
                    session_start();

                    $correo = $_POST['correoForm'];

                    echo $correo;
                    $_SESSION["correo"]= $correo;
                    
                    if(isset($_SESSION["correo"])){

                        $i=0;
        
                        while($fila = mysqli_fetch_array($ejecutar)){
                    
                            $nombre = $fila['nombres'];

                            $codigo_usuario = $fila['codigo_usuario'];

                            $i++;

                            echo  " " . $nombre;
                        }
                    $_SESSION["nombre"]= $nombre;
                    $_SESSION["codigo_user"] = $codigo_usuario;

                        header('Location: http://localhost/gestionvehiculo/modelo/bitacora.php');
                    }else{
                        header('Location: http://localhost/gestionvehiculo');

                    }

                }
                else{
                    echo "Redirigir al index";
                }
            }else{
                // echo "Usuario o contraseña no válidos";
                echo "<script> alert('Usuario o contraseña no válidos');</script>";
            }

    }else{
        // header ('location: ../index.php');
        // echo " Error: los campos estan vacios";   
        echo "<script> alert('Los campos estan vacios');</script>";
    }
}


?>