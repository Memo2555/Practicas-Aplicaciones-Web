<?php

include('conexion.php');

    if (isset($_POST['name'])) {

        $name = $_POST['name'];
        
        $query = "INSERT INTO temas (tema) VALUES ('$name')";
        $resultado = mysqli_query($conexion, $query);
    
        if (!$resultado) {
            die('Query fallo.');
        }
        echo 'Task added Successfully';
    }

    ?>