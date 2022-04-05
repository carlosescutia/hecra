<?php
class Subvalores_posibles_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_subvalores_posibles_subpregunta($cve_subpregunta) {
        $sql = 'select * from subvalores_posibles where cve_subpregunta = ? order by num_subvalor_posible;';
        $query = $this->db->query($sql, array($cve_subpregunta));
        return $query->result_array();
    }

    public function get_subvalores_posibles_cuestionario($cve_cuestionario) {
        $sql = 'select svp.* from subvalores_posibles svp left join subpreguntas sp on svp.cve_subpregunta = sp.cve_subpregunta left join preguntas p on sp.cve_pregunta = p.cve_pregunta left join cuestionarios c on p.cve_cuestionario = c.cve_cuestionario where c.cve_cuestionario = ? order by svp.cve_subpregunta, svp.num_subvalor_posible;';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->result_array();
    }

    public function get_subvalor_posible($cve_subvalor_posible) {
        $sql = 'select * from subvalores_posibles where cve_subvalor_posible = ?;';
        $query = $this->db->query($sql, array($cve_subvalor_posible));
        return $query->row_array();
    }

    public function guardar($data, $cve_subvalor_posible)
    {
        if ($cve_subvalor_posible) {
            $this->db->where('cve_subvalor_posible', $cve_subvalor_posible);
            $result = $this->db->update('subvalores_posibles', $data);
        } else {
            $result = $this->db->insert('subvalores_posibles', $data);
        }
        return $result;
    }

    public function eliminar($cve_subvalor_posible)
    {
        $this->db->where('cve_subvalor_posible', $cve_subvalor_posible);
        $result = $this->db->delete('subvalores_posibles');
        return $result;
    }

}
