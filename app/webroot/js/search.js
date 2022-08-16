$(document).ready(function(){
    $("#s").autocomplete({
        minLength: 2,
        select: function(event, ui) {
            $("#s").val(ui.item.label);
        },
        source: function(request, response) {
            $.ajax({
                url: basePath + "farmacos/mijson",
                data: {
                    term: request.term
                },
                dataType: "json",
                success: function(data){
                    response($.map(data, function(el, index){
                        return {
                            value: el.Farmaco.nombre,
                            descripcion: el.Farmaco.nombre,
                            existencia: el.Farmaco.Existencia,
                            familia: el.Farmaco.familia,
                            presentacion: el.Farmaco.presentacion
                        };
                    }));
                }
            });
        }
    }).data("ui-autocomplete")._renderItem = function(ul, item){
        return $("<li></li>")
        .data("item.autocomplete", item)
        .append("<a>" + item.descripcion + " "+ item.familia + " " + item.presentacion + " " + item.existencia + " existencias </a>")
        .appendTo(ul)
    };
});