<?php
class Cuestionarios_contestados_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_cuestionarios_contestados_dependencia($cve_dependencia, $cve_rol) {
        if ($cve_rol == 'adm' || $cve_rol == 'sup') {
            $cve_dependencia = '%';
        }
        $sql = "select cc.*, c.nom_cuestionario, c.nom_corto_cuestionario from cuestionarios_contestados cc left join cuestionarios c on cc.cve_cuestionario = c.cve_cuestionario left join periodos p on cc.cve_periodo = p.cve_periodo left join dependencias d on p.cve_dependencia = d.cve_dependencia where p.cve_dependencia::char LIKE ? order by c.nom_corto_cuestionario, cc.cve_cuestionario_contestado;";
        $query = $this->db->query($sql, array($cve_dependencia));
        return $query->result_array();
    }

    public function get_cuestionario_contestado($cve_cuestionario_contestado) {
        $sql = "select cc.*, c.nom_cuestionario, c.nom_corto_cuestionario, p.nom_periodo from cuestionarios_contestados cc left join cuestionarios c on cc.cve_cuestionario = c.cve_cuestionario left join periodos p on cc.cve_periodo = p.cve_periodo where cc.cve_cuestionario_contestado = ? ;";
        $query = $this->db->query($sql, array($cve_cuestionario_contestado));
        return $query->row_array();
    }

    public function get_semaforos_cuestionario_contestado($cve_cuestionario_contestado) {
        $sql = "select ss.cve_subseccion, (select count(*) from preguntas p where p.cve_subseccion = ss.cve_subseccion) as preguntas, (select count(distinct(r.cve_pregunta)) from respuestas r left join preguntas p on r.cve_pregunta = p.cve_pregunta where r.valor <> '' and p.cve_subseccion = ss.cve_subseccion ) as respuestas from subsecciones ss left join secciones s on ss.cve_seccion = s.cve_seccion left join cuestionarios c on s.cve_cuestionario = c.cve_cuestionario left join cuestionarios_contestados cc on c.cve_cuestionario = cc.cve_cuestionario where cc.cve_cuestionario_contestado = ? order by ss.cve_subseccion ;";
        $query = $this->db->query($sql, array($cve_cuestionario_contestado));
        return $query->result_array();
    }

    public function guardar($data, $cve_cuestionario_contestado)
    {
        if ($cve_cuestionario_contestado) {
            $this->db->where('cve_cuestionario_contestado', $cve_cuestionario_contestado);
            $result = $this->db->update('cuestionarios_contestados', $data);
        } else {
            $result = $this->db->insert('cuestionarios_contestados', $data);
        }
        return $result;
    }

    public function eliminar($cve_cuestionario_contestado)
    {
        $this->db->where('cve_cuestionario_contestado', $cve_cuestionario_contestado);
        $result = $this->db->delete('cuestionarios_contestados');
        return $result;
    }

}
