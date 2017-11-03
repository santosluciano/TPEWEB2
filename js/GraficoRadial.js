  //Genera el grafico que se mostrara con las estadisticas del celular
    function cargar_estadisticas(id_celular) {
      $.ajax("api/estadisticas/"+id_celular)
          .done(function(celular) {
            $(".graficoCelular").html('<canvas id="EstadisticasCelular"></canvas>');          
            $(".puntaje-antutu").html(celular.antutu);
            $(".nota-celular").html(celular.nota);
            let datos = [celular.rendimiento,celular.conectividad,celular.disenio,celular.pantalla,celular.camara];
            generarGrafico(datos);
          })
          .fail(function() {
            $(".graficoCelular").html("");
          });
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


