<?php
    if(!isset($listaUsuario)){
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
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <!-- fin libreria de los css + google fonts/ -->
    <title>Usuarios</title>
</head>

<body>
    <center>
        <div class="alert alert-danger" role="alert">
            <?php echo "Hola " . $_SESSION["nombre"] . " Tu rol es: " . $_SESSION["tipo"] . " Tienes permisos para estar acá."; ?>
        </div>
    </center>
    <!-- El elemento HTML <th> define una celda como encabezado de un grupo de celdas en una tabla. 
        La naturaleza exacta de este grupo está definida por los atributos scope y headers . 
        La etiqueta de inicio es obligatoria.-->
    <div class="table-responsive">
        <table class="table align-middle table-hover table-dark" border="0" align="center" cellpadding="7">
            <thead>
                <tr class="align-bottom" bgcolor="gray">
                    <th scope="col" class="align-top">ID</th>
                    <th scope="col" class="align-top">Cedula Usuario</th>
                    <th scope="col" class="align-top">Nombre Usuario</th>
                    <th scope="col" class="align-top">Contraseña Usuario</th>
                    <th scope="col" class="align-top">Repita Contraseña</th>
                    <th scope="col" class="align-top">Tipo de Usuario</th>

                    
                </tr>
            </thead>
            <tbody>
                <!--Obj lista de usuarios tiene la matriz de la consulta y mete la primera fila en obj. usuario-->
                <?php foreach ($listaUsuario as $usuario) { ?>
                    <tr class="align-bottom">
                        <th scope="row" class="align-top"> <?php echo $usuario->getId();     ?> </th>
                        <td class="align-top"> <?php echo $usuario->getCedula(); ?> </td>
                        <td class="align-top"> <?php echo $usuario->getNombre(); ?> </td>
                        <td class="align-top"> •••••••• </td>
                        <td class="align-top"> •••••••• </td>
                        <td class="align-top"> <?php echo $usuario->getTipo(); ?> </td>                        
                    </tr>
                <?php }  ?>
                <tr class="align-bottom">
                    <th colspan="8" bgcolor="white"><a href="index_root.php" align="center">
                            <h1>Salir</h1>
                        </a>
                    </th>
                </tr>
            </tbody>
        </table>
    </div>

    <script type="text/javascript">
        function confirmar_borrar() {
            var respuesta = confirm("¿Estás seguro de querer eliminar este usuario?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>