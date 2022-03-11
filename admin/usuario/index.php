<?php

/***aca continua el codigo sesion start y va arriba por ser lo predeterminado en php***/
session_start();

if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
    if ($_SESSION["tipo"] == "User") {
        //echo "<center><b>BIENVENIDO</b></center>";
        //echo "<center><b><p style='color:blue'>Hola " . $_SESSION["nombre"] . "</p></b></center>";
    }
} else {
    //echo "No tienes permiso de estar acá, por favor inicia sesión.";
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
    <!-- activar libreria bootstreap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> <!-- fin activar libreria bootstreap -->
    <!-- libreria de los iconos asombrosos de fontawesome.com/ siempre va debajo de la libreria de booststrap -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- fin libreria de los iconos asombrosos de fontawesome.com/ -->
    <!-- libreria de los css + google fonts/ -->
    <link rel="stylesheet" type="text/css" href="../../css/css_backoffice_empleado.css">
    <!-- fin libreria de los css + google fonts/ -->
    <title>Usuarios</title>
</head>

<body>
    <center>
        <div class="alert alert-danger" role="alert">
            <?php echo "Empledo:" . $_SESSION["nombre"] . " Tu rol es: " . $_SESSION["tipo"] . " Tienes permisos para estar acá."; ?>
        </div>
    </center>
    <div id="contenedor1">
        <header>
            <h1 align="center">BackOffice Empleado</h1><br>
        </header>
      
        <!-- inicia cliente-->
        <div class="menu" style="border:gray solid 1px;">
            <ul>
                <h5 style="color:black" ;> Creación de cliente <i class="fas fa-plus-circle"></i> -
                    <button id="btn_ocultar" type="button" class="btn btn-primary" onclick="ocultar3()">Ocultar</button>
                    <button id="btn_mostrar" type="button" class="btn btn-primary" onclick="mostrar3()">Mostrar</button>
                </h5>
                <div id="clientes">
                    <li>
                        <a href="../cliente/controlador_cliente.php?accion=registrar" class="advertencia"> Nuevo cliente <i class="fas fa-edit"></i></a>
                    </li>
                    <br>
                    <li>
                        <a href="../cliente/controlador_cliente.php?accion=mostrar_clientes" class="ver"> Ver clientes <i class="fas fa-table"></i></a>
                    </li>
                </div>
            </ul>
            <ul>
                <h5 style="color:black" ;> Consultas a clientes <i class="fas fa-plus-circle"></i> -
                    <button id="btn_ocultar" type="button" class="btn btn-primary" onclick="ocultar4()">Ocultar</button>
                    <button id="btn_mostrar" type="button" class="btn btn-primary" onclick="mostrar4()">Mostrar</button>
                </h5>
                <div id="consultas_clientes">
                    <li>
                        <a href="../cliente/controlador_cliente.php?accion=contar" class="ver"> Cantidad de clientes <i class="fas fa-table"></i></a>
                    </li>
                    <br>
                    <li>
                        <a href="../cliente/controlador_cliente.php?accion=mostrar_tenderos" class="ver"> Ver clientes de Tendero <i class="fas fa-table"></i></a>
                    </li>
                    <br>
                    <li>
                        <a href="../cliente/controlador_cliente.php?accion=mostrar_supermercados" class="ver"> Ver clientes de Super <i class="fas fa-table"></i></a>
                    </li>
                </div>
            </ul>
        </div>
        <!-- cierra cliente-->
        <br>
        <!-- inicia pedidos-->
        <div class="menu" style="border:gray solid 1px;">
            <ul>
                <h5 style="color:black" ;> Creación de pedidos <i class="fas fa-plus-circle"></i> -
                    <button id="btn_ocultar" type="button" class="btn btn-primary" onclick="ocultar5()">Ocultar</button>
                    <button id="btn_mostrar" type="button" class="btn btn-primary" onclick="mostrar5()">Mostrar</button>
                </h5>
                <div id="pedidos">
                    <li>
                        <a href="../pedido/controlador_pedido.php?accion=registrar_pedido" class="advertencia"> Nuevo pedido <i class="fas fa-edit"></i></a>
                    </li>
                    <br>
                    <li>
                        <a href="../pedido/controlador_pedido.php?accion=mostrar_pedidos" class="ver"> Ver pedidos <i class="fas fa-table"></i></a>
                    </li>
                </div>
            </ul>
        </div>
        <!-- cierra pedidos-->
        <br>
        <ul>
            <h2 class="subtitulo_negro">Salir del BackOffice</h2>
            <li>
                <a href="login/cerrar.php" class="ver"> Salir </a>
            </li>
        </ul>
    </div>
    <script type="text/javascript">
        document.getElementById('clientes').style.display = 'none';
        document.getElementById('consultas_clientes').style.display = 'none';
        document.getElementById('pedidos').style.display = 'none';
        document.getElementById('consultas_pedidos').style.display = 'none';

        function ocultar3() {
            document.getElementById('clientes').style.display = 'none';
        }

        function mostrar3() {
            document.getElementById('clientes').style.display = 'block';
        }

        function ocultar4() {
            document.getElementById('consultas_clientes').style.display = 'none';
        }

        function mostrar4() {
            document.getElementById('consultas_clientes').style.display = 'block';
        }

        function ocultar5() {
            document.getElementById('pedidos').style.display = 'none';
        }

        function mostrar5() {
            document.getElementById('pedidos').style.display = 'block';
        }

        function ocultar6() {
            document.getElementById('consultas_pedidos').style.display = 'none';
        }

        function mostrar6() {
            document.getElementById('consultas_pedidos').style.display = 'block';
        }
    </script>

</body>

</html>