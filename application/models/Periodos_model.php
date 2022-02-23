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

    public function get_periodo($cve_periodo) {
        $sql = 'select p.*, d.nom_dependencia from periodos p left join dependencias d on p.cve_dependencia = d.cve_dependencia where p.cve_periodo = ?;';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->row_array();
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
