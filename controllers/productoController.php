<?php
if (!empty($_POST)) {
    $action = $_POST['action'];

    switch ($action) {
        case 'findById':
            include '../db/Conexion.php';
            $id = $_POST['id'];
            if (!$result = mysqli_query($conection, "SELECT id_medicamento,nombre_comercial,descripcion,precio,imagen FROM medicamentos WHERE id_categoria = '$id'")) die();
            $i = 0;

            $data = array();

            while ($row = mysqli_fetch_array($result)) {
                $data[$i] = $row;
                $i++;
            }
            echo json_encode($data);
            break;
        case 'insert':
            include '../db/Conexion.php';
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];
            $codigo = $_POST['codigo'];
            if (!$result = mysqli_query($conection, "INSERT INTO orden_medicamentos (id_medicamento, cantidad, relacion)
                VALUES('$id', '$cantidad', '$codigo')")) die();
            
            echo $codigo;
            break;
        case 'findByIdxMedi':
            include '../db/Conexion.php';
            $id = $_POST['id'];
            if (!$result = mysqli_query($conection, "SELECT stock FROM medicamentos WHERE id_medicamento = '$id'")) die();
            $i = 0;

            $data = array();

            while ($row = mysqli_fetch_array($result)) {
                $data[$i] = $row;
                $i++;
            }
            echo json_encode($data);
            break;
        case 'updateStock':
            include '../db/Conexion.php';
            $id = $_POST['id'];
            $cantidad = $_POST['cantidad'];
            if (!$result = mysqli_query($conection, "UPDATE
                    medicamentos SET stock = stock - '$cantidad' WHERE  id_medicamento = '$id'")) die();
            echo true;
            break;



        default:
            echo 'Error';
            break;
    }
} else {
    $action = $_GET['action'];

    switch ($action) {
        case 'findAll':
            include '../db/Conexion.php';

            if (!$result = mysqli_query($conection, "SELECT * FROM categorias WHERE estado = 1")) die();

            $i = 0;

            $data = array();
            while ($row = mysqli_fetch_array($result)) {
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
