<?php

$conexion = mysqli_connect ("localhost", "root", "");
mysqli_select_db ($conexion, "medi_web");
mysqli_query ($conexion, "SET NAMES 'utf8'");

$user = strip_tags ($_POST['user']);
$mail = strip_tags ($_POST['mail']);
$ape = strip_tags ($_POST['ape'])
$password = sha1 (strip_tags ($_POST['password']));
$r_password = sha1 (strip_tags ($_POST['r_password']));
$password_medir = strip_tags ($_POST['password']);
$tamano = strlen ($password_medir);
$terminos = $_POST['terms'];

if ($tamano < 8){
    echo "La contraseña de tener al menos 8 caracteres";
    die();
}

if ($user == NULL || $mail == NULL || $password == NULL){
    echo "Llene todos los campos";
    die();
}

if ($terminos == NULL) {
    echo "Debe aceptar los terminos y condiciones";
    die();
}

$query1 = "SELECT 'usuario' FROM 'usuarios' WHERE 'usuario' = '$user'";
$consulta = mysqli_query ($conexion, $query1);
$row = mysql_fetch_array ($consulta);

if ($row[0] == $user) {
    echo "Usuario ya registrado";
    die();   
}
else{
    $query2 = "SELECT 'correo' FROM 'usuarios' WHERE 'correo' = '$mail'";
    $consulta2 = mysqli_query ($conexion, $query2);
    $row = mysql_fetch_array ($consulta2);
    
    if ($row[0] == $mail) {
        echo "Correo ya registrado";
        die();
    }
    else {
        if ($password != $r_password) {
            echo "Lo sentimos, sus contraseñas no coinciden";
            die();
        }
        else {
        $query3 = "INSERT INTO 'usuarios' (`usuario`, `password`, `correo`) VALUES ('$user', '$password', '$mail')";
        $consulta3 = mysqli_query ($conexion, $query3);
        }
    }   
}

mysqli_close ($conexion);

?>