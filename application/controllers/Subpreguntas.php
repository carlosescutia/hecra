<?php
class Subpreguntas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('subpreguntas_model');
        $this->load->model('accesos_sistema_model');
    }

    public function detalle($cve_subpregunta)
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

            $data['subpreguntas'] = $this->subpreguntas_model->get_subpregunta($cve_subpregunta);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/subpreguntas/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo($cve_pregunta)
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

            $data['cve_pregunta'] = $cve_pregunta;

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/subpreguntas/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_subpregunta=null)
    {
        if ($this->session->userdata('logueado')) {

            $subpreguntas = $this->input->post();
            if ($subpreguntas) {
                $data = array(
                    'cve_pregunta' => $subpreguntas['cve_pregunta'],
                    'num_subpregunta' => empty($subpreguntas['num_subpregunta']) ? null : $subpreguntas['num_subpregunta'],
                    'texto_subpregunta' => empty($subpreguntas['texto_subpregunta']) ? null : $subpreguntas['texto_subpregunta']
                );
                $this->subpreguntas_model->guardar($data, $cve_subpregunta);
            }

            if (is_null($cve_subpregunta)) {
                redirect('preguntas/detalle/'.$subpreguntas['cve_pregunta']);
            } else {
                redirect('subpreguntas/detalle/'.$cve_subpregunta);
            }

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_subpregunta)
    {
        if ($this->session->userdata('logueado')) {

            $data['subpreguntas'] = $this->subpreguntas_model->get_subpregunta($cve_subpregunta);
            $cve_pregunta = $data['subpreguntas']['cve_pregunta'];
            $this->subpreguntas_model->eliminar($cve_subpregunta);
            redirect('preguntas/detalle/'.$cve_pregunta);

        } else {
            redirect('inicio/login');
        }
    }

}
