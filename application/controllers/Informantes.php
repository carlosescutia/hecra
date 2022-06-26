<?php
class Informantes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('informantes_model');
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

            $data['informantes'] = $this->informantes_model->get_informantes();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/informantes/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function detalle($cve_informante)
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

            $data['informantes'] = $this->informantes_model->get_informante($cve_informante);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/informantes/detalle', $data);
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
            $this->load->view('catalogos/informantes/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_informante=null)
    {
        if ($this->session->userdata('logueado')) {

            $informantes = $this->input->post();
            if ($informantes) {
                $data = array(
                    'cve_dependencia' => $informantes['cve_dependencia'],
                    'nom_informante' => $informantes['nom_informante'],
                    'departamento' => $informantes['departamento'],
                    'cargo' => $informantes['cargo'],
                    'email' => $informantes['email'],
                    'telefono' => $informantes['telefono'],
                );
                $this->informantes_model->guardar($data, $cve_informante);
            }
            redirect('dependencias/detalle/'.$informantes['cve_dependencia']);

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_informante)
    {
        if ($this->session->userdata('logueado')) {

            $this->informantes_model->eliminar($cve_informante);
            redirect('informantes');

        } else {
            redirect('inicio/login');
        }
    }

}
