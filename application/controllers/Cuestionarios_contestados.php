<?php
class Cuestionarios_contestados extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('dependencias_model');
        $this->load->model('accesos_sistema_model');
        $this->load->model('cuestionarios_contestados_model');
        $this->load->model('periodos_model');
        $this->load->model('cuestionarios_model');
        $this->load->model('secciones_model');
        $this->load->model('subsecciones_model');
        $this->load->model('preguntas_model');
        $this->load->model('valores_posibles_model');
        $this->load->model('respuestas_model');
        $this->load->model('subpreguntas_model');
        $this->load->model('subvalores_posibles_model');
        $this->load->model('bitacora_model');
    }

    public function index()
    {
        if ($this->session->userdata('logueado')) {
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_cuestionario_contestado'] = $this->session->userdata('cve_cuestionario_contestado');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['cve_rol'] = $cve_rol;
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);


            $cve_dependencia = $data['cve_dependencia'];
            $data['periodos'] = $this->periodos_model->get_periodos_dependencia($cve_dependencia, $cve_rol);
            $data['cuestionarios_contestados'] = $this->cuestionarios_contestados_model->get_cuestionarios_contestados_dependencia($cve_dependencia, $cve_rol);

            $this->load->view('templates/header', $data);
            $this->load->view('cuestionarios_contestados/lista', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function detalle($cve_cuestionario_contestado, $cve_subseccion=0)
    {
        if ($this->session->userdata('logueado')) {
            $data['error_cuestionarios_contestados'] = $this->session->flashdata('error_cuestionarios_contestados');
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_cuestionario_contestado'] = $this->session->userdata('cve_cuestionario_contestado');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['fecha_ini'] = $this->session->userdata('fecha_ini');
            $data['fecha_fin'] = $this->session->userdata('fecha_fin');
            $data['activo'] = $this->session->userdata('activo');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['cuestionarios_contestados'] = $this->cuestionarios_contestados_model->get_cuestionario_contestado($cve_cuestionario_contestado);
            $cve_cuestionario = $data['cuestionarios_contestados']['cve_cuestionario'];
            $data['secciones'] = $this->secciones_model->get_secciones_cuestionario($cve_cuestionario);
            $data['subsecciones'] = $this->subsecciones_model->get_subsecciones_cuestionario($cve_cuestionario);
            $data['preguntas'] = $this->preguntas_model->get_preguntas_subseccion($cve_subseccion);
            $data['respuestas'] = $this->respuestas_model->get_respuestas_cuestionario_contestado($cve_cuestionario_contestado);
            $data['valores_posibles'] = $this->valores_posibles_model->get_valores_posibles_subseccion($cve_subseccion);
            $data['subpreguntas'] = $this->subpreguntas_model->get_subpreguntas_subseccion($cve_subseccion);
            $data['subvalores_posibles'] = $this->subvalores_posibles_model->get_subvalores_posibles_subseccion($cve_subseccion);
            $data['subrespuestas'] = $this->respuestas_model->get_subrespuestas_cuestionario_contestado($cve_cuestionario_contestado);
            $data['cve_subseccion'] = $cve_subseccion;
            $curr_seccion = $this->secciones_model->get_seccion_subseccion($cve_subseccion);
            $data['cve_seccion'] = $curr_seccion ? $curr_seccion['cve_seccion'] : 0 ;
            $data['semaforos'] = $this->cuestionarios_contestados_model->get_semaforos_cuestionario_contestado($cve_cuestionario_contestado);

            $this->load->view('templates/header', $data);
            $this->load->view('cuestionarios_contestados/detalle', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function nuevo($cve_periodo)
    {
        if ($this->session->userdata('logueado')) {
            $cve_rol = $this->session->userdata('cve_rol');
            $data['cve_cuestionario_contestado'] = $this->session->userdata('cve_cuestionario_contestado');
            $data['cve_dependencia'] = $this->session->userdata('cve_dependencia');
            $data['nom_dependencia'] = $this->session->userdata('nom_dependencia');
            $data['nom_usuario'] = $this->session->userdata('nom_usuario');
            $data['fecha_ini'] = $this->session->userdata('fecha_ini');
            $data['fecha_fin'] = $this->session->userdata('fecha_fin');
            $data['activo'] = $this->session->userdata('activo');
            $data['error'] = $this->session->flashdata('error');
            $data['accesos_sistema_rol'] = explode(',', $this->accesos_sistema_model->get_accesos_sistema_rol($cve_rol)['accesos']);

            $data['cuestionarios'] = $this->cuestionarios_model->get_cuestionarios();
            $data['cve_periodo'] = $cve_periodo;

            $this->load->view('templates/header', $data);
            $this->load->view('cuestionarios_contestados/nuevo', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('inicio/login');
        }
    }

    public function guardar($cve_cuestionario_contestado=null)
    {
        if ($this->session->userdata('logueado')) {

            $cuestionarios_contestados = $this->input->post();
            if ($cuestionarios_contestados) {
                $data = array(
                    'cve_cuestionario' => $cuestionarios_contestados['cve_cuestionario'],
                    'cve_periodo' => $cuestionarios_contestados['cve_periodo'],
                    'nombre' => $cuestionarios_contestados['nombre'],
                    'objetivo' => $cuestionarios_contestados['objetivo']
                );
                $this->cuestionarios_contestados_model->guardar($data, $cve_cuestionario_contestado);
            }
            redirect('cuestionarios_contestados');

        } else {
            redirect('inicio/login');
        }
    }

    public function eliminar($cve_cuestionario_contestado)
    {
        if ($this->session->userdata('logueado')) {

            $cuest_c = $this->cuestionarios_contestados_model->get_cuestionario_contestado($cve_cuestionario_contestado);
            $separador = ' -> ';

            $usuario = $this->session->userdata('usuario');
            $nom_usuario = $this->session->userdata('nom_usuario');
            $nom_dependencia = $this->session->userdata('nom_dependencia');
            $accion = 'eliminó';
            $entidad = 'cuestionarios_contestados';
            $valor = $cuest_c['nom_dependencia'] . $separador . $cuest_c['nom_periodo'] . $separador . $cve_cuestionario_contestado . $separador . $cuest_c['nom_cuestionario'] ; 

            $data = array(
                'fecha' => date("Y-m-d"),
                'hora' => date("H:i"),
                'origen' => $_SERVER['REMOTE_ADDR'],
                'usuario' => $usuario,
                'nom_usuario' => $nom_usuario,
                'nom_dependencia' => $nom_dependencia,
                'accion' => $accion,
                'entidad' => $entidad,
                'valor' => $valor
            );
            $this->bitacora_model->guardar($data);

            $this->cuestionarios_contestados_model->eliminar($cve_cuestionario_contestado);
            $this->respuestas_model->eliminar($cve_cuestionario_contestado);

            redirect('cuestionarios_contestados');

        } else {
            redirect('inicio/login');
        }
    }
}
