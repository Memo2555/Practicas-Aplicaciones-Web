<?php
if(!empty($_POST)){
	session_start();
	$conexion=(mysqli_connect("localhost","root",""));
	mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");
	
	$vieja=$_POST['password0'];
	$nueva=$_POST['password1'];
	$usuario=$_SESSION['nombre'];
	
	$sql="SELECT * FROM usuarios WHERE nombre='$usuario'";	
	$consulta=mysqli_query($conexion,$sql)or die(mysqli_error());

	if($fila=mysqli_fetch_array($consulta,MYSQLI_ASSOC)){	

		if ($fila['password']==$vieja){
//			echo "antigua contraseña correcta";
			mysqli_query($conexion,"UPDATE usuarios set password='$nueva' where nombre='$usuario'");
			echo "contraseña cambiada";
		}else{
			echo "antigua contraseña incorrecta";
		}
	}
}

?>