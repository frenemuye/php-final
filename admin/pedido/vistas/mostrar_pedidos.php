<?php
if (!isset($listaPedidos)) {
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
    <!-- activar libreria bootstreap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- fin activar libreria bootstreap -->
    <!-- libreria de los iconos asombrosos de fontawesome.com/ siempre va debajo de la libreria de booststrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- fin libreria de los iconos asombrosos de fontawesome.com/ -->
    <!-- libreria de los css + google fonts/ -->
    <!-- fin libreria de los css + google fonts/ -->
    <title>Pedidos</title>
</head>

<body>
    <!-- El elemento HTML <th> define una celda como encabezado de un grupo de celdas en una tabla. 
        La naturaleza exacta de este grupo está definida por los atributos scope y headers . 
        La etiqueta de inicio es obligatoria.-->
    <table class="table align-middle table-hover table-dark" border="0" align="center" cellpadding="7">
        <thead>
            <tr bgcolor="grey" id="blanco">
                <th scope="col">Cod. Pedido</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Detalle</th>
                <th scope="col">Código Cliente</th>
                <!-- <th scope="col">Cédula cliente</th> -->

                <th scope="col">Editar</th>
                <th scope="col">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <!--Obj lista de pedidos tiene la matriz de la consulta y mete la primera fila en obj. pedido-->
            <?php foreach ($listaPedidos as $pedido) { ?>
                <tr>
                    <th scope="row" bgcolor="grey" id="blanco"> <?php echo $pedido->getCodPedido(); ?> </th>
                    <td> <?php echo $pedido->getFecha(); ?> </td>
                    <td> <?php echo $pedido->getEstado(); ?> </td>
                    <td> <textarea rows="1" cols="50" disabled> <?php echo $pedido->getDetalle(); ?></textarea> </td>
                    <td> <?php echo $pedido->getClienteCod(); ?> </td>

                    <td bgcolor="gray">
                        <a class=" btn btn-warning" href="controlador_pedido.php?accion=actualizar_pedido&cod_pedido=<?php echo $pedido->getCodPedido(); ?>">Editar</a>
                    </td>
                    <td bgcolor="gray">
                        <a class=" btn btn-danger" onclick="return confirmar_borrar()" href="controlador_pedido.php?accion=eliminar&cod_pedido=<?php echo $pedido->getCodPedido(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php }  ?>
            <tr>
                <th colspan="8" bgcolor="white">
                    <?php
                    if ($_SESSION["tipo"] == "Root") { ?>
                        <a href="../usuario/index_root.php" align="center">
                            <h1>Salir</h1>
                        </a>
                    <?php
                    } elseif ($_SESSION["tipo"] == "User") { ?>
                        <a href="../usuario/index.php" align="center">
                            <h1>Salir</h1>
                        </a>
                    <?php
                    } elseif ($_SESSION["tipo"] == "Tendero") { ?>
                        <a href="../cliente/index.php" align="center">
                            <h1>Salir</h1>
                        </a>
                    <?php
                    } else { ?>
                        <a href="../cliente/index_supermercado.php" align="center">
                            <h1>Salir</h1>
                        </a>
                    <?php
                    }
                    ?>
                </th>
            </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        function confirmar_borrar() {
            var respuesta = confirm("¿Estás seguro de querer eliminar este pedido?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>