<?php
class Preguntas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_preguntas_cuestionario($cve_cuestionario) {
        $sql = 'select p.*, tp.cve_tipo_pregunta, tp.nom_tipo_pregunta from preguntas p left join tipo_preguntas tp on p.cve_tipo_pregunta = tp.cve_tipo_pregunta where cve_cuestionario = ? order by num_pregunta;';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->result_array();
    }

    public function get_pregunta($cve_pregunta) {
        $sql = 'select p.*, tp.nom_tipo_pregunta from preguntas p left join tipo_preguntas tp on p.cve_tipo_pregunta = tp.cve_tipo_pregunta where cve_pregunta = ?;';
        $query = $this->db->query($sql, array($cve_pregunta));
        return $query->row_array();
    }

    public function guardar($data, $cve_pregunta)
    {
        if ($cve_pregunta) {
            $this->db->where('cve_pregunta', $cve_pregunta);
            $result = $this->db->update('preguntas', $data);
        } else {
            $result = $this->db->insert('preguntas', $data);
        }
        return $result;
    }

    public function eliminar($cve_pregunta)
    {
        $this->db->where('cve_pregunta', $cve_pregunta);
        $result = $this->db->delete('preguntas');
        return $result;
    }

}
