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
    id integer NOT NULL,
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
    id integer NOT NULL,
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
-- Name: facturas; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.facturas (
    id integer NOT NULL,
    producto_id integer,
    stock integer NOT NULL,
    precio numeric(10,2) NOT NULL,
    total numeric(10,2) NOT NULL,
    fecha timestamp without time zone DEFAULT now(),
    cliente_correo character varying(255) NOT NULL
);


ALTER TABLE public.facturas OWNER TO postgres;

--
-- Name: facturas_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.facturas_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.facturas_id_seq OWNER TO postgres;

--
-- Name: facturas_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.facturas_id_seq OWNED BY public.facturas.id;


--
-- Name: password_reset; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset (
    id integer NOT NULL,
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
    id integer NOT NULL,
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
    id integer NOT NULL,
    dni text NOT NULL,
    nombre text NOT NULL,
    apellido text NOT NULL,
    telefono bigint NOT NULL,
    direccion text NOT NULL,
    correo text NOT NULL,
    "contraseña" text NOT NULL,
    fecha_ingreso date
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
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cargo ALTER COLUMN id SET DEFAULT nextval('public.cargo_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.facturas ALTER COLUMN id SET DEFAULT nextval('public.facturas_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset ALTER COLUMN id SET DEFAULT nextval('public.password_resets_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.productos ALTER COLUMN id SET DEFAULT nextval('public.productos_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);


--
-- Data for Name: cargo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cargo (id, descripcion) FROM stdin;
\.


--
-- Name: cargo_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.cargo_id_seq', 1, false);


--
-- Data for Name: categorias; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categorias (id, categoria_producto, fecha_creacion, fecha_actualizacion) FROM stdin;
\.


--
-- Name: categorias_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.categorias_id_seq', 1, false);


--
-- Data for Name: facturas; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.facturas (id, producto_id, stock, precio, total, fecha, cliente_correo) FROM stdin;
2	24	5	0.00	0.00	2024-09-18 11:12:43.269484	c@gmail.com
5	48	5	90000.00	450000.00	2024-09-18 11:50:15	c@gmail.com
6	48	5	90000.00	450000.00	2024-09-18 11:51:47	camilo@gmail.com
7	46	2	150000.00	300000.00	2024-09-18 11:52:28	camilo@gmail.com
8	48	5	90000.00	450000.00	2024-09-18 02:15:36	camilo@gmail.com
9	48	5	90000.00	450000.00	2024-09-18 02:16:29	camilo@gmail.com
10	48	1	90000.00	90000.00	2024-09-18 02:22:35	camilo@gmail.com
11	48	4	90000.00	360000.00	2024-09-18 02:43:51	camilo@gmail.com
\.


--
-- Name: facturas_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.facturas_id_seq', 11, true);


--
-- Data for Name: password_reset; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset (id, correo, token, expires_at, created_at) FROM stdin;
81	c@gmail.com	c1225e0d61b0e75d2250b8077988913224cd155afd143757ea76fa8b3c170b64	2024-09-18 00:03:36	2024-09-17 16:03:36.796267
82	c@gmail.com	97c459fcf39c07517efa2e42b137e36a0576853671e96e5f3ecc18bf45e2469e	2024-09-18 00:05:05	2024-09-17 16:05:05.851396
72	c@gmail.com	96a43968af69f78251100f082bab36ae775fd7b4508b29e1853d6f40fd8018da	2024-09-17 18:08:06	2024-09-17 10:08:06.372763
73	c@gmail.com	01b977fbe90955f97efe5e905125667aeeaba8396d15d173db0af6082c6201c0	2024-09-17 18:11:12	2024-09-17 10:11:12.192437
74	c@gmail.com	c8ea9c116915a34838f635b76977e626f2ade64bb3360bfd6079df4302bd65a9	2024-09-17 18:13:16	2024-09-17 10:13:16.761263
75	c@gmail.com	0c2cf4f9c66bd3cf25932bc2d0bf67be9513a3a527556517b657deb5ff8a82db	2024-09-17 18:14:57	2024-09-17 10:14:57.177743
78	c@gmail.com	217d8f03eaad6b16c9bfcd68032d7843c3046b404153b3fe6b887cde6dac2456	2024-09-17 18:54:23	2024-09-17 10:54:23.618618
79	c@gmail.com	e2455309e15a0c51d7dcf43b9d4b8446ee2e99f144dff8658a6e3edc018aef9f	2024-09-17 18:56:50	2024-09-17 10:56:50.215114
\.


--
-- Name: password_resets_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.password_resets_id_seq', 83, true);


--
-- Data for Name: productos; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.productos (id, nombre, descripcion, precio, categoria, stock, imagen, fecha_creacion, fecha_actualizacion) FROM stdin;
49	prueba	prueba	400000.00	\N	10	../../../ti/fotos/D_NQ_NP_643213-MCO77950837793_072024-O.webp		\N
24	zapatos	zapatos	100000.00	\N	6	../../ti/fotos/zapatos (1).jpeg	2024-12-08	\N
46	zapatos blancos	zapatos blancos	150000.00	\N	5	../../../ti/fotos/images.jpeg		\N
48	zapatos elegantes de prueba	prueba para la facturacion	90000.00	\N	60	../../../ti/fotos/zapatos-cab-prueba.webp		\N
\.


--
-- Name: productos_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.productos_id_seq', 49, true);


--
-- Data for Name: usuarios; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.usuarios (id, dni, nombre, apellido, telefono, direccion, correo, "contraseña", fecha_ingreso) FROM stdin;
32	104329	camilo	Marrugo	999	direccion	c@gmail.com	123456	\N
33	1043	camilo	Marrugo	999	direccion	camilo@gmail.com	camilo	\N
34	10	camilo	Marrugo	999	direccion	marrugo@gmail.com	marrugo	\N
\.


--
-- Name: usuarios_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.usuarios_id_seq', 34, true);


--
-- Name: cargo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cargo
    ADD CONSTRAINT cargo_pkey PRIMARY KEY (id);


--
-- Name: categorias_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);


--
-- Name: facturas_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.facturas
    ADD CONSTRAINT facturas_pkey PRIMARY KEY (id);


--
-- Name: password_resets_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset
    ADD CONSTRAINT password_resets_pkey PRIMARY KEY (id);


--
-- Name: productos_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);


--
-- Name: facturas_producto_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.facturas
    ADD CONSTRAINT facturas_producto_id_fkey FOREIGN KEY (producto_id) REFERENCES public.productos(id) ON DELETE CASCADE;


--
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

