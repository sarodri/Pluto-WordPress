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
                html += `<div class="col-md-6 my-3" id="sec-novedades">
            <h4 class="my-2">
                ${item.titulo}
            </h4>
            <div class="my-2">
               ${item.contenido}
            </div>
        </div>`;                   })
            $("#carga-novedades").html(html);
        },
        error: function (error){
            console.log(error)
        },
    })
})
})(jQuery);