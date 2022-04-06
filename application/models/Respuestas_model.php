<?php
class Respuestas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_respuestas_cuestionario_contestado($cve_cuestionario_contestado) {
        $sql = "select r.* from respuestas r where r.cve_subpregunta::integer < 1 or r.cve_subpregunta is null and r.cve_cuestionario_contestado = ?";
        $query = $this->db->query($sql, array($cve_cuestionario_contestado));
        return $query->result_array();
    }

    public function get_subrespuestas_cuestionario_contestado($cve_cuestionario_contestado) {
        $sql = "select r.* from respuestas r where r.cve_subpregunta::integer > 0 and r.cve_cuestionario_contestado = ?";
        $query = $this->db->query($sql, array($cve_cuestionario_contestado));
        return $query->result_array();
    }

    public function guardar($data, $cve_cuestionario_contestado, $cve_pregunta, $cve_subpregunta)
    {
        $this->db->where('cve_cuestionario_contestado', $cve_cuestionario_contestado);
        $this->db->where('cve_pregunta', $cve_pregunta);
        $this->db->where('cve_subpregunta', $cve_subpregunta);
        $query = $this->db->get('respuestas');
        $this->db->reset_query();

        if ($query->num_rows() > 0) {
            $this->db->where('cve_cuestionario_contestado', $cve_cuestionario_contestado);
            $this->db->where('cve_pregunta', $cve_pregunta);
            $this->db->where('cve_subpregunta', $cve_subpregunta);
            $this->db->update('respuestas', $data);
        } else {
            $this->db->insert('respuestas', $data);
        }
    }

    public function eliminar($cve_cuestionario_contestado, $cve_pregunta, $cve_subpregunta)
    {
        $this->db->where('cve_cuestionario_contestado', $cve_respuesta);
        $this->db->where('cve_pregunta', $cve_pregunta);
        $this->db->where('cve_subpregunta', $cve_subpregunta);
        $this->db->delete('respuestas');
    }

}
