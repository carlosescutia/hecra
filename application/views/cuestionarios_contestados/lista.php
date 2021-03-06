<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Cuestionarios</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div style="min-height: 46vh">
            <div class="row">
                <?php 
                $dep_actual = '';
                foreach ($periodos as $periodos_item) {
                    if ($periodos_item['cve_dependencia'] !== $dep_actual) {
                        $dep_actual = $periodos_item['cve_dependencia']; ?>
                        <div class="col-sm-12 mb-3 mt-3">
                            <h4><?= $periodos_item['nom_dependencia'] ?></h4>
                        </div>
                    <?php } ?>
                        <div class="col-sm-11 ml-5 mb-3">
                            <div class="row">
                                <?php if (in_array('0401', $accesos_sistema_rol)) { ?>
                                    <a href="<?=base_url()?>evaluacion_calidad/calidad_global/<?=$periodos_item['cve_periodo']?>"><p><span class="h6">Periodo:</span> <?= $periodos_item['nom_periodo'] ?></p></a>
                                <?php } else { ?>
                                    <p><span class="h6">Periodo:</span> <?= $periodos_item['nom_periodo'] ?></p>
                                <?php } ?>
                            </div>
                            <div class="row mb-3">
                                <ul>
                                    <?php 
                                    $cuest_actual = ''; 
                                    $cont_cuest = 0;
                                    foreach ($cuestionarios_contestados as $cuestionarios_contestados_item) {
                                        if ($cuestionarios_contestados_item['cve_periodo'] == $periodos_item['cve_periodo']) {
                                            if ($cuestionarios_contestados_item['nom_corto_cuestionario'] !== $cuest_actual) {
                                                $cont_cuest = 0;
                                                $cuest_actual = $cuestionarios_contestados_item['nom_corto_cuestionario'];
                                            }
                                            $cont_cuest++; ?>
                                            <li><a href="<?= base_url() ?>cuestionarios_contestados/detalle/<?= $cuestionarios_contestados_item['cve_cuestionario_contestado'] ?>"><?= $cuestionarios_contestados_item['nom_corto_cuestionario'] ?> <?= $cont_cuest ?>: <?= $cuestionarios_contestados_item['nombre'] ?></a></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                            <?php if (in_array('99', $accesos_sistema_rol)) { ?>
                            <div class="row">
                                <div class="col-sm-12">
                                    <form method="post" action="<?= base_url() ?>cuestionarios_contestados/nuevo/<?= $periodos_item['cve_periodo'] ?>">
                                        <button type="submit" class="btn btn-primary">Nuevo cuestionario</button>
                                    </form>
                                </div>
                            </div>
                            <?php } ?>
                            <hr />
                        </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>catalogos" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</main>
