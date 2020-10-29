<?php
    if(!empty($_POST)){
        $action = $_POST['action'];
        
        switch ($action) {
            case 'delete':
                    include '../db/Conexion.php';
                    $id = $_POST['id'];
                    if(!$result = mysqli_query($conection, "UPDATE medicamentos set estado = 0 where id_medicamento = '$id'")) die();
                    echo 'Medicamento inhabilitado';
                break;
            case 'findById':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                if(!$result = mysqli_query($conection, "SELECT
                    m.id_medicamento,
                    m.nombre_comercial, 
                    m.nombre_generico,
                    m.descripcion,
                    m.precio,
                    m.imagen,
                    m.fecha_vencimiento,
                    f.nombre AS farmacia,
                    l.descripcion AS laboratorio,
                    m.stock,
                    c.descripcion AS categoria,
                    m.id_farmacia,
                    m.id_laboratorio,
                    m.id_categoria
                    FROM medicamentos AS m
                    INNER JOIN farmacias AS f ON f.id_farmacia = m.id_farmacia
                    INNER JOIN laboratorios AS l ON l.id_laboratorio = m.id_laboratorio
                    INNER JOIN categorias AS c ON c.id_categoria = m.id_categoria
                    WHERE m.id_medicamento = '$id'
                    AND m.estado = 1")) die();
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
                $nombreComercial = $_POST['nombreComercial'];
                $nombreGenerico = $_POST['nombreGenerico'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $fechaVencimiento = $_POST['fechaVencimiento'];
                $farmacia = $_POST['farmacia'];
                $laboratorio = $_POST['laboratorio'];
                $stock = $_POST['stock'];
                $categoria = $_POST['categoria'];
                if(!$result = mysqli_query($conection, "UPDATE medicamentos 
                SET nombre_comercial = '$nombreComercial',
                nombre_generico = '$nombreGenerico',
                descripcion = '$descripcion',
                precio = '$precio',
                fecha_vencimiento = '$fechaVencimiento',
                id_farmacia = '$farmacia',
                id_laboratorio = '$laboratorio',
                stock = '$stock',
                id_categoria = '$categoria'
                WHERE id_medicamento = '$id'")) die();
                echo 'Medicamento actualizado';
                break;
            case 'insert':
                include '../db/Conexion.php';
                $nombreComercial = $_POST['nombreComercial'];
                $nombreGenerico = $_POST['nombreGenerico'];
                $descripcion = $_POST['descripcion'];
                $precio = $_POST['precio'];
                $fechaVencimiento = $_POST['fechaVencimiento'];
                $farmacia = $_POST['farmacia'];
                $laboratorio = $_POST['laboratorio'];
                $stock = $_POST['stock'];
                $categoria = $_POST['categoria'];
                if(!$result = mysqli_query($conection, "INSERT INTO 
                medicamentos(nombre_comercial, nombre_generico, descripcion, precio, fecha_vencimiento, 
                id_farmacia, id_laboratorio, stock, id_categoria) VALUES ('$nombreComercial', '$nombreGenerico', '$descripcion', 
                '$precio', '$fechaVencimiento', '$farmacia', '$laboratorio', '$stock', 
                '$categoria')")) die();
                
                echo 'Medicamento agregado';
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

                if(!$result = mysqli_query($conection, "SELECT
                    m.id_medicamento,
                    m.nombre_comercial, 
                    m.nombre_generico,
                    m.precio, 
                    m.fecha_vencimiento,
                    f.nombre AS farmacia,
                    l.descripcion AS laboratorio,
                    m.stock,
                    c.descripcion AS categoria
                    FROM medicamentos AS m
                    INNER JOIN farmacias AS f ON f.id_farmacia = m.id_farmacia
                    INNER JOIN laboratorios AS l ON l.id_laboratorio = m.id_laboratorio
                    INNER JOIN categorias AS c ON c.id_categoria = m.id_categoria
                    WHERE m.estado = 1")) die(); 
                
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