DROP TABLE IF EXISTS cuestionarios;
CREATE TABLE cuestionarios (
    cve_cuestionario serial,
    nom_cuestionario text
);

DROP TABLE IF EXISTS preguntas;
CREATE TABLE preguntas (
    cve_cuestionario integer,
    cve_pregunta serial,
    nom_pregunta text
);

DROP TABLE IF EXISTS valores_posibles;
CREATE TABLE valores_posibles (
    cve_pregunta integer,
    cve_valor serial,
    nom_valor text,
    valor integer
);

DROP TABLE IF EXISTS periodos;
CREATE TABLE periodos (
    cve_dependencia integer,
    cve_periodo serial,
    nom_periodo text,
    fecha date
);

DROP TABLE IF EXISTS dependencias;
CREATE TABLE dependencias (
    cve_dependencia serial,
    nom_dependencia text
);

DROP TABLE IF EXISTS respuestas;
CREATE TABLE respuestas (
    cve_periodo integer,
    cve_pregunta integer,
    valor integer
);

DROP TABLE IF EXISTS informantes;
CREATE TABLE informantes (
    cve_dependencia integer,
    cve_informante serial,
    nom_informante text,
    departamento text,
    cargo text,
    email text,
    telefono text
);

DROP TABLE IF EXISTS usuarios;
CREATE TABLE usuarios (
    cve_dependencia integer,
    cve_rol text,
    cve_usuario serial, 
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

DROP TABLE IF EXISTS accesos;
CREATE TABLE accesos (
    cve_acceso serial,
    nom_acceso text
);

DROP TABLE IF EXISTS accesos_rol;
CREATE TABLE accesos_rol (
    cve_acceso serial,
    cod_opcion text,
    cve_rol text
);

DROP TABLE IF EXISTS bitacora;
CREATE TABLE bitacora (
    cve_evento serial,
    fecha date,
    hora time,
    origen text,
    usuario text,
    usuario_nombre text,
    dependencia text,
    area text,
    accion text,
    entidad text,
    valor text
);
