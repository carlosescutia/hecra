<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-10">
                <h3>Indicadores de calidad <?=$periodos['nom_dependencia']?> <?=$periodos['nom_periodo']?></h3>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-3">
        <?php
        foreach ($secciones_calidad_ra as $secciones_calidad_ra_item) { ?>
            <div class="row">
                <div class="col-md-7 mt-5">
                    <h4><?= $secciones_calidad_ra_item['nom_seccion'] ?></h4>
                </div>
                <div class="col-md-5 mt-5 font-weight-bold">
                    <?php
                    foreach ($calidad_secciones as $calidad_secciones_item) {
                        if ($calidad_secciones_item['cve_seccion'] == $secciones_calidad_ra_item['cve_seccion']) { ?>
                            <div class="col-md-2 ">
                                <?= number_format($calidad_secciones_item['calidad_seccion'], 3) ?>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
            <div class="col-md-12 ml-3">
                <div class="row">
                    <?php 
                    foreach ($subsecciones_calidad_ra as $subsecciones_calidad_ra_item) { 
                        if ($subsecciones_calidad_ra_item['cve_seccion'] == $secciones_calidad_ra_item['cve_seccion']) { ?>
                            <div class="col-md-6 mt-3 font-weight-bold">
                                <?= $subsecciones_calidad_ra_item['nom_subseccion'] ?>
                            </div>
                            <div class="col-md-6 mt-3 font-weight-bold">
                                <div class="row">
                                <?php
                                foreach ($calidad_subsecciones as $calidad_subsecciones_item) {
                                    if ($calidad_subsecciones_item['cve_subseccion'] == $subsecciones_calidad_ra_item['cve_subseccion']) { ?>
                                        <div class="col-md-2 ">
                                            <?= $calidad_subsecciones_item['peso'] ?>
                                        </div>
                                        <div class="col-md-2 ">
                                            <?= number_format($calidad_subsecciones_item['valor_ryp'], 3) ?>
                                        </div>
                                    <?php }
                                } ?>
                                </div>
                            </div>
                            <div class="col-md-12 ml-3">
                                <div class="row">
                                    <?php 
                                    foreach ($indicadores_calidad_ra as $indicadores_calidad_ra_item) { 
                                        if ($indicadores_calidad_ra_item['cve_subseccion'] == $subsecciones_calidad_ra_item['cve_subseccion']) { ?>
                                            <div class="col-md-4 border-bottom"> 
                                                <?= $indicadores_calidad_ra_item['nom_indicador_calidad'] ?>
                                            </div>
                                            <div class="col-md-8 ">
                                                <div class="row">
                                                <?php
                                                foreach ($datos_calidad_indicadores as $datos_calidad_indicadores_item) {
                                                    if ($datos_calidad_indicadores_item['cve_indicador_calidad'] == $indicadores_calidad_ra_item['cve_indicador_calidad']) { ?>
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-1 border-bottom">
                                                            <?= $datos_calidad_indicadores_item['valor'] ?>
                                                        </div>
                                                        <div class="col-md-1 border-bottom">
                                                            <?= $datos_calidad_indicadores_item['valor_max_sna'] ?>
                                                        </div>
                                                        <div class="col-md-1 border-bottom">
                                                            <?= $datos_calidad_indicadores_item['peso'] ?>
                                                        </div>
                                                        <div class="col-md-1 border-bottom">
                                                            <?= number_format($datos_calidad_indicadores_item['valor_ryp'], 3) ?>
                                                        </div>
                                                        <div class="col-md-4">
                                                        </div>
                                                    <?php }
                                                } ?>
                                                </div>
                                            </div>
                                        <?php }
                                    } ?>
                                </div>
                            </div>
                        <?php } 
                    } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>evaluacion_calidad/calidad_global/<?=$periodos['cve_periodo']?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
