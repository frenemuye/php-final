<?php

class Usuario
{
    /**************** variables privadas de la clase autor *******************/
    private $id;
    private $cedula;
    private $nombre;
    private $contrasena;
    private $contrasena1;     
    private $tipo; 


    function __construct(){}
   
    /******************** funciones get y set de la clase usuario **********************/
    public function getId(){  //funciones de la tabla libro
        return $this->id;
    }
    public function setId($id){//funciones de la tabla libro
        $this->id = $id;
    }

    public function getCedula(){//funciones de la tabla libro
        return $this->cedula;
    }
    public function setCedula($cedula){//funciones de la tabla libro
        $this->cedula = $cedula;
    }

    public function getNombre(){//funciones de la tabla libro
        return $this->nombre;
    }
    public function setNombre($nombre){//funciones de la tabla libro
        $this->nombre = $nombre;
    }
    
    public function getContrasena(){//funciones de la tabla libro
        return $this->contrasena;
    }
    public function setContrasena($contrasena){//funciones de la tabla libro
        $this->contrasena = $contrasena;
    }
    
    public function getContrasena1(){//funciones de la tabla libro
        return $this->contrasena1;
    }
    public function setContrasena1($contrasena1){//funciones de la tabla libro
        $this->contrasena1 = $contrasena1;
    }

    public function getTipo(){//funciones de la tabla libro
        return $this->tipo;
    }
    public function setTipo($tipo){//funciones de la tabla libro
        $this->tipo = $tipo;
    }
}//cerrar clase Usuario
?>