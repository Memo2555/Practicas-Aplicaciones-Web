<?php



if (isset($_GET['id'])) {

		require('php/conexion.php');		
		$usuarios = mysqli_query($conexion,"UPDATE archivo SET likes = likes+1   WHERE id ='".$_GET['id']."'");
		header("Location:frmadmin.php");
	
}




?>