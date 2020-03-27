<?php
if(!empty($_POST)){
	session_start();
	$conexion=(mysqli_connect("localhost","root",""));
    mysqli_select_db($conexion,'practica_final') or die ("no se encuentra la bd");	

	$user=$_POST['usuario'];
	$pass=$_POST["password"];
	
	$sql="SELECT * FROM usuarios WHERE nombre='$user'";
	$consulta=mysqli_query($conexion,$sql) or die(mysqli_error());

	if($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
//		echo "este usuario existe";
		if($pass==$fila['password']){
//			echo "contraseña correcta";
			$_SESSION['nombre']=$user;
			$_SESSION['tipo']=$fila['tipo'];
			echo $fila['tipo'];
		}else{
			session_destroy();
			mysqli_close($conexion);
			echo "contraseña incorrecta";
		}
		
	}else{
		session_destroy();
		mysqli_close($conexion);
		echo "este usuario no existe";
	}
}
?>