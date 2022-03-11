<?php
require_once("../../config/conexion.php");

class CrudUsuario{

    //no usa variables
    
    public function __construct(){ }

    public function insertar($usuario)// procedimiento que recibe un dato y no devuelve nada
    {
        $db = Db::conectar(); 

        $insert = $db->prepare('INSERT INTO usuario VALUES(NULL, :cedula, :nombre, :contrasena, :contrasena1, :tipo)');
        /*$insert->bindValue('id',     $usuario->getId()); no se puede pedir el id porque se genera automaticamente*/
        $insert->bindValue('cedula', $usuario->getCedula());// mete en cedula lo que hay en el objeto en $usuario->getCedula()
        $insert->bindValue('nombre', $usuario->getNombre());// mete en nombre lo que hay en el objeto en $usuario->getNombre()
        $insert->bindValue('contrasena', $usuario->getContrasena());
        $insert->bindValue('contrasena1', $usuario->getContrasena1());
        $insert->bindValue('tipo', $usuario->getTipo());

        $insert->execute(); //ejecuta la consulta sql haciendo la inseccion en la base de datos 
    }

    //mostrar usuario
    public function listar($tipo) //este es un procedimiento
    {
        $db = Db::conectar();// le asignamos la conexion que hay en conexion.php db::conectar es lo mismo en c# "clase estatica" db.conectar
        if($tipo == null){
            $consultaDeBaseDeDatos = $db->query("SELECT * FROM usuario");
        }else{
            $consultaDeBaseDeDatos = $db->query("SELECT * FROM usuario where tipo='$tipo'");
        }
        // consulta dentro de db y trae unos datos adicionales.
        $listaDeBaseDeDatos = $consultaDeBaseDeDatos->fetchAll(); //aca limpiamos la matriz y queda con las filas de los datos innecesarios, con la funcion fectall

        $listaDondeGuardarObjetosDeTipoUsuario = []; //vector vacio

        foreach ($listaDeBaseDeDatos as $filaParaCrearUnUsuario) //convierte lista de bd a lista de objeto
        {
            $objetoUsuario = new Usuario();//crea un objeto Libro con id,nombre,autor,paginas,editorial,anioedicion.
            $objetoUsuario->setId($filaParaCrearUnUsuario["id"]);//mete la informacion del id de la bd a la id del objeto
            $objetoUsuario->setCedula($filaParaCrearUnUsuario["cedula"]);
            $objetoUsuario->setNombre($filaParaCrearUnUsuario["nombre"]);
            $objetoUsuario->setContrasena($filaParaCrearUnUsuario["contrasena"]);
            $objetoUsuario->setContrasena1($filaParaCrearUnUsuario["contrasena1"]);
            $objetoUsuario->setTipo($filaParaCrearUnUsuario["tipo"]);

            $listaDondeGuardarObjetosDeTipoUsuario[] = $objetoUsuario;//vacio el vector y lo inicializo nuevamente como vector vacio
        }
        
        return $listaDondeGuardarObjetosDeTipoUsuario;
    }

    
    
    /* aca va una funcion de consultar */
    public function consultarUsuario($id)// en esta funcion  recibimos un codigo id para consultar el usuario
    {
        $db=Db::conectar();
        $consultaUsuario= $db->prepare("SELECT * FROM usuario WHERE id = :id");//aca prepara la consulta
        $consultaUsuario->bindValue('id', $id);//dentro de la consulta anterior metale a la variable 
                                             //id el valor del parametro de entrada de la funcion $id
        $consultaUsuario->execute();//ejecuta la consulta sql

        $elementoUsuario =$consultaUsuario->fetch();//para consultas de una sola linea o fila
        $usuario = new Usuario();// esta creando un objeto
        $usuario->setId($id);
        $usuario->setCedula($elementoUsuario["cedula"]);
        $usuario->setNombre($elementoUsuario["nombre"]);
        $usuario->setContrasena($elementoUsuario["contrasena"]);
        $usuario->setContrasena1($elementoUsuario["contrasena1"]);
        $usuario->setTipo($elementoUsuario["tipo"]);

        return $usuario; // retornamos todo lo que pregunto en la consulta del un determinado id
    }

    public function actualizar($usuario)
    {
        $db=Db::conectar();
        $consultaUsuario=$db->prepare("UPDATE usuario SET cedula=:cedula, nombre=:nombre, contrasena=:contrasena, contrasena1=:contrasena1, tipo=:tipo WHERE id=:id");

        $consultaUsuario->bindValue("cedula", $usuario->getCedula()); //preparar
        $consultaUsuario->bindValue("nombre", $usuario->getNombre()); //preparar
        $consultaUsuario->bindValue("contrasena", $usuario->getContrasena()); //preparar
        $consultaUsuario->bindValue("contrasena1", $usuario->getContrasena1()); //preparar
        $consultaUsuario->bindValue("tipo", $usuario->getTipo()); //preparar

        $consultaUsuario->bindValue("id", $usuario->getId()); //preparar
        $consultaUsuario->execute();//ejecuta la consulta sql
    }

    public function eliminar($id)
    {
        $db=Db::conectar();
        $consultaEliminar=$db->prepare("DELETE FROM usuario WHERE id=:id");
        $consultaEliminar->bindValue("id", $id); //preparar
        $consultaEliminar->execute();//ejecuta la consulta sql
    }

//consultas varias
public function contar_usuario() //este es un procedimiento
    {
        $db = Db::conectar(); // le asignamos la conexion que hay en conexion.php db::conectar es lo mismo en c# "clase estatica" db.conectar
        $consultaDeBaseDeDatos = $db->query("SELECT count(*) FROM usuario where tipo ='User'"); // consulta dentro de db y trae unos datos adicionales.
        $listaDeBaseDeDatos = $consultaDeBaseDeDatos->fetch(); // aca limpiamos la matriz y queda con las filas de los datos innecesarios, con la funcion fectall
        return $listaDeBaseDeDatos;
    }



}
?>