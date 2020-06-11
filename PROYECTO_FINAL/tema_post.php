<?php
	
require('php/conexion.php');
	$tema = $_POST['temas'];
	$query = "INSERT INTO temas(Tema) VALUES('$tema') ";
	$resultado = $conexion->query($query);
	if($resultado){
		header("Location:frmadmin.php");
	}else{
		echo"No se pudo";
	}
	
?>