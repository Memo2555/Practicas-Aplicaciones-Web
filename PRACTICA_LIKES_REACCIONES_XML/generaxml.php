<?php

session_start();
//include("includes/header.php");
$usuario = "root";
$contrasena = "";
$mbd = new PDO('mysql:host=localhost;dbname=practica_final', $usuario, $contrasena);
$gsent = $mbd->prepare("SELECT * FROM archivo");
$gsent->execute();

$i = 0;
$matrizDeComentarios = Array();

while($result1 = $gsent->fetch(PDO::FETCH_ASSOC)){
    $matrizDeComentarios[] = array(
		array(
			"id"=>$result1['id'],

			"Comentario"=>array(
				"contenido"=>$result1['Comentario']
			)

//*			"likes"=>array(
//			"likes"=>$result1['likes'],

//			)
        )
	);
}

/*print_r ($matrizDeComentarios);
echo "<br>";
echo $matrizDeComentarios[0][0]['comentario_id'];
echo "<br>";*/
 
	// Convertimos la matriz a una cadena con formato XML.
	$textoXML = '<?xml version="1.0" encoding="UTF-8"?>';
	$textoXML .= "\n";
	$textoXML .= '<comentarios>';
	$textoXML .= "\n";
	foreach ($matrizDeComentarios as $comentario){
		$textoXML .= "\t";
		$textoXML .= '<comentario id="'.$comentario[0]["id"].'">';
		$textoXML .= "\n";
		$textoXML .= "\t\t";

		$textoXML .= '<contenido>';


				$textoXML .= "\n";
				foreach ($comentario[0]["Comentario"] as $keyMiembro=>$miembro){
					$textoXML .= "\t\t\t";
					$textoXML .= '"'.$miembro.'"';
					$textoXML .= "\n";
				}
				$textoXML .= "\t\t";


		$textoXML .= '</contenido>';


		$textoXML .= "\n";
		$textoXML .= "\t";
		$textoXML .= '</comentario>';
		$textoXML .= "\n";
	}
	$textoXML .= '</comentarios>';
 
	// Nos aseguramos de que la cadena que contiene el XML esté en UTF-8
	$textoXML = mb_convert_encoding($textoXML, "UTF-8");
 
	// Grabamos el XML en el servidor como un fichero plano, para
	// poder ser leido por otra aplicación.
	$gestor = fopen("publicaciones.xml", 'w');
	fwrite($gestor, $textoXML);
    fclose($gestor);
    
    ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="frmadmin.php">Regresar:<?php echo $_SESSION['nombre'];?></a>
    </div>
   
    <ul class="nav navbar-nav navbar-right">
      
      <li><a href="lindex.php"><span class="glyphicon glyphicon-log-in"></span> Cerrar Sesion</a></li>
    </ul>
  </div>
</nav>
  
<div class="alert alert-success" role="alert">
  Archivo XML creado exitosamente 
</div>