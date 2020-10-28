<?php
    if(!empty($_POST)){
        $action = $_POST['action'];
        
        switch ($action) {
            case 'delete':
                    include '../db/Conexion.php';
                    $id = $_POST['id'];
                    if(!$result = mysqli_query($conection, "UPDATE farmacias set estado = 0 where id_farmacia = '$id'")) die();
                    echo 'Farmacia inhabilitada';
                break;
            case 'findById':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                if(!$result = mysqli_query($conection, "SELECT * FROM farmacias WHERE estado = 1 AND id_farmacia = '$id'")) die();
                $i=0;
            
                $data = array();
                
                while($row = mysqli_fetch_array($result))
                {
                    $data[$i] = $row;
                    $i++;
                }
                echo json_encode($data);  
                break;
            case 'update':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $direccion = $_POST['direccion'];
                if(!$result = mysqli_query($conection, "UPDATE farmacias SET nombre = '$nombre' ,descripcion = '$descripcion', direccion = '$direccion' WHERE id_farmacia = '$id'")) die();
                echo 'Farmacia actualizada';
                break;
            case 'insert':
                include '../db/Conexion.php';
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $direccion = $_POST['direccion'];
                if(!$result = mysqli_query($conection, "INSERT INTO farmacias(nombre, descripcion, direccion) VALUES ('$nombre' ,'$descripcion', '$direccion')")) die();
                echo 'Farmacia agregada';
            break;
            
            default:
                echo 'Error';
                break;
        }
    }else{
        $action = $_GET['action'];

        switch ($action) {
            case 'findAll':
                include '../db/Conexion.php';

                if(!$result = mysqli_query($conection, "SELECT * FROM farmacias WHERE estado = 1")) die(); 
                
                $i=0;
                
                $data = array();
                while($row = mysqli_fetch_array($result))
                {
                    $data[$i] = $row;
                    $i++;
                }
                echo json_encode($data);
                break;
            
            default:
                echo 'Error';
                break;
        }
    }


   
?>