$(document).ready(function () {
    $('body').on('click','.minicelular',function(event){
        event.preventDefault();
        $('.minicelular').removeClass('active');
        $(this).addClass('active');
        $('.img-celular').attr('src',$(this).children().attr('src'));
    });
  });
  