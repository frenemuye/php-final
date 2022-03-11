<?php
    if(!isset($es_empleado)){
        //empleado esta definido en el controlador como false o true
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

    <!-- Se agrega estilos de la libreria SelectJS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link rel="stylesheet" type="text/css" href="../../css/estilo_nuevo_pedido.css">
    <style>
        .select2-container--default .select2-selection--single {
            border: none;
        }

        .select2-container{
            display: block;
            width: auto;
            /*height: calc(1.5em + .75rem + 2px);*/
            height: auto;
            /*padding: .375rem .75rem;*/
            padding: 5px;            
            font-size: 16px;
            font-weight: bold;
            line-height: 1.5;/*espaciado entre filas*/
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: .25rem;
        }
    </style>
    <!-- fin libreria de los css + google fonts/ -->
    <title>Ingresar pedido</title>
</head>

<body>
<header>
    <center>
        <strong>
            <h1>NUEVO PEDIDO</h1>
        </strong>
    </center>
</header>
<form id="principal"  method="post">
    
<?php
    //si es empleado uso el select2 llenandolo con todas las cedulas para que el emplado busque la cedula
    if($es_empleado){
        ?>
        <label for="cliente_cod">Cliente:</label>
        <select name="cliente_cod" class="form-control" id="cliente_cod"  style="margin-bottom: 30px;">
        <?php
        foreach ($listaClientes as $cliente) { ?>
            <option value="<?= $cliente->getCodCliente() ?>"> 
                <?= $cliente->getCedula() . " / " . $cliente->getNombre() ?> 
            </option>
        <?php }  ?>
        </select>
    <?php
    }else{
        //si no es empleado entonces es cliente y lo saludamos
        echo "Hola " . $_SESSION["nombre"] . ". Haremos un pedido a tu nombre.<br><br>";
    }
?>

    <label for="exampleInputfecha" class="mt-2" >fecha del Pedido:</label>
    <input required type="date" class="form-control" id="exampleInputFecha" aria-describedby="FechaHelp" placeholder="Entre Fecha" minlength="4" maxlength="19" name="fecha" value="">
    <small id="Fechaelp" class="form-text text-muted">Ingrese la fecha actual</small>

    <label for="exampleInputContrasena">Detalle:</label>
    <textarea required rows="8" cols="10" type="text" class="form-control" id="exampleInputDetalle" aria-describedby="detalleHelp" placeholder="Detalle su pedido" name="detalle" value=""></textarea>
    <small id="detalleHelp" class="form-text text-muted">Ingrese su Detalle de ingreso a este módulo</small>

    <br>
    <!--<input type="hidden" name="insertar" value="insertar">tambien se puede hacer asi y al boton no se le pone name-->
    <center><button type="submit" name="insertar" value="Guardar" class="btn btn-danger">Ingresar <i class="fas fa-save"></i></button></center>
</form>
</div>
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
}elseif ($_SESSION["tipo"] == "Tendero") { ?>
    <a href="../cliente/index.php" align="center">
        <h1>Salir</h1>
    </a>
<?php
}else{ ?>
    <a href="../cliente/index_supermercado.php" align="center">
        <h1>Salir</h1>
    </a>
<?php
}
?>
    
</center>
<center>
    <hr><a href="https://api.whatsapp.com/send?phone=573122270911">
        <p><i class="fab fa-whatsapp"> Envianos un mensaje si hay alguna dificultad en tu pedido.</p></i>
        <hr><br>
</center>

<!-- Se agrega la libreria Jquery y SelectJS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Se agrega el selector para implementar la funcionalidad de Select2, sea de elemento, id o clase -->
<script>
    $(document).ready(function() {
        $('#cliente_cod').select2();
    });
</script>
</body>
