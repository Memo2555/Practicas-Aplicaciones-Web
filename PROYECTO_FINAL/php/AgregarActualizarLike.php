<?php

session_start();
$usuario_id = $_SESSION['nombre'];


if (! empty($_POST["valoracion"]) && ! empty($_POST["id"])) {



    require_once ("Like.php");
    $rate = new Rate();

    
    $valoracionResult = $rate->obtenervaloracionPorPublicacionParaUsuario($_POST["id"], $usuario_id);
    if (! empty($valoracionResult)) {
        $rate->actualizarvaloracion($_POST["valoracion"], $valoracionResult[0]["id"]);
    } else {
        $rate->addvaloracion($_POST["id"], $_POST["valoracion"], $usuario_id);
        
    }
    
    $postvaloracion = $rate->obtenervaloracionPorPublicacion($_POST["id"]);
    
    if (! empty($postvaloracion[0]["valoracion_count"])) {
        echo $postvaloracion[0]["valoracion_count"] . " Valoraciones";
        if (! empty($postvaloracion[0]["emoji_valoracion"])) {
            $emojiValoracionArray = explode(",", $postvaloracion[0]["emoji_valoracion"]);
            foreach ($emojiValoracionArray as $emojiData) {
                ?>
                                        <img
                                src="icons/<?php echo $emojiData; ?>.png"
                                class="emoji-data" />
                                    <?php
                }
            }
    }
}
?>