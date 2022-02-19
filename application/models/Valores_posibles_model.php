<?php
class Valores_posibles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_valores_posibles_pregunta($cve_pregunta) {
        $sql = 'select * from valores_posibles where cve_pregunta = ? order by num_valor_posible;';
        $query = $this->db->query($sql, array($cve_pregunta));
        return $query->result_array();
    }

    public function get_valor_posible($cve_valor_posible) {
        $sql = 'select * from valores_posibles where cve_valor_posible = ?;';
        $query = $this->db->query($sql, array($cve_valor_posible));
        return $query->row_array();
    }

    public function guardar($data, $cve_valor_posible)
    {
        if ($cve_valor_posible) {
            $this->db->where('cve_valor_posible', $cve_valor_posible);
            $result = $this->db->update('valores_posibles', $data);
        } else {
            $result = $this->db->insert('valores_posibles', $data);
        }
        return $result;
    }

    public function eliminar($cve_valor_posible)
    {
        $this->db->where('cve_valor_posible', $cve_valor_posible);
        $result = $this->db->delete('valores_posibles');
        return $result;
    }

}
