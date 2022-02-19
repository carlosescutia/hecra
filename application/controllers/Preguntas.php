<?php
class Preguntas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('preguntas_model');
        $this->load->model('valores_posibles_model');
        $this->load->model('accesos_sistema_model');
    }

    public function detalle($cve_pregunta)
    {
        if ($this->session->userdata('logueado')) {
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_usuario'] = $this->session->userdata('cve_usuario');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['cve_rol'] = $cve_rol;
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['preguntas'] = $this->preguntas_model->get_pregunta($cve_pregunta);
            $cve_pregunta = $data['preguntas']['cve_pregunta'];
            $data['valores_posibles'] = $this->valores_posibles_model->get_valores_posibles_pregunta($cve_pregunta);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/preguntas/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo($cve_cuestionario)
    {
        if ($this->session->userdata('logueado')) {
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_usuario'] = $this->session->userdata('cve_usuario');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['cve_rol'] = $cve_rol;
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['cve_cuestionario'] = $cve_cuestionario;

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/preguntas/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_pregunta=null)
    {
        if ($this->session->userdata('logueado')) {

            $preguntas = $this->input->post();
            if ($preguntas) {
                $data = array(
                    'cve_cuestionario' => $preguntas['cve_cuestionario'],
                    'num_pregunta' => empty($preguntas['num_pregunta']) ? null : $preguntas['num_pregunta'],
                    'texto_pregunta' => empty($preguntas['texto_pregunta']) ? null : $preguntas['texto_pregunta']
                );
                $this->preguntas_model->guardar($data, $cve_pregunta);
            }

            if (is_null($cve_pregunta)) {
                redirect('cuestionarios/detalle/'.$preguntas['cve_cuestionario']);
            } else {
                redirect('preguntas/detalle/'.$cve_pregunta);
            }

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_pregunta)
    {
        if ($this->session->userdata('logueado')) {

            $data['preguntas'] = $this->preguntas_model->get_pregunta($cve_pregunta);
            $cve_cuestionario = $data['preguntas']['cve_cuestionario'];
            $this->preguntas_model->eliminar($cve_pregunta);
            redirect('cuestionarios/detalle/'.$cve_cuestionario);

        } else {
            redirect('inicio/login');
        }
    }

}
