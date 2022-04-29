<script>
/**********************************************
 * 
 * Grafico Calidad de producto estadístico
 *
 * ****************************************/

	var ctx = document.getElementById("calidad_producto").getContext("2d");
    indicador_calidad_producto = '<?php echo $indicador_calidad_producto ?>';

	var chart = new Chart(ctx, {
		type: 'gauge',
		data: {
            labels: ['No aceptable', 'No aceptable', 'Aceptable', 'Muy bueno', 'Excelente'],
			datasets: [{
                data: [1.5, 2.5, 3.5, 4.5, 5.5],
				value: indicador_calidad_producto,
				backgroundColor: ['red', 'yellow', 'green', 'green', 'green'],
				borderWidth: 2
			}]
		},
          options: {
			  responsive: true,
			  layout: {
				  padding: {
					  bottom: 30
				  }
			  },
			  needle: {
				  // Needle circle radius as the percentage of the chart area width
				  radiusPercentage: 2,
				  // Needle width as the percentage of the chart area width
				  widthPercentage: 3.2,
				  // Needle length as the percentage of the interval between inner radius (0%) and outer radius (100%) of the arc
				  lengthPercentage: 80,
				  // The color of the needle
				  color: 'rgba(0, 0, 0, 1)'
			  },
			  valueLabel: {
				  display: false
			  },
			  plugins: {
				  datalabels: {
					  display: true,
					  formatter:  function (value, context) {
						  return context.chart.data.labels[context.dataIndex];
					  },
					  //color: function (context) {
					  //  return context.dataset.backgroundColor;
					  //},
					  color: 'rgba(0, 0, 0, 1.0)',
					  //color: 'rgba(255, 255, 255, 1.0)',
					  backgroundColor: null,
					  font: {
						  size: 8,
						  weight: 'normal'
					  }
				  }
			  }
		  }
	});

</script>

