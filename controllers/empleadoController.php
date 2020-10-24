<?php
if (!empty($_POST)) {
    $action = $_POST['action'];


    switch ($action) {
        case 'delete':
            include '../db/Conexion.php';
            $id = $_POST['id'];
            if (!$result = mysqli_query($conection, "DELETE FROM empleados WHERE id_empleado = '$id'")) die();
            echo 'Empleado eliminado';
            break;
        case 'findById':
            include '../db/Conexion.php';
            $id = $_POST['id'];
            if (!$result = mysqli_query($conection, "SELECT 
                e.id_empleado, 
                e.nombre, 
                e.apellido, 
                e.fecha_nacimiento, 
                e.correo_electronico,
                te.descripcion as tipoEmpleado,
                te.id_tipo_empleado
              FROM empleados AS e
              INNER JOIN tipo_empleados AS te ON te.id_tipo_empleado = e.tipo_empleado
              WHERE e.estado = 1
              AND e.id_empleado = '$id'")) die();
            $i = 0;

            $data = array();

            while ($row = mysqli_fetch_array($result)) {
                $data[$i] = $row;
                $i++;
            }
            echo json_encode($data);

            break;
        case 'update':
            include '../db/Conexion.php';
            $id = $_POST['id_empleado'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $fecha = $_POST['fecha'];
            $tipoEmpleado = $_POST['tipo_empleado'];
            if (!$result = mysqli_query($conection, "UPDATE
                empleados SET nombre = '$nombre', apellido = '$apellido', correo_electronico = '$correo', 
                fecha_nacimiento = '$fecha', tipo_empleado = '$tipoEmpleado' WHERE  id_empleado = '$id'
            ")) die();
            echo 'Tipo empleado actualizado';
            break;
        case 'insert':
            include '../db/Conexion.php';
            $documento = $_POST['documento'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $fecha = $_POST['fecha'];
            $tipoEmpleado = $_POST['tipoEmpleado'];
            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];

            if (!$result = mysqli_query($conection, "INSERT INTO 
                empleados (documento, nombre, apellido, fecha_nacimiento, correo_electronico, tipo_empleado) VALUES
                ('$documento' ,'$nombre', '$apellido', '$fecha', '$correo', '$tipoEmpleado')
            ")) die();

            if (!$result1 = mysqli_query($conection, "INSERT INTO 
                usuarios (usuario, contrasena, tipo_usuario, subtipo_usuario, documento) VALUES
                ('$usuario', '$contrasena', 2, '$tipoEmpleado', '$documento')
            ")) die();

            echo 'tipo cliente agregado';
            break;
        case 'insertUsuario':

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

            if (!$result = mysqli_query($conection, "SELECT 
                    e.id_empleado, 
                    e.nombre, 
                    e.apellido, 
                    e.fecha_nacimiento, 
                    e.correo_electronico,
                    te.descripcion as tipoEmpleado
                FROM empleados AS e
                INNER JOIN tipo_empleados AS te ON te.id_tipo_empleado = e.tipo_empleado WHERE e.estado = 1")) die();

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
