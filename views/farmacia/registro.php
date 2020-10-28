<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/w3.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../css/estilos.css" />
    <title>Registro farmacia</title>
</head>

<body>
    <?php include '../../template/header.php';  ?>
    <div class="container">

        <div style="padding: 20px;">
            <h2 class="text-center titulo-list">Registro</h2>
        </div>
        <div class="card" style="width: 50%; margin-left: auto; margin-right: auto;">
            <div class="card-body">
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion">
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección</label>
                    <input type="text" class="form-control" id="direccion">
                </div>
                <div class="form-group">
                    <button class="btn btn-list" style="width: 120px;" id="enviar">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../template/footer.php';  ?>


    <script src="../../js/jquery.js"></script>
    <script src="../../js/farmacia.js"></script>

    <script>
        $(document).ready(function() {
            $(".add").css("display", "none");
        });
    </script>

</body>

</html>