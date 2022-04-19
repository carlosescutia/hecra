<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <h2>Editar seccion</h2>
            </div>
        </div>
    </div>

    <div class="card mt-0 mb-3">
        <form method="post" action="<?= base_url() ?>secciones/guardar/<?= $secciones['cve_seccion'] ?>">
            <div class="card-header card-sistema">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Datos de la seccion</strong>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="num_seccion" class="col-sm-2 col-form-label">Número</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="num_seccion" id="num_seccion" value="<?=$secciones['num_seccion'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nom_seccion" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom_seccion" id="nom_seccion" value="<?=$secciones['nom_seccion'] ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="cve_cuestionario" value="<?=$secciones['cve_cuestionario'] ?>">

        </form>
    </div>

    <hr />

    <?php include(APPPATH.'views/catalogos/subsecciones/lista.php') ?>

    <hr />


    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios/detalle/<?=$secciones['cve_cuestionario'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    </main>
