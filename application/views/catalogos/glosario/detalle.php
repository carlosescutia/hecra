<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>glosario/guardar/<?= $glosario['cve_termino'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar término</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="termino" class="col-sm-2 col-form-label">Término</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="termino" id="termino" value="<?=$glosario['termino'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="definicion" class="col-sm-2 col-form-label">Definición</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="definicion" id="definicion" rows="5"><?=$glosario['definicion'] ?></textarea>
                </div>
            </div>
        </div>

    </form>


    <hr />

    <div class="form-group row">
        <div class="col-sm-10">
            <a href="<?=base_url()?>glosario/catalogo" class="btn btn-secondary">Volver</a>
        </div>
    </div>

</main>

