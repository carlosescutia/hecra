<?php
class Valores_posibles extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('valores_posibles_model');
        $this->load->model('accesos_sistema_model');
    }

    public function detalle($cve_valor_posible)
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

            $data['valores_posibles'] = $this->valores_posibles_model->get_valor_posible($cve_valor_posible);

            $this->load->view('templates/header', $data);
            $this->load->view('catalogos/valores_posibles/detalle', $data);
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
            $this->load->view('catalogos/valores_posibles/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_valor_posible=null)
    {
        if ($this->session->userdata('logueado')) {

            $valores_posibles = $this->input->post(null, true);
            if ($valores_posibles) {
                $data = array(
                    'cve_pregunta' => $valores_posibles['cve_pregunta'],
                    'num_valor_posible' => $valores_posibles['num_valor_posible'],
                    'texto_valor_posible' => $valores_posibles['texto_valor_posible'],
                    'valor_posible' => in_array($valores_posibles['valor_posible'], array("","-")) ? null : $valores_posibles['valor_posible']
                );
                $this->valores_posibles_model->guardar($data, $cve_valor_posible);
            }

            redirect('preguntas/detalle/'.$valores_posibles['cve_pregunta']);

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_valor_posible)
    {
        if ($this->session->userdata('logueado')) {

            $data['valores_posibles'] = $this->valores_posibles_model->get_valor_posible($cve_valor_posible);
            $cve_pregunta = $data['valores_posibles']['cve_pregunta'];
            $this->valores_posibles_model->eliminar($cve_valor_posible);
            redirect('preguntas/detalle/'.$cve_pregunta);
        } else {
            redirect('inicio/login');
        }
    }

}
