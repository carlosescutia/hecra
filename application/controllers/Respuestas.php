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
            $valor96 = 0;
            $valor104 = 0;
            $valor96_numeric = false;
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
                        // Caso especial: pregunta 96 de producto estadístico
                        if ($cve_pregunta == "96") {
                            switch($cve_subpregunta) {
                            case 1:
                                $valor96 += $valor * 0.50;
                                if ( is_numeric($valor) ) {
                                    $valor96_numeric = true;
                                }
                                break;
                            case 2:
                                $valor96 += $valor * 0.25;
                                break;
                            case 3:
                                $valor96 += $valor * 0.15;
                                break;
                            case 4:
                                $valor96 += $valor * 0.10;
                                break;
                            }
                        }
                        // Caso especial: pregunta 104 de producto estadístico
                        if ($cve_pregunta == "104") {
                            $valor104 += $valor;
                        }
                    }
                }
                if ($valor96 > 0) {
                    if ( !$valor96_numeric) {
                        $valor96 = null;
                    }
                    $data = array(
                        'cve_cuestionario_contestado' => $cve_cuestionario_contestado,
                        'cve_pregunta' => 96,
                        'cve_subpregunta' => null,
                        'valor' => $valor96,
                    );
                    $cve_pregunta = 96;
                    $cve_subpregunta = null;
                    $this->respuestas_model->guardar($data, $cve_cuestionario_contestado, $cve_pregunta, $cve_subpregunta);
                }
                if ($valor104 > 0) {
                    $data = array(
                        'cve_cuestionario_contestado' => $cve_cuestionario_contestado,
                        'cve_pregunta' => 104,
                        'cve_subpregunta' => null,
                        'valor' => $valor104,
                    );
                    $cve_pregunta = 104;
                    $cve_subpregunta = null;
                    $this->respuestas_model->guardar($data, $cve_cuestionario_contestado, $cve_pregunta, $cve_subpregunta);
                }
            }
            redirect('cuestionarios_contestados/detalle/'.$cve_cuestionario_contestado.'/'.$cve_subseccion);

        } else {
            redirect('inicio/login');
        }
    }

}
