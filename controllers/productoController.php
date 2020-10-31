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
        case 'findByIdStockxMedi':
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


        case 'selectOrdenMedi':
            include '../db/Conexion.php';
            $codigo = $_POST['codigo'];

            if (!$result = mysqli_query($conection, "SELECT 
                    m.nombre_comercial AS nombre, 
                    m.precio, 
                    om.cantidad  
                    FROM orden_medicamentos AS om
                    INNER JOIN medicamentos AS m ON m.id_medicamento = om.id_medicamento
                    WHERE om.relacion = '$codigo'")) die();

            $i = 0;

            $data = array();
            while ($row = mysqli_fetch_array($result)) {
                $data[$i] = $row;
                $i++;
            }
            echo json_encode($data);
            break;

        case 'carrito':
            $arr = $_POST['array'];
            $i = 0;

            $data = array();
            while ($row = mysqli_fetch_array($arr)) {
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

                if (!$result1 = mysqli_query($conection, "UPDATE
                    medicamentos SET stock = stock - '$cantidad' WHERE id_medicamento = '$id'")) die();
    
                echo 'OK';
                break;
            case 'insertCliente':
                    include '../db/Conexion.php';
                    
                    $codigo = $_POST['codigo'];
                    $nombre = $_POST['nombre'];
                    $apellido = $_POST['apellido'];
                    $correo = $_POST['correo'];
                    $fecha = $_POST['fecha'];
                    $direccion = $_POST['direccion'];
    
                    if (!$result2 = mysqli_query($conection, "INSERT INTO clientes (nombre, apellido, correo_electronico,
                    fecha_nacimiento, direccion, codigo) VALUES
                    ('$nombre', '$apellido', '$correo', '$fecha', '$direccion', '$codigo')")) die();
        
                    echo 'OK';
                    break;
            case 'insertPedido':
                    include '../db/Conexion.php';
                    $valorPedido = $_POST['valorPedido'];
                    $codigo = $_POST['codigo'];
        
                    if (!$result = mysqli_query($conection, "INSERT INTO orden_pedidos (valor_pedido, relacion, fecha_ped, cod_cliente)
                        VALUES('$valorPedido', '$codigo', NOW(), '$codigo')")) die();
    
                    echo 'Pedido realizado con exito!!';
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
