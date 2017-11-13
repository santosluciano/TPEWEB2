$(document).ready(function(){    
    let templateComentario;

    $.ajax({ url: 'js/templates/comentarios.mst'}).done( template => templateComentario = template);
    
    $('body').on('click','a.btnComentarios',function(){
        let idCelular = $(this).data('idcelular');
        cargarComentarios(idCelular);
    });

    function cargarComentarios(idCelular) {
        $.ajax("api/comentarios?id_celular="+idCelular)
           .done(function(comentarios) {
                 let rendered = Mustache.render(templateComentario , comentarios);
                //  let nota = 0;
                //  comentarios.forEach(function(comentario) {
                //     nota+=parseInt(comentario.nota_comentario);   
                //  });
                //  alert(nota);   
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
  
    //   function borrarTarea(idTarea) {
    //     $.ajax({
    //           method: "DELETE",
    //           url: "api/tareas/" + idTarea
    //         })
    //       .done(function() {
    //          $('#tarea'+idTarea).remove();
    //       })
    //       .fail(function() {
    //           alert('Imposible borrar la tarea');
    //       });
    //   }
  
    //   function completarTarea(idTarea) {
    //     $.ajax({
    //           method: "PUT",
    //           url: "api/tareas/" + idTarea + "/finalizar"
    //         })
    //       .done(function() {
    //          cargarTareas();
    //       })
    //       .fail(function(data) {
    //           console.log(data);
    //           alert('Imposible finalizar la tarea');
    //       });
    //   }
  
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
  
    // $('body').on('click', 'a.js-borrar', function() {
    //     event.preventDefault();
    //     let idTarea = $(this).data('idtarea');
    //     borrarTarea(idTarea);
    // });
  
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


  });
  