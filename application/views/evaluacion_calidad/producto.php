<div class="card mt-0 mb-3">
    <div class="card-header card-sistema">
        <strong>Producto estadístico</strong>
    </div>
    <div class="card-body">
        <?php
        $indicador_calidad_producto = 0;
        foreach ($calidad_global_secciones as $calidad_global_secciones_item) {
            if ($calidad_global_secciones_item['cve_seccion'] == 6) {
                $indicador_calidad_producto = $calidad_global_secciones_item['indicador_calidad_seccion'];
            }
        } ?>
        <div class="text-center" id="canvas-holder" style="width:100%">
            <canvas id="calidad_producto"></canvas>
            <h5>Calidad global:</h5>
            <h1><?= $indicador_calidad_producto ?></h1>
        </div>
    </div>
</div>

