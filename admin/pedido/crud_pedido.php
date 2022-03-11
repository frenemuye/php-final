<?php
require_once("../../config/conexion.php");

class CrudPedido{

    public function __construct(){}

    public function insertar($pedido)// procedimiento que recibe un dato y no devuelve nada
    {
        try {
            $db = Db::conectar();

            $insert = $db->prepare('INSERT INTO pedido  VALUES(NULL, :fecha, :estado, :detalle, :cliente_cod)');
            /*$insert->bindValue('cod_pedido',     $pedido->getCodPedido()); no se puede pedir el id porque se genera automaticamente*/
            $insert->bindValue('fecha', $pedido->getFecha());// mete en cedula lo que hay en el objeto en $pedido->getCedula()
            $insert->bindValue('detalle', $pedido->getDetalle());
            $insert->bindValue('estado', "Pendiente");
            $insert->bindValue('cliente_cod', $pedido->getClienteCod());

            return $insert->execute(); //ejecuta la consulta sql haciendo la inseccion en la base de datos
        }catch(Exception $e){
            return $e->getMessage();
        }
    }

    public function listar($cliente_cod) //este es un procedimiento
    {
        try{
            $db = Db::conectar();// le asignamos la conexion que hay en conexion.php db::conectar es lo mismo en c# "clase estatica" db.conectar
            if($cliente_cod == null){
                $consultaDeBaseDeDatos = $db->query("SELECT * FROM pedido");// consulta dentro de db y trae unos datos adicionales.
            }else{
                $consultaDeBaseDeDatos = $db->query("SELECT * FROM pedido WHERE cliente_cod = $cliente_cod");// consulta dentro de db y trae unos datos adicionales.
            }
            
            $listaDeBaseDeDatos = $consultaDeBaseDeDatos->fetchAll(); // aca limpiamos la matrix de los datos innecesarios, con la funcion fectall
            
            $listaDondeGuardarObjetosDeTipoPedido = []; //vector vacio

            foreach ($listaDeBaseDeDatos as $filaParaCrearUnPedido) //convierte lista de bd a lista de objeto
            {
                
                $objetoPedido = new Pedido();//crea un objeto pedido 
                $objetoPedido->setCodPedido($filaParaCrearUnPedido["cod_pedido"]);//mete la informacion del id de la bd a la id del objeto
                $objetoPedido->setFecha($filaParaCrearUnPedido["fecha"]);
                $objetoPedido->setEstado($filaParaCrearUnPedido["estado"]);
                $objetoPedido->setDetalle($filaParaCrearUnPedido["detalle"]);
                $objetoPedido->setClienteCod($filaParaCrearUnPedido["cliente_cod"]);

                $listaDondeGuardarObjetosDeTipoPedido[] = $objetoPedido;//vacio el vector y lo inicializo nuevamente como vector vacio
            }
            
            return $listaDondeGuardarObjetosDeTipoPedido;
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    /* aca va una funcion de consultar */
    public function consultarPedido($cod_pedido)// en esta funcion  recibimos un codigo id para consultar el pedido
    {
        try {
            $db=Db::conectar();
            $consultaPedido = $db->query("SELECT * FROM pedido WHERE cod_pedido = $cod_pedido");//aca prepara la consulta
            $elementoPedido = $consultaPedido->fetch();//para consultas de una sola linea o fila
            if ($elementoPedido == false) {
                return $consultaPedido;
            } else {
                $pedido = new Pedido();// esta creando un objeto
                $pedido->setCodPedido($elementoPedido["cod_pedido"]);
                $pedido->setFecha($elementoPedido["fecha"]);
                $pedido->setEstado($elementoPedido["estado"]);
                $pedido->setDetalle($elementoPedido["detalle"]);
                $pedido->setClienteCod($elementoPedido["cliente_cod"]);

                return $pedido; // retornamos todo lo que pregunto en la consulta del un determinado id
            }
        }
        catch(Exception $e){
            return $e->getMessage();
        }
            
        
    }

    public function actualizar ($pedido)
    {
        $db=Db::conectar();
        $consultaPedido=$db->prepare("UPDATE pedido SET fecha=:fecha, estado=:estado, detalle=:detalle, cliente_cod=:cliente_cod WHERE cod_pedido=:cod_pedido");

        $consultaPedido->bindValue("fecha", $pedido->getFecha()); //preparar
        $consultaPedido->bindValue("estado", $pedido->getEstado()); //preparar
        $consultaPedido->bindValue("detalle", $pedido->getDetalle()); //preparar
        $consultaPedido->bindValue("cliente_cod", $pedido->getClienteCod()); //preparar

        $consultaPedido->bindValue("cod_pedido", $pedido->getCodPedido()); //preparar
        $consultaPedido->execute();//ejecuta la consulta sql
    }

    public function eliminar ($cod_pedido)
    {
        $db=Db::conectar();
        $consultaEliminar=$db->prepare("DELETE FROM pedido WHERE cod_pedido=:cod_pedido");
        $consultaEliminar->bindValue("cod_pedido", $cod_pedido); //preparar
        $consultaEliminar->execute();//ejecuta la consulta sql
    }

}
?>