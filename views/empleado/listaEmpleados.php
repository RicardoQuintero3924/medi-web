<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/materialdesignicons.min.css">
    <title>Lista de empleados</title>

    <style>
        .botones {
            border-radius: 8px;
            background-color: #01316D;
            color: #ffffff;
            transition: transform .2s;
        }

        th {
            color: #01316D;
        }

        .botones:hover {
            background-color: #0056C1;
            transform: scale(1.1);
        }

        html {
            min-height: 100%;
            position: relative;
        }

        footer {
            position: absolute;
            bottom: 0;
            color: black;
            font-size: 14px;
        }

        nav {
            background-color: #01316D;
        }

        a {
            color: #ffffff;
        }
        .row {
            padding: 5px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-sm">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Link 1</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 2</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link 3</a>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div style="padding: 20px;">
            <h2 class="text-center">Listado de empleados</h2>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Apellido</th>
                    <th class="text-center">Fecha nacimiento</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">Tipo empleado</th>
                    <th class="text-center">Estado</th>
                    <th class="text-center" colspan="3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Prueba</td>
                    <td>Yepes Arena</td>
                    <td>16/10/2020</td>
                    <td>ana.yepes@gmail.com</td>
                    <td>Farmaceuto</td>
                    <td>Activo</td>
                    <td><button class="botones" onclick="consultar(1)">Consultar</button></td>
                    <td><button class="botones" onclick="modificar(1)">Modificar</button></td>
                    <td><button class="botones">Eliminar</button></td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>Yepes Arena</td>
                    <td>16/10/2020</td>
                    <td>ana.yepes@gmail.com</td>
                    <td>Farmaceuto</td>
                    <td>Activo</td>
                    <td><button class="botones" onclick="consultar(1)">Consultar</button></td>
                    <td><button class="botones" onclick="modificar(1)">Modificar</button></td>
                    <td><button class="botones">Eliminar</button></td>
                </tr>
                <tr>
                    <td>Prueba</td>
                    <td>Yepes Arena</td>
                    <td>16/10/2020</td>
                    <td>ana.yepes@gmail.com</td>
                    <td>Farmaceuto</td>
                    <td>Activo</td>
                    <td><button class="botones" onclick="consultar(1)">Consultar</button></td>
                    <td><button class="botones" onclick="modificar(1)">Modificar</button></td>
                    <td><button class="botones">Eliminar</button></td>
                </tr>
            </tbody>
        </table>

        <footer>
            <p>&copy Medi-web 2020</p>
        </footer>
    </div>


    <!-- The Modal -->
    <div class="modal" id="modalConsulta">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal de consulta</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"><label>Id</label></div>
                        <div class="col-md-8"><label>1</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Nombre</label></div>
                        <div class="col-md-8"><label>Prueba</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Apellido</label></div>
                        <div class="col-md-8"><label>Yepes Arena</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Fecha nacimiento</label></div>
                        <div class="col-md-8"><label>16/10/2020</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Tipo empleado</label></div>
                        <div class="col-md-8"><label>Farmaceutico</label></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label>Fecha nacimiento</label></div>
                        <div class="col-md-8"><label>Activo</label></div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="botones" data-dismiss="modal">Salir</button>
                </div>

            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="modalModificar">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal de consulta</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4"><label for="id">Id</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" name="id" id="id" value="1" disabled /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label for="nombre">Nombres</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" name="nombre" id="nombre" value="Prueba"  /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label for="Apellido">Apellidos</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" name="Apellido" id="Apellido" value="Yepes Arena"  /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label for="fechaNacimiento">Fecha nacimiento</label></div>
                        <div class="col-md-8"><input type="date" class="form-control" name="fechaNacimiento" id="fechaNacimiento" value="16/10/2020"  /></div>
                    </div>
                    <div class="row">
                        <div class="col-md-4"><label for="correo">Correo electronico</label></div>
                        <div class="col-md-8"><input type="text" class="form-control" name="correo" id="correo" value="ana.yepes@gmail.com"  /></div>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="botones" data-dismiss="modal">Salir</button>
                </div>

            </div>
        </div>
    </div>

    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script>
        function consultar(idEmpleado) {
            $('#modalConsulta').modal('show');
        }

        function modificar(idEmpleado) {
            $('#modalModificar').modal('show');
        }
    </script>


</body>

</html>