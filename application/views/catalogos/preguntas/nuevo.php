<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>preguntas/guardar">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nueva pregunta</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_tipo_pregunta" class="col-sm-2 col-form-label">Tipo de pregunta</label>
                <div class="col-sm-10">
                    <select class="custom-select" name="cve_tipo_pregunta" id="cve_tipo_pregunta">
                        <?php foreach ($tipo_preguntas as $tipo_preguntas_item) { ?>
                        <option value="<?= $tipo_preguntas_item['cve_tipo_pregunta'] ?>" ><?= $tipo_preguntas_item['nom_tipo_pregunta'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="num_pregunta" class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="num_pregunta" id="num_pregunta">
                </div>
            </div>
            <div class="form-group row">
                <label for="texto_pregunta" class="col-sm-2 col-form-label">Texto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="texto_pregunta" id="texto_pregunta">
                </div>
            </div>
            <div class="form-group row">
                <label for="responde" class="col-sm-2 col-form-label">Quien responde la pregunta?</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="responde" id="responde">
                </div>
            </div>
            <div class="form-group row">
                <label for="guia" class="col-sm-2 col-form-label">Guía de llenado</label>
                <div class="col-sm-10">
                    <textarea rows="5" class="form-control" name="guia" id="guia"></textarea>
                </div>
            </div>
        </div>

        <input type="hidden" name="cve_subseccion" value="<?= $cve_subseccion; ?>">

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
        <a href="<?=base_url()?>subsecciones/detalle/<?= $cve_subseccion; ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
