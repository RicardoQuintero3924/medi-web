<?php

$host = 'localhost';
$user = 'root';
$password = '';
$db = 'medi_web';

$conection = @mysqli_connect($host, $user, $password, $db);

if(!$conection){
    echo 'Error en la conexion con la DB';
}

/*class Conexion {

    private $conexion;
    private $configuracion = [
        "driver" => "mysql",
        "host" => "localhost",
        "database" => "medi_web",
        "port" => "3306",
        "username" => "root",
        "password" => "",
        "charset" => "utf8mb4"

    ];

    public function __construct()
    {
        
    }

    public function conectar(){
        try {
            $CONTROLADOR = $this->configuracion["driver"];
            $SERVER = $this->configuracion["host"];
            $BASE_DATOS = $this->configuracion["database"];
            $PUERTO = $this->configuracion["port"];
            $USER = $this->configuracion["username"];
            $PASSWORD = $this->configuracion["password"];
            $CODIFICACION = $this->configuracion["charset"];

            $url = "{$CONTROLADOR}:host={$SERVER}:{$PUERTO};dbname={$BASE_DATOS};charset={$CODIFICACION}";
            
            $this->conexion = new PDO($url, $USER, $PASSWORD);
            return $this->conexion;
        
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}*/

?>