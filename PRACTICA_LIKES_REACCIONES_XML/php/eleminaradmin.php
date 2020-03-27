<?php
if(!empty($_POST)){

	$conexion=(mysqli_connect("localhost","root",""));
    mysqli_select_db($conexion,'practica_final') or die ("no se encuentra la bd");


	foreach($_POST as $field_name=>$val){
		$field_id=strip_tags(trim($field_name));
		if(!empty($field_id)){
			mysqli_query($conexion,"DELETE FROM usuarios where nombre='$field_id'") or mysql_error();
			echo"true";
		}else{
			echo"false";
		}
	}
}
?>


