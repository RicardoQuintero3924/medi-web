<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/w3.css" />
    <link rel="stylesheet" href="../../css/font-awesome.min.css" />
    <link rel="stylesheet" href="../../css/estilos.css" />
    <title>Registro medicamento</title>
</head>

<body>
    <?php include '../../template/header.php';  ?>
    <div class="container">

        <div style="padding: 20px;">
            <h2 class="text-center titulo-list">Registro</h2>
        </div>
        <div class="card" style="width: 50%; margin-left: auto; margin-right: auto;">
            <div class="card-body">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nombreComercial">Nombre comercial</label>
                        <input type="text" class="form-control" id="nombreComercial">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="nombreGenerico">Nombre Generico</label>
                        <input type="text" class="form-control" id="nombreGenerico">
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion</label>
                    <textarea class="form-control" id="descripcion"></textarea>
                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="fechaVencimiento">Fecha Vencimiento</label>
                        <input type="date" class="form-control" id="fechaVencimiento">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="precio">Precio</label>
                        <input type="number" class="form-control" id="precio">
                    </div>

                </div>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="stock">Stock</label>
                        <input type="number" class="form-control" id="stock">
                    </div>
                    <div id="selectFarmacia" class="col-md-6"></div>

                </div>
                <div class="row">

                    <div id="selectLaboratorio" class="col-md-6"></div>
                    <div id="selectCategoria" class="col-md-6"></div>
                </div>

                <div class="form-group">
                    <button class="btn btn-list" style="width: 120px;" id="enviar">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../template/footer.php';  ?>


    <script src="../../js/jquery.js"></script>
    <script src="../../js/medicamento.js"></script>

    <script>
        $(document).ready(function() {
            $(".add").css("display", "none");
            $(".list").css("display", "block");
            $.ajax({
                type: 'GET',
                url: '../../controllers/farmaciaController.php',
                data: 'action=findAll',
                success: function(data) {
                    debugger;
                    let result1 = JSON.parse(data);
                    let code1 = "";
                    code1 += `<div class="form-group">
                        <label for="farmacia">Farmacia</label>
                        <select class="form-control" id="farmacia">
                            <option value="">Seleccione..</option>`;
                    for (let i = 0; i < result1.length; i++) {
                        code1 += `<option value="${result1[i].id_farmacia}">${result1[i].nombre}</option>`;
                    }
                    code1 += `</select></div>`;
                    $("#selectFarmacia").html(code1);
                },
                error: function() {
                    alert("Error");
                }
            });

            $.ajax({
                type: 'GET',
                url: '../../controllers/laboratorioController.php',
                data: 'action=findAll',
                success: function(data) {
                    debugger;
                    let result2 = JSON.parse(data);
                    let code2 = "";
                    code2 += `<div class="form-group">
                        <label for="laboratorio">Laboratorio</label>
                        <select class="form-control" id="laboratorio">
                            <option value="">Seleccione..</option>`;
                    for (let i = 0; i < result2.length; i++) {
                        code2 += `<option value="${result2[i].id_laboratorio}">${result2[i].descripcion}</option>`;
                    }
                    code2 += `</select></div>`;
                    $("#selectLaboratorio").html(code2);
                },
                error: function() {
                    alert("Error");
                }
            });

            $.ajax({
                type: 'GET',
                url: '../../controllers/categoriaController.php',
                data: 'action=findAll',
                success: function(data) {
                    debugger;
                    let result = JSON.parse(data);
                    let code = "";
                    code += `<div class="form-group">
                        <label for="categoria">Categoría</label>
                        <select class="form-control" id="categoria">
                            <option value="">Seleccione..</option>`;
                    for (let i = 0; i < result.length; i++) {
                        code += `<option value="${result[i].id_categoria}">${result[i].descripcion}</option>`;
                    }
                    code += `</select></div>`;
                    $("#selectCategoria").html(code);
                },
                error: function() {
                    alert("Error");
                }
            });
        });
    </script>

</body>

</html>