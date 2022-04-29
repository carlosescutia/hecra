<?php
class Periodos extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('periodos_model');
        $this->load->model('dependencias_model');
        $this->load->model('accesos_sistema_model');
        $this->load->model('secciones_model');
        $this->load->model('subsecciones_model');
    }

    public function index()
    {
        if ($this->session->userdata('logueado')) {
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_periodo'] = $this->session->userdata('cve_periodo');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['cve_rol'] = $cve_rol;
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['periodos'] = $this->periodos_model->get_periodos();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/periodos/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function detalle($cve_periodo)
    {
        if ($this->session->userdata('logueado')) {
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_periodo'] = $this->session->userdata('cve_periodo');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['fecha_ini'] = $this->session->userdata('fecha_ini');
            $data['fecha_fin'] = $this->session->userdata('fecha_fin');
            $data['activo'] = $this->session->userdata('activo');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['periodos'] = $this->periodos_model->get_periodo($cve_periodo);
            $data['dependencias'] = $this->dependencias_model->get_dependencias();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/periodos/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo()
    {
        if ($this->session->userdata('logueado')) {
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_periodo'] = $this->session->userdata('cve_periodo');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['fecha_ini'] = $this->session->userdata('fecha_ini');
            $data['fecha_fin'] = $this->session->userdata('fecha_fin');
            $data['activo'] = $this->session->userdata('activo');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            if ($cve_rol != 'adm') {
                redirect('inicio');
            }

            $data['dependencias'] = $this->dependencias_model->get_dependencias();

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/periodos/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_periodo=null)
    {
        if ($this->session->userdata('logueado')) {

            $periodos = $this->input->post();
            if ($periodos) {
                $data = array(
                    'cve_dependencia' => empty($periodos['cve_dependencia']) ? null : $periodos['cve_dependencia'],
                    'nom_periodo' => empty($periodos['nom_periodo']) ? null : $periodos['nom_periodo'],
                    'fecha_ini' => empty($periodos['fecha_ini']) ? null : $periodos['fecha_ini'],
                    'fecha_fin' => empty($periodos['fecha_fin']) ? null : $periodos['fecha_fin'],
                    'activo' => empty($periodos['activo']) ? '0' : $periodos['activo']
                );
                $this->periodos_model->guardar($data, $cve_periodo);
            }
            redirect('periodos');

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_periodo)
    {
        if ($this->session->userdata('logueado')) {

            $this->periodos_model->eliminar($cve_periodo);
            redirect('periodos');

        } else {
            redirect('inicio/login');
        }
    }
}
