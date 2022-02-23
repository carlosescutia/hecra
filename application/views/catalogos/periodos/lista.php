<main role="main" class="ml-sm-auto px-4 mb-3">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="col-sm-12 alternate-color">
            <div class="row">
                <div class="col-sm-10 text-left">
                    <h1 class="h2">Periodos</h1>
                </div>
                <div class="col-sm-2 text-right">
                    <form method="post" action="<?= base_url() ?>periodos/nuevo">
                        <button type="submit" class="btn btn-primary">Nuevo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-12">
        <div style="min-height: 46vh">
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Clave</strong></p>
                        </div>
                        <div class="col-sm-2 align-self-center">
                            <p class="small"><strong>Dependencia</strong></p>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <p class="small"><strong>Nombre</strong></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Fecha inicio</strong></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Fecha fin</strong></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p class="small"><strong>Activo</strong></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php foreach ($periodos as $periodos_item) { ?>
                <div class="col-sm-12 alternate-color">
                    <div class="row">
                        <div class="col-sm-1 align-self-center">
                            <p><?= $periodos_item['cve_periodo'] ?></p>
                        </div>
                        <div class="col-sm-2 align-self-center">
                            <p><?= $periodos_item['nom_dependencia'] ?></p>
                        </div>
                        <div class="col-sm-3 align-self-center">
                            <a href="<?=base_url()?>periodos/detalle/<?=$periodos_item['cve_periodo']?>"><?= $periodos_item['nom_periodo'] ?></a>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p><?= $periodos_item['fecha_ini'] ?></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p><?= $periodos_item['fecha_fin'] ?></p>
                        </div>
                        <div class="col-sm-1 align-self-center">
                            <p><?= $periodos_item['activo'] ?></p>
                        </div>
                        <div class="col-sm-1">
                            <a style="color: #f00" href="<?= base_url() ?>periodos/eliminar/<?= $periodos_item['cve_periodo'] ?>/"><span data-feather="x-circle"></span></a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>catalogos" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</main>
