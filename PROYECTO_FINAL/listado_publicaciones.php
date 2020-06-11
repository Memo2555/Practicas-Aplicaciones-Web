<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<title>usuarios</title>
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
				<a href="frmmoderador.php" class="navbar-brand">Bienvenido Moderador
				<?php
          error_reporting(0);
					session_start();
					echo $_SESSION['nombre'];
					?>
				</a>
			</div>		
			<div class="collapse navbar-collapse" id="miMenu">
				<ul class="nav navbar-nav">

	         
                    <li><a href="listado_publicaciones.php"> Publicaciones </a></li>

	 		

					<li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>	
					<li><a href="php/cerrarsesion.php"><span class="label label-danger">Cerrar sesión </span></a></li>									
				</ul>
			</div>
		</div>
	</nav>
</div>

<div class="container">
<div class="panel panel-default">

    <div class="panel-heading text-center " >Solicitudes de publicaciones</div>
	<div class="table-responsive">
		<table class="table table-striped table-hover">
			<thead>
				<tr>

					<th>Usuario</th>
					<th>Tema</th>	
					<th>Titulo</th>	
					<th>Resumen</th>	
					<th>Contenido</th>
					<th>Aceptar</th>
					<th>Eliminar</th>

				</tr>
			</thead>
			<tbody>

				<?php
				     require('php/conexion.php');
				     $result=mysqli_query($conexion,'SELECT * FROM archivo');				    
				     while ($usuarios=mysqli_fetch_array($result)){
						 $id=$usuarios['id'];
						 $Usuario=$usuarios['Usuario'];
						 $Tema=$usuarios['Tema'];
						 $Titulo=$usuarios['Titulo'];
						 $Resumen=$usuarios['Resumen'];
						 $Contenido=$usuarios['Contenido'];
					 
					 //////////////////////////////////////

					echo "<td id='id:$Usuario' class='cam_editable'>".$usuarios['Usuario']."</td>"; 	
					echo "<td id='id:$Tema' class='cam_editable'>".$usuarios['Tema']."</td>"; 
					echo "<td id='id:$Titulo' class='cam_editable'>".$usuarios['Titulo']."</td>"; 
					echo "<td id='id:$Resumen' class='cam_editable'>".$usuarios['Resumen']."</td>"; 
					echo '<td> <img src="'.$usuarios['Contenido'].'"  height="250px"></td>';
				
					?>
					<div>
					<?php echo"<td id='$id'  button='true'><button type='button' class='btn btn-success'><span class='glyphicon glyphicon-plus'></span> Aceptar</button></td>";   ?>
				   <?php echo"<td id='$id' usuario='$Usuario' button='false'><button  type='button' class='btn btn-danger'><span class='glyphicon glyphicon-minus' ></span> Eliminar</button></td>";   ?>
				   
				   </div>  
         		 <?php	  
				   echo"</tr>";
           
					 }				
				?>
			</tbody>	
					
		</table>
	</div>
	</div>

	
<!--//////////////////////////////////////////////////-->
 <div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Cambiar contraseña</h4>
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




<!--//////////////////////////////////////////////////-->
 <div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Por que se elimina esta publicación</h4>
            </div>
            <form role="form"  id= "frmcambiar" name="frmrazon" onsubmit="razon(); return false">
              <div class="col-lg-12">               

                <div class="form-group">
                  <label>Razones</label>
                  <input  name="razon" id="p" class="form-control" type="text" required>
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
<script type="text/javascript" src="js/changepub2.js"></script>
<script type="text/javascript" src="js/change.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript">
	
        function ventananuevo(){
          $('#modal').modal('show');

        }
	function cambiar(){
          $('#modal2').modal('show');

        }

		
    </script>
<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->
</body>