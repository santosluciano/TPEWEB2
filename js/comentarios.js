$(document).ready(function(){    
    //template para la carga de comentarios
    let templateComentarios;
    //template para la carga del comentario del usuario
    let templateComentario;
    //variable en donde se carga el intervalo de carga de comentarios
    let recarga;
    //asignando template de comentarios
    $.ajax({ url: 'js/templates/comentarios.mst'}).done( template => templateComentarios = template);
    //asignando template de comentarios de usuario
    $.ajax({ url: 'js/templates/comentarios.mst'}).done( template => templateComentario = template);
    //cuano se hace click para ver los comentarios, llama la carga y a la funcion para carga automatica de comentarios
    $('body').on('click','.btnComentarios',function(){
        clearInterval(recarga);
        let idCelular = $(this).data('idcelular');
        cargarComentarios(idCelular,"api/comentarios?id_celular="+idCelular);
        cargaAutomatica(idCelular);
    });
    //se establece un timer de 2 segundos para llamar a la funcion cargarComentarios
    function cargaAutomatica(idCelular){
        recarga = setInterval(function(){ cargarComentarios(idCelular) }, 2000); 
    };
    //llama con ajax a la api, la cual le devuelve los comentarios, y los carga en la pagina
    function cargarComentarios(idCelular) {
        $.ajax("api/comentarios?id_celular="+idCelular)
           .done(function(comentarios) {
                let rendered = Mustache.render(templateComentarios , comentarios);  
                $('.comentarios').html(rendered);
            })
            .fail(function() {
                $('.comentarios').html('No se pudieron cargar los comentarios');
            });      
    }
    //Crear un comentario y lo manda a la api con ajax, la cual le devuelve el comentario y lo inserta en la pagina 
    function crearComentario(id_usuario,id_celular) {
        let comentario ={
             "id_celular": id_celular,
             "id_usuario": id_usuario,
             "texto_comentario": $('#review').val(),
             "nota_comentario": $('input:radio[name=puntaje]:checked').val()             
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
    //elimina un comentario
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
    //recibe los datos del usuario y el celular y llama a la funcion crearComentario
    $('body').on('submit','.publicarComentario',function(event){
        event.preventDefault();
        let id_usuario = $(this).data('idusuario');
        let id_celular = $('.btnComentarios').data('idcelular');
        crearComentario(id_usuario,id_celular);
    });
    //llama a la funcion borrarComentario mandandole el id del mismo
    $('body').on('click', 'a.comentario-borrar', function() {
        event.preventDefault();
        let idComentario = $(this).data('idcomentario');
        borrarComentario(idComentario);
    });
    //llama con ajax al formulario para hacer un comentario
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
    $('body').on('click','.rating',function(){
            $(this).parent('.rating').removeClass('fa-star-o');
            $(this).addClass('fa-star');
    });
});
  