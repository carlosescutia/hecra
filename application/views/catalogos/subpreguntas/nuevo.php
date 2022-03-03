<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>subpreguntas/guardar">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nueva subpregunta</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="num_subpregunta" class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="num_subpregunta" id="num_subpregunta">
                </div>
            </div>
            <div class="form-group row">
                <label for="texto_subpregunta" class="col-sm-2 col-form-label">Texto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="texto_subpregunta" id="texto_subpregunta">
                </div>
            </div>
        </div>

        <input type="hidden" name="cve_pregunta" value="<?= $cve_pregunta; ?>">

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
        <a href="<?=base_url()?>preguntas/detalle/<?= $cve_pregunta; ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
