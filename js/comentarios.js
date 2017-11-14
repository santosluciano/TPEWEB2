$(document).ready(function(){    
    let templateComentario;

    $.ajax({ url: 'js/templates/comentarios.mst'}).done( template => templateComentario = template);
    
    $('body').on('click','.btnComentarios',function(){
        let idCelular = $(this).data('idcelular');
        cargarComentarios(idCelular);
    });

    function cargarComentarios(idCelular) {
        $.ajax("api/comentarios?id_celular="+idCelular)
           .done(function(comentarios) {
                let rendered = Mustache.render(templateComentario , comentarios);  
                $('.comentarios').html(rendered);
               })
               .fail(function() {
                   $('.comentarios').html('No se pudieron cargar los comentarios');
               });      
    }
  
    function crearComentario(id_usuario,id_celular) {
        let comentario ={
             "id_celular": id_celular,
             "id_usuario": id_usuario,
             "texto_comentario": $('#review').val(),
             "nota_comentario": $('#notaUsuario').val()
            };  
        $.ajax({
               method: "POST",
               url: "api/comentarios",
               data: JSON.stringify(comentario)
             })
           .done(function(comentarios) {               
             let rendered = Mustache.render(templateComentario , comentarios);
             $('.comentarios').prepend(rendered);
           })
           .fail(function(data) {
               console.log(data);
               alert('Imposible comentar');
           });
    }
  
    function borrarComentario(idComentario) {
         $.ajax({
               method: "DELETE",
               url: "api/comentarios/" + idComentario
            })
           .done(function() {
              $('#comentario'+idComentario).remove();
            })
           .fail(function() {
               alert('Imposible borrar el comentario');
            });
    }
  
    // $('#refresh').click(function(event){
    //     event.preventDefault();
    //     cargarTareas();
    // });
  
     $('body').on('submit','.publicarComentario',function(event){
         event.preventDefault();
         let id_usuario = $(this).data('idusuario');
         let id_celular = $('.btnComentarios').data('idcelular');
         crearComentario(id_usuario,id_celular);
     });
  
    $('body').on('click', 'a.comentario-borrar', function() {
        event.preventDefault();
        let idComentario = $(this).data('idcomentario');
        borrarComentario(idComentario);
    });
  
    // $('body').on('click', 'a.js-completada', function() {
    //     event.preventDefault();
    //     let idTarea = $(this).data('idtarea');
    //     completarTarea(idTarea);
    // });

     $('body').on('click','.btn-review',function(event){
        event.preventDefault();
        let accion = this.href;
        $.ajax({
            url:accion,
            success: function(result) {
              $(".comentar").html(result);
            },
            error: function(){
              $(".comentar").html("<h1>Error - Request Failed!</h1>");
            }
          });
     });
     $('body')
     //cuerpoCelulares

  });
  