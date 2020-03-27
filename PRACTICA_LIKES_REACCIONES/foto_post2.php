<?php
	
require('php/conexion.php');
	
	$comentario = $_POST['comentario'];
	$imagen = addslashes(file_get_contents($_FILES['file-input']['tmp_name']));
	
	$query = "INSERT INTO archivo(Comentario, Imagen) VALUES('$comentario', '$imagen') ";
	$resultado = $conexion->query($query);
	if($resultado){
		header("Location:frmmoderador.php");
	}else{
		echo"No se pudo";
	}
	
?>