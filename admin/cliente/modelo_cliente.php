<?php

class Cliente
{
    /**************** variables privadas de la clase  cliente *******************/
    private $cod_cliente;
    private $cedula;
    private $nombre;
    private $email;
    private $telefono;
    private $celular;
    private $direccion;
    private $contrasena;    
    private $birthday;
    private $etiqueta;         
    private $tipo; 

    function __construct(){}
   
    /******************** funciones get y set de la clase  cliente **********************/
    public function getCodCliente(){  //funciones de la tabla 
        return $this->cod_cliente;
    }
    public function setCodCliente($cod_cliente){//funciones de la tabla 
        $this->cod_cliente = $cod_cliente;
    }

    public function getCedula(){//funciones de la tabla 
        return $this->cedula;
    }
    public function setCedula($cedula){//funciones de la tabla 
        $this->cedula = $cedula;
    }

    public function getNombre(){//funciones de la tabla 
        return $this->nombre;
    }
    public function setNombre($nombre){//funciones de la tabla 
        $this->nombre = $nombre;
    }

    public function getEmail()
    { //funciones de la tabla 
        return $this->email;
    }
    public function setEmail($email)
    { //funciones de la tabla 
        $this->email = $email;
    }

    public function getTelefono()
    { //funciones de la tabla 
        return $this->telefono;
    }
    public function setTelefono($telefono)
    { //funciones de la tabla 
        $this->telefono = $telefono;
    }

    public function getCelular()
    { //funciones de la tabla 
        return $this->celular;
    }
    public function setCelular($celular)
    { //funciones de la tabla 
        $this->celular = $celular;
    }

    public function getDireccion()
    { //funciones de la tabla 
        return $this->direccion;
    }
    public function setDireccion($direccion)
    { //funciones de la tabla 
        $this->direccion = $direccion;
    }

    public function getContrasena(){//funciones de la tabla 
        return $this->contrasena;
    }
    public function setContrasena($contrasena){//funciones de la tabla 
        $this->contrasena = $contrasena;
    }
    
    public function getBirthday(){//funciones de la tabla 
        return $this->birthday;
    }
    public function setBirthday($birthday){//funciones de la tabla 
        $this->birthday = $birthday;
    }

    public function getEtiqueta()
    { //funciones de la tabla 
        return $this->etiqueta;
    }
    public function setEtiqueta($etiqueta)
    { //funciones de la tabla 
        $this->etiqueta = $etiqueta;
    }

    public function getTipo(){//funciones de la tabla 
        return $this->tipo;
    }
    public function setTipo($tipo){//funciones de la tabla 
        $this->tipo = $tipo;
    }
}//cerrar clase Cliente
?>