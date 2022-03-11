<?php
require_once("../../config/conexion.php");

class CrudCliente{

    public function __construct(){}

    public function insertar($cliente)// procedimiento que recibe un dato y no devuelve nada
    {
        try {
            $db = Db::conectar(); 
            if($db != null){
                $insert = $db->prepare('INSERT INTO cliente VALUES(NULL, :cedula, :nombre, :email, :telefono, :celular, :direccion, :contrasena, :birthday, :etiqueta, :tipo)');
                $insert->bindValue('cedula', $cliente->getCedula());// mete en cedula lo que hay en el objeto en 
                $insert->bindValue('nombre', $cliente->getNombre());// mete en nombre lo que hay en el objeto en 
                $insert->bindValue('email', $cliente->getEmail());
                $insert->bindValue('telefono', $cliente->getTelefono());
                $insert->bindValue('celular', $cliente->getCelular());
                $insert->bindValue('direccion', $cliente->getDireccion());
                $insert->bindValue('contrasena', $cliente->getContrasena());
                $insert->bindValue('birthday', $cliente->getBirthday());
                $insert->bindValue('etiqueta', $cliente->getEtiqueta());
                $insert->bindValue('tipo', $cliente->getTipo());
                return $insert->execute(); //ejecuta la consulta sql haciendo la inseccion en la base de datos 
            }else{
                return "bad connetion";
            }
        } catch (\Throwable $th) {
            return $th;
        } catch (PDOException $e){
            return $e;
        } catch (Exception $e){
            return $e;
        }
    }

    public function listar($tipo) //este es un procedimiento
    {
        $db = Db::conectar();// le asignamos la conexion que hay en conexion.php db::conectar es lo mismo en c# "clase estatica" db.conectar
        if ($tipo == null) {
            $consultaDeBaseDeDatos = $db->query("SELECT * FROM cliente");// consulta dentro de db y trae unos datos adicionales.
        } else {
            $consultaDeBaseDeDatos = $db->query("SELECT * FROM cliente WHERE tipo = '$tipo'");// consulta dentro de db y trae unos datos adicionales.
        }
        $listaDeBaseDeDatos = $consultaDeBaseDeDatos->fetchAll(); // aca limpiamos la matrix de los datos innecesarios, con la funcion fectall

        $listaDondeGuardarObjetosDeTipoCliente = []; //vector vacio

        foreach ($listaDeBaseDeDatos as $filaParaCrearUnCliente) //convierte lista de bd a lista de objeto
        {
            $objetoCliente = new Cliente();//crea un objeto cliente
            $objetoCliente->setCodCliente($filaParaCrearUnCliente["cod_cliente"]);//mete la informacion del cod_clinte de la bd a la cod_clinte del objeto
            $objetoCliente->setCedula($filaParaCrearUnCliente["cedula"]);
            $objetoCliente->setNombre($filaParaCrearUnCliente["nombre"]);
            $objetoCliente->setEmail($filaParaCrearUnCliente["email"]);
            $objetoCliente->setTelefono($filaParaCrearUnCliente["telefono"]);
            $objetoCliente->setCelular($filaParaCrearUnCliente["celular"]);
            $objetoCliente->setDireccion($filaParaCrearUnCliente["direccion"]);
            $objetoCliente->setContrasena($filaParaCrearUnCliente["contrasena"]);
            $objetoCliente->setBirthday($filaParaCrearUnCliente["birthday"]);
            $objetoCliente->setEtiqueta($filaParaCrearUnCliente["etiqueta"]);
            $objetoCliente->setTipo($filaParaCrearUnCliente["tipo"]);

            $listaDondeGuardarObjetosDeTipoCliente[] = $objetoCliente;//vacio el vector y lo inicializo nuevamente como vector vacio
        }
        return $listaDondeGuardarObjetosDeTipoCliente;
    }

    /* aca va una funcion de consultar */
    public function consultarCliente($cod_cliente)// en esta funcion  recibimos un codigo cod_cliente para consultar el cliente
    {
        $db=Db::conectar();
        $consultaCliente= $db->prepare("SELECT * FROM cliente WHERE cod_cliente = :cod_cliente");//aca prepara la consulta
        $consultaCliente->bindValue('cod_cliente', $cod_cliente);//dentro de la consulta anterior metale a la variable 
                                             //cod_cliente el valor del parametro de entrada de la funcion $cod_cliente
        $consultaCliente->execute();//ejecuta la consulta sql

        $elementoCliente =$consultaCliente->fetch();//para consultas de una sola linea o fila
        $cliente = new Cliente();// esta creando un objeto
        $cliente->setCodCliente($cod_cliente);
        $cliente->setCedula($elementoCliente["cedula"]);
        $cliente->setNombre($elementoCliente["nombre"]);
        $cliente->setEmail($elementoCliente["email"]);
        $cliente->setTelefono($elementoCliente["telefono"]);
        $cliente->setCelular($elementoCliente["celular"]);
        $cliente->setDireccion($elementoCliente["direccion"]);
        $cliente->setContrasena($elementoCliente["contrasena"]);
        $cliente->setBirthday($elementoCliente["birthday"]);
        $cliente->setEtiqueta($elementoCliente["etiqueta"]);
        $cliente->setTipo($elementoCliente["tipo"]);

        return $cliente; // retornamos todo lo que pregunto en la consulta del un determinado cod_cliente
    }

    public function actualizar($cliente)
    {
        try{
            $db=Db::conectar();
            $consultaCliente=$db->prepare("UPDATE cliente SET cedula=:cedula, nombre=:nombre, email=:email, telefono=:telefono, celular=:celular, direccion=:direccion, contrasena=:contrasena, birthday=:birthday, etiqueta=:etiqueta, tipo=:tipo WHERE cod_cliente=:cod_cliente");
            
            $consultaCliente->bindValue("cod_cliente", $cliente->getCodCliente()); //preparar
            $consultaCliente->bindValue("cedula", $cliente->getCedula()); //preparar
            $consultaCliente->bindValue("nombre", $cliente->getNombre()); //preparar
            $consultaCliente->bindValue("email", $cliente->getEmail()); //preparar
            $consultaCliente->bindValue("telefono", $cliente->getTelefono()); //preparar
            $consultaCliente->bindValue("celular", $cliente->getCelular()); //preparar
            $consultaCliente->bindValue("direccion", $cliente->getDireccion()); //preparar
            $consultaCliente->bindValue("contrasena", $cliente->getContrasena()); //preparar
            $consultaCliente->bindValue("birthday", $cliente->getBirthday()); //preparar
            $consultaCliente->bindValue("etiqueta", $cliente->getEtiqueta()); //preparar
            $consultaCliente->bindValue("tipo", $cliente->getTipo()); //preparar
            
            return $consultaCliente->execute();//ejecuta la consulta sql
        }catch(\PDOException $e){
            return $e;
        }catch(Exception $e){
            return $e;
        }
        
    }

    public function eliminar($cod_cliente)
    {
        $db=Db::conectar();
        $consultaEliminar=$db->prepare("DELETE FROM cliente WHERE cod_cliente=:cod_cliente");
        $consultaEliminar->bindValue("cod_cliente", $cod_cliente); //preparar
        $consultaEliminar->execute();//ejecuta la consulta sql
    }

    public function contar_cliente($tipo = null) //este es un procedimiento
    {
        $db = Db::conectar(); // le asignamos la conexion que hay en conexion.php db::conectar es lo mismo en c# "clase estatica" db.conectar
        if($tipo == null){
            $consultaDeBaseDeDatos = $db->query("SELECT count(*) FROM cliente"); // consulta dentro de db y trae unos datos adicionales.
        }else{
            $consultaDeBaseDeDatos = $db->query("SELECT count(*) FROM cliente WHERE tipo = '$tipo'"); // consulta dentro de db y trae unos datos adicionales.
        }
        
        $listaDeBaseDeDatos = $consultaDeBaseDeDatos->fetch(); // aca limpiamos la matriz y queda con las filas de los datos innecesarios, con la funcion fectall
        return $listaDeBaseDeDatos;
    }

}
?>