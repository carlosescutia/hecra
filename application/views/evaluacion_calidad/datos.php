<div class="card mt-0 mb-3">
    <div class="card-header card-sistema">
        <strong>Datos</strong>
    </div>
    <div class="card-body">
        <div class="text-center" id="canvas-holder" style="width:100%">
            <canvas id="calidad_datos"></canvas>
            <h5>Calidad global:</h5>
            <h1><?= $indicador_calidad_datos ?></h1>
        </div>
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6 text-center">
                    <h5>Sin información:</h5>
                    <h1><?= $sin_info_datos ?></h1>
                </div>
                <div class="col-md-6 text-center">
                    <h5>Alertas:</h5>
                    <h1><?= $alertas_datos ?></h1>
                </div>
            </div>
        </div>
        <hr class="mt-3 mb-3" />
        <div class="col-md-12 text-center">
            <h4 class="mb-5">Calidad asociada a los datos</h4>
            <canvas id="calidad_subsecciones_datos"></canvas>
        </div>
    </div>
</div>
