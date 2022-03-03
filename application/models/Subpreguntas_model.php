<?php
class Subpreguntas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_subpreguntas_pregunta($cve_pregunta) {
        $sql = 'select sp.*, tp.cve_tipo_pregunta from subpreguntas sp left join preguntas p on sp.cve_pregunta = p.cve_pregunta left join tipo_preguntas tp on tp.cve_tipo_pregunta = p.cve_tipo_pregunta where sp.cve_pregunta = ? order by num_subpregunta;';
        $query = $this->db->query($sql, array($cve_pregunta));
        return $query->result_array();
    }

    public function get_subpregunta($cve_subpregunta) {
        $sql = 'select sp.*, tp.cve_tipo_pregunta from subpreguntas sp left join preguntas p on sp.cve_pregunta = p.cve_pregunta left join tipo_preguntas tp on tp.cve_tipo_pregunta = p.cve_tipo_pregunta where cve_subpregunta = ?;';
        $query = $this->db->query($sql, array($cve_subpregunta));
        return $query->row_array();
    }

    public function guardar($data, $cve_subpregunta)
    {
        if ($cve_subpregunta) {
            $this->db->where('cve_subpregunta', $cve_subpregunta);
            $result = $this->db->update('subpreguntas', $data);
        } else {
            $result = $this->db->insert('subpreguntas', $data);
        }
        return $result;
    }

    public function eliminar($cve_subpregunta)
    {
        $this->db->where('cve_subpregunta', $cve_subpregunta);
        $result = $this->db->delete('subpreguntas');
        return $result;
    }

}
