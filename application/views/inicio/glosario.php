<main role="main" class="ml-sm-auto px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Glosario</h2>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="col-md-12">
                <?php
                foreach ($glosario as $glosario_item) { ?>
                    <h5><?=$glosario_item['termino']?></h5>
                    <p><?=$glosario_item['definicion']?></p>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-3 ml-5">
            <img src="<?=base_url();?>img/glosario.jpg" class="img-fluid rounded">
        </div>
    </div>

    <hr />

</main>
