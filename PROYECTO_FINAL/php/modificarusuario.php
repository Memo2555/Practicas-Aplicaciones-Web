<?php
if(!empty($_POST)){
	
	$conexion=(mysqli_connect("localhost","root",""));
    mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");	


	foreach($_POST as $field_name=>$val){
		$field_id=strip_tags(trim($field_name));
		$val=strip_tags(trim(mysql_real_escape_string($val)));
		$split_data=explode(':',$field_id);
		$id=$split_data[1];
		$field_name=$split_data[0];

		if($field_name=="cedula"){
			
			$consultarcedula="SELECT * FROM datosusuario where cedula='$val'";
			$resultadocedula=mysqli_query($conexion,$consultarcedula);
			$busquedacedula=mysqli_fetch_array($resultadocedula);
			if(empty($busquedacedula)){
				if(!empty($id)&&!empty($field_name)&&!empty($val)){					 
					mysqli_query($conexion,"UPDATE datosusuario set $field_name='$val' where idusuario='$id'");
					echo"registro modificado correctamente";
				}else{
					echo"no se pudo actualizar";
				}
			}else{
				
				
					echo "cedula";
				
			}
		}else{
			if(!empty($id)&&!empty($field_name)&&!empty($val)){
				    echo "UPDATE datosusuario set $field_name='$val' where idusuario='$id'";
					mysqli_query($conexion,"UPDATE datosusuario set $field_name='$val' where idusuario='$id'");
					echo"registro modificado correctamente";
				}else{
					echo"no se pudo actualizar";
				}
		}
	}
}
?>