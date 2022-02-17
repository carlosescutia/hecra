<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>preguntas/guardar/<?= $preguntas['cve_pregunta'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar pregunta</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
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
        </div>

        <input type="hidden" name="cve_cuestionario" value="<?=$preguntas['cve_cuestionario'] ?>">

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios/detalle/<?=$preguntas['cve_cuestionario'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
