<?php
	 require('php/conexion.php');
	 
	 $ID_rand = $_POST['ID_rand'];
	 echo $ID_rand;
	 
		  $result=mysqli_query($conexion,"SELECT * FROM archivo WHERE ID = 2 ");
		  $json= array();
		  while($row = mysqli_fetch_array($result)){
			  $json[]= array(
					'Nombre' => $row['Nombre'],
					'Imagen' => $row['Imagen'],
					'ID' => $row['ID']
			  );
		  }
		  $jsonstring = json_encode($json);
		  echo $jsonstring;
	 
?>