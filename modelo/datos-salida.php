<?php

    if(isset($_POST['boton-salida-vehiculo'])){
        
        $placa = $_POST['placa-vehiculo'];
        // $vehiculo = $_POST['nombre-vehiculo'];
        $actividad = $_POST['actividad-vehiculo'];
        $km_salida = $_POST['km-salida-vehiculo'];
        
            if(!empty($_POST['placa-vehiculo'])  
            &&  !empty($_POST['actividad-vehiculo']) &&  !empty($_POST['km-salida-vehiculo']))
            {

                if( strlen($placa) != 8){
                    echo "<script> alert('La placa debe tener 8 caracteres') </script>";

                }else{
                    // echo "<script> alert('La placa CORRECTA') </script>";
                    
                $nombre = $_SESSION["nombre"];
                $codigo_usuario_session = $_SESSION["codigo_user"];

                require_once('conexion.php');
            
                $consulta_fecha = "
                
                select * from bitacora
                where codigo_usuario = '$codigo_usuario_session' 
                and (fecha_salida is null or fecha_llegada is null) 
                order by id_bitacora desc
                limit 1  ";

                $ejecutar_codigo = mysqli_query($con, $consulta_fecha);

                $numero_filas_codigo = mysqli_num_rows($ejecutar_codigo);
                // echo  "Numero de filas".$numero_filas_codigo . "Codigo usuarios" . $codigo_usuario_session;

                if($numero_filas_codigo === 0){
                    // echo "Puede salir";
                    echo $numero_filas_codigo;
                    $consulta = "
                    INSERT INTO bitacora 
                    (placa_vehiculo, conductor, actividad, fecha_salida, km_salida, codigo_usuario) 
                    values ( '$placa' , '$nombre',  '$actividad' , NOW() , $km_salida ,'$codigo_usuario_session')
                    ";


                    $ejecutar = mysqli_query($con, $consulta);
                        
                        if($ejecutar){
                            // echo "VEHÍCULO REGISTRADO CORRECTAMENTE";
                            echo "<script> alert('Registrado con éxito');</script>";
                        }else{
                            // echo "ERROR AL INGRESAR EL VEHÍCULO";
                            echo "<script> alert('Error al insgresar los datos');</script>";
                        }

                }else{
                    // echo "No puede salir porque no ha llegado";
                    echo "<script> alert('No puede SALIR porque no ha llegado');</script>";
                    // echo $numero_filas_codigo;
                }




                }

                
                // $nombre = $_SESSION["nombre"];
                // $codigo_usuario_session = $_SESSION["codigo_user"];

                // require_once('conexion.php');
            
                // $consulta_fecha = "
                
                // select * from bitacora
                // where codigo_usuario = '$codigo_usuario_session' 
                // and (fecha_salida is null or fecha_llegada is null) 
                // order by id_bitacora desc
                // limit 1  ";

                // $ejecutar_codigo = mysqli_query($con, $consulta_fecha);

                // $numero_filas_codigo = mysqli_num_rows($ejecutar_codigo);
                // // echo  "Numero de filas".$numero_filas_codigo . "Codigo usuarios" . $codigo_usuario_session;

                // if($numero_filas_codigo === 0){
                //     // echo "Puede salir";
                //     echo $numero_filas_codigo;
                //     $consulta = "
                //     INSERT INTO bitacora 
                //     (placa_vehiculo, conductor, actividad, fecha_salida, km_salida, codigo_usuario) 
                //     values ( '$placa' , '$nombre',  '$actividad' , NOW() , $km_salida ,'$codigo_usuario_session')
                //     ";


                //     $ejecutar = mysqli_query($con, $consulta);
                        
                //         if($ejecutar){
                //             // echo "VEHÍCULO REGISTRADO CORRECTAMENTE";
                //             echo "<script> alert('Registrado con éxito');</script>";
                //         }else{
                //             // echo "ERROR AL INGRESAR EL VEHÍCULO";
                //             echo "<script> alert('Error al insgresar los datos');</script>";
                //         }

                // }else{
                //     // echo "No puede salir porque no ha llegado";
                //     echo "<script> alert('No puede SALIR porque no ha llegado');</script>";
                //     // echo $numero_filas_codigo;
                // }

            }else{
                // echo "Los campos no pueden estar vacios";
                echo "<script> alert('Los campos no pueden estar vacios');</script>";
            }

    }else{
        // echo "no se presionó";

    }

    function validaPlaca($placa){
        if( strlen($placa) == 7){
            echo "correcto";
        }else{
            echo "<script> alert('La placa debe tener 8 caracteres') </script>";

        }
    }





?>