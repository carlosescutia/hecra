<?php
class Evaluacion_calidad_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_secciones_calidad_cuestionario($cve_cuestionario) {
        $sql = 'SELECT s.cve_cuestionario, s.cve_seccion, s.num_seccion, s.nom_seccion FROM indicadores_calidad ic left join subsecciones ss on ic.cve_subseccion = ss.cve_subseccion left join secciones s on ss.cve_seccion = s.cve_seccion WHERE cve_cuestionario = ? GROUP BY s.cve_cuestionario, s.cve_seccion, s.num_seccion, s.nom_seccion ORDER BY s.num_seccion';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->result_array();
    }

    public function get_subsecciones_calidad_cuestionario($cve_cuestionario) {
        $sql = 'SELECT s.cve_cuestionario, s.cve_seccion, ic.cve_subseccion, ss.num_subseccion, ss.nom_subseccion FROM indicadores_calidad ic left join subsecciones ss on ic.cve_subseccion = ss.cve_subseccion left join secciones s on ss.cve_seccion = s.cve_seccion WHERE cve_cuestionario = ? GROUP BY s.cve_cuestionario, s.cve_seccion, ic.cve_subseccion, ss.num_subseccion, ss.nom_subseccion ORDER BY s.cve_seccion, ss.num_subseccion ';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->result_array();
    }

    public function get_indicadores_calidad_cuestionario($cve_cuestionario) {
        $sql = 'SELECT s.cve_cuestionario, ic.cve_subseccion, ic.cve_indicador_calidad, ic.num_indicador_calidad, ic.nom_indicador_calidad FROM indicadores_calidad ic left join subsecciones ss on ic.cve_subseccion = ss.cve_subseccion left join secciones s on ss.cve_seccion = s.cve_seccion WHERE s.cve_cuestionario = ? GROUP BY s.cve_cuestionario, ic.cve_subseccion, ic.cve_indicador_calidad, ic.num_indicador_calidad, ic.nom_indicador_calidad ORDER BY ic.num_indicador_calidad';
        $query = $this->db->query($sql, array($cve_cuestionario));
        return $query->result_array();
    }

    public function get_calidad_global_secciones_rraa_periodo($cve_periodo) {
        $sql = "select dci.cve_periodo, dci.cve_seccion, sum(valor_max_sna) as sum_valor_max_sna, sum(dci.valor) as sum_valor,  (case when sum(valor) = 0 then 0 else (sum(valor) * 100) / sum(valor_max_sna) end) as indicador, (case when sum(valor) = 0 then 0 when ((sum(valor) * 100) / sum(valor_max_sna)) < 25 then 0 when ((sum(valor) * 100) / sum(valor_max_sna)) < 50 then 1 when ((sum(valor) * 100) / sum(valor_max_sna)) < 70 then 2 when ((sum(valor) * 100) / sum(valor_max_sna)) < 80 then 3 when ((sum(valor) * 100) / sum(valor_max_sna)) < 90 then 4 when ((sum(valor) * 100) / sum(valor_max_sna)) >= 90 then 5 end) as indicador_calidad_seccion, count(*) filter (where valor=0) as sin_info, count(*) filter (where valor=1) as alertas from datos_calidad_indicadores dci where dci.cve_seccion in (2,3,4) and dci.cve_periodo = '118' group by dci.cve_periodo, dci.cve_seccion ";
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

    public function get_valores_grafico_periodo($cve_periodo) {
        $sql = 'select cve_seccion, cve_subseccion, nom_subseccion, avg(valor_grafico) from datos_calidad_indicadores where cve_periodo = ? group by cve_seccion, cve_subseccion, nom_subseccion order by cve_seccion, cve_subseccion';
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

    public function get_indice_calidad_global_rraa_periodo($cve_periodo) {
        $sql = "select sum(calidad_seccion * 0.25) as valor from calidad_secciones where cve_seccion in (2,3,4) and cve_periodo = ?";
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->row_array();
    }

    public function get_datos_calidad_indicadores_pe_periodo($cve_periodo) {
        $sql = "select cve_subseccion, nom_subseccion, cve_indicador_calidad, nom_indicador_calidad, peso, valor, valor_ryp from datos_calidad_indicadores where cve_periodo = ? and cve_seccion = 6 order by cve_subseccion, cve_indicador_calidad";
        $query = $this->db->query($sql, array($cve_periodo));
        return $query->result_array();
    }

}
