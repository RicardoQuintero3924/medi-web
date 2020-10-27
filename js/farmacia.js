$(document).ready(function() {
    listado();
});

function listado() {
    $.ajax({
        type: 'GET',
        url: '../../controllers/farmaciaController.php',
        data: 'action=findAll',
        success: function(data) {
            debugger;
            let result = JSON.parse(data);
            let code = "";
            for (let i = 0; i < result.length; i++) {
                code += `<tr>;
                            <td>${result[i].nombre}</td>
                            <td>${result[i].descripcion}</td>
                            <td>${result[i].direccion}</td>
                            <td><a class='btn btn-list' href='javascript:consultar(${result[i].id_farmacia}, "modificar")'><i class="fa fa-refresh"></i></a></td>
                            <td><a class='btn btn-list' href='javascript:consultar(${result[i].id_farmacia}, "consulta")'><i class="fa fa-search"></i></a></td>
                            <td><a class='btn btn-list' href='javascript:eliminar(${result[i].id_farmacia})'><i class="fa fa-trash"></i></a></td>
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
    let data = {
        "nombre": $("#nombre").val(),
        "descripcion": $("#descripcion").val(),
        "direccion": $("#direccion").val(),
        "id": $("#id").val(),
        "action": "update"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/farmaciaController.php',
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
        url: '../../controllers/farmaciaController.php',
        data: 'id=' + id + '&action=findById',
        success: function(data) {
            debugger;
            let result = JSON.parse(data);
            debugger;
            if (tipo == 'consulta') {
                let code = "";
                code += `<ul class='list-group list-group-flush'>
                            <li class="list-group-item"><b>Id</b> : ${result[0].id_farmacia}</li>
                            <li class="list-group-item"><b>Nombre</b> : ${result[0].nombre}</li>
                            <li class="list-group-item"><b>Descripción</b> : ${result[0].descripcion}</li>
                            <li class="list-group-item"><b>Dirección</b> : ${result[0].direccion}</li>
                        </ul>`
                $("#titleModal").html("Consulta de farmacias");
                $("#bodyModal").html(code);
                $("#btnMod").css("display", "none");
                $("#modal").modal('show');
            } else if (tipo == 'modificar') {
                let code = "";
                code += `
                    <div class="form-group">
                        <label for="id">Id</label>
                        <input type="text" class="form-control" id="id" disabled>                              
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" >                              
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" >                              
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" class="form-control" id="direccion" >                              
                    </div>`

                $("#titleModal").html("Modificar farmacia");
                $("#bodyModal").html(code);
                $("#btnMod").css("display", "block");
                $("#modal").modal('show');
                $("#id").val(result[0].id_farmacia);
                $("#nombre").val(result[0].nombre);
                $("#descripcion").val(result[0].descripcion);
                $("#direccion").val(result[0].direccion);
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
            url: '../../controllers/farmaciaController.php',
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
        "nombre": $("#nombre").val(),
        "descripcion": $("#descripcion").val(),
        "direccion": $("#direccion").val(),
        "action": "insert"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/farmaciaController.php',
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