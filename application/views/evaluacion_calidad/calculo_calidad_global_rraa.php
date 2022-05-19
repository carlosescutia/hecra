<?php

// Datos de calidad de registros administrativos
function avrg()
{
    $count = func_num_args();
    $args = func_get_args();
    return (array_sum($args) / $count);
}

$indicador_calidad_fuente = 0;
$sin_info_fuente = 0;
$alertas_fuente = 0;

$indicador_calidad_metadatos = 0;
$sin_info_metadatos = 0;
$alertas_metadatos = 0;

$indicador_calidad_datos = 0;
$sin_info_datos = 0;
$alertas_datos = 0;

$sin_info_alertas = 0;
$resultado_calidad_global = '';
$color_semaforo_global = 'blanco';

// Datos de calidad global, sin informacion y alertas por seccion de registros administrativos (fuente, metadatos, datos)
foreach ($calidad_global_secciones_rraa as $calidad_global_secciones_rraa_item) {
    switch($calidad_global_secciones_rraa_item['cve_seccion']) {
    case 2:
        $indicador_calidad_fuente = $calidad_global_secciones_rraa_item['indicador_calidad_seccion'];
        $sin_info_fuente = $calidad_global_secciones_rraa_item['sin_info'];
        $alertas_fuente = $calidad_global_secciones_rraa_item['alertas'];
        $sin_info_alertas += $sin_info_fuente + $alertas_fuente;
        break;
    case 3:
        $indicador_calidad_metadatos = $calidad_global_secciones_rraa_item['indicador_calidad_seccion'];
        $sin_info_metadatos = $calidad_global_secciones_rraa_item['sin_info'];
        $alertas_metadatos = $calidad_global_secciones_rraa_item['alertas'];
        $sin_info_alertas += $sin_info_metadatos + $alertas_metadatos;
        break;
    case 4:
        $indicador_calidad_datos = $calidad_global_secciones_rraa_item['indicador_calidad_seccion'];
        $sin_info_datos = $calidad_global_secciones_rraa_item['sin_info'];
        $alertas_datos = $calidad_global_secciones_rraa_item['alertas'];
        $sin_info_alertas += $sin_info_datos + $alertas_datos;
        break;
    }
} 

// Datos para generación de los gráficos de calidad asociada a las secciones de registros administrativos (fuente, metadatos, datos)
$valores_grafico_fuente_etiquetas = array();
$valores_grafico_fuente_valores = array();
$valores_grafico_metadatos_etiquetas = array();
$valores_grafico_metadatos_valores = array();
$valores_grafico_datos_etiquetas = array();
$valores_grafico_datos_valores = array();
foreach ($valores_grafico as $valores_grafico_item) {
    switch ($valores_grafico_item['cve_seccion']) {
    case 2:
        array_push($valores_grafico_fuente_etiquetas, $valores_grafico_item['nom_subseccion']);
        array_push($valores_grafico_fuente_valores, number_format($valores_grafico_item['avg'], 2));
        break;
    case 3:
        array_push($valores_grafico_metadatos_etiquetas, $valores_grafico_item['nom_subseccion']);
        array_push($valores_grafico_metadatos_valores, number_format($valores_grafico_item['avg'], 2));
        break;
    case 4:
        array_push($valores_grafico_datos_etiquetas, $valores_grafico_item['nom_subseccion']);
        array_push($valores_grafico_datos_valores, number_format($valores_grafico_item['avg'], 2));
        break;
    }
}
