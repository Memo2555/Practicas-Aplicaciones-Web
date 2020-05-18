console.log('hello world');
$(document).ready(function() {	
console.log('read');



    function update(){
		var ID = $('#ID').text();
        var Nombre = $('#Nombre').text();
		var Imagen = $('#Imagen').val();
        var ID_rand = Math.round(Math.random()*(6-1)+parseInt(1));;
       
	console.log(ID_rand);
	
        $.ajax({
            type: 'POST',
            url: 'dato_anuncio.php',
			data: {ID_rand},
            success: function(res) {
				let respuesta = JSON.parse(res)
                console.log(res);
            }
        })
    }
 
    setInterval(update, 3000);
});