<?php
// session_start();

if(isset($_POST['boton-llegada-vehiculo'])){

    if(!empty($_POST['km-llegada-vehiculo']) and !empty($_POST['observacion-vehiculo'])){
        $km_llegada_vehiculo = $_POST['km-llegada-vehiculo'];
        $observacion_vehiculo =$_POST['observacion-vehiculo'];

        require_once("conexion.php");
        $codigo_usuario_sesion = $_SESSION["codigo_user"];

        $consulta_salida = "
        
        select * from bitacora 
        where codigo_usuario = '$codigo_usuario_sesion'
        and (fecha_salida is not null and fecha_llegada is null)
        order by id_bitacora desc
        limit 1
        
        
        ";

        $ejecutar_codigo = mysqli_query($con, $consulta_salida);

        $numero_fila_codigo = mysqli_num_rows($ejecutar_codigo);

        if($numero_fila_codigo ==1){

            $consulta_update = "
            
            UPDATE  bitacora 
            set fecha_llegada = NOW(), km_llegada = $km_llegada_vehiculo, observacion='$observacion_vehiculo' , km_recorrido=$km_llegada_vehiculo
            where codigo_usuario = '$codigo_usuario_sesion'
            and (fecha_salida is not null and fecha_llegada is null)
            order by id_bitacora desc
            limit 1
            ";

            $ejecutar_update = mysqli_query ($con, $consulta_update);

            if($ejecutar_update){
                // echo "Datos insertados correctamente";
                echo "<script> alert('Datos insertados correctamente');</script>";
            }else{
                // echo "Error al insertar los datos";
                echo "<script> alert('Error al insertar los datos');</script>";
            }
        }else{
            // echo "No puede llegar porque no ha salido";
            echo "<script> alert('No puede LLEGAR porque no ha SALIDO');</script>";
            // echo $numero_fila_codigo;
        }
    }else{
        
        // echo "Los campo no puede estar vacio";
        echo "<script> alert('Los campo no puede estar vacio');</script>";
        
    }

}else {

    // echo "No se ha presionado";
}

?>