<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>cuestionarios_contestados/guardar">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nuevo cuestionario</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_cuestionario" class="col-sm-2 col-form-label">Cuestionario</label>
                <div class="col-sm-10">
                    <select class="custom-select" name="cve_cuestionario" id="cve_cuestionario">
                        <?php foreach ($cuestionarios as $cuestionarios_item) { ?>
                        <option value="<?= $cuestionarios_item['cve_cuestionario'] ?>" ><?= $cuestionarios_item['nom_cuestionario'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del cuestionario a contestar">
                </div>
            </div>
            <div class="form-group row">
                <label for="objetivo" class="col-sm-2 col-form-label">Objetivo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="objetivo" id="objetivo" placeholder="Indique, en términos generales, cuáles son los objetivos del cuestionario">
                </div>
            </div>
        </div>
        <input type="hidden" name="cve_periodo" value="<?= $cve_periodo; ?>">

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>cuestionarios_contestados" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>


