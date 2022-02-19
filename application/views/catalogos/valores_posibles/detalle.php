<main role="main" class="ml-sm-auto px-4">

    <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
        <div class="col-md-12">
            <div class="row">
                <h2>Editar valor posible</h2>
            </div>
        </div>
    </div>

    <div class="card mt-0 mb-3">
        <form method="post" action="<?= base_url() ?>valores_posibles/guardar/<?= $valores_posibles['cve_valor_posible'] ?>">
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
                    <label for="num_valor_posible" class="col-sm-2 col-form-label">Número</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="num_valor_posible" id="num_valor_posible" value="<?=$valores_posibles['num_valor_posible'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="valor_posible" class="col-sm-2 col-form-label">Valor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="valor_posible" id="valor_posible" value="<?=$valores_posibles['valor_posible'] ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="texto_valor_posible" class="col-sm-2 col-form-label">Texto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="texto_valor_posible" id="texto_valor_posible" value="<?=$valores_posibles['texto_valor_posible'] ?>">
                    </div>
                </div>
            </div>

            <input type="hidden" name="cve_pregunta" value="<?=$valores_posibles['cve_pregunta'] ?>">

        </form>
    </div>

    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>preguntas/detalle/<?=$valores_posibles['cve_pregunta'] ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
