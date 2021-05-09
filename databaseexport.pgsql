--
-- PostgreSQL database dump
--

-- Dumped from database version 10.16
-- Dumped by pg_dump version 10.16

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
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
-- Name: chat_users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.chat_users (
    user_id integer,
    username character varying(50),
    pass integer,
    current_session integer,
    online integer
);


ALTER TABLE public.chat_users OWNER TO postgres;

--
-- Name: exam_results; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.exam_results (
    user_id integer,
    id integer NOT NULL,
    total_question integer,
    correct_answer integer,
    wrong_answer integer,
    exam_time character varying(50),
    topic character varying(50)
);


ALTER TABLE public.exam_results OWNER TO postgres;

--
-- Name: exam_results_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.exam_results_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.exam_results_id_seq OWNER TO postgres;

--
-- Name: exam_results_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.exam_results_id_seq OWNED BY public.exam_results.id;


--
-- Name: groups; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.groups (
    group_id integer NOT NULL,
    duration integer,
    topic character varying(50)
);


ALTER TABLE public.groups OWNER TO postgres;

--
-- Name: groups_group_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.groups_group_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.groups_group_id_seq OWNER TO postgres;

--
-- Name: groups_group_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.groups_group_id_seq OWNED BY public.groups.group_id;


--
-- Name: messages; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.messages (
    m_id integer NOT NULL,
    fromuser integer,
    touser integer,
    message character varying(500)
);


ALTER TABLE public.messages OWNER TO postgres;

--
-- Name: messages_m_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.messages_m_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.messages_m_id_seq OWNER TO postgres;

--
-- Name: messages_m_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.messages_m_id_seq OWNED BY public.messages.m_id;


--
-- Name: options; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.options (
    question_id integer,
    q_type character varying(50),
    option_id integer NOT NULL,
    option_title character varying(80),
    is_answer integer DEFAULT 0
);


ALTER TABLE public.options OWNER TO postgres;

--
-- Name: options_option_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.options_option_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.options_option_id_seq OWNER TO postgres;

--
-- Name: options_option_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.options_option_id_seq OWNED BY public.options.option_id;


--
-- Name: questionnaire; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questionnaire (
    id integer NOT NULL,
    question_id integer,
    q_name character varying(50)
);


ALTER TABLE public.questionnaire OWNER TO postgres;

--
-- Name: questionnaire_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questionnaire_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questionnaire_id_seq OWNER TO postgres;

--
-- Name: questionnaire_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questionnaire_id_seq OWNED BY public.questionnaire.id;


--
-- Name: questions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.questions (
    user_id integer,
    question_id integer NOT NULL,
    q_type character varying(50),
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    status integer DEFAULT 1,
    topic character varying(50),
    question character varying(100),
    duration integer
);


ALTER TABLE public.questions OWNER TO postgres;

--
-- Name: questions_question_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.questions_question_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.questions_question_id_seq OWNER TO postgres;

--
-- Name: questions_question_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.questions_question_id_seq OWNED BY public.questions.question_id;


--
-- Name: text; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.text (
    question_id integer,
    text_id integer NOT NULL,
    q_type character varying(50),
    answer character varying(200)
);


ALTER TABLE public.text OWNER TO postgres;

--
-- Name: text_text_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.text_text_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.text_text_id_seq OWNER TO postgres;

--
-- Name: text_text_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.text_text_id_seq OWNED BY public.text.text_id;


--
-- Name: userprofile; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.userprofile (
    profile_id integer NOT NULL,
    username character varying(50),
    gender character varying(50),
    phone_no integer,
    profile_pic character varying(50),
    email character varying(50),
    user_id integer
);


ALTER TABLE public.userprofile OWNER TO postgres;

--
-- Name: userprofile_profile_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.userprofile_profile_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.userprofile_profile_id_seq OWNER TO postgres;

--
-- Name: userprofile_profile_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.userprofile_profile_id_seq OWNED BY public.userprofile.profile_id;


--
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id integer NOT NULL,
    username character varying(50),
    email character varying(50),
    created_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp with time zone DEFAULT CURRENT_TIMESTAMP,
    pass integer,
    user_role character varying(50) DEFAULT 'user'::character varying,
    status integer DEFAULT 0
);


ALTER TABLE public.users OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- Name: exam_results id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results ALTER COLUMN id SET DEFAULT nextval('public.exam_results_id_seq'::regclass);


--
-- Name: groups group_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.groups ALTER COLUMN group_id SET DEFAULT nextval('public.groups_group_id_seq'::regclass);


--
-- Name: messages m_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.messages ALTER COLUMN m_id SET DEFAULT nextval('public.messages_m_id_seq'::regclass);


--
-- Name: options option_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.options ALTER COLUMN option_id SET DEFAULT nextval('public.options_option_id_seq'::regclass);


--
-- Name: questionnaire id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire ALTER COLUMN id SET DEFAULT nextval('public.questionnaire_id_seq'::regclass);


--
-- Name: questions question_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions ALTER COLUMN question_id SET DEFAULT nextval('public.questions_question_id_seq'::regclass);


--
-- Name: text text_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.text ALTER COLUMN text_id SET DEFAULT nextval('public.text_text_id_seq'::regclass);


--
-- Name: userprofile profile_id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.userprofile ALTER COLUMN profile_id SET DEFAULT nextval('public.userprofile_profile_id_seq'::regclass);


--
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- Data for Name: chat_users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.chat_users (user_id, username, pass, current_session, online) FROM stdin;
1	Tanuja	1234	3	0
2	Tanya	5678	1	0
4	Rashi	4567	1	0
3	Vishakha	6789	1	0
\.


--
-- Data for Name: exam_results; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.exam_results (user_id, id, total_question, correct_answer, wrong_answer, exam_time, topic) FROM stdin;
1	3	4	3	1	2021-05-08	php
1	4	4	1	3	2021-05-08	php
1	5	4	3	1	2021-05-08	php
1	6	2	2	0	2021-05-08	bootstrap
1	7	2	1	1	2021-05-08	bootstrap
4	8	4	3	1	2021-05-08	php
4	9	2	1	1	2021-05-08	bootstrap
1	11	4	2	2	2021-05-08	php
1	12	4	2	2	2021-05-09	php
\.


--
-- Data for Name: groups; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.groups (group_id, duration, topic) FROM stdin;
1	4	php
2	4	react
3	4	bootstrap
4	4	java
\.


--
-- Data for Name: messages; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.messages (m_id, fromuser, touser, message) FROM stdin;
\.


--
-- Data for Name: options; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.options (question_id, q_type, option_id, option_title, is_answer) FROM stdin;
1	single	1	< php >	0
1	single	2	< ? php ?>	0
1	single	3	< ?php ?>	1
1	single	4	< ? ?>	0
2	single	5	 Hypertext Preprocessor	1
3	single	9	PHP 4	0
3	single	10	PHP 7	0
3	single	11	PHP 6	0
3	single	12	PHP 5 and later	0
4	single	13	.html	0
4	single	14	.php	1
4	single	15	.css	0
4	single	16	.ph	0
2	single	18	Pretext Hypertext Processor	0
2	single	19	Preprocessor Home Page	0
2	single	21	Preprocessor Home Pages	0
13	multiple	24	James Gosling	0
13	multiple	25	Mark Otto	1
13	multiple	26	Jacob Thornton	1
13	multiple	28	Dennis Ritchie	0
14	multiple	29	xs, sm	1
14	multiple	30	xs, sml	0
14	multiple	31	md, lg	1
14	multiple	32	mdl, lgl	0
\.


--
-- Data for Name: questionnaire; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.questionnaire (id, question_id, q_name) FROM stdin;
1	3	Basics
2	4	Basics
3	5	Basics
4	6	Basics
5	1	Intermediate
6	3	Intermediate
7	16	Intermediate
8	17	Intermediate
9	2	Intermediate
10	1	Advance
11	4	Advance
12	5	Advance
13	8	Advance
14	13	Advance
15	16	Advance
16	17	Advance
17	5	Easy
18	8	Easy
19	13	Easy
20	17	Easy
\.


--
-- Data for Name: questions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.questions (user_id, question_id, q_type, created_at, status, topic, question, duration) FROM stdin;
1	1	single	2021-05-06 02:46:28.541264-04	1	php	What should be the correct syntax to write a PHP code?	1
1	3	single	2021-05-06 02:48:20.340046-04	1	php	Which version of PHP introduced Try/catch Exception?	1
1	4	single	2021-05-06 02:50:05.24067-04	1	php	PHP files have a default file extension of_______?	1
1	5	single	2021-05-06 02:51:44.440951-04	1	react	 Which command is used Install create-react-app?	1
1	6	single	2021-05-06 02:53:16.552859-04	1	react	To create a class inheritance, use the ________ keyword	1
1	7	single	2021-05-06 02:53:48.594814-04	1	react	 In ES6, how many ways of defining your variables?	1
1	8	single	2021-05-06 02:54:34.809722-04	1	react	Everything in react is a__?	1
1	11	single	2021-05-06 05:31:20.682115-04	1	react	In React, component properties should be kept in an object called?	1
1	13	multiple	2021-05-06 13:54:50.29148-04	1	bootstrap	Who developed the bootstrap?	1
1	14	multiple	2021-05-06 14:01:32.266144-04	1	bootstrap	 The Bootstrap grid system has four classes which defines screen size:	1
1	16	open text	2021-05-06 14:21:28.348961-04	1	java	 Why is Java not a pure object oriented language?	5
1	17	open text	2021-05-06 14:23:03.557147-04	1	java	Why is Java a platform independent language?	5
1	2	single	2021-05-06 02:47:23.891344-04	1	php	What for PHP stands?	1
\N	18	single	2021-05-09 03:54:58.978028-04	1	laravel	laravel is based on________?	1
1	50	single	2021-05-09 04:48:04.732872-04	1	laravel	laravel is based on________?	1
1	51	single	2021-05-09 04:48:04.74122-04	1	laravel	which command is used to start laravel server?	1
1	52	single	2021-05-09 04:48:04.743181-04	1	laravel	How to list all routes by server?	1
1	53	single	2021-05-09 04:48:04.74507-04	1	laravel	What is blade?	1
\.


--
-- Data for Name: text; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.text (question_id, text_id, q_type, answer) FROM stdin;
17	2	open text	Java does not depend on any hardware or software due to the fact that the compiler compiles the code and then converts it to platform-independent byte code which can be run on multiple systems.
16	1	open text	Java supports primitive data types - byte, boolean, char, short, int, float, long, and double and hence it is not a pure object-oriented languages.
\.


--
-- Data for Name: userprofile; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.userprofile (profile_id, username, gender, phone_no, profile_pic, email, user_id) FROM stdin;
2	Rashi	Female	1234561890	p1.jpg	rashi@gmail.com	4
1	Tanuja	Female	1234567898	p2.jpg	tanuja@gmail.com	1
\.


--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, username, email, created_at, updated_at, pass, user_role, status) FROM stdin;
2	Tanya	tanya@gmail.com	2021-05-04 04:49:29.890312-04	2021-05-04 04:49:29.890312-04	5678	user	0
3	Vishakha	vishakha@gmail.com	2021-05-04 04:50:09.401724-04	2021-05-04 04:50:09.401724-04	6789	user	0
4	Rashi	rashi@gmail.com	2021-05-04 04:50:46.926974-04	2021-05-04 04:50:46.926974-04	4567	user	1
6	Vrinda	vrinda@gmail.com	2021-05-08 08:57:11.936064-04	2021-05-08 08:57:11.936064-04	6543	user	0
1	Tanuja	tanuja@gmail.com	2021-05-04 04:47:45.761863-04	2021-05-04 04:47:45.761863-04	1234	admin	0
\.


--
-- Name: exam_results_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.exam_results_id_seq', 12, true);


--
-- Name: groups_group_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.groups_group_id_seq', 4, true);


--
-- Name: messages_m_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.messages_m_id_seq', 1, false);


--
-- Name: options_option_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.options_option_id_seq', 32, true);


--
-- Name: questionnaire_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questionnaire_id_seq', 20, true);


--
-- Name: questions_question_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.questions_question_id_seq', 53, true);


--
-- Name: text_text_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.text_text_id_seq', 2, true);


--
-- Name: userprofile_profile_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.userprofile_profile_id_seq', 2, true);


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 6, true);


--
-- Name: exam_results exam_results_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results
    ADD CONSTRAINT exam_results_pkey PRIMARY KEY (id);


--
-- Name: groups groups_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.groups
    ADD CONSTRAINT groups_pkey PRIMARY KEY (group_id);


--
-- Name: messages messages_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT messages_pkey PRIMARY KEY (m_id);


--
-- Name: options options_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.options
    ADD CONSTRAINT options_pkey PRIMARY KEY (option_id);


--
-- Name: questionnaire questionnaire_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire
    ADD CONSTRAINT questionnaire_pkey PRIMARY KEY (id);


--
-- Name: questions questions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions
    ADD CONSTRAINT questions_pkey PRIMARY KEY (question_id);


--
-- Name: text text_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.text
    ADD CONSTRAINT text_pkey PRIMARY KEY (text_id);


--
-- Name: userprofile userprofile_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.userprofile
    ADD CONSTRAINT userprofile_pkey PRIMARY KEY (profile_id);


--
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- Name: chat_users id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.chat_users
    ADD CONSTRAINT id FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: questions id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questions
    ADD CONSTRAINT id FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: text id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.text
    ADD CONSTRAINT id FOREIGN KEY (question_id) REFERENCES public.questions(question_id);


--
-- Name: exam_results id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.exam_results
    ADD CONSTRAINT id FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: userprofile id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.userprofile
    ADD CONSTRAINT id FOREIGN KEY (user_id) REFERENCES public.users(id);


--
-- Name: questionnaire id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.questionnaire
    ADD CONSTRAINT id FOREIGN KEY (question_id) REFERENCES public.questions(question_id);


--
-- Name: messages id; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.messages
    ADD CONSTRAINT id FOREIGN KEY (fromuser) REFERENCES public.users(id);


--
-- Name: options qid; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.options
    ADD CONSTRAINT qid FOREIGN KEY (question_id) REFERENCES public.questions(question_id);


--
-- PostgreSQL database dump complete
--

