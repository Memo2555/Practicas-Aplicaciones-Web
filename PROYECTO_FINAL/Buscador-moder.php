<?php
$emojiArray = array("buena", "regular", "mala");
require_once ("php/Like.php");
$rate = new Rate();
$result = $rate->getAllPost();
$id_bus=$_GET['id'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css"/>
	<link href="css/style_111.css" rel="stylesheet" type="text/css"/>

	<title>Bienvenido Moderador</title>
</head>

<body>

<div class="container p-4">

      <nav class="navbar navbar-default">
        <div class="container-fluid">

                      <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#miMenu">
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>
                            <a href="frmmoderador.php" class="navbar-brand">
                            Bienvenido Moderador
                              <?php
									session_start();
									$usuario_id = $_SESSION['nombre'];
									echo $usuario_id;
                              ?>
                            </a>
                        </a>
                      </div>	

                    <div class="collapse navbar-collapse" id="miMenu">
                      <ul class="nav navbar-nav">						
  <!-- -->                 	 <li><a href="listado_publicaciones.php"> Publicaciones </a></li>
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
										if ($publicacion["id"] == $id_bus){
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
									}
									?>
									<!-- ------------------------------------- -->

								</tbody>
							</table>
										
									
					</div>	

					<div class="col-sm-3">

											<div>

						<form >
						
							<div class="form-group">
							<input name="search" id="search" class="form-control mr-sm-1" type="search" placeholder="Buscar" aria-label="Search">
							</div>
							<button class="btn btn-success text-center " type="submit">Buscar</button>
							</button>
						</form>

						</div>


						<br>   
						<div class="card my-4" id ="datos-result">
						<div class="card-body">
						<div  id ="conteiner"></div>
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
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/change.js"></script>
<script type="text/javascript" src="js/buscador_mode.js"></script>
<script type="text/javascript">        
	function cambiar(){
          $('#modal2').modal('show');

        }
    </script>
</body>