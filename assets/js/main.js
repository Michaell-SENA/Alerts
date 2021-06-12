$(document).ready(function(){

    $('#schear').keyup(function(event){

        event.preventDefault();
        let data = $('#form').serializeArray();

        $.post({

            url: '../datos/registros.php',
            data:data,
            success: function(response){

                $('#response').html(response);

            }

        });

    })

});



$(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false;
        }
    });
});