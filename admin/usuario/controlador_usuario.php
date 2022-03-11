<?php
session_start();
require_once("crud_usuario.php");
require_once("modelo_usuario.php");

$crud = new CrudUsuario();
$usuario = new Usuario();

//Validamos que esté loguado antes de hacer cualquier acción sobre un usuario
if(isset($_SESSION["nombre"]) && isset($_SESSION["tipo"])){

	//Validamos que la persona logueda sea Root antes de hacer cualquier acción sobre un usuario
	if($_SESSION["tipo"] == "Root")
	{

		//Validamos la acción escogida por la persona y recibida por el controlador
		if(isset($_GET["accion"]))
		{
			



			$accion = $_GET["accion"];
		
			if($accion == "registrar")
			{
				if(isset($_POST["insertar"]))// inserta informacion en usuario
				{
					$usuario->setCedula($_POST["cedula"]);
					$usuario->setNombre($_POST["nombre"]);
					$usuario->setContrasena($_POST["contrasena"]);
					$usuario->setContrasena1($_POST["contrasena1"]);
					$usuario->setTipo($_POST["tipo"]);
		
					$crud->insertar($usuario);
					header('Location: controlador_usuario.php?accion=mostrar');
				}
		
				include_once("vistas/registrar_usuario.php");
			}
			
			
			
			elseif($accion == "actualizar")
			{
				$id = $_GET["id"]; // se recibe el id de la url
				if(isset($_POST["actualizar"])) //Actualiza usuario: Aca nunca se puede mandar por POST(oculta la informacion) porque la informacion va por la url
				{
					$usuario->setCedula($_POST["cedula"]);
					$usuario->setNombre($_POST["nombre"]);
					$usuario->setContrasena($_POST["contrasena"]);
					$usuario->setContrasena1($_POST["contrasena1"]);
					$usuario->setTipo($_POST["tipo"]);
					$usuario->setId($id);
					$crud->actualizar($usuario);
					header('Location: controlador_usuario.php?accion=mostrar');
				}
				$usuario = $crud->consultarUsuario($id); //variable tipo vector de objeto
				include_once("vistas/actualizar_usuario.php");
			}
		
		
		
			elseif($accion == "mostrar"){
				$listaUsuario = $crud->listar(null);
				include_once("vistas/mostrar_usuario.php");
			}
		
		
		
			elseif($accion == "mostrar_root"){
				$listaUsuario = $crud->listar("Root");
				include_once("vistas/solo_mostrar_root.php");
			}
		
		
			elseif($accion == "mostrar_usuario"){
				$listaUsuario = $crud->listar("User");
				$countUsuario = $crud->contar_usuario();
				include_once("vistas/solo_mostrar_usuario.php");
			}
		
		
		
			elseif($accion == "contar_usuario"){
				$listaUsuario = $crud->contar_usuario();
				include_once("vistas/solo_contar_usuario.php");
			}
		
		
			elseif($accion == "eliminar"){
				if(isset($_GET["id"]))//Eliminar un usuario: Aca nunca se puede mandar por POST(oculta la inform.) porque la informacion va por la url 
				{  
					$id=$_GET["id"];
					$crud->eliminar($id);
					header('Location: controlador_usuario.php?accion=mostrar');
				}
			}
		}
		else{
			header('Location: ../usuario/login/');
		}
	}
	else{
		header('Location: ../usuario/login/');
	}
}
else{
	header('Location: ../../../');
}


?>