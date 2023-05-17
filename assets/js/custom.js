(function($){
$(document).ready(function(){
    $.ajax({
        url:blog.apiurl+"novedades",
        method: "GET",

        beforeSend: function () {
            $("#carga-novedades").html("Cargando...");
        },
        success: function(data){
            let html = "";
            data.forEach(item => {
                html += `<div class="col-12 my-3 d-flex row" id="sec-novedades">
                <div class="col-3 my-2">
            <p> ${item.fecha} </p>
            <h4 class="my-2">
                ${item.titulo}
            </h4> </div>
            <div class="col-9 my-2">
               ${item.contenido}
            </div>
            <hr>
        </div>`;                   })
            $("#carga-novedades").html(html);
        },
        error: function (error){
            console.log(error)
        },
    })
})
})(jQuery);