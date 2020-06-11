<?php

	session_start();
	error_reporting(0);

	$user=$_SESSION['nombre'];

	if( $user==null || $user=='')
	{
        header("Location: ../index.php");
			die();
	
  }
  
  session_destroy();
  header("Location: ../index.php");
?>
