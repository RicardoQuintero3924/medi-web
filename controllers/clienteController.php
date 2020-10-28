<?php
    if(!empty($_POST)){
        $action =  $_POST['action'];   

        switch ($action) {
            case 'insert':
                include '../db/Conexion.php';
    
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $correo = $_POST['correoElectronico'];
                $fechaNacimiento = $_POST['fechaNacimiento'];
                $direccion = $_POST['direccion'];
                $contrasena = $_POST['contrasena'];

               $query = mysqli_query($conection, "SELECT * FROM clientes WHERE correo_electronico = '$correo'");
                $result = mysqli_fetch_array($query);
                if($result > 0){
                    echo 'Cliente ya registrado';
                    die();
                }else{
                    $query_insert = mysqli_query($conection, "INSERT INTO clientes(nombre, apellido, correo_electronico, fecha_nacimiento,
                    direccion, contrasena)VALUES('$nombre', '$apellido', '$correo', '$fechaNacimiento',
                    '$direccion', '$contrasena')");
                    if($query_insert){
                        echo 'Cliente registrado';
                    }else{
                        echo 'Error al registrar cliente';
                    }
                }
                
                break;
            
            default:
                echo 'Error al registrar cliente';
                break;
        }
    
    }else{
        echo 'GET';
    }

    

?>