<?php

class Pedido
{
    /**************** variables privadas de la clase autor *******************/
    private $cod_pedido;
    private $fecha;
    private $estado;
    private $detalle;
    private $cliente_cod; 

    function __construct(){}
   
    /******************** funciones get y set de la clase autor **********************/
    public function getCodPedido(){  //funciones de la tabla libro
        return $this->cod_pedido;
    }
    public function setCodPedido($cod_pedido){//funciones de la tabla libro
        $this->cod_pedido = $cod_pedido;
    }

    public function getFecha(){//funciones de la tabla libro
        return $this->fecha;
    }
    public function setFecha($fecha){//funciones de la tabla libro
        $this->fecha = $fecha;
    }

    public function getEstado(){//funciones de la tabla libro
        return $this->estado;
    }
    public function setEstado($estado){//funciones de la tabla libro
        $this->estado = $estado;
    }
    
    public function getDetalle(){//funciones de la tabla libro
        return $this->detalle;
    }
    public function setDetalle($detalle){//funciones de la tabla libro
        $this->detalle = $detalle;
    }
    
    public function getClienteCod(){//funciones de la tabla libro
        return $this->cliente_cod;
    }
    public function setClienteCod($cliente_cod){//funciones de la tabla libro
        $this->cliente_cod = $cliente_cod;
    }

}//cerrar clase Usuario
?>