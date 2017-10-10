$(document).ready(function () {
  $(document).on('click','.partial',function(event){
    event.preventDefault();
    let accion = $(this).attr("href");
    $.ajax({
      url:document.location.href+accion,
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
      url:document.location.href+accion+"/"+key,
      success: function(result) {
        $(".cuerpo").html(result);
      }
    });
  });
});
