$(document).ready(function() {
    listado();
});

function listado() {
    $.ajax({
        type: 'GET',
        url: '../../controllers/tipoEmpleadoController.php',
        data: 'action=findAll',
        success: function(data) {
            let result = JSON.parse(data);
            console.log(result);

            let code = "";
            code += "<table class='table'>";
            code += "<thead>" +
                "<tr><th>Descripción</th><th colspan='3'>Acciones</th></tr>" +
                "</thead>";
            code += "<tbody>";
            for (let i = 0; i < result.length; i++) {
                code += "<tr>";
                code += `<td>${result[i].descripcion}</td>`;
                code += `<td><button class='btn btn-primary' onclick='consultar(${result[i].id_tipo_empleado}, "modificar")'>Mod</button></td>`;
                code += `<td><button class='btn btn-info' onclick='consultar(${result[i].id_tipo_empleado}, "consulta")'>Cons</button></td>`;
                code += `<td><button class='btn btn-danger' onclick='eliminar(${result[i].id_tipo_empleado})'>eli</button></td>`;
                code += "</tr>";
            }
            code += "</tbody>";
            code += "</table>";
            $("#tabla").html(code);
        },
        error: function() {
            alert("Error");
        }
    });
}

function modificar() {
    let data = {
        "descripcion": $("#descripcion").val(),
        "id": $("#id").val(),
        "action": "update"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/tipoEmpleadoController.php',
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
        url: '../../controllers/tipoEmpleadoController.php',
        data: 'id=' + id + '&action=findById',
        success: function(data) {
            let result = JSON.parse(data);
            debugger;
            if (tipo == 'consulta') {
                let code = "";
                code += "<ul class='list-group list-group-flush'>";
                code += `<li class="list-group-item"><b>Id</b> : ${result[0].id_tipo_empleado}</li>`;
                code += `<li class="list-group-item"><b>Descripción</b> : ${result[0].descripcion}</li>`;
                code += "</ul>";
                $("#titleModal").html("Consulta de tipo de empleado");
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
                        <label for="descripcion">Descripcion</label>
                        <input type="text" class="form-control" id="descripcion">
                    </div>`

                $("#titleModal").html("Modificar tipo de empleado");
                $("#bodyModal").html(code);
                $("#btnMod").css("display", "block");
                $("#modal").modal('show');
                $("#id").val(result[0].id_tipo_empleado);
                $("#descripcion").val(result[0].descripcion);
            }


        },
        error: function() {
            alert("Error");
        }
    });
}




function eliminar(id) {
    let confirmacion = confirm('Esta seguro de eliminar este registro');
    if (confirmacion) {
        $.ajax({
            type: 'POST',
            url: '../../controllers/tipoEmpleadoController.php',
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
        "descripcion": $("#descripcion").val(),
        "action": "insert"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/tipoEmpleadoController.php',
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