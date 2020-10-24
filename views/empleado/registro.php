<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">

    <title>Registro de clientes</title>
</head>

<body>
    <?php include '../../template/header.php'; ?>
    <div class="container">
        <h2>Registro de empelados</h2>
        <div class="card" style="width: 50%; margin-left: auto; margin-right: auto;">

            <div class="card-body">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="text" name="documento" id="documento" placeholder="Documento" class="form-control" />
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="correo">Correo electronico</label>
                    <input type="email" name="correo" id="correo" placeholder="Correo" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="fechaNacimiento">Fecha nacimiento</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" />
                </div>
                <div id="select"></div>

                <div class="form-group">
                    <label for="usuario">Usuario</label>
                    <input type="password" name="usuario" id="usuario" placeholder="Ssuario" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="contrasena">Contraseña</label>
                    <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="form-control" />
                </div>
                <button class="btn btn-primary" id="enviar">Enviar</button>
            </div>
        </div>




        <?php include '../../template/footer.php';  ?>

    </div>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/empleado.js"></script>

    <script>
        $(document).ready(function() {
            $.ajax({
                type: 'GET',
                url: '../../controllers/tipoEmpleadoController.php',
                data: 'action=findAll',
                success: function(data) {
                    debugger;
                    let result = JSON.parse(data);
                    let code = "";
                    code += `<div class="form-group">
                                    <label for="tipoEmpleado">Tipo empleado</label>
                                    <select class="form-control" id="tipoEmpleado">`;
                    for (let i = 0; i < result.length; i++) {
                        code += `<option value="${result[i].id_tipo_empleado}">${result[i].descripcion}</option>`;

                    }
                    code += `</select></div>`;
                    $("#select").html(code);
                },
                error: function() {
                    alert("Error");
                }
            });
        });
    </script>

</body>

</html>