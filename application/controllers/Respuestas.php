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
                foreach ($respuestas as $clave => $valor){
                    if ( $clave !== 'cve_cuestionario_contestado' ) {
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
                        /*
                        echo "Guardar: ";
                        print_r($data);
                        echo "cve_cuestionario_contestado: " . $cve_cuestionario_contestado . "<br />";
                        echo "cve_pregunta: " . $cve_pregunta . "<br />";
                        echo "cve_subpregunta: " . $cve_subpregunta . "<br />";
                        echo "valor: " . $valor . "<br />";
                        echo "<br />";
                         */
                    }
                }
            }
            redirect('cuestionarios_contestados');

        } else {
            redirect('inicio/login');
        }
    }

}
