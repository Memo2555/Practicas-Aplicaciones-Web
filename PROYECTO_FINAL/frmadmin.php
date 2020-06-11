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


<?php

$emojiArray = array("buena", "regular", "mala");
require_once ("php/Like.php");
$rate = new Rate();
$result = $rate->getAllPost();
?>




<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link href="css/style_111.css" rel="stylesheet" type="text/css"/>

	<title>Bienvenido administrador</title>
</head>
<body>
	

	<div class="container p-4">

		<nav class="navbar navbar-default">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#miMenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="frmadmin.php" class="navbar-brand">Bienvenido Administrador
				<?php
							session_start();
							$usuario_id = $_SESSION['nombre'];
							echo $usuario_id;
							
							
					?>
				</a>
			</div>		

			<div class="collapse navbar-collapse" id="miMenu">
				<ul class="nav navbar-nav">
					<li><a href="administradores.php">Administradores</a></li>
					<li><a href="moderadores.php">Moderadores</a></li>					
					<li><a href="usuarios.php">Usuarios</a></li>	
			<!--		<li><a href="genera_xml.php">Crear XML</a></li>  -->
					<li><a href="generaexcel.php">Crear EXCEL</a></li>
					<li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>

					<li><a href="php/cerrarsesion.php"><span class="label label-danger">Cerrar sesión </span></a></li>										
				</ul>
			</div>

		</nav>

				<div class="row">

					<div class="col-md-9">
					
							<table class="demo-table">
								<tbody>
								<!-- proceso de reacciones -->
								<?php
								if (! empty($result)) {
									$i = 0;
									foreach ($result as $publicacion) {
										$valoracionResult = $rate->obtenervaloracionPorPublicacionParaUsuario($publicacion["id"], $usuario_id);
										$valoracionVal = "";
										if (! empty($valoracionResult[0]["valoracion"])) {
											$valoracionVal = $valoracionResult[0]["valoracion"];
										}
										?>
										<tr>
											<td valign="top">
											<div class="feed_title"><?php echo        $publicacion["Tema"]; ?></div>
												  <div>  <?php  echo                    $publicacion["Titulo"]; ?></div><br>
													<div><?php	echo '<div> <img src="'.$publicacion['Contenido'].'"  height="300px"></div>'; ?> </div>	
													<div><?php  echo                    $publicacion["Resumen"]; ?></div>
													<div id="tutorial-<?php echo         $publicacion["id"]; ?>"
														class="emoji-valoracion-box">

														
														<div class="emoji-section">
																<!-- eventos de JavaScript para el muestreo de los emojis -->
																	<!-- La tabla de emojis aparece al quitar el puntero "showEmojiPanel"-->
																	<!-- La tabla de emojis desparece al quitar el puntero "hideEmojiPanel"-->															
														</div>

														<div
															id="emoji-valoracion-count-<?php echo $publicacion["id"]; ?>"
															class="emoji-valoracion-count">
																<?php
																if (! empty($publicacion["valoracion_count"])) {
																	echo $publicacion["valoracion_count"] . " Valoraciones";
																?>
																<?php
																	if (! empty($publicacion["emoji_valoracion"])) {
																		$emojiValoracionArray = explode(",", $publicacion["emoji_valoracion"]);
																		foreach ($emojiValoracionArray as $emojiData) {
																?>
																		<img
																src="icons/<?php echo $emojiData; ?>.png"
																class="emoji-data" />
																	<?php
																		}
																	}
																} else {
																?>
																No hay valoraciones
																<?php  } ?>
														</div>
													</div>
												</td>
										</tr>
									
									<!-- Temina el "Foreach" se cierra con las llaves -->
									<?php
										}
									}
									?>
									<!-- ------------------------------------- -->

								</tbody>
							</table>				
					</div>	

					<div class="col-sm-3">
						
					<div class="card">
										<div    class="card-body">
											 <form id="task-form" action ="tema_post.php" method="POST"   >
												<input type="hidden" id="taskId">
													<div class="form-group">
														<input  type="text" id="name" placeholder="Crear tema de discusión" class="form-control" name="temas" required value="" />
													</div>
														<button type="submit" class="btn btn-primary btn-block text-center"  > 
														Enviar tema
														</button>
											 </form>

										</div>
									 </div>


								<div>
										<div class="card my-4" id="task-result"> 
											<div class="card-body">
												<ul id="container">
												</ul>
											</div>
										</div>
										
										<table class="table table-bordered table-sm">
											<thead>
												<tr>
													<td class="   text-center" style="color:white;"  bgcolor='#24a50b' >Temas</td>
												</tr>
											</thead>

											<tbody id="tasks">

											<?php
												require('php/conexion.php');
												$result=mysqli_query($conexion,'SELECT * FROM temas');
												while ($usuarios=mysqli_fetch_array($result))
												{
								
												$tema=$usuarios['Tema'];
										
											?>

											<?php	echo "<td id='id:$tema' class='cam_editable'>".$usuarios['Tema']."</td>"; ?>
											<?php  	echo"</tr>";      ?>     
												
												<?php }
								
												?>

											</tbody>

										</table>									
								</div>


							</div>
					</div>

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

<script src="js/app1.js"></script>
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