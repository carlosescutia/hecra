<?php
class Tipo_preguntas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tipo_preguntas_model');
        $this->load->model('accesos_sistema_model');
    }

    public function index()
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

            $data['tipo_preguntas'] = $this->tipo_preguntas_model->get_tipo_preguntas();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_preguntas/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function detalle($cve_tipo_pregunta)
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

            $data['tipo_preguntas'] = $this->tipo_preguntas_model->get_tipo_pregunta($cve_tipo_pregunta);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_preguntas/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_tipo_pregunta=null)
    {
        if ($this->session->userdata('logueado')) {

            $tipo_preguntas = $this->input->post();
            if ($tipo_preguntas) {
                $data = array(
                    'nom_tipo_pregunta' => $tipo_preguntas['nom_tipo_pregunta']
                );
                $this->tipo_preguntas_model->guardar($data, $cve_tipo_pregunta);
            }
            redirect('tipo_preguntas');

        } else {
            redirect('inicio/login');
        }
    }

}
