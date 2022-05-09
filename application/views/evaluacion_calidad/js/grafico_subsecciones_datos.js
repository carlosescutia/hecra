<script>
/**********************************************
 * 
 * Grafico Calidad de subsecciones de datos
 *
 * ****************************************/

	var ctx = document.getElementById("calidad_subsecciones_datos").getContext("2d");

    etiquetas = JSON.parse( '<?php echo json_encode($valores_grafico_datos_etiquetas) ?>' );
    valores = JSON.parse( '<?php echo json_encode($valores_grafico_datos_valores) ?>' );
	var chart = new Chart(ctx, {
		type: 'radar',
		data: {
            labels: etiquetas,
			datasets: [{
                data: valores,
                fill: true,
				backgroundColor: 'rgba(54, 162, 235, 0.2)',
				borderColor: 'rgb(54, 162, 235)',
				pointBackgroundColor: 'rgb(54, 162, 235)',
				pointBorderColor: '#fff',
				pointHoverBackgroundColor: '#fff',
				pointHoverBorderColor: 'rgb(54, 162, 235)'
			}]
		},
          options: {
              legend: {
                  display: false
              },
              scale: {
                  ticks: {
                      beginAtZero: true,
                      max: 5,
                      min: 0,
                      stepSize: 1
                  }
              }
		  }
	});

</script>
