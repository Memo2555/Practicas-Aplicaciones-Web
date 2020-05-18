<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <link href="css/estilo_1.css" rel="stylesheet" type="text/css"/>  
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<title>Bienvenido</title>
</head>
<body>
	<script src="js/app_ajax.js"></script>
   <div class="container">
	<nav class="navbar navbar-default">

		<div class="container-fluid">

			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#miMenu">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>

				<a href="frmusuario.php" class="navbar-brand">Bienvenido usuario
				<?php
					session_start();
					echo $_SESSION['nombre'];
					?>
				</a>
			</div>		

			<div class="collapse navbar-collapse" id="miMenu">

    				<ul class="nav navbar-nav">
    					<li><a href="datospersonales.php">Datos personales</a></li>
    					<li><a onclick="cambiar();" href="#">Cambiar contraseña</a></li>
    					<li><a onclick="editarPag();" href="#">Editar pagina</a></li>
						<li><a onclick="public();" href="#">Publicaciones</a></li>
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
							         <a href="megusta.php?id=<?php echo $usuarios['id'];?>" class="options" data-vote-type="1" id="post_vote_up_">

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
	               <div class="hl-icon"><a href="imagen.php"><img src="images/icons/mas.png" width="50" title ="Sube una foto" ></a>
		            </div>
					
						
          </div>
			<br>
			<br>
			     <span class="anuncio">
				
				 	<?php
								     require('php/conexion.php');
									 
									 $ID=rand(1,5);
									 echo $ID;


								     $result=mysqli_query($conexion,'SELECT * FROM anuncio WHERE ID ='.$ID);
								     while ($info=mysqli_fetch_array($result))

								    {
				              
									$id=$info['ID'];
									$Nombre=$info['Nombre'];
									$imagen=$info['Imagen'];
								?>
									 <h1> Anuncio <?php echo $info['Nombre'];?>  </h1>
									<img height="190" width="326" src="data:image/jpg;base64,<?php echo base64_encode($info['Imagen']); ?>">
								 <?php 
								   }	
								 ?>
				</span>
		</div>
	</nav>
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




<!--///////////////////////  EDITAR PAGINA  ///////////////////////////-->

 <div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-hidden="true">

        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Editar pagina</h4>
            </div>
            <form role="form"  id= "frmcambiarpag" name="frmcambiarpag" onsubmit="editarPagina(); return false">
              <div class="col-lg-12">               

                <div class="form-group">
                  <label>Color</label>
                  <select  name='colores' id="colores" >
				  <option value="rojoall">Rojo</option>
				  <option value="azulall">Azul</option>
				  <option value="verdeall">Verde</option>
				  <option value="amarillofondo">Amarillo</option>
				</select>
         <!--         <input  name="color" id="d2" class="form-control" type="password"required>   -->
                </div>

                <div class="form-group">
                <label>Tamaño de letra</label>
                <select  name="tamano" >
				  <option value="peque">Pequeño</option>
				  <option value="mediano">Mediano</option>
				  <option value="grande">Grande</option>
				</select>
          <!--        <input  name="tamaño" id="d3" class="form-control" type="password"required>  -->
                </div>
                
                <div class="form-group">
                  <label>Fuente</label>

                  <select name="fuente">
				  <option value="larial">Arial</option>
				  <option value="lcalibri">Calibri</option>
				  <option value="ltime">Times New Roman</option>
				  <option value="lcomic">Comic Sans MS</option>
				</select>
                  <!--<input  name="fuente" id="d4" class="form-control" type="password" required>  -->
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
<script type="text/javascript" src="js/change1.js"></script>
<script type="text/javascript" src="options.js"></script>
<script type="text/javascript">     
   
	function cambiar(){
          $('#modal2').modal('show');

        }


   	function editarPag(){
          $('#modal4').modal('show');

        }


    </script>
</body>