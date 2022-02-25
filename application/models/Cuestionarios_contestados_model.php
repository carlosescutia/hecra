<?php
class Cuestionarios_contestados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_cuestionarios_contestados_dependencia($cve_dependencia, $cve_rol) {
        if ($cve_rol == 'adm' || $cve_rol == 'sup') {
            $cve_dependencia = '%';
        }
        $sql = "select cc.*, c.nom_cuestionario from cuestionarios_contestados cc left join cuestionarios c on cc.cve_cuestionario = c.cve_cuestionario left join periodos p on cc.cve_periodo = p.cve_periodo left join dependencias d on p.cve_dependencia = d.cve_dependencia where p.cve_dependencia::char LIKE ? order by cc.cve_cuestionario_contestado;";
        $query = $this->db->query($sql, array($cve_dependencia));
        return $query->result_array();
    }

}
