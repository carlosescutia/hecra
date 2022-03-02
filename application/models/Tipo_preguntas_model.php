<?php
class Tipo_preguntas_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tipo_preguntas() {
        $sql = 'select * from tipo_preguntas order by cve_tipo_pregunta;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_tipo_pregunta($cve_tipo_pregunta) {
        $sql = 'select * from tipo_preguntas where cve_tipo_pregunta = ?;';
        $query = $this->db->query($sql, array($cve_tipo_pregunta));
        return $query->row_array();
    }

    public function guardar($data, $cve_tipo_pregunta)
    {
        if ($cve_tipo_pregunta) {
            $this->db->where('cve_tipo_pregunta', $cve_tipo_pregunta);
            $result = $this->db->update('tipo_preguntas', $data);
        } else {
            $result = $this->db->insert('tipo_preguntas', $data);
        }
        return $result;
    }

}
