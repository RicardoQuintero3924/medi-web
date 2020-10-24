<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <title>Listado de tipos de empleados</title>
    
</head>

<body>
    <?php include '../../template/header.php';  ?>      
    <div class="container">
        <h2>Listado de tipos de empleados</h2>
        <a class="btn btn-primary" href="registro.php">Agregar</a>
        <div id="tabla"></div>
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
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/tipoEmpleado.js"></script>
</body>
</html>