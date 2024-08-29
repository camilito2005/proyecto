PGDMP         7                |            pagina    9.5.25    15.2 !    a	           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            b	           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            c	           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            d	           1262    81154127    pagina    DATABASE     h   CREATE DATABASE pagina WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'C';
    DROP DATABASE pagina;
                postgres    false                        2615    2200    public    SCHEMA     2   -- *not* creating schema, since initdb creates it
 2   -- *not* dropping schema, since initdb creates it
                postgres    false            e	           0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   postgres    false    7            �            1259    81162461    cargo    TABLE     h   CREATE TABLE public.cargo (
    id integer NOT NULL,
    descripcion character varying(255) NOT NULL
);
    DROP TABLE public.cargo;
       public            postgres    false    7            �            1259    81162459    cargo_id_seq    SEQUENCE     u   CREATE SEQUENCE public.cargo_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.cargo_id_seq;
       public          postgres    false    188    7            f	           0    0    cargo_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.cargo_id_seq OWNED BY public.cargo.id;
          public          postgres    false    187            �            1259    81162319 
   categorias    TABLE     �   CREATE TABLE public.categorias (
    id integer NOT NULL,
    categoria_producto character varying(100) NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL,
    fecha_actualizacion timestamp without time zone NOT NULL
);
    DROP TABLE public.categorias;
       public            postgres    false    7            �            1259    81162317    categorias_id_seq    SEQUENCE     z   CREATE SEQUENCE public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categorias_id_seq;
       public          postgres    false    7    184            g	           0    0    categorias_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;
          public          postgres    false    183            �            1259    81162327 	   productos    TABLE     �  CREATE TABLE public.productos (
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
    DROP TABLE public.productos;
       public            postgres    false    7            �            1259    81162325    productos_id_seq    SEQUENCE     y   CREATE SEQUENCE public.productos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.productos_id_seq;
       public          postgres    false    7    186            h	           0    0    productos_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.productos_id_seq OWNED BY public.productos.id;
          public          postgres    false    185            �            1259    81162308    usuarios    TABLE     �   CREATE TABLE public.usuarios (
    id integer NOT NULL,
    dni text NOT NULL,
    nombre text NOT NULL,
    apellido text NOT NULL,
    telefono bigint NOT NULL,
    direccion text NOT NULL,
    correo text NOT NULL,
    "contraseña" text NOT NULL
);
    DROP TABLE public.usuarios;
       public            postgres    false    7            �            1259    81162306    usuarios_id_seq    SEQUENCE     x   CREATE SEQUENCE public.usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public          postgres    false    182    7            i	           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
          public          postgres    false    181            �           2604    81162464    cargo id    DEFAULT     d   ALTER TABLE ONLY public.cargo ALTER COLUMN id SET DEFAULT nextval('public.cargo_id_seq'::regclass);
 7   ALTER TABLE public.cargo ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    187    188    188            �           2604    81162456    categorias id    DEFAULT     n   ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);
 <   ALTER TABLE public.categorias ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    184    183    184            �           2604    81162457    productos id    DEFAULT     l   ALTER TABLE ONLY public.productos ALTER COLUMN id SET DEFAULT nextval('public.productos_id_seq'::regclass);
 ;   ALTER TABLE public.productos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    185    186    186            �           2604    81162458    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    181    182    182            ^	          0    81162461    cargo 
   TABLE DATA           0   COPY public.cargo (id, descripcion) FROM stdin;
    public          postgres    false    188   =#       Z	          0    81162319 
   categorias 
   TABLE DATA           a   COPY public.categorias (id, categoria_producto, fecha_creacion, fecha_actualizacion) FROM stdin;
    public          postgres    false    184   Z#       \	          0    81162327 	   productos 
   TABLE DATA           �   COPY public.productos (id, nombre, descripcion, precio, categoria, stock, imagen, fecha_creacion, fecha_actualizacion) FROM stdin;
    public          postgres    false    186   w#       X	          0    81162308    usuarios 
   TABLE DATA           i   COPY public.usuarios (id, dni, nombre, apellido, telefono, direccion, correo, "contraseña") FROM stdin;
    public          postgres    false    182   <$       j	           0    0    cargo_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.cargo_id_seq', 1, false);
          public          postgres    false    187            k	           0    0    categorias_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.categorias_id_seq', 1, false);
          public          postgres    false    183            l	           0    0    productos_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.productos_id_seq', 29, true);
          public          postgres    false    185            m	           0    0    usuarios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_id_seq', 20, true);
          public          postgres    false    181            �           2606    81162466    cargo cargo_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.cargo
    ADD CONSTRAINT cargo_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.cargo DROP CONSTRAINT cargo_pkey;
       public            postgres    false    188            �           2606    81162324    categorias categorias_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categorias DROP CONSTRAINT categorias_pkey;
       public            postgres    false    184            �           2606    81162335    productos productos_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_pkey;
       public            postgres    false    186            ^	      x������ � �      Z	      x������ � �      \	   �   x�u���0��ۧ���
g�
z'iJ�C��OoU�@p�f6���r��.E�2�F�Mti������mO�����ː�So%\��8�M��G�%h��]�%ົ��b�%��/q��Ώ:��3v�RY���"4�o@A��r˰l98[�vC���ꛜ��������C.)!��j^      X	   F   x�3�4426�LN������M,**M��4�40067��ITH�/,���I�LvH�M���K���1����� k�%     