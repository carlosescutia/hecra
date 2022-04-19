<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>subsecciones/guardar">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nueva subseccion</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="num_subseccion" class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="num_subseccion" id="num_subseccion">
                </div>
            </div>
            <div class="form-group row">
                <label for="nom_subseccion" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_subseccion" id="nom_subseccion">
                </div>
            </div>
        </div>

        <input type="hidden" name="cve_seccion" value="<?= $cve_seccion; ?>">

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
        <a href="<?=base_url()?>secciones/detalle/<?= $cve_seccion; ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
