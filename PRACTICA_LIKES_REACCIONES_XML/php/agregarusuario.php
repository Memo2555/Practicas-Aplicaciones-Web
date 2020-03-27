<?php
if(!empty($_POST)){
	$conexion=(mysqli_connect("localhost","root",""));
    mysqli_select_db($conexion,'practica_final') or die ("no se encuentra la bd");
    	
	$nombreusuario=$_POST['nombreusuario'];
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido']; 
	$correo=$_POST['correo'];
	$password=$_POST['password'];	
	$tipo='usuario';



	$consultarusuario="SELECT * FROM usuarios where nombre='$nombreusuario'";
	$resultadousuario=mysqli_query($conexion,$consultarusuario);	
	$busquedausuario=mysqli_fetch_array($resultadousuario);
//	echo $busquedausuario;	
	if(empty($busquedausuario)){		
		$insertar="INSERT INTO usuarios (nombre, password, tipo) VALUES ('$nombreusuario', '$password', '$tipo')";
        mysqli_query($conexion,$insertar) or die ("NO se pudo insertar usuario");

		$insertar="INSERT INTO datosusuario (idusuario, nombre, apellido, correo) VALUES ('$nombreusuario', '$nombre', '$apellido', '$correo')";

        mysqli_query($conexion,$insertar) or die ("NO se pudo insertar datos personales");
        mysqli_close($conexion);
			echo"true";
		}else{
		  
		    if (!empty($busquedausuario)){
				echo "el nombre de usuario ya existe";
			}	
		}
}
?>