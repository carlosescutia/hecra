    <div class="card mt-0 mb-3 ml-5">
        <div class="card-header card-sistema">
            <div class="row">
                <div class="col-md-10">
                    <strong>Valores posibles</strong>
                </div>
                <div class="col-md-2 text-right">
                    <form method="post" action="<?= base_url() ?>valores_posibles/nuevo/<?= $preguntas['cve_pregunta'] ?>">
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
                        <?php foreach ($valores_posibles as $valores_posibles_item) { ?>
                        <tr>
                            <td><?= $valores_posibles_item['num_valor_posible'] ?></td>
                            <td><?= $valores_posibles_item['valor_posible'] ?></td>
                            <td><a href="<?=base_url()?>valores_posibles/detalle/<?=$valores_posibles_item['cve_valor_posible']?>"><?= $valores_posibles_item['texto_valor_posible'] ?></a></td>
                            <td><a style="color: #f00" href="<?= base_url() ?>valores_posibles/eliminar/<?= $valores_posibles_item['cve_valor_posible'] ?>/"><span data-feather="x-circle"></span></a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

