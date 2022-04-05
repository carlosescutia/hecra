<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>cuestionarios_contestados/guardar/<?= $cuestionarios_contestados['cve_cuestionario_contestado'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Contestar cuestionario</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="row">
                <h4><?=$cuestionarios_contestados['nom_cuestionario'] ?> del <?=$cuestionarios_contestados['nom_periodo'] ?></h4>
            </div>

            <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-6">
                        <p>Pregunta</p> 
                    </div>
                    <div class="col-sm-2">
                        <p>Respuesta</p> 
                    </div>
                    <div class="col-sm-2">
                        <p>Responde</p> 
                    </div>
                    <div class="col-sm-2">
                        <p>Guía de llenado</p> 
                    </div>
                </div>
            </div>

            <hr />

            <?php foreach ($preguntas as $preguntas_item) { ?>
            <div class="col-sm-12 alternate-color">
                <div class="row">
                    <div class="col-sm-6 mt-3 align-self-center">
                        <p><strong><?=$preguntas_item['num_pregunta'] ?></strong> <?=$preguntas_item['texto_pregunta'] ?></p> 
                    </div>
                    <div class="col-sm-2 align-self-center">

                        <?php 
                        $valor_actual = '';
                        foreach ($respuestas as $respuestas_item) {
                            if ($respuestas_item['cve_pregunta'] == $preguntas_item['cve_pregunta']) { 
                                $valor_actual = $respuestas_item['valor'];
                            }
                        } 
                        switch( $preguntas_item['cve_tipo_pregunta'] ) {
                            case "1": // Opción múltiple ?>
                                <select class="custom-select" name="<?=$preguntas_item['num_pregunta'] ?>" id="<?=$preguntas_item['num_pregunta'] ?>">
                                    <option value=""></option>
                                    <?php foreach ($valores_posibles as $valores_posibles_item) { ?>
                                        <?php if ($valores_posibles_item['cve_pregunta'] == $preguntas_item['cve_pregunta']) { ?>
                                            <option value="$valores_posibles_item['cve_valor_posible'] ?>" <?= $valor_actual == $valores_posibles_item['cve_valor_posible'] ? 'selected' : '' ?> ><?= $valores_posibles_item['texto_valor_posible'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?php
                                break;
                            case "2": // Texto libre ?>
                                <input type="text" class="form-control" name="<?=$preguntas_item['num_pregunta'] ?>" id="<?=$preguntas_item['num_pregunta'] ?>" value="<?= $valor_actual ?>">
                                <?php
                                break;
                            case "3": // Múltiples respuestas opción múltiple
                                break;
                            case "4": // Múltiples respuestas texto libre
                                break;
                        } ?>

                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p><?=$preguntas_item['responde'] ?></p> 
                    </div>
                    <div class="col-sm-2 align-self-center">
                        <p><?=$preguntas_item['guia'] ?></p> 
                    </div>

                </div>
            </div>
            <?php } ?>

        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios_contestados" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
                    <!--
                    Mostrar controles de captura de respuesta según tipo de pregunta

                        <?php switch( $preguntas_item['cve_tipo_pregunta'] ) {
                            case "1": // Opción múltiple ?>
                                <select class="custom-select" name="<?=$preguntas_item['num_pregunta'] ?>" id="<?=$preguntas_item['num_pregunta'] ?>">
                                    <option value="" selected></option>
                                    <?php foreach ($valores_posibles as $valores_posibles_item) { ?>
                                        <?php if ($valores_posibles_item['cve_pregunta'] == $preguntas_item['cve_pregunta']) { ?>
                                            <option value="$valores_posibles_item['cve_valor_posible'] ?>" ><?= $valores_posibles_item['texto_valor_posible'] ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                </select>
                                <?php
                                break;
                            case "2": // Texto libre ?>
                            <input type="text" class="form-control" name="<?=$preguntas_item['num_pregunta'] ?>" id="<?=$preguntas_item['num_pregunta'] ?>" value="test">
                                <?php
                                break;
                            case "3": // Múltiples respuestas opción múltiple
                                break;
                            case "4": // Múltiples respuestas texto libre
                                break;
                        } ?>
                    -->


