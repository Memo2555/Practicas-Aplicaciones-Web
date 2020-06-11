<?php
if(!empty($_POST)){
 $conexion=(mysqli_connect("localhost","root",""));
mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");
mysqli_set_charset($conexion,"utf8");

	foreach($_POST as $field_name=>$val){
		$field_idup=strip_tags(trim($field_name));
		

			$result=mysqli_query($conexion,"SELECT * FROM archivo WHERE id='$field_idup'");
		        $info=mysqli_fetch_array($result);  
				$usuario=$info['Usuario'];
				$titulo=$info['Titulo'];
				$resumen=$info['Resumen'];
				$contenido=$info['Contenido'];
				$tema=$info['Tema'];
				
				$query2 = "INSERT INTO notificaciones(Usuario, Mensaje, Leido, Fecha) VALUES('$usuario','su publicación fue aceptada por el moderador de la paguina','0', now()) ";
				$resultado2 = $conexion->query($query2);
				$query = "INSERT INTO publicacion(Usuario, Titulo , Resumen, Contenido,  Tema) VALUES('$usuario','$titulo','$resumen', '$contenido', '$tema') ";
				$resultado = $conexion->query($query);
				
				 if($resultado){
					mysqli_query($conexion,"DELETE FROM archivo where id='$field_idup'") or mysql_error(); 
					echo"true";
					}

		else{
			echo"false";
			echo $titulo;
		}
		}
	}

?>