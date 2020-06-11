$(function(){
	$('#datos-result').hide();
	$('#search').keyup(function(e){
		if($('#search').val()){
			let search = $('#search').val();
			$.ajax({
				url:'php/pub-buscar.php',
				type: 'POST',
				data: {search: search},
				success: function(response){
					let datos = JSON.parse(response);
					let usuario = '';
					let tema = '';
					
					datos.forEach(dato => {
						usuario += ` <a href='Buscador-pagi.php?id=${dato.id}'>
						 <li>Usuario:  ${dato.Usuario} <br>
							 Tema: ${dato.Tema} <br>
							 Titulo: ${dato.Titulo} <br>
							 Resumen: ${dato.Resumen} <br></li>

							 <img src="${dato.Contenido}"  height="150px"><hr>
						</a>`
					});
					
					
					$('#conteiner').html(usuario);
					$('#datos-result').show();
				}
			})
		}
		else {
			$('#datos-result').hide();
		}
		
	})
});