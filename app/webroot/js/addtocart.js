$(document).ready(function(){
    $('.addtocart').on('click', function(event) {
        $.ajax({
            type: "POST",
            url: basePath + "pedidos/adddrugs",
            data: {
                id: $(this).attr("id"),
                consultorio: $(this).attr("data-consultorio"),
                cantidad: 1
            },
            dataType: "html",
            success: function(data) {
                if ('referrer' in document) {
                    window.location = document.referrer;
                } else {
                    window.history.back();
                }
                $('#msg').html('<div class="alert alert-success flash-msg">Farmaco Agregado</div>');
                $('.flash-msg').delay(10000).fadeOut('slow');
                
            },
            error: function(){
                alert('Tenemos problemas :('+ basePath + "pedidos/adddrugs");
            }
        });
        return false;
    });
});