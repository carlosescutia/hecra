<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <h2>Editar pregunta</h2>
            </div>
        </div>
    </div>

    <div class="card mt-0 mb-3">
        <form method="post" action="<?= base_url() ?>preguntas/guardar/<?= $preguntas['cve_pregunta'] ?>">
            <div class="card-header card-sistema">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Datos de la pregunta</strong>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="nom_tipo_pregunta" class="col-sm-2 col-form-label">Tipo de pregunta</label>
                    <div class="col-sm-10">
                        <p><?= $preguntas['nom_tipo_pregunta'] ?></p>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="num_pregunta" class="col-sm-2 col-form-label">Número</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="num_pregunta" id="num_pregunta" value="<?=$preguntas['num_pregunta'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="texto_pregunta" class="col-sm-2 col-form-label">Texto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="texto_pregunta" id="texto_pregunta" value="<?=$preguntas['texto_pregunta'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="responde" class="col-sm-2 col-form-label">Quien responde la pregunta?</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="responde" id="responde" value="<?=$preguntas['responde'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="guia" class="col-sm-2 col-form-label">Guía de llenado</label>
                    <div class="col-sm-10">
                        <textarea rows="5" class="form-control" name="guia" id="guia"><?=$preguntas['guia'] ?></textarea>
                    </div>
                </div>
            </div>

            <input type="hidden" name="cve_subseccion" value="<?=$preguntas['cve_subseccion'] ?>">
            <input type="hidden" name="cve_tipo_pregunta" value="<?=$preguntas['cve_tipo_pregunta'] ?>">

        </form>
    </div>

    <hr />
    <?php switch( $preguntas['cve_tipo_pregunta'] ) {
        case "1": // Opción múltiple, mostrar secc. valores posibles
            include(APPPATH.'views/catalogos/valores_posibles/lista.php');
            break;
        case "2": // Texto libre, no mostrar nada
            break;
        case "3": // Múltiples respuestas opción múltiple, mostrar secc. subpreguntas
            include(APPPATH.'views/catalogos/subpreguntas/lista.php');
            break;
        case "4": // Múltiples respuestas texto libre, mostrar secc. subpreguntas
            include(APPPATH.'views/catalogos/subpreguntas/lista.php');
            break;
    } ?>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>subsecciones/detalle/<?=$preguntas['cve_subseccion'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    </main>
