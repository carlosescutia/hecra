<?php
class Preguntas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('preguntas_model');
        $this->load->model('tipo_preguntas_model');
        $this->load->model('valores_posibles_model');
        $this->load->model('subpreguntas_model');
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
            $data['subpreguntas'] = $this->subpreguntas_model->get_subpreguntas_pregunta($cve_pregunta);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/preguntas/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo($cve_subseccion)
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

            $data['cve_subseccion'] = $cve_subseccion;
            $data['tipo_preguntas'] = $this->tipo_preguntas_model->get_tipo_preguntas();

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
                    'cve_tipo_pregunta' => $preguntas['cve_tipo_pregunta'],
                    'cve_subseccion' => $preguntas['cve_subseccion'],
                    'num_pregunta' => $preguntas['num_pregunta'],
                    'texto_pregunta' => $preguntas['texto_pregunta'],
                    'responde' => $preguntas['responde'],
                    'guia' => $preguntas['guia']
                );
                $this->preguntas_model->guardar($data, $cve_pregunta);
            }

            if (is_null($cve_pregunta)) {
                redirect('subsecciones/detalle/'.$preguntas['cve_subseccion']);
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
            $cve_subseccion = $data['preguntas']['cve_subseccion'];
            $this->preguntas_model->eliminar($cve_pregunta);
            redirect('subsecciones/detalle/'.$cve_subseccion);

        } else {
            redirect('inicio/login');
        }
    }

}
