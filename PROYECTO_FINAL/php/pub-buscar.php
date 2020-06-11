<?php
	require('conexion.php');
	$search = $_POST['search'];
	if(!empty($search)){
		$query= "SELECT * FROM publicacion WHERE Usuario LIKE '$search%' OR Tema LIKE '$search%' OR Titulo LIKE '$search%' ";
		$result=mysqli_query($conexion, $query);
		if(!$result){
			die('ERROR'.mysqli_error($conexion));
		}
		$json= array();
		while($row = mysqli_fetch_array($result)){
			$json[] = array(
				'id' => $row['id'], 
				'Usuario' => $row['Usuario'],
				'Titulo' => $row['Titulo'],
				'Resumen' => $row['Resumen'],
				'Contenido' => $row['Contenido'],
				'Titulo' => $row['Titulo'],
				'Tema' => $row['Tema']
			);
			
		}
		$jsonstring = json_encode($json);
		echo $jsonstring;
	}
?>