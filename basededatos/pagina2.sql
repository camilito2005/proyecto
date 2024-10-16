--
-- PostgreSQL database dump
--

-- Dumped from database version 9.5.25
-- Dumped by pg_dump version 9.5.25

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: cargo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cargo (
    id integer NOT NULL PRIMARY KEY,
    descripcion character varying(255) NOT NULL
);


ALTER TABLE public.cargo OWNER TO postgres;

--
-- Name: cargo_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.cargo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER TABLE public.cargo_id_seq OWNER TO postgres;

--
-- Name: cargo_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.cargo_id_seq OWNED BY public.cargo.id;

--
-- Name: categorias; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categorias (
    id integer NOT NULL PRIMARY KEY,
    categoria_producto character varying(100) NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL,
    fecha_actualizacion timestamp without time zone NOT NULL
);


ALTER TABLE public.categorias OWNER TO postgres;

--
-- Name: categorias_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.categorias_id_seq OWNER TO postgres;

--
-- Name: categorias_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;

--
-- Name: password_reset; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset (
    id integer NOT NULL PRIMARY KEY,
    correo text NOT NULL,
    token text NOT NULL,
    expires_at timestamp without time zone NOT NULL,
    created_at timestamp without time zone DEFAULT now()
);

ALTER TABLE public.password_reset OWNER TO postgres;

--
-- Name: password_resets_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.password_resets_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER TABLE public.password_resets_id_seq OWNER TO postgres;

--
-- Name: password_resets_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.password_resets_id_seq OWNED BY public.password_reset.id;

--
-- Name: productos; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.productos (
    id integer NOT NULL PRIMARY KEY,
    nombre character varying(100) NOT NULL,
    descripcion character varying(100) NOT NULL,
    precio numeric(10,2) NOT NULL,
    categoria character varying(100),
    stock integer NOT NULL,
    imagen character varying(255) NOT NULL,
    fecha_creacion text NOT NULL,
    fecha_actualizacion timestamp without time zone
);

ALTER TABLE public.productos OWNER TO postgres;

--
-- Name: productos_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.productos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER TABLE public.productos_id_seq OWNER TO postgres;

--
-- Name: productos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.productos_id_seq OWNED BY public.productos.id;

--
-- Name: usuarios; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.usuarios (
    id integer NOT NULL PRIMARY KEY,
    dni text NOT NULL,
    nombre text NOT NULL,
    apellido text NOT NULL,
    telefono bigint NOT NULL,
    direccion text NOT NULL,
    correo text NOT NULL,
    "contraseña" text NOT NULL,
    cargo_id integer, -- Nueva columna para roles
    CONSTRAINT fk_usuarios_cargo FOREIGN KEY (cargo_id) REFERENCES public.cargo (id)  -- Relación con 'cargo'
);

ALTER TABLE public.usuarios OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;

ALTER TABLE public.usuarios_id_seq OWNER TO postgres;

--
-- Name: usuarios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;


-- 
-- Datos preexistentes: 'cargo'
-- 

COPY public.cargo (id, descripcion) FROM stdin;
1	Administrador
2	Vendedor
3	Cliente
\.

-- 
-- Datos preexistentes: 'usuarios'
-- 

COPY public.usuarios (id, dni, nombre, apellido, telefono, direccion, correo, "contraseña", cargo_id) FROM stdin;
1	1234	camilo	marrugo	19003	la boquilla	c@gmail.com	12345	1
21	34213432	camilo	marrugo	1900373	la boquilla	12345@gmail.com	camilo2005	1
\.

--
-- Name: cargo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cargo_id_seq', 3, true);


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 21, true);


--
-- Name: productos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.productos_id_seq', 42, true);


--
-- Data para 'password_reset'
--

COPY public.password_reset (id, correo, token, expires_at, created_at) FROM stdin;
1	marrugobarrioscamilo2005@gmail.com	40767fdbd889d3b30127d9a705213f54b46f3a238e3103d28e99baaaccea9491	2024-09-04 00:16:01	2024-09-03 16:16:01.613436
2	jessimarrugo2000@gmail.com	6183a9162316bee52e351d958bf7f8ec0d0a56387e59672a81689422bdad1cdd	2024-09-04 00:17:17	2024-09-03 16:17:17.255226
3	marrugobarrioscamilo2005@gmail.com	f3ae3e2e56ef0bfc5b53f469befa4092c3d284fe53e0277fb5877474ab1b64f8	2024-09-04 00:34:25	2024-09-03 16:34:25.854905
4	marrugobarrioscamilo2005@gmail.com	ec3ec14d4e39e5f600f0a72d48ddb366699c1d79a4f037ce28064a278c4e794e	2024-09-04 00:43:44	2024-09-03 16:43:44.402404
5	marrugobarrioscamilo2005@gmail.com	9f067cfcd06567665a3c0ea52cb3020682c0265fb745b9ac285001528a0c1e6b	2024-09-04 17:07:02	2024-09-04 09:07:02.539938
\.

--
-- Name: password_resets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.password_resets_id_seq', 5, true);


--
-- Data para 'productos'
--

COPY public.productos (id, nombre, descripcion, precio, categoria, stock, imagen, fecha
