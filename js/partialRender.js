$(document).ready(function () {
  llamada_ajax("home");
  $(document).on('click','.partial',function(event){
    event.preventDefault();
    let accion = this.href;
    $('.active').removeClass('active');
<<<<<<< HEAD
    if ($(this).attr('id') === "desplegable"){
      $('.dropdown-marcas').addClass('active');
    }else{
=======
    if ($(this).attr('id') === "desplegable") {
      $('.dropdown-marcas').addClass('active');
    }else {
>>>>>>> 0138ada835d3ad230284bd2789be78d5c9fdb93c
      $(this).parent().addClass('active');
    }
    llamada_ajax(accion);
    $(".cuerpo").html("Cargando...");
  });
  $('.partialSearch').on('submit',function(event){
    event.preventDefault();
    let accion = this.action;
    let serializedData = $(this).serialize();
    $.post(accion, serializedData,
                 function(response) {
			      		$(".cuerpo").html(response);
    });
  });
  function llamada_ajax(accion){
    $.ajax({
      url:accion,
      success: function(result) {
        $(".cuerpo").html(result);
      }
    });
  }
});
