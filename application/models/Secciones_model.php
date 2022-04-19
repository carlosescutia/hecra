<?php
class Secciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_secciones_cuestionario($cve_cuestionario) {
        $sql = 'select s.* from secciones s where s.cve_cuestionario = ? order by s.num_seccion;';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->result_array();
    }

    public function get_seccion($cve_seccion) {
        $sql = 'select s.* from secciones s where s.cve_seccion = ?;';
        $query = $this->db->query($sql, array($cve_seccion));
        return $query->row_array();
    }

    public function guardar($data, $cve_seccion)
    {
        if ($cve_seccion) {
            $this->db->where('cve_seccion', $cve_seccion);
            $result = $this->db->update('secciones', $data);
        } else {
            $result = $this->db->insert('secciones', $data);
        }
        return $result;
    }

    public function eliminar($cve_seccion)
    {
        $this->db->where('cve_seccion', $cve_seccion);
        $result = $this->db->delete('secciones');
        return $result;
    }

}
