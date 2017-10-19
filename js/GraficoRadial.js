  //Genera el grafico que se mostrara con las estadisticas del celular
    function cargar_estadisticas(id_celular){
      $.ajax({
        method: 'GET',
        dataType: 'JSON',
        url:'Api/estadisticas/' + id_celular,
        success: function(resultData){
          $(".graficoCelular").html('<canvas id="EstadisticasCelular"></canvas>');          
          $(".puntaje-antutu").html(resultData.antutu);
          $(".nota-celular").html(resultData.nota);
          let datos = [resultData.rendimiento,resultData.conectividad,resultData.disenio,resultData.pantalla,resultData.camara];
          generarGrafico(datos);
        },
        error:function(jqxml, status, errorThrown){
          $(".graficoCelular").html("");
        }
      });
      let load = '<i class="fa fa-spinner fa-pulse fa-3x fa-fw carga"></i>';
      $(".graficoCelular").html(load);
    }
    function dibujar_informe(error){

    }
    function generarGrafico(datos){
      let celularCanvas = document.getElementById("EstadisticasCelular");
      let celularData = {
        labels: ["RENDIMIENTO", "CONECTIVIDAD", "DISEÑO", "PANTALLA", "CAMARA"],
        datasets: [{
          backgroundColor: "rgba(0,88,255,0.5)",
          data: datos
        }]
      };
      let configuracion = {
        legend: {
                  display: false,
                },
                title: {
                  display: true,
                  text: 'Estadisticas Mundo Celular'
                },
                scale: {
                  ticks: {
                    beginAtZero: true,
                    min: 0,
                    max: 10,
                    stepSize: 10,
                    display:false
                  }
                } 
      }
      let radarChart = new Chart(celularCanvas, {
        type: 'radar',
        data: celularData,
        options: configuracion
      });
    }


