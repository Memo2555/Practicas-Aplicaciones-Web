<?php
if(!empty($_POST)){

	$conexion=(mysqli_connect("localhost","root",""));
    mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");


	foreach($_POST as $field_name=>$val){
		$field_id=strip_tags(trim($field_name));

		if(!empty($field_id)){

            $query = "UPDATE usuarios SET tipo = 'moderador' where nombre='$field_id'";
            $consulta = mysqli_query($conexion,$query) ;

            $sql = "DELETE FROM aceptarmode where usuario='$field_id'";
            $consulta1 = mysqli_query($conexion,$sql);
            echo"true";          
        
        }
        
		else{
			echo"Falso";
		}
	}
}
?>