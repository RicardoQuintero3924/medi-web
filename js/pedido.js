function listado() {
    $.ajax({
        type: 'GET',
        url: '../../controllers/pedidoController.php',
        data: 'action=findAllId',
        success: function(data) {
            debugger;
            let result = JSON.parse(data);
            let code = "";
            for (let i = 0; i < result.length; i++) {
                code += `<tr>;
                            <td>Pedido ${i+1}</td>
                            <td><a class='btn btn-list' href='javascript:detallePedido(${result[i].id_pedido})'><i class="fa fa-check"></a></td>
                        </tr>`;
            }
            $("#tbody").html(code);
        },
        error: function() {
            alert("Error");
        }
    });
}

function listadox() {
    $.ajax({
        type: 'GET',
        url: '../../controllers/pedidoController.php',
        data: 'action=findAllIdx',
        success: function(data) {
            debugger;
            let result = JSON.parse(data);
            let code = "";
            for (let i = 0; i < result.length; i++) {
                code += `<tr>;
                            <td>${result[i].codigo_pedido}</td>
                            <td><a class='btn btn-list' href='javascript:detallePedidox(${result[i].id_pedido})'><i class="fa fa-check"></a></td>
                        </tr>`;
            }
            $("#tbody").html(code);
        },
        error: function() {
            alert("Error");
        }
    });
}

function detallePedidox(id) {
    $.ajax({
        type: 'POST',
        url: '../../controllers/pedidoController.php',
        data: 'id=' + id + '&action=findByIdx',
        success: function(data) {
            debugger;
            let result = JSON.parse(data);
            let total = result[0].valor_pedido;
            let fecha = result[0].fecha_ped;
            let cliente = result[0].nombre;
            let observacion = result[0].observaciones;
            let code = "";
            code += `
                <div class="row">
                    <div class="col-md-6" style="text-transform: uppercase;">${cliente}</div>
                    <div class="col-md-6">Valor total: ${new Intl.NumberFormat('es-CO').format(total)}</div>
                    
                </div><hr>
                <div class="row">
                    <div class="col-md-5" style="font-size: 12px;">Proucto</div>
                    <div class="col-md-4" style="font-size: 12px;">Nombre comercial</div>
                    <div class="col-md-2" style="font-size: 12px;">Cantidad</div>
                </div><hr>`
            for (let i = 0; i < result.length; i++) {
                code += `
                        <div class="row">
                            <div class="col-md-5"><img style="width: 70px; height: 70px;" src="../../${result[i].imagen}" alt="" /></div>
                            <div class="col-md-4 text-left mt-4">${result[i].nombre_comercial}</div>
                            <div class="col-md-2 text-right mt-4">${result[i].cantidad}</div>
                        </div><hr>`
            }
            code += `
                <div class="row" style=" width: 90%; margin-left: auto; margin-right: auto;">
                    <textarea id="obsPedido" class="form-control col-md-12" disabled></textarea>
                </div>
                <input type="hidden" value="${id}" id="idHidden"/>
                `

            $("#titleModal").html(`Confirmar pedido &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ${fecha}`);
            $("#bodyModal").html(code);
            $("#modal").modal('show');
            $("#obsPedido").val(`${observacion}`);
        },
        error: function() {
            alert("Error");
        }
    });
}

function detallePedido(id) {
    $.ajax({
        type: 'POST',
        url: '../../controllers/pedidoController.php',
        data: 'id=' + id + '&action=findById',
        success: function(data) {
            debugger;
            let result = JSON.parse(data);
            let total = result[0].valor_pedido;
            let fecha = result[0].fecha_ped;
            let cliente = result[0].nombre;
            let code = "";
            code += `
                <div class="row">
                    <div class="col-md-6" style="text-transform: uppercase;">${cliente}</div>
                    <div class="col-md-6">Valor total: ${new Intl.NumberFormat('es-CO').format(total)}</div>
                    
                </div><hr>
                <div class="row">
                    <div class="col-md-5" style="font-size: 12px;">Proucto</div>
                    <div class="col-md-4" style="font-size: 12px;">Nombre comercial</div>
                    <div class="col-md-2" style="font-size: 12px;">Cantidad</div>
                </div><hr>`
            for (let i = 0; i < result.length; i++) {
                code += `
                        <div class="row">
                            <div class="col-md-5"><img style="width: 70px; height: 70px;" src="../../${result[i].imagen}" alt="" /></div>
                            <div class="col-md-4 text-left mt-4">${result[i].nombre_comercial}</div>
                            <div class="col-md-2 text-right mt-4">${result[i].cantidad}</div>
                        </div><hr>`
            }
            code += `
                <div class="row" style=" width: 90%; margin-left: auto; margin-right: auto;">
                    <textarea id="obsPedido" class="form-control col-md-12" placeholder="Observación"></textarea>
                </div>
                <input type="hidden" value="${id}" id="idHidden"/>
                `

            $("#titleModal").html(`Confirmar pedido &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ${fecha}`);
            $("#bodyModal").html(code);
            $("#modal").modal('show');
        },
        error: function() {
            alert("Error");
        }
    });
}

function confirmar() {
    debugger;
    let data = {
        "observacion": $("#obsPedido").val(),
        "id": $("#idHidden").val(),
        "action": "finPedido",
        "codigo": create_UUID()
    }
    $.ajax({
        type: 'POST',
        url: '../../controllers/pedidoController.php',
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

function create_UUID() {
    var dt = new Date().getTime();
    var uuid = 'xxx-xxx-xxx-xxx'.replace(/[xy]/g, function(c) {
        var r = (dt + Math.random() * 16) % 16 | 0;
        dt = Math.floor(dt / 16);
        return (c == 'x' ? r : (r & 0x3 | 0x8)).toString(16);
    });
    return uuid;
}