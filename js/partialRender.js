$(document).ready(function () {
  //Llamada a ajax cuando se carga o recarga la pagina
  llamada_ajax("home");
  //Partial render comun de la pagina
  $('body').on('click','.partial',function(event){
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
  //Partial render para el submit de la busqueda
  $('body').on('submit','.partialSearch',function(event){
    event.preventDefault();
    let accion = this.action;
    let serializedData = $(this).serialize();
   $.post(accion, serializedData, function(response) {
			      		$(".cuerpo").html(response);
    });
    cargando(); 
  });
  //Partial render para la busqueda en tiempo real
  $('body').on('keyup','.partialSearch',function(event){
    event.preventDefault();
    $('.dropdown-busqueda').addClass('open');
    let accion = this.action+"/sugerencia";
    let serializedData = $(this).serialize();
    if($("#buscador").val()!==''){
      $.post(accion, serializedData,
                   function(response) {
                  $(".busqueda").html(response);
    });
    let load = '<i class="fa fa-spinner fa-pulse fa-fw carga"></i>';
    $(".busqueda").html(load);
    }else {
      $('.dropdown-busqueda').removeClass('open');
    }
  });
  //Llamada a ajax comun
  function llamada_ajax(accion){
    $.ajax({
      url:accion,
      success: function(result) {
        $(".cuerpo").html(result);
      },
      error: function(){
        $(".cuerpo").html("<h1>Error - Request Failed!</h1>");
      }
    });
    cargando();
  }
  //Llamada a ajax en el caso que se tiene que generar el grafico para la vista del celular
  function llamada_ajax_grafico(accion,id){
    $.ajax({
      url:accion,
      success: function(result) {
        $(".cuerpo").html(result);
        cargar_estadisticas(id);
      },
      error: function(){
        $(".cuerpo").html("<h1>Error - Request Failed!</h1>");
      }
    });
    cargando();
  }
  //Maneja el comportamiento de apertura del dropdown de busqueda
  $('body').on('click','.dropdown-busqueda',function (event) {
    event.preventDefault();
    $(this).toggleClass('open');
  });
  //Muestra el gif de cargando en el cuerpo de la pagina
  function cargando() {
    let load = '<i class="fa fa-spinner fa-pulse fa-3x fa-fw carga"></i>';
    $(".cuerpo").html(load);
  }
  //Asigna a los items que se llaman con el partial de nav su comportamiento
    $('body').on('click','.partialContain',function(event){
      event.preventDefault();
      let accion = this.href+'/'+$(this).data("value");
      if ($(this).hasClass('contenedor-celular')){
        llamada_ajax_grafico(accion,$(this).data("value"));
      }else{
        llamada_ajax(accion);
      }
    });
    $('body').on('submit','.form-registro',function(event){
      event.preventDefault();
      let accion = this.action;
      let serializedData = $(this).serialize();
     $.post(accion, serializedData, function(response) {
              (response == true)?location.reload():$(".cuerpo").html(response);
      });
      cargando(); 
    });  
    $('body').on('submit','.formlogin',function(event){
      event.preventDefault();
      let accion = this.action;
      let serializedData = $(this).serialize();
     $.post(accion, serializedData, function(response) {
          (response == true)?location.reload():$(".error-logueo").html(response);
      });
    });      
});
