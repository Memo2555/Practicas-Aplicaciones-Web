$(document).ready(function(){
	
	$(function(){
		$("td[contenteditable=true]").blur(function(){			
			var field_id=$(this).attr("id");
			var value=$(this).text();			
			console.log('value: '+value+' field:'+field_id);
			$.post('php/modificarusuario.php', field_id+"="+value,function(data){	
				if(data!=''){
					console.log(data);
		//CHECAR ESTO 			
					if (data=="nombre"){
						window.location.reload(true);
						alert('el nombre ya existe');						
					}
				}		
			});
		});		
		
		$("td[button=true]").click(function(){
			if (confirm("esta seguro")) {
			var field_id=$(this).attr("id");
			console.log('id:'+field_id);			
			$.post('php/eleminaradmin.php', field_id,function(respuesta){
				if (respuesta=="true")
 				window.location.reload(true);
 			else
 				alert(respuesta);
			});				
		}
		});		
	});
		


	$("td[button=false]").click(function(){
		var value=$(this).attr("name");
		console.log('value: '+value);
		$.post('php/consultardatos.php',value,function(respuesta){	
				if (respuesta=="true")
 				window.location.href = "moverusuario.php";
 			else
 				alert(respuesta);	
			});			
		});
});



function Registraradministrador(){	
	if (document.getElementById("p1").value == document.getElementById("p2").value){
		$.post('php/agregaradministrador.php','&'+$("#frmadministrador").serialize(),function(respuesta){
 			if (respuesta=="true")
 				window.location.reload(true);
			   else
 				alert(respuesta);
			   });			   
	}else{
		alert('Las contraseñas no coinciden');
	}
}



function Registrarmoderador(){	
	if (document.getElementById("p1").value == document.getElementById("p2").value){
		$.post('php/agregarmode.php','&'+$("#frmoderador").serialize(),function(respuesta){

 			if (respuesta=="true")
 				window.location.reload(true);
			   else
 				alert(respuesta);
			   });			   
	}else{
		alert('las contraseñas no coinciden, intentelo de nuevo');
	}
}


function Registrarusuario(){	
	if (document.getElementById("p1").value == document.getElementById("p2").value){
		$.post('php/agregarusuario.php','&'+$("#frmusuario").serialize(),function(respuesta){
 			if (respuesta=="true")
 				window.location.reload(true);
			   else
 				alert(respuesta);
			   });			   
	}else{
		alert('Las contraseñas no coinciden');
	}
}


function iniciarsesion(){
	
	$.post('php/iniciarsesion.php','&'+$("#iniciar").serialize(),function(respuesta){		
 			if (respuesta=="admin"){

 				window.location.href = "frmadmin.php";	

			}

			else if(respuesta=="moderador"){

 				window.location.href = "frmmoderador.php";

			}
			else{

				if(respuesta=="usuario"){

				window.location.href = "frmusuario.php";
				}else{
					alert(respuesta);
				}
			}
			
 		});
		}