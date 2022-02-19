<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>valores_posibles/guardar">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Nuevo valor posible</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="num_valor_posible" class="col-sm-2 col-form-label">Número</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="num_valor_posible" id="num_valor_posible">
                </div>
            </div>
            <div class="form-group row">
                <label for="valor_posible" class="col-sm-2 col-form-label">Valor</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="valor_posible" id="valor_posible">
                </div>
            </div>
            <div class="form-group row">
                <label for="texto_valor_posible" class="col-sm-2 col-form-label">Texto</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="texto_valor_posible" id="texto_valor_posible">
                </div>
            </div>
        </div>

        <input type="hidden" name="cve_pregunta" value="<?= $cve_pregunta; ?>">

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>preguntas/detalle/<?= $cve_pregunta; ?>" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>
