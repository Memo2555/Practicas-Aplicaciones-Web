

<!DOCTYPE html>
<html lang="es">  
  <head>    
    <title>Photogram</title>    	
    <meta charset="UTF-8">
    <meta name="title" content="Photogram">
     

   
  </head>  


<body>
<center> <br/><br/><br/>
<form onsubmit="return validateForm()" action="foto_post1.php" method="POST" enctype="multipart/form-data">  

  <div class="hl-icon" style="margin-left: 49%;">
    <div class="image-upload">
        <label for="file-input">
          <img src="images/icons/mas.png" width="50" title ="Sube una foto ó video" >
        </label>
        <input id="file-input" type="file" name="file-input" required="" hidden="" />
    </div>
  </div><br/><br/>



<div tyle=" margin-left: 45%;">
<input type="text" name="comentario" placeholder="Comentario...." value="" />
</div><br/><br/><br/>

<div style="float: left; clear: both; margin-left: 45%;">
  <input name="submit" type="submit" class="myButton" value="Compartir">   
</div>
</form>  
</center>

  </body>  
</html>