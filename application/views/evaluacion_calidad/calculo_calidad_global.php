<?php

// Datos de calidad global de registros administrativos y producto estadístico
$indicador_calidad_global = avrg($indicador_calidad_fuente, $indicador_calidad_metadatos, $indicador_calidad_datos, $calidad_pe[0]['valor']);
switch (true) {
case $indicador_calidad_global < 2:
    $resultado_calidad_global = 'No aceptable';
    $color_semaforo_global = 'rojo';
    break;
case $indicador_calidad_global < 3:
    $resultado_calidad_global = 'No aceptable';
    $color_semaforo_global = 'amarillo';
    break;
case $indicador_calidad_global < 4:
    $resultado_calidad_global = 'Aceptable';
    $color_semaforo_global = 'verde';
    break;
case $indicador_calidad_global < 5:
    $resultado_calidad_global = 'Muy bueno';
    $color_semaforo_global = 'verde';
    break;
case $indicador_calidad_global >= 5:
    $resultado_calidad_global = 'Excelente';
    $color_semaforo_global = 'verde';
    break;
}
if ($sin_info_alertas > 0) {
    $resultado_calidad_global = 'No aceptable';
}
