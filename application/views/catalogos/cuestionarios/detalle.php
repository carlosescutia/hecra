<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <h2>Editar cuestionario</h2>
            </div>
        </div>
    </div>

    <div class="card mt-0 mb-3">
        <form method="post" action="<?= base_url() ?>cuestionarios/guardar/<?= $cuestionarios['cve_cuestionario'] ?>">
            <div class="card-header card-sistema">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Datos del cuestionario</strong>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="nom_consejo">Nombre</label>
                        <input type="text" class="form-control" name="nom_cuestionario" id="nom_cuestionario" value="<?=$cuestionarios['nom_cuestionario'] ?>">
                    </div>
                </div>
            </div>
        </form>
    </div>

    <hr />

    <?php include(APPPATH.'views/catalogos/preguntas/lista.php') ?>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
