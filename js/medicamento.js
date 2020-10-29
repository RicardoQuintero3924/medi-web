$(document).ready(function() {
    listado();
});

function listado() {
    $.ajax({
        type: 'GET',
        url: '../../controllers/medicamentoController.php',
        data: 'action=findAll',
        success: function(data) {

            let result = JSON.parse(data);
            let code = "";
            for (let i = 0; i < result.length; i++) {
                code += `<tr>;
                            <td>${result[i].nombre_comercial}</td>
                            <td>${result[i].nombre_generico}</td>
                            <td class="text-right">${new Intl.NumberFormat('es-CO').format(result[i].precio)}</td>
                            <td>${result[i].fecha_vencimiento}</td>
                            <td>${result[i].farmacia}</td>
                            <td>${result[i].laboratorio}</td>
                            <td class="text-right">${result[i].stock}</td>
                            <td>${result[i].categoria}</td>
                            <td><a class='btn btn-list' href='javascript:consultar(${result[i].id_medicamento}, "modificar")'><i class="fa fa-refresh"></i></a></td>
                            <td><a class='btn btn-list' href='javascript:consultar(${result[i].id_medicamento}, "consulta")'><i class="fa fa-search"></i></a></td>
                            <td><a class='btn btn-list' href='javascript:eliminar(${result[i].id_medicamento})'><i class="fa fa-trash"></i></a></td>
                        </tr>`;
            }
            $("#tbody").html(code);
        },
        error: function() {
            alert("Error");
        }
    });
}

function modificar() {
    debugger;
    let data = {
        "nombreComercial": $("#nombreComercial").val(),
        "nombreGenerico": $("#nombreGenerico").val(),
        "descripcion": $("#descripcion").val(),
        "precio": $("#precio").val(),
        "fechaVencimiento": $("#fechaVencimiento").val(),
        "farmacia": $("#farmacia").val(),
        "laboratorio": $("#laboratorio").val(),
        "stock": $("#stock").val(),
        "categoria": $("#categoria").val(),
        "id": $("#id").val(),
        "action": "update"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/medicamentoController.php',
        data: data,
        success: function(data) {
            listado();
            $("#modal").modal('hide');
            alert(data);
        },
        error: function() {
            alert("Error");
        }
    });
}

function consultar(id, tipo) {
    $.ajax({
        type: 'POST',
        url: '../../controllers/medicamentoController.php',
        data: 'id=' + id + '&action=findById',
        success: function(data) {

            let result = JSON.parse(data);

            if (tipo == 'consulta') {
                let code = "";
                code += `<ul class='list-group list-group-flush'>
                    <li class="list-group-item"><b>Nombre comercial</b> : ${result[0].nombre_comercial}</li>
                    <li class="list-group-item"><b>Nombre generico</b> : ${result[0].nombre_generico}</li>
                    <li class="list-group-item"><b>Nombre generico</b> : ${result[0].descripcion}</li>
                    <li class="list-group-item"><b>Precio</b> : ${new Intl.NumberFormat('es-CO').format(result[0].precio)}</li>
                    <li class="list-group-item"><b>Fecha vencimiento</b> : ${result[0].fecha_vencimiento}</li>
                    <li class="list-group-item"><b>Farmacia</b> : ${result[0].farmacia}</li>
                    <li class="list-group-item"><b>Laboratorio</b> : ${result[0].laboratorio}</li>
                    <li class="list-group-item"><b>Stock</b> : ${result[0].stock}</li>
                    <li class="list-group-item"><b>Categoria</b> : ${result[0].categoria}</li>
                </ul>`
                $("#titleModal").html(`Consulta de medicamento <img width="100" src='../../${result[0].imagen}' />`);
                $("#bodyModal").html(code);
                $("#btnMod").css("display", "none");
                $("#modal").modal('show');
            } else if (tipo == 'modificar') {

                let code = "";
                code += `
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="id">Id</label>
                            <input type="text" class="form-control" id="id" disabled>                              
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nombreComercial">Nombre comercial</label>
                            <input type="text" class="form-control" id="nombreComercial">                              
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nombreGenerico">Nombre generico</label>
                            <input type="text" class="form-control" id="nombreGenerico">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label for="descripcion">Descripción</label>
                            <textarea id="descripcion" class="form-control"></textarea>                             
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="precio">Precio</label>
                            <input type="number" class="form-control" id="precio">                              
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fechaVencimiento">Fecha vencimiento</label>
                            <input type="date" class="form-control" id="fechaVencimiento">
                        </div>
                    </div>
                    <div class="row">
                    `
                $.ajax({
                    type: 'GET',
                    url: '../../controllers/farmaciaController.php',
                    data: 'action=findAll',
                    success: function(data) {

                        let result1 = JSON.parse(data);
                        code += `<div class="form-group col-md-6">
                                    <label for="farmacia">Farmacia</label>
                                    <select class="form-control" id="farmacia">`;
                        for (let i = 0; i < result1.length; i++) {
                            if (result[0].id_farmacia == result1[i].id_farmacia) {
                                code += `<option value="${result1[i].id_farmacia}" selected>${result1[i].nombre}</option>`;
                            } else {
                                code += `<option value="${result1[i].id_farmacia}">${result1[i].nombre}</option>`;
                            }

                        }
                        code += `</select></div>`;
                        $.ajax({
                            type: 'GET',
                            url: '../../controllers/laboratorioController.php',
                            data: 'action=findAll',
                            success: function(data) {

                                let result2 = JSON.parse(data);
                                code += `<div class="form-group col-md-6">
                                            <label for="laboratorio">Laboratorio</label>
                                            <select class="form-control" id="laboratorio">`;
                                for (let i = 0; i < result2.length; i++) {
                                    if (result[0].id_laboratorio == result2[i].id_laboratorio) {
                                        code += `<option value="${result2[i].id_laboratorio}" selected>${result2[i].descripcion}</option>`;
                                    } else {
                                        code += `<option value="${result2[i].id_laboratorio}">${result2[i].descripcion}</option>`;
                                    }

                                }
                                code += `</select></div>`;
                                code += `</div>
                                <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="stock">Stock</label>
                                    <input type="number" class="form-control" id="stock">
                                </div>
                                `;


                                $.ajax({
                                    type: 'GET',
                                    url: '../../controllers/categoriaController.php',
                                    data: 'action=findAll',
                                    success: function(data) {
                                        debugger;
                                        let result3 = JSON.parse(data);
                                        code += `<div class="form-group col-md-6">
                                                    <label for="categoria">Categoría</label>
                                                    <select class="form-control" id="categoria">`;
                                        for (let i = 0; i < result3.length; i++) {
                                            if (result[0].id_categoria == result3[i].id_categoria) {
                                                code += `<option value="${result3[i].id_categoria}" selected>${result3[i].descripcion}</option>`;
                                            } else {
                                                code += `<option value="${result3[i].id_categoria}">${result3[i].descripcion}</option>`;
                                            }

                                        }
                                        code += `</select></div>`;
                                        code += `</div>`

                                        $("#titleModal").html("Modificar medicamento");
                                        $("#bodyModal").html(code);
                                        $("#btnMod").css("display", "block");
                                        $("#modal").modal('show');
                                        $("#id").val(result[0].id_medicamento);
                                        $("#nombreComercial").val(result[0].nombre_comercial);
                                        $("#nombreGenerico").val(result[0].nombre_generico);
                                        $("#descripcion").val(result[0].descripcion);
                                        $("#precio").val(result[0].precio);
                                        $("#fechaVencimiento").val(result[0].fecha_vencimiento);
                                        $("#stock").val(result[0].stock);

                                    },
                                    error: function() {
                                        alert("Error");
                                    }
                                });


                            },
                            error: function() {
                                alert("Error");
                            }
                        });
                    },
                    error: function() {
                        alert("Error");
                    }
                });


            }
        },
        error: function() {
            alert("Error");
        }
    });
}

function eliminar(id) {
    let confirmacion = confirm('¿Esta seguro de eliminar este registro?');
    if (confirmacion) {
        $.ajax({
            type: 'POST',
            url: '../../controllers/medicamentoController.php',
            data: 'id=' + id + '&action=delete',
            success: function(data) {
                alert(data);
                listado();
            },
            error: function() {
                alert("Error");
            }
        });
    }
}

$("#enviar").click(() => {
    debugger;
    let data = {
        "nombreComercial": $("#nombreComercial").val(),
        "nombreGenerico": $("#nombreGenerico").val(),
        "descripcion": $("#descripcion").val(),
        "precio": $("#precio").val(),
        "fechaVencimiento": $("#fechaVencimiento").val(),
        "farmacia": $("#farmacia").val(),
        "laboratorio": $("#laboratorio").val(),
        "stock": $("#stock").val(),
        "categoria": $("#categoria").val(),
        "action": "insert"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/medicamentoController.php',
        data: data,
        success: function(data) {
            alert(data);
            window.location.href = 'listado.php';
        },
        error: function() {
            alert("Error");
        }
    });
});