function listado() {
    $.ajax({
        type: 'GET',
        url: '../../controllers/domicilioController.php',
        data: 'action=findAll',
        success: function(data) {
            debugger;
            let result = JSON.parse(data);
            let code = "";
            for (let i = 0; i < result.length; i++) {
                if (parseInt(result[i].estado_entrega) == 1) {
                    code += `<tr style="background-color: #2FAD5D; color: white">;
                            <td>${result[i].nombre}</td>
                            <td>${result[i].direccion}</td>
                            <td class="text-right">$${new Intl.NumberFormat('es-CO').format(result[i].valor_domicilio)}</td>
                            <td>${result[i].codigo_pedido}</td>
                            <td><a class='btn btn-list' style="color: white;border: 1px solid #ffffff" href='javascript:fin(${result[i].id_pedido})'><i class="fa fa-times"></i></a></td>
                            <td><a class='btn btn-list' style="color: white;border: 1px solid #ffffff" href='javascript:enOperacion(${result[i].id_pedido})'><i class="fa fa-check"></i></a></td>
                            </tr>`;
                } else {
                    code += `<tr style="background-color: #D63B26; color: white">;
                    <td>${result[i].nombre}</td>
                    <td>${result[i].direccion}</td>
                    <td class="text-right">$${new Intl.NumberFormat('es-CO').format(result[i].valor_domicilio)}</td>
                    <td>${result[i].codigo_pedido}</td>
                    <td><a class='btn btn-list' style="color: white;border: 1px solid #ffffff" href='javascript:fin(${result[i].id_pedido})'><i class="fa fa-refresh"></i></a></td>
                    <td><a class='btn btn-list' style="color: white;border: 1px solid #ffffff" href='javascript:alert("Ya un domiciliario esta gestionando este pedido!!")'><i class="fa fa-check"></i></a></td>
                    </tr>`;
                }
            }
            $("#tbody").html(code);
        },
        error: function() {
            alert("Error");
        }
    });
}

function enOperacion(id) {
    let data = {
        "id": id,
        "action": "enOperacion"
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/domicilioController.php',
        data: data,
        success: function(data) {
            listado();
            alert(data);
        },
        error: function() {
            alert("Error");
        }
    });
}

function fin(id) {
    debugger;
    let confirmacion = confirm('¿Esta seguro de dar de alta este pedido?');
    if (confirmacion) {
        let data = {
            "id": id,
            "action": "fin"
        }
        $.ajax({
            type: 'POST',
            url: '../../controllers/domicilioController.php',
            data: data,
            success: function(data) {
                listado();
                alert(data);
            },
            error: function() {
                alert("Error");
            }
        });
    }
}