<?php
if(!empty($_POST)){

	$conexion=(mysqli_connect("localhost","root",""));
	mysqli_select_db($conexion,'proyecto') or die ("no se encuentra la bd");

  $usuario= $_POST['user'];
  
  $consultarusuario="SELECT * FROM aceptarmode where usuario='$usuario'";
  $resultadousuario=mysqli_query($conexion,$consultarusuario);
  $busquedausuario=mysqli_fetch_array($resultadousuario);

  if (empty($busquedausuario)){

        $sql="INSERT INTO aceptarmode(usuario,nombre,apellido) SELECT idusuario,nombre,apellido FROM datosusuario WHERE idusuario='$usuario'";	
        $resultado=mysqli_query($conexion,$sql);
        
        if (!$resultado){
            die('Query fallo.');
        }
        echo 'Solicitud enviada exitosamente';
      
    }
      else{
        
          if (!empty($busquedausuario)){
          echo "Ya has enviado tu solicitud, por favor espera a que responda el administrador";
        }	
  }

}


?>