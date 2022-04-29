<?php
class Periodos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_periodos() {
        $sql = 'select p.*, d.nom_dependencia from periodos p left join dependencias d on p.cve_dependencia = d.cve_dependencia order by p.cve_periodo;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_periodos_dependencia($cve_dependencia, $cve_rol) {
        if ($cve_rol == 'adm' || $cve_rol == 'sup') {
            $cve_dependencia = '%';
        }
        $sql = "select p.*, d.nom_dependencia from periodos p left join dependencias d on p.cve_dependencia = d.cve_dependencia where p.cve_dependencia::char LIKE ? order by p.cve_periodo;";
        $query = $this->db->query($sql, array($cve_dependencia));
        return $query->result_array();
    }

    public function get_periodo($cve_periodo) {
        $sql = 'select p.*, d.nom_dependencia from periodos p left join dependencias d on p.cve_dependencia = d.cve_dependencia where p.cve_periodo = ?;';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->row_array();
    }

    public function get_respuestas_calidad($cve_periodo) {
        $sql = 'select rc.* from respuestas_calidad rc where rc.cve_periodo = ? order by rc.cve_cuestionario_contestado, rc.cve_pregunta';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

    public function get_promedio_respuestas_calidad($cve_periodo) {
        $sql = 'select prc.* from promedio_respuestas_calidad prc where prc.cve_periodo = ?';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

    public function get_datos_calidad_indicadores($cve_periodo) {
        $sql = 'select dci.* from datos_calidad_indicadores dci where dci.cve_periodo = ?';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

    public function get_calidad_subsecciones($cve_periodo) {
        $sql = 'select css.* from calidad_subsecciones css where css.cve_periodo = ?';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

    public function get_calidad_secciones($cve_periodo) {
        $sql = 'select cs.* from calidad_secciones cs where cs.cve_periodo = ?';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

    public function guardar($data, $cve_periodo)
    {
        if ($cve_periodo) {
            $this->db->where('cve_periodo', $cve_periodo);
            $result = $this->db->update('periodos', $data);
        } else {
            $result = $this->db->insert('periodos', $data);
        }
        return $result;
    }

    public function eliminar($cve_periodo)
    {
        $this->db->where('cve_periodo', $cve_periodo);
        $result = $this->db->delete('periodos');
        return $result;
    }

}
