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

}
