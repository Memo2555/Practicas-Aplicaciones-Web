<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Datos del moderador</title>
</head>
<body>
   <div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#miMenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="frmoderador.php" class="navbar-brand">Bienvenido moderador
				<?php
					session_start();
					echo $_SESSION['nombre'];
					?>
				</a>
				</a>
			</div>		
			<div class="collapse navbar-collapse" id="miMenu">
				<ul class="nav navbar-nav">						
		
					<li><a href="php/cerrarsesion.php"><span class="label label-danger">CERRAR SESION </span></a></li>								
				</ul>
			</div>
		</div>
	</nav>
</div>
<div class="container">
<div class="panel panel-default">
    <div class="panel-heading">HORARIO</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>
					<th>ID</th>
					<th>usuario</th>	
					<th>Datos personales</th>				
					<th>ACCION</th>				
				</tr>
			</thead>
			<tbody>
				<?php
				     require('php/conexion.php');				     
					 $user=$_SESSION['consultado'];
				     $result=mysqli_query($conexion,"SELECT * FROM datosusuario where idusuario='$user'");				    
				     while ($usuarios=mysqli_fetch_array($result)){					 
					 echo "<tr><td id='id:$user' class='cam_editable'>".$user."</td>";

				     echo "<td id='nombre:$user' class='cam_editable'>".$usuarios['nombre']."</td>";
					 echo "<td id='apellido:$user' class='cam_editable'>".$usuarios['apellido']."</td>";
		
					 echo "<td id='correo:$user' class='cam_editable'>".$usuarios['correo']."</td>";
		
					 echo"</tr>";
					 }
				?>
			</tbody>	
					
		</table>
	</div>
	</div>
<!--//////////////////////////////////////////////////-->
	<script src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/mainmoderador.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>