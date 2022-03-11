<?php
/***aca en la primera linea inicia codigo sesion start por ser lo predeterminado en php***/
session_start();
//isset sirve para saber si una variable esta definida o no (definido es != a vacio) para saber si esta vacia usa la función empty()
if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
    $tipo = $_SESSION["tipo"];
    if ($tipo == "User") 
    {
        header("Location: ../");
    }
    else  
    {
        if ($tipo == "Root") 
        {
            header("Location: ../index_root.php");
        }
    }
}
/***fin codigo inicia sesion start***/


























require_once("../../../config/conexion.php");

$db = Db::conectar();

if(!isset($db))
{
    $_SESSION["mensaje"] = "Error: No hay conexion con la base de datos.";
    header("location: index.php"); 
}
else
{
    if (isset($_POST["login"]) && isset($_POST["clave"]) && isset($_POST["tipo"])) 
    {
        $login = $_POST['login'];
        $clave = $_POST['clave'];
        $tipo = $_POST['tipo'];
    
        $consultaUsuario = $db->prepare("SELECT * FROM usuario WHERE nombre = :login1 and contrasena = :clave1 and tipo = :tipo1");
        $consultaUsuario->bindValue('login1', $login); //dentro de la consulta anterior metale a la var
        $consultaUsuario->bindValue('clave1', $clave); //dentro de la consul anterior metale a la var
        $consultaUsuario->bindValue('tipo1', $tipo); //dentro de la consul anterior metale a la var
        $consultaUsuario->execute(); //ejecuta la consulta sql
        $elementoUsuario = $consultaUsuario->fetch(PDO::FETCH_ASSOC); //para consultas de una sola linea o fila
        //printf("<br>Cuantas coincidencias encontro: %d", $elementoUsuario);
        // La constante PDO::FETCH_ASSOC hace que el arreglo solo tenga índices de texto, es decir. 
        // Es un array asociativo, sin esto enviaria los valores duplicados.
        // Usando índices numéricos e índices de texto
        
        if ($elementoUsuario > 0) {
            $_SESSION["nombre"] = $login;
            $_SESSION["tipo"] = $tipo;
            $_SESSION["id"] = $elementoUsuario["id"];//guardo el id para hacer el pedido

            if($tipo == "User"){
                header("location: ../");
                exit;
            } else if($tipo == "Root"){
                //var_dump(__DIR__);
                header("location: ../index_root.php"); 
                exit;
            }
        } else {
            $_SESSION["mensaje"] = "Usuario o contraseña incorrectos";
            header("location: index.php"); 
        }
    }
    else
    {
        $_SESSION["mensaje"] = "Recuerde enviar todos los datos solicitados";
        header("location: index.php"); 
    }
}
?>
