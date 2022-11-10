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
                                            <li>
                                            <a href="<?= base_url() ?>cuestionarios_contestados/detalle/<?= $cuestionarios_contestados_item['cve_cuestionario_contestado'] ?>"><?= $cuestionarios_contestados_item['nom_corto_cuestionario'] ?> <?= $cont_cuest ?>: <?= $cuestionarios_contestados_item['nombre'] ?></a>

											<?php if (in_array('88', $accesos_sistema_rol)) { ?>
												&nbsp;&nbsp;&nbsp;

                                                <a style="color: #f00" 
													href="" 
                                                    data-toggle="modal"
                                                    onclick="confirm_modal('<?=$cuestionarios_contestados_item["cve_cuestionario_contestado"]?>', '<?=$cuestionarios_contestados_item["nombre"]?>', '<?=$periodos_item["nom_periodo"]?>', '<?=$periodos_item["nom_dependencia"]?>');"
													><span data-feather="x-circle">
                                                </span></a>

											<?php } ?>
                                            </li>
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

    <!-- Modal -->
    <div class="modal fade" id="modal_delete" tabindex="-1" role="dialog" aria-labelledby="modal_delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Se eliminará el cuestionario:</p>
                    <p class="ml-5"><strong><span id="del_cuestionario_contestado"></span></strong></p>
                    <p class="mt-5">correspondiente al período</p>
                    <p class="ml-3"><span id="del_periodo"></span></p>
                    <p>de la dependencia</p>
                    <p class="ml-3"><span id="del_dependencia"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <a href="#" id="delete_link" type="button" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>catalogos" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    <?php include 'js/inicio.js'; ?>
</main>
