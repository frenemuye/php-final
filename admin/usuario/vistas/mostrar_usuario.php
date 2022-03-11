<?php
if (!isset($listaUsuario)) {
    header("Location: ../../../");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1">
    <link href="favicon.ico" rel="shortcut icon" />

    <!--librerias para bootstrap5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- fin librerias para bootstrap5 -->

    <!--librerias para font awesome -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- fin librerias para font awesome -->

    <!--librerias para que datatables quede responsive -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
    <!--fin librerias para que datatables quede responsive -->


    <!--librerias para que datatables tenga botones para exportar -->
    <link rel="stylesheet" href="DataTables/DataTables-1.11.0/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="DataTables/Buttons-2.0.0/css/buttons.bootstrap4.min.css">
    <!-- fin librerias para que datatables tenga botones para exportar -->
    <title>Usuarios</title>
</head>

<body>
    <center>
        <div class="alert alert-danger" role="alert">
            <?php echo "Hola " . $_SESSION["nombre"] . " Tu rol es: " . $_SESSION["tipo"] . " Tienes permisos para estar acá."; ?>
        </div>
    </center>
    <!-- El elemento HTML <th> define una celda como encabezado de un grupo de celdas en una tabla. 
        La naturaleza exacta de este grupo está definida por los atributos scope y headers . 
        La etiqueta de inicio es obligatoria.-->
    <div class="table-responsive">
        <table id="dt" class="table align-middle table-hover table-dark" border="0" align="center" cellpadding="7">
            <thead>
                <tr class="align-bottom" bgcolor="gray">
                    <th scope="col" class="align-top">ID</th>
                    <th scope="col" class="align-top">Cedula Usuario</th>
                    <th scope="col" class="align-top">Nombre Usuario</th>
                    <th scope="col" class="align-top">Contraseña Usuario</th>
                    <th scope="col" class="align-top">Repita Contraseña</th>
                    <th scope="col" class="align-top">Tipo de Usuario</th>

                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <!--Obj lista de usuarios tiene la matriz de la consulta y mete la primera fila en obj. usuario-->
                <?php foreach ($listaUsuario as $usuario) { ?>
                    <tr class="align-bottom">
                        <th scope="row" class="align-top"> <?php echo $usuario->getId();     ?> </th>
                        <td class="align-top"> <?php echo $usuario->getCedula(); ?> </td>
                        <td class="align-top"> <?php echo $usuario->getNombre(); ?> </td>
                        <td class="align-top"> •••••••• </td>
                        <td class="align-top"> •••••••• </td>
                        <td class="align-top"> <?php echo $usuario->getTipo(); ?> </td>

                        <td class="align-top">
                            <a class="btn btn-info" href="controlador_usuario.php?accion=actualizar&id=<?php echo $usuario->getId(); ?>">Editar</a>
                        </td>
                        <td class="align-top">
                            <a class="btn btn-danger" onclick="return confirmar_borrar()" href="controlador_usuario.php?accion=eliminar&id=<?php echo $usuario->getId(); ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php }  ?>

            </tbody>
        </table>
        <table>
            <tr class="align-bottom" align="center">
                <th bgcolor="white"><a href="index_root.php">
                        <h1>Salir</h1>
                    </a>
                </th>
            </tr>
        </table>

    </div>

    <script type="text/javascript">
        function confirmar_borrar() {
            var respuesta = confirm("¿Estás seguro de querer eliminar este usuario?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>









    <!--libreria jquery  -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- fin libreria jquery  -->

    <!--librerias para que datatables que responsive -->
    <script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <!-- fin librerias para que datatables que responsive -->

    <!--librerias para que datatables tenga botones para exportar -->
    <script src="DataTables/JSZip-2.5.0/jszip.min.js"></script>
    <script src="DataTables/pdfmake-0.1.36/pdfmake.min.js"></script>
    <script src="DataTables/pdfmake-0.1.36/vfs_fonts.js"></script>
    <script src="DataTables/DataTables-1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="DataTables/DataTables-1.11.0/js/dataTables.bootstrap4.min.js"></script>
    <script src="DataTables/Buttons-2.0.0/js/dataTables.buttons.min.js"></script>
    <script src="DataTables/Buttons-2.0.0/js/buttons.bootstrap4.min.js"></script>
    <script src="DataTables/Buttons-2.0.0/js/buttons.html5.min.js"></script>
    <script src="DataTables/Buttons-2.0.0/js/buttons.print.min.js"></script>
    <!--fin librerias para que datatables tenga botones para exportar -->

    <script>
        $(document).ready(function() {
            var table = $('#dt').DataTable({

                "language": {
                    "lengthMenu": "Ver _MENU_ registros por página",
                    "zeroRecords": "Nada encontrado - lo siento",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "Ningún registros disponibles",
                    "infoFiltered": "(Filtrando de _MAX_ registros totales)"
                },


                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                //desde aca empieza la configuracion de los botones
                dom: 'Bfrtillp',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<i class="far fa-file-excel"></i>',
                        titleAttr: 'Exportar a Excel',
                        className: 'btn btn-success'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="far fa-file-pdf"></i>',
                        titleAttr: 'Exportar a Pdf',
                        className: 'btn btn-danger'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i>',
                        titleAttr: 'Imprimir',
                        className: 'btn btn-info'
                    },

                ]

            });
        });
    </script>
</body>

</html>