<?php

$conexion = mysqli_connect ("localhost", "root", "");
mysqli_select_db ($conexion, "medi_web");
mysqli_query ($conexion, "SET NAMES 'utf8'");

$user = strip_tags ($_POST['user']);
$password = strip_tags (sha1($_POST['password']));

$query = "SELECT * FROM 'usuarios' WHERE user = "'.mysqli_real_escape_string ($conexion, $user). '" AND password = "'.mysqli_real_escape_string($conexion, $password) . '"'";
$consulta = mysqly_query ($conexion, $query);

if ($existe = mysqli_fetch_object($consulta)) {
    $query2 = "SELECT * FROM 'usuarios' WHERE 'usuario' = '$user'";
    $consulta2 = mysqli_query ($conexion, $query2);
    $row = mysqli_fetch_array ($consulta2);

    echo $user = $row[0];
    echo "<br>";
    echo "<br>";
    echo $password = $row[1];
    header (Location: "grid.html");
}

mysqli_close ($conexion);

?>