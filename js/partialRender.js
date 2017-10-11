$(document).ready(function () {
  $('.partial').on('click',function(event){
    event.preventDefault();
    let accion = this.href;
    $.ajax({
      url:accion,
      success: function(result) {
        $(".cuerpo").html(result);
      }
    });
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
});
