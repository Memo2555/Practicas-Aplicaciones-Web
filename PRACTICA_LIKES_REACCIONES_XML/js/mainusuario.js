$(document).ready(function(){
	$(function(){
		$("td[contenteditable=true]").blur(function(){			
			var field_id=$(this).attr("id");
			var value=$(this).text();			
			console.log('value: '+value+' field:'+field_id);
			$.post('php/modificarusuario.php', field_id+"="+value,function(data){	
				if(data!=''){
					console.log(data);
				}		
			});
		});		
		
		$("td[button=true]").click(function(){
			if (confirm("esta seguro")) {
			var field_id=$(this).attr("id");
			console.log('id:'+field_id);			
			$.post('php/eliminarusuario.php', field_id,function(respuesta){
				if (respuesta=="true")
 				window.location.reload(true);
 			else
 				alert(respuesta);
			});		 		
		}
		});		
	});	
});
function Registrarusuario(){	
	if (document.getElementById("p1").value == document.getElementById("p2").value){
		$.post('php/agregarusuario.php','&'+$("#frmusuario").serialize(),function(respuesta){
 			if (respuesta=="true")
 				window.location.reload(true);
			   else
 				alert(respuesta);
			   });			   
	}else{
		alert('las contraseñas no coinciden');
	}
}
