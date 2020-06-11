<?php
$usuario = "root";
$contrasena = "";
$conexion = mysqli_connect ("localhost", $usuario, $contrasena);
mysqli_select_db ($conexion, "proyecto");
$sql = "SELECT * FROM publicacion";
$resultado = mysqli_query ($conexion, $sql) or die (mysql_error ());
$libros = array();
while( $rows = mysqli_fetch_assoc($resultado) ) {
 $libros[] = $rows;
}
mysqli_close($conexion);

	if(!empty($libros)) {
	 $filename = "Publicaciones.xls";
	 header("Content-Type: application/vnd.ms-excel");
	 header("Content-Disposition: attachment; filename=".$filename);

	 $mostrar_columnas = false;

	 foreach($libros as $libro) {
	 if(!$mostrar_columnas) {
	 echo implode("\t", array_keys($libro)) . "\n";
	 $mostrar_columnas = true;
	 }
	 echo implode("\t", array_values($libro)) . "\n";
	 }

	 }else{
	 echo 'No hay datos a exportar';
	 }
	 exit;


?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="introAdministrador.php">Administrador Click aqui para regresar:<?php echo $_SESSION['session_username'];?></a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>
  
<div class="alert alert-success" role="alert">
  Tu archivo XML fue creado correctamente!! Revisa tu carpeta 
</div>