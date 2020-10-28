<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/estilos.css" />
    <link rel="stylesheet" href="../../css/w3.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <title>Empleados</title>
</head>

<body>
<?php  include '../../template/header.php' ?>
    <div class="container">
        <div style="padding: 20px;">
            <h2 class="text-center titulo-list">Listado de empleados</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="titulo-tabla-list">Nombre</th>
                    <th class="titulo-tabla-list">Apellido</th>
                    <th class="titulo-tabla-list">Fecha nacimiento</th>
                    <th class="titulo-tabla-list">Correo</th>
                    <th class="titulo-tabla-list">Tipo empleado</th>
                    <th class="titulo-tabla-list" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>
    </div>

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

    <?php include '../../template/footer.php';  ?>

    <script src="../../js/jquery.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <script src="../../js/empleado.js"></script>
    <script>
        $(document).ready(function() {
            $(".list").css("display", "none");
            listado();
        });
    </script>
</body>

</html>