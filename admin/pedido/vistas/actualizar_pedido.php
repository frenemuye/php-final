<?php
if (!isset($cod_pedido)) {
    header("Location: ../../../");
}

//var_dump($pedido->getFecha());
$fechaFormulario = null;
if ($pedido) {
    //lo llamo en esta variable para poder acomodar el formato de la fecha. para poner la fecha correcta en la tabla debo hacer esta conversion
    $fechaFormulario = date_create($pedido->getFecha());
    // y asi acomodo el formato en el orden deseado.
    $fechaFormulario = date_format($fechaFormulario, 'Y-m-d');
}

$estados = array(
    'Despachado',
    'Pendiente',
    'No se puede despachar: agotado',
    'Imposible despachar: descontinuado',
);
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
    <link rel="stylesheet" type="text/css" href="../../css/estilo_nuevo_empleado.css">
    <!-- fin libreria de los css + google fonts/ -->
    <title>Editar datos de los pedidos en la tabla pedido</title>
</head>

<body>
    <header>
        <br>
        <center><strong>
                <h1 class="titulo_dorado">EDITAR PEDIDO</h1>
            </strong></center>
    </header>

    <form method="post">

        <label for="cliente_cod">Cliente:</label>
        <select name="cliente_cod" class="form-control" id="cliente_cod" style="margin-bottom: 30px;">
            <?php
            foreach ($listaClientes as $cliente) { ?>
                <option value="<?= $cliente->getCodCliente() ?>" <?= ($cliente->getCodCliente() == $pedido->getClienteCod()) ? "selected" : "" ?>><?= $cliente->getCedula() . " / " . $cliente->getNombre() ?> </option>
            <?php }  ?>
        </select>

        <label for="exampleInputFecha">Fecha del pedido:</label>
        <input required type="date" class="form-control" id="exampleInputCedula" aria-describedby="FechaHelp" placeholder="Entre Fecha" minlength="4" maxlength="19" name="fecha" value="<?php echo $fechaFormulario; ?>">
        <small id="FechaHelp" class="form-text text-muted">Ingrese su documento</small>


        <label for="exampleInputEstado">Estado del pedido:</label>
        <select requerid type="text" name="estado" class="form-control custom-select" name="estado">
            <?php foreach ($estados as $estado) : ?>
                <option value="<?php echo $estado ?>" <?php if ($estado == $pedido->getEstado()) : ?> selected="selected" <?php endif; ?>><?php echo $estado ?></option>
            <?php endforeach; ?>
        </select>
        <small id="estadoHelp" class="form-text text-muted">Ingrese el Estado del pedido</small>

        <label for="exampleInputDetalle">Detalle:</label>        
        <textarea required rows="5" cols="10" type="text" class="form-control" id="exampleInputDetalle" aria-describedby="detalleHelp" placeholder="Detalle su pedido" name="detalle" ><?php echo $pedido->getDetalle(); ?></textarea>
        <small id="detalleHelp" class="form-text text-muted">Ingrese su detalle de ingreso a este módulo</small>

        <br>
        <center><button type="submit" name="actualizar" value="Guardar" class="btn btn-danger">Actualizar <i class="fas fa-save"></i></button></center>
    </form>

    <center>
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
    </center>

</body>
<script type="text/javascript">
    //validar que sean iguales las contraseñas    
</script>

</html>