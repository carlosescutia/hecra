<?php
class Subsecciones_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_subsecciones_seccion($cve_seccion) {
        $sql = 'select ss.* from subsecciones ss where ss.cve_seccion = ? order by ss.num_subseccion;';
        $query = $this->db->query($sql, array($cve_seccion));
        return $query->result_array();
    }

    public function get_subsecciones_cuestionario($cve_cuestionario) {
        $sql = 'select ss.* from subsecciones ss left join secciones s on ss.cve_seccion = s.cve_seccion where s.cve_cuestionario = ? order by ss.num_subseccion;';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->result_array();
    }

    public function get_subseccion($cve_subseccion) {
        $sql = 'select ss.* from subsecciones ss where ss.cve_subseccion = ?;';
        $query = $this->db->query($sql, array($cve_subseccion));
        return $query->row_array();
    }

    public function guardar($data, $cve_subseccion)
    {
        if ($cve_subseccion) {
            $this->db->where('cve_subseccion', $cve_subseccion);
            $result = $this->db->update('subsecciones', $data);
        } else {
            $result = $this->db->insert('subsecciones', $data);
        }
        return $result;
    }

    public function eliminar($cve_subseccion)
    {
        $this->db->where('cve_subseccion', $cve_subseccion);
        $result = $this->db->delete('subsecciones');
        return $result;
    }

}
