<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Bienvenido</title>

    <style>
        .card {
            transition: transform .2s;
            border-radius: 20px;
            box-shadow: 1px 1px 10px #01316D;
            border: 1px solid #01316D;
        }
        
        .card:hover {
            transform: scale(1.1);
            cursor: pointer;
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
            color: white;
        }
    </style>
</head>

<body>


    <div class="container">
        <div style="padding: 20px;">
            <h2 class="text-center">Bienvenido</h2>
        </div>
        <div class="row" id="panel"></div>
        <?php include '../template/footer.php';  ?>
    </div>



    <script src="../js/jquery.min.js"></script>
    <script>
        let vistas = ['Clientes', 'Empleados', 'Tipo Empleados', 'Medicamentos', 'Categorias medicamentos'];



        $(document).ready(() => {
            let code = "";
            for (let i = 0; i < vistas.length; i++) {
                code += `<div class='col-md-3' style="margin-bottom: 20px"><div class="card" onclick='procesar(${i})'>
                            <div class="card-header">${vistas[i]}</div>
                            <div class="card-body"></div>
                        </div></div>`
            }
            $("#panel").html(code);

        });

        function procesar(opc) {
            let urls = [
                '', 
                'empleado/listado.php', 
                'tipo_empleado/listado.php', 
                '', 
                ''];
            debugger;
            $(location).attr('href', urls[opc]);
        }
    </script>

</body>

</html>