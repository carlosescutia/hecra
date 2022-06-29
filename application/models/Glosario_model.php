<?php
class Glosario_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_glosario() {
        $sql = 'select g.* from glosario g ;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_terminos() {
        $sql = 'select * from glosario order by cve_termino ;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_termino($cve_termino) {
        $sql = 'select * from glosario where cve_termino = ?;';
        $query = $this->db->query($sql, array($cve_termino));
        return $query->row_array();
    }

    public function guardar($data, $cve_termino)
    {
        if ($cve_termino) {
            $this->db->where('cve_termino', $cve_termino);
            $result = $this->db->update('glosario', $data);
        } else {
            $result = $this->db->insert('glosario', $data);
        }
        return $result;
    }

    public function eliminar($cve_termino)
    {
        $this->db->where('cve_termino', $cve_termino);
        $result = $this->db->delete('glosario');
        return $result;
    }

}

