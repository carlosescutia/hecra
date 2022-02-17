<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>cuestionarios/guardar/<?= $cuestionarios['cve_cuestionario'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar cuestionario</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_cuestionario" class="col-sm-2 col-form-label">Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cve_cuestionario" id="cve_cuestionario" value="<?=$cuestionarios['cve_cuestionario'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="nom_cuestionario" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_cuestionario" id="nom_cuestionario" value="<?=$cuestionarios['nom_cuestionario'] ?>">
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
