<?php
class Cuestionarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_cuestionarios() {
        $sql = 'select * from cuestionarios order by cve_cuestionario;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_cuestionario($cve_cuestionario) {
        $sql = 'select * from cuestionarios where cve_cuestionario = ?;';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->row_array();
    }

    public function guardar($data, $cve_cuestionario)
    {
        if ($cve_cuestionario) {
            $this->db->where('cve_cuestionario', $cve_cuestionario);
            $result = $this->db->update('cuestionarios', $data);
        } else {
            $result = $this->db->insert('cuestionarios', $data);
        }
        return $result;
    }

    public function eliminar($cve_cuestionario)
    {
        $this->db->where('cve_cuestionario', $cve_cuestionario);
        $result = $this->db->delete('cuestionarios');
        return $result;
    }

}
