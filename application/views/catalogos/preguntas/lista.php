    <div class="card mt-0 mb-3 ml-5">
        <div class="card-header card-sistema">
            <div class="row">
                <div class="col-md-10">
                    <strong>Preguntas</strong>
                </div>
                <div class="col-md-2 text-right">
                    <form method="post" action="<?= base_url() ?>preguntas/nuevo">
                        <button type="submit" class="btn btn-primary btn-sm">Nueva pregunta</button>
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
                        <?php foreach ($preguntas as $preguntas_item) { ?>
                        <tr>
                            <td><?= $preguntas_item['num_pregunta'] ?></td>
                            <td><a href="<?=base_url()?>preguntas/detalle/<?=$preguntas_item['cve_pregunta']?>"><?= $preguntas_item['texto_pregunta'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>preguntas/eliminar/<?= $preguntas_item['cve_pregunta'] ?>/"><span data-feather="x-circle"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
