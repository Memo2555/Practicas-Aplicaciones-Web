<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/estilo_1.css" rel="stylesheet" type="text/css"/>  

	<title>Bienvenido administrador</title>
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
					<li><a href="moderadores.php">Moderadores</a></li>					
					<li><a href="usuarios.php">Usuarios</a></li>	
	<!--				<li><a href="citas.php">Citas</a></li>	-->									
<!--					<li><a href="cambiarpassword.php">cambiar contraseña</a></li>							-->
					<li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>
					<li><a onclick="crearXml();" href="#">Crear XML</a></li>

					<li><a href="php/cerrarsesion.php"><span class="label label-danger">CERRAR SESION </span></a></li>										
				</ul>
			</div>




			<div class="h-left">

			     		<table class="table table-striped table-hover">
							<thead>
							<tr>					
							
								<th>Imagen</th>
								<th>Publicación</th>
								<th>Reacción</th>				
							</tr>
							</thead>

							<tbody>

								<?php
								     require('php/conexion.php');

								     $result=mysqli_query($conexion,'SELECT * FROM archivo');
								     while ($usuarios=mysqli_fetch_array($result))

								    {
				              
									//$nombre=$usuarios['nombre'];
									$publicacion=$usuarios['Comentario'];
									$Imagen=$usuarios['Imagen'];
									$likes=$usuarios['likes'];
								?>
									

								<td> <img height="250px" src="data:image/jpg;base64,<?php echo base64_encode($usuarios['Imagen']); ?>"/></td>
								<!--<?php	//echo "<td id='id:$Imagen' class='cam_editable'>".$usuarios['Imagen']."</td>";	
									//<?php	echo "<tr>   <td id='id:$nombre' class='cam_editable'>".$usuarios['nombre']."</td>"; 	?>
								?>

-->
								<?php	echo "<td id='id:$publicacion' class='cam_editable'>".$usuarios['Comentario']."</td>"; ?>				           	     
				           		<td>
							         <a href="megusta1.php?id=<?php echo $usuarios['id'];?>" class="options" data-vote-type="1" id="post_vote_up_">

								         <i class="glyphicon glyphicon-thumbs-up" data-original-title="Like this post">
								         </i>
							         </a>
							         <span class="counter" id="vote_up_count_"> <?php echo $usuarios['likes']?> </span>		
							    </td>
            
							       <?php  	echo"</tr>";      ?>     
							           
									 <?php }
					
									  ?>
							</tbody>	
					
						</table>
			     </div>

		          <div class="h-right">   
		            <div class="hl-icon"><a href="imagen1.php"><img src="images/icons/mas.png" width="50" title ="Sube una foto" ></a>
		            </div>
		          </div>

		</div>
	</nav>
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
 <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Crear XML</h4>
            </div>

            <form role="form"  id= "frmcambiar" name="frmcambiar" onsubmit="descargarXml(); return false">
              <div class="col-lg-12">               
                 <button type="submit" class="btn btn-primary btn-lg" button='agregar'>
                  <span class="glyphicon glyphicon-save" aria-hidden="true"></span> Descargar
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
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/change.js"></script>
<script type="text/javascript"> 


	function cambiar(){
          $('#modal2').modal('show');

        }


    function crearXml(){
          $('#modal4').modal('show');

        }

    </script>
</body>