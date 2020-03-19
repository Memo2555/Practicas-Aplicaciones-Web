<?php

       define('servername', 'localhost');
       define('usuario','root');
       define('contrasena','');
       define('dbname','practica_final');
 
class database{
protected $conexion;
 
public function __construct(){
        $this->conexion=new mysqli(servername,usuario,contrasena,dbname);
      
      if ($this->conexion->connect_errno) {
        echo "fallo en la coneccion ".$this->conexion->connect_errno;
        return;
      }
     
    }
}
 
?>


