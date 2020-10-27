<?php
    if(!empty($_POST)){
        $action = $_POST['action'];
        
        switch ($action) {
            case 'delete':
                    include '../db/Conexion.php';
                    $id = $_POST['id'];
                    if(!$result = mysqli_query($conection, "UPDATE categorias set estado = 0 where id_categoria = '$id'")) die();
                    echo 'Categoría inhabilitada';
                break;
            case 'findById':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                if(!$result = mysqli_query($conection, "SELECT * FROM categorias WHERE estado = 1 AND id_categoria = '$id'")) die();
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
                $descripcion = $_POST['descripcion']; 
                if(!$result = mysqli_query($conection, "UPDATE categorias SET descripcion = '$descripcion' WHERE id_categoria = '$id'")) die();
                echo 'Categoría actualizada';
                break;
            case 'insert':
                include '../db/Conexion.php';
                $descripcion = $_POST['descripcion'];
                if(!$result = mysqli_query($conection, "INSERT INTO categorias(descripcion) VALUES ('$descripcion')")) die();
                echo 'Categoría agregada';
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

                if(!$result = mysqli_query($conection, "SELECT * FROM categorias WHERE estado = 1")) die(); 
                
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