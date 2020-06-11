<?php

require_once "DBController.php";

class Rate extends DBController
{

    function getAllPost()
    {
        $query = "SELECT publicacion.*, COUNT(valoracion.valoracion) as valoracion_count, group_concat(distinct valoracion) as emoji_valoracion   FROM publicacion LEFT JOIN valoracion ON publicacion.id = valoracion.publicacion_id GROUP BY publicacion.id";
        
        $postResult = $this->getDBResult($query);
        return $postResult;
    }


    function obtenervaloracionPorPublicacion($publicacion_id)
    {
        $query = "SELECT publicacion.*, COUNT(valoracion.valoracion) as valoracion_count, group_concat(distinct valoracion) as emoji_valoracion FROM publicacion LEFT JOIN valoracion ON publicacion.id = valoracion.publicacion_id WHERE valoracion.publicacion_id = ? GROUP BY valoracion.publicacion_id";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $publicacion_id
            )
        );
        
        $postResult = $this->getDBResult($query, $params);
        return $postResult;
    }

    function obtenervaloracionPorPublicacionbueno($publicacion_id)
    {
        $query = "SELECT  COUNT(valoracion) as bueno_count FROM  valoracion  WHERE publicacion_id = ?  and valoracion = 'buena'";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $publicacion_id
            )
        );
 
        
        $postResultas = $this->getDBResult($query, $params);
        return $postResultas;
    }

    function actualizarvaloraciontablabuena($valoracion, $valoracion_id)
    {
        $query = "UPDATE publicacion SET  Buena = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $valoracion
            ),
            array(
                "param_type" => "i",
                "param_value" => $valoracion_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function obtenervaloracionPorPublicacionregular($publicacion_id)
    {
        $query = "SELECT  COUNT(valoracion) as regular_count FROM  valoracion  WHERE publicacion_id = ?  and valoracion = 'regular'";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $publicacion_id
            )
        );
 
        
        $postResultas = $this->getDBResult($query, $params);
        return $postResultas;
    }

    function actualizarvaloraciontablaregular($valoracion, $valoracion_id)
    {
        $query = "UPDATE publicacion SET  Regular = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $valoracion
            ),
            array(
                "param_type" => "i",
                "param_value" => $valoracion_id
            )
        );
        
        $this->updateDB($query, $params);
    }
    

    function obtenervaloracionPorPublicacionmala($publicacion_id)
    {
        $query = "SELECT  COUNT(valoracion) as mala_count FROM  valoracion  WHERE publicacion_id = ?  and valoracion = 'mala'";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $publicacion_id
            )
        );
 
        
        $postResultas = $this->getDBResult($query, $params);
        return $postResultas;
    }

    function actualizarvaloraciontablamala($valoracion, $valoracion_id)
    {
        $query = "UPDATE publicacion SET  Mala = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $valoracion
            ),
            array(
                "param_type" => "i",
                "param_value" => $valoracion_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    


    function obtenervaloracionPorPublicacionParaUsuario($publicacion_id, $usuario_id)
    {
        $query = "SELECT * FROM valoracion WHERE publicacion_id = ? AND usuario_id = ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $publicacion_id
            ),
            array(
                "param_type" => "s",
                "param_value" => $usuario_id
            )
        );
        
        $valoracionResult = $this->getDBResult($query, $params);
        return $valoracionResult;
    }

    function addvaloracion($publicacion_id, $valoracion, $usuario_id)
    {
          $query = "INSERT INTO valoracion (publicacion_id,valoracion,usuario_id) VALUES (?, ?, ?)";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $publicacion_id
            ),  
            array(
                "param_type" => "s",
                "param_value" => $valoracion
            ),
            array(
                "param_type" => "s",
                "param_value" => $usuario_id
            )
        );
        
        $this->
        updateDB($query, $params);
    }

    

    function actualizarvaloracion($valoracion, $valoracion_id)
    {
        $query = "UPDATE valoracion SET  valoracion = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $valoracion
            ),
            array(
                "param_type" => "i",
                "param_value" => $valoracion_id
            )
        );
        
        $this->updateDB($query, $params);
    }

    function actualizarvaloraciontabla($valoracion, $valoracion_id)
    {
        $query = "UPDATE publicacion SET  Valoraciones = ? WHERE id= ?";
        
        $params = array(
            array(
                "param_type" => "s",
                "param_value" => $valoracion
            ),
            array(
                "param_type" => "i",
                "param_value" => $valoracion_id
            )
        );
        
        $this->updateDB($query, $params);
    }
}
