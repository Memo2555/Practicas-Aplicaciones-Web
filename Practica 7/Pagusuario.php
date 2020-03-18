<?php
	//$correo = $_POST['cor'];
	//$pass = $_POST['cont'];
	session_start();
	//error_reporting(0);
	//$tema=$_SESSION['tema'];
	
	
	//echo"$correo";
	$usuario = 'root';
    $contrasena = "";
    $mbd = new PDO('mysql:host=localhost;dbname=practica_4', $usuario, $contrasena);
    //foreach($mbd->query('SELECT * from prueba') as $fila) {
    //    print_r($fila);
	
	
  
    $gsent = $mbd->prepare("SELECT * FROM  tabla_aceptar WHERE id=1");
    $gsent->execute();
    if($result3 = $gsent->fetch(PDO::FETCH_OBJ)){
        echo "<p>";
        
    }
	
	
	
	else
	{
		//header("Location:Stop.html");
        print("\n");
        echo "</p>";
		//echo"no se conecto ";
		die();
	}
	
	
    $mbd = null;
    

	
	
?>

<!DOCTYPE html>
<html lang="es">

	<head>
		<title>Pagina del administrador</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="Estilousuario5.css">
	</head>
		
	<script>
	 function fom(){
		 var header = document.getElementById("header");
		 var inf = document.getElementById("inf");
		 var perfil= document.getElementById("perfil");
		 var cerrar = document.getElementById("cerrar");
		 var menu = document.getElementById("menu");
		  var te = document.getElementById("te");
		   var section = document.getElementById("section");
		  var contenedor = document.getElementById("contenedor");  
		  var body = document.getElementById("body");  
		 // contenedor.className = "<?php echo "$result3->Color" ;?>";
		  header.className = "<?php echo "$result3->Color" ;?>";
		   inf.className = "<?php echo "$result3->Color" ;?>";
		   perfil.className = "<?php echo "$result3->Color" ;?>";
		   cerrar.className = "<?php echo "$result3->Color" ;?>";
		   menu.className ="<?php echo "$result3->Color" ;?>";
		   te.className ="<?php echo "$result3->Color" ;?>";
		   section.className ="<?php echo "$result3->Color" ;?>";
		   contenedor.className = "<?php echo "$result3->Fuente" ;?>";
		   body.className = "<?php echo "$result3->Tamano" ;?>";
	
	  }
        </script>
		
<script>
	//console.log(colorp);
		
			function acc1(){
	
			console.log('esta bien perro');
			var ancla= document.getElementsByClassName('actu')
			for(var i=0; i < ancla.length; i++){
				ancla[i].classList.toggle('desa');
			}
			
}
			</script>
	<body id="body" onload="fom()">
		<div id="contenedor">
				<div id="header" class= "">
					<h1>Lobochismes</h1>
			</div>
			<div id="he">
			
				<div id="inf">
				
						<h3>Hola <?php print $result3->Nombre."\n"; print $result3->Apellidos."\n"; ?></h3>
						<h4>Tienes <?php print $result3->Edad."\n"; echo" años, tu fecha de nacimiento es ";  echo" eres ";
						print $result3->Facultad."\n"; echo" y tu correo es "; print $result3->Correo."\n"; ?>  </h4>
						
					
				</div>
				<div id="perfil">
					<a href="Perf.php"> Perfil </a>
				</div>
				
				<div id="cerrar">
					<a href="cerrar.php"> Cerrar sesión </a>
				</div>
			</div>
			<br>
			
		  <div id="menu">
				<nav>
				<h2>Menu</h2>
					<u1>
						<li><a href="Formulariochisme.php"> Escribe un chisme </a></li>
					</u1>
					<u2>
						<li><a href="#" onclick="acc1()"> Edita tu pagina  </a></li>
					</u2>
				</nav>
					<div class="actu desa">
					<?php
					
					include("dinamic.php");
					?>
					
					</div>
			</div>
			
		
			<div id="te">
			
			  <h2>Tema del dia: Facultades</h2>
			</div>
			<div id="contenido">
				<div id="section">
					
				<table>
			<thead>
				<tr>
					<th width="27%">Nombre</th>
					<th width="23%">Facultad</th>
					<th width="50%">Chisme</th>
				</tr>
			</thead>		
				<tbody>
					<?php
					$usuario = 'root';
						$contrasena = "";
    					$mbd1 = new PDO('mysql:host=localhost;dbname=practica_4', $usuario, $contrasena);
						$gsenta = $mbd1->prepare("SELECT * FROM  chismes_aceptados");
				$gsenta->execute();
			
				while($resulta = $gsenta->fetch(PDO::FETCH_OBJ)){
					echo "<tr>
					<td> $resulta->Nombre</td>
					<td> $resulta->Facultad</td>
					<td> $resulta->Chisme_aceptado</td>
					</tr>";
				}
					?>
				  </div>	
				</tbody>
				</table>
		  </div>
				
		</div>	

	
	</body>
</html>