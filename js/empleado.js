$(document).ready(function() {
    listado();
});

function listado() {
    debugger;
    $.ajax({
        type: 'GET',
        url: '../../controllers/empleadoController.php',
        data: 'action=findAll',
        success: function(data) {
            let result = JSON.parse(data);
            debugger;
            let code = "";
            for (let i = 0; i < result.length; i++) {
                code += `<tr>
                            <td>${result[i].nombre}</td>
                            <td>${result[i].apellido}</td>
                            <td>${result[i].fecha_nacimiento}</td>
                            <td>${result[i].correo_electronico}</td>
                            <td>${result[i].tipoEmpleado}</td>
                            <td><a  class="btn btn-list" href='javascript:consultar(${result[i].id_empleado}, "modificar")'><i class="fa fa-refresh"></i></a></td>
                            <td><a  class="btn btn-list" href='javascript:consultar(${result[i].id_empleado}, "consulta")'><i class="fa fa-search"></i></a></td>
                            <td><a  class="btn btn-list" href='javascript:eliminar(${result[i].id_empleado})' ><i class="fa fa-trash"></i></a></td>
                        </tr>`;
            }
            $("#tbody").html(code);
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
            url: '../../controllers/empleadoController.php',
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

function consultar(id, tipo) {

    $.ajax({
        type: 'POST',
        url: '../../controllers/empleadoController.php',
        data: 'id=' + id + '&action=findById',
        success: function(data) {
            let result = JSON.parse(data);
            debugger;
            if (tipo == 'consulta') {
                let code = `
                            <ul class='list-group list-group-flush'>
                                <li class="list-group-item"><b>Id</b> : ${result[0].id_empleado}</li>
                                <li class="list-group-item"><b>Nombre</b> : ${result[0].nombre}</li>
                                <li class="list-group-item"><b>Apellido</b> : ${result[0].apellido}</li>
                                <li class="list-group-item"><b>Correo electronico</b> : ${result[0].correo_electronico}</li>
                                <li class="list-group-item"><b>Fecha nacimiento</b> : ${result[0].fecha_nacimiento}</li>
                                <li class="list-group-item"><b>Tipo empleado</b> : ${result[0].tipoEmpleado}</li>
                            </ul>`;
                $("#titleModal").html("Consulta de empleados");
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
                                <input type="text" class="form-control" id="nombre">
                            </div>
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input type="text" class="form-control" id="apellido">
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo</label>
                                <input type="email" class="form-control" id="correo">
                            </div>
                            <div class="form-group">
                                <label for="fecha">Fecha nacimiento</label>
                                <input type="date" class="form-control" id="fecha">
                            </div>
                            
                            `
                $.ajax({
                    type: 'GET',
                    url: '../../controllers/tipoEmpleadoController.php',
                    data: 'action=findAll',
                    success: function(data) {
                        let result1 = JSON.parse(data);
                        code += `<div class="form-group">
                                    <label for="tipoEmpleado">Tipo empleado</label>
                                    <select class="form-control" id="tipoEmpleado">`;
                        for (let i = 0; i < result1.length; i++) {
                            if (result[0].id_tipo_empleado == result1[i].id_tipo_empleado) {
                                code += `<option value="${result1[i].id_tipo_empleado}" selected>${result1[i].descripcion}</option>`;
                            } else {
                                code += `<option value="${result1[i].id_tipo_empleado}">${result1[i].descripcion}</option>`;
                            }

                        }
                        code += `</select></div>`;
                        $("#titleModal").html("Modificar empleado");
                        $("#bodyModal").html(code);

                        $("#btnMod").css("display", "block");
                        $("#modal").modal('show');

                        $("#id").val(result[0].id_empleado);
                        $("#nombre").val(result[0].nombre);
                        $("#apellido").val(result[0].apellido);
                        $("#correo").val(result[0].correo_electronico);
                        $("#fecha").val(result[0].fecha_nacimiento);
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

function modificar() {
    let data = {
        "id_empleado": $("#id").val(),
        "nombre": $("#nombre").val(),
        "apellido": $("#apellido").val(),
        "correo": $("#correo").val(),
        "fecha": $("#fecha").val(),
        "tipo_empleado": $("#tipoEmpleado").val(),
        "action": "update"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/empleadoController.php',
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

$("#enviar").click(() => {
    let data = {
        "documento": $("#documento").val(),
        "nombre": $("#nombre").val(),
        "apellido": $("#apellido").val(),
        "correo": $("#correo").val(),
        "fecha": $("#fechaNacimiento").val(),
        "tipoEmpleado": $("#tipoEmpleado").val(),
        "usuario": $("#usuario").val(),
        "contrasena": $("#contrasena").val(),
        "action": "insert"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/empleadoController.php',
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