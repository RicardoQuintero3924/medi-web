<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <title>Listado de empleados</title>
</head>

<body>
    <?php include '../../template/header.php'; ?>
    <div class="container">
        <div style="padding: 20px;">
            <h2 class="text-center">Listado de empleados</h2>
        </div>
        <a href="registro.php" class="btn btn-primary">Agregar</a>
        <table class="table">
            <thead>
                <tr>
                    <th class="">Nombre</th>
                    <th class="">Apellido</th>
                    <th class="">Fecha nacimiento</th>
                    <th class="">Correo</th>
                    <th class="">Tipo empleado</th>
                    <th class="" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody id="tbody"></tbody>
        </table>

        <?php include '../../template/footer.php';  ?>
    </div>

    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="titleModal"></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="bodyModal"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="modificar()" id="btnMod" style="display: none">Modificar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/empleado.js"></script>
    <script>
        $(document).ready(function() {
            listado();
        });
    </script>


</body>

</html>