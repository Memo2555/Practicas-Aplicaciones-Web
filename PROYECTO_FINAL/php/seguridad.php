<?php

    session_start();
	$conexion=(mysqli_connect("localhost","root",""));
    mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");	
	$use=$_SESSION['usuario'];
	$pass=$_SESSION['password'];
    
    
	if( $use==null || $use=='' || $pass== null || $pass== '')
	{
			header("Location:index.php");
			die();
	
    }
    
    else{

	$sql="SELECT * FROM usuarios WHERE nombre='$user'";
	$consulta=mysqli_query($conexion,$sql) or die(mysqli_error());

	if($fila=mysqli_fetch_array($consulta, MYSQLI_ASSOC)){
//		echo "este usuario existe";
		if($pass==$fila['password']){
//			echo "pass correcta";
			$_SESSION['nombre']=$user;
			$_SESSION['tipo']=$fila['tipo'];
			echo $fila['tipo'];
		}else{
			session_destroy();
			mysqli_close($conexion);
			echo "pass incorrecta";
		}
		
	}else{
		session_destroy();
		mysqli_close($conexion);
		echo "este usuario no existe";
	}
    }

?>


