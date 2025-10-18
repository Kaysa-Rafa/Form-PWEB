--
-- PostgreSQL database dump
--

-- Dumped from database version 17.4
-- Dumped by pg_dump version 17.4

-- Started on 2025-10-18 22:06:03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2 (class 3079 OID 17456)
-- Name: pgcrypto; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS pgcrypto WITH SCHEMA public;


--
-- TOC entry 4948 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION pgcrypto; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION pgcrypto IS 'cryptographic functions';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 221 (class 1259 OID 17615)
-- Name: minecraft_data; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.minecraft_data (
    id integer NOT NULL,
    username character varying(50),
    world_name character varying(100) NOT NULL,
    biome character varying(100) NOT NULL,
    seed character varying(100) NOT NULL,
    creation_date date DEFAULT CURRENT_DATE,
    foto character varying(255),
    tanda_tangan character varying(255)
);


ALTER TABLE public.minecraft_data OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 17614)
-- Name: minecraft_data_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.minecraft_data_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.minecraft_data_id_seq OWNER TO postgres;

--
-- TOC entry 4949 (class 0 OID 0)
-- Dependencies: 220
-- Name: minecraft_data_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.minecraft_data_id_seq OWNED BY public.minecraft_data.id;


--
-- TOC entry 219 (class 1259 OID 17606)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(50) NOT NULL,
    password character varying(255) NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 218 (class 1259 OID 17605)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 4950 (class 0 OID 0)
-- Dependencies: 218
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4785 (class 2604 OID 17618)
-- Name: minecraft_data id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.minecraft_data ALTER COLUMN id SET DEFAULT nextval('public.minecraft_data_id_seq'::regclass);


--
-- TOC entry 4784 (class 2604 OID 17609)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4942 (class 0 OID 17615)
-- Dependencies: 221
-- Data for Name: minecraft_data; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.minecraft_data (id, username, world_name, biome, seed, creation_date, foto, tanda_tangan) FROM stdin;
1	admin	kaysa	Overworld	1243464726362	2025-10-18	uploads/foto_1760795527_055dbed9.png	uploads/sign_1760795527_326f56c0.png
\.


--
-- TOC entry 4940 (class 0 OID 17606)
-- Dependencies: 219
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, password) FROM stdin;
1	admin	$2a$06$1c7rLHT2USKyyonYhHiKYuW61yfIBxtsZqd2GttYr8uSA34/7wCv2
\.


--
-- TOC entry 4951 (class 0 OID 0)
-- Dependencies: 220
-- Name: minecraft_data_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.minecraft_data_id_seq', 1, true);


--
-- TOC entry 4952 (class 0 OID 0)
-- Dependencies: 218
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 1, true);


--
-- TOC entry 4792 (class 2606 OID 17623)
-- Name: minecraft_data minecraft_data_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.minecraft_data
    ADD CONSTRAINT minecraft_data_pkey PRIMARY KEY (id);


--
-- TOC entry 4788 (class 2606 OID 17611)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4790 (class 2606 OID 17613)
-- Name: users users_username_key; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_key UNIQUE (username);


--
-- TOC entry 4793 (class 2606 OID 17624)
-- Name: minecraft_data minecraft_data_username_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.minecraft_data
    ADD CONSTRAINT minecraft_data_username_fkey FOREIGN KEY (username) REFERENCES public.users(username) ON DELETE CASCADE;


-- Completed on 2025-10-18 22:06:04

--
-- PostgreSQL database dump complete
--

