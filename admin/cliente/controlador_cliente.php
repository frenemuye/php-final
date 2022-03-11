<?php
session_start();
require_once("crud_cliente.php");
require_once("modelo_cliente.php");

$crud = new CrudCliente();
$cliente = new Cliente();

if(isset($_GET["accion"])){
	$accion = $_GET["accion"];

	if($accion == "registrar"){

		// Validacion para saber si me están enviando ya los datos del formulario
		if(isset($_POST["insertar"]))
		{
			$cliente->setCedula($_POST["cedula"]);
			$cliente->setNombre($_POST["nombre"]);
			$cliente->setEmail($_POST["email"]);
			$cliente->setTelefono($_POST["telefono"]);
			$cliente->setCelular($_POST["celular"]);
			$cliente->setDireccion($_POST["direccion"]);
			$cliente->setContrasena($_POST["contrasena"]);
			$cliente->setBirthday($_POST["birthday"]);
			$cliente->setEtiqueta($_POST["etiqueta"]);
			$cliente->setTipo($_POST["tipo"]);

			//var_dump($_POST);
			// inserta informacion en cliente
			$res = $crud->insertar($cliente);
			//var_dump($res);

			if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])){
				if($_SESSION["tipo"]=="Root" || $_SESSION["tipo"] == "User") {
					header('Location: ../usuario/login/');
				}else{
					header('Location: ../cliente/login/');
				}
			}
			else{
				header('Location: ../cliente/login/');
			}
		}

		//No es necesaria la estructura ELSE porque dentro del IF anterior todas las caminos terminan dirigiéndose a otra página
		include_once("vistas/registrar_cliente.php");

		
	}


	elseif($accion == "actualizar"){
		if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
			if($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User"){
				$cod_cliente = $_GET["cod_cliente"]; // se recibe desde actualizar cliente el id de la url
				if(isset($_POST["actualizar"])) //Actualiza cliente: Aca nunca se puede mandar por POST(oculta la informacion)//porque la informacion va por la url 
				{
					$cliente->setCedula($_POST["cedula"]);
					$cliente->setNombre($_POST["nombre"]);
					$cliente->setEmail($_POST["email"]);
					$cliente->setTelefono($_POST["telefono"]);
					$cliente->setCelular($_POST["celular"]);
					$cliente->setDireccion($_POST["direccion"]);
					$cliente->setContrasena($_POST["contrasena"]);
					$cliente->setBirthday($_POST["birthday"]);
					$cliente->setEtiqueta($_POST["etiqueta"]);
					$cliente->setTipo($_POST["tipo"]);

					$cliente->setCodCliente($cod_cliente);
					$res = $crud->actualizar($cliente);
					header('Location: controlador_cliente.php?accion=mostrar_clientes');
				}

				
				$cliente = $crud->consultarCliente($cod_cliente); //variable tipo vector de objeto
				include_once("vistas/actualizar_cliente.php");
			}else{
				header("Location: login/");
			}
		} else {
			//echo "No tienes permiso de estar acá, por favor inicia sesión.";
			header("Location: ../../");
		}
	}


	elseif($accion == "eliminar"){
		if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
			if($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User"){
				$cod_cliente=$_GET["cod_cliente"];
				$crud->eliminar($cod_cliente);
				header('Location: controlador_cliente.php?accion=mostrar_clientes');//ejecuque este archivo
			}else{
				header("Location: login/");
			}
		} else {
			//echo "No tienes permiso de estar acá, por favor inicia sesión.";
			header("Location: ../../");
		}
	}

	elseif($accion == "contar"){
		if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
			if($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User"){
				$listaCliente = $crud->contar_cliente(); //variable tipo vector de objeto (nos sirve para listar y listar lo buscado sea uno o varios registros) */
				include_once("vistas/contar.php");
			}else{
				header("Location: login/");
			}
		} else {
			//echo "No tienes permiso de estar acá, por favor inicia sesión.";
			header("Location: ../../");
		}
	}




	else if($accion == "mostrar_supermercados"){
		if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
            if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
                $listaSupermercado = $crud->listar("Supermercado");
                $countSupermercado = $crud->contar_cliente("Supermercado");
                include_once("vistas/mostrar_supermercados.php");
            }else{
				header("Location: login/");
			}
		} else {
			//echo "No tienes permiso de estar acá, por favor inicia sesión.";
			header("Location: index.php");
		}
	}




	else if($accion == "mostrar_tenderos"){
		if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
            if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
                $listaTendero = $crud->listar("Tendero");
                $countTendero = $crud->contar_cliente("Tendero");
                include_once("vistas/mostrar_tenderos.php");
            }else{
				header("Location: login/");
			}
		} else {
			//echo "No tienes permiso de estar acá, por favor inicia sesión.";
			header("Location: index.php");
		}
	}



	
	else if($accion == "mostrar_clientes"){
		if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
            if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
                $listaCliente = $crud->listar(null);
                include_once("vistas/mostrar_cliente.php");
            }else{
				header("Location: login/");
			}
		} else {
			//echo "No tienes permiso de estar acá, por favor inicia sesión.";
			header("Location: index.php");
		}
	}
}
?>