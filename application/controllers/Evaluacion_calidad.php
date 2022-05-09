<?php
class Evaluacion_calidad extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('accesos_sistema_model');

        $this->load->model('periodos_model');
        $this->load->model('evaluacion_calidad_model');
    }

    public function calidad_global($cve_periodo)
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

            $data['periodos'] = $this->periodos_model->get_periodo($cve_periodo);

            $data['calidad_global_secciones'] = $this->evaluacion_calidad_model->get_calidad_global_secciones_periodo($cve_periodo);
            $data['valores_grafico'] = $this->evaluacion_calidad_model->get_valores_grafico_periodo($cve_periodo);
            $data['indice_calidad_global'] = $this->evaluacion_calidad_model->get_indice_calidad_global_periodo($cve_periodo);

            $this->load->view('templates/header', $data);
            $this->load->view('evaluacion_calidad/calidad_global', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function indicadores_calidad($cve_periodo)
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

            $data['periodos'] = $this->periodos_model->get_periodo($cve_periodo);

            // Cuestionario 1 (Registros administrativos)
            $data['secciones_calidad_ra'] = $this->evaluacion_calidad_model->get_secciones_calidad_cuestionario(1);
            $data['subsecciones_calidad_ra'] = $this->evaluacion_calidad_model->get_subsecciones_calidad_cuestionario(1);
            $data['indicadores_calidad_ra'] = $this->evaluacion_calidad_model->get_indicadores_calidad_cuestionario(1);
            $data['datos_calidad_indicadores'] = $this->periodos_model->get_datos_calidad_indicadores($cve_periodo);
            $data['calidad_subsecciones'] = $this->periodos_model->get_calidad_subsecciones($cve_periodo);
            $data['calidad_secciones'] = $this->periodos_model->get_calidad_secciones($cve_periodo);

            $this->load->view('templates/header', $data);
            $this->load->view('evaluacion_calidad/indicadores_calidad', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

}
