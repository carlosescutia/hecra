<?php
class Respuestas extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('respuestas_model');
    }

    public function guardar($cve_cuestionario_contestado=null)
    {
        if ($this->session->userdata('logueado')) {

            $respuestas = $this->input->post();
            if ($respuestas) {
                $cve_subseccion = $respuestas['cve_subseccion'];
                foreach ($respuestas as $clave => $valor){
                    if ( $clave !== 'cve_cuestionario_contestado' and $clave !== 'cve_subseccion' ) {
                        if (strpos($clave, "_")) {
                            $cve_pregunta = substr($clave, 0, strpos($clave, "_") );
                            $cve_subpregunta = substr($clave, strpos($clave, "_")+1 );
                        } else {
                            $cve_pregunta = $clave;
                            $cve_subpregunta = null;
                        }
                        $data = array(
                            'cve_cuestionario_contestado' => $cve_cuestionario_contestado,
                            'cve_pregunta' => $cve_pregunta,
                            'cve_subpregunta' => $cve_subpregunta,
                            'valor' => $valor,
                        );
                        $this->respuestas_model->guardar($data, $cve_cuestionario_contestado, $cve_pregunta, $cve_subpregunta);
                    }
                }
            }
            redirect('cuestionarios_contestados/detalle/'.$cve_cuestionario_contestado.'/'.$cve_subseccion);

        } else {
            redirect('inicio/login');
        }
    }

}
