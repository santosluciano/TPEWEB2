$(document).ready(function () {
  llamada_ajax("home");
  $('.partial').on('click',function(event){
    event.preventDefault();
    let accion = this.href;
    $('.active').removeClass('active');
    if ($(this).attr('title') === "desplegable"){
      $('.dropdown-marcas').addClass('active');
    }else{
      $(this).parent().addClass('active');
    }
    llamada_ajax(accion);
  });
  function asignarProductos(){
    $('.partialContain').on('click',function(event){
      event.preventDefault();
      let accion = this.href;
      llamada_ajax(accion);
    });
  }
  $('.partialSearch').on('submit',function(event){
    event.preventDefault();
    let accion = this.action;
    let serializedData = $(this).serialize();
    $.post(accion, serializedData,
                 function(response) {
			      		$(".cuerpo").html(response);
                asignarProductos();
    });
  });
  function llamada_ajax(accion){
    $.ajax({
      url:accion,
      success: function(result) {
        $(".cuerpo").html(result);
        asignarProductos();
      }
    });
    let load = '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>';
    $(".cuerpo").html(load);
  }
});
