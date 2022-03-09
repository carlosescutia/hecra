<?php
class Informantes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_informantes() {
        $sql = 'select * from informantes order by cve_informante;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_informante_dependencia($cve_dependencia) {
        $sql = 'select * from informantes where cve_dependencia = ?;';
        $query = $this->db->query($sql, array($cve_dependencia));
        return $query->row_array();
    }

    public function guardar($data, $cve_informante)
    {
        if ($cve_informante) {
            $this->db->where('cve_informante', $cve_informante);
            $result = $this->db->update('informantes', $data);
        } else {
            $result = $this->db->insert('informantes', $data);
        }
        return $result;
    }

    public function eliminar($cve_informante)
    {
        $this->db->where('cve_informante', $cve_informante);
        $result = $this->db->delete('informantes');
        return $result;
    }

    public function eliminar_dependencia($cve_dependencia)
    {
        $this->db->where('cve_dependencia', $cve_dependencia);
        $result = $this->db->delete('informantes');
        return $result;
    }

}
