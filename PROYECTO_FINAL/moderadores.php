<?php

session_start();
error_reporting(0);

$user=$_SESSION['nombre'];


if( $user==null || $user=='')
{
      header("Location:index.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>Moderadores</title>
</head>
<body>


<!--////////////////////////// NAV ///////////////////////////////////////////////////////////////////////-->
<div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#miMenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="frmadmin.php" class="navbar-brand">Bienvenido Administrador
				<?php
					session_start();
					echo $_SESSION['nombre'];
					?>
				</a>
			</div>		
			<div class="collapse navbar-collapse" id="miMenu">
				<ul class="nav navbar-nav">
					<li><a href="administradores.php">Administradores</a></li>
					<li class="active"><a href="moderadores.php">Moderadores</a></li>					
          
					<li><a href="usuarios.php">Usuarios</a></li>	
					<li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>
					<li><a href="php/cerrarsesion.php"><span class="label label-danger">Cerrar sesión </span></a></li>									
				</ul>
			</div>
		</div>
	</nav>
</div>


<!--////////////////////////// NAV ///////////////////////////////////////////////////////////////////////-->

<div class="container">

<div class="panel panel-default">
    <div class="panel-heading text-center">Solicitudes</div>
      <div class="table-responsive">
       <table class="table table-striped table-hover">
        <thead>
          <tr>          
            <th>Usuario</th> 
            <th>Nombre</th> 
            <th>Apellido</th> 
            <th  style="text-align: center">Acciones</th>       
          </tr>
        </thead>
        <tbody>
          <?php
             require('php/conexion.php');
             $result=mysqli_query($conexion,'SELECT * FROM aceptarmode');
             while ($usuarios=mysqli_fetch_array($result))
             {
             $id=$usuarios['usuario'];  
             echo "<td id='usuario:$id' class='cam_editable'>".$usuarios['usuario']."</td>";   
             echo "<td id='nombre:$id' class='cam_editable'>".$usuarios['nombre']."</td>";
             echo "<td id='apellido:$id' class='cam_editable'>".$usuarios['apellido']."</td>";  
          ?>
            <div>
             
              <?php	echo"<td id='$id' button='true'><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-ok'></span> Aceptar</button></td>"; ?>
              <?php	echo"<td id='$id' button='false'><button type='button' class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span> Eliminar</button></td>"; ?>
            
            </div>  
          <?php	    
             echo"</tr>";
             }        
          ?>

        </tbody>    
        </table>
      </div>
      
    </div>


  <div class="panel panel-default">
    <div class="panel-heading text-center">Lista de moderadores aceptados</div>
	    <div class="table-responsive">
		   <table class="table table-striped table-hover">
			  <thead>
			  	<tr>					
            <th>NOMBRE</th>	
       		
				  </tr>
			  </thead>
			  <tbody>
				  <?php
				     require('php/conexion.php');
				     $result=mysqli_query($conexion,'SELECT nombre FROM usuarios where tipo="moderador"');
				     while ($usuarios=mysqli_fetch_array($result)){
						 $id=$usuarios['nombre'];					 
						 echo "<td id='$id' class='cam_editable'>".$usuarios['nombre']."</td>";	 
						
						 echo"</tr>";
				  	 }				
			  	?>
		  	</tbody>		
	  	  </table>
      </div>
	  </div>
   
</div>



<!--////////////////////////// CODIGO JAVASCRIPT ////////////////////////////////////////////////////////////////////////-->


<!--//////////////////////////////////////////////////-->
 <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">cambiar contraseña</h4>
            </div>
            <form role="form"  id= "frmcambiar" name="frmcambiar" onsubmit="cambiarpassword(); return false">
              <div class="col-lg-12">               

                <div class="form-group">
                  <label>vieja contraseña</label>
                  <input  name="password0" id="p" class="form-control" type="password"required>
                </div>
                <div class="form-group">
                  <label>nueva contraseña</label>
                  <input  name="password1" id="p3" class="form-control" type="password"required>
                </div>
                
                <div class="form-group">
                  <label>repita nueva password</label>
                  <input  name="password2" id="p4" class="form-control" type="password" required>
                </div> 
                 <button type="submit" class="btn btn-primary btn-lg" button='agregar'>
                  <span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Cambiar
                </button> 
              </div>
            </form>
            <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
<!--//////////////////////////////////////////////////-->
<script src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/mainmoderador.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/change.js"></script>
<script type="text/javascript">

	function cambiar(){
          $('#modal2').modal('show');

        }
        function ventananuevo(){
          $('#modal').modal('show');

        }
    </script>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->
</body>