<?php
if(!empty($_POST)){

	$conexion=(mysqli_connect("localhost","root",""));
    mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");


	foreach($_POST as $field_name=>$val){
		$field_id=strip_tags(trim($field_name));
		
		$result=mysqli_query($conexion,"SELECT * FROM archivo WHERE id='$field_id'");
		        $info=mysqli_fetch_array($result);  
				$usuario=$info['Usuario'];
				$query = "INSERT INTO notificaciones(Usuario, Mensaje, Leido, Fecha) VALUES('$usuario','su publicación no fue aceptada por el moderador de la paguina','0', now()) ";
				$resultado = $conexion->query($query);
   
	
		if(!empty($field_id)){
			mysqli_query($conexion,"DELETE FROM archivo where id='$field_id'") or mysql_error();
			echo"true";
		}
		else{
			echo"false";
		}
	}
}
?>