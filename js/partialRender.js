$(document).ready(function () {
  $('.partial').on('click',function(event){
    event.preventDefault();
    let accion = $(this).attr("href");
    $.ajax({
      url:"http://localhost/Proyectos/TPEWEB2/"+accion,
      success: function(result) {
        $(".cuerpo").html(result);
      }
    });
  });
  $('.partialSearch').on('click',function(event){
    event.preventDefault();
    let accion = $(this).attr("href");
    let key = $(".key").val();
    $.ajax({
      url:"http://localhost/Proyectos/TPEWEB2/"+accion+"/"+key,
      success: function(result) {
        $(".cuerpo").html(result);
      }
    });
  });
});
