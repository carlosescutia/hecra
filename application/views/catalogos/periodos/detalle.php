<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>periodos/guardar/<?= $periodos['cve_periodo'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar periodo</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="cve_periodo" class="col-sm-2 col-form-label">Clave</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cve_periodo" id="cve_periodo" value="<?=$periodos['cve_periodo'] ?>" readonly>
                </div>
            </div>
            <div class="form-group row">
                <label for="cve_dependencia" class="col-sm-2 col-form-label">Dependencia</label>
                <div class="col-sm-10">
                    <select class="custom-select" name="cve_dependencia" id="cve_dependencia">
                        <?php foreach ($dependencias as $dependencias_item) { ?>
                        <option value="<?= $dependencias_item['cve_dependencia'] ?>" <?= ($periodos['cve_dependencia'] == $dependencias_item['cve_dependencia']) ? 'selected' : '' ?> ><?= $dependencias_item['nom_dependencia'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="nom_periodo" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_periodo" id="nom_periodo" value="<?=$periodos['nom_periodo'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_ini" class="col-sm-2 col-form-label">Fecha de inicio</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="fecha_ini" id="fecha_ini" value="<?=$periodos['fecha_ini'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_fin" class="col-sm-2 col-form-label">Fecha de fin</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="fecha_fin" id="fecha_fin" value="<?=$periodos['fecha_fin'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="activo" class="col-sm-2 col-form-label">Activo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="activo" id="activo" value="<?=$periodos['activo'] ?>">
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>periodos" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

