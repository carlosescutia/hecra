<?php
class Tipo_cuestionarios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('tipo_cuestionarios_model');
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

            $data['tipo_cuestionarios'] = $this->tipo_cuestionarios_model->get_tipo_cuestionarios();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_cuestionarios/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function detalle($cve_tipo_cuestionario)
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

            $data['tipo_cuestionarios'] = $this->tipo_cuestionarios_model->get_tipo_cuestionario($cve_tipo_cuestionario);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_cuestionarios/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo()
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

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/tipo_cuestionarios/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_tipo_cuestionario=null)
    {
        if ($this->session->userdata('logueado')) {

            $tipo_cuestionarios = $this->input->post();
            if ($tipo_cuestionarios) {
                $data = array(
                    'nom_tipo_cuestionario' => empty($tipo_cuestionarios['nom_tipo_cuestionario']) ? null : $tipo_cuestionarios['nom_tipo_cuestionario']
                );
                $this->tipo_cuestionarios_model->guardar($data, $cve_tipo_cuestionario);
            }
            redirect('tipo_cuestionarios');

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_tipo_cuestionario)
    {
        if ($this->session->userdata('logueado')) {

            $this->tipo_cuestionarios_model->eliminar($cve_tipo_cuestionario);
            redirect('tipo_cuestionarios');

        } else {
            redirect('inicio/login');
        }
    }

}
