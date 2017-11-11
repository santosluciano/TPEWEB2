$(document).ready(function () {
    $('body').on('click','.minicelular',function(event){
        event.preventDefault();
        $('.minicelular').removeClass('active');
        $(this).addClass('active');
        $('.img-celular').attr('src',$(this).children().attr('src'));
    });
    //poner imagen con partial render
     $('body').on('submit','.submitFotoPerfil',function(event){
         event.preventDefault();
         let form_data = new FormData(this);
         $.ajax({
              url:"cambiarFotoPerfil",
              contentType: false,
              processData: false,
              data: form_data,
              type: 'post',
              success: function(data)
              {
                $('.datos-perfil').children('img').remove();  
                $('.datos-perfil').prepend(data);
              }
         });
     });
  });
  