<?php
    if(!empty($_POST)){
        $action = $_POST['action'];
        
        switch ($action) {
            case 'enOperacion':
                    include '../db/Conexion.php';
                    $id = $_POST['id'];
                    if(!$result = mysqli_query($conection, "UPDATE orden_pedidos set estado_entrega = 0 where id_pedido = '$id'")) die();
                    echo 'Gestionando el domicilio';
                break; 
            case 'fin':
                include '../db/Conexion.php';
                $id = $_POST['id'];
                if(!$result = mysqli_query($conection, "UPDATE orden_pedidos set entrega = 0 where id_pedido = '$id'")) die();
                echo 'Gestionando el domicilio';
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
                	op.id_pedido,
                    CONCAT(c.nombre, ' ', c.apellido) AS nombre,
                    c.direccion,
                    op.valor_pedido + op.valor_domicilio AS valor_domicilio,
                    op.codigo_pedido,
                    op.estado_entrega
                from orden_pedidos AS op
                INNER JOIN clientes AS c ON c.id_cliente = op.id_cliente
                WHERE op.estado = 0
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
            
            default:
                echo 'Error';
                break;
        }
    }
?>