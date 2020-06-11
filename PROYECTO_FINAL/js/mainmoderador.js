$(document).ready(function()
{
	$(function(){
		
		$("td[button=false]").click(function(){
			if (confirm("esta seguro de eliminar"))
			 {
			var field_id=$(this).attr("id");
			console.log('id:'+field_id);			
			$.post('php/eliminarsolicitudmoderador.php', field_id,function(respuesta){
				if (respuesta=="true")
 				window.location.reload(true);
 			else
 				alert(respuesta);
			});		 		
		}
		});	


		$("td[button=true]").click(function(){
			if (confirm("esta seguro de aceptar"))
			 {
			var field_id=$(this).attr("id");
			console.log('id:'+field_id);			
			$.post('php/aceptarsolicitudmoderador.php', field_id,function(respuesta){
				if (respuesta=="true")
 				window.location.reload(true);
 			else
 				alert(respuesta);
			});		 		
		}
		});	





		
		
	});	
});


