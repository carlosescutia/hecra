<main role="main" class="ml-sm-auto px-4">

    <?php include 'calculo_calidad_global_pe.php'; ?>
    <?php include 'calculo_calidad_global_rraa.php'; ?>
    <?php include 'calculo_calidad_global.php'; ?>

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
                <h4>Indice de calidad global: <?= number_format($indice_calidad_global_rraa['valor'] + ($calidad_pe[0]['valor_ryp'] * 0.25), 3) ?></h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
        </div>
        <div class="col-md-8 mb-3">
            <div class="row">
                <p><small><strong>* El registro administrativo será calificado como "no aceptable" en los casos que se responda a alguna pregunta con el equivalente a "Sin información".
                <br />
                * El registro administrativo será calificado como "no aceptable" en los casos que se obtengan más de tres alertas.</strong></small></p>
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
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <?php include 'producto.php'; ?>
                    </div>
                    <div class="col-md-12 mb-3">
                        <?php include 'plan_mejora.php'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios_contestados" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <?php include 'js/grafico_fuente.js'; ?>
    <?php include 'js/grafico_subsecciones_fuente.js'; ?>
    <?php include 'js/grafico_metadatos.js'; ?>
    <?php include 'js/grafico_subsecciones_metadatos.js'; ?>
    <?php include 'js/grafico_datos.js'; ?>
    <?php include 'js/grafico_subsecciones_datos.js'; ?>
    <?php include 'js/grafico_producto.js'; ?>
    <?php include 'js/grafico_subsecciones_producto.js'; ?>

</main>
