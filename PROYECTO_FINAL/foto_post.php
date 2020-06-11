<?php
	
require('php/conexion.php');
	$archivo=$_FILES["archivo"]["name"];
	$ruta=$_FILES["archivo"]["tmp_name"];
	$destino="archivos/".$archivo;
	copy($ruta,$destino);
	session_start();
	$titulo = $_POST['titulo'];
	$resumen = $_POST['resumen'];
	$temas = $_POST['temas'];
	$usuario=$_SESSION['nombre'];
	$query = "INSERT INTO archivo(Usuario, Titulo , Resumen, Contenido, Tema) VALUES('$usuario','$titulo','$resumen', '$destino', '$temas') ";
	$resultado = $conexion->query($query);
	if($resultado){
		header("Location:frmusuario.php");
	}else{
		echo"No se pudo";
	}
	
?>