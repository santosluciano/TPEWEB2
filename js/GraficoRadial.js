  function generarGrafico(){
    let celularCanvas = document.getElementById("EstadisticasCelular");
    let celularData = {
      labels: ["RENDIMIENTO", "CONECTIVIDAD", "DISEÑO", "PANTALLA", "CAMARA"],
      datasets: [{
        backgroundColor: "rgba(0,88,255,0.5)",
        data: [8.5, 8.0, 8.0, 9.1, 5]
      }]
    };
    let configuracion = {
      legend: {
                display: false,
              },
              title: {
                display: true,
                text: 'Estadisticas Mundo Celular'
      }, scale: {
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
