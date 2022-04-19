    <div class="card mt-0 mb-3 ml-5">
        <div class="card-header card-sistema">
            <div class="row">
                <div class="col-md-10">
                    <strong>Subsecciones</strong>
                </div>
                <div class="col-md-2 text-right">
                <form method="post" action="<?= base_url() ?>subsecciones/nuevo/<?= $secciones['cve_seccion'] ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Nueva subseccion</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="col-md-12">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">Número</th>
                            <th scope="col">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subsecciones as $subsecciones_item) { ?>
                        <tr>
                            <td><?= $subsecciones_item['num_subseccion'] ?></td>
                            <td><a href="<?=base_url()?>subsecciones/detalle/<?=$subsecciones_item['cve_subseccion']?>"><?= $subsecciones_item['nom_subseccion'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>subsecciones/eliminar/<?= $subsecciones_item['cve_subseccion'] ?>/"><span data-feather="x-circle"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
