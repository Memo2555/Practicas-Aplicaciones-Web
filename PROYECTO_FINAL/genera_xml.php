<?php

/* 
 * Aplicacion para volcar el contenido de una base de datos
 *  en un fichero xml mediante PHP
 */

/* 
 * Creamos el fichero xml con los datos de la base de datos
 * $cadena es la cadena xml
 */
function crea_fichero($cadena){
    $flujo = fopen('Publicaciones_XML.xml', 'w');//creamos el fichero.
    fputs($flujo, $cadena);//volcamos el contenido de cadena al fichero
    fclose($flujo);//cerramos el flujo
}
/* 
 * Creamos la conexion con la base de datos mediante PDO
 */

//$opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
$dsn = "mysql:host=localhost;dbname=proyecto";//datos conexion bbdd
$usuario = 'root';
$contrasena = '';

$dwes = new PDO($dsn, $usuario, $contrasena);//conexion


/* 
 * Preparamos la consulta para obtener las tablas.
 */
$sql="SELECT * FROM publicacion";

if (isset($dwes)){
    $resultado = $dwes->query($sql);//obtenemos las tablas de la base de datos
    $xml="<?xml version=\"1.0\"?>\n";//variable que contendra el codigo xml
    $xml .= "<Publicaciones>\n";

    

        while($fila = $resultado->fetch(PDO::FETCH_ASSOC)){

            $xml .= "\t\t<publicacion>\n";//por cada registro de la tabla

            foreach ($fila as $k => $v) {//recorremos las claves y los valores de cada registro
                echo "$k => $v.\n";
                echo "<br/>";

                $xml .= "\t\t\t<".$k.">".$v."</".$k.">\n";//los almacenamos en el xml
            }
            $xml .= "\t\t</publicacion>\n";//cerramos el registro
        }
        
    
    $xml .="</Publicaciones>";//cerramos el fichero xml
    //echo $xml;

    crea_fichero($xml);
}

?>