<?php
class Cuestionarios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('accesos_sistema_model');
        $this->load->model('cuestionarios_model');
        $this->load->model('preguntas_model');
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

            $data['cuestionarios'] = $this->cuestionarios_model->get_cuestionarios();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/cuestionarios/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function detalle($cve_cuestionario)
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

            $data['cuestionarios'] = $this->cuestionarios_model->get_cuestionario($cve_cuestionario);
            $data['preguntas'] = $this->preguntas_model->get_preguntas_cuestionario($cve_cuestionario);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/cuestionarios/detalle', $data);
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
            $this->load->view('catalogos/cuestionarios/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_cuestionario=null)
    {
        if ($this->session->userdata('logueado')) {

            $cuestionarios = $this->input->post();
            if ($cuestionarios) {
                $data = array(
                    'nom_cuestionario' => empty($cuestionarios['nom_cuestionario']) ? null : $cuestionarios['nom_cuestionario'],
                    'nom_corto_cuestionario' => empty($cuestionarios['nom_corto_cuestionario']) ? null : $cuestionarios['nom_corto_cuestionario'],
                );
                $this->cuestionarios_model->guardar($data, $cve_cuestionario);
            }

            if (is_null($cve_cuestionario)) {
                redirect('cuestionarios');
            } else {
                redirect('cuestionarios/detalle/'.$cve_cuestionario);
            }

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_cuestionario)
    {
        if ($this->session->userdata('logueado')) {

            $this->cuestionarios_model->eliminar($cve_cuestionario);
            redirect('cuestionarios');

        } else {
            redirect('inicio/login');
        }
    }

}
