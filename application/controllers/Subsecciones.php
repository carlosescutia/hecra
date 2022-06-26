<?php
class Subsecciones extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('accesos_sistema_model');
        $this->load->model('subsecciones_model');
        $this->load->model('preguntas_model');
    }

    public function detalle($cve_subseccion)
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

            $data['subsecciones'] = $this->subsecciones_model->get_subseccion($cve_subseccion);
            $data['preguntas'] = $this->preguntas_model->get_preguntas_subseccion($cve_subseccion);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/subsecciones/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo($cve_seccion)
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

            $data['cve_seccion'] = $cve_seccion;

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/subsecciones/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_subseccion=null)
    {
        if ($this->session->userdata('logueado')) {

            $subsecciones = $this->input->post();
            if ($subsecciones) {
                $data = array(
                    'cve_seccion' => $subsecciones['cve_seccion'],
                    'num_subseccion' => $subsecciones['num_subseccion'],
                    'nom_subseccion' => $subsecciones['nom_subseccion']
                );
                $this->subsecciones_model->guardar($data, $cve_subseccion);
            }

            if (is_null($cve_subseccion)) {
                redirect('secciones/detalle/'.$subsecciones['cve_seccion']);
            } else {
                redirect('subsecciones/detalle/'.$cve_subseccion);
            }

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_subseccion)
    {
        if ($this->session->userdata('logueado')) {

            $data['subsecciones'] = $this->subsecciones_model->get_subseccion($cve_subseccion);
            $cve_seccion = $data['subsecciones']['cve_seccion'];
            $this->subsecciones_model->eliminar($cve_subseccion);
            redirect('secciones/detalle/'.$cve_seccion);

        } else {
            redirect('inicio/login');
        }
    }

}
