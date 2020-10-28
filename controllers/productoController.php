<?php
    if(!empty($_POST)){
        $action = $_POST['action'];

        switch ($action) {
            case 'findById':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                if(!$result = mysqli_query($conection, "SELECT nombre_comercial,descripcion,precio,imagen FROM medicamentos WHERE id_categoria = '$id'")) die();
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
                # code...
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