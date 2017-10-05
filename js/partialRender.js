$(document).ready(function () {
  $('.partial').on('click',function(event){
    event.preventDefault();
    let accion = $(this).attr("href");
    $.ajax({
      url:"http://localhost/Proyectos/TPEWEB2/"+accion+"/partial",
      success: function(result) {
        $(".cuerpo").html(result);
      }
    });
  });
});
