<?php
class Secciones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('accesos_sistema_model');
        $this->load->model('secciones_model');
        $this->load->model('subsecciones_model');
    }

    public function detalle($cve_seccion)
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

            $data['secciones'] = $this->secciones_model->get_seccion($cve_seccion);
            $data['subsecciones'] = $this->subsecciones_model->get_subsecciones_seccion($cve_seccion);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/secciones/detalle', $data);
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
            $this->load->view('catalogos/secciones/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_seccion=null)
    {
        if ($this->session->userdata('logueado')) {

            $secciones = $this->input->post();
            if ($secciones) {
                $data = array(
                    'cve_cuestionario' => $secciones['cve_cuestionario'],
                    'num_seccion' => empty($secciones['num_seccion']) ? null : $secciones['num_seccion'],
                    'nom_seccion' => empty($secciones['nom_seccion']) ? null : $secciones['nom_seccion']
                );
                $this->secciones_model->guardar($data, $cve_seccion);
            }

            if (is_null($cve_seccion)) {
                redirect('cuestionarios/detalle/'.$secciones['cve_cuestionario']);
            } else {
                redirect('secciones/detalle/'.$cve_seccion);
            }

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_seccion)
    {
        if ($this->session->userdata('logueado')) {

            $data['secciones'] = $this->secciones_model->get_seccion($cve_seccion);
            $cve_cuestionario = $data['secciones']['cve_cuestionario'];
            $this->secciones_model->eliminar($cve_seccion);
            redirect('cuestionarios/detalle/'.$cve_cuestionario);

        } else {
            redirect('inicio/login');
        }
    }

}
