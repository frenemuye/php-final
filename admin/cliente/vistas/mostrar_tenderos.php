<?php
    if(!isset($listaTendero) || !isset($countTendero) ){
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
    <title>Tenderos</title>
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
                    <th scope="col" class="align-top">Cedula Tendero</th>
                    <th scope="col" class="align-top">Nombre Tendero</th>
                    <th scope="col" class="align-top">Contraseña Tendero</th>
                    <th scope="col" class="align-top">Repita Contraseña</th>
                    <th scope="col" class="align-top">Tipo de Tendero</th>

                    
                </tr>
            </thead>
            <tbody>
                <!--Obj lista de tenderos tiene la matriz de la consulta y mete la primera fila en obj. tendero-->
                <?php foreach ($listaTendero as $tendero) { ?>
                    <tr class="align-bottom">
                        <th scope="row" class="align-top"> <?php echo $tendero->getCodCliente(); ?> </th>
                        <td class="align-top"> <?php echo $tendero->getCedula(); ?> </td>
                        <td class="align-top"> <?php echo $tendero->getNombre(); ?> </td>
                        <td class="align-top"> •••••••• </td>
                        <td class="align-top"> •••••••• </td>
                        <td class="align-top"> <?php echo $tendero->getTipo(); ?> </td>                        
                    </tr>
                <?php }  ?>
                <th class="align-bottom">
                <th colspan="8" class="align-top" bgcolor="white">
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
    </div>

    <script type="text/javascript">
        function confirmar_borrar() {
            var respuesta = confirm("¿Estás seguro de querer eliminar este tendero?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>