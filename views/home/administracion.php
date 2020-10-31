<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link href="../../css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/style.css" />

    <link rel="stylesheet" href="../../css/w3.css" />
    <link rel="stylesheet" href="../../css/chartist.css" />

    <title>Administración</title>

</head>

<body>
    <?php include '../../template/header.php';  ?>

    <div class="container">
        <div style="padding: 20px;">
            <h2 class="text-center" style="font-weight: 600; color: #01316D">Panel administrativo</h2>

        </div>
        <div class="row">
            <div class="col-md-4 categoria">
                <a href="../empleado/listado.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Empleados</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-4 categoria">
                <a href="../tipo_empleado/listado.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Tipo empleados</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-4 categoria">
                <a href="../pedido/listado.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Pedidos</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4 categoria">
                <a href="../categoria/listado.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Categorías</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-4 categoria">
                <a href="../medicamento/listado.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Medicamentos</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-4 categoria">
                <a href="../farmacia/listado.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Farmacias</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 categoria">
                <a href="../laboratorio/listado.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Laboratorios</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
            <div class="col-md-4 categoria">
                <a href="../pedido/listadox.php">
                    <div class="other-treatments">
                        <img src="../../images/list-thumb.png" alt="" />
                        <h2>Pedidos dados de alta</h2>
                        <i class="fa fa-angle-right"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- </div> -->

    <!-- </div> -->
    <!-- </div> -->

    <?php include '../../template/footer.php';  ?>


    <script src="../../js/jquery.js"></script>
    <script src="../../js/Chart.bundle.min.js"></script>
    <script src="../../js/Chart.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".add").css("display", "none");
            $(".home").css("display", "none");
            $(".list").css("display", "none");

            // var ctx = document.getElementById(
            //         'myChart')
            //     .getContext('2d');
            // var myChart = new Chart(
            //     ctx, {
            //         type: 'bar',
            //         data: {
            //             labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            //             datasets: [{
            //                 //label : 'Compras mensuales del año actual',
            //                 label: 'Gramos',
            //                 data: [12, 19, 3, 5, 2, 3],
            //                 backgroundColor: 'rgba(26, 92, 137, 1)',
            //                 borderColor: 'rgba(0, 0, 0, 1)',
            //                 borderWidth: 1

            //             }]
            //         },
            //         options: {
            //             scales: {
            //                 yAxes: [{
            //                     ticks: {
            //                         beginAtZero: true
            //                     }
            //                 }]
            //             }
            //         }
            //     });

            // var ctx = document.getElementById(
            //         'myChart2')
            //     .getContext('2d');
            // var myChart = new Chart(
            //     ctx, {
            //         type: 'line',
            //         data: {
            //             labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
            //             datasets: [{
            //                 //label : 'Compras mensuales del año actual',
            //                 label: 'Gramos',
            //                 data: [12, 19, 3, 5, 2, 3],
            //                 backgroundColor: 'rgba(26, 92, 137, 1)',
            //                 borderColor: 'rgba(0, 0, 0, 1)',
            //                 borderWidth: 1

            //             }]
            //         },
            //         options: {
            //             scales: {
            //                 yAxes: [{
            //                     ticks: {
            //                         beginAtZero: true
            //                     }
            //                 }]
            //             }
            //         }
            //     });

           

        });
    </script>
</body>

</html>