<?php
session_start();

if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) //empleado o cliente
{
	//Para hacer cualquier acción dentro de este controlador, se necesita estar logueado

    //usamos modelo_cliente.php y al crud para poder hacer la busqueda y relacionarla con el pedido
    require_once("modelo_pedido.php");
    require_once("crud_pedido.php");
    $crud =new CrudPedido;
    $pedido = new Pedido();


    if (isset($_GET["accion"])) {
		$accion = $_GET["accion"];


        if ($accion == "registrar_pedido") {
            // Revisar si se envió datos del formulario
            if (isset($_POST["insertar"])) { // Inserta información en pedido
                if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
                    $pedido->setClienteCod($_POST["cliente_cod"]);//consultado manualmente en la vista x select2
                } else {
                    $pedido->setClienteCod($_SESSION["id"]);//viene de la session x q el cliente se sesionó
                }
                $pedido->setFecha($_POST["fecha"]);
                $pedido->setDetalle($_POST["detalle"]);

                $res = $crud->insertar($pedido);

                header('Location: controlador_pedido.php?accion=mostrar_pedidos');
            }
            // Hasta acá la parte del POST. en caso de llenar el formumlario y darle enviar

            $es_empleado = false;
            if (isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])) {
                if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
                    $es_empleado = true;
                }
            } else {
                //echo "No tienes permiso de estar acá, por favor inicia sesión.";
                header("Location: ../../index.php");
            }

			//solo 5 lineas de codigo del cliente
            require_once("../cliente/modelo_cliente.php");
            require_once("../cliente/crud_cliente.php");
            $cliente = new Cliente();
            $crudCliente = new CrudCliente();
            $listaClientes = $crudCliente->listar(null);

            include_once("vistas/registrar_pedido.php");
        }
        
		
		
		
		
		
		
		elseif ($accion == "actualizar_pedido") {
            if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
                $cod_pedido = $_GET["cod_pedido"]; // se recibe el id de la url
                if (isset($_POST["actualizar"])) { //Actualiza pedido: Aca nunca se puede mandar por POST(oculta la informacion)//porque la informacion va por la url
                    //var_dump($_POST);
                    $pedido->setFecha($_POST["fecha"]);
                    $pedido->setEstado($_POST["estado"]);
                    $pedido->setDetalle($_POST["detalle"]);
                    $pedido->setClienteCod($_POST["cliente_cod"]);
                    $pedido->setCodPedido($cod_pedido);
                    $crud->actualizar($pedido);
                    header('Location: controlador_pedido.php?accion=mostrar_pedidos');
                }
                $pedido = $crud->consultarPedido($cod_pedido); //variable tipo vector de objeto
				
				//solo 5 lineas de codigo del cliente
				require_once("../cliente/modelo_cliente.php");
				require_once("../cliente/crud_cliente.php");
				$cliente = new Cliente();
				$crudCliente = new CrudCliente();
				$listaClientes = $crudCliente->listar(null);
                
                include_once("vistas/actualizar_pedido.php");
            } else {
            	//como es diferente a empleado lo envia inmediatalente a loguearse.
                header("location: ../cliente/login/");
            }
		}
		
		
		
		
		
		
		elseif ($accion == "mostrar_pedidos") {
            $listaPedidos = null;
            if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
                $listaPedidos = $crud->listar(null);
            } else {
                $listaPedidos = $crud->listar($_SESSION["id"]);
            }
     		include_once("vistas/mostrar_pedidos.php");
		}
		
		
		
		
		
		
		elseif ($accion == "eliminar") {
			if ($_SESSION["tipo"] == "Root" || $_SESSION["tipo"] == "User") {
				$cod_pedido=$_GET["cod_pedido"];
				$crud->eliminar($cod_pedido);
				header('Location: controlador_pedido.php?accion=mostrar_pedidos');
			} else {
				header("location: ../cliente/login/");
			}
		
		
		
		
		
		} else {
			//Función que se ejecuta cuando no encuentra una accion reconocida
			header("location: ../../");
		}
	} else {
		//Función que se ejecuta cuando no envió una acción
		header("location: ../../");
    }
}else {
	//echo "No tienes permiso de estar acá, por favor inicia sesión.";
	header("Location: ../../index.php");
}


?>