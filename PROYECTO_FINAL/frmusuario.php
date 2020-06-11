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
// Aquí la identificación del miembro está codificada.
// Puede integrar su código de autenticación aquí para obtener el ID de miembro registrado
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

	  
      <script>

      function showEmojiPanel(obj) {
              $(".emoji-icon-container").hide();
            $(obj).next(".emoji-icon-container").show();
      }
      function hideEmojiPanel(obj) {
          setTimeout(function() {
          $(obj).next(".emoji-icon-container").hide();
          }, 2000);
      }


      function agregarActualizarvaloracion(obj,id) {
        $(obj).closest(".emoji-icon-container").hide();
        $.ajax({
        url: "php/AgregarActualizarLike.php",
        data:'id='+id+'&valoracion='+$(obj).data("emoji-valoracion"),
        type: "POST",
          success: function(data) {
              $("#emoji-valoracion-count-"+id).html(data);    
              }
        });
      }
      </script>




	<title>Bienvenido</title>
</head>
<body>

<div class="container">
	<nav class="navbar navbar-default" role="navigation">

			<div class="navbar-header">        
        <a href="frmusuario.php" class="navbar-brand">Bienvenido usuario
          <?php          
            require('php/conexion.php');
            session_start();
            $usuario_id = $_SESSION['nombre'];
            echo $usuario_id;
            $noti = mysqli_query($conexion,"SELECT * FROM notificaciones WHERE Usuario = '$usuario_id' AND Leido = '0'" );
            $notif = mysqli_fetch_array($noti)        
            ?>
          </a>
			</div>		

          <div class="collapse navbar-collapse" id="">
            
                <ul class="nav navbar-nav">
                  <li><a href="datospersonales.php">Datos personales</a></li>
                  <li><a onclick="solicitudMode();" href="#">¿Quieres ser moderador?</a></li>
                  <li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>
                  <li><a onclick="foto();" href="#">Crear publicación <img src="icons/mas.png" width="20" title ="Sube una foto" ></a></li>
                  <li><a onclick="noti();" href="#" class="dropdown-toggle"> Notificaciones
                        <i class="glyphicon glyphicon-globe"></i>
                        <?php 
                        if($notif){
                        ?>	
                        <span class="label label-warning"> </span>
                        <?php	} ?>
                      </a>
                  </li>
                  <li><a href="php/cerrarsesion.php"><span class="label label-danger">Cerrar sesión </span></a></li>				
                </ul>
          </div>
			
	</nav>

	<div class="row">
		

    <!----------------------------------------- TABLA DE PUBLICACIONES ------------------------------>
    <div class="col-md-9">
			<table class="demo-table">
        <tbody>
        <!-- proceso de reacciones -->
        <?php
        if (! empty($result)) {
            $i = 0;
            foreach ($result as $publicacion) {
                $valoracionResult = $rate->obtenervaloracionPorPublicacionParaUsuario($publicacion["id"], $usuario_id);
                $postResult = $rate->obtenervaloracionPorPublicacionbueno($publicacion["id"]);
                $valoracionVal = "";
                $valoracionValora = "";

                if (! empty($valoracionResult[0]["valoracion"])) {
                    $valoracionVal = $valoracionResult[0]["valoracion"];
                }
                if (! empty($postResult[0]["valoracion"])) {
                  $valoracionValora = $postResult[0]["valoracion"];
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

                                  
                                  <!-- En este input se guarda el valor de la reaccion en una "variable" que se va a elejir y se pone como oculta -->
                                  <input type="hidden" name="valoracion" id="valoracion"
                                      value="<?php echo $valoracionVal; ?>"
                                      value2="<?php echo $valoracionValora; ?>"
                                       />


                                  <div class="emoji-section">
                                        <!-- eventos de JavaScript para el muestreo de los emojis -->
                                            <!-- La tabla de emojis aparece al quitar el puntero "showEmojiPanel"-->
                                            <!-- La tabla de emojis desparece al quitar el puntero "hideEmojiPanel"-->
                                      <a class="like-link"
                                          onmouseover="showEmojiPanel(this)"
                                          onmouseout="hideEmojiPanel(this)"> 
                                          <img src="like.png" /> Valoración
                                      </a> 

                                      <ul class="emoji-icon-container">
                                        <!-- Se asigna un lugar del arreglo declarado al inicio de $emojiArray a cada icono que se muestra -->
                                        <?php
                                          foreach ($emojiArray as $icon) 
                                          {
                                          
                                          ?>
                                            <li><img src="icons/<?php echo $icon; ?>.png" class="emoji-icon"
                                                data-emoji-valoracion="<?php echo $icon; ?>"
                                                onClick="agregarActualizarvaloracion(this, <?php echo $publicacion["id"]; ?>)" /></li>
                                            <!--  La anterior linea manda a llamar a la funcion de actualizacion y se le toma en cuenta su "id"-->
                                          <?php
                                          }
                                          ?>
                                      </ul>

                                  </div>


                                  <div
                                      id="emoji-valoracion-count-<?php echo $publicacion["id"]; ?>"
                                      class="emoji-valoracion-count">
                                          <?php
                                          if (! empty($publicacion["valoracion_count"])) {
                                            $rate->actualizarvaloraciontabla($publicacion["valoracion_count"], $publicacion["id"] );
                                           $regulacion= $rate->obtenervaloracionPorPublicacionregular($publicacion["id"]);
                                            $buenos=$rate->obtenervaloracionPorPublicacionbueno( $publicacion["id"] );
                                            $malas=$rate->obtenervaloracionPorPublicacionmala($publicacion["id"]);
                                            foreach ($buenos as $pub) {
                                              $rate->actualizarvaloraciontablabuena($pub["bueno_count"], $publicacion["id"] );
                                              }
                                            
                                            foreach ($regulacion as $puue) {
                                              $rate->actualizarvaloraciontablaregular($puue["regular_count"], $publicacion["id"] );
                                              }
                                              foreach ($malas as $puue) {
                                                $rate->actualizarvaloraciontablamala($puue["mala_count"], $publicacion["id"] );
                                                }
                                              echo $publicacion["valoracion_count"] . " Valoraciones     ";
                                            
                                            
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
		<!--- --------------------------TERMINA TABLA DE PUBLICACIONES ------------------------------------------------------->
	
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



<!--///////////////////////  CAMBIAR CONTRASEÑA  ///////////////////////////-->

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



<!--///////////////////////  Subir Foto  ///////////////////////////-->

<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  <h4 class="modal-title text-center">Publicación</h4>
</div>
 <form onsubmit="return validateForm()" action="foto_post.php" method="POST" enctype="multipart/form-data">  

  <div class="col-lg-12">               
   
  <div class="form-group">

   
<br>
  <div class="form-group">
    <label>Titulo</label>
   <input type="text" name="titulo" placeholder="Titulo de la publicación"  required value="" />
  </div>
 
  <div class="form-group">
  
    <label>Tema</label>
    <select name ="temas">
         <optgroup label="TEMAS"> 
    <?php

      require('php/conexion.php');
      

     $result=mysqli_query($conexion,'SELECT * FROM temas');
     while ($usuario_id=mysqli_fetch_array($result))

      {			              
      //$nombre=$usuario_idarios['nombre'];
      $id =$usuario_id['id'];
      $Tema =$usuario_id['Tema'];
      
    ?>

         <option value="<?php  echo$usuario_id['Tema']; ?>"> <?php echo $usuario_id['Tema']; ?> </option> 
      <?php } ?>
      
    </select>
    </div>
  
  <div class="form-group">
    <label>Resumen</label>
   <input type="text" name="resumen" placeholder="Escribe ahi ..." value="" />
  </div> 


  <div class="image-upload">
    <label for="file-input"> Cargar imagen
    <br>
    <br>
      <img align-center src="icons/archivo.png" width="50" title ="Sube una foto รณ video" >
      
    </label>
    <input id="file-input" type="file" name="archivo" required="" hidden="" />
  </div>


<br>
   <button type="submit" class="btn btn-primary btn-lg" button='agregar'>
    <span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Enviar
  </button> 
  </div>
  </div>
</form>
    <div class="modal-footer">
    </div>
  
</div>
</div>
</div>
<!--//////////////////////////////////////////////////-->





<!--///////////////////////  Notificaciones  ///////////////////////////-->

<div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
      <h4 class="modal-title">Publicaciones</h4>
    </div>
   
<ul class="menu" >

  <?php
    require('php/conexion.php');
      $usuario_id=$_SESSION['nombre'];

    $notifi = mysqli_query($conexion,"SELECT * FROM notificaciones WHERE Usuario = '$usuario_id' AND Leido = '0'" );
        
    while($notifica = mysqli_fetch_array($notifi)){
      
    ?>
      <li>
        <a href="#">
          <i class="glyphicon glyphicon-triangle-right"></i> <?php echo $notifica['Usuario']; ?>  <?php echo $notifica['Mensaje']; ?>
        </a>
      </li>
  <?php } ?>
 
</ul>
<?php 	
if ($notifica){
echo "mmm";
}
mysqli_query($conexion,"UPDATE notificaciones set Leido='1' WHERE Usuario = '$usuario_id' AND Leido = '0'");
?> 

    <div class="modal-footer">
    </div>
  </div>
</div>
</div>
<!--////////////////////////////////////////////////////////////////////////////////////////////-->








<!--///////////////////////  Enviar solicitud para ser moderador  ///////////////////////////-->

 <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">

				<form role="form"  id= "frmsolicitud" name="frmsolicitud" onsubmit="solicitudModerador(); return false">
										
						<h4 class="modal-title text-center">Solicitud para ser moderador</h4>
						<br>
						<div class="col-lg-12">
						<div class="form-group">
							<label>Ingrese su nombre de usuario</label>
							<input type="text" name= "user" id="user"  class="form-control" required>
						</div> 
							<button type="submit" class="btn btn-primary" button='agregar'>
								<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Enviar 
							</button> 
						</div>
				</form>	        
            </div>
          </div>
        </div>
</div>
<!--////////////////////////////////////////////////////////////////////////////////////////////-->


<script src="js/app1.js"></script>
<script src="js/jquery-2.2.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript" src="js/change.js"></script>
<script type="text/javascript" src="options.js"></script>
<script type="text/javascript" src="js/principal.js"></script>
<script type="text/javascript" src="js/buscador.js"></script>
<script type="text/javascript">     
   
	function cambiar(){
          $('#modal2').modal('show');

        }


   	function solicitudMode(){
          $('#modal4').modal('show');

        }

    function noti(){
          $('#modal5').modal('show');
        }

    function foto(){
          $('#modal3').modal('show');

        }


    </script>

<!--//////////////////////////////////////////////////////////////////////////////////////////////////-->


</body>