<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>respuestas/guardar/<?= $cuestionarios_contestados['cve_cuestionario_contestado'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h4><?=$cuestionarios_contestados['nom_cuestionario'] ?>: <?=$cuestionarios_contestados['nombre'] ?> - <?=$cuestionarios_contestados['nom_periodo'] ?></h4>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-unstyled">
                        <?php foreach ($secciones as $secciones_item) { ?>
                            <li class="p-2 mb-2 mt-2 bg-primary text-white"><?= $secciones_item['nom_seccion'] ?></li>
                            <div class="col-md-12 ml-3">
                                <ul class="list-unstyled">
                                <?php foreach ($subsecciones as $subsecciones_item) { ?>
                                    <?php if ($subsecciones_item['cve_seccion'] == $secciones_item['cve_seccion']) { ?>
                                        <?php 
                                        $color='blanco';
                                        foreach ($semaforos as $semaforos_item) {
                                            if ($semaforos_item['cve_subseccion'] == $subsecciones_item['cve_subseccion']) {
                                                $num_respuestas = $semaforos_item['respuestas'];
                                                $num_preguntas = $semaforos_item['preguntas'];
                                                if ($num_respuestas == $num_preguntas ) {
                                                    $color = 'verde';
                                                }
                                                if ($num_respuestas < $num_preguntas ) {
                                                    $color = 'amarillo';
                                                }
                                                if ($num_respuestas == 0 ) {
                                                    $color = 'blanco';
                                                }
                                            }
                                        } ?>
                                        <li class="p-1 mb-1 mt-1 bg-light"><a href="<?= base_url()?>cuestionarios_contestados/detalle/<?= $cuestionarios_contestados['cve_cuestionario_contestado']?>/<?= $subsecciones_item['cve_subseccion']?>"><span class="semaforo <?= $color ?>"></span><?= $subsecciones_item['nom_subseccion'] ?> (<?=$num_respuestas?>/<?=$num_preguntas?>)</a></li>
                                    <?php } ?>
                                <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <?php foreach ($preguntas as $preguntas_item) { ?>
                    <div class="col-sm-12 pb-2 alternate-color">
                        <div class="row">
                            <div class="col-sm-12 mt-3 align-self-center">
                                <p><strong><?=$preguntas_item['num_pregunta'] ?></strong> <?=$preguntas_item['texto_pregunta'] ?></p> 
                            </div>
                            <div class="col-sm-12 align-self-center">

                                <?php 
                                $valor_actual = '';
                                foreach ($respuestas as $respuestas_item) {
                                    if ($respuestas_item['cve_pregunta'] == $preguntas_item['cve_pregunta']) { 
                                        $valor_actual = $respuestas_item['valor'];
                                    }
                                } 
                                switch( $preguntas_item['cve_tipo_pregunta'] ) {
                                    case "1": // Opción múltiple ?>
                                        <select class="custom-select" name="<?=$preguntas_item['cve_pregunta'] ?>" id="<?=$preguntas_item['cve_pregunta'] ?>">
                                            <option value=""></option>
                                            <?php foreach ($valores_posibles as $valores_posibles_item) { ?>
                                                <?php if ($valores_posibles_item['cve_pregunta'] == $preguntas_item['cve_pregunta']) { ?>
                                                    <option value="<?= $valores_posibles_item['valor_posible'] ?>" <?= $valor_actual == $valores_posibles_item['valor_posible'] ? 'selected' : '' ?> ><?= $valores_posibles_item['texto_valor_posible'] ?></option>
                                                <?php } ?>
                                            <?php } ?>
                                        </select>
                                        <?php
                                        break;
                                    case "2": // Texto libre ?>
                                        <input type="text" class="form-control" name="<?=$preguntas_item['cve_pregunta'] ?>" id="<?=$preguntas_item['cve_pregunta'] ?>" value="<?= $valor_actual ?>">
                                        <?php
                                        break;
                                    case "3": // Múltiples respuestas opción múltiple
                                        ?>
                                        <div class="col-sm-12 pl-5">
                                        <?php
                                        foreach ($subpreguntas as $subpreguntas_item) {
                                            $valor_actual = "";
                                            foreach ($subrespuestas as $subrespuestas_item) {
                                                if ($subpreguntas_item['cve_pregunta'] == $subrespuestas_item['cve_pregunta'] &&  $subpreguntas_item['cve_subpregunta'] == $subrespuestas_item ['cve_subpregunta'] ) { 
                                                    $valor_actual = $subrespuestas_item['valor'];
                                                }
                                            } 
                                            if ($subpreguntas_item['cve_pregunta'] == $preguntas_item['cve_pregunta']) { ?>
                                                <p><?= $subpreguntas_item['num_subpregunta'] . " " . $subpreguntas_item['texto_subpregunta'] ?></p>
                                                    <select class="custom-select" name="<?=$preguntas_item['cve_pregunta'] . "." . $subpreguntas_item['cve_subpregunta'] ?>" id="<?=$preguntas_item['cve_pregunta'] . "." . $subpreguntas_item['cve_subpregunta'] ?>">
                                                        <option value=""></option>
                                                        <?php foreach ($subvalores_posibles as $subvalores_posibles_item) { ?>
                                                            <?php if ($subvalores_posibles_item['cve_subpregunta'] == $subpreguntas_item['cve_subpregunta']) { ?>
                                                                <option value="<?= $subvalores_posibles_item['subvalor_posible'] ?>" <?= $valor_actual == $subvalores_posibles_item['subvalor_posible'] ? 'selected' : '' ?> ><?= $subvalores_posibles_item['texto_subvalor_posible'] ?></option>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </select>
                                            <?php }
                                        } ?>
                                        </div>
                                        <?php
                                        break;
                                    case "4": // Múltiples respuestas texto libre 
                                        ?>
                                        <div class="col-sm-12 pl-5">
                                        <?php
                                        foreach ($subpreguntas as $subpreguntas_item) {
                                            $valor_actual = "";
                                            foreach ($subrespuestas as $subrespuestas_item) {
                                                if ($subpreguntas_item['cve_pregunta'] == $subrespuestas_item['cve_pregunta'] &&  $subpreguntas_item['cve_subpregunta'] == $subrespuestas_item ['cve_subpregunta'] ) { 
                                                    $valor_actual = $subrespuestas_item['valor'];
                                                }
                                            } 
                                            if ($subpreguntas_item['cve_pregunta'] == $preguntas_item['cve_pregunta']) { ?>
                                                <p><?= $subpreguntas_item['num_subpregunta'] . " " . $subpreguntas_item['texto_subpregunta'] ?></p>
                                                <input type="text" class="form-control" name="<?=$preguntas_item['cve_pregunta'] . "." . $subpreguntas_item['cve_subpregunta'] ?>" id="<?=$preguntas_item['cve_pregunta'] . "." . $subpreguntas_item['cve_subpregunta'] ?>" value="<?= $valor_actual ?>">
                                            <?php }
                                        } ?>
                                        </div>
                                        <?php
                                        break; 
                                } ?>

                            </div>
                            <div class="col-sm-12 mt-2 align-self-center">
                                <p>
                                <?php if ( $preguntas_item['responde'] ) { ?>
                                    <strong>Responde:</strong> <?=$preguntas_item['responde'] ?>
                                <?php } ?>
                                <?php if ( $preguntas_item['responde'] && $preguntas_item['guia'] ) { ?>
                                    <span>; </span>
                                <?php } ?>
                                <?php if ( $preguntas_item['guia'] ) { ?>
                                    <strong>Guía de llenado:</strong> <?=$preguntas_item['guia'] ?>
                                <?php } ?>
                                </p>
                            </div>

                        </div>
                    </div>
                    <?php } ?>
                </div>

            <input type="hidden" name="cve_cuestionario_contestado" value="<?= $cuestionarios_contestados['cve_cuestionario_contestado'] ?>">
            <input type="hidden" name="cve_subseccion" value="<?= $cve_subseccion ?>">

        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios_contestados" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
