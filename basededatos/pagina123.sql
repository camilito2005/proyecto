PGDMP                         |            pagina1    9.5.25    15.2     X	           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            Y	           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            Z	           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            [	           1262    81162406    pagina1    DATABASE     i   CREATE DATABASE pagina1 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'C';
    DROP DATABASE pagina1;
                postgres    false                        2615    2200    public    SCHEMA     2   -- *not* creating schema, since initdb creates it
 2   -- *not* dropping schema, since initdb creates it
                postgres    false            \	           0    0    SCHEMA public    ACL     Q   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT ALL ON SCHEMA public TO PUBLIC;
                   postgres    false    6            �            1259    81162409 
   categorias    TABLE     �   CREATE TABLE public.categorias (
    id integer NOT NULL,
    categoria_producto character varying(100) NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL,
    fecha_actualizacion timestamp without time zone NOT NULL
);
    DROP TABLE public.categorias;
       public            postgres    false    6            �            1259    81162407    categorias_id_seq    SEQUENCE     z   CREATE SEQUENCE public.categorias_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.categorias_id_seq;
       public          postgres    false    182    6            ]	           0    0    categorias_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.categorias_id_seq OWNED BY public.categorias.id;
          public          postgres    false    181            �            1259    81162417 	   productos    TABLE     �  CREATE TABLE public.productos (
    id integer NOT NULL,
    nombre character varying(100) NOT NULL,
    descripcion character varying(100) NOT NULL,
    precio numeric(10,2) NOT NULL,
    categoria character varying(100) NOT NULL,
    stock integer NOT NULL,
    imagen character varying(255) NOT NULL,
    fecha_creacion timestamp without time zone NOT NULL,
    fecha_actualizacion timestamp without time zone NOT NULL
);
    DROP TABLE public.productos;
       public            postgres    false    6            �            1259    81162415    productos_id_seq    SEQUENCE     y   CREATE SEQUENCE public.productos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.productos_id_seq;
       public          postgres    false    6    184            ^	           0    0    productos_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.productos_id_seq OWNED BY public.productos.id;
          public          postgres    false    183            �            1259    81162428    usuarios    TABLE     x  CREATE TABLE public.usuarios (
    id integer NOT NULL,
    dni character varying(100) NOT NULL,
    nombre character varying(100) NOT NULL,
    apellido character varying(100) NOT NULL,
    telefono character varying(100) NOT NULL,
    direccion character varying(100) NOT NULL,
    correo character varying(100) NOT NULL,
    "contraseña" character varying(50) NOT NULL
);
    DROP TABLE public.usuarios;
       public            postgres    false    6            �            1259    81162426    usuarios_id_seq    SEQUENCE     x   CREATE SEQUENCE public.usuarios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.usuarios_id_seq;
       public          postgres    false    6    186            _	           0    0    usuarios_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.usuarios_id_seq OWNED BY public.usuarios.id;
          public          postgres    false    185            �           2604    81162412    categorias id    DEFAULT     n   ALTER TABLE ONLY public.categorias ALTER COLUMN id SET DEFAULT nextval('public.categorias_id_seq'::regclass);
 <   ALTER TABLE public.categorias ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    181    182    182            �           2604    81162420    productos id    DEFAULT     l   ALTER TABLE ONLY public.productos ALTER COLUMN id SET DEFAULT nextval('public.productos_id_seq'::regclass);
 ;   ALTER TABLE public.productos ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    183    184    184            �           2604    81162431    usuarios id    DEFAULT     j   ALTER TABLE ONLY public.usuarios ALTER COLUMN id SET DEFAULT nextval('public.usuarios_id_seq'::regclass);
 :   ALTER TABLE public.usuarios ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    186    185    186            Q	          0    81162409 
   categorias 
   TABLE DATA           a   COPY public.categorias (id, categoria_producto, fecha_creacion, fecha_actualizacion) FROM stdin;
    public          postgres    false    182   -       S	          0    81162417 	   productos 
   TABLE DATA           �   COPY public.productos (id, nombre, descripcion, precio, categoria, stock, imagen, fecha_creacion, fecha_actualizacion) FROM stdin;
    public          postgres    false    184   J       U	          0    81162428    usuarios 
   TABLE DATA           i   COPY public.usuarios (id, dni, nombre, apellido, telefono, direccion, correo, "contraseña") FROM stdin;
    public          postgres    false    186   g       `	           0    0    categorias_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.categorias_id_seq', 1, false);
          public          postgres    false    181            a	           0    0    productos_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.productos_id_seq', 1, false);
          public          postgres    false    183            b	           0    0    usuarios_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.usuarios_id_seq', 17, true);
          public          postgres    false    185            �           2606    81162414    categorias categorias_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.categorias
    ADD CONSTRAINT categorias_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.categorias DROP CONSTRAINT categorias_pkey;
       public            postgres    false    182            �           2606    81162425    productos productos_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.productos
    ADD CONSTRAINT productos_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.productos DROP CONSTRAINT productos_pkey;
       public            postgres    false    184            �           2606    81162436    usuarios usuarios_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.usuarios
    ADD CONSTRAINT usuarios_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.usuarios DROP CONSTRAINT usuarios_pkey;
       public            postgres    false    186            Q	      x������ � �      S	      x������ � �      U	   �   x���]��0��Sx�t�o{_Z@�������"�M\#�2����~�@�d�kA
�Ԯ�<4&���76�ڷ�$��%gY\B�C�qhL���o.1��z�'�.���M_��pfc�w_;g��6� 	�J�m
(ON�FYn��t<�{���\�
���5�s�W�+k��4�a�0{'L�%ͱ^�;K�,�xn��8>��s�W�!.�J�[j�?��(�X�Ay��_TY���$���Wr�u��Y�S_     