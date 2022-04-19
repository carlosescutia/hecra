    <div class="card mt-0 mb-3 ml-5">
        <div class="card-header card-sistema">
            <div class="row">
                <div class="col-md-10">
                    <strong>Secciones</strong>
                </div>
                <div class="col-md-2 text-right">
                <form method="post" action="<?= base_url() ?>secciones/nuevo/<?= $cuestionarios['cve_cuestionario'] ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Nueva seccion</button>
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
                        <?php foreach ($secciones as $secciones_item) { ?>
                        <tr>
                            <td><?= $secciones_item['num_seccion'] ?></td>
                            <td><a href="<?=base_url()?>secciones/detalle/<?=$secciones_item['cve_seccion']?>"><?= $secciones_item['nom_seccion'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>secciones/eliminar/<?= $secciones_item['cve_seccion'] ?>/"><span data-feather="x-circle"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
