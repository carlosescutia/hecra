<?php
class Subvalores_posibles extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('subvalores_posibles_model');
        $this->load->model('accesos_sistema_model');
    }

    public function detalle($cve_subvalor_posible)
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

            $data['subvalores_posibles'] = $this->subvalores_posibles_model->get_subvalor_posible($cve_subvalor_posible);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/subvalores_posibles/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo($cve_subpregunta)
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

            $data['cve_subpregunta'] = $cve_subpregunta;

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/subvalores_posibles/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_subvalor_posible=null)
    {
        if ($this->session->userdata('logueado')) {

            $subvalores_posibles = $this->input->post();
            if ($subvalores_posibles) {
                $data = array(
                    'cve_subpregunta' => $subvalores_posibles['cve_subpregunta'],
                    'num_subvalor_posible' => $subvalores_posibles['num_subvalor_posible'],
                    'texto_subvalor_posible' => $subvalores_posibles['texto_subvalor_posible'],
                    'subvalor_posible' => $subvalores_posibles['subvalor_posible']
                );
                $this->subvalores_posibles_model->guardar($data, $cve_subvalor_posible);
            }

            redirect('subpreguntas/detalle/'.$subvalores_posibles['cve_subpregunta']);

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_subvalor_posible)
    {
        if ($this->session->userdata('logueado')) {

            $data['subvalores_posibles'] = $this->subvalores_posibles_model->get_subvalor_posible($cve_subvalor_posible);
            $cve_subpregunta = $data['subvalores_posibles']['cve_subpregunta'];
            $this->subvalores_posibles_model->eliminar($cve_subvalor_posible);
            redirect('subpreguntas/detalle/'.$cve_subpregunta);
        } else {
            redirect('inicio/login');
        }
    }

}
