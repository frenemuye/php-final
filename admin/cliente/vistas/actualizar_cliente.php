<?php
//Valido que la variable que el controlador le envia a la vista si exista, si no existe es porque alguien entró directamente a la vista burlando el controlador.
if (!isset($cliente)) {
    header("Location: ../../../");
} else {
    $fechaFormulario = date_create($cliente->getBirthday());
    $fechaFormulario = date_format($fechaFormulario, 'Y-m-d');

    $tipos = array(
        'Tendero',
        'Supermercado',
    );
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
    <link rel="stylesheet" type="text/css" href="../../css/estilo_nuevo_cliente.css">
    <!-- fin libreria de los css + google fonts/ -->
    <title>Editar datos de los clientes en la tabla cliente</title>
</head>

<body>
    <header>
        <br>
        <center><strong>
                <h1 class="titulo_dorado">EDITAR CLIENTE</h1>
            </strong></center>
    </header>
    <form method="post">
        <label for="exampleInputCedula">* Cédula Cliente:</label>
        <input required type="number" class="form-control" id="exampleInputCedula" aria-describedby="cedulaHelp" placeholder="Entre cédula" minlength="4" maxlength="19" name="cedula" value="<?php echo $cliente->getCedula(); ?>">
        <small id="cedulaHelp" class="form-text text-muted">Ingrese su cédula</small>

        <label for="exampleInputNombre">* Nombres Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputNombre" aria-describedby="nombreHelp" placeholder="Ingrese su nombre" minlength="2" maxlength="100" name="nombre" value="<?php echo $cliente->getNombre(); ?>">
        <small id="nombreHelp" class="form-text text-muted">Ingrese sus nombres</small>

        <label for="exampleInputemail">* Email Cliente:</label>
        <input required type="Email" class="form-control" id="exampleInputemail" aria-describedby="emailHelp" placeholder="Ingrese su email" minlength="2" maxlength="100" name="email" value="<?php echo $cliente->getEmail(); ?>">
        <small id="emailHelp" class="form-text text-muted">Ingrese su email</small>

        <label for="exampleInputtelefono">* Telefono Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputtelefono" aria-describedby="telefonoHelp" placeholder="Ingrese su teléfono" minlength="2" maxlength="100" name="telefono" value="<?php echo $cliente->getTelefono(); ?>">
        <small id="telefonoHelp" class="form-text text-muted">Ingrese su teléfono</small>

        <label for="exampleInputcelular">* Celular Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputCelular" aria-describedby="celularHelp" placeholder="Ingrese su celular" minlength="2" maxlength="100" name="celular" value="<?php echo $cliente->getCelular(); ?>">
        <small id="celular" class="form-text text-muted">Ingrese su celular</small>

        <label for="exampleInputDireccion">* Direccion Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputdireccion" aria-describedby="direccionHelp" placeholder="Ingrese su dirección" minlength="2" maxlength="100" name="direccion" value="<?php echo $cliente->getDireccion(); ?>">
        <small id="direccion" class="form-text text-muted">Ingrese su dirección</small>

        <label for="exampleInputContrasena">* Contraseña:</label>
        <input required type="password" class="form-control" id="exampleInputContrasena" aria-describedby="contrasenaHelp" placeholder="Ingrese su contraseña" minlength="4" maxlength="20" name="contrasena" value="<?php echo $cliente->getContrasena(); ?>">
        <small id="contrasenaHelp" class="form-text text-muted">Ingrese su contraseña de ingreso a este módulo</small>

        <label for="exampleInputBirthday:">Happy Birthday</label>
        <input required type="date" class="form-control" id="exampleInputBirthday" aria-describedby="Birthday" placeholder="Ingrese su Birthday" minlength="2" maxlength="100" name="birthday" value="<?= $fechaFormulario ?>">
        <small id="birthday" class="form-text text-muted">Ingrese su Birthday</small>

        <label for="exampleInputEtiqueta:">Etiqueta</label>
        <input type="text" class="form-control" id="exampleInputEtiqueta" aria-describedby="Etiqueta" placeholder="Ingrese su Etiqueta" minlength="2" maxlength="100" name="etiqueta" value="<?php echo $cliente->getEtiqueta(); ?>">
        <small id="Etiqueta" class="form-text text-muted">Ingrese su Etiqueta</small>

        <label>* Tipo de Cliente:</label>
        <select requerid type="text" name="tipo" class="custom-select form-control">
            <?php foreach ($tipos as $tipo) : ?>
                <option value="<?php echo $tipo ?>" <?= ($tipo == $cliente->getTipo()) ? "selected" : "" ?>><?php echo $tipo ?></option>
            <?php endforeach; ?>
        </select>
        <small id="tipoHelp" class="form-text text-muted">Su perfil</small>
        <br>
        <center><button type="submit" value="Guardar" name="actualizar" class="btn btn-danger">Actualizar <i class="fas fa-save"></i></button></center>
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