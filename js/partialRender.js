$(document).ready(function () {
//  llamada_ajax("home");
  $(document).on('click','.partial',function(event){
    event.preventDefault();
    let accion = this.href;
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
