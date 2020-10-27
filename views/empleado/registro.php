<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/w3.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../css/estilos.css" />

    <title>Registro de empleados</title>
</head>

<body>
    <?php include '../../template/header.php'; ?>
    <div class="container">
        <div style="padding: 20px;">
            <h2 class="text-center titulo-list">Registro</h2>
        </div>

        <div class="card" style="width: 50%; margin-left: auto; margin-right: auto; margin-bottom: 2cm;">

            <div class="card-body">
                <div class="form-group">
                    <label for="documento">Documento</label>
                    <input type="text" name="documento" id="documento" placeholder="Documento" class="form-control" />
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Nombre" class="form-control" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="apellido">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Apellido" class="form-control" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="correo">Correo electronico</label>
                        <input type="email" name="correo" id="correo" placeholder="Correo" class="form-control" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="fechaNacimiento">Fecha nacimiento</label>
                        <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" />
                    </div>

                </div>

                <div id="select"></div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="usuario">Usuario</label>
                        <input type="password" name="usuario" id="usuario" placeholder="Usuario" class="form-control" />
                    </div>
                    <div class="form-group col-md-6">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" placeholder="Contraseña" class="form-control" />
                    </div>
                </div>

                <button class="btn btn-list" style="width: 120px;" id="enviar">Enviar</button>
            </div>
        </div>
    </div>

    <?php include '../../template/footer.php';  ?>

    <script src="../../js/jquery.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/empleado.js"></script>

    <script>
        $(document).ready(function() {
            $(".add").css("display", "none");
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