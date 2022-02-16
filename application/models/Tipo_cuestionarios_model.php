<?php
class Tipo_cuestionarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_tipo_cuestionarios() {
        $sql = 'select * from tipo_cuestionarios order by cve_tipo_cuestionario;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_tipo_cuestionario($cve_tipo_cuestionario) {
        $sql = 'select * from tipo_cuestionarios where cve_tipo_cuestionario = ?;';
        $query = $this->db->query($sql, array($cve_tipo_cuestionario));
        return $query->row_array();
    }

    public function guardar($data, $cve_tipo_cuestionario)
    {
        if ($cve_tipo_cuestionario) {
            $this->db->where('cve_tipo_cuestionario', $cve_tipo_cuestionario);
            $result = $this->db->update('tipo_cuestionarios', $data);
        } else {
            $result = $this->db->insert('tipo_cuestionarios', $data);
        }
        return $result;
    }

    public function eliminar($cve_tipo_cuestionario)
    {
        $this->db->where('cve_tipo_cuestionario', $cve_tipo_cuestionario);
        $result = $this->db->delete('tipo_cuestionarios');
        return $result;
    }

}
