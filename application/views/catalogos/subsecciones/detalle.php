<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <h2>Editar subseccion</h2>
            </div>
        </div>
    </div>

    <div class="card mt-0 mb-3">
        <form method="post" action="<?= base_url() ?>subsecciones/guardar/<?= $subsecciones['cve_subseccion'] ?>">
            <div class="card-header card-sistema">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Datos de la subseccion</strong>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="num_subseccion" class="col-sm-2 col-form-label">Número</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="num_subseccion" id="num_subseccion" value="<?=$subsecciones['num_subseccion'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nom_subseccion" class="col-sm-2 col-form-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nom_subseccion" id="nom_subseccion" value="<?=$subsecciones['nom_subseccion'] ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="cve_seccion" value="<?=$subsecciones['cve_seccion'] ?>">

        </form>
    </div>

    <hr />

    <?php include(APPPATH.'views/catalogos/preguntas/lista.php') ?>

    <hr />


    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>secciones/detalle/<?=$subsecciones['cve_seccion'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

    </main>
