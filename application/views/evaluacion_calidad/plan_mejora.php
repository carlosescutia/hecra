<div class="card mt-0 mb-3">
    <div class="card-header card-sistema">
        <strong>Plan de mejora</strong>
    </div>
    <div class="card-body">
        <p>Se encuentra a disposición para el personal responsable de los registros administrativos, el <a href="<?=base_url()?>doc/formato_plan_mejora.docx">Formato de Plan de Mejora</a>. Se llena tomando en cuenta los resultados de la evaluación. Sugerimos atender aquellos rubros de mayor carencia y de los cuales cuenten con el personal, recursos materiales y financieros necesarios para aplicar las acciones correctivas y preventivas pertinentes. Una vez llenado el formato, se solicita subir al sistema en:</p>
        <div class="mt-5">
            <?php 
            $nombre_archivo = 'plan_' . $cve_periodo . '.docx';
            $nombre_archivo_fs = './planes_mejora/' . $nombre_archivo;
            $nombre_archivo_url = base_url() . 'planes_mejora/' . $nombre_archivo;
            if ( file_exists($nombre_archivo_fs) ) { ?>
            <a href="<?= $nombre_archivo_url ?>" target="_blank"><span class="mr-2"><img src="<?=base_url()?>img/application-vnd.ms-word.png" height="30"></span>Plan de mejora cargado</a>
            <?php } ?>
        </div>
    </div>
    <div class="card-footer text-center">
        <form method="post" enctype="multipart/form-data" action="<?=base_url()?>archivos/enviar">
            <div class="row text-danger">
                <?php if ($error) { 
                echo $error;
                } ?>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <input type="file" class="form-control-file" name="subir_archivo">
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary btn-sm">Subir Plan de mejora</button>
                </div>
            </div>
            <input type="hidden" name="nombre_archivo" value="<?=$nombre_archivo?>">
        </form>
    </div>
</div>
