$(document).ready(function () {
   
    $(".emoji").on("click", function () {
        //Aquí estamos obteniendo la reacción que se utiliza utilizando el atributo de reacción de datos definido en la página principal
        var data_reaction = $(this).attr("data-reaction");
        
        // Enviar solicitud de Ajax en la página del controlador para realizar las operaciones de la base de datos
        $.ajax({
            type: "POST",
            url: "php/like.php",
            data: "data_reaction=" + data_reaction,
            success: function (response) {
                // Este código se ejecutará después de que el Ajax sea exitoso
                $(".like-details").html("You, Knowband and 10k others");
                $(".reaction-btn-emo").removeClass().addClass('reaction-btn-emo').addClass('like-btn-' + data_reaction.toLowerCase());
                $(".reaction-btn-text").text(data_reaction).removeClass().addClass('reaction-btn-text').addClass('reaction-btn-text-' + data_reaction.toLowerCase()).addClass("active");

                if (data_reaction == "Like")
                    $(".like-emo").html('<span class="like-btn-buena"></span>');
                else
                    $(".like-emo").html('<span class="like-btn-buena"></span><span class="like-btn-' + data_reaction.toLowerCase() + '"></span>');
            }
        })
    });

    // ---------------- FUNCION PARA DESHACER LA REACCION-------------------

    $(".reaction-btn-text").on("click", function () { // undo like click
        if ($(this).hasClass("active")) {
            // Enviar solicitud de Ajax en la página del controlador para realizar las operaciones de la base de datos
            $.ajax({
                type: "POST",
                url: "php/undo_like.php",
                data: "",
                success: function (response) {
                    // Manejar cuando el Ajax es exitoso
                    $(".reaction-btn-text").text("Like").removeClass().addClass('reaction-btn-text');
                    $(".reaction-btn-emo").removeClass().addClass('reaction-btn-emo').addClass("like-btn-default");
                    $(".like-emo").html('<span class="like-btn-buena"></span>');
                    $(".like-details").html("Knowband and 1k others");
                }
            })
        }
    })

    //---------------------------------
});