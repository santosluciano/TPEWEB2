$(document).ready(function(){    
    let templateComentario;

    $.ajax({ url: 'js/templates/comentarios.mst'}).done( template => templateComentario = template);
    $('body').on('click','a.btnComentarios',function(){
        let idCelular = $(this).data('idcelular');
        cargarComentarios(idCelular);
    });

    function cargarComentarios(idCelular) {
        $.ajax("api/comentarios/celular/"+idCelular)
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
  
     function crearComentario() {
        let comentario ={
             "id_celular": 1,
             "id_usuario": 1,
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
             $('.comentarios').append(rendered);
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
         crearComentario();
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
  
  });
  