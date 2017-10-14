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
    cargando();
  });
  $('.partialSearch').on('keyup',function(event){
    event.preventDefault();
    $('.dropdown-busqueda').addClass('open');
    let accion = this.action+"/sugerencia";
    let serializedData = $(this).serialize();
    if($("#buscador").val()!==''){
      $.post(accion, serializedData,
                   function(response) {
                  $(".busqueda").html(response);
                  asignarProductos();
    });
    let load = '<li><a class="fa fa-spinner fa-pulse fa-fw"></a></li>';
    $(".busqueda").html(load);
  }else {
    $('.dropdown-busqueda').removeClass('open');
  }
  });
  function llamada_ajax(accion){
    $.ajax({
      url:accion,
      success: function(result) {
        $(".cuerpo").html(result);
        asignarProductos();
      },
      error: function(){
        $(".cuerpo").html("<h1>Error - Request Failed!</h1>");
      }
    });
    cargando();
  }
  $('.dropdown-busqueda').on('click',function (event) {
    event.preventDefault();
    $(this).toggleClass('open');
  });
  function cargando() {
    let load = '<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>';
    $(".cuerpo").html(load);
  }
});
