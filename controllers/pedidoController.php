<?php
    if(!empty($_POST)){
        $action = $_POST['action'];
        
        switch ($action) {
            case 'finPedido':
                    include '../db/Conexion.php';
                    $id = $_POST['id'];
                    $observacion = $_POST['observacion'];
                    $codigo = $_POST['codigo'];
                    if(!$result = mysqli_query($conection, "UPDATE orden_pedidos set 
                    observaciones = '$observacion',
                    estado = 0,
                    entrega = 1,
                    codigo_pedido = '$codigo' 
                    where id_pedido = '$id'")) die();
                    echo 'Pedido finalizado';
                break;
            case 'findById':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                if(!$result = mysqli_query($conection, "SELECT 
                    m.nombre_comercial,
                    m.imagen,
                    om.cantidad,
                    CONCAT(c.nombre, ' ', c.apellido) AS nombre,
                    op.valor_pedido,
                    op.fecha_ped
                FROM medicamentos AS m
                INNER JOIN orden_medicamentos AS om ON om.id_medicamento = m.id_medicamento
                INNER JOIN orden_pedidos AS op ON om.relacion = op.relacion
                INNER JOIN clientes AS c ON c.id_cliente = op.id_cliente
                WHERE op.id_pedido = '$id'
                AND op.estado = 1
                AND op.entrega = 0")) die();
                $i=0;
            
                $data = array();
                
                while($row = mysqli_fetch_array($result))
                {
                    $data[$i] = $row;
                    $i++;
                }
                echo json_encode($data);  
                break;
            case 'findByIdx':
                    include '../db/Conexion.php';
                    $id = $_POST['id'];
                    if(!$result = mysqli_query($conection, "SELECT 
                        m.nombre_comercial,
                        m.imagen,
                        om.cantidad,
                        CONCAT(c.nombre, ' ', c.apellido) AS nombre,
                        op.valor_pedido,
                        op.fecha_ped,
                        op.observaciones
                    FROM medicamentos AS m
                    INNER JOIN orden_medicamentos AS om ON om.id_medicamento = m.id_medicamento
                    INNER JOIN orden_pedidos AS op ON om.relacion = op.relacion
                    INNER JOIN clientes AS c ON c.id_cliente = op.id_cliente
                    WHERE op.id_pedido = '$id'
                    AND op.estado = 0
                    AND op.entrega = 1")) die();
                    $i=0;
                
                    $data = array();
                    
                    while($row = mysqli_fetch_array($result))
                    {
                        $data[$i] = $row;
                        $i++;
                    }
                    echo json_encode($data);  
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
            case 'findAllId':
                include '../db/Conexion.php';

                if(!$result = mysqli_query($conection, "SELECT id_pedido FROM orden_pedidos 
                where estado = 1 AND entrega = 0")) die(); 
                
                $i=0;
                
                $data = array();
                while($row = mysqli_fetch_array($result))
                {
                    $data[$i] = $row;
                    $i++;
                }
                echo json_encode($data);
                break;
            case 'findAllIdx':
                include '../db/Conexion.php';

                if(!$result = mysqli_query($conection, "SELECT codigo_pedido, id_pedido FROM orden_pedidos 
                where estado = 0 AND entrega = 1")) die(); 
                
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
