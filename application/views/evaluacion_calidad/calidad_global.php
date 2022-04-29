<main role="main" class="ml-sm-auto px-4">
    <?php

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
    $indicador_calidad_producto = 0;
    $sin_info_producto = 0;
    $alertas_producto = 0;
    $sin_info_alertas = 0;
    $resultado_calidad_global = '';
    $color_semaforo_global = 'blanco';
    foreach ($calidad_global_secciones as $calidad_global_secciones_item) {
        switch($calidad_global_secciones_item['cve_seccion']) {
            case 2:
                $indicador_calidad_fuente = $calidad_global_secciones_item['indicador_calidad_seccion'];
                $sin_info_fuente = $calidad_global_secciones_item['sin_info'];
                $alertas_fuente = $calidad_global_secciones_item['alertas'];
                $sin_info_alertas += $sin_info_fuente + $alertas_fuente;
                break;
            case 3:
                $indicador_calidad_metadatos = $calidad_global_secciones_item['indicador_calidad_seccion'];
                $sin_info_metadatos = $calidad_global_secciones_item['sin_info'];
                $alertas_metadatos = $calidad_global_secciones_item['alertas'];
                $sin_info_alertas += $sin_info_metadatos + $alertas_metadatos;
                break;
            case 4:
                $indicador_calidad_datos = $calidad_global_secciones_item['indicador_calidad_seccion'];
                $sin_info_datos = $calidad_global_secciones_item['sin_info'];
                $alertas_datos = $calidad_global_secciones_item['alertas'];
                $sin_info_alertas += $sin_info_datos + $alertas_datos;
                break;
            case 6:
                $indicador_calidad_producto = $calidad_global_secciones_item['indicador_calidad_seccion'];
                $sin_info_producto = $calidad_global_secciones_item['sin_info'];
                $alertas_producto = $calidad_global_secciones_item['alertas'];
                $sin_info_alertas += $sin_info_producto + $alertas_producto;
                break;
        }
    } 
    $indicador_calidad_global = avrg($indicador_calidad_fuente, $indicador_calidad_metadatos, $indicador_calidad_datos, $indicador_calidad_producto);
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
    ?>

    <div class="col-md-12 mb-5 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-10">
                <h3>Evaluación de la calidad global</h3>
            </div>
            <div class="col-md-2 text-right">
                <?php if (in_array('0402', $accesos_sistema_rol)) { ?>
                    <a href="<?= base_url()?>evaluacion_calidad/indicadores_calidad/<?=$periodos['cve_periodo']?>" class="btn btn-primary">Indicadores de calidad</a>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-5">
        <div class="row">
            <div class="col-md-12 mb-5 text-center">
                <h3>Programa <?=$periodos['nom_periodo']?> <?=$periodos['nom_dependencia']?></h3>
            </div>
            <div class="col-md-3">
            </div>
            <div class="col-md-2 text-center">
                <span class="semaforo_global <?= $color_semaforo_global ?> h1 pt-5"><?= number_format($indicador_calidad_global, 3) ?></span>
            </div>
            <div class="col-md-5">
                <h4 class="mb-5 mt-3">Resultado: <?= $resultado_calidad_global ?></h4>
                <h4>Indice de calidad global: <?= number_format($indice_calidad_global['valor'], 3) ?></h4>
            </div>
        </div>
    </div>

    <hr />

    <div class="col-md-12">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-5 mb-3">
                <?php include 'fuente.php'; ?>
            </div>
            <div class="col-md-5 mb-3">
                <?php include 'metadatos.php'; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-5 mb-3">
                <?php include 'datos.php'; ?>
            </div>
            <div class="col-md-5 mb-3">
                <?php include 'producto.php'; ?>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios_contestados" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <?php include 'js/grafico_global.js'; ?>
    <?php include 'js/grafico_fuente.js'; ?>
    <?php include 'js/grafico_metadatos.js'; ?>
    <?php include 'js/grafico_datos.js'; ?>
    <?php include 'js/grafico_producto.js'; ?>

</main>
