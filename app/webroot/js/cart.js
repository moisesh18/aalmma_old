$(document).ready(function(){
    $('.numeric').on('keyup change', function(event){
        var cantidad = Math.round($(this).val());
        ajaxupdate($(this).attr("data-id"), cantidad);
    });
    
    function ajaxupdate(id, cantidad) {
        $.ajax({
            type: "POST",
            url: basePath + "pedidos/itemupdate",
            data: {
                id: id,
                cantidad: cantidad
            },
            dataType: "json",
            success: function (data) {
                
            }
        });
    }


    $('.remove').click(function(){
            ajaxcart($(this).attr("id"), 0);
            return false;
        });

        function ajaxcart(id, cantidad)
        {
            if(cantidad === 0)
            {
                $('#row-' + id).fadeOut(1000, function(){$('#row-' +id).remove();});
            }

            $.ajax({
                type: "POST",
                url: basePath + "pedidos/remove",
                data: {
                    id: id
                },
                dataType: "json",
                success: function(data){
                    $('#msg').html('<div class="alert alert-success flash-msg">Farmaco Eliminado.</div>');
                    $('.flash-msg').delay(2000).fadeOut('slow');
                    if(data.pedidos == "")
                    {
                        window.location.replace(basePath + "farmacos/index");
                    }
                },
                error: function(){
                }
            });            

        }
});