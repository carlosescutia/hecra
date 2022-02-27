DROP TABLE IF EXISTS cuestionarios;
CREATE TABLE cuestionarios (
    cve_cuestionario serial,
    nom_cuestionario text,
    nom_corto_cuestionario text
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
    cve_cuestionario integer,
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
    cve_cuestionario integer,
    num_subpregunta integer,
    texto_subpregunta text,
    responde text,
    guia text
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
    cve_periodo integer
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
