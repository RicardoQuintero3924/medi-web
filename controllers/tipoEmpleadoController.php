<?php
    if(!empty($_POST)){
        $action = $_POST['action'];
        

        switch ($action) {
            case 'delete':
                    include '../db/Conexion.php';
                    $id = $_POST['id'];
                    if(!$result = mysqli_query($conection, "DELETE FROM tipo_empleados WHERE id_tipo_empleado = '$id'")) die();
                    echo 'Tipo empleado eliminado';
                break;
            case 'findById':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                if(!$result = mysqli_query($conection, "SELECT * FROM tipo_empleados WHERE estado = 1 AND id_tipo_empleado = '$id'")) die();
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
                if(!$result = mysqli_query($conection, "UPDATE tipo_empleados SET descripcion = '$descripcion' WHERE id_tipo_empleado = '$id'")) die();
                echo 'Tipo empleado actualizado';
                break;
            case 'insert':
                include '../db/Conexion.php';
                $descripcion = $_POST['descripcion'];
                if(!$result = mysqli_query($conection, "INSERT INTO tipo_empleados(descripcion) VALUES ('$descripcion')")) die();
                echo 'tipo cliente agregado';
            break;
            
            default:
                echo 'Error';
                break;
        }
    }else{
        $action = $_GET['action'];

        switch ($action) {
            case 'findAll':
                require_once '../models/tipoEmpleado.php';
                include '../db/Conexion.php';

                if(!$result = mysqli_query($conection, "SELECT * FROM tipo_empleados WHERE estado = 1")) die(); 
                
                $i=0;
                
                $data = array();
                $tipo = new TipoEmpleado();
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