<?php
session_start();
//isset sirve para saber si una variable esta definida o no (definido es != a vacio) para saber si esta vacia usa la función empty()
if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
    $tipo = $_SESSION["tipo"];
    if ($tipo == "Tendero") {
        header("Location: ../");
    }
    else if ($tipo == "Supermercado") {
        header("Location: ../index_supermercado.php");
    }
    else if ($tipo == "User") {
        header("Location: ../../usuario/index.php");
    }
    else if ($tipo == "Root") {
        header("Location: ../../usuario/index_root.php");
    }
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
    <link rel="stylesheet" type="text/css" href="../../../css/css_backoffice_empleado.css">
    <!-- fin libreria de los css + google fonts/ -->
    <title>MODULO DE INGRESO - APARTAMENTOS AMOBLADOS MEDELLIN</title>
</head>

<body>

    <header>
        <strong>
            <center>
                <div class="alert alert-primary" role="alert">
                    <h3>LOGINBACK OFFICE EMPLEADOS</h3>
                </div>
                <?php if(isset($_SESSION["mensaje"])){ ?>
                    <div class="alert alert-warning" role="alert">
                        <h4><?= $_SESSION["mensaje"] ?></h4>
                    </div>
                <?php
                unset($_SESSION["mensaje"]);
                } ?>
            </center>
        </strong>
    </header>

    <form action="validar_ingreso.php" method="post">
        <div class="form-group">
            <label for="InputEmail">Empleado del sistema</label>
            <input placeholder="ingrese el login" type="email" minlength="7" maxlength="99" name="login" value="" id="InputEmail" aria-describedby="emailHelp" class="form-control" requerid>
            <small id="emailHelp" class="form-text text-muted">Ingrese su email o correo electrónico.</small>
        </div>
        <div class="form-group">
            <label for="InputPassword">Contraseña:</label>
            <input placeholder="ingrese el password" type="password" minlength="4" maxlength="19" name="clave" value="" id="InputPassword" class="form-control" requerid>
            <small id="passwordHelp" class="form-text text-muted">Ingresa la contraseña asociada a este email.</small>
        </div>
        <div class="form-group">
            <label for="InputType">Tipo de Empleado:</label>
            <select type="text" name="tipo" value="" class="custom-select">
                <option>User</option>
                <option>Root</option>
            </select>
            <br><br>
            <center>
                <button type="submit" value="Ingresar" class="btn btn-warning">Ingresar</button></center>
    </form>
    <br><br>
    <center><a href="../../../">
            <h5 align="center">Volver al sitio web</h5>
        </a></center>

</body>

</html>