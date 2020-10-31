<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/estilos.css" />
    <link rel="stylesheet" href="../../css/w3.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <title>Panel domiciliario</title>

</head>

<body>
    <?php include '../../template/header.php';  ?>
    <div class="container">
        <div style="padding: 20px;">
            <h2 class="text-center titulo-list">Listado de domicilios</h2>
        </div>
        <table class="table" style="width: 80%; margin-right: auto; margin-left: auto; margin-bottom: 2cm;">
            <thead>
                <tr>
                    <th class="titulo-tabla-list">Cliente</th>
                    <th class="titulo-tabla-list">Dirección</th>
                    <th class="titulo-tabla-list">Valor domicilio</th>
                    <th class="titulo-tabla-list">Código domicilio</th>
                    <th class="titulo-tabla-list" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>
    <?php include '../../template/footer.php';  ?>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="titleModal"></h4>
                </div>
                <div class="modal-body">
                    <div id="bodyModal"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-list" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-list" onclick="modificar()" id="btnMod" style="display: none">Modificar</button>
                </div>
            </div>
        </div>
    </div>


    <script src="../../js/jquery.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/domicilio.js"></script>
        <script>
        $(document).ready(function() {
            $(".list").css("display", "none");
            $(".add").css("display", "none");
            $(".home").css("display", "none");
            listado();
        });
    </script>
</body>

</html>