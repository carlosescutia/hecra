    <div class="card mt-0 mb-3 ml-5">
        <div class="card-header card-sistema">
            <div class="row">
                <div class="col-md-10">
                    <strong>Valores posibles</strong>
                </div>
                <div class="col-md-2 text-right">
                    <form method="post" action="<?= base_url() ?>subvalores_posibles/nuevo/<?= $subpreguntas['cve_subpregunta'] ?>">
                        <button type="submit" class="btn btn-primary btn-sm">Nuevo valor posible</button>
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
                            <th scope="col">Valor</th>
                            <th scope="col">Texto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subvalores_posibles as $subvalores_posibles_item) { ?>
                        <tr>
                            <td><?= $subvalores_posibles_item['num_subvalor_posible'] ?></td>
                            <td><?= $subvalores_posibles_item['subvalor_posible'] ?></td>
                            <td><a href="<?=base_url()?>subvalores_posibles/detalle/<?=$subvalores_posibles_item['cve_subvalor_posible']?>"><?= $subvalores_posibles_item['texto_subvalor_posible'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>subvalores_posibles/eliminar/<?= $subvalores_posibles_item['cve_subvalor_posible'] ?>/"><span data-feather="x-circle"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

