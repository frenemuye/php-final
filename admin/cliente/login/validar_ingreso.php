<?php
/***aca en la primera linea inicia codigo sesion start por ser lo predeterminado en php***/
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
/***fin codigo inicia sesion start***/

require_once("../../../config/conexion.php");

$db = Db::conectar();
try{
    if(!isset($db)){
        $_SESSION["mensaje"] = "Error: No hay conexion con la base de datos.";
        header("location: index.php"); 
    }else{
        if (isset($_POST["login"]) && isset($_POST["clave"]) && isset($_POST["tipo"])) {
    
            $login = $_POST['login'];
            $clave = $_POST['clave'];
            $tipo = $_POST['tipo'];
            
            $consultaCliente = $db->prepare("SELECT * FROM cliente WHERE email = :login1 and contrasena = :clave1 and tipo = :tipo1");
            $consultaCliente->bindValue('login1', $login); //dentro de la consulta anterior metale a la var
            $consultaCliente->bindValue('clave1', $clave); //dentro de la consul anterior metale a la var
            $consultaCliente->bindValue('tipo1', $tipo); //dentro de la consul anterior metale a la var
            $consultaCliente->execute(); //ejecuta la consulta sql
            $elementoCliente = $consultaCliente->fetch(PDO::FETCH_ASSOC); //para consultas de una sola linea o fila
            //printf("<br>Cuantas coincidencias encontro: %d", $elementoUsuario); 
            // La constante PDO::FETCH_ASSOC hace que el arreglo solo tenga índices de texto, es decir. 
            // Es un array asociativo, sin esto enviaria los valores duplicados.
            // Usando índices numéricos e índices de texto
            // 
            
            //var_dump($elementoCliente);
            
            if ($elementoCliente != false) {
                $_SESSION["nombre"] = $login;
                $_SESSION["tipo"] = $tipo;
                $_SESSION["id"] = $elementoCliente["cod_cliente"];
    
                if($tipo == "Tendero"){
                    header("location: ../");
                    exit;
                } else if($tipo == "Supermercado"){
                    header("location: ../index_supermercado.php"); 
                    exit;
                }     
            } else {
                $_SESSION["mensaje"] = "Usuario o contraseña incorrectos";
                header("location: index.php"); 
            }
        }else{
            $_SESSION["mensaje"] = "Recuerde enviar todos los datos solicitados";
            header("location: index.php");
        }
    }
}catch( \Exception $e){
    var_dump($e);
}


//exit();
?>
