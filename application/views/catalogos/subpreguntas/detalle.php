<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <h2>Editar subpregunta</h2>
            </div>
        </div>
    </div>

    <div class="card mt-0 mb-3">
        <form method="post" action="<?= base_url() ?>subpreguntas/guardar/<?= $subpreguntas['cve_subpregunta'] ?>">
            <div class="card-header card-sistema">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Datos de la subpregunta</strong>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="num_subpregunta" class="col-sm-2 col-form-label">Número</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="num_subpregunta" id="num_subpregunta" value="<?=$subpreguntas['num_subpregunta'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="texto_subpregunta" class="col-sm-2 col-form-label">Texto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="texto_subpregunta" id="texto_subpregunta" value="<?=$subpreguntas['texto_subpregunta'] ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="cve_pregunta" value="<?=$subpreguntas['cve_pregunta'] ?>">

        </form>
    </div>

    <hr />
    <?php if ( $subpreguntas['cve_tipo_pregunta'] == '3' ) {
        // Múltiples respuestas opción múltiple, mostrar secc. subvalores_posibles
        include(APPPATH.'views/catalogos/subvalores_posibles/lista.php');
    } ?>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>preguntas/detalle/<?=$subpreguntas['cve_pregunta'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    </main>
