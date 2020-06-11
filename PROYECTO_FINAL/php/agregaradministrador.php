<?php
if(!empty($_POST)){

	$conexion=(mysqli_connect("localhost","root",""));	
    mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");
    	
	$nombre=$_POST['nombre'];
	$password=$_POST['password'];
	$tipo='admin';
	$id=null;

	$consultarusuario="SELECT * FROM usuarios where nombre='$nombre'";
	$resultadousuario=mysqli_query($conexion,$consultarusuario);
	$busquedausuario=mysqli_fetch_array($resultadousuario);

	if(empty($busquedausuario)){	
		$insertar="INSERT INTO usuarios (nombre, password, tipo) VALUES ('$nombre', '$password', '$tipo')";
        mysqli_query($conexion,$insertar) or die ("NO se pudo insertar");
        mysqli_close($conexion);
			echo"true";
		}else{
		    if(!empty($busquedausuario)){
				echo "el nombre de usuario ya esta registrado";
			}
		}
}
?>