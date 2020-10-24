<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <title>Registro tipo empleado</title>
</head>
<body> 
    <?php include '../../template/header.php';  ?>
    <div class="container">
    
        <h2>Registro tipos de empleados</h2>
        <div class="card" style="width: 50%; margin-left: auto; margin-right: auto;">
            <div class="card-body">
                <div class="form-group">
                    <label for="id">Id</label>
                    <input type="text" class="form-control" id="id" disabled>                              
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <input type="text" class="form-control" id="descripcion">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" id="enviar">Enviar</button>
                </div>

            </div>

        </div>
        <?php include '../../template/footer.php';  ?>
        
    </div>


    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/tipoEmpleado.js"></script>

</body>
</html>