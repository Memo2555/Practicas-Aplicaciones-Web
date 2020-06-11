function cambiarpassword(){	
	if (document.getElementById("p3").value == document.getElementById("p4").value)
	{
			$.post('php/modificarpassword.php','&'+$("#frmcambiar").serialize(),function(respuesta){
				if (respuesta=="true")
					window.location.reload(true);
				else
					alert(respuesta);
				
			if (respuesta=="contraseña cambiada")
				window.location.reload(true);
			});			   
	}
	 
	else{
		alert('las contraseñas no coinciden');
	}
}




