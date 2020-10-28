<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    



    <title>Document</title>
    <style>
        .btn-header {
            font-size: 16px;
            padding: 10px;
        }

        .btn-header:hover {
            text-decoration: none;
            border: 1px solid #53a6d5;
            color: #53a6d5;
        }

        .logout {
            background-color: #53a6d5;
            color: White; 
            font-weight: bold;
        }

        .logout:hover {
            background-color: #68a6d5;
            color: White; 
            font-weight: bold;
        }
    </style>

</head>

<body>
    <header>
        <div class=" w3-border w3-large" style="padding: 20px;">
            <a href="../home/administracion.php" class="w3-bar-item"><img width="150" src="../../images/logo.png" /></a>
            <a href="#" class="w3-bar-item w3-right mt-2 mr-5 btn-header logout">Cerrar Sesión</a>

            <a href="../home/administracion.php" class="w3-bar-item w3-right mt-2 mr-5 btn-header home">Inicio <i class="fa fa-home"></i></a>
            <a href="registro.php" class="w3-bar-item w3-right mt-2 mr-5 btn-header add">Agregar <i class="fa fa-plus"></i></a>
            <a href="listado.php" class="w3-bar-item w3-right mt-2 mr-5 btn-header list">Listado <i class="fa fa-list"></i></a>

        </div>

    </header>
</body>

</html>