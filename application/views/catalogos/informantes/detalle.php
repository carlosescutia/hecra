<main role="main" class="ml-sm-auto px-4">

    <form method="post" action="<?= base_url() ?>informantes/guardar/<?= $informantes['cve_informante'] ?>">

        <div class="col-md-12 mb-3 pb-2 pt-3 border-bottom">
            <div class="row">
                <div class="col-md-10">
                    <h1 class="h2">Editar informante</h1>
                </div>
                <div class="col-md-2 text-right">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group row">
                <label for="nom_informante" class="col-sm-2 col-form-label">Nombre</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nom_informante" id="nom_informante" value="<?=$informantes['nom_informante'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="departamento" class="col-sm-2 col-form-label">Departamento</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="departamento" id="departamento" value="<?=$informantes['departamento'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="cargo" id="cargo" value="<?=$informantes['cargo'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Correo electrónico</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="email" id="email" value="<?=$informantes['email'] ?>">
                </div>
            </div>
            <div class="form-group row">
                <label for="telefono" class="col-sm-2 col-form-label">Teléfono</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="telefono" id="telefono" value="<?=$informantes['telefono'] ?>">
                </div>
            </div>
        </div>
        <input type="hidden" name="cve_dependencia" value="<?=$informantes['cve_dependencia'] ?>">

    </form>

</main>
