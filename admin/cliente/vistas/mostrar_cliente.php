<?php
//Valido que la variable que el controlador le envia a la vista si exista, si no existe es porque alguien entró directamente a la vista burlando el controlador.
if (!isset($listaCliente)) {
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
    <title>Clientes</title>
</head>

<body>
    <!-- El elemento HTML <th> define una celda como encabezado de un grupo de celdas en una tabla. 
        La naturaleza exacta de este grupo está definida por los atributos scope y headers . 
        La etiqueta de inicio es obligatoria.-->
    <table class="table align-middle table-hover table-dark">
        <thead>
            <tr bgcolor="grey" id="blanco">
                <th scope="col"> Código</th>
                <th scope="col"> Cedula Cliente</th>
                <th scope="col"> Nombre Cliente</th>
                <th scope="col"> Email Cliente</th>
                <th scope="col"> Teléfono Cliente</th>
                <th scope="col"> Celular Cliente</th>
                <th scope="col"> Dirección Cliente</th>
                <th scope="col"> Contraseña</th>
                <th scope="col"> Birthday Cliente</th>
                <th scope="col" bgcolor="LightGreen"> Etiqueta Cliente</th>
                <th scope="col"> Tipo de Cliente</th>

                <th scope="col"> Editar</th>
                <th scope="col"> Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <!--Obj lista de clientes tiene la matriz de la consulta y mete la primera fila en obj. usuario-->
            <?php
            foreach ($listaCliente as $cliente) { ?>
                <tr>
                    <th bgcolor="grey" id="blanco"> <?php echo $cliente->getCodCliente();     ?> </th>
                    <td> <?php echo $cliente->getCedula(); ?> </td>
                    <td> <?php echo $cliente->getNombre(); ?> </td>
                    <td> <?php echo $cliente->getEmail(); ?> </td>
                    <td> <?php echo $cliente->getTelefono(); ?> </td>
                    <td> <?php echo $cliente->getCelular(); ?> </td>
                    <td> <?php echo $cliente->getDireccion(); ?> </td>
                    <td> <?php echo $cliente->getContrasena(); ?> </td>
                    <td> <?php echo $cliente->getBirthday(); ?> </td>
                    <td bgcolor="LightGreen"> <?php echo $cliente->getEtiqueta(); ?> </td>
                    <td> <?php echo $cliente->getTipo(); ?> </td>

                    <td>
                        <a class=" btn btn-warning" href="controlador_cliente.php?accion=actualizar&cod_cliente=<?php echo $cliente->getCodCliente(); ?>">Editar</a>
                    </td>
                    <td>
                        <a class=" btn btn-danger" onclick="return confirmar_borrar()" href="controlador_cliente.php?accion=eliminar&cod_cliente=<?php echo $cliente->getCodCliente(); ?>">Eliminar</a>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <th colspan="13" class="align-top" bgcolor="white">
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
                    }
                    ?>
                </th>
            </tr>
        </tbody>
    </table>
    <script type="text/javascript">
        function confirmar_borrar() {
            var respuesta = confirm("¿Estás seguro de querer eliminar este cliente?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>
<?php
