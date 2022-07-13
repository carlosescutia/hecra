<div class="card mt-0 mb-3">
    <div class="card-header card-sistema">
        <strong>Producto estadístico</strong>
    </div>
    <div class="card-body">
        <div class="text-center" id="canvas-holder" style="width:100%">
            <canvas id="calidad_producto"></canvas>
            <h5>Calidad global:</h5>
            <h1><?= number_format($calidad_pe[0]['valor'],0) ?></h1>
        </div>
        <hr class="mt-3 mb-3" />
        <div class="col-md-12 text-center">
            <h4 class="mb-5">Calidad asociada al Producto Estadístico</h4>
            <canvas id="calidad_subsecciones_producto"></canvas>
        </div>
    </div>
</div>
