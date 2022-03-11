<?php
    class Db{
        private static $conexion = NULL;
        private function __construct() {}            
        public static function conectar(){
            try {
                //con el try verifico cual es el error de conexion (sirve solo para el codificador)
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;

                $user = 'root';
                $contrasena='';
                //$contrasena='root'; en man de mac user y cleve son root y root

                self::$conexion = new PDO('mysql:host=127.0.0.1;dbname=clientes',$user,$contrasena,$pdo_options);
                return self::$conexion;
                //return ['status' => true, 'data' => self::$conexion];

            } catch (\Exception $e) {                
                //return ['status' => false, 'data' => $e->getMessage()];                
                return null;
            }
            
        }
    }
?>