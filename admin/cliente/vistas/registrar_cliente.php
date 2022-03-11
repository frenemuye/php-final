<?php
    if(!isset($accion)){
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
    <link rel="stylesheet" type="text/css" href="../../css/estilo_nuevo_cliente.css">
    <!-- fin libreria de los css + google fonts/ -->
    <title>Insertar datos de los clientes</title>
</head>

<body>
    <header>
        <br>
        <center><strong>
                <h1>NUEVO CLIENTE</h1>
            </strong></center>
    </header>

    <form method="post">
        <label for="exampleInputCedula">* Cédula Cliente:</label>
        <input required type="number" class="form-control" id="exampleInputCedula" aria-describedby="cedulaHelp" placeholder="Entre cédula" minlength="4" maxlength="19" name="cedula" value="">
        <small id="cedulaHelp" class="form-text text-muted">Ingrese su cédula</small>

        <label for="exampleInputNombre">* Nombres Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputNombre" aria-describedby="nombreHelp" placeholder="Ingrese su nombre" minlength="2" maxlength="100" name="nombre" value="">
        <small id="nombreHelp" class="form-text text-muted">Ingrese sus nombres</small>

        <label for="exampleInputemail">* Email Cliente:</label>
        <input required type="Email" class="form-control" id="exampleInputemail" aria-describedby="emailHelp" placeholder="Ingrese su email" minlength="2" maxlength="100" name="email" value="">
        <small id="emailHelp" class="form-text text-muted">Ingrese su email</small>

        <label for="exampleInputtelefono">* Telefono Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputtelefono" aria-describedby="telefonoHelp" placeholder="Ingrese su teléfono" minlength="2" maxlength="100" name="telefono" value="">
        <small id="telefonoHelp" class="form-text text-muted">Ingrese su teléfono</small>

        <label for="exampleInputcelular">* Celular Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputCelular" aria-describedby="celularHelp" placeholder="Ingrese su celular" minlength="2" maxlength="100" name="celular" value="">
        <small id="celular" class="form-text text-muted">Ingrese su celular</small>

        <label for="exampleInputDireccion">* Direccion Cliente:</label>
        <input required type="text" class="form-control" id="exampleInputdireccion" aria-describedby="direccionHelp" placeholder="Ingrese su dirección" minlength="2" maxlength="100" name="direccion" value="">
        <small id="direccion" class="form-text text-muted">Ingrese su dirección</small>

        <label for="exampleInputContrasena">* Contraseña:</label>
        <input required type="password" class="form-control" id="exampleInputContrasena" aria-describedby="contrasenaHelp" placeholder="Ingrese su contraseña" minlength="4" maxlength="20" name="contrasena" value="">
        <small id="contrasenaHelp" class="form-text text-muted">Ingrese su contraseña de ingreso a este módulo</small>

        <label for="exampleInputBirthday:">Happy Birthday</label>
        <input required type="date" class="form-control" id="exampleInputBirthday" aria-describedby="Birthday" placeholder="Ingrese su Birthday" minlength="2" maxlength="100" name="birthday" value="">
        <small id="birthday" class="form-text text-muted">Ingrese su Birthday</small>

        <label for="exampleInputEtiqueta:">Etiqueta</label>
        <input type="text" class="form-control" id="exampleInputEtiqueta" aria-describedby="Etiqueta" placeholder="Ingrese su Etiqueta" minlength="2" maxlength="100" name="etiqueta" value="" disabled>
        <small id="Etiqueta" class="form-text text-muted">Ingrese su Etiqueta</small>

        <label>* Tipo de Cliente:</label>
        <select requerid type="text" name="tipo" value="" class="custom-select form-control">
            <option>Tendero</option>
            <option>Supermercado</option>
        </select>
        <small id="tipoHelp" class="form-text text-muted">Su perfil</small>

        <br>
        <center><button type="submit" name="insertar" value="Guardar" class="btn btn-danger">Ingresar <i class="fas fa-save"></i></button></center>
    </form>
    </div>
    <br>
    <center>
    <?php
    if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
        if ($_SESSION["tipo"] == "Root") { ?>
        <a href="../usuario/index_root.php">
            <h1>Salir</h1>
        </a>
        <?php
        } else if ($_SESSION["tipo"] == "User"){ ?>
            <a href="../usuario/index.php">
                <h1>Salir</h1>
            </a>
        <?php
        } elseif ($_SESSION["tipo"] == "Tendero") { ?>
            <a href="../cliente/index.php" align="center">
                <h1>Salir</h1>
            </a>
        <?php
        } else{ ?>
            <a href="../cliente/index_supermercado.php" align="center">
                <h1>Salir</h1>
            </a>
        <?php
        }
    }else{ ?>
        <a href="../../index.html">
            <h1>Salir</h1>
        </a>
    <?php
    }
    ?>
        
    
    </center>

        <script type="text/javascript">
        //validar que sean iguales las contraseñas
        window.addEventListener("load", function(event) {
            let n = document.querySelector("#exampleInputemail");
            if(n != null){
                n.value = "@";
            }

            let p = document.querySelector("#exampleInputContrasena");
            if(p != null){
                p.value = "";
            }
        });
    </script>
</body>

</html>