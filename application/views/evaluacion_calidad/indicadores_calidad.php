<main role="main" class="ml-sm-auto px-4">

    <?php include 'calculo_calidad_global_pe.php'; ?>
    <?php include 'calculo_calidad_global_rraa.php'; ?>
    <?php include 'calculo_calidad_global.php'; ?>

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="row">
            <div class="col-md-10">
                <h3>Indicadores de calidad: <?=$periodos['nom_periodo']?>, <?=$periodos['nom_dependencia']?></h3>
            </div>
            <div class="col-md-2">
                <p><a class="btn btn-primary" href="javascript:window.print();">Descargar reporte</a></p>
            </div>
        </div>
    </div>


    <div class="col-md-12 mt-1">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 font-weight-bold">
                <div class="row">
                    <div class="col-md-1 mr-3">
                        Resultado
                    </div>
                    <div class="col-md-1 ml-3">
                        Indice
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Evaluación de la calidad global</h3>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-1 mr-3">
                        <?= number_format($indicador_calidad_global, 3) ?>
                    </div>
                    <div class="col-md-1 ml-3"> 
                        <?= number_format($indice_calidad_global_rraa['valor'] + ($calidad_pe[0]['valor_ryp'] * 0.25), 3) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="col-md-12 mb-3">
        <?php
        foreach ($secciones_calidad_ra as $secciones_calidad_ra_item) { ?>
            <div class="col-md-12 ml-3">
                <div class="row">
                    <div class="col-md-5 mt-5">
                    </div>
                    <div class="col-md-7 mt-5 font-weight-bold">
                        <div class="row">
                            <div class="col-md-1 ml-4">
                                valor
                            </div>
                            <div class="col-md-1 ml-3">
                                resultado
                            </div>
                            <div class="col-md-1 ml-4">
                                índice
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><?= $secciones_calidad_ra_item['nom_seccion'] ?></h4>
                    </div>
                    <div class="col-md-6 font-weight-bold">
                        <?php
                        foreach ($calidad_secciones as $calidad_secciones_item) {
                            if ($calidad_secciones_item['cve_seccion'] == $secciones_calidad_ra_item['cve_seccion']) { ?>
                                <div class="row">
                                    <div class="col-md-1 mr-3">
                                    </div>
                                    <div class="col-md-1 ml-3">
                                        <?= number_format($calidad_secciones_item['calidad_seccion'], 3) ?>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
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
                                        <div class="col-md-1 ml-3">
                                            <?= $calidad_subsecciones_item['peso'] ?>
                                        </div>
                                        <div class="col-md-2 ml-3">
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
                                                        </div>
                                                        <div class="col-md-1 border-bottom">
                                                            <?= $datos_calidad_indicadores_item['valor'] ?>
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

    <div class="col-md-12 mb-3">
        <?php
        foreach ($secciones_calidad_pe as $secciones_calidad_pe_item) { ?>
            <div class="col-md-12 ml-3">
                <div class="row">
                    <div class="col-md-5 mt-5">
                    </div>
                    <div class="col-md-7 mt-5 font-weight-bold">
                        <div class="row">
                            <div class="col-md-1 ml-4">
                                valor
                            </div>
                            <div class="col-md-1 ml-3">
                                resultado
                            </div>
                            <div class="col-md-1 ml-4">
                                índice
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h4><?= $secciones_calidad_pe_item['nom_seccion'] ?></h4>
                    </div>
                    <div class="col-md-6 font-weight-bold">
                        <?php
                        foreach ($calidad_secciones as $calidad_secciones_item) {
                            if ($calidad_secciones_item['cve_seccion'] == $secciones_calidad_pe_item['cve_seccion']) { ?>
                                <div class="row">
                                    <div class="col-md-1 mr-3">
                                    </div>
                                    <div class="col-md-1 ml-3">
                                        <?= number_format($calidad_secciones_item['calidad_seccion'], 3) ?>
                                    </div>
                                </div>
                            <?php }
                        } ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12 ml-3">
                <div class="row">
                    <?php 
                    foreach ($subsecciones_calidad_pe as $subsecciones_calidad_pe_item) { 
                        if ($subsecciones_calidad_pe_item['cve_seccion'] == $secciones_calidad_pe_item['cve_seccion']) { ?>
                            <div class="col-md-6 mt-3 font-weight-bold">
                                <?= $subsecciones_calidad_pe_item['nom_subseccion'] ?>
                            </div>
                            <div class="col-md-6 mt-3 font-weight-bold">
                                <div class="row">
                                <?php
                                foreach ($calidad_subsecciones as $calidad_subsecciones_item) {
                                    if ($calidad_subsecciones_item['cve_subseccion'] == $subsecciones_calidad_pe_item['cve_subseccion']) { ?>
                                        <div class="col-md-1 ml-3">
                                            <?= $calidad_subsecciones_item['peso'] ?>
                                        </div>
                                        <div class="col-md-2 ml-3">
                                            <?= number_format($calidad_subsecciones_item['valor_ryp'], 3) ?>
                                        </div>
                                    <?php }
                                } ?>
                                </div>
                            </div>
                            <div class="col-md-12 ml-3">
                                <div class="row">
                                    <?php 
                                    foreach ($indicadores_calidad_pe as $indicadores_calidad_pe_item) { 
                                        if ($indicadores_calidad_pe_item['cve_subseccion'] == $subsecciones_calidad_pe_item['cve_subseccion']) { ?>
                                            <div class="col-md-4 border-bottom"> 
                                                <?= $indicadores_calidad_pe_item['nom_indicador_calidad'] ?>
                                            </div>
                                            <div class="col-md-8 ">
                                                <div class="row">
                                                <?php
                                                foreach ($datos_calidad_indicadores as $datos_calidad_indicadores_item) {
                                                    if ($datos_calidad_indicadores_item['cve_indicador_calidad'] == $indicadores_calidad_pe_item['cve_indicador_calidad']) { ?>
                                                        <div class="col-md-1">
                                                        </div>
                                                        <div class="col-md-1 border-bottom">
                                                        </div>
                                                        <div class="col-md-1 border-bottom">
                                                            <?= $datos_calidad_indicadores_item['valor'] ?>
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
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>evaluacion_calidad/calidad_global/<?=$periodos['cve_periodo']?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
