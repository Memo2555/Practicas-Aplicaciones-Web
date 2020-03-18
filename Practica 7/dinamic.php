<!DOCTYPE html>
<html lang="es">
	<head>
		<title> Registr0 </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="">
	</head>
	<body>
		<div id="contenedor">
			
			
			<div class="tabla">
				<form name="base"  method="post">
				<label>Color:</label>
				<select  name='colores' id="colores"  >
				  <option value="rojoall">Rojo</option>
				  <option value="azulall">Azul</option>
				  <option value="verdeall">Verde</option>
				  <option value="amarillofondo">Amarillo</option>
				</select>
				<br>
				
				<label>Tamaño de letra:</label>
				<select  name="tamano" >
				  <option value="peque">Pequeño</option>
				  <option value="mediano">Mediano</option>
				  <option value="grande">Grande</option>
				</select>
				<br>
				<label>Fuente:</label>
				<select name="fuente">
				  <option value="larial">Arial</option>
				  <option value="lcalibri">Calibri</option>
				  <option value="ltime">Times New Roman</option>
				  <option value="lcomic">Comic Sans MS</option>
				</select>
				<br>
				
				<p><input type="submit" value="Enviar" onclick="fom()" /></p>
				</form>
			
		</div>
		
	</body>
	<?php
	//crear variables
	$servername = "localhost";
	$usuario = "root";
	$contrasena = "";
	$colores=$_POST['colores'];
	$tamano=$_POST['tamano'];
	$fuente=$_POST['fuente'];
	
	if($colores=="rojoall"){
		$fondo="rojofondo";
	}
	if($colores=="azulall"){
		$fondo="azulfondo";
	}
	if($colores=="verdeall"){
		$fondo="verdefondo";
	}
	if($colores=="amarillofondo"){
		$fondo="amarillofondo";
	}
	
			  $mbd = new PDO('mysql:host=localhost;dbname=practica_4', $usuario, $contrasena);
    			
				$consulta=$mbd->prepare("UPDATE  tabla_aceptar SET Color=:colores, Tamano=:tamano,
								Fuente=:fuente, Fondo=:fondo WHERE id=1");
							$consulta->bindParam(":colores", $colores);
							$consulta->bindParam(":tamano", $tamano);
							$consulta->bindParam(":fuente", $fuente);
							$consulta->bindParam(":fondo", $Fondo);
			$consulta->execute()
							
	
		
	
		
?>

</html>