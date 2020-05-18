<?php
	//crear variables
	$servername = "localhost";
	$usuario = "root";
	$contrasena = "";
	
	$color=$_POST['color'];
	$tamaño=$_POST['tamaño'];
	$fuente=$_POST['fuente'];
	


	if($color=="rojoall"){
	


	}
	if($color=="azulall"){
	


	}
	if($color=="verdeall"){
	

	}
	if($color=="amarillofondo"){

	}
	
			  $mbd = new PDO('mysql:host=localhost;dbname=practica_final', $usuario, $contrasena);
    			
				$consulta=$mbd->prepare("UPDATE  temas SET color=:color, tamaño=:tamaño,
								fuente=:fuente, fondo=:fondo WHERE id=:id");
							$consulta->bindParam(":color", $color);
							$consulta->bindParam(":tamaño", $tamaño);
							$consulta->bindParam(":fuente", $fuente);

			$consulta->execute()
							
	
		
	
		
?>

