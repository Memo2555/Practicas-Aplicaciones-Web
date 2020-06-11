$(document).ready(function(){
	
	$(function(){
			
		$("td[button=false]").click(function(){
			if (confirm("esta seguro de eliminar")) {
			var field_id=$(this).attr("id");
			var usuario_id=$(this).attr("usuario");
			console.log('id:'+field_id);
			console.log('usuario:'+usuario_id);
			$.post('php/eliminarpub.php', field_id, usuario_id, function(respuesta){
				if (respuesta=="true")
 				window.location.reload(true);
 			else
 				alert(respuesta);
			});		 		
		}
		});		
	});	
	

	$(function(){
			
		
		$("td[button=true]").click(function(){
			if (confirm("esta seguro de aceptar")) {
			var field_idup=$(this).attr("id");
			console.log('id:'+field_idup);
			$.post('php/insertarpub.php' , field_idup, function(respuesta){
				if (respuesta=="true")
 				window.location.reload(true);
 			else
 				alert(respuesta);
			});		 		
		}
		});		
	});	
});

