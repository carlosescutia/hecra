<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <h2>Editar valor posible</h2>
            </div>
        </div>
    </div>

    <div class="card mt-0 mb-3">
        <form method="post" action="<?= base_url() ?>subvalores_posibles/guardar/<?= $subvalores_posibles['cve_subvalor_posible'] ?>">
            <div class="card-header card-sistema">
                <div class="row">
                    <div class="col-md-10">
                        <strong>Datos del valor posible</strong>
                    </div>
                    <div class="col-md-2 text-right">
                        <button type="submit" class="btn btn-primary btn-sm">Guardar</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="num_subvalor_posible" class="col-sm-2 col-form-label">Número</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="num_subvalor_posible" id="num_subvalor_posible" value="<?=$subvalores_posibles['num_subvalor_posible'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="subvalor_posible" class="col-sm-2 col-form-label">Valor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subvalor_posible" id="subvalor_posible" value="<?=$subvalores_posibles['subvalor_posible'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="texto_subvalor_posible" class="col-sm-2 col-form-label">Texto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="texto_subvalor_posible" id="texto_subvalor_posible" value="<?=$subvalores_posibles['texto_subvalor_posible'] ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="cve_subpregunta" value="<?=$subvalores_posibles['cve_subpregunta'] ?>">

        </form>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>subpreguntas/detalle/<?=$subvalores_posibles['cve_subpregunta'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
