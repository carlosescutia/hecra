DROP VIEW IF EXISTS calidad_secciones;
DROP VIEW IF EXISTS calidad_subsecciones;
DROP VIEW IF EXISTS datos_calidad_indicadores;
DROP VIEW IF EXISTS promedio_respuestas_calidad;
DROP VIEW IF EXISTS respuestas_calidad;

DROP TABLE IF EXISTS cuestionarios;
CREATE TABLE cuestionarios (
    cve_cuestionario serial,
    nom_cuestionario text,
    nom_corto_cuestionario text
);

DROP TABLE IF EXISTS secciones;
CREATE TABLE secciones (
    cve_seccion serial,
    cve_cuestionario integer,
    num_seccion integer,
    nom_seccion text
);

DROP TABLE IF EXISTS subsecciones;
CREATE TABLE subsecciones (
    cve_subseccion serial,
    cve_seccion integer,
    num_subseccion integer,
    nom_subseccion text,
    peso numeric(5,3)
);

DROP TABLE IF EXISTS tipo_preguntas;
CREATE TABLE tipo_preguntas (
    cve_tipo_pregunta serial,
    nom_tipo_pregunta text
);

DROP TABLE IF EXISTS preguntas;
CREATE TABLE preguntas (
    cve_pregunta serial,
    cve_tipo_pregunta integer,
    cve_subseccion integer,
    num_pregunta integer,
    texto_pregunta text,
    responde text,
    guia text
);

DROP TABLE IF EXISTS valores_posibles;
CREATE TABLE valores_posibles (
    cve_valor_posible serial,
    cve_pregunta integer,
    num_valor_posible integer,
    texto_valor_posible text,
    valor_posible text
);

DROP TABLE IF EXISTS subpreguntas;
CREATE TABLE subpreguntas (
    cve_subpregunta serial,
    cve_pregunta integer,
    num_subpregunta integer,
    texto_subpregunta text
);

DROP TABLE IF EXISTS subvalores_posibles;
CREATE TABLE subvalores_posibles (
    cve_subvalor_posible serial,
    cve_subpregunta integer,
    num_subvalor_posible integer,
    texto_subvalor_posible text,
    subvalor_posible text
);

DROP TABLE IF EXISTS periodos;
CREATE TABLE periodos (
    cve_periodo serial,
    cve_dependencia integer,
    nom_periodo text,
    fecha_ini date,
    fecha_fin date,
    activo integer
);

DROP TABLE IF EXISTS dependencias;
CREATE TABLE dependencias (
    cve_dependencia serial,
    nom_dependencia text
);

DROP TABLE IF EXISTS informantes;
CREATE TABLE informantes (
    cve_informante serial,
    cve_dependencia integer,
    nom_informante text,
    departamento text,
    cargo text,
    email text,
    telefono text
);

DROP TABLE IF EXISTS cuestionarios_contestados;
CREATE TABLE cuestionarios_contestados (
    cve_cuestionario_contestado serial,
    cve_cuestionario integer,
    cve_periodo integer,
    nombre text,
    objetivo text
);

DROP TABLE IF EXISTS indicadores_calidad;
CREATE TABLE indicadores_calidad (
    cve_indicador_calidad serial,
    cve_subseccion integer,
    num_indicador_calidad integer,
    nom_indicador_calidad text,
    cve_pregunta integer,
    cve_subpregunta integer,
    valor_maximo integer,
    peso numeric(5,3)
);

DROP TABLE IF EXISTS indicador_calidad_valor_grafico;
CREATE TABLE indicador_calidad_valor_grafico (
    cve_indicador_calidad integer,
    valor integer,
    valor_grafico integer
);

DROP TABLE IF EXISTS respuestas;
CREATE TABLE respuestas (
    cve_cuestionario_contestado integer,
    cve_pregunta integer,
    cve_subpregunta integer,
    valor text
);

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    cve_usuario serial, 
    cve_dependencia integer,
    cve_rol text,
    nom_usuario text,
    usuario text,
    password text,
    activo integer
);

DROP TABLE IF EXISTS roles;
CREATE TABLE roles (
    cve_rol text,
    nom_rol text
);

DROP TABLE IF EXISTS opciones_sistema;
CREATE TABLE opciones_sistema (
    cve_opcion serial,
    cod_opcion text,
    nom_opcion text
);

DROP TABLE IF EXISTS accesos_sistema;
CREATE TABLE accesos_sistema (
    cve_acceso serial,
    cve_rol text,
    cod_opcion text
);

DROP TABLE IF EXISTS bitacora;
CREATE TABLE bitacora (
    cve_evento serial,
    fecha date,
    hora time,
    origen text,
    usuario text,
    nom_usuario text,
    nom_dependencia text,
    accion text,
    entidad text,
    valor text
);

/*
Vista respuestas_calidad
---------------------------------
Respuestas que corresponden a indicadores de calidad (o sea, las respuestas que cuentan para la evaluación), agregando: periodo, seccion, subseccion, pregunta, subpregunta, cuestionario_contestado.
*/
CREATE VIEW respuestas_calidad AS
SELECT 
    p.cve_periodo, ss.cve_seccion, ss.cve_subseccion, r.cve_pregunta, r.cve_subpregunta, cc.cve_cuestionario_contestado, r.valor, r.valor2 
FROM 
    respuestas r
    inner join indicadores_calidad ic on r.cve_pregunta = ic.cve_pregunta and r.cve_subpregunta IS NOT DISTINCT FROM ic.cve_subpregunta
    left join subsecciones ss on ic.cve_subseccion = ss.cve_subseccion 
    left join cuestionarios_contestados cc on r.cve_cuestionario_contestado = cc.cve_cuestionario_contestado
    left join periodos p on cc.cve_periodo = p.cve_periodo ;


/*
Vista promedio_respuestas_calidad
---------------------------------
Promedio de respuestas que corresponden a indicadores de calidad (o sea, las respuestas que cuentan para la evaluación), agregando: periodo, subseccion padre de la pregunta, pregunta, subpregunta, indicador de calidad. Se agrupa por periodo, subseccion, pregunta, subpregunta y nombre de indicador de calidad.
*/
CREATE VIEW promedio_respuestas_calidad AS
SELECT 
    p.cve_periodo, ss.cve_seccion, ss.cve_subseccion, left(ss.nom_subseccion, 20) as nom_subseccion, r.cve_pregunta, r.cve_subpregunta, ic.cve_indicador_calidad, left(ic.nom_indicador_calidad, 25) as nom_indicador_calidad, avg(r.valor::float) as valor, avg(r.valor2::float) as valor2
FROM 
    respuestas r 
    inner join indicadores_calidad ic on r.cve_pregunta = ic.cve_pregunta and r.cve_subpregunta IS NOT DISTINCT FROM ic.cve_subpregunta 
    left join subsecciones ss on ic.cve_subseccion = ss.cve_subseccion 
    left join cuestionarios_contestados cc on r.cve_cuestionario_contestado = cc.cve_cuestionario_contestado 
    left join periodos p on cc.cve_periodo = p.cve_periodo 
GROUP BY 
    p.cve_periodo, ss.cve_seccion, ss.cve_subseccion, ss.nom_subseccion, r.cve_pregunta, r.cve_subpregunta, ic.cve_indicador_calidad, ic.nom_indicador_calidad ;


/*
Vista datos_calidad_indicadores
-------------------------------
Se obtienen los demás valores para el cálculo del dato de calidad de la sección: promedio de respuestas (obtenido de la vista promedio_respuestas_calidad), valor_grafico (para generar gráficos de calidad de las secciones), valor_max_sna (valor máximo si no aplica), peso, valor_ryp (valor reescalado y ponderado).
*/
CREATE VIEW datos_calidad_indicadores AS
SELECT 
    prc.cve_periodo, prc.cve_seccion, prc.cve_subseccion, prc.nom_subseccion, prc.cve_indicador_calidad, prc.nom_indicador_calidad, prc.valor, prc.valor2, icvg.valor_grafico, (case when prc.valor is null then 0 else ic.valor_maximo end) as valor_max_sna, ic.peso, (case when prc.valor is null then 0 else (prc.valor / ic.valor_maximo) end) as valor_ryp 
FROM 
    promedio_respuestas_calidad prc 
    inner join indicadores_calidad ic on prc.cve_pregunta = ic.cve_pregunta and prc.cve_subpregunta IS NOT DISTINCT FROM ic.cve_subpregunta 
    left join indicador_calidad_valor_grafico icvg on ic.cve_indicador_calidad = icvg.cve_indicador_calidad and prc.valor = icvg.valor ;


/*
Vista calidad_subsecciones
--------------------------------
Se obtienen peso y valores reescalados y ponderados por subseccion.
*/
CREATE VIEW calidad_subsecciones AS
SELECT 
    dci.cve_periodo, dci.cve_seccion, dci.cve_subseccion, dci.nom_subseccion, max(ss.peso) as peso, sum( dci.peso * dci.valor_ryp) as valor_ryp 
FROM 
    datos_calidad_indicadores dci 
    left join subsecciones ss on dci.cve_subseccion = ss.cve_subseccion 
GROUP BY 
    dci.cve_periodo, dci.cve_seccion, dci.cve_subseccion, dci.nom_subseccion ;


/*
Vista calidad_secciones
-----------------------
Se obtiene el dato de calidad por seccion.
*/
CREATE VIEW calidad_secciones AS
SELECT
    css.cve_periodo, css.cve_seccion, sum(css.peso * css.valor_ryp) as calidad_seccion
FROM
    calidad_subsecciones css
GROUP BY
    css.cve_periodo, css.cve_seccion ;
