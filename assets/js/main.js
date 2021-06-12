// $(document).ready(function(){

//     $('#schear').keyup(function(event){

//         event.preventDefault();
//         let data = $('#form').serializeArray();

//         $.post({

//             url: '../datos/registros.php',
//             data:data,
//             success: function(response){

//                 $('#response').html(response);

//             }

//         });

//     })

// });

// $(document).ready(function() {
//     $("button").click(function() {

//         var usuario = $("#schear").val();

//         $.get("../datos/registros.php", {nombres: usuario}, function(respuesta){

//             $("#response").text(respuesta);

//         });

//     });
// });



// $(document).ready(function() {
//     $("form").keypress(function(e) {
//         if (e.which == 13) {
//             return false;
//         }
//     });
// });


//URL CORRECTA
// vista/registros.php?nombre=dante&busqueda=22