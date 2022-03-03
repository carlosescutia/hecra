    <div class="card mt-0 mb-3 ml-5">
        <div class="card-header card-sistema">
            <div class="row">
                <div class="col-md-10">
                    <strong>Subpreguntas</strong>
                </div>
                <div class="col-md-2 text-right">
                <form method="post" action="<?= base_url() ?>subpreguntas/nuevo/<?= $preguntas['cve_pregunta'] ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Nueva subpregunta</button>
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
                            <th scope="col">Texto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subpreguntas as $subpreguntas_item) { ?>
                        <tr>
                            <td><?= $subpreguntas_item['num_subpregunta'] ?></td>
                            <td><a href="<?=base_url()?>subpreguntas/detalle/<?=$subpreguntas_item['cve_subpregunta']?>"><?= $subpreguntas_item['texto_subpregunta'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>subpreguntas/eliminar/<?= $subpreguntas_item['cve_subpregunta'] ?>/"><span data-feather="x-circle"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
