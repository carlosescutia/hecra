<script>                                                                                                 
    $(document).ready(function(){
    })

    function confirm_modal(clave, cuestionario, periodo, dependencia) {
        $('#modal_delete').modal('show', {backdrop: 'static',keyboard :false});
        $("#del_cuestionario_contestado").text(cuestionario);
        $("#del_periodo").text(periodo);
        $("#del_dependencia").text(dependencia);
        $('#delete_link').attr("href" , '<?=base_url()?>cuestionarios_contestados/eliminar/' + clave );
    }

</script>
