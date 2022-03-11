<?php
    if(!isset($usuario)){
        header("Location: ../../../");
    }

    $tipos = array(
        'User',
        'Root',
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
    <title>Editar datos de los empleados en la tabla usuario</title>
</head>

<body>
    <header>
        <center>
            <div class="alert alert-danger" role="alert">
                <?php echo "Hola " . $_SESSION["nombre"] . " Tu rol es: " . $_SESSION["tipo"] . " Tienes permisos para estar acá."; ?>
            </div>
        </center>
        <center><strong>
                <h1>ACTUALIZAR EMPLEADO</h1>
            </strong></center>
    </header>

    <form method="post">

        <label for="exampleInputCedula">Cédula Empleado:</label>
        <input required type="number" class="form-control" id="exampleInputCedula" aria-describedby="cedulaHelp" placeholder="Entre cédula" minlength="4" maxlength="19" name="cedula" value="<?php echo $usuario->getCedula(); ?>">
        <small id="cedulaHelp" class="form-text text-muted">Ingrese su documento</small>

        <label for="exampleInputNombre">Nombre Empleado:</label>
        <input required type="email" class="form-control" id="exampleInputNombre" aria-describedby="nombreHelp" placeholder="Ingrese su email" minlength="2" maxlength="100" name="nombre" value="<?php echo $usuario->getNombre(); ?>">
        <small id="nombreHelp" class="form-text text-muted">Ingrese su nombre de email</small>

        <label for="exampleInputContrasena">Contraseña:</label>
        <input required type="password" class="form-control" id="exampleInputContrasena" aria-describedby="contrasenaHelp" placeholder="Ingrese su contraseña" minlength="4" maxlength="20" name="contrasena" value="<?php echo $usuario->getContrasena(); ?>">
        <small id="contrasenaHelp" class="form-text text-muted">Ingrese su contraseña de ingreso a este módulo</small>

        <label for="exampleInputContrasena">Repita Contraseña:</label>
        <input required type="password" class="form-control" id="exampleInputContrasena" aria-describedby="contrasenaHelp" placeholder="Repita su contraseña" minlength="4" maxlength="20" name="contrasena1" value="<?php echo $usuario->getContrasena1(); ?>">
        <small id="contrasenaHelp" class="form-text text-muted">Repita su contraseña de ingreso a este módulo</small>

        <label>Tipo de usuario:</label>
        <select requerid type="text" name="tipo" value="" class="custom-select">
            <option><?php echo $usuario->getTipo(); ?></option>
            <option>User</option>
            <option>Root</option>
        </select>
        <small id="tipoHelp" class="form-text text-muted">Su perfil</small>

        <br>
        <center><button type="submit" value="Guardar" name="actualizar" class="btn btn-danger">Actualizar <i class="fas fa-save"></i></button></center>
    </form>

    <center>
        <a href="index_root.php">
            <h1 align="center">Salir</h1>
        </a>
    </center>

</body>
<script type="text/javascript">
    //validar que sean iguales las contraseñas    
</script>

</html>