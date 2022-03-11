<?php
session_start();

if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
    if ($_SESSION["tipo"] == "Supermercado") {
    } else {
        header("Location: login/");
    }
}else{
    header("Location: login/");
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
    <link rel="stylesheet" type="text/css" href="https://apartamentoamobladomedellin.com.co/login/usuario/css/css_backoffice_root.css">
    <link rel="stylesheet" type="text/css" href="../../css_backoffice_pedido_supermercado.css">
    <!-- fin libreria de los css + google fonts/ -->
    <title>ROOT</title>
</head>

<body>
    <div id="contenedor1">
        <header>
            <h1 align="center">Supermercados</h1><br>
        </header>
        <ul>
            <h5 style="color:black" ;>Pedidos <i class="fas fa-edit"></i></i> - <br>
                <a href="../pedido/controlador_pedido.php?accion=registrar_pedido" class="btn btn-primary" type="button">Hacer Pedido</a>
                <a href="../pedido/controlador_pedido.php?accion=mostrar_pedidos" class="btn btn-primary mt-1" type="button">Mostrar Pedido</a>
            </h5>
            <!-- conexion a la api de google hoja de calculo -->
        </ul>
        <br>
        <ul>
            <h2 class="subtitulo_negro">Salir del back office</h2>
            <li>
                <a href="login/cerrar.php" class="ver"> Salir </a>
            </li>
        </ul>

    </div>

    <script type="text/javascript">
        document.getElementById('formato').style.display = 'none';

        function ocultar2() {
            document.getElementById('formato').style.display = 'none';
        }

        function mostrar2() {
            document.getElementById('formato').style.display = 'block';
        }
    </script>

</body>

</html>