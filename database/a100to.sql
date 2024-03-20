-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 20-03-2024 a las 20:45:31
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u938128216_a100to`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `addon`
--

CREATE TABLE `addon` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `price` varchar(250) DEFAULT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `recompensa_nuevo` double DEFAULT NULL,
  `recompensa_compra` double DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `perm` text NOT NULL,
  `city_id` int(11) NOT NULL,
  `city_notify` int(11) NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `username` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `shw_password` varchar(255) NOT NULL,
  `remember_token` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `logo` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `fb` varchar(2500) DEFAULT NULL,
  `insta` varchar(2500) DEFAULT NULL,
  `twitter` varchar(2500) DEFAULT NULL,
  `youtube` varchar(2500) DEFAULT NULL,
  `sms_api` varchar(2500) DEFAULT NULL,
  `currency` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `costs_ship` varchar(255) NOT NULL,
  `c_type` int(11) NOT NULL,
  `c_value` varchar(255) NOT NULL,
  `t_type_comm` int(11) NOT NULL,
  `t_value_comm` double NOT NULL,
  `comm_stripe` double NOT NULL,
  `comm_fijo_stripe` int(11) NOT NULL,
  `min_distance` int(11) NOT NULL,
  `max_distance_staff` double NOT NULL,
  `min_value` int(11) NOT NULL,
  `store_type` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `paypal_client_id` varchar(250) DEFAULT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `stripe_api_id` varchar(250) DEFAULT NULL,
  `stripe_client_id` varchar(250) DEFAULT NULL,
  `ApiKey_google` varchar(500) NOT NULL,
  `url1` varchar(255) DEFAULT NULL,
  `url2` varchar(255) DEFAULT NULL,
  `send_terminal` int(11) NOT NULL,
  `max_cash` double NOT NULL,
  `v_count` int(11) NOT NULL,
  `v_value` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `recompensa_nuevo`, `recompensa_compra`, `name`, `perm`, `city_id`, `city_notify`, `email`, `username`, `password`, `shw_password`, `remember_token`, `logo`, `fb`, `insta`, `twitter`, `youtube`, `sms_api`, `currency`, `costs_ship`, `c_type`, `c_value`, `t_type_comm`, `t_value_comm`, `comm_stripe`, `comm_fijo_stripe`, `min_distance`, `max_distance_staff`, `min_value`, `store_type`, `paypal_client_id`, `s_data`, `stripe_api_id`, `stripe_client_id`, `ApiKey_google`, `url1`, `url2`, `send_terminal`, `max_cash`, `v_count`, `v_value`, `created_at`, `updated_at`) VALUES
(1, 50.5, 45, 'A100TO', 'All', 0, 4, 'admin@admin.com', 'admin', '$2y$10$De2fmaBTt0F/OLbBgR.zh.jA9/G56lVsLeZTZsi4oZL38/OJHNwom', 'Admin15978', '6SjvrosHnfKDv5KMDX0JeThNdnJPIuPuBRieh6Yb8woHnAeWTsDxWsA2Knc8', '1710204745425.png', 'https://www.facebook.com/', 'https://www.instagram.com/', NULL, NULL, '{+5216361229546}{Mensaje}', '$', '0', 0, '0', 1, 3, 0, 3, 0, 0, 0, NULL, 'null', 'a:0:{}', 'null', 'null', 'AIzaSyBt88s4PDl1avfe-K5SKaPSp7RedjibLUw', NULL, NULL, 0, 0, 0, 24, '2019-03-27 14:47:27', '2024-03-11 18:52:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `app_user`
--

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT 'null',
  `status` int(11) DEFAULT 0,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `birthday` varchar(255) DEFAULT NULL,
  `sex_type` varchar(255) DEFAULT NULL,
  `last_city` int(11) DEFAULT 0,
  `user_name` varchar(255) DEFAULT NULL,
  `fecha_cambio` date DEFAULT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `pswfacebook` varchar(250) DEFAULT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `otp` varchar(250) DEFAULT NULL,
  `refered` varchar(255) DEFAULT NULL,
  `saldo` double DEFAULT 0,
  `tickets` int(11) DEFAULT NULL COMMENT 'suma tickets 6 meses',
  `monedero` double DEFAULT 0,
  `saldo_xp` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `shw_password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `app_user`
--

INSERT INTO `app_user` (`id`, `foto`, `customer_id`, `status`, `name`, `email`, `last_name`, `birthday`, `sex_type`, `last_city`, `user_name`, `fecha_cambio`, `password`, `pswfacebook`, `phone`, `otp`, `refered`, `saldo`, `tickets`, `monedero`, `saldo_xp`, `created_at`, `updated_at`, `deleted_at`, `shw_password`) VALUES
(25, NULL, 'null', 0, 'ali ali', 'alicarlo11@test.com', 'ali ali', '2023-04-28T01:25:00', 'MASCULINO', 0, 'ali44', NULL, '123456', '0', '4545454', NULL, '', 250, NULL, 0, 0, '2023-04-28 02:26:29', '2024-01-21 18:11:30', NULL, NULL),
(26, NULL, 'null', 0, 'alicarlo70', 'alicarlo70@test.com', 'alicarlo70', '2023-04-28T01:35:00', 'MASCULINO', 0, 'alicarlo70', NULL, '123456', '0', '123456', NULL, '', 0, NULL, 0, 0, '2023-04-28 02:35:40', '2023-04-28 02:35:40', NULL, NULL),
(27, NULL, 'null', 0, 'alicarlo71', 'alicarlo71@test.com', 'alicarlo71', '2023-04-28T01:37:00', 'MASCULINO', 0, 'alicarlo71', NULL, '123456', '0', '1234567', NULL, '', 0, NULL, 0, 0, '2023-04-28 02:38:25', '2023-04-28 02:38:25', NULL, NULL),
(28, NULL, 'null', 0, 'alicarlo71', 'alicarlo12@test.com', 'alicarlo71', '2023-04-28T01:40:00', 'MASCULINO', 0, 'alicarlo12', NULL, '123456', '0', '12345678', NULL, '', 0, NULL, 0, 0, '2023-04-28 02:41:08', '2023-04-28 02:41:08', NULL, NULL),
(29, NULL, 'null', 0, 'alicarlo73', 'alicarlo13@test.com', 'alicarlo73', '2023-04-28T01:57:00', 'MASCULINO', 0, 'alicarlo73', NULL, '123456', '0', '1235454949', NULL, '', 0, NULL, 0, 0, '2023-04-28 02:59:26', '2023-04-28 02:59:26', NULL, NULL),
(30, NULL, 'null', 0, 'alicarlo14', 'alicarlo14@test.com', 'alicarlo14', '2023-04-28T02:20:00', 'MASCULINO', 0, 'alicarlo15', NULL, '123456', '0', '12345699', NULL, '', 0, NULL, 0, 0, '2023-04-28 03:21:29', '2023-04-28 03:21:29', NULL, NULL),
(31, NULL, 'null', 0, 'jair Quinto', 'tokin@a.com', 'jair Quinto', '2023-06-01T14:06:00', 'MASCULINO', 0, 'Jair', NULL, 'loco1727', '0', '3128816744', NULL, '', 0, NULL, 0, 0, '2023-05-01 13:07:27', '2023-05-01 13:07:27', NULL, NULL),
(32, 'public/upload/perfil/16930019306904.png', 'null', 0, 'alicarlo', NULL, 'mmpp', NULL, NULL, 0, 'montijo', '2021-08-10', '123456', '1szjfaNurPMotFPcmjPueb7ODjY2', NULL, '1562', '', 0, NULL, 0, 0, '2023-05-01 13:26:03', '2023-09-12 17:48:35', NULL, NULL),
(33, 'public/upload/perfil/16930053956587.png', 'null', 0, 'Miguel', 'proyectistama@gmail.com', 'Miguel', '1995-09-13T19:27:00', 'MASCULINO', 0, 'Miguel', '2022-08-02', '12345678', '7hNE2xmtUsWA2RvbFSSQYacdZrs2', '8136450015', '6407', '', 0, 2, 0, 200, '2023-05-08 19:27:53', '2024-03-15 16:31:02', NULL, NULL),
(34, NULL, 'null', 0, 'Mateo Quinto', 'mateo@a.com', 'Mateo Quinto', '2023-05-26T15:38:00', 'MASCULINO', 0, 'Mateo', NULL, 'loco1727', '0', '3128816746', NULL, '', 0, NULL, 0, 0, '2023-05-26 14:39:46', '2023-05-26 14:39:46', NULL, NULL),
(35, 'public/upload/perfil/17104836726536.png', 'null', 0, 'Adrián quezada Figueroa', 'quezada.adrian@hotmail.com', 'Adrián quezada Figueroa', '1992-06-11T11:04:00', 'MASCULINO', 0, 'Icecool', '2018-08-14', '$2y$10$NNosr/N2zZfjkZ3qpj2/aee3Hf8D/DovcBm/BXZS/VJeETYzeg0He', '0', '6361229546', '6299', '', 0, NULL, 0, 0, '2023-07-24 11:05:41', '2024-03-15 00:21:12', NULL, '11069224'),
(36, 'public/upload/perfil/16930000441727.png', 'null', 0, 'Jair Quinto', 'tokinmym2@gmail.com', 'Jair Quinto', '2023-07-24T12:24:00', 'MASCULINO', 0, 'tokin', '2022-08-09', 'loco1727', '0', '312884', NULL, '', 900, NULL, 0, 0, '2023-07-24 11:26:13', '2023-08-25 15:47:24', NULL, NULL),
(37, 'null', 'null', 0, 'baki hanma', 'baki@test.com', 'baki hanma', '2023-08-18T07:58:00', 'MASCULINO', 0, 'baki', '2023-08-18', '123456', '0', '112324324324', NULL, '', 0, NULL, 0, 0, '2023-08-18 08:59:13', '2023-08-29 11:03:22', '2023-08-29 11:03:22', NULL),
(38, 'null', 'null', 0, 'alicarlo', 'ali5@test.com', 'alicarlo', '2023-08-25T15:56:00', 'MASCULINO', 0, 'alicarlo5', '2023-08-25', '123456', '0', '556411124555', NULL, '', 0, NULL, 0, 0, '2023-08-25 16:57:16', '2023-08-25 16:57:16', NULL, NULL),
(39, 'null', 'null', 0, 'alicarlo test888', 'ali888@test.com', 'alicarlo test888', '2023-08-25T15:58:00', 'FEMENINO', 0, 'alicarlo8', '2023-08-25', '123456', '0', '665424876', NULL, '', 0, NULL, 0, 0, '2023-08-25 16:59:24', '2023-08-25 16:59:24', NULL, NULL),
(40, 'null', 'null', 0, 'alicarlo9', 'alicarlo9@test.com', 'alicarlo9', '2023-08-25T16:02:00', 'MASCULINO', 0, 'alicarlo9', '2023-08-25', '123456', '0', '2132321321', NULL, '', 0, NULL, 0, 0, '2023-08-25 17:03:12', '2023-08-25 17:03:12', NULL, NULL),
(41, 'public/upload/perfil/16941892234857.png', 'null', 0, 'alicarlo mm', 'alicarlo@test.com', 'alicarlo mm', '2023-08-25T16:05:00', 'MASCULINO', 0, 'alicarlo', '2023-08-25', '1234567', '0', '0000000', NULL, '', 2274.8333333333, 11, 0, 13000, '2023-08-25 17:05:37', '2024-03-14 15:18:56', NULL, NULL),
(43, 'null', 'null', 0, 'prueba11', 'prueba1@test.com', 'prueba11', '2023-08-30T08:55:00', 'MASCULINO', 0, 'prueba1', '2023-08-30', '1234567', '0', '123456789', NULL, '', 0, NULL, 0, 0, '2023-08-30 09:56:18', '2023-08-30 09:56:18', NULL, NULL),
(44, 'null', 'null', 0, 'test1', 'test11@test.com', 'test1', '2023-08-30T08:59:00', 'MASCULINO', 0, 'prueba12', '2023-08-30', '123456', '0', '234234234', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-08-30 10:00:01', '2023-08-30 10:00:01', NULL, NULL),
(48, 'null', 'null', 0, 'Tokin 2', 'tok@gmail.com', '18:00', '2000-09-24', 'MASCULINO', 0, 'tokin2', '2023-08-30', '12345', '0', '1045435435', NULL, 'Tokin', 0, NULL, 0, 0, '2023-08-30 11:11:52', '2023-08-30 11:11:52', NULL, NULL),
(49, 'null', 'null', 0, 'JOTARO JOESTAR', 'jotaro@test.com', 'JOTARO JOESTAR', '2023-08-31T08:27:00', 'MASCULINO', 0, 'JOTARO', '2023-08-31', '123456', '0', '465156151', NULL, '', 403.33333333333, NULL, 0, 0, '2023-08-31 09:27:56', '2023-09-08 04:36:47', NULL, NULL),
(50, 'null', 'null', 0, 'GAPPY', 'gappy@test.com', 'GAPPY', '2023-08-31T08:40:00', 'MASCULINO', 0, 'GAPPY', '2023-08-31', '123456', '0', '42342342342', NULL, '', 103.75, NULL, 0, 0, '2023-08-31 09:40:48', '2023-09-08 09:54:20', NULL, NULL),
(51, 'null', 'null', 0, 'JOSEPH JOESTAR', 'joseph@test.com', 'JOSEPH JOESTAR', '2023-08-31T09:17:00', 'MASCULINO', 0, 'JOSEPH', '2023-08-31', '123456', '0', '23423423423', NULL, '', 36.166666666666, NULL, 0, 0, '2023-08-31 10:17:51', '2023-09-09 13:24:42', NULL, NULL),
(52, 'null', 'null', 0, 'JONY JOESTAR', 'jony@test.com', 'JONY JOESTAR', '2023-08-31T12:46:00', 'MASCULINO', 0, 'JONY', '2023-08-31', '123456', '0', '4545454545', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-08-31 13:47:14', '2023-08-31 13:47:14', NULL, NULL),
(53, 'null', 'null', 0, 'spike', 'spike@test.com', 'spike', '2023-08-31T14:45:00', 'MASCULINO', 0, 'SPIKE', '2023-08-31', '123456', '0', '1234568455', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-08-31 15:45:45', '2023-08-31 15:45:45', NULL, NULL),
(54, 'null', 'null', 0, 'test44', 'test4444@test.com', 'test44', '2023-08-31T15:01:00', 'MASCULINO', 0, 'test44', '2023-08-31', '123456', '0', '23543534543543', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-08-31 16:01:38', '2023-08-31 16:01:38', NULL, NULL),
(55, 'null', 'null', 0, 'JOTARO2', 'jotaro2@test.com', 'JOTARO2', '2023-08-31T15:21:00', 'MASCULINO', 0, 'JOTARO2', '2023-08-31', '123456', '0', '541218524', NULL, 'JOTARO', 25.25, NULL, 0, 0, '2023-08-31 16:22:08', '2023-08-31 16:57:01', NULL, NULL),
(56, 'null', 'null', 0, 'JOTARO3', 'test3453@test.com', 'JOTARO3', '2023-08-31T15:26:00', 'MASCULINO', 0, 'JOTARO3', '2023-08-31', '123456', '0', '12345678943543544', NULL, 'JOTARO', 0, NULL, 0, 0, '2023-08-31 16:26:49', '2023-08-31 16:26:49', NULL, NULL),
(57, 'null', 'null', 0, 'TEST0145', 'rgd@test.com', 'TEST0145', '2023-08-31T15:32:00', 'MASCULINO', 0, 'TEST0986', '2023-08-31', '123456', '0', '436253543', NULL, 'JOTARO', 0, NULL, 0, 0, '2023-08-31 16:33:12', '2023-08-31 16:33:12', NULL, NULL),
(58, 'null', 'null', 0, '4234234', '23423@test.com', '4234234', '2023-08-31T15:39:00', 'MASCULINO', 0, 'RRTTYTT', '2023-08-31', '213213213', '0', '23423423455655776', NULL, 'JOTARO', 0, NULL, 0, 0, '2023-08-31 16:40:03', '2023-08-31 16:40:03', NULL, NULL),
(59, 'null', 'null', 0, 'alicarlo123fff', 'hey33@test.com', 'alicarlo123fff', '2023-08-31T19:02:00', 'MASCULINO', 0, 'hey123', '2023-08-31', '1234567', '0', '469000', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-08-31 20:02:56', '2023-08-31 20:02:56', NULL, NULL),
(60, 'null', 'null', 0, 'dgdfg345435', 'sdf@test.com', 'dgdfg345435', '2023-08-31T23:54:00', 'MASCULINO', 0, 'sdfsdfs', '2023-09-01', '123456', '0', '234357711', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-01 00:54:35', '2023-09-01 00:54:35', NULL, NULL),
(61, 'null', 'null', 0, '234234gdfg', 'fgdfgd@test.com', '234234gdfg', '2023-08-31T23:56:00', 'MASCULINO', 0, 'fsdfsdf', '2023-09-01', '123456', '0', '4353458', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-01 00:57:01', '2023-09-01 00:57:01', NULL, NULL),
(62, 'null', 'null', 0, 'apple', 'apple1@test.com', 'apple', '2023-09-01T13:19:00', 'MASCULINO', 0, 'apple1', '2023-09-01', '123456', '0', '457378383', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-01 14:20:29', '2023-09-01 14:20:29', NULL, NULL),
(63, 'null', 'null', 0, 'apple2', 'apple2@test.com', 'apple2', '2023-09-01T13:29:00', 'MASCULINO', 0, 'apple2', '2023-09-01', '123456', '0', '544567888', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-01 14:29:51', '2023-09-01 14:29:51', NULL, NULL),
(64, 'null', 'null', 0, 'Fernando Castillo Prueba1', 'clashofclansfer@gmail.com', 'Fernando Castillo Prueba1', '1999-08-07T19:53:00', 'MASCULINO', 0, 'Fernando Prueba1', '2023-09-05', 'Contraseña1004', '0', '8116019786', NULL, '', 550, 4, 0, 400, '2023-09-05 19:55:26', '2023-09-06 19:00:16', NULL, NULL),
(65, 'null', 'null', 0, 'demo1', 'demo1@test.com', 'demo1', '2023-09-05T19:37:00', 'MASCULINO', 0, 'demo1', '2023-09-05', '123456', '0', '1234667884', NULL, 'alicarlo', 16.833333333333, NULL, 0, 0, '2023-09-05 20:40:08', '2023-09-08 09:54:20', NULL, NULL),
(66, 'null', 'null', 0, 'sdfsdf', 'dfddd@test.com', 'sdfsdf', '2023-09-05T20:13:00', 'MASCULINO', 0, 'demo2', '2023-09-05', '123456', '0', '435435435', NULL, 'alicarlo', 16.833333333333, NULL, 0, 0, '2023-09-05 21:14:18', '2023-09-09 13:24:42', NULL, NULL),
(67, 'null', 'null', 0, 'demo4', 'demo4@test.com', 'demo4', '2023-09-05T20:18:00', 'MASCULINO', 0, 'demo4', '2023-09-05', '23423423', '0', '234234243', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-05 21:19:24', '2023-09-05 21:19:24', NULL, NULL),
(68, 'null', 'null', 0, '3333', 'demo456@test.com', '3333', '2023-09-05T20:31:00', 'MASCULINO', 0, 'demo6', '2023-09-05', '34234234', '0', '3333568011', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-05 21:31:35', '2023-09-05 21:31:35', NULL, NULL),
(69, 'null', 'null', 0, 'demo89', 'demo9332@test.com', 'demo89', '2023-09-05T20:33:00', 'MASCULINO', 0, 'fsfdsd55', '2023-09-05', '434354355', '0', '324234234', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-05 21:34:22', '2023-09-05 21:34:22', NULL, NULL),
(70, 'null', 'null', 0, '23f4', 'demo4556@test.com', '23f4', '2023-09-06T08:14:00', 'MASCULINO', 0, 'demo78211', '2023-09-06', '1234567', '0', '3453534534', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-06 09:14:38', '2023-09-06 09:14:38', NULL, NULL),
(71, 'null', 'null', 0, 'demo1232e', 'demo47821@test.com', 'demo1232e', '2023-09-06T08:17:00', 'MASCULINO', 0, 'demo3333', '2023-09-06', '123456', '0', '475215', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-06 09:17:51', '2023-09-06 09:17:51', NULL, NULL),
(72, 'null', 'null', 0, 'sdfsdf3', 'test345n@test.com', 'sdfsdf3', '2023-09-06T08:20:00', 'MASCULINO', 0, 'test45nb', '2023-09-06', '123456', '0', '2342389', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-06 09:20:50', '2023-09-06 09:20:50', NULL, NULL),
(73, 'null', 'null', 0, 'dddderr44', 'demo999@test.com', 'dddderr44', '2023-09-06T19:16:00', 'MASCULINO', 0, 'demo99991', '2023-09-06', '123456', '0', '23432423', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-06 20:16:47', '2023-09-06 20:16:47', NULL, NULL),
(74, 'null', 'null', 0, 'alicarlo4fggt5', 'demo345n@test.com', 'alicarlo4fggt5', '2023-09-07T04:29:00', 'MASCULINO', 0, 'demo0908', '2023-09-07', '123456', '0', '423423467890', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 05:30:12', '2023-09-07 05:30:12', NULL, NULL),
(75, 'null', 'null', 0, 'fdgdfg444', 'dsfgdf4@test.com', 'fdgdfg444', '2023-09-07T04:44:00', 'MASCULINO', 0, 'fsdf55', '2023-09-07', '123456', '0', '4354354355789', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 05:45:11', '2023-09-07 05:45:11', NULL, NULL),
(76, 'null', 'null', 0, 'test57', 'test57@test.com', 'test57', '2023-09-07T04:46:00', 'MASCULINO', 0, 'test57', '2023-09-07', '123456', '0', '222222345', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 05:47:02', '2023-09-07 05:47:02', NULL, NULL),
(77, 'null', 'null', 0, 'demo57894', 'test4ffn9@test.com', 'demo57894', '2023-09-07T04:54:00', 'MASCULINO', 0, 'demo963147', '2023-09-07', '1234567', '0', '23423423411111', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 05:54:52', '2023-09-07 05:54:52', NULL, NULL),
(78, 'null', 'null', 0, '21321ggb6', 'sdfsdf444@test.com', '21321ggb6', '2023-09-07T05:04:00', 'MASCULINO', 0, 'ali78852', '2023-09-07', '123445', '0', '5679900000', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 06:04:46', '2023-09-07 06:04:46', NULL, NULL),
(79, 'null', 'null', 0, 'alisdfsf', 'gddf@test.com', 'alisdfsf', '2023-09-07T08:52:00', 'MASCULINO', 0, 'ali123220pou', '2023-09-07', '123456', '0', '43534570', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 09:52:50', '2023-09-07 09:52:50', NULL, NULL),
(80, 'null', 'null', 0, 'test9999', 'ali2gnv@test1.com', 'test9999', '2023-09-07T08:56:00', 'MASCULINO', 0, 'test9999', '2023-09-07', '123456', '0', '123456751111111', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 09:57:10', '2023-09-07 09:57:10', NULL, NULL),
(81, 'null', 'null', 0, 'alicarlo100000', 'alicarlo10000@test.com', 'alicarlo100000', '2023-09-07T09:00:00', 'MASCULINO', 0, 'alicarlo10000000', '2023-09-07', '123456', '0', '5357679567856743', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 10:00:59', '2023-09-07 10:00:59', NULL, NULL),
(82, 'null', 'null', 0, 'alicarlo3', 'alicarlo3@test3.com', 'alicarlo3', '2023-09-07T10:07:00', 'MASCULINO', 0, 'alicarlo3', '2023-09-07', '123456', '0', '244357890123445', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 11:08:29', '2023-09-07 11:08:29', NULL, NULL),
(83, 'null', 'null', 0, 'ali1223454556', 'aligdfjkdf78@test.com', 'ali1223454556', '2023-09-07T12:50:00', 'MASCULINO', 0, 'ali782354556', '2023-09-07', '123456', '0', '1545545', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 13:50:45', '2023-09-07 13:50:45', NULL, NULL),
(84, 'null', 'null', 0, 'dsgg545', 'sjdfjskdfbk@test.com', 'dsgg545', '2023-09-07T12:53:00', 'MASCULINO', 0, 'ali235435', '2023-09-07', '1234567', '0', '2359098211114556', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 13:53:33', '2023-09-07 13:53:33', NULL, NULL),
(85, 'null', 'null', 0, '235423gdfgdf345', 'sfsdkfh47@test.com', '235423gdfgdf345', '2023-09-07T12:53:00', 'MASCULINO', 0, '354353', '2023-09-07', '435435345', '0', '5435436890123535', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 13:54:16', '2023-09-07 13:54:16', NULL, NULL),
(86, 'null', 'null', 0, 'sdfsdf43435435', 'v4fdgf@test.com', 'sdfsdf43435435', '2023-09-07T12:54:00', 'MASCULINO', 0, 'sdf54', '2023-09-07', 'rgfdgfdgdf', '0', '435457658754', NULL, '', 0, NULL, 0, 0, '2023-09-07 13:54:54', '2023-09-07 13:54:54', NULL, NULL),
(87, 'null', 'null', 0, '435435fdgdf', 'fdgdfgdf@test.com', '435435fdgdf', '2023-09-07T12:55:00', 'MASCULINO', 0, 'dsf43', '2023-09-07', '54435', '0', '435435431111', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 13:55:35', '2023-09-07 13:55:35', NULL, NULL),
(88, 'null', 'null', 0, 'sdfsdf324325', '435435gdf@test.com', 'sdfsdf324325', '2023-09-07T12:56:00', 'MASCULINO', 0, 'fsdfsdfff4444frfffff', '2023-09-07', 'sdfsdf', '0', '4354354353', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 13:57:07', '2023-09-07 13:57:07', NULL, NULL),
(89, 'null', 'null', 0, 'super111', 'super11@test.com', 'super111', '2023-09-07T13:04:00', 'MASCULINO', 0, 'super11', '2023-09-07', '123456', '0', '2.4324567899E+19', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 14:04:51', '2023-09-07 14:04:51', NULL, NULL),
(90, 'null', 'null', 0, 'super1222', 'super12@test.com', 'super1222', '2023-09-07T13:05:00', 'MASCULINO', 0, 'super12', '2023-09-07', '32423424', '0', '243246780056333570', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 14:06:06', '2023-09-07 14:06:06', NULL, NULL),
(91, 'null', 'null', 0, 'super13', 'super13@test.com', 'super13', '2023-09-07T13:08:00', 'MASCULINO', 0, 'super13', '2023-09-07', '234234', '0', '2132467889', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-07 14:08:49', '2023-09-07 14:08:49', NULL, NULL),
(92, 'null', 'null', 0, 'demo37', 'demo37@test.com', 'demo37', '2023-09-08T01:00:00', 'MASCULINO', 0, 'demo37', '2023-09-08', '123456', '0', '1236890665444455', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 02:01:18', '2023-09-08 02:01:18', NULL, NULL),
(93, 'null', 'null', 0, 'demo38', 'demo38@test.com', 'demo38', '2023-09-08T01:08:00', 'MASCULINO', 0, 'demo38', '2023-09-08', '123456', '0', '325435475676799000', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 02:08:41', '2023-09-08 02:08:41', NULL, NULL),
(94, 'null', 'null', 0, 'demo39', 'demo39@test.com', 'demo39', '2023-09-08T01:12:00', 'MASCULINO', 0, 'demo39', '2023-09-08', '123456', '0', '124567777755544', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 02:12:51', '2023-09-08 02:12:51', NULL, NULL),
(95, 'null', 'null', 0, 'demo40', 'demo40@test.com', 'demo40', '2023-09-08T01:17:00', 'MASCULINO', 0, 'demo40', '2023-09-08', '123456', '0', '1.2345611234455E+19', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 02:17:37', '2023-09-08 02:17:37', NULL, NULL),
(96, 'null', 'null', 0, 'demo50', 'demo50@test.com', 'demo50', '2023-09-08T02:31:00', 'MASCULINO', 0, 'demo50', '2023-09-08', '123456', '0', '2342349000', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 03:32:27', '2023-09-08 03:32:27', NULL, NULL),
(97, 'null', 'null', 0, 'demo52', 'demo52@test.com', 'demo52', '2023-09-08T02:35:00', 'MASCULINO', 0, 'demo52@test.com', '2023-09-08', '123456', '0', '1231232133908655', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 03:38:28', '2023-09-08 03:38:28', NULL, NULL),
(98, 'null', 'null', 0, 'demo55', 'demo55@test.com', 'demo55', '2023-09-08T02:44:00', 'MASCULINO', 0, 'demo55', '2023-09-08', '123456', '0', '21312321321356776', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 03:45:09', '2023-09-08 03:45:09', NULL, NULL),
(99, 'null', 'null', 0, 'demo60', 'demo60@test.com', 'demo60', '2023-09-08T02:48:00', 'MASCULINO', 0, 'demo60', '2023-09-08', '123456', '0', '412342377666', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 03:49:24', '2023-09-08 03:49:24', NULL, NULL),
(100, 'null', 'null', 0, 'demo61', 'demo61@test.com', 'demo61', '2023-09-08T02:53:00', 'MASCULINO', 0, 'demo61', '2023-09-08', '123456', '0', '1.2345643542322E+24', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 03:54:12', '2023-09-08 03:54:12', NULL, NULL),
(101, 'null', 'null', 0, 'demo63', 'demo63@test.com', 'demo63', '2023-09-08T02:58:00', 'MASCULINO', 0, 'demo63', '2023-09-08', '123456', '0', '11122333444555', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 03:58:26', '2023-09-08 03:58:26', NULL, NULL),
(102, 'null', 'null', 0, 'demo65', 'demo65@test.com', 'demo65', '2023-09-08T03:00:00', 'MASCULINO', 0, 'demo65@test.com', '2023-09-08', '123456', '0', '123136890865656', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 04:01:16', '2023-09-08 04:01:16', NULL, NULL),
(103, 'null', 'null', 0, 'demo66', 'demo66@test.com', 'demo66', '2023-09-08T03:04:00', 'MASCULINO', 0, 'demo66', '2023-09-08', '123456', '0', '1234561212121323500', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 04:04:58', '2023-09-08 04:04:58', NULL, NULL),
(104, 'null', 'null', 0, 'demo68', 'demo68@test.com', 'demo68', '2023-09-08T03:11:00', 'MASCULINO', 0, 'demo68', '2023-09-08', '123456', '0', '132135677890', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 04:12:00', '2023-09-08 04:12:00', NULL, NULL),
(105, 'null', 'null', 0, 'demo70', 'demo70@test.com', 'demo70', '2023-09-08T08:42:00', 'MASCULINO', 0, 'demo70', '2023-09-08', '123456', '0', '1234523432534543', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 09:43:23', '2023-09-08 09:43:23', NULL, NULL),
(106, 'null', 'null', 0, 'demo72', 'demo72@test.com', 'demo72', '2023-09-08T08:50:00', 'MASCULINO', 0, 'demo72', '2023-09-08', '123456', '0', '243235798080', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-08 09:51:08', '2023-09-08 09:51:08', NULL, NULL),
(107, 'null', 'null', 0, 'demo80', 'demo80@test.com', 'demo80', '2023-09-09T12:23:00', 'MASCULINO', 0, 'demo80', '2023-09-09', '123456', '0', '1230879461', NULL, 'alicarlo', 0, NULL, 0, 0, '2023-09-09 13:23:52', '2023-09-09 13:23:52', NULL, NULL),
(108, 'null', 'null', 0, 'checo perez', 'checo.perez@gmail.com', 'checo perez', '2023-09-22T18:55:00', 'MASCULINO', 0, 'pruebafer2', '2023-09-22', 'qakwuc-pUgjur-6pazzi', '0', '711253674', NULL, '', 250, 2, 0, 550, '2023-09-22 18:55:45', '2024-03-20 11:15:49', NULL, NULL),
(109, 'null', 'null', 0, 'Rodrigo Reyes', 'rrg364@nyu.edu', 'Rodrigo Reyes', '2000-08-03T18:57:00', 'MASCULINO', 0, 'rodrigoreyesgtz', '2023-09-22', '@Cam0mille', '0', '8114112864', NULL, '', 0, NULL, 0, 0, '2023-09-22 18:57:53', '2023-09-22 18:57:53', NULL, NULL),
(110, 'public/upload/perfil/17105380542873.png', 'null', 0, 'ali', 'ga16vett@gmail.com', 'ali', '2023-12-23T06:30:00', 'MASCULINO', 0, 'ali991', '2023-12-23', '$2y$10$gXd7fb/km4akh9brlz94hudqaFzUNpfsryRZnmlGzKWHPFCnF9iYa', '0', '6488665', '7297', '4445555', 100, 28, 0, 2950, '2023-12-23 08:30:39', '2024-03-15 15:27:34', NULL, '123456'),
(111, 'null', 'null', 0, 'alicarlo2', 'ga16vett+1@gmail.com', 'alicarlo2', '2024-01-05T10:25:00', 'MASCULINO', 0, 'alicarlo2', '2024-01-05', '123456', '0', '34234324', NULL, '', 0, NULL, 0, 0, '2024-01-05 12:25:56', '2024-01-05 12:25:56', NULL, NULL),
(112, 'null', 'null', 0, 'Demo', 'demo@test.com', 'Demo', '2024-01-08T10:04:00', 'MASCULINO', 0, 'Demo', '2024-01-08', '123456', '0', '111222222222222', NULL, '', 0, 1, 0, 100, '2024-01-08 12:04:59', '2024-03-01 15:54:36', NULL, NULL),
(113, 'null', 'null', 0, 'Astrid', 'astridyoung6@outlook.com', 'Astrid', '1995-03-04T21:23:00', 'FEMENINO', 0, 'Astrid young', '2024-01-23', 'yixing34', '0', '8130876337', NULL, '4445555', 0, NULL, 0, 0, '2024-01-23 21:23:48', '2024-01-23 21:23:48', NULL, NULL),
(114, 'null', 'null', 0, 'Fernando Tres', 'correo@gmail.com', 'Fernando Tres', '1994-01-24T16:42:00', 'MASCULINO', 0, 'Fernando Tres', '2024-01-24', 'xIxjof-dujga3-nodpid', '0', '8116378462', NULL, '', 0, NULL, 0, 0, '2024-01-24 16:44:23', '2024-01-24 16:44:23', NULL, NULL),
(115, 'null', 'null', 0, 'miguel', 'proyeectistama@gmail.com', 'miguel', '1995-03-24T17:07:00', 'MASCULINO', 0, 'mmm', '2024-01-24', '12345678', '0', '8136453015', NULL, '4445555', 0, NULL, 0, 0, '2024-01-24 17:08:45', '2024-01-24 17:08:45', NULL, NULL),
(116, 'null', 'null', 0, 'enel villafranca', 'enelvillafranca@gmail.com', 'enel villafranca', '1988-02-08T14:36:00', 'MASCULINO', 0, 'enel', '2024-02-08', '19415101', '0', '4128592799', NULL, '', 0, NULL, 0, 0, '2024-02-08 12:38:45', '2024-02-08 12:38:45', NULL, NULL),
(117, 'null', 'null', 0, 'miguel', 'proyectistamaa@gmail.com', 'miguel', '1995-09-13T17:27:00', 'MASCULINO', 0, 'mikiss2', '2024-03-14', '$2y$10$0GiYSfz1uJeJPlUVyjdtEO6Pc1xOyZRnajfbiCU.4M/mjJsru4beO', '0', '8136450014', NULL, 'mikiss2', 0, 1, 0, 350, '2024-03-14 17:28:57', '2024-03-14 18:07:25', NULL, '12345678'),
(118, 'null', 'null', 0, 'miiiiiiiiiiiiiiiiiiiiiiiiii', 'proyectistamauu@gmail.com', 'miiiiiiiiiiiiiiiiiiiiiiiiii', '2024-03-14T19:50:00', 'MASCULINO', 0, 'miiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii', '2024-03-14', '$2y$10$26Cyo5v5oJe0mqBNgp33quncJ2vDs8tXErBt0iZQdla8dKrqDiJXS', '0', '8.1364500011111E+20', NULL, 'mikikiiikkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkwjwjejjejejejjejejjejejjejejejejjejejejbebejejejjeuejejejjejejejejhegegwhhwhwhwbhehejjrjrjrjrjjrjeuejjejeueueuueuejejjejejjehehvvvjfjjejejhebebheheuejejjejejjejejejjeje', 0, NULL, 0, 0, '2024-03-14 19:52:05', '2024-03-14 19:52:05', NULL, '123456'),
(119, 'public/upload/perfil/17104825016200.png', 'null', 0, 'miguel', 'a@a.com', 'miguel', '1992-03-14T22:41:00', 'MASCULINO', 0, 'miguelito', '2024-03-14', '$2y$10$yeftV76uol4Yv0r4XNfDju6M/pIuI6bmgjMWnoQNd2lPYwBPCJt1C', '0', '8136450012', NULL, '', 0, 2, 0, 250, '2024-03-14 22:51:13', '2024-03-15 00:01:41', NULL, '12345678'),
(120, 'null', 'null', 0, 'miguel', 'proooyeectistama@gmail.com', 'miguel', '1996-03-15T14:22:00', 'MASCULINO', 0, 'yosty', '2024-03-15', '$2y$10$.SYLyGkaiU.HcWDNKjM.U.2ohfe903ckt7PqXSLrUyjzCWgBVGY3y', '0', '8136450011', NULL, '', 0, NULL, 0, 0, '2024-03-15 14:23:36', '2024-03-15 14:23:36', NULL, '123456'),
(121, 'public/upload/perfil/17107382633171.png', 'null', 0, 'Mauricio Velasco', 'mauricio@integriapp.com', 'Mauricio Velasco', '1993-07-04T10:56:00', 'MASCULINO', 0, 'Mauricio Velasco', '2024-03-16', '$2y$10$pDhsQ4RZatRIqIOHiLPT3.v.tQgWQLmrcHgVJQkUCHE70JJEDrfY6', '0', '5568046397', NULL, '', 0, 1, 0, 100, '2024-03-16 10:57:34', '2024-03-20 11:36:11', NULL, 'a100topsw'),
(122, 'null', 'null', 0, 'Fernando Castillo Vallin', 'fcasttttt@gmail.com', 'Fernando Castillo Vallin', '1992-08-07T12:54:00', 'MASCULINO', 0, 'Ferprueba1', '2024-03-19', '$2y$10$roqY9TbzunrTAZ1MPoSbIezCkjXwI517VP5N5kqceKAK7ccyC7KaC', '0', '8116012795', NULL, 'rodrigo', 0, NULL, 0, 0, '2024-03-19 12:55:27', '2024-03-19 12:55:27', NULL, 'Contraseña'),
(123, 'null', 'null', 0, 'Fernando Castillo', 'ferfer@gmail.com', 'Fernando Castillo', '1997-03-10T17:29:00', 'MASCULINO', 0, 'pruebaprueba3', '2024-03-19', '$2y$10$dErQxqQtcW.srsj8vn7f6.gc7701m8YRvAS5FFOju7cm7X5eTKddC', '0', '452632541', NULL, '', 0, NULL, 0, 0, '2024-03-19 17:30:35', '2024-03-19 17:30:35', NULL, 'contrasena'),
(124, 'null', 'null', 0, 'Fernando Castillo Vallin', 'fcastillo.vallin@gmail.com', 'Fernando Castillo Vallin', '2008-03-20T11:09:00', 'MASCULINO', 0, 'pruebaprueba4', '2024-03-20', '$2y$10$HcktOAg5i1zz4c1lH0d3CeA2s.ysruFcKbuGHDiUwM9kKSwYlXala', '0', '81162738463', NULL, 'rodrigoreyes', 0, NULL, 0, 0, '2024-03-20 11:12:32', '2024-03-20 11:12:32', NULL, 'contrasena'),
(125, 'null', 'null', 0, 'fer castillo castro', 'fcastillo.vallin33@gmail.com', 'fer castillo castro', '1982-03-20T11:15:00', 'MASCULINO', 0, 'pruebaprueba5', '2024-03-20', '$2y$10$oq46rTaEe/SbxzJ/KirfnOwGkuAzhlQjwPZveHTQiZDVsHcaaubum', '0', '8112893847', NULL, 'pruebafer2', 0, NULL, 0, 0, '2024-03-20 11:15:49', '2024-03-20 11:15:49', NULL, '123123'),
(126, 'null', 'null', 0, 'fer fer castillo', 'kaksa@gmail.com', 'fer fer castillo', '2016-03-20T11:46:00', 'MASCULINO', 0, 'aaaaaaa', '2024-03-20', '$2y$10$yKomS0lQnpAYPoxAPRy2hejteOm2.NJfHE5kTh0sEWDthZlprmY/W', '0', '172847181', NULL, '', 0, NULL, 0, 0, '2024-03-20 11:47:44', '2024-03-20 11:47:44', NULL, 'sapsam-huvtix-peVbo7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `design_type` int(11) NOT NULL,
  `position` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `city_id`, `img`, `status`, `design_type`, `position`, `created_at`, `updated_at`) VALUES
(1, 0, '1685453606497.png', 0, 0, 0, '2023-05-30 07:33:26', '2023-05-30 07:33:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner_store`
--

CREATE TABLE `banner_store` (
  `id` int(11) NOT NULL,
  `banner_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `blocked_days`
--

CREATE TABLE `blocked_days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `blocked_days`
--

INSERT INTO `blocked_days` (`id`, `store_id`, `fecha`, `created_at`, `updated_at`) VALUES
(3, 48, '2024-02-29', '2024-02-26 17:27:18', '2024-02-26 17:27:18'),
(4, 48, '2024-02-26', '2024-02-26 17:27:28', '2024-02-26 17:27:28'),
(7, 49, '2024-03-23', '2024-03-20 11:04:35', '2024-03-20 11:04:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloquear`
--

CREATE TABLE `bloquear` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_report` int(11) NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `bloquear`
--

INSERT INTO `bloquear` (`id`, `user_id`, `user_report`, `details`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 41, 49, 'prueba de bloqueo', '2023-09-04 22:25:27', '2023-09-04 22:25:27', '2023-09-05 04:25:27'),
(2, 41, 49, 'PRUEBA DE BLOQUEO', '2023-09-04 22:27:56', '2023-09-04 22:27:56', '2023-09-05 04:27:56'),
(3, 41, 49, 'ddddddd', '2023-09-04 22:29:12', '2023-09-04 22:29:12', '2023-09-05 04:29:12'),
(4, 41, 49, 'sdsdfsdf', '2023-09-04 22:30:08', '2023-09-04 22:30:08', '2023-09-05 04:30:08'),
(5, 41, 49, 'orueba', '2023-09-04 22:30:49', '2023-09-04 22:30:49', '2023-09-05 04:30:49'),
(6, 41, 49, 'fffffvvvvv', '2023-09-04 22:32:24', '2023-09-04 22:32:24', '2023-09-05 04:32:24'),
(7, 41, 49, 'dsfsdfsd', '2023-09-04 22:35:20', '2023-09-04 22:35:20', '2023-09-05 04:35:20'),
(8, 41, 49, 'saddsfsdf', '2023-09-04 22:36:56', '2023-09-04 22:36:56', '2023-09-05 04:36:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cards_user`
--

CREATE TABLE `cards_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token_card` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `cart_no` varchar(250) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` varchar(250) DEFAULT NULL,
  `price_comm` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `qty_type` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_addon`
--

CREATE TABLE `cart_addon` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cart_coupen`
--

CREATE TABLE `cart_coupen` (
  `id` int(11) NOT NULL,
  `cart_no` varchar(250) DEFAULT NULL,
  `offer_id` int(11) NOT NULL,
  `code` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `amount` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cashbacks`
--

CREATE TABLE `cashbacks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `cashback` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `hora` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cashbacks`
--

INSERT INTO `cashbacks` (`id`, `store_id`, `cashback`, `status`, `hora`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 48, 10, 0, '07:53:00', '2023-08-07 08:53:25', '2023-08-07 08:54:02', NULL),
(2, 48, 23, 0, '13:53:00', '2023-08-07 08:53:40', '2023-08-07 08:54:04', NULL),
(3, 47, 15, 0, '12:00:00', '2023-08-08 06:43:13', '2023-08-08 06:43:36', NULL),
(4, 47, 20, 0, '19:00:00', '2023-08-08 06:43:32', '2023-08-08 06:43:40', NULL),
(5, 46, 18, 1, '19:00:00', '2023-08-08 06:45:40', '2023-08-08 06:45:40', NULL),
(6, 45, 25, 1, '20:00:00', '2023-08-08 06:46:13', '2023-08-08 06:46:13', NULL),
(7, 1, 17, 1, '19:00:00', '2023-08-08 06:46:43', '2023-08-08 06:46:43', NULL),
(8, 48, 6, 1, '14:32:00', '2024-02-19 11:29:27', '2024-02-19 11:30:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `type` int(11) NOT NULL,
  `required` int(11) NOT NULL,
  `single_option` int(11) NOT NULL,
  `max_options` int(11) NOT NULL,
  `id_element` varchar(255) NOT NULL,
  `sort_no` int(11) DEFAULT 0,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `store_id`, `name`, `status`, `type`, `required`, `single_option`, `max_options`, `id_element`, `sort_no`, `s_data`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sushi', 0, 0, 0, 0, 0, '', 1, 'a:0:{}', '2023-04-27 19:33:53', '2023-04-27 19:33:53'),
(2, 48, 'Pescados', 0, 0, 0, 0, 0, '', 1, 'a:0:{}', '2023-08-08 06:58:25', '2023-08-08 07:04:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorystore`
--

CREATE TABLE `categorystore` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `type_cat` int(11) NOT NULL,
  `id_cp` int(11) NOT NULL,
  `id_c` int(11) NOT NULL,
  `sort_no` int(11) NOT NULL,
  `s_data` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `categorystore`
--

INSERT INTO `categorystore` (`id`, `name`, `img`, `status`, `type_cat`, `id_cp`, `id_c`, `sort_no`, `s_data`, `created_at`, `updated_at`) VALUES
(1, 'Restaurantes', '1682645419353.jpg', 0, 0, 1, 2, 1, 'a:0:{}', '2023-08-22 01:26:16', '2023-08-21 19:26:16'),
(2, 'Grills & Kitchen', '1682645440682.jpg', 0, 1, 1, 0, 1, 'a:0:{}', '2023-04-27 19:30:40', '2023-04-27 19:30:40'),
(3, 'Comida Japonesa', '1682645455660.jpg', 0, 2, 1, 2, 1, 'a:0:{}', '2023-04-27 19:30:55', '2023-04-27 19:30:55'),
(4, 'Mariscos', '1686662271536.jpg', 0, 2, 1, 2, 1, 'a:0:{}', '2023-06-13 07:17:51', '2023-06-13 07:17:51'),
(5, 'Café', '1709316813265.png', 0, 0, 0, 0, 0, 'a:0:{}', '2024-03-01 12:13:33', '2024-03-01 12:13:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `changed_rewards`
--

CREATE TABLE `changed_rewards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gift_card_id` int(11) NOT NULL,
  `spent` double NOT NULL,
  `reward_code` varchar(100) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `changed_rewards`
--

INSERT INTO `changed_rewards` (`id`, `user_id`, `gift_card_id`, `spent`, `reward_code`, `updated_at`, `created_at`) VALUES
(2, 41, 7, 100, 'YHJD-FGWSFK-PYNO', '2023-09-09 13:46:42', '2023-09-09 13:46:42'),
(3, 41, 7, 100, 'YHJD-FGWSFK-PYNO', '2023-09-09 15:09:05', '2023-09-09 15:09:05'),
(4, 41, 7, 100, 'YHJD-FGWSFK-PYNO', '2023-09-09 15:16:26', '2023-09-09 15:16:26'),
(5, 41, 7, 100, 'YHJD-FGWSFK-PYNO', '2023-09-09 15:18:36', '2023-09-09 15:18:36'),
(6, 41, 8, 250, 'ABCD-FGHIJK-LMNO', '2023-09-09 15:38:06', '2023-09-09 15:38:06'),
(7, 41, 6, 200, 'YHJD-FGWSFK-PYNO', '2023-09-09 15:50:51', '2023-09-09 15:50:51'),
(8, 108, 6, 500, 'YHJD-FGWSFK-PYNO', '2024-01-21 16:39:57', '2024-01-21 16:39:57'),
(9, 108, 6, 500, 'YHJD-FGWSFK-PYNO', '2024-01-21 18:12:51', '2024-01-21 18:12:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `h3index` varchar(255) NOT NULL,
  `max_distance` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `c_type` int(11) NOT NULL,
  `c_value` varchar(155) NOT NULL,
  `min_distance` double NOT NULL,
  `min_value` double NOT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `city`
--

INSERT INTO `city` (`id`, `name`, `lat`, `lng`, `h3index`, `max_distance`, `status`, `c_type`, `c_value`, `min_distance`, `min_value`, `s_data`, `created_at`, `updated_at`) VALUES
(1, 'Nuevo Casas Grandes, Chih., México', '30.4124523', '-107.9144836', '8648e2077ffffff', 30, 0, 0, '0', 0, 0, 'a:0:{}', '2023-04-27 19:29:01', '2023-04-27 19:29:01'),
(2, 'Monterrey, N.L., México', '25.6866142', '-100.3161126', '8648a2077ffffff', 15, 0, 0, '0', 0, 0, 'a:0:{}', '2023-05-08 19:46:14', '2023-05-08 19:46:14'),
(4, 'Culiacán, Sin., México', '24.8090649', '-107.3940117', '864802ba7ffffff', 26, 1, 0, '0', 0, 0, 'a:0:{}', '2023-05-30 07:10:39', '2024-03-19 19:32:59'),
(5, 'Mexicali, Baja California, México', '32.6245389', '-115.4522623', '86485bb2fffffff', 100, 0, 0, '0', 0, 0, 'a:0:{}', '2023-08-18 13:15:17', '2023-08-18 13:15:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccioninits`
--

CREATE TABLE `coleccioninits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coleccioninits`
--

INSERT INTO `coleccioninits` (`id`, `nombre`, `id_user`, `imagen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Comida Rapida', 32, 'public/assets/img/coleccion/16922868353007.png', '2023-08-17 09:40:35', '2023-08-17 09:40:35', NULL),
(3, 'Carne de Res', 32, 'public/assets/img/coleccion/16922982812416.png', '2023-08-17 12:51:21', '2023-08-17 12:51:21', NULL),
(5, 'Colombiana', 32, 'public/assets/img/coleccion/16922984181390.png', '2023-08-17 12:53:38', '2023-08-17 12:53:38', NULL),
(7, 'De Mar', 32, 'public/assets/img/coleccion/16922985122904.jpg', '2023-08-17 12:55:12', '2023-08-17 12:55:12', NULL),
(8, 'alicarlo2', 32, 'public/assets/img/coleccion/16926401914073.png', '2023-08-21 11:49:51', '2023-08-21 11:49:51', NULL),
(9, 'Carne de Res', 32, 'public/assets/img/coleccion/16926419111755.png', '2023-08-21 12:18:31', '2023-08-21 12:18:31', NULL),
(10, 'alicarlo1', 32, 'public/assets/img/coleccion/16926420582769.png', '2023-08-21 12:20:58', '2023-08-21 12:20:58', NULL),
(11, 'cerdo', 32, 'public/assets/img/coleccion/16926423462206.jpg', '2023-08-21 12:25:46', '2023-08-21 12:25:46', NULL),
(12, 'ali5547455', 32, 'public/assets/img/coleccion/16926470961887.jpeg', '2023-08-21 13:44:56', '2023-08-21 13:44:56', NULL),
(13, 'ali5547455', 32, 'public/assets/img/coleccion/16926473626797.jpeg', '2023-08-21 13:49:22', '2023-08-21 13:49:22', NULL),
(14, 'Carne de Res', 32, 'public/assets/img/coleccion/16926532284449.png', '2023-08-21 15:27:08', '2023-08-21 15:27:08', NULL),
(15, 'sfsdfsfsdfsdfsdf', 32, 'public/assets/img/coleccion/16926532466683.png', '2023-08-21 15:27:26', '2023-08-21 15:27:26', NULL),
(16, 'alicarlo restaurante', 32, 'public/assets/img/coleccion/16926702895321.png', '2023-08-21 20:11:29', '2023-08-21 20:11:29', NULL),
(17, 'alicarlo prueba de la collecioon', 32, 'public/assets/img/coleccion/16927263042361.png', '2023-08-22 11:45:04', '2023-08-22 11:45:04', NULL),
(18, 'Tokin', 36, 'public/assets/img/coleccion/16928162901451.png', '2023-08-23 12:44:50', '2023-08-23 12:44:50', NULL),
(19, 'prueba miguel1', 39, 'public/assets/img/coleccion/16930053343964.png', '2023-08-25 17:15:34', '2023-08-25 17:15:34', NULL),
(20, 'prueba Miguel 2', 39, 'public/assets/img/coleccion/16930053684889.png', '2023-08-25 17:16:08', '2023-08-25 17:16:08', NULL),
(21, 'Colección de prueba', 35, 'public/assets/img/coleccion/16930091313277.png', '2023-08-25 18:18:51', '2023-08-25 18:18:51', NULL),
(22, 'ali', 41, 'public/assets/img/coleccion/16934939626539.png', '2023-08-31 08:59:22', '2023-08-31 08:59:22', NULL),
(23, 'Favoritos 🍕', 33, 'public/assets/img/coleccion/16937890785860.png', '2023-09-03 18:57:58', '2023-09-03 18:57:58', NULL),
(24, 'Favoritos', 64, 'public/assets/img/coleccion/16940495261165.png', '2023-09-06 19:18:46', '2023-09-06 19:18:46', NULL),
(25, 'Super colecion de datos', 41, 'public/assets/img/coleccion/16941688051500.png', '2023-09-08 04:26:45', '2023-09-08 04:26:45', NULL),
(26, 'Turbo mega coleccion de super datos espacio', 41, 'public/assets/img/coleccion/16941688322453.png', '2023-09-08 04:27:12', '2023-09-08 04:27:12', NULL),
(27, 'Amazon', 41, 'public/assets/img/coleccion/16941689892024.png', '2023-09-08 04:29:49', '2023-09-08 04:29:49', NULL),
(28, 'Cafés zona tec', 108, 'public/assets/img/coleccion/17062337052758.png', '2024-01-25 19:48:25', '2024-01-25 19:48:25', NULL),
(29, 'quesos', 117, 'public/assets/img/coleccion/17104607202689.png', '2024-03-14 17:58:40', '2024-03-14 17:58:40', NULL),
(30, 'prueba', 119, 'public/assets/img/coleccion/17104826413790.png', '2024-03-15 00:04:01', '2024-03-15 00:04:01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coleccions`
--

CREATE TABLE `coleccions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_coleccion` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `coleccions`
--

INSERT INTO `coleccions` (`id`, `id_coleccion`, `store_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 7, 46, 32, '2023-08-18 07:57:02', '2023-08-18 07:57:02', NULL),
(8, 7, 47, 32, '2023-08-18 07:58:02', '2023-08-18 07:58:02', NULL),
(9, 7, 48, 32, '2023-08-21 19:15:14', '2023-08-21 19:15:14', NULL),
(10, 7, 48, 32, '2023-08-21 19:17:51', '2023-08-21 19:17:51', NULL),
(11, 7, 48, 32, '2023-08-21 20:24:49', '2023-08-21 20:24:49', NULL),
(12, 3, 48, 32, '2023-08-23 11:51:24', '2023-08-23 11:51:24', NULL),
(13, 3, 47, 32, '2023-08-23 11:58:08', '2023-08-23 11:58:08', NULL),
(14, 18, 45, 36, '2023-08-23 12:49:13', '2023-08-23 12:49:13', NULL),
(15, 21, 1, 35, '2023-08-25 18:19:04', '2023-08-25 18:19:04', NULL),
(16, 23, 48, 33, '2023-09-03 18:59:40', '2023-09-03 18:59:40', NULL),
(17, 23, 46, 33, '2023-09-03 19:14:14', '2023-09-03 19:14:14', NULL),
(18, 22, 48, 41, '2023-09-05 20:23:55', '2023-09-05 20:23:55', NULL),
(19, 24, 48, 64, '2023-09-06 19:19:05', '2023-09-06 19:19:05', NULL),
(20, 27, 48, 41, '2023-09-08 04:30:01', '2023-09-08 04:30:01', NULL),
(21, 28, 47, 108, '2024-01-25 19:49:02', '2024-01-25 19:49:02', NULL),
(22, 29, 48, 117, '2024-03-14 17:59:40', '2024-03-14 17:59:40', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `commaned`
--

CREATE TABLE `commaned` (
  `id` int(11) NOT NULL,
  `external_id` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_order` varchar(15) NOT NULL,
  `address_origin` text NOT NULL,
  `address_destin` varchar(255) NOT NULL,
  `first_instr` varchar(255) NOT NULL,
  `second_instr` varchar(255) NOT NULL,
  `add_cash` double NOT NULL,
  `d_boy` int(11) NOT NULL,
  `price_comm` varchar(255) NOT NULL,
  `d_charges` double NOT NULL,
  `propine` double NOT NULL,
  `total` double NOT NULL,
  `status` double NOT NULL,
  `lat_orig` varchar(255) NOT NULL,
  `lng_orig` varchar(255) NOT NULL,
  `lat_dest` varchar(255) NOT NULL,
  `lng_dest` varchar(255) NOT NULL,
  `payment_method` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `type_order` int(11) NOT NULL,
  `pic_end_order` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `days`
--

CREATE TABLE `days` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `days`
--

INSERT INTO `days` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Lunes', '2024-02-22 14:10:33', '2024-02-22 14:10:33'),
(2, 'Martes', '2024-02-22 14:10:33', '2024-02-22 14:10:33'),
(3, 'Miercoles', '2024-02-22 14:10:33', '2024-02-22 14:10:33'),
(4, 'Jueves', '2024-02-22 14:10:33', '2024-02-22 14:10:33'),
(5, 'Viernes', '2024-02-22 14:10:33', '2024-02-22 14:10:33'),
(6, 'Sabado', '2024-02-22 14:10:33', '2024-02-22 14:10:33'),
(7, 'Domingo', '2024-02-22 14:10:33', '2024-02-22 14:10:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `delivery_boys`
--

CREATE TABLE `delivery_boys` (
  `id` int(11) NOT NULL,
  `external_id` varchar(100) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `city_id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `c_type_staff` int(11) NOT NULL,
  `c_value_staff` double NOT NULL,
  `type_driver` int(11) NOT NULL,
  `max_range_km` int(11) NOT NULL,
  `rfc` varchar(255) NOT NULL,
  `amount_acum` double NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `shw_password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `status_admin` int(11) NOT NULL,
  `status_send` int(11) NOT NULL,
  `lat` varchar(200) DEFAULT NULL,
  `lng` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposits`
--

CREATE TABLE `deposits` (
  `id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `customer_id` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_num` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `feedback_survey`
--

CREATE TABLE `feedback_survey` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id_negocio` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `descript_rating` varchar(250) NOT NULL,
  `preguntas` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `feedback_survey`
--

INSERT INTO `feedback_survey` (`id`, `user_id`, `id_negocio`, `rating`, `descript_rating`, `preguntas`, `updated_at`, `created_at`) VALUES
(1, 41, 49, 4, 'me gusto mucho la comida', '\"[\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"SI\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"NO\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Ir\\u00eda a\\u00fan as\\u00ed\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Escoger\\u00eda otro restaurante en Aciento\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"0-10 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"10-30 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"30-60 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 4,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"M\\u00e1s de 1 hora\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t],\"', '2023-08-31 21:23:01', '2023-08-31 21:23:01'),
(2, 41, 49, 4, 'me gusto mucho la comida', '\"[\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"SI\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"NO\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Ir\\u00eda a\\u00fan as\\u00ed\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Escoger\\u00eda otro restaurante en Aciento\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"0-10 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"10-30 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"30-60 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 4,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"M\\u00e1s de 1 hora\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t],\"', '2023-08-31 21:23:46', '2023-08-31 21:23:46'),
(3, 41, 49, 4, 'me gusto mucho la comida', '\"[\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"SI\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"NO\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Ir\\u00eda a\\u00fan as\\u00ed\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Escoger\\u00eda otro restaurante en Aciento\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"0-10 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"10-30 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"30-60 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 4,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"M\\u00e1s de 1 hora\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t],\"', '2023-08-31 21:24:37', '2023-08-31 21:24:37'),
(4, 41, 49, 4, 'me gusto mucho la comida', '\"[\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"SI\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"NO\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Ir\\u00eda a\\u00fan as\\u00ed\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Escoger\\u00eda otro restaurante en Aciento\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"0-10 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"10-30 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"30-60 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 4,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"M\\u00e1s de 1 hora\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t],\"', '2023-08-31 21:47:44', '2023-08-31 21:47:44'),
(5, 41, 49, 4, 'me gusto mucho la comida', '\"[\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"SI\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"NO\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Ir\\u00eda a\\u00fan as\\u00ed\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Escoger\\u00eda otro restaurante en Aciento\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"0-10 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"10-30 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"30-60 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 4,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"M\\u00e1s de 1 hora\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t],\"', '2023-08-31 21:48:02', '2023-08-31 21:48:02'),
(6, 41, 49, 4, 'me gusto mucho la comida', '\"[\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"SI\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"NO\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Ir\\u00eda a\\u00fan as\\u00ed\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"Escoger\\u00eda otro restaurante en Aciento\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\\"pregunta_string\\\": \\\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\\\",\\n\\t\\t\\t\\t\\t\\t\\\"respuesta\\\": [\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 1,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"0-10 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 2,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"10-30 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 3,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"30-60 minutos\\\"\\n\\t\\t\\t\\t\\t\\t\\t},\\n\\t\\t\\t\\t\\t\\t\\t{\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 4,\\n\\t\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"M\\u00e1s de 1 hora\\\"\\n\\t\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t\\t],\\n\\t\\t\\t\\t\\t\\t\\\"respuesta_seleccionada\\\": {\\n\\t\\t\\t\\t\\t\\t\\t\\\"id\\\": 0,\\n\\t\\t\\t\\t\\t\\t\\t\\\"respuesta_string\\\": \\\"\\\"\\n\\t\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t\\t}\\n\\t\\t\\t\\t],\"', '2023-08-31 21:48:31', '2023-08-31 21:48:31'),
(7, 41, 48, 5, 'pruebas finales', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}}]', '2023-09-01 01:21:34', '2023-09-01 01:21:34'),
(8, 41, 48, 4, 'test', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":2,\"respuesta_string\":\"NO\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":3,\"respuesta_string\":\"30-60 minutos\"}}]', '2023-09-01 01:23:57', '2023-09-01 01:23:57'),
(9, 41, 48, 5, 'prueba final 2.31 am', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":2,\"respuesta_string\":\"10-30 minutos\"}}]', '2023-09-01 03:32:01', '2023-09-01 03:32:01'),
(10, 108, 48, 4, 'muy buenq', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":3,\"respuesta_string\":\"30-60 minutos\"}}]', '2024-01-21 16:41:11', '2024-01-21 16:41:11'),
(11, 108, 48, 4, 'muy buenq', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":3,\"respuesta_string\":\"30-60 minutos\"}}]', '2024-01-21 16:41:17', '2024-01-21 16:41:17'),
(12, 110, 48, 5, 'aaaaaa', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"0-10 minutos\"}}]', '2024-03-14 15:12:03', '2024-03-14 15:12:03'),
(13, 110, 48, 5, 'ggggg', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"0-10 minutos\"}}]', '2024-03-14 16:47:30', '2024-03-14 16:47:30'),
(14, 119, 47, 5, 'mucho', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":3,\"respuesta_string\":\"30-60 minutos\"}}]', '2024-03-14 23:09:06', '2024-03-14 23:09:06'),
(15, 110, 48, 5, 'ghgdfgdfg', '[{\"id\":1,\"pregunta_string\":\"\\u00bfElegiste regresar a KAMPAI porqu\\u00e9 est\\u00e1 en Aciento?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"SI\"},{\"id\":2,\"respuesta_string\":\"NO\"}],\"respuesta_seleccionada\":{\"id\":1,\"respuesta_string\":\"SI\"}},{\"id\":2,\"pregunta_string\":\"Si no estuviera en Aciento, \\u00bfqu\\u00e9 har\\u00edas?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"Ir\\u00eda a\\u00fan as\\u00ed\"},{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}],\"respuesta_seleccionada\":{\"id\":2,\"respuesta_string\":\"Escoger\\u00eda otro restaurante en Aciento\"}},{\"id\":3,\"pregunta_string\":\"\\u00bfCu\\u00e1nto tiempo esperaste por tu mesa?\",\"respuesta\":[{\"id\":1,\"respuesta_string\":\"0-10 minutos\"},{\"id\":2,\"respuesta_string\":\"10-30 minutos\"},{\"id\":3,\"respuesta_string\":\"30-60 minutos\"},{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}],\"respuesta_seleccionada\":{\"id\":4,\"respuesta_string\":\"M\\u00e1s de 1 hora\"}}]', '2024-03-15 10:35:32', '2024-03-15 10:35:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follownegocios`
--

CREATE TABLE `follownegocios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `follownegocios`
--

INSERT INTO `follownegocios` (`id`, `store_id`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 46, 32, '2023-08-21 13:51:20', NULL, NULL),
(2, 48, 32, '2023-08-22 10:45:15', '2023-08-22 10:45:15', NULL),
(3, 45, 36, '2023-08-23 12:49:21', '2023-08-23 12:49:21', NULL),
(4, 1, 35, '2023-08-25 18:17:55', '2023-08-25 18:17:55', NULL),
(5, 48, 33, '2023-09-03 18:18:43', '2023-09-03 18:18:43', NULL),
(6, 46, 33, '2023-09-03 19:14:18', '2023-09-03 19:14:18', NULL),
(7, 48, 41, '2023-09-05 20:24:02', '2023-09-05 20:24:02', NULL),
(8, 48, 111, '2024-01-05 12:29:43', '2024-01-05 12:29:43', NULL),
(9, 47, 112, '2024-01-17 21:55:28', '2024-01-17 21:55:28', NULL),
(10, 48, 108, '2024-01-25 17:54:20', '2024-01-25 17:54:20', NULL),
(11, 47, 117, '2024-03-14 17:52:31', '2024-03-14 17:52:31', NULL),
(12, 49, 121, '2024-03-19 20:08:44', '2024-03-19 20:08:44', NULL),
(13, 49, 121, '2024-03-19 20:15:00', '2024-03-19 20:15:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seguido_id` int(11) DEFAULT NULL,
  `seguidor_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `follows`
--

INSERT INTO `follows` (`id`, `seguido_id`, `seguidor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 32, 30, '2023-08-18 06:09:45', '2023-08-18 06:09:45', NULL),
(2, 35, 32, '2023-08-18 08:16:46', '2023-08-23 13:50:05', '2023-08-23 13:50:05'),
(3, 36, 32, '2023-08-18 08:27:57', '2023-08-18 08:27:57', NULL),
(7, 25, 35, '2023-08-21 19:33:57', '2023-08-21 19:33:57', NULL),
(8, 32, 35, '2023-08-21 20:14:38', '2023-08-21 20:14:38', NULL),
(9, 37, 32, '2023-08-21 20:15:09', '2023-08-29 11:03:22', '2023-08-29 11:03:22'),
(10, 32, 36, '2023-08-23 12:50:35', '2023-08-23 12:50:35', NULL),
(11, 35, 32, '2023-08-23 13:01:14', '2023-08-23 13:51:58', '2023-08-23 13:51:58'),
(12, 35, 32, '2023-08-23 13:03:17', '2023-08-23 13:52:37', '2023-08-23 13:52:37'),
(13, 35, 32, '2023-08-23 13:03:29', '2023-08-23 13:54:40', '2023-08-23 13:54:40'),
(14, 25, 32, '2023-08-23 13:21:10', '2023-08-23 13:21:10', NULL),
(15, 35, 32, '2023-08-23 13:54:53', '2023-08-23 13:54:53', NULL),
(16, 35, 41, '2023-08-31 03:03:27', '2023-08-31 03:03:27', NULL),
(17, 26, 49, '2023-08-31 09:39:29', '2023-08-31 09:39:29', NULL),
(18, 41, 49, '2023-08-31 09:39:51', '2023-08-31 09:39:51', NULL),
(19, 41, 50, '2023-08-31 09:41:10', '2023-08-31 09:41:10', NULL),
(20, 41, 51, '2023-08-31 10:18:13', '2023-08-31 10:18:13', NULL),
(21, 49, 55, '2023-08-31 16:50:57', '2023-08-31 16:50:57', NULL),
(22, 28, 33, '2023-09-03 19:04:55', '2023-09-03 19:04:55', NULL),
(23, 41, 110, '2024-03-14 22:19:41', '2024-03-14 22:19:41', NULL),
(24, 64, 121, '2024-03-20 11:39:24', '2024-03-20 11:39:24', NULL),
(25, 30, 126, '2024-03-20 11:52:30', '2024-03-20 11:52:30', NULL),
(26, 64, 126, '2024-03-20 11:52:57', '2024-03-20 11:52:57', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gift_cards`
--

CREATE TABLE `gift_cards` (
  `id` int(11) NOT NULL,
  `logo` varchar(150) NOT NULL,
  `name` varchar(150) NOT NULL,
  `descript` varchar(150) NOT NULL,
  `codigo` varchar(150) NOT NULL,
  `trending` int(11) NOT NULL,
  `stock_g` int(11) NOT NULL,
  `recompensas` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `codigos` longtext DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `gift_cards`
--

INSERT INTO `gift_cards` (`id`, `logo`, `name`, `descript`, `codigo`, `trending`, `stock_g`, `recompensas`, `status`, `codigos`, `updated_at`, `created_at`) VALUES
(6, '1693966378640.jpg', 'UBER', 'Tarjeta de regalo de uber', 'YHJD-FGWSFK-PYNO', 0, 6, '[{\"amount\":\"100\",\"stock\":3},{\"amount\":\"500\",\"stock\":3}]', 0, NULL, '2024-01-21 18:12:51', '2023-09-05 20:12:58'),
(7, '1693966404579.png', 'AMAZON', 'Tarjeta de regalo de amazon', 'YHJD-FGWSFK-PYNO', 1, 11, '[{\"amount\":\"100\",\"stock\":1},{\"amount\":\"250\",\"stock\":5},{\"amount\":\"500\",\"stock\":5}]', 0, NULL, '2023-09-09 15:18:36', '2023-09-05 20:13:24'),
(8, '1693966425218.webp', 'Xbox', 'Tarjeta de regalo de Xbox', 'ABCD-FGHIJK-LMNO', 0, 4, '[{\"amount\":\"250\",\"stock\":4}]', 0, NULL, '2023-09-09 15:38:06', '2023-09-05 20:13:45'),
(9, '1705876441203.jpeg', 'Starbucks', 'Prueba Starbucks 1', 'sadfasdfasdfasd', 0, 5, '[{\"amount\":\"100\",\"stock\":\"5\"}]', 0, NULL, '2024-01-23 17:47:40', '2024-01-21 16:34:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horas`
--

CREATE TABLE `horas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(8) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horas`
--

INSERT INTO `horas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '7:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(2, '8:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(3, '9:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(4, '10:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(5, '11:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(6, '12:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(7, '13:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(8, '14:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(9, '15:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(10, '16:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(11, '17:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(12, '18:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(13, '19:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(14, '20:00', '2024-02-22 14:11:58', '2024-02-22 14:11:58'),
(15, '21:00', NULL, NULL),
(16, '22:00', NULL, NULL),
(17, '23:00', NULL, NULL),
(18, '00:00', NULL, NULL),
(19, '1:00', NULL, NULL),
(20, '2:00', NULL, NULL),
(21, '3:00', NULL, NULL),
(22, '4:00', NULL, NULL),
(23, '5:00', NULL, NULL),
(24, '6:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `description` varchar(1500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` int(11) NOT NULL,
  `img` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `small_price` varchar(250) DEFAULT NULL,
  `last_price` double NOT NULL,
  `medium_price` varchar(250) DEFAULT NULL,
  `large_price` varchar(250) DEFAULT NULL,
  `xlarge_price` varchar(255) DEFAULT NULL,
  `sort_no` int(11) NOT NULL DEFAULT 0,
  `nonveg` int(11) NOT NULL DEFAULT 0,
  `trending` int(11) NOT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `item`
--

INSERT INTO `item` (`id`, `store_id`, `category_id`, `name`, `description`, `status`, `img`, `small_price`, `last_price`, `medium_price`, `large_price`, `xlarge_price`, `sort_no`, `nonveg`, `trending`, `s_data`, `created_at`, `updated_at`) VALUES
(2, 48, 2, 'Pescado Milanesa 500g', '500 grs. De pescado filete', 0, '1691501038473.jpg', '150', 170, '0', '0', NULL, 1, 0, 0, 'a:2:{i:0;a:0:{}i:1;a:0:{}}', '2023-08-08 13:23:58', '2023-08-08 07:23:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_addon`
--

CREATE TABLE `item_addon` (
  `id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_loyalty`
--

CREATE TABLE `item_loyalty` (
  `id` int(11) NOT NULL,
  `loyalty_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `icon` varchar(250) DEFAULT NULL,
  `sort_no` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `language`
--

INSERT INTO `language` (`id`, `name`, `type`, `icon`, `sort_no`, `created_at`, `updated_at`) VALUES
(6, 'Español', 0, '1585506551243.png', 6, '2020-03-26 16:30:21', '2020-03-30 05:59:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `log` varchar(255) NOT NULL,
  `view` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `store_id`, `log`, `view`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'El Comercio D\'Carolas Pizza Termino de preparar el pedido #3', 2, '2022-07-13 00:38:05', '2022-07-13 00:38:05'),
(2, 1, 1, 'El pedido #3 ha sido entregado y el cliente paso a recoger.', 2, '2022-07-13 00:38:10', '2022-07-13 00:38:10'),
(3, 1, 1, 'El Comercio D\'Carolas Pizza Termino de preparar el pedido #4', 2, '2022-08-02 01:19:24', '2022-08-02 01:19:24'),
(4, 1, 1, 'El pedido #4 ha sido entregado y el cliente paso a recoger.', 2, '2022-08-02 01:20:13', '2022-08-02 01:20:13'),
(5, 1, 1, 'El pedido #5 ha sido cancelado.', 2, '2022-08-02 01:29:05', '2022-08-02 01:29:05'),
(6, 1, 1, 'El pedido #5 ha sido cancelado.', 2, '2022-08-02 01:32:09', '2022-08-02 01:32:09'),
(7, 1, 1, 'El Comercio D\'Carolas Pizza Termino de preparar el pedido #6', 2, '2022-08-02 01:32:52', '2022-08-02 01:32:52'),
(8, 1, 1, 'El pedido #6 ha sido cancelado.', 2, '2022-08-02 01:32:56', '2022-08-02 01:32:56'),
(9, 1, 1, 'El Comercio D\'Carolas Pizza Termino de preparar el pedido #7', 2, '2022-08-02 02:56:18', '2022-08-02 02:56:18'),
(10, 1, 1, 'El pedido #7 ha sido cancelado.', 2, '2022-08-02 02:56:27', '2022-08-02 02:56:27'),
(11, 1, 1, 'El Comercio D\'Carolas Pizza Termino de preparar el pedido #13', 2, '2022-09-08 12:21:13', '2022-09-08 12:21:13'),
(12, 1, 1, 'El pedido #13 ha sido cancelado.', 2, '2022-09-08 12:21:22', '2022-09-08 12:21:22'),
(13, 1, 1, 'El Comercio D\'Carolas Pizza Termino de preparar el pedido #14', 2, '2022-09-08 12:30:27', '2022-09-08 12:30:27'),
(14, 1, 1, 'El pedido #14 ha sido cancelado.', 2, '2022-09-08 12:30:34', '2022-09-08 12:30:34'),
(15, 1, 1, 'El Comercio D\'Carolas Pizza Termino de preparar el pedido #15', 2, '2022-09-08 14:08:10', '2022-09-08 14:08:10'),
(16, 1, 1, 'El pedido #15 ha sido cancelado.', 2, '2022-09-08 14:08:17', '2022-09-08 14:08:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `loyalty`
--

CREATE TABLE `loyalty` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `visits` int(11) NOT NULL,
  `consum_min` double NOT NULL,
  `offers` int(11) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_04_25_134727_add_urls_to_admin', 2),
(3, '2023_07_24_135109_create_sociales_table', 3),
(4, '2023_07_25_071052_create_sociales_negocios_table', 3),
(5, '2023_07_26_072539_create_cashbacks_table', 3),
(7, '2023_04_26_063042_add_info_to_app_user', 3),
(9, '2023_08_07_101959_add_descripcion_to_users', 5),
(10, '2023_08_07_122725_add_reserva_to_users', 5),
(11, '2023_07_26_104958_create_reservas_table', 6),
(12, '2023_08_08_080839_add_url_to_users', 7),
(15, '2023_08_08_084251_add_reserva_to_reservas', 9),
(16, '2023_08_09_080353_create_follows_table', 10),
(17, '2023_08_09_151656_add_foto_to_app_user', 10),
(18, '2023_07_20_134802_create_tickets_table', 11),
(19, '2023_08_08_140832_add_reserva_to_tickets', 11),
(20, '2023_08_15_075023_create_coleccions_table', 12),
(21, '2023_08_16_104020_create_coleccioninits_table', 13),
(22, '2023_08_16_125410_add_coleccion_to_coleccions', 14),
(23, '2023_08_17_132247_create_follownegocios_table', 15),
(24, '2023_08_24_064021_add_delete_to_app_user', 16),
(25, '2023_08_24_075658_add_fecha_cambio_to_app_user', 17),
(26, '2023_08_24_151354_create_reportars_table', 18),
(27, '2023_08_25_104246_add_fecha_to_tickets', 19),
(28, '2023_08_29_083235_add_valor_to_tickets', 20),
(29, '2023_08_29_101116_create_recompensas_table', 21),
(30, '2023_08_30_063538_add_primera_to_recompensas', 22),
(31, '2023_08_30_071748_add_recompensas_to_admin', 22),
(32, '2023_08_31_065327_add_estados_to_recompensas', 23),
(33, '2023_08_31_105959_add_divide_to_recompensas', 24),
(35, '2023_08_31_135929_add_recompensa_to_app_user', 25),
(36, '2024_02_08_164211_add_codigos_to_gift_cards_table', 26),
(37, '2024_02_20_171000_create_days_table', 1),
(38, '2024_02_20_171012_create_horas_table', 1),
(39, '2024_02_22_102530_create_schedules_table', 1),
(40, '2024_02_26_110115_create_blocked_days_table', 1),
(41, '2024_03_14_151140_add_shw_password_to_app_user_table', 27);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `title` varchar(2500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `text` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offer`
--

CREATE TABLE `offer` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL DEFAULT 0,
  `code` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `description` varchar(5000) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `img` varchar(255) NOT NULL,
  `min_cart_value` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `upto` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `value` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `start_from` varchar(250) DEFAULT NULL,
  `valid_till` varchar(250) DEFAULT NULL,
  `unique_offer` int(11) NOT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `offer_store`
--

CREATE TABLE `offer_store` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `offer_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opening_times`
--

CREATE TABLE `opening_times` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `Sun` text NOT NULL,
  `Mon` varchar(255) NOT NULL,
  `Tue` varchar(255) NOT NULL,
  `Wed` varchar(255) NOT NULL,
  `Thu` varchar(255) NOT NULL,
  `Fri` varchar(255) NOT NULL,
  `Sat` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `opening_times`
--

INSERT INTO `opening_times` (`id`, `store_id`, `Sun`, `Mon`, `Tue`, `Wed`, `Thu`, `Fri`, `Sat`, `created_at`, `updated_at`) VALUES
(1, 0, '00:00 AM - 00:00 PM', '00:00 AM - 00:00 PM', '00:00 AM - 00:00 PM', '00:00 AM - 00:00 PM', '00:00 AM - 00:00 PM', '00:00 AM - 00:00 PM', '00:00 AM - 00:00 PM', '2023-04-27 17:43:11', '2023-04-27 17:43:11'),
(2, 1, '00:00 - 00:00', 'closed', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '2023-04-27 19:32:44', '2023-08-18 12:05:55'),
(4, 45, '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '2023-06-13 07:14:52', '2023-09-10 03:27:28'),
(5, 46, '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '2023-06-13 07:21:06', '2023-08-14 14:13:46'),
(6, 47, '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '2023-06-13 07:24:08', '2023-08-15 11:17:28'),
(7, 48, '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '00:00 - 00:00', '2023-06-13 07:27:08', '2023-08-18 18:14:19'),
(8, 49, 'closed', '08:00 - 20:00', '08:00 - 20:00', '08:00 - 20:00', '07:00 - 00:00', 'closed', '08:00 - 16:00', '2024-03-19 19:52:39', '2024-03-20 11:12:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code_order` varchar(255) NOT NULL,
  `external_id` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `address` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `InnStore` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `d_charges` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `t_charges` double NOT NULL,
  `price_comm` varchar(255) NOT NULL,
  `discount` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `total` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `status` double NOT NULL DEFAULT 0,
  `status_by` int(11) NOT NULL DEFAULT 0,
  `status_time` varchar(250) DEFAULT NULL,
  `d_boy` int(11) NOT NULL DEFAULT 0,
  `notes` varchar(2500) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `payment_method` int(11) NOT NULL DEFAULT 0,
  `payment_id` varchar(2500) DEFAULT NULL,
  `use_mon` int(11) NOT NULL,
  `uso_monedero` double NOT NULL,
  `monedero` double NOT NULL,
  `lat` varchar(250) DEFAULT NULL,
  `lng` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_staff`
--

CREATE TABLE `orders_staff` (
  `id` int(11) NOT NULL,
  `external_id` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `d_boy` int(11) NOT NULL,
  `type` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_addon`
--

CREATE TABLE `order_addon` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `addon_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `cart_no` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` varchar(250) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `qty_type` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `about_us` text DEFAULT NULL,
  `about_img` text DEFAULT NULL,
  `how` text DEFAULT NULL,
  `how_img` text DEFAULT NULL,
  `faq` text DEFAULT NULL,
  `contact_us` text DEFAULT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`id`, `about_us`, `about_img`, `how`, `how_img`, `faq`, `contact_us`, `s_data`, `created_at`, `updated_at`) VALUES
(1, 'About Us', NULL, NULL, NULL, NULL, NULL, 'a:4:{i:0;a:0:{}i:1;a:0:{}i:2;a:0:{}i:3;a:0:{}}', '2022-06-28 23:11:07', '2023-04-25 15:29:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perm`
--

CREATE TABLE `perm` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `perm` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `shw_password` varchar(300) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `perm`
--

INSERT INTO `perm` (`id`, `username`, `name`, `perm`, `password`, `shw_password`, `created_at`, `updated_at`) VALUES
(1, '', 'Dashboard - Inicio', 'perm-1', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '', 'Dashboard - Configuraciones', 'perm-1-1', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '', 'Dashboard - Categorias', 'perm-1-2', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '', 'Dashboard - Textos de la aplicacion', 'perm-1-3', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '', 'Banners', 'perm-2', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '', 'Administrar Ciudades', 'perm-3', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '', 'Paginas de la aplicacion', 'perm-4', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '', 'Adminisrtar Restaurantes', 'perm-5', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '', 'Ofertas de descuento', 'perm-6', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '', 'Repartidores', 'perm-7', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, '', 'Gestion de pedidos', 'perm-8', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, '', 'Notificaciones push', 'perm-9', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, '', 'Reportes de ventas', 'perm-10', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, '', 'Usuarios Registrados', 'perm-11', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(15, '', 'Pagos Negocios', 'perm-12', '', '', '2021-10-14 01:02:54', '0000-00-00 00:00:00'),
(16, '', 'Gestion de servicios', 'perm-13', '', '', '2022-06-02 07:34:30', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate`
--

CREATE TABLE `rate` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `star` int(11) NOT NULL DEFAULT 0,
  `star_staff1` int(11) NOT NULL,
  `star_staff2` int(11) NOT NULL,
  `comment` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `comment_staff` text DEFAULT NULL,
  `sanit_process` int(11) DEFAULT NULL,
  `status_prod` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rate_staff`
--

CREATE TABLE `rate_staff` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `d_boy` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recompensas`
--

CREATE TABLE `recompensas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `visto` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 no y 1 si',
  `primaria` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 normal y 1 primaria',
  `reserva` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `divide` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_negocio` int(11) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `recompensas`
--

INSERT INTO `recompensas` (`id`, `visto`, `primaria`, `reserva`, `fecha`, `valor`, `divide`, `id_cliente`, `id_negocio`, `descripcion`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 0, 10, '2023-08-29', 55, NULL, 32, 46, '20%', 0, '2023-08-29 14:21:31', '2023-09-12 18:34:58', NULL),
(3, 0, 1, NULL, '2023-08-30', 50.5, NULL, 36, NULL, 'Referencia de nuevo usuario :Tokin', 0, '2023-08-30 11:11:52', '2023-08-31 13:30:00', '2023-08-31 13:30:00'),
(4, 0, 0, 30, '2023-08-30', 44.7, NULL, 36, 48, 'Reserva Activa', 0, '2023-08-30 14:57:45', '2023-08-31 13:30:00', '2023-08-31 13:30:00'),
(9, 1, 0, NULL, '2023-08-31', 31.733333333333, 36, 32, NULL, 'División de recompensa : tokin', 0, '2023-08-31 13:29:59', '2023-08-31 13:29:59', NULL),
(10, 1, 0, NULL, '2023-08-31', 31.733333333333, 36, 34, NULL, 'División de recompensa : tokin', 0, '2023-08-31 13:29:59', '2023-08-31 13:29:59', NULL),
(11, 1, 0, NULL, '2023-08-31', 31.733333333333, 36, 36, NULL, 'División de recompensa', 0, '2023-08-31 13:30:00', '2023-08-31 13:30:00', NULL),
(12, 0, 0, NULL, '2023-08-31', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-08-31 13:47:14', '2023-08-31 20:01:46', '2023-08-31 20:01:46'),
(13, 0, 0, NULL, '2023-08-31', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-08-31 15:45:45', '2023-08-31 20:01:46', '2023-08-31 20:01:46'),
(14, 0, 0, NULL, '2023-08-31', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-08-31 16:01:38', '2023-08-31 20:01:46', '2023-08-31 20:01:46'),
(15, 1, 0, NULL, '2023-08-31', 50.5, NULL, 49, NULL, 'Referencia de nuevo usuario :JOTARO', 0, '2023-08-31 16:22:08', '2023-08-31 16:24:48', NULL),
(16, 1, 0, NULL, '2023-08-31', 50.5, NULL, 49, NULL, 'Referencia de nuevo usuario :JOTARO', 0, '2023-08-31 16:26:49', '2023-08-31 16:29:00', NULL),
(17, 1, 0, NULL, '2023-08-31', 50.5, NULL, 49, NULL, 'Referencia de nuevo usuario :JOTARO', 0, '2023-08-31 16:33:13', '2023-08-31 16:36:43', NULL),
(18, 0, 0, NULL, '2023-08-31', 50.5, NULL, 49, NULL, 'Referencia de nuevo usuario :JOTARO', 0, '2023-08-31 16:40:03', '2023-08-31 16:57:01', '2023-08-31 16:57:01'),
(19, 1, 0, NULL, '2023-08-31', 25.25, 49, 55, NULL, 'División de recompensa : JOTARO', 0, '2023-08-31 16:57:01', '2023-08-31 16:57:01', NULL),
(20, 1, 0, NULL, '2023-08-31', 25.25, 49, 49, NULL, 'División de recompensa', 0, '2023-08-31 16:57:01', '2023-08-31 16:57:01', NULL),
(23, 0, 0, 35, '2023-08-31', 10, NULL, 41, 47, 'prueba alicarlo', 0, '2023-08-31 19:29:29', '2023-08-31 20:01:46', '2023-08-31 20:01:46'),
(24, 1, 0, NULL, '2023-08-31', 80.75, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-08-31 20:01:46', '2023-08-31 20:01:46', NULL),
(25, 1, 0, NULL, '2023-08-31', 80.75, 41, 41, NULL, 'División de recompensa', 0, '2023-08-31 20:01:46', '2023-08-31 20:01:46', NULL),
(26, 1, 0, NULL, '2023-08-31', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-08-31 20:02:56', '2023-08-31 23:30:46', NULL),
(27, 0, 0, 38, '2023-08-31', 10, NULL, 41, 48, 'alicarlo test', 0, '2023-08-31 23:36:44', '2023-09-01 00:52:11', '2023-09-01 00:52:11'),
(28, 1, 0, NULL, '2023-09-01', 3.3333333333333, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 00:52:11', '2023-09-01 00:52:11', NULL),
(29, 1, 0, NULL, '2023-09-01', 3.3333333333333, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 00:52:11', '2023-09-01 00:52:11', NULL),
(30, 1, 0, NULL, '2023-09-01', 3.3333333333333, 41, 41, NULL, 'División de recompensa', 0, '2023-09-01 00:52:11', '2023-09-01 00:52:11', NULL),
(31, 0, 0, NULL, '2023-09-01', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-01 00:54:35', '2023-09-01 00:55:25', '2023-09-01 00:55:25'),
(32, 1, 0, NULL, '2023-09-01', 25.25, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 00:55:25', '2023-09-01 00:55:25', NULL),
(33, 1, 0, NULL, '2023-09-01', 25.25, 41, 41, NULL, 'División de recompensa', 0, '2023-09-01 00:55:25', '2023-09-01 00:55:25', NULL),
(34, 0, 0, NULL, '2023-09-01', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-01 00:57:01', '2023-09-01 00:57:37', '2023-09-01 00:57:37'),
(35, 1, 0, NULL, '2023-09-01', 25.25, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 00:57:37', '2023-09-01 00:57:37', NULL),
(36, 1, 0, NULL, '2023-09-01', 25.25, 41, 41, NULL, 'División de recompensa', 0, '2023-09-01 00:57:37', '2023-09-01 00:57:37', NULL),
(37, 1, 0, 42, '2023-09-01', 4, NULL, 41, 48, 'test', 0, '2023-09-01 01:20:40', '2023-09-01 01:21:14', NULL),
(38, 0, 0, 41, '2023-09-01', 4, NULL, 41, 48, '4444', 0, '2023-09-01 01:23:12', '2023-09-01 01:23:42', '2023-09-01 01:23:42'),
(39, 1, 0, NULL, '2023-09-01', 1.3333333333333, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 01:23:42', '2023-09-01 01:23:42', NULL),
(40, 1, 0, NULL, '2023-09-01', 1.3333333333333, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 01:23:42', '2023-09-01 01:23:42', NULL),
(41, 1, 0, NULL, '2023-09-01', 1.3333333333333, 41, 41, NULL, 'División de recompensa', 0, '2023-09-01 01:23:42', '2023-09-01 01:23:42', NULL),
(42, 0, 0, 39, '2023-09-01', 12, NULL, 41, 48, '12222', 0, '2023-09-01 03:30:26', '2023-09-01 03:31:31', '2023-09-01 03:31:31'),
(43, 1, 0, NULL, '2023-09-01', 4, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 03:31:31', '2023-09-01 03:31:31', NULL),
(44, 1, 0, NULL, '2023-09-01', 4, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-01 03:31:31', '2023-09-01 03:31:31', NULL),
(45, 1, 0, NULL, '2023-09-01', 4, 41, 41, NULL, 'División de recompensa', 0, '2023-09-01 03:31:31', '2023-09-01 03:31:31', NULL),
(46, 1, 0, NULL, '2023-09-01', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-01 14:20:29', '2023-09-01 14:20:50', NULL),
(47, 1, 0, NULL, '2023-09-01', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-01 14:29:51', '2023-09-04 10:53:33', NULL),
(48, 1, 0, 50, '2023-09-05', 250, NULL, 64, 48, '251', 0, '2023-09-05 20:15:32', '2023-09-05 20:34:19', NULL),
(49, 0, 0, NULL, '2023-09-05', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-05 20:40:08', '2023-09-05 21:13:13', '2023-09-05 21:13:13'),
(50, 1, 0, NULL, '2023-09-05', 25.25, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-05 21:13:13', '2023-09-05 21:13:13', NULL),
(51, 1, 0, NULL, '2023-09-05', 25.25, 41, 41, NULL, 'División de recompensa', 0, '2023-09-05 21:13:13', '2023-09-05 21:13:13', NULL),
(52, 1, 0, NULL, '2023-09-05', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-05 21:14:18', '2023-09-05 21:14:50', NULL),
(53, 1, 0, NULL, '2023-09-05', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-05 21:19:24', '2023-09-05 21:19:47', NULL),
(54, 1, 0, 55, '2023-09-05', 300, NULL, 64, 48, '350', 0, '2023-09-05 21:27:48', '2023-09-05 21:28:04', NULL),
(55, 0, 0, NULL, '2023-09-05', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-05 21:31:36', '2023-09-05 21:32:04', '2023-09-05 21:32:04'),
(56, 1, 0, NULL, '2023-09-05', 25.25, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-05 21:32:04', '2023-09-05 21:32:04', NULL),
(57, 1, 0, NULL, '2023-09-05', 25.25, 41, 41, NULL, 'División de recompensa', 0, '2023-09-05 21:32:04', '2023-09-05 21:32:04', NULL),
(58, 1, 0, NULL, '2023-09-05', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-05 21:34:22', '2023-09-05 21:35:06', NULL),
(59, 0, 0, NULL, '2023-09-06', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-06 09:14:38', '2023-09-06 09:15:27', '2023-09-06 09:15:27'),
(60, 1, 0, NULL, '2023-09-06', 16.833333333333, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-06 09:15:26', '2023-09-06 09:15:26', NULL),
(61, 1, 0, NULL, '2023-09-06', 16.833333333333, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-06 09:15:26', '2023-09-06 09:15:26', NULL),
(62, 1, 0, NULL, '2023-09-06', 16.833333333333, 41, 41, NULL, 'División de recompensa', 0, '2023-09-06 09:15:27', '2023-09-06 09:15:27', NULL),
(63, 0, 0, NULL, '2023-09-06', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-06 09:17:51', '2023-09-06 09:18:30', '2023-09-06 09:18:30'),
(64, 1, 0, NULL, '2023-09-06', 16.833333333333, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-06 09:18:30', '2023-09-06 09:18:30', NULL),
(65, 1, 0, NULL, '2023-09-06', 16.833333333333, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-06 09:18:30', '2023-09-06 09:18:30', NULL),
(66, 1, 0, NULL, '2023-09-06', 16.833333333333, 41, 41, NULL, 'División de recompensa', 0, '2023-09-06 09:18:30', '2023-09-06 09:18:30', NULL),
(67, 1, 0, NULL, '2023-09-06', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-06 09:20:50', '2023-09-06 09:21:53', NULL),
(68, 0, 0, NULL, '2023-09-06', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-06 20:16:47', '2023-09-06 20:19:11', '2023-09-06 20:19:11'),
(69, 1, 0, NULL, '2023-09-06', 25.25, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-06 20:19:10', '2023-09-06 20:19:10', NULL),
(70, 1, 0, NULL, '2023-09-06', 25.25, 41, 41, NULL, 'División de recompensa', 0, '2023-09-06 20:19:11', '2023-09-06 20:19:11', NULL),
(71, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 05:30:12', '2023-09-07 05:41:39', NULL),
(72, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 05:45:11', '2023-09-07 05:45:52', NULL),
(73, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 05:47:02', '2023-09-07 05:56:21', NULL),
(74, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 05:54:52', '2023-09-07 05:56:21', NULL),
(75, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 06:04:46', '2023-09-07 06:05:02', NULL),
(76, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 09:52:50', '2023-09-07 09:56:09', NULL),
(77, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 09:57:10', '2023-09-07 10:00:11', NULL),
(78, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 10:00:59', '2023-09-07 10:04:25', NULL),
(79, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 11:08:29', '2023-09-07 11:12:58', NULL),
(80, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 13:50:45', '2023-09-07 14:01:08', NULL),
(81, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 13:53:33', '2023-09-07 14:01:08', NULL),
(82, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 13:54:16', '2023-09-07 14:01:08', NULL),
(83, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 13:55:35', '2023-09-07 14:01:08', NULL),
(84, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 13:57:07', '2023-09-07 14:01:08', NULL),
(85, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 14:04:51', '2023-09-07 14:08:10', NULL),
(86, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 14:06:06', '2023-09-07 14:08:10', NULL),
(87, 1, 0, NULL, '2023-09-07', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-07 14:08:49', '2023-09-07 14:10:56', NULL),
(88, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 02:01:18', '2023-09-08 02:04:55', NULL),
(89, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 02:08:41', '2023-09-08 02:10:50', NULL),
(90, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 02:12:51', '2023-09-08 02:14:23', NULL),
(91, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 02:17:37', '2023-09-08 02:41:51', NULL),
(92, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 03:32:27', '2023-09-08 03:34:13', NULL),
(93, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 03:38:28', '2023-09-08 03:44:11', NULL),
(94, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 03:45:09', '2023-09-08 03:57:40', NULL),
(95, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 03:49:24', '2023-09-08 03:57:40', NULL),
(96, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 03:54:12', '2023-09-08 03:57:40', NULL),
(97, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 03:58:26', '2023-09-08 03:59:01', NULL),
(98, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 04:01:16', '2023-09-08 04:03:28', NULL),
(99, 0, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 04:04:58', '2023-09-08 04:06:09', '2023-09-08 04:06:09'),
(100, 1, 0, NULL, '2023-09-08', 16.833333333333, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-08 04:06:08', '2023-09-08 04:06:08', NULL),
(101, 1, 0, NULL, '2023-09-08', 16.833333333333, 41, 51, NULL, 'División de recompensa : alicarlo', 0, '2023-09-08 04:06:08', '2023-09-08 04:06:08', NULL),
(102, 1, 0, NULL, '2023-09-08', 16.833333333333, 41, 41, NULL, 'División de recompensa', 0, '2023-09-08 04:06:09', '2023-09-08 04:06:09', NULL),
(103, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 04:12:00', '2023-09-08 04:12:59', NULL),
(104, 0, 0, 36, '2023-09-08', 10, NULL, 41, 47, 'prueba ali', 0, '2023-09-08 04:36:19', '2023-09-08 04:36:48', '2023-09-08 04:36:48'),
(105, 1, 0, NULL, '2023-09-08', 2.5, 41, 49, NULL, 'División de recompensa : alicarlo', 0, '2023-09-08 04:36:47', '2023-09-08 04:36:47', NULL),
(106, 1, 0, NULL, '2023-09-08', 2.5, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-08 04:36:47', '2023-09-08 04:36:47', NULL),
(107, 1, 0, NULL, '2023-09-08', 2.5, 41, 51, NULL, 'División de recompensa : alicarlo', 0, '2023-09-08 04:36:47', '2023-09-08 04:36:47', NULL),
(108, 1, 0, NULL, '2023-09-08', 2.5, 41, 41, NULL, 'División de recompensa', 0, '2023-09-08 04:36:48', '2023-09-08 04:36:48', NULL),
(109, 1, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 09:43:23', '2023-09-08 09:50:25', NULL),
(110, 0, 0, NULL, '2023-09-08', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-08 09:51:08', '2023-09-08 09:54:20', '2023-09-08 09:54:20'),
(111, 1, 0, NULL, '2023-09-08', 16.833333333333, 41, 65, NULL, 'División de recompensa : alicarlo', 0, '2023-09-08 09:54:20', '2023-09-08 09:54:20', NULL),
(112, 1, 0, NULL, '2023-09-08', 16.833333333333, 41, 50, NULL, 'División de recompensa : alicarlo', 0, '2023-09-08 09:54:20', '2023-09-08 09:54:20', NULL),
(113, 1, 0, NULL, '2023-09-08', 16.833333333333, 41, 41, NULL, 'División de recompensa', 0, '2023-09-08 09:54:20', '2023-09-08 09:54:20', NULL),
(114, 0, 0, NULL, '2023-09-09', 50.5, NULL, 41, NULL, 'Referencia de nuevo usuario :alicarlo', 0, '2023-09-09 13:23:52', '2023-09-09 13:24:42', '2023-09-09 13:24:42'),
(115, 1, 0, NULL, '2023-09-09', 16.833333333333, 41, 66, NULL, 'División de recompensa : alicarlo', 0, '2023-09-09 13:24:42', '2023-09-09 13:24:42', NULL),
(116, 1, 0, NULL, '2023-09-09', 16.833333333333, 41, 51, NULL, 'División de recompensa : alicarlo', 0, '2023-09-09 13:24:42', '2023-09-09 13:24:42', NULL),
(117, 1, 0, NULL, '2023-09-09', 16.833333333333, 41, 41, NULL, 'División de recompensa', 0, '2023-09-09 13:24:42', '2023-09-09 13:24:42', NULL),
(118, 1, 0, 57, '2024-01-21', 500, NULL, 108, 48, '501', 0, '2024-01-21 16:38:41', '2024-01-21 16:40:24', NULL),
(119, 0, 0, 58, '2024-01-21', 500, NULL, 108, 48, '500', 0, '2024-01-21 18:07:12', '2024-01-21 18:11:30', '2024-01-21 18:11:30'),
(120, 1, 0, NULL, '2024-01-21', 250, 108, 25, NULL, 'División de recompensa : pruebafer2', 0, '2024-01-21 18:11:30', '2024-01-21 18:11:30', NULL),
(121, 1, 0, NULL, '2024-01-21', 250, 108, 108, NULL, 'División de recompensa', 0, '2024-01-21 18:11:30', '2024-01-21 18:11:30', NULL),
(122, 0, 0, 53, '2024-03-14', 100, NULL, 41, 48, '100', 0, '2024-03-14 15:18:56', '2024-03-14 15:18:56', NULL),
(123, 0, 0, 59, '2024-03-14', 100, NULL, 110, 48, '100', 0, '2024-03-14 15:19:38', '2024-03-14 15:19:38', NULL),
(124, 0, 0, NULL, '2024-03-14', 50.5, NULL, 117, NULL, 'Referencia de nuevo usuario :mikiss2', 0, '2024-03-14 17:28:57', '2024-03-14 17:28:57', NULL),
(125, 0, 0, NULL, '2024-03-20', 50.5, NULL, 108, NULL, 'Referencia de nuevo usuario :pruebafer2', 0, '2024-03-20 11:15:49', '2024-03-20 11:15:49', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportars`
--

CREATE TABLE `reportars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seguido_id` int(11) DEFAULT NULL,
  `seguidor_id` int(11) DEFAULT NULL,
  `detalle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reportars`
--

INSERT INTO `reportars` (`id`, `seguido_id`, `seguidor_id`, `detalle`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 49, 41, 'detalle prueba', '2023-09-04 21:26:30', '2023-09-04 21:26:30', NULL),
(2, 49, 41, 'prueba alicarlo', '2023-09-04 21:57:03', '2023-09-04 21:57:03', NULL),
(3, 49, 41, 'PRUEBA DETALLE', '2023-09-04 22:27:01', '2023-09-04 22:27:01', NULL),
(4, 49, 41, 'sadsadsadsa', '2023-09-04 22:37:05', '2023-09-04 22:37:05', NULL),
(5, 49, 41, 'dfsdfsdf', '2023-09-04 22:38:17', '2023-09-04 22:38:17', NULL),
(6, 49, 41, 'sdadsadsadas', '2023-09-04 22:38:41', '2023-09-04 22:38:41', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reserva` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0-con reservacion y 1 sin reservacion',
  `store_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `invitados` int(11) DEFAULT NULL,
  `recompensa` int(11) DEFAULT NULL,
  `primera` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `reserva`, `store_id`, `user_id`, `invitados`, `recompensa`, `primera`, `fecha`, `hora`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 0, 48, 32, 2, 20, NULL, '2023-08-09', '04:47:00', 2, '2023-08-09 09:26:46', '2023-08-23 07:41:20', NULL),
(3, 0, 48, 32, 2, 20, NULL, '2023-08-09', '04:47:00', 2, '2023-08-09 09:30:26', '2023-08-29 12:57:17', NULL),
(4, 0, 47, 32, 2, 20, NULL, '2023-08-09', '04:47:00', 2, '2023-08-09 09:31:36', '2023-08-28 14:43:50', NULL),
(5, 0, 48, 32, 2, 20, NULL, '2023-08-09', '04:47:00', 3, '2023-08-09 09:32:18', '2024-01-15 17:32:42', NULL),
(6, 0, 48, 32, 2, 20, NULL, '2023-08-07', '06:30:00', 1, '2023-08-09 09:35:35', '2023-08-09 09:35:35', NULL),
(7, 1, 1, 32, 2, 16, NULL, '2023-08-07', '06:30:00', 1, '2023-08-09 09:36:32', '2023-08-09 09:36:32', NULL),
(8, 1, 1, 32, 4, 16, NULL, '2023-08-15', '10:29:00', 2, '2023-08-11 00:42:59', '2023-08-23 07:43:07', NULL),
(9, 0, 47, 32, 7, 20, NULL, '2023-08-31', '11:24:00', 3, '2023-08-11 06:09:54', '2023-08-15 08:18:18', NULL),
(10, 0, 48, 32, 7, 20, NULL, '2023-08-31', '11:24:00', 2, '2023-08-12 07:30:58', '2023-08-29 14:21:31', NULL),
(11, 0, 48, 32, 2, 20, NULL, '2023-08-14', '19:31:00', 3, '2023-08-14 20:36:18', '2023-08-15 06:12:33', NULL),
(12, 0, 48, 32, 2, 20, NULL, '2023-08-14', '19:31:00', 1, '2023-08-15 08:21:37', '2023-08-15 08:21:37', NULL),
(13, 0, 48, 32, 2, 20, NULL, '2023-08-14', '19:31:00', 2, '2023-08-15 08:21:47', '2023-08-23 07:42:10', NULL),
(14, 0, 47, 32, 2, 20, NULL, '2023-08-14', '19:31:00', 1, '2023-08-15 08:22:08', '2023-08-15 08:22:08', NULL),
(15, 0, 47, 32, 2, 20, NULL, '2023-08-14', '19:31:00', 1, '2023-08-15 08:22:16', '2023-08-15 08:22:16', NULL),
(16, 0, 48, 32, 2, 20, NULL, '2023-08-23', '19:31:00', 3, '2023-08-15 08:24:11', '2023-08-15 08:24:42', NULL),
(17, 0, 48, 32, 2, 20, NULL, '2023-08-23', '19:31:00', 3, '2023-08-15 08:24:20', '2023-08-18 13:51:22', NULL),
(18, 1, 1, 32, 2, 16, NULL, '2023-08-23', '19:31:00', 3, '2023-08-15 08:33:57', '2023-08-18 13:56:52', NULL),
(19, 0, 48, 36, 2, 20, NULL, '2023-08-09', '10:57:00', 2, '2023-08-15 09:14:52', '2023-08-23 07:41:34', NULL),
(20, 0, 48, 36, 2, 20, NULL, '2023-08-15', '10:57:00', 3, '2023-08-15 09:17:52', '2023-08-29 07:04:35', NULL),
(21, 0, 47, 33, 2, 20, NULL, '2023-08-18', '13:37:00', 3, '2023-08-18 13:38:58', '2023-08-18 13:39:17', NULL),
(22, 0, 47, 33, 3, 20, NULL, '2023-08-18', '13:45:00', 3, '2023-08-18 13:46:49', '2023-08-18 13:47:01', NULL),
(23, 0, 47, 32, 2, 20, NULL, '2023-08-18', '08:35:00', 3, '2023-08-18 13:53:43', '2023-08-18 13:59:55', NULL),
(24, 0, 47, 32, 2, 20, NULL, '2023-08-18', '08:35:00', 1, '2023-08-18 13:55:00', '2023-08-18 13:55:00', NULL),
(25, 0, 47, 32, 2, 20, NULL, '2023-08-18', '08:35:00', 2, '2023-08-18 13:55:11', '2023-08-28 09:09:38', NULL),
(26, 0, 47, 32, 2, 20, NULL, '2023-08-18', '08:35:00', 1, '2023-08-18 13:56:40', '2023-08-18 13:56:40', NULL),
(27, 0, 47, 32, 2, 20, NULL, '2023-08-22', '16:39:00', 1, '2023-08-22 18:05:55', '2023-08-22 18:05:55', NULL),
(28, 0, 48, 33, 3, 20, NULL, '2023-08-22', '17:55:00', 1, '2023-08-22 18:11:33', '2023-08-22 18:11:33', NULL),
(29, 0, 48, 33, 3, 20, NULL, '2023-08-23', '17:55:00', 2, '2023-08-23 10:10:58', '2023-08-28 09:09:01', NULL),
(30, 0, 48, 36, 2, 20, NULL, '2023-08-23', '13:43:00', 2, '2023-08-23 12:46:36', '2023-08-30 14:57:45', NULL),
(31, 0, 48, 32, 2, 20, NULL, '2023-08-23', '16:39:00', 1, '2023-08-23 20:31:30', '2023-08-23 20:31:30', NULL),
(32, 0, 48, 33, 2, 20, NULL, '2023-08-25', '17:01:00', 3, '2023-08-25 17:03:22', '2023-08-25 17:14:00', NULL),
(33, 0, 48, 41, 2, 20, NULL, '2023-08-29', '11:04:00', 2, '2023-08-29 12:04:51', '2023-08-29 12:15:58', NULL),
(34, 0, 48, 41, 2, 20, NULL, '2023-08-29', '11:04:00', 3, '2023-08-29 12:05:07', '2023-08-29 12:16:28', NULL),
(35, 0, 47, 41, 2, 20, NULL, '2023-08-29', '11:04:00', 2, '2023-08-29 12:05:16', '2023-08-29 13:08:42', NULL),
(36, 0, 47, 41, 2, 20, NULL, '2023-08-29', '11:04:00', 2, '2023-08-29 12:05:38', '2023-09-08 04:36:19', NULL),
(37, 0, 48, 36, 2, 20, NULL, '2023-08-30', '13:43:00', 1, '2023-08-30 08:37:47', '2023-08-30 08:37:47', NULL),
(38, 0, 48, 41, 2, 20, NULL, '2023-08-30', '16:02:00', 2, '2023-08-30 17:04:44', '2023-08-31 23:36:44', NULL),
(39, 0, 48, 41, 2, 20, NULL, '2023-08-31', '00:53:00', 2, '2023-08-31 03:04:02', '2023-09-01 03:30:26', NULL),
(40, 1, 1, 35, 2, 16, NULL, '2023-08-31', '09:56:00', 1, '2023-08-31 09:58:56', '2023-08-31 09:58:56', NULL),
(41, 0, 48, 41, 2, 20, NULL, '2023-08-31', '03:31:00', 2, '2023-08-31 23:35:43', '2023-09-01 01:23:12', NULL),
(42, 0, 48, 41, 2, 20, NULL, '2023-08-31', '23:57:00', 2, '2023-09-01 01:02:14', '2023-09-01 01:20:40', NULL),
(43, 0, 47, 41, 2, 20, NULL, '2023-08-31', '23:57:00', 1, '2023-09-01 01:02:24', '2023-09-01 01:02:24', NULL),
(44, 0, 48, 41, 2, 20, NULL, '2023-08-31', '03:31:00', 1, '2023-09-01 03:28:21', '2023-09-01 03:28:21', NULL),
(45, 0, 47, 41, 2, 20, NULL, '2023-08-31', '03:31:00', 1, '2023-09-01 03:28:29', '2023-09-01 03:28:29', NULL),
(46, 0, 48, 33, 4, 20, NULL, '2023-09-03', '18:30:00', 3, '2023-09-03 18:27:12', '2023-09-03 18:28:48', NULL),
(47, 0, 48, 41, 2, 20, NULL, '2023-09-04', '18:55:00', 1, '2023-09-04 19:56:42', '2023-09-04 19:56:42', NULL),
(48, 0, 48, 41, 2, 20, NULL, '2023-09-04', '18:55:00', 1, '2023-09-04 19:56:50', '2023-09-04 19:56:50', NULL),
(49, 0, 47, 41, 2, 20, NULL, '2023-09-04', '18:55:00', 1, '2023-09-04 19:56:59', '2023-09-04 19:56:59', NULL),
(50, 0, 48, 64, 2, 20, NULL, '2023-09-06', '15:30:00', 2, '2023-09-05 19:59:58', '2023-09-05 20:15:32', NULL),
(51, 0, 48, 41, 2, 20, NULL, '2023-09-05', '18:25:00', 1, '2023-09-05 20:02:11', '2023-09-05 20:02:11', NULL),
(52, 0, 47, 41, 2, 20, NULL, '2023-09-05', '18:25:00', 1, '2023-09-05 20:02:22', '2023-09-05 20:02:22', NULL),
(53, 0, 48, 41, 2, 20, NULL, '2023-09-05', '18:25:00', 2, '2023-09-05 20:24:06', '2024-03-14 15:18:56', NULL),
(54, 0, 48, 65, 2, 20, NULL, '2023-09-05', '19:40:00', 1, '2023-09-05 20:59:59', '2023-09-05 20:59:59', NULL),
(55, 0, 48, 64, 2, 20, NULL, '2023-09-06', '15:30:00', 2, '2023-09-05 21:24:50', '2023-09-05 21:27:48', NULL),
(56, 0, 48, 64, 2, 20, NULL, '2023-09-06', '15:30:00', 1, '2023-09-06 18:59:37', '2023-09-06 18:59:37', NULL),
(57, 0, 48, 108, 2, 20, NULL, '2024-01-21', '16:36:00', 2, '2024-01-21 16:38:00', '2024-01-21 16:38:41', NULL),
(58, 0, 48, 108, 2, 20, NULL, '2024-01-22', '17:33:00', 2, '2024-01-21 17:39:20', '2024-01-21 18:07:12', NULL),
(59, 1, 48, 110, 3, 20, NULL, '2024-03-14', '11:12:00', 2, '2024-03-14 12:12:17', '2024-03-14 15:19:38', NULL),
(60, 1, 48, 110, 3, 20, NULL, '2024-03-14', '11:57:00', 1, '2024-03-14 12:57:42', '2024-03-14 12:57:42', NULL),
(61, 1, 48, 110, 3, 20, NULL, '2024-03-14', '15:43:00', 1, '2024-03-14 16:43:54', '2024-03-14 16:43:54', NULL),
(62, 1, 48, 117, 5, 20, NULL, '2024-04-30', '17:56:00', 1, '2024-03-14 17:56:36', '2024-03-14 17:56:36', NULL),
(63, 1, 48, 120, 4, 20, NULL, '2024-03-15', '14:24:00', 1, '2024-03-15 14:24:57', '2024-03-15 14:24:57', NULL),
(64, 1, 48, 121, 78, 20, NULL, '2024-03-19', '19:21:00', 1, '2024-03-19 19:21:14', '2024-03-19 19:21:14', NULL),
(65, 1, 48, 121, 78, 20, NULL, '2024-03-21', '22:28:00', 1, '2024-03-20 11:32:57', '2024-03-20 11:32:57', NULL),
(66, 1, 48, 126, 2, 20, NULL, '2024-03-20', '11:47:00', 1, '2024-03-20 11:48:13', '2024-03-20 11:48:13', NULL),
(67, 1, 48, 126, 2, 20, NULL, '2024-03-20', '11:47:00', 1, '2024-03-20 11:49:18', '2024-03-20 11:49:18', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL,
  `reward` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `day_id` bigint(20) UNSIGNED DEFAULT NULL,
  `hora_id` bigint(20) UNSIGNED DEFAULT NULL,
  `per` double(15,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `store_id`, `day_id`, `hora_id`, `per`, `status`, `created_at`, `updated_at`) VALUES
(1, 48, 1, 8, 14.00, 1, '2024-02-26 17:26:24', '2024-03-11 09:46:07'),
(2, 48, 1, 1, 7.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(3, 48, 1, 2, 8.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(4, 48, 1, 3, 9.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(5, 48, 1, 4, 10.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(6, 48, 1, 5, 11.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(7, 48, 1, 6, 12.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(8, 48, 1, 7, 13.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(9, 48, 1, 9, 15.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(10, 48, 1, 10, 16.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(11, 48, 1, 11, 17.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(12, 48, 1, 12, 18.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(13, 48, 1, 13, 19.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(14, 48, 1, 14, 0.00, 0, '2024-02-28 15:01:38', '2024-02-28 15:01:38'),
(15, 49, 1, 4, 30.00, 1, '2024-03-19 20:17:33', '2024-03-19 20:17:33'),
(16, 49, 2, 1, 30.00, 0, '2024-03-19 20:18:01', '2024-03-19 20:23:21'),
(17, 49, 2, 14, 25.00, 0, '2024-03-19 20:18:31', '2024-03-19 20:21:34'),
(18, 49, 4, 13, 30.00, 1, '2024-03-19 20:20:44', '2024-03-19 20:20:44'),
(19, 49, 2, 4, 50.00, 0, '2024-03-19 20:26:25', '2024-03-19 20:26:54'),
(20, 49, 4, 11, 25.00, 0, '2024-03-20 10:04:08', '2024-03-20 10:21:06'),
(21, 49, 2, 5, 150.00, 1, '2024-03-20 10:38:57', '2024-03-20 10:38:57'),
(22, 49, 6, 1, 20.00, 0, '2024-03-20 11:05:03', '2024-03-20 11:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `img` varchar(250) DEFAULT NULL,
  `sort_no` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociales`
--

CREATE TABLE `sociales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sociales`
--

INSERT INTO `sociales` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Salud', 'Física y mental', '2023-07-27 07:44:46', '2023-07-27 07:44:46', NULL),
(2, 'Bienestar integral', 'Espiritual, material, profesional, emocional, social', '2023-07-27 07:45:06', '2023-07-27 07:45:06', NULL),
(3, 'Fomento de procesos democráticos', '(procesos jurídicos o apoyo a reinserción de reos)', '2023-07-27 07:45:24', '2023-07-27 07:45:24', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sociales_negocios`
--

CREATE TABLE `sociales_negocios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `store_id` int(11) DEFAULT NULL,
  `social_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sociales_negocios`
--

INSERT INTO `sociales_negocios` (`id`, `store_id`, `social_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 45, '2023-07-27 07:45:47', '2023-08-08 06:41:32', '2023-08-08 06:41:32'),
(2, 3, 45, '2023-07-27 07:45:47', '2023-08-08 06:41:32', '2023-08-08 06:41:32'),
(3, 1, 1, '2023-07-27 07:46:00', '2023-08-08 06:41:59', '2023-08-08 06:41:59'),
(4, 2, 1, '2023-07-27 07:46:00', '2023-08-08 06:41:59', '2023-08-08 06:41:59'),
(5, 1, 48, '2023-07-27 07:46:12', '2023-08-07 09:07:27', '2023-08-07 09:07:27'),
(6, 3, 47, '2023-07-27 07:46:22', '2023-08-08 06:40:37', '2023-08-08 06:40:37'),
(7, 1, 48, '2023-08-07 09:07:27', '2023-08-07 09:08:57', '2023-08-07 09:08:57'),
(8, 1, 48, '2023-08-07 09:08:57', '2023-08-08 06:40:05', '2023-08-08 06:40:05'),
(9, 1, 48, '2023-08-08 06:40:05', '2023-08-14 14:12:43', '2023-08-14 14:12:43'),
(10, 3, 47, '2023-08-08 06:40:37', '2023-08-14 14:13:16', '2023-08-14 14:13:16'),
(11, 1, 45, '2023-08-08 06:41:32', '2023-08-08 11:21:05', '2023-08-08 11:21:05'),
(12, 3, 45, '2023-08-08 06:41:32', '2023-08-08 11:21:05', '2023-08-08 11:21:05'),
(13, 1, 1, '2023-08-08 06:41:59', '2023-08-08 12:55:47', '2023-08-08 12:55:47'),
(14, 2, 1, '2023-08-08 06:41:59', '2023-08-08 12:55:47', '2023-08-08 12:55:47'),
(15, 1, 45, '2023-08-08 11:21:05', '2023-08-14 14:14:18', '2023-08-14 14:14:18'),
(16, 3, 45, '2023-08-08 11:21:05', '2023-08-14 14:14:18', '2023-08-14 14:14:18'),
(17, 1, 1, '2023-08-08 12:55:47', '2023-08-08 12:58:21', '2023-08-08 12:58:21'),
(18, 2, 1, '2023-08-08 12:55:47', '2023-08-08 12:58:21', '2023-08-08 12:58:21'),
(19, 1, 1, '2023-08-08 12:58:21', '2023-08-08 23:50:13', '2023-08-08 23:50:13'),
(20, 2, 1, '2023-08-08 12:58:21', '2023-08-08 23:50:13', '2023-08-08 23:50:13'),
(21, 1, 1, '2023-08-08 23:50:13', '2023-08-09 04:37:13', '2023-08-09 04:37:13'),
(22, 2, 1, '2023-08-08 23:50:13', '2023-08-09 04:37:13', '2023-08-09 04:37:13'),
(23, 1, 1, '2023-08-09 04:37:13', '2023-08-14 14:14:49', '2023-08-14 14:14:49'),
(24, 2, 1, '2023-08-09 04:37:13', '2023-08-14 14:14:49', '2023-08-14 14:14:49'),
(25, 1, 48, '2023-08-14 14:12:43', '2023-08-18 13:21:46', '2023-08-18 13:21:46'),
(26, 3, 48, '2023-08-14 14:12:43', '2023-08-18 13:21:46', '2023-08-18 13:21:46'),
(27, 2, 47, '2023-08-14 14:13:16', '2023-08-15 11:15:13', '2023-08-15 11:15:13'),
(28, 3, 47, '2023-08-14 14:13:16', '2023-08-15 11:15:13', '2023-08-15 11:15:13'),
(29, 1, 46, '2023-08-14 14:13:46', '2023-08-14 14:13:46', NULL),
(30, 3, 46, '2023-08-14 14:13:46', '2023-08-14 14:13:46', NULL),
(31, 1, 45, '2023-08-14 14:14:18', '2023-09-10 03:27:28', '2023-09-10 03:27:28'),
(32, 3, 45, '2023-08-14 14:14:18', '2023-09-10 03:27:28', '2023-09-10 03:27:28'),
(33, 1, 1, '2023-08-14 14:14:49', '2023-08-18 12:05:55', '2023-08-18 12:05:55'),
(34, 2, 1, '2023-08-14 14:14:49', '2023-08-18 12:05:55', '2023-08-18 12:05:55'),
(35, 2, 47, '2023-08-15 11:15:13', '2023-08-15 11:17:28', '2023-08-15 11:17:28'),
(36, 3, 47, '2023-08-15 11:15:13', '2023-08-15 11:17:28', '2023-08-15 11:17:28'),
(37, 1, 47, '2023-08-15 11:17:28', '2023-08-15 11:17:28', NULL),
(38, 3, 47, '2023-08-15 11:17:28', '2023-08-15 11:17:28', NULL),
(39, 1, 1, '2023-08-18 12:05:55', '2023-08-18 12:05:55', NULL),
(40, 2, 1, '2023-08-18 12:05:55', '2023-08-18 12:05:55', NULL),
(41, 1, 48, '2023-08-18 13:21:46', '2023-08-18 16:43:41', '2023-08-18 16:43:41'),
(42, 3, 48, '2023-08-18 13:21:46', '2023-08-18 16:43:41', '2023-08-18 16:43:41'),
(43, 1, 48, '2023-08-18 16:43:41', '2023-08-18 18:11:49', '2023-08-18 18:11:49'),
(44, 3, 48, '2023-08-18 16:43:41', '2023-08-18 18:11:49', '2023-08-18 18:11:49'),
(45, 1, 48, '2023-08-18 18:11:49', '2023-08-18 18:14:19', '2023-08-18 18:14:19'),
(46, 3, 48, '2023-08-18 18:11:49', '2023-08-18 18:14:19', '2023-08-18 18:14:19'),
(47, 1, 48, '2023-08-18 18:14:19', '2023-08-18 18:14:19', NULL),
(48, 3, 48, '2023-08-18 18:14:19', '2023-08-18 18:14:19', NULL),
(49, 1, 45, '2023-09-10 03:27:28', '2023-09-10 03:27:28', NULL),
(50, 3, 45, '2023-09-10 03:27:28', '2023-09-10 03:27:28', NULL),
(51, 2, 49, '2024-03-19 19:52:39', '2024-03-20 11:12:32', '2024-03-20 11:12:32'),
(52, 2, 49, '2024-03-20 11:12:32', '2024-03-20 11:12:32', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `descript` varchar(255) NOT NULL,
  `link` longtext NOT NULL,
  `qr` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `text`
--

CREATE TABLE `text` (
  `id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `text`
--

INSERT INTO `text` (`id`, `lang_id`, `s_data`, `created_at`, `updated_at`) VALUES
(193, 1, 'a:133:{s:11:\"skip_button\";s:4:\"Skip\";s:12:\"enter_button\";s:11:\"Get Started\";s:10:\"city_title\";s:11:\"Select City\";s:11:\"city_search\";s:6:\"Search\";s:12:\"city_heading\";s:22:\"Select City & Continue\";s:11:\"city_button\";s:6:\"Update\";s:11:\"home_search\";s:31:\"Search for restaurants,dishes..\";s:10:\"home_offer\";s:11:\"Great Offer\";s:18:\"home_fast_delivery\";s:13:\"Fast Delivery\";s:13:\"home_trending\";s:8:\"Trending\";s:16:\"home_new_arrival\";s:11:\"New Arrival\";s:14:\"home_by_rating\";s:9:\"By Rating\";s:11:\"home_coupon\";s:18:\"Cupon de descuento\";s:15:\"home_per_person\";s:10:\"per person\";s:16:\"home_footer_name\";s:4:\"Home\";s:12:\"home_nearest\";s:7:\"Nearest\";s:9:\"home_cart\";s:4:\"Cart\";s:12:\"home_profile\";s:7:\"Profile\";s:10:\"menu_title\";s:4:\"Menu\";s:15:\"menu_page_title\";s:11:\"Information\";s:11:\"menu_footer\";s:15:\"App version 1.1\";s:14:\"item_view_info\";s:29:\"View more info about this app\";s:13:\"item_veg_only\";s:8:\"Veg Only\";s:15:\"item_add_button\";s:3:\"Add\";s:16:\"item_addon_title\";s:13:\"Select Option\";s:17:\"item_size_heading\";s:16:\"Select Item Size\";s:10:\"item_small\";s:5:\"Small\";s:6:\"item_m\";s:6:\"Medium\";s:10:\"item_large\";s:5:\"Large\";s:15:\"addon_add_title\";s:3:\"Add\";s:18:\"item_addon_heading\";s:29:\"You can also add some addon\'s\";s:17:\"item_addon_button\";s:3:\"Add\";s:10:\"info_title\";s:16:\"View Information\";s:17:\"info_rating_title\";s:16:\"Rating & Reviews\";s:9:\"info_open\";s:12:\"Opening Time\";s:10:\"info_close\";s:12:\"Closing Time\";s:11:\"info_person\";s:15:\"Per Person Cost\";s:11:\"info_d_time\";s:13:\"Delivery Time\";s:12:\"cart_heading\";s:17:\"Manage Cart Items\";s:10:\"cart_total\";s:12:\"Total Amount\";s:13:\"cart_delivery\";s:16:\"Delivery Charges\";s:11:\"cart_coupon\";s:23:\"Have a discount coupon?\";s:12:\"cart_payable\";s:20:\"Total Payable Amount\";s:11:\"cart_button\";s:11:\"Place Order\";s:10:\"cart_empty\";s:24:\"Opps! Your cart is empty\";s:16:\"cart_start_order\";s:14:\"Start Ordering\";s:10:\"cart_price\";s:5:\"Price\";s:8:\"cart_qty\";s:8:\"Quantity\";s:13:\"cart_discount\";s:8:\"Discount\";s:10:\"cart_apply\";s:5:\"Apply\";s:12:\"coupon_title\";s:12:\"Apply Coupon\";s:14:\"coupon_heading\";s:24:\"Avilable Discount Coupon\";s:13:\"coupon_button\";s:5:\"Apply\";s:11:\"login_title\";s:5:\"Login\";s:13:\"login_heading\";s:24:\"Please login to continue\";s:12:\"login_button\";s:5:\"Login\";s:21:\"login_forgot_password\";s:16:\"Forgot Password?\";s:20:\"login_reset_password\";s:10:\"Reset Here\";s:12:\"login_signup\";s:18:\"Create New Account\";s:12:\"forgot_title\";s:21:\"Forgot Your Password?\";s:14:\"forgot_heading\";s:30:\"Don\'t worry you can reset here\";s:11:\"forgot_text\";s:27:\"Enter Your Registered Email\";s:12:\"signup_title\";s:6:\"Signup\";s:14:\"signup_heading\";s:20:\"Personal Information\";s:13:\"signup_button\";s:6:\"Signup\";s:11:\"place_title\";s:11:\"Place Order\";s:22:\"place_delivery_heading\";s:23:\"Select Delivery Address\";s:17:\"place_add_address\";s:7:\"Add New\";s:18:\"place_address_text\";s:57:\"Opps! not able to find any address saved in your account.\";s:21:\"place_payment_heading\";s:21:\"Select Payment Method\";s:18:\"place_order_button\";s:11:\"Place Order\";s:9:\"add_title\";s:15:\"Add New Address\";s:11:\"add_address\";s:7:\"Address\";s:12:\"add_landmark\";s:8:\"Landmark\";s:10:\"add_button\";s:12:\"Save Address\";s:13:\"confirm_title\";s:30:\"Your order placed successfully\";s:15:\"confirm_heading\";s:84:\"Your order placed successfully. You will be notified when your order status changed.\";s:18:\"confirm_view_order\";s:18:\"View Order Details\";s:16:\"confirm_order_id\";s:8:\"Order ID\";s:13:\"confirm_total\";s:20:\"Total Payable Amount\";s:13:\"profile_title\";s:10:\"My Account\";s:15:\"profile_heading\";s:10:\"My Account\";s:15:\"profile_welcome\";s:9:\"Welcome !\";s:21:\"profile_order_history\";s:13:\"Order History\";s:15:\"profile_setting\";s:16:\"Account Settings\";s:14:\"profile_logout\";s:6:\"Logout\";s:13:\"history_title\";s:13:\"Order History\";s:15:\"history_heading\";N;s:12:\"history_date\";s:9:\"Date Time\";s:14:\"history_status\";s:6:\"Status\";s:12:\"history_item\";s:4:\"Item\";s:11:\"history_qty\";s:3:\"Qty\";s:13:\"history_price\";s:5:\"Price\";s:14:\"history_rating\";s:11:\"Give Rating\";s:14:\"history_cancel\";s:12:\"Cancel Order\";s:12:\"rating_title\";s:26:\"Give Your Reviews & Rating\";s:14:\"rating_heading\";s:13:\"Select Rating\";s:10:\"rating_msg\";s:17:\"Write Your Review\";s:13:\"rating_button\";s:6:\"Submit\";s:11:\"about_title\";s:8:\"About Us\";s:9:\"how_title\";s:12:\"How it Works\";s:9:\"faq_title\";s:5:\"Faq\'s\";s:13:\"contact_title\";s:10:\"Contact Us\";s:8:\"language\";s:8:\"Language\";s:4:\"home\";s:4:\"Home\";s:4:\"city\";s:4:\"City\";s:7:\"account\";s:10:\"My Account\";s:5:\"order\";s:9:\"My Orders\";s:10:\"d_no_order\";s:26:\"Sorry! No new order found.\";s:11:\"d_new_order\";s:10:\"New Orders\";s:13:\"d_view_detail\";s:11:\"View Detail\";s:6:\"d_user\";s:4:\"User\";s:7:\"d_phone\";s:5:\"Phone\";s:9:\"d_address\";s:7:\"Address\";s:12:\"d_start_ride\";s:10:\"Start Ride\";s:15:\"d_complete_ride\";s:13:\"Complete Ride\";s:14:\"d_total_amount\";s:12:\"Total Amount\";s:5:\"d_pay\";s:14:\"Payment Method\";s:5:\"close\";s:25:\"Store is closed right now\";s:13:\"s_total_order\";s:15:\"Ordenes totales\";s:16:\"s_complete_order\";s:17:\"Ordenes completas\";s:11:\"s_new_order\";s:14:\"Nuevas Ordenes\";s:12:\"s_new_status\";s:12:\"Nuevo Pedido\";s:15:\"s_confirm_order\";s:17:\"Estado confirmado\";s:21:\"s_out_delivery_status\";s:22:\"El pedido esta en ruta\";s:17:\"s_complete_status\";s:9:\"Terminado\";s:14:\"s_detail_title\";s:19:\"Detalles del pedido\";s:12:\"s_menu_title\";s:4:\"Menu\";s:16:\"s_order_overview\";s:18:\"Resumen de pedidos\";s:9:\"s_c_order\";s:14:\"Orden completa\";s:15:\"s_cancel_button\";s:15:\"Cancelar pedido\";s:16:\"s_confirm_button\";s:17:\"Confirmar pedidar\";s:15:\"s_assign_button\";s:18:\"Asignar repartidor\";}', '2020-03-28 17:42:38', '2020-03-28 17:42:38'),
(269, 0, 'a:134:{s:11:\"skip_button\";s:6:\"Saltar\";s:12:\"enter_button\";s:16:\"¡Empezar ahora!\";s:10:\"city_title\";s:18:\"Seleccionar ciudad\";s:11:\"city_search\";s:6:\"Buscar\";s:12:\"city_heading\";s:30:\"Seleccionar ciudad y continuar\";s:11:\"city_button\";s:10:\"Actualizar\";s:11:\"home_search\";s:20:\"¿Se te antoja algo?\";s:10:\"home_offer\";s:11:\"Gran oferta\";s:18:\"home_fast_delivery\";s:15:\"Entrega rápida\";s:13:\"home_trending\";s:10:\"Tendencias\";s:16:\"home_new_arrival\";s:14:\"Nuevos locales\";s:14:\"home_by_rating\";s:17:\"Por calificación\";s:11:\"home_coupon\";s:19:\"Cupón de descuento\";s:15:\"home_per_person\";s:17:\"Costo por persona\";s:16:\"home_footer_name\";s:6:\"Inicio\";s:12:\"home_nearest\";s:2:\"Ja\";s:9:\"home_cart\";s:7:\"Carrito\";s:12:\"home_profile\";s:6:\"Perfil\";s:9:\"home_cats\";s:11:\"Categorías\";s:10:\"menu_title\";s:5:\"Menú\";s:15:\"menu_page_title\";s:12:\"Información\";s:11:\"menu_footer\";s:17:\"App versión 0.15\";s:14:\"item_view_info\";s:38:\"Ver más información de este comercio\";s:13:\"item_veg_only\";s:14:\"Sólo verduras\";s:15:\"item_add_button\";s:18:\"Agregar al carrito\";s:16:\"item_addon_title\";s:19:\"Seleccionar opción\";s:17:\"item_size_heading\";s:7:\"Tamaño\";s:10:\"item_small\";s:8:\"Pequeño\";s:6:\"item_m\";s:7:\"Mediano\";s:10:\"item_large\";s:6:\"Grande\";s:15:\"addon_add_title\";s:18:\"Agregar al carrito\";s:18:\"item_addon_heading\";s:20:\"Agregar complementos\";s:17:\"item_addon_button\";s:18:\"Agregar al carrito\";s:10:\"info_title\";s:16:\"Ver información\";s:17:\"info_rating_title\";s:27:\"Calificación y comentarios\";s:9:\"info_open\";s:16:\"Hora de apertura\";s:10:\"info_close\";s:14:\"Hora de cierre\";s:11:\"info_person\";s:5:\"Costo\";s:11:\"info_d_time\";s:17:\"Tiempo de entrega\";s:12:\"cart_heading\";s:18:\"Carrito de compras\";s:10:\"cart_total\";s:5:\"Total\";s:13:\"cart_delivery\";s:5:\"Envio\";s:11:\"cart_coupon\";s:6:\"Cupón\";s:12:\"cart_payable\";s:7:\"A pagar\";s:11:\"cart_button\";s:15:\"Realizar pedido\";s:10:\"cart_empty\";s:14:\"Carrito vacío\";s:16:\"cart_start_order\";s:14:\"Iniciar Pedido\";s:10:\"cart_price\";s:17:\"Total del carrito\";s:8:\"cart_qty\";s:8:\"Cantidad\";s:13:\"cart_discount\";s:9:\"Descuento\";s:10:\"cart_apply\";s:26:\"Aplicar cupón o descuento\";s:12:\"coupon_title\";s:7:\"Cupones\";s:14:\"coupon_heading\";s:20:\"Cupones de Descuento\";s:13:\"coupon_button\";s:7:\"Aplicar\";s:11:\"login_title\";s:8:\"Ingresar\";s:13:\"login_heading\";s:8:\"Ingresar\";s:12:\"login_button\";s:15:\"Iniciar sesión\";s:21:\"login_forgot_password\";s:27:\"¿Olvidaste tu contraseña?\";s:20:\"login_reset_password\";s:21:\"Recuperar contraseña\";s:12:\"login_signup\";s:8:\"Ingresar\";s:12:\"forgot_title\";s:25:\"¿Olvidó su contraseña?\";s:14:\"forgot_heading\";s:25:\"¿Olvidó su contraseña?\";s:11:\"forgot_text\";s:49:\"¿Olvidó su contraseña?, siga las instrucciones\";s:12:\"signup_title\";s:21:\"Regístrate en Prommo\";s:14:\"signup_heading\";s:17:\"Ingresa tus datos\";s:13:\"signup_button\";s:8:\"Registro\";s:11:\"place_title\";s:15:\"Realizar pedido\";s:22:\"place_delivery_heading\";s:21:\"Dirección de entrega\";s:17:\"place_add_address\";s:28:\"Agregar una nueva dirección\";s:18:\"place_address_text\";s:26:\"NOTAS PARA EL RESTAURANTE:\";s:21:\"place_payment_heading\";s:4:\"Pago\";s:18:\"place_order_button\";s:15:\"Realizar pedido\";s:9:\"add_title\";s:24:\"Agregar nueva dirección\";s:11:\"add_address\";s:10:\"Dirección\";s:12:\"add_landmark\";s:11:\"Referencias\";s:10:\"add_button\";s:7:\"Agregar\";s:13:\"confirm_title\";s:23:\"Confirmación de pedido\";s:15:\"confirm_heading\";s:18:\"Confirma tu pedido\";s:18:\"confirm_view_order\";s:20:\"Detalles de tu orden\";s:16:\"confirm_order_id\";s:12:\"No. de Orden\";s:13:\"confirm_total\";s:5:\"Total\";s:13:\"profile_title\";s:9:\"Mi cuenta\";s:15:\"profile_heading\";s:9:\"Mi cuenta\";s:15:\"profile_welcome\";s:22:\"¡Bienvenido a Prommo!\";s:21:\"profile_order_history\";s:20:\"Historial de pedidos\";s:15:\"profile_setting\";s:7:\"Ajustes\";s:14:\"profile_logout\";s:5:\"Salir\";s:13:\"history_title\";s:20:\"Historial de pedidos\";s:15:\"history_heading\";s:20:\"Historial de pedidos\";s:12:\"history_date\";s:5:\"Fecha\";s:14:\"history_status\";s:6:\"Estado\";s:12:\"history_item\";s:8:\"Elemento\";s:11:\"history_qty\";s:8:\"Cantidad\";s:13:\"history_price\";s:6:\"Precio\";s:14:\"history_rating\";s:13:\"Calificación\";s:14:\"history_cancel\";s:14:\"Cancelar orden\";s:12:\"rating_title\";s:29:\"Clasificación e información\";s:14:\"rating_heading\";s:29:\"Clasificación e información\";s:10:\"rating_msg\";s:29:\"Clasificación e información\";s:13:\"rating_button\";s:9:\"Calificar\";s:11:\"about_title\";s:41:\"¿Quieres formar parte del equipo Prommo?\";s:9:\"how_title\";s:33:\"¿Que necesito para formar parte?\";s:9:\"faq_title\";s:20:\"Preguntas Frecuentes\";s:13:\"contact_title\";s:34:\"Contacto y Política de Privacidad\";s:8:\"language\";s:6:\"Idioma\";s:4:\"home\";s:6:\"Inicio\";s:4:\"city\";s:6:\"Ciudad\";s:7:\"account\";s:6:\"Cuenta\";s:5:\"order\";s:7:\"Pedidos\";s:10:\"d_no_order\";s:20:\"Pedido no encontrado\";s:11:\"d_new_order\";s:14:\"Nuevos pedidos\";s:13:\"d_view_detail\";s:12:\"Ver detalles\";s:6:\"d_user\";s:7:\"Usuario\";s:7:\"d_phone\";s:9:\"Teléfono\";s:9:\"d_address\";s:10:\"Dirección\";s:12:\"d_start_ride\";s:18:\"Empezar la entrega\";s:15:\"d_complete_ride\";s:20:\"Finalizar la entrega\";s:14:\"d_total_amount\";s:11:\"Monto total\";s:5:\"d_pay\";s:15:\"Método de pago\";s:5:\"close\";s:14:\"Tienda cerrada\";s:13:\"s_total_order\";s:16:\"Total de Pedidos\";s:16:\"s_complete_order\";s:19:\"Pedidos completados\";s:11:\"s_new_order\";s:14:\"Nuevos pedidos\";s:12:\"s_new_status\";s:12:\"Nuevo pedido\";s:15:\"s_confirm_order\";s:19:\"Pedidos confirmados\";s:21:\"s_out_delivery_status\";s:22:\"El pedido esta en ruta\";s:17:\"s_complete_status\";s:9:\"Entregado\";s:14:\"s_detail_title\";s:19:\"Detalles del pedido\";s:12:\"s_menu_title\";s:9:\"Productos\";s:16:\"s_order_overview\";s:18:\"Resumen de pedidos\";s:9:\"s_c_order\";s:14:\"Orden completa\";s:15:\"s_cancel_button\";s:15:\"Cancelar pedido\";s:16:\"s_confirm_button\";s:16:\"Confirmar pedido\";s:15:\"s_assign_button\";s:20:\"Solicitar repartidor\";}', '2022-08-30 00:21:08', '2022-08-30 00:21:08'),
(270, 6, 'a:134:{s:11:\"skip_button\";s:6:\"Saltar\";s:12:\"enter_button\";s:13:\"Empezar ahora\";s:10:\"city_title\";s:18:\"Seleccionar ciudad\";s:11:\"city_search\";s:6:\"Buscar\";s:12:\"city_heading\";s:30:\"Seleccionar ciudad y continuar\";s:11:\"city_button\";s:10:\"Actualizar\";s:11:\"home_search\";s:33:\"Buscar por restaurantes, mercados\";s:10:\"home_offer\";s:8:\"Ofertas!\";s:18:\"home_fast_delivery\";s:15:\"Entrega rápida\";s:13:\"home_trending\";s:10:\"Tendencias\";s:16:\"home_new_arrival\";s:14:\"Nuevos locales\";s:14:\"home_by_rating\";s:17:\"Por calificación\";s:11:\"home_coupon\";s:6:\"Cupón\";s:15:\"home_per_person\";s:17:\"Costo por persona\";s:16:\"home_footer_name\";s:6:\"Inicio\";s:12:\"home_nearest\";s:8:\"Cercanos\";s:9:\"home_cart\";s:5:\"Carro\";s:12:\"home_profile\";s:6:\"Perfil\";s:9:\"home_cats\";N;s:10:\"menu_title\";s:5:\"Menú\";s:15:\"menu_page_title\";s:12:\"Información\";s:11:\"menu_footer\";s:15:\"App version 1.0\";s:14:\"item_view_info\";s:38:\"Ver más información de este comercio\";s:13:\"item_veg_only\";s:11:\"Solo Vegano\";s:15:\"item_add_button\";s:7:\"Agregar\";s:16:\"item_addon_title\";s:19:\"Seleccionar opción\";s:17:\"item_size_heading\";s:20:\"Tamaño del elemento\";s:10:\"item_small\";s:8:\"Pequeño\";s:6:\"item_m\";s:7:\"Mediano\";s:10:\"item_large\";s:6:\"Grande\";s:15:\"addon_add_title\";s:7:\"Agregar\";s:18:\"item_addon_heading\";s:20:\"Agregar complementos\";s:17:\"item_addon_button\";s:7:\"Agregar\";s:10:\"info_title\";s:16:\"Ver información\";s:17:\"info_rating_title\";s:27:\"Calificación y comentarios\";s:9:\"info_open\";s:8:\"Abierto:\";s:10:\"info_close\";s:6:\"Cierre\";s:11:\"info_person\";s:17:\"Costo por persona\";s:11:\"info_d_time\";s:20:\"El tiempo de entrega\";s:12:\"cart_heading\";s:17:\"Carrito de compra\";s:10:\"cart_total\";s:5:\"Total\";s:13:\"cart_delivery\";s:5:\"Envio\";s:11:\"cart_coupon\";s:5:\"Cupon\";s:12:\"cart_payable\";s:7:\"A pagar\";s:11:\"cart_button\";s:15:\"Boton de pedido\";s:10:\"cart_empty\";s:12:\"Carro Vacío\";s:16:\"cart_start_order\";s:15:\"Empezar a pedir\";s:10:\"cart_price\";s:16:\"Precio del carro\";s:8:\"cart_qty\";s:8:\"Cantidad\";s:13:\"cart_discount\";s:9:\"Descuento\";s:10:\"cart_apply\";s:5:\"Cupon\";s:12:\"coupon_title\";s:7:\"Cupones\";s:14:\"coupon_heading\";s:7:\"Cupones\";s:13:\"coupon_button\";s:5:\"Cupon\";s:11:\"login_title\";s:8:\"Ingresar\";s:13:\"login_heading\";s:8:\"Ingresar\";s:12:\"login_button\";s:7:\"Iniciar\";s:21:\"login_forgot_password\";s:22:\"Olvido su contraseña?\";s:20:\"login_reset_password\";s:20:\"Resetear contraseña\";s:12:\"login_signup\";s:8:\"Ingresar\";s:12:\"forgot_title\";s:18:\"Olvido Contraseña\";s:14:\"forgot_heading\";s:18:\"Olvido Contraseña\";s:11:\"forgot_text\";s:45:\"olvido su contraseña, siga las instrucciones\";s:12:\"signup_title\";s:11:\"Registrerse\";s:14:\"signup_heading\";s:11:\"Registrarse\";s:13:\"signup_button\";s:11:\"Registrarse\";s:11:\"place_title\";s:15:\"Realizar pedido\";s:22:\"place_delivery_heading\";s:19:\"Dirección de envio\";s:17:\"place_add_address\";s:24:\"Nueva direccion de envio\";s:18:\"place_address_text\";s:11:\"Direcciçon\";s:21:\"place_payment_heading\";s:14:\"metodo de pago\";s:18:\"place_order_button\";s:5:\"Pedir\";s:9:\"add_title\";s:24:\"Agregar nueva dirección\";s:11:\"add_address\";s:10:\"Dirección\";s:12:\"add_landmark\";s:19:\"Punto de referencia\";s:10:\"add_button\";s:7:\"Agregar\";s:13:\"confirm_title\";s:15:\"Confirmar orden\";s:15:\"confirm_heading\";s:15:\"Confirmar orden\";s:18:\"confirm_view_order\";s:21:\"ver detalles de orden\";s:16:\"confirm_order_id\";s:16:\"Numero de pedido\";s:13:\"confirm_total\";s:5:\"Total\";s:13:\"profile_title\";s:9:\"Mi cuenta\";s:15:\"profile_heading\";s:9:\"Mi cuenta\";s:15:\"profile_welcome\";s:35:\"Bienvenido estamos felices de verte\";s:21:\"profile_order_history\";s:19:\"historial de pedido\";s:15:\"profile_setting\";s:7:\"Ajustes\";s:14:\"profile_logout\";s:5:\"Salir\";s:13:\"history_title\";s:20:\"Historial de pedidos\";s:15:\"history_heading\";s:20:\"Historial de pedidos\";s:12:\"history_date\";s:5:\"Fecha\";s:14:\"history_status\";s:6:\"Estado\";s:12:\"history_item\";s:4:\"Item\";s:11:\"history_qty\";s:8:\"Cantidad\";s:13:\"history_price\";s:6:\"Precio\";s:14:\"history_rating\";s:13:\"Calificación\";s:14:\"history_cancel\";s:14:\"Cancelar orden\";s:12:\"rating_title\";s:28:\"Calificación e información\";s:14:\"rating_heading\";s:28:\"Calificación e información\";s:10:\"rating_msg\";s:10:\"Rating Msg\";s:13:\"rating_button\";s:9:\"Calificar\";s:11:\"about_title\";s:8:\"Nosotros\";s:9:\"how_title\";s:18:\"¿Como trabajamos?\";s:9:\"faq_title\";s:3:\"FAQ\";s:13:\"contact_title\";s:8:\"Contacto\";s:8:\"language\";s:6:\"Idioma\";s:4:\"home\";s:6:\"Inicio\";s:4:\"city\";s:6:\"Ciudad\";s:7:\"account\";s:6:\"Cuenta\";s:5:\"order\";s:7:\"Pedidos\";s:10:\"d_no_order\";s:21:\"No se encontro pedido\";s:11:\"d_new_order\";s:12:\"Nuevo pedido\";s:13:\"d_view_detail\";s:12:\"Ver detalles\";s:6:\"d_user\";s:7:\"Usuario\";s:7:\"d_phone\";s:8:\"Telefono\";s:9:\"d_address\";s:10:\"Dirección\";s:12:\"d_start_ride\";s:13:\"Empezar Viaje\";s:15:\"d_complete_ride\";s:17:\"Completar  Pedido\";s:14:\"d_total_amount\";s:5:\"Total\";s:5:\"d_pay\";s:15:\"Método de pago\";s:5:\"close\";s:14:\"Cerrado ahora.\";s:13:\"s_total_order\";s:15:\"Ordenes totales\";s:16:\"s_complete_order\";s:17:\"Ordenes completas\";s:11:\"s_new_order\";s:14:\"Nuevas Ordenes\";s:12:\"s_new_status\";s:12:\"Nuevo Pedido\";s:15:\"s_confirm_order\";s:17:\"Estado confirmado\";s:21:\"s_out_delivery_status\";s:22:\"El pedido esta en ruta\";s:17:\"s_complete_status\";s:9:\"Terminado\";s:14:\"s_detail_title\";s:19:\"Detalles del pedido\";s:12:\"s_menu_title\";s:4:\"Menu\";s:16:\"s_order_overview\";s:18:\"Resumen de pedidos\";s:9:\"s_c_order\";s:14:\"Orden completa\";s:15:\"s_cancel_button\";s:15:\"Cancelar pedido\";s:16:\"s_confirm_button\";s:17:\"Confirmar pedidar\";s:15:\"s_assign_button\";s:18:\"Asignar repartidor\";}', '2022-08-30 00:21:09', '2022-08-30 00:21:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` date DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `reserva` int(11) DEFAULT NULL,
  `id_cliente` varchar(255) DEFAULT NULL,
  `id_negocio` varchar(255) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tickets`
--

INSERT INTO `tickets` (`id`, `fecha`, `valor`, `reserva`, `id_cliente`, `id_negocio`, `descripcion`, `imagen`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '2023-08-14', 55, 10, '32', '46', '20%', 'public/assets/img/tickets/16920180303002.png', '2', '2023-08-14 07:00:30', '2023-08-29 14:21:31', NULL),
(2, '2023-08-16', 50.5, 4, '32', '47', 'Claro q si', 'public/assets/img/tickets/16922204141189.jpg', '2', '2023-08-16 15:13:34', '2023-08-29 08:55:30', NULL),
(3, '2023-08-16', NULL, NULL, '32', '46', 'Ok', 'public/assets/img/tickets/16922204374151.jpg', '3', '2023-08-16 15:13:57', '2023-08-22 10:48:29', NULL),
(10, '2023-08-18', 43.7, 25, '32', '47', 'Aceptada Prueba Fogón', 'public/assets/img/tickets/16923582244493.png', '2', '2023-08-18 05:30:24', '2023-08-29 09:31:53', NULL),
(11, '2023-08-21', 25, NULL, '35', '47', 'recompensa brindada', 'public/assets/img/tickets/16926680756684.png', '2', '2023-08-21 19:34:35', '2023-09-05 20:20:40', NULL),
(12, '2023-08-23', NULL, 20, '36', '48', 'Rechazada Martes', 'public/assets/img/tickets/16928164652479.png', '3', '2023-08-23 12:47:45', '2023-08-29 07:04:35', NULL),
(13, '2023-08-23', 44.7, 30, '36', '48', 'Reserva Activa', 'public/assets/img/tickets/16928441236032.png', '2', '2023-08-23 20:28:43', '2023-08-30 14:57:45', NULL),
(14, '2023-08-25', 2, 3, '32', '48', 'test', 'public/assets/img/tickets/16929807701692.png', '2', '2023-08-25 10:26:10', '2023-08-29 12:57:17', NULL),
(15, '2023-08-25', 12, 29, '33', '48', 'Aceptada Prueba', 'public/assets/img/tickets/16930052206113.png', '2', '2023-08-25 17:13:40', '2023-08-29 09:32:04', NULL),
(16, '2023-08-29', 30, 34, '41', '48', 'prueba alicarlo', 'public/assets/img/tickets/16933323606496.png', '3', '2023-08-29 12:06:00', '2023-08-29 12:16:28', NULL),
(17, '2023-08-29', 5, 33, '41', '48', 'prueba alicarlo', 'public/assets/img/tickets/16933323756230.png', '2', '2023-08-29 12:06:15', '2023-08-29 12:15:58', NULL),
(18, '2023-08-29', 10, 35, '41', '47', 'prueba alicarlo', 'public/assets/img/tickets/16933323904649.png', '2', '2023-08-29 12:06:30', '2023-08-31 19:29:29', NULL),
(19, '2023-08-29', 10, 35, '41', '47', 'test', 'public/assets/img/tickets/16933360005650.png', '2', '2023-08-29 13:06:40', '2023-08-29 13:08:42', NULL),
(20, '2023-08-31', 10, 38, '41', '48', 'alicarlo test', 'public/assets/img/tickets/16935465716152.png', '2', '2023-08-31 23:36:11', '2023-08-31 23:36:44', NULL),
(21, '2023-09-01', 4, 42, '41', '48', 'test', 'public/assets/img/tickets/16935527321563.png', '2', '2023-09-01 01:18:52', '2023-09-01 01:20:40', NULL),
(22, '2023-09-01', 4, 41, '41', '48', '4444', 'public/assets/img/tickets/16935529766873.png', '2', '2023-09-01 01:22:56', '2023-09-01 01:23:12', NULL),
(23, '2023-09-01', 12, 39, '41', '48', '12222', 'public/assets/img/tickets/16935605815516.png', '2', '2023-09-01 03:29:41', '2023-09-01 03:30:26', NULL),
(28, '2023-09-05', 250, 50, '64', '48', '251', 'public/assets/img/tickets/16939656962716.png', '2', '2023-09-05 20:01:36', '2023-09-05 20:15:32', NULL),
(29, '2023-09-05', 250, 55, '64', '48', '251', 'public/assets/img/tickets/16939695306488.png', '2', '2023-09-05 21:05:30', '2023-09-05 21:27:54', NULL),
(30, '2023-09-05', 300, 55, '64', '48', '350', 'public/assets/img/tickets/16939707132088.png', '2', '2023-09-05 21:25:13', '2023-09-05 21:27:48', NULL),
(31, '2023-09-06', NULL, NULL, '64', NULL, NULL, 'public/assets/img/tickets/16940484162169.png', '0', '2023-09-06 19:00:16', '2023-09-06 19:00:16', NULL),
(32, '2023-09-08', 10, 36, '41', '47', 'prueba ali', 'public/assets/img/tickets/16941692014398.png', '2', '2023-09-08 04:33:21', '2023-09-08 04:36:19', NULL),
(33, '2023-09-08', NULL, NULL, '41', NULL, NULL, 'public/assets/img/tickets/16941692194798.png', '0', '2023-09-08 04:33:39', '2023-09-08 04:33:39', NULL),
(34, '2023-09-08', 100, 53, '41', '48', '100', 'public/assets/img/tickets/16941864632493.png', '2', '2023-09-08 09:21:03', '2024-03-14 15:18:56', NULL),
(35, '2023-09-08', NULL, NULL, '41', NULL, NULL, 'public/assets/img/tickets/16941865962701.png', '0', '2023-09-08 09:23:16', '2023-09-08 09:23:16', NULL),
(36, '2024-01-13', NULL, NULL, '33', NULL, NULL, 'public/assets/img/tickets/17051936093633.png', '0', '2024-01-13 18:53:29', '2024-01-13 18:53:29', NULL),
(37, '2024-01-21', 500, 57, '108', '48', '501', 'public/assets/img/tickets/17058745335574.png', '2', '2024-01-21 16:02:13', '2024-01-21 16:38:41', NULL),
(38, '2024-01-21', 500, 58, '108', '48', '500', 'public/assets/img/tickets/17058804204745.png', '2', '2024-01-21 17:40:20', '2024-01-21 18:07:12', NULL),
(39, '2024-03-01', NULL, NULL, '112', NULL, NULL, 'public/assets/img/tickets/17093300765261.png', '0', '2024-03-01 15:54:36', '2024-03-01 15:54:36', NULL),
(40, '2024-03-14', 100, 59, '110', '48', '100', 'public/assets/img/tickets/17104432266713.png', '2', '2024-03-14 13:07:06', '2024-03-14 15:19:38', NULL),
(41, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104433304705.png', '0', '2024-03-14 13:08:50', '2024-03-14 13:08:50', NULL),
(42, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104464604618.png', '0', '2024-03-14 14:01:00', '2024-03-14 14:01:00', NULL),
(43, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104469466696.png', '0', '2024-03-14 14:09:06', '2024-03-14 14:09:06', NULL),
(44, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104479892864.png', '0', '2024-03-14 14:26:29', '2024-03-14 14:26:29', NULL),
(45, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104480343843.png', '0', '2024-03-14 14:27:14', '2024-03-14 14:27:14', NULL),
(46, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104480916976.png', '0', '2024-03-14 14:28:11', '2024-03-14 14:28:11', NULL),
(47, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104481543333.png', '0', '2024-03-14 14:29:14', '2024-03-14 14:29:14', NULL),
(48, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104486511390.png', '0', '2024-03-14 14:37:31', '2024-03-14 14:37:31', NULL),
(49, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104487836120.png', '0', '2024-03-14 14:39:43', '2024-03-14 14:39:43', NULL),
(50, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104489334863.png', '0', '2024-03-14 14:42:13', '2024-03-14 14:42:13', NULL),
(51, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104496675894.png', '0', '2024-03-14 14:54:27', '2024-03-14 14:54:27', NULL),
(52, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104497663791.png', '0', '2024-03-14 14:56:06', '2024-03-14 14:56:06', NULL),
(53, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104497801584.png', '0', '2024-03-14 14:56:21', '2024-03-14 14:56:21', NULL),
(54, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104498666474.png', '0', '2024-03-14 14:57:46', '2024-03-14 14:57:46', NULL),
(55, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104499564782.png', '0', '2024-03-14 14:59:16', '2024-03-14 14:59:16', NULL),
(56, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104501274772.png', '0', '2024-03-14 15:02:07', '2024-03-14 15:02:07', NULL),
(57, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104502784293.png', '0', '2024-03-14 15:04:38', '2024-03-14 15:04:38', NULL),
(58, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104504194038.png', '0', '2024-03-14 15:06:59', '2024-03-14 15:06:59', NULL),
(59, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104507015455.png', '0', '2024-03-14 15:11:41', '2024-03-14 15:11:41', NULL),
(60, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104562732020.png', '0', '2024-03-14 16:44:33', '2024-03-14 16:44:33', NULL),
(61, '2024-03-14', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17104564271159.png', '0', '2024-03-14 16:47:07', '2024-03-14 16:47:07', NULL),
(62, '2024-03-14', NULL, NULL, '117', NULL, NULL, 'public/assets/img/tickets/17104612455897.png', '0', '2024-03-14 18:07:25', '2024-03-14 18:07:25', NULL),
(63, '2024-03-14', NULL, NULL, '119', NULL, NULL, 'public/assets/img/tickets/17104791296252.png', '0', '2024-03-14 23:05:29', '2024-03-14 23:05:29', NULL),
(64, '2024-03-14', NULL, NULL, '119', NULL, NULL, 'public/assets/img/tickets/17104791654964.png', '0', '2024-03-14 23:06:05', '2024-03-14 23:06:05', NULL),
(65, '2024-03-15', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17105184844985.png', '0', '2024-03-15 10:01:24', '2024-03-15 10:01:24', NULL),
(66, '2024-03-15', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17105185793938.png', '0', '2024-03-15 10:02:59', '2024-03-15 10:02:59', NULL),
(67, '2024-03-15', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17105188412818.png', '0', '2024-03-15 10:07:21', '2024-03-15 10:07:21', NULL),
(68, '2024-03-15', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17105202123201.png', '0', '2024-03-15 10:30:12', '2024-03-15 10:30:12', NULL),
(69, '2024-03-15', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17105203664199.png', '0', '2024-03-15 10:32:46', '2024-03-15 10:32:46', NULL),
(70, '2024-03-15', NULL, NULL, '110', NULL, NULL, 'public/assets/img/tickets/17105205152944.png', '0', '2024-03-15 10:35:15', '2024-03-15 10:35:15', NULL),
(71, '2024-03-20', 200, NULL, '121', '49', NULL, 'public/assets/img/tickets/17109561715433.png', '1', '2024-03-20 11:36:11', '2024-03-20 11:44:00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trending_users_xp`
--

CREATE TABLE `trending_users_xp` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `xp` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `deleted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `trending_users_xp`
--

INSERT INTO `trending_users_xp` (`id`, `user_id`, `xp`, `type`, `updated_at`, `created_at`, `deleted_at`) VALUES
(1, 41, 50, 0, '2023-08-31 21:48:02', '2023-08-31 21:48:02', '2023-09-01 03:51:42'),
(2, 41, 50, 0, '2023-08-31 21:48:31', '2023-08-31 21:48:31', '2023-09-01 03:51:42'),
(3, 49, 100, 0, '2023-09-01 03:49:06', '2023-09-01 03:49:06', '2023-09-01 03:51:42'),
(4, 49, 250, 0, '2023-09-01 03:49:06', '2023-09-01 03:49:06', '2023-09-01 03:51:42'),
(5, 41, 100, 0, '2023-09-01 03:49:21', '2023-09-01 03:49:21', '2023-09-01 03:51:42'),
(6, 34, 250, 0, '2023-09-01 03:49:21', '2023-09-01 03:49:21', '2023-09-01 03:51:42'),
(7, 34, 100, 0, '2023-09-01 03:49:32', '2023-09-01 03:49:32', '2023-09-01 03:51:42'),
(8, 32, 50, 0, '2023-09-01 03:49:32', '2023-09-01 03:49:32', '2023-09-01 03:51:42'),
(9, 41, 100, 0, '2023-09-01 03:49:42', '2023-09-01 03:49:42', '2023-09-01 03:51:42'),
(10, 49, 50, 0, '2023-09-01 03:49:42', '2023-09-01 03:49:42', '2023-09-01 03:51:42'),
(11, 41, 100, 0, '2023-08-31 23:36:11', '2023-08-31 23:36:11', '2023-09-01 05:36:11'),
(12, 41, 250, 0, '2023-09-01 00:54:35', '2023-09-01 00:54:35', '2023-09-01 06:54:35'),
(13, 41, 250, 0, '2023-09-01 00:57:01', '2023-09-01 00:57:01', '2023-09-01 06:57:01'),
(14, 41, 100, 0, '2023-09-01 01:18:52', '2023-09-01 01:18:52', '2023-09-01 07:18:52'),
(15, 41, 50, 0, '2023-09-01 01:21:34', '2023-09-01 01:21:34', '2023-09-01 07:21:34'),
(16, 41, 100, 0, '2023-09-01 01:22:56', '2023-09-01 01:22:56', '2023-09-01 07:22:56'),
(17, 41, 50, 0, '2023-09-01 01:23:57', '2023-09-01 01:23:57', '2023-09-01 07:23:57'),
(18, 41, 100, 0, '2023-09-01 03:29:41', '2023-09-01 03:29:41', '2023-09-01 09:29:41'),
(19, 41, 100, 0, '2023-09-01 03:29:52', '2023-09-01 03:29:52', '2023-09-01 09:29:52'),
(20, 41, 50, 0, '2023-09-01 03:32:01', '2023-09-01 03:32:01', '2023-09-01 09:32:01'),
(21, 41, 250, 0, '2023-09-01 14:20:29', '2023-09-01 14:20:29', '2023-09-01 20:20:29'),
(22, 41, 250, 0, '2023-09-01 14:29:51', '2023-09-01 14:29:51', '2023-09-01 20:29:51'),
(23, 33, 100, 0, '2023-09-03 18:31:39', '2023-09-03 18:31:39', '2023-09-04 00:31:39'),
(24, 41, 100, 0, '2023-09-04 19:58:01', '2023-09-04 19:58:01', '2023-09-05 01:58:01'),
(25, 41, 100, 0, '2023-09-04 19:58:22', '2023-09-04 19:58:22', '2023-09-05 01:58:22'),
(26, 64, 100, 0, '2023-09-05 20:01:36', '2023-09-05 20:01:36', '2023-09-06 02:01:36'),
(27, 41, 250, 0, '2023-09-05 20:40:08', '2023-09-05 20:40:08', '2023-09-06 02:40:08'),
(28, 64, 100, 0, '2023-09-05 21:05:30', '2023-09-05 21:05:30', '2023-09-06 03:05:30'),
(29, 41, 250, 0, '2023-09-05 21:14:18', '2023-09-05 21:14:18', '2023-09-06 03:14:18'),
(30, 41, 250, 0, '2023-09-05 21:19:24', '2023-09-05 21:19:24', '2023-09-06 03:19:24'),
(31, 64, 100, 0, '2023-09-05 21:25:13', '2023-09-05 21:25:13', '2023-09-06 03:25:13'),
(32, 41, 250, 0, '2023-09-05 21:31:36', '2023-09-05 21:31:36', '2023-09-06 03:31:36'),
(33, 41, 250, 0, '2023-09-05 21:34:22', '2023-09-05 21:34:22', '2023-09-06 03:34:22'),
(34, 41, 250, 0, '2023-09-06 09:14:38', '2023-09-06 09:14:38', '2023-09-06 15:14:38'),
(35, 41, 250, 0, '2023-09-06 09:17:51', '2023-09-06 09:17:51', '2023-09-06 15:17:51'),
(36, 41, 250, 0, '2023-09-06 09:20:50', '2023-09-06 09:20:50', '2023-09-06 15:20:50'),
(37, 64, 100, 0, '2023-09-06 19:00:16', '2023-09-06 19:00:16', '2023-09-07 01:00:16'),
(38, 41, 250, 0, '2023-09-06 20:16:47', '2023-09-06 20:16:47', '2023-09-07 02:16:47'),
(39, 41, 250, 0, '2023-09-07 05:30:12', '2023-09-07 05:30:12', '2023-09-07 11:30:12'),
(40, 41, 250, 0, '2023-09-07 05:45:11', '2023-09-07 05:45:11', '2023-09-07 11:45:11'),
(41, 41, 250, 0, '2023-09-07 05:47:02', '2023-09-07 05:47:02', '2023-09-07 11:47:02'),
(42, 41, 250, 0, '2023-09-07 05:54:52', '2023-09-07 05:54:52', '2023-09-07 11:54:52'),
(43, 41, 250, 0, '2023-09-07 06:04:46', '2023-09-07 06:04:46', '2023-09-07 12:04:46'),
(44, 41, 250, 0, '2023-09-07 09:52:50', '2023-09-07 09:52:50', '2023-09-07 15:52:50'),
(45, 41, 250, 0, '2023-09-07 09:57:10', '2023-09-07 09:57:10', '2023-09-07 15:57:10'),
(46, 41, 250, 0, '2023-09-07 10:00:59', '2023-09-07 10:00:59', '2023-09-07 16:00:59'),
(47, 41, 250, 0, '2023-09-07 11:08:29', '2023-09-07 11:08:29', '2023-09-07 17:08:29'),
(48, 41, 250, 0, '2023-09-07 13:50:45', '2023-09-07 13:50:45', '2023-09-07 19:50:45'),
(49, 41, 250, 0, '2023-09-07 13:53:33', '2023-09-07 13:53:33', '2023-09-07 19:53:33'),
(50, 41, 250, 0, '2023-09-07 13:54:16', '2023-09-07 13:54:16', '2023-09-07 19:54:16'),
(51, 41, 250, 0, '2023-09-07 13:55:35', '2023-09-07 13:55:35', '2023-09-07 19:55:35'),
(52, 41, 250, 0, '2023-09-07 13:57:07', '2023-09-07 13:57:07', '2023-09-07 19:57:07'),
(53, 41, 250, 0, '2023-09-07 14:04:51', '2023-09-07 14:04:51', '2023-09-07 20:04:51'),
(54, 41, 250, 0, '2023-09-07 14:06:06', '2023-09-07 14:06:06', '2023-09-07 20:06:06'),
(55, 41, 250, 0, '2023-09-07 14:08:49', '2023-09-07 14:08:49', '2023-09-07 20:08:49'),
(56, 41, 250, 0, '2023-09-08 02:01:18', '2023-09-08 02:01:18', '2023-09-08 08:01:18'),
(57, 41, 250, 0, '2023-09-08 02:08:41', '2023-09-08 02:08:41', '2023-09-08 08:08:41'),
(58, 41, 250, 0, '2023-09-08 02:12:51', '2023-09-08 02:12:51', '2023-09-08 08:12:51'),
(59, 41, 250, 0, '2023-09-08 02:17:37', '2023-09-08 02:17:37', '2023-09-08 08:17:37'),
(60, 41, 250, 0, '2023-09-08 03:32:27', '2023-09-08 03:32:27', '2023-09-08 09:32:27'),
(61, 41, 250, 0, '2023-09-08 03:38:28', '2023-09-08 03:38:28', '2023-09-08 09:38:28'),
(62, 41, 250, 0, '2023-09-08 03:45:09', '2023-09-08 03:45:09', '2023-09-08 09:45:09'),
(63, 41, 250, 0, '2023-09-08 03:49:24', '2023-09-08 03:49:24', '2023-09-08 09:49:24'),
(64, 41, 250, 0, '2023-09-08 03:54:12', '2023-09-08 03:54:12', '2023-09-08 09:54:12'),
(65, 41, 250, 0, '2023-09-08 03:58:26', '2023-09-08 03:58:26', '2023-09-08 09:58:26'),
(66, 41, 250, 0, '2023-09-08 04:01:16', '2023-09-08 04:01:16', '2023-09-08 10:01:16'),
(67, 41, 250, 0, '2023-09-08 04:04:58', '2023-09-08 04:04:58', '2023-09-08 10:04:58'),
(68, 41, 250, 0, '2023-09-08 04:12:00', '2023-09-08 04:12:00', '2023-09-08 10:12:00'),
(69, 41, 100, 0, '2023-09-08 04:33:21', '2023-09-08 04:33:21', '2023-09-08 10:33:21'),
(70, 41, 100, 0, '2023-09-08 04:33:39', '2023-09-08 04:33:39', '2023-09-08 10:33:39'),
(71, 41, 100, 0, '2023-09-08 09:21:03', '2023-09-08 09:21:03', '2023-09-08 15:21:03'),
(72, 41, 100, 0, '2023-09-08 09:23:16', '2023-09-08 09:23:16', '2023-09-08 15:23:16'),
(73, 41, 250, 0, '2023-09-08 09:43:23', '2023-09-08 09:43:23', '2023-09-08 15:43:23'),
(74, 41, 250, 0, '2023-09-08 09:51:08', '2023-09-08 09:51:08', '2023-09-08 15:51:08'),
(75, 41, 250, 0, '2023-09-09 13:23:52', '2023-09-09 13:23:52', '2023-09-09 19:23:52'),
(76, 33, 100, 0, '2024-01-13 18:53:29', '2024-01-13 18:53:29', '2024-01-14 00:53:29'),
(77, 108, 100, 0, '2024-01-21 16:02:13', '2024-01-21 16:02:13', '2024-01-21 22:02:13'),
(78, 108, 50, 0, '2024-01-21 16:41:11', '2024-01-21 16:41:11', '2024-01-21 22:41:11'),
(79, 108, 50, 0, '2024-01-21 16:41:17', '2024-01-21 16:41:17', '2024-01-21 22:41:17'),
(80, 108, 100, 0, '2024-01-21 17:40:20', '2024-01-21 17:40:20', '2024-01-21 23:40:20'),
(81, 112, 100, 0, '2024-03-01 15:54:36', '2024-03-01 15:54:36', '2024-03-01 21:54:36'),
(82, 110, 100, 0, '2024-03-14 13:07:06', '2024-03-14 13:07:06', '2024-03-14 19:07:06'),
(83, 110, 100, 0, '2024-03-14 13:08:50', '2024-03-14 13:08:50', '2024-03-14 19:08:50'),
(84, 110, 100, 0, '2024-03-14 14:01:00', '2024-03-14 14:01:00', '2024-03-14 20:01:00'),
(85, 110, 100, 0, '2024-03-14 14:09:06', '2024-03-14 14:09:06', '2024-03-14 20:09:06'),
(86, 110, 100, 0, '2024-03-14 14:26:29', '2024-03-14 14:26:29', '2024-03-14 20:26:29'),
(87, 110, 100, 0, '2024-03-14 14:27:14', '2024-03-14 14:27:14', '2024-03-14 20:27:14'),
(88, 110, 100, 0, '2024-03-14 14:28:11', '2024-03-14 14:28:11', '2024-03-14 20:28:11'),
(89, 110, 100, 0, '2024-03-14 14:29:14', '2024-03-14 14:29:14', '2024-03-14 20:29:14'),
(90, 110, 100, 0, '2024-03-14 14:37:31', '2024-03-14 14:37:31', '2024-03-14 20:37:31'),
(91, 110, 100, 0, '2024-03-14 14:39:43', '2024-03-14 14:39:43', '2024-03-14 20:39:43'),
(92, 110, 100, 0, '2024-03-14 14:42:13', '2024-03-14 14:42:13', '2024-03-14 20:42:13'),
(93, 110, 100, 0, '2024-03-14 14:54:27', '2024-03-14 14:54:27', '2024-03-14 20:54:27'),
(94, 110, 100, 0, '2024-03-14 14:56:06', '2024-03-14 14:56:06', '2024-03-14 20:56:06'),
(95, 110, 100, 0, '2024-03-14 14:56:21', '2024-03-14 14:56:21', '2024-03-14 20:56:21'),
(96, 110, 100, 0, '2024-03-14 14:57:46', '2024-03-14 14:57:46', '2024-03-14 20:57:46'),
(97, 110, 100, 0, '2024-03-14 14:59:16', '2024-03-14 14:59:16', '2024-03-14 20:59:16'),
(98, 110, 100, 0, '2024-03-14 15:02:07', '2024-03-14 15:02:07', '2024-03-14 21:02:07'),
(99, 110, 100, 0, '2024-03-14 15:04:38', '2024-03-14 15:04:38', '2024-03-14 21:04:38'),
(100, 110, 100, 0, '2024-03-14 15:06:59', '2024-03-14 15:06:59', '2024-03-14 21:06:59'),
(101, 110, 100, 0, '2024-03-14 15:11:41', '2024-03-14 15:11:41', '2024-03-14 21:11:41'),
(102, 110, 50, 0, '2024-03-14 15:12:03', '2024-03-14 15:12:03', '2024-03-14 21:12:03'),
(103, 110, 100, 0, '2024-03-14 16:44:33', '2024-03-14 16:44:33', '2024-03-14 22:44:33'),
(104, 110, 100, 0, '2024-03-14 16:47:07', '2024-03-14 16:47:07', '2024-03-14 22:47:07'),
(105, 110, 50, 0, '2024-03-14 16:47:30', '2024-03-14 16:47:30', '2024-03-14 22:47:30'),
(106, 117, 250, 0, '2024-03-14 17:28:57', '2024-03-14 17:28:57', '2024-03-14 23:28:57'),
(107, 117, 100, 0, '2024-03-14 18:07:25', '2024-03-14 18:07:25', '2024-03-15 00:07:25'),
(108, 119, 100, 0, '2024-03-14 23:05:29', '2024-03-14 23:05:29', '2024-03-15 05:05:29'),
(109, 119, 100, 0, '2024-03-14 23:06:05', '2024-03-14 23:06:05', '2024-03-15 05:06:05'),
(110, 119, 50, 0, '2024-03-14 23:09:06', '2024-03-14 23:09:06', '2024-03-15 05:09:06'),
(111, 110, 100, 0, '2024-03-15 10:01:24', '2024-03-15 10:01:24', '2024-03-15 16:01:24'),
(112, 110, 100, 0, '2024-03-15 10:02:59', '2024-03-15 10:02:59', '2024-03-15 16:02:59'),
(113, 110, 100, 0, '2024-03-15 10:07:21', '2024-03-15 10:07:21', '2024-03-15 16:07:21'),
(114, 110, 100, 0, '2024-03-15 10:30:12', '2024-03-15 10:30:12', '2024-03-15 16:30:12'),
(115, 110, 100, 0, '2024-03-15 10:32:46', '2024-03-15 10:32:46', '2024-03-15 16:32:46'),
(116, 110, 100, 0, '2024-03-15 10:35:15', '2024-03-15 10:35:15', '2024-03-15 16:35:15'),
(117, 110, 50, 0, '2024-03-15 10:35:32', '2024-03-15 10:35:32', '2024-03-15 16:35:32'),
(118, 108, 250, 0, '2024-03-20 11:15:49', '2024-03-20 11:15:49', '2024-03-20 17:15:49'),
(119, 121, 100, 0, '2024-03-20 11:36:11', '2024-03-20 11:36:11', '2024-03-20 17:36:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `start_time` varchar(250) DEFAULT NULL,
  `end_time` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `numero_reserva` varchar(255) DEFAULT NULL,
  `reward` varchar(255) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `name` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `email` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `urlproductos` longtext DEFAULT NULL,
  `phone` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `city_id` int(11) DEFAULT 0,
  `address` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `img` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `logo` varchar(255) NOT NULL,
  `qr_code` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `img_discount` varchar(255) DEFAULT NULL,
  `saldo` double NOT NULL,
  `password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `shw_password` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `remember_token` varchar(250) DEFAULT NULL,
  `min_cart_value` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `delivery_charges_value` varchar(250) DEFAULT NULL,
  `delivery_min_charges_value` int(11) NOT NULL,
  `delivery_min_distance` int(11) NOT NULL,
  `type_charges_value` int(11) NOT NULL,
  `distance_max` varchar(255) NOT NULL,
  `opening_time` varchar(6) DEFAULT NULL,
  `closing_time` varchar(6) DEFAULT NULL,
  `trending` int(11) NOT NULL DEFAULT 0,
  `delivery_time` varchar(250) DEFAULT NULL,
  `person_cost` int(11) DEFAULT NULL,
  `lat` varchar(250) DEFAULT NULL,
  `lng` varchar(250) DEFAULT NULL,
  `c_type` varchar(255) NOT NULL,
  `c_value` varchar(255) NOT NULL,
  `t_type` int(11) NOT NULL,
  `t_value` double NOT NULL,
  `purse_x_table` varchar(200) NOT NULL,
  `purse_x_pickup` varchar(200) NOT NULL,
  `purse_x_delivery` varchar(200) NOT NULL,
  `stripe_pay` int(11) NOT NULL,
  `p_staff` int(11) NOT NULL,
  `service_del` varchar(50) NOT NULL,
  `pickup` int(11) NOT NULL,
  `open` int(11) NOT NULL DEFAULT 0,
  `type` varchar(250) DEFAULT NULL,
  `subtype` int(11) NOT NULL,
  `subsubtype` int(11) NOT NULL,
  `type_menu` int(11) NOT NULL,
  `reservation_available` int(11) NOT NULL,
  `Cuenta_clave` varchar(50) NOT NULL,
  `banco_name` varchar(300) NOT NULL,
  `s_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `numero_reserva`, `reward`, `descripcion`, `name`, `email`, `urlproductos`, `phone`, `city_id`, `address`, `img`, `logo`, `qr_code`, `status`, `img_discount`, `saldo`, `password`, `shw_password`, `remember_token`, `min_cart_value`, `delivery_charges_value`, `delivery_min_charges_value`, `delivery_min_distance`, `type_charges_value`, `distance_max`, `opening_time`, `closing_time`, `trending`, `delivery_time`, `person_cost`, `lat`, `lng`, `c_type`, `c_value`, `t_type`, `t_value`, `purse_x_table`, `purse_x_pickup`, `purse_x_delivery`, `stripe_pay`, `p_staff`, `service_del`, `pickup`, `open`, `type`, `subtype`, `subsubtype`, `type_menu`, `reservation_available`, `Cuenta_clave`, `banco_name`, `s_data`, `created_at`, `updated_at`) VALUES
(1, '19', '16', 'estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas', 'Kampai', 'kampai@acientos.com', 'https://google.com', '(222) 169 73 71', 1, 'Buffalucas, Avenida Benito Juárez, Centro, Nuevo Casas Grandes, Chih., México', '1682645563349.jpg', '1682645563690.jpg', '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', 0, NULL, 0, '$2y$10$PJZHxU59O28pLlYU6u3MvOXxLt01YF/qLniCySi8RFPjYl6g9O.zi', '11069224', NULL, '0', '0', 0, 25, 1, '25', NULL, NULL, 1, '20-25', 200, '30.4230236', '-107.915401', '1', '10', 1, 10, '0', '0', '0', 0, 1, '1', 0, 0, '1', 2, 3, 0, 0, '0', '0', 'a:2:{i:0;a:0:{}i:1;a:0:{}}', '2023-04-27 19:32:43', '2023-08-18 12:05:55'),
(45, '29', '3', 'estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas', 'Palo Santo', 'palosanto@gmail.co', 'https://acientos.xedik.com/', '3123452311', 2, 'Mercado Jamaica, Guillermo Prieto, Jamaica, Ciudad de México, CDMX, México', '1687540290375.jpg', '1687540290511.jpg', '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', 0, NULL, 0, '$2y$10$2eTYuuzeQcGEhSau63RCSuhTwc3opggEmISXX/sytsNw9SWVQi5cG', '123456789', NULL, NULL, '0', 0, 30, 1, '15', NULL, NULL, 1, '30', 190, '19.408065', '-99.1230732', '0', '0', 0, 0, '0', '0', '0', 0, 1, '1', 0, 0, '1', 2, 3, 0, 1, '0', '0', 'a:2:{i:0;a:0:{}i:1;a:0:{}}', '2023-06-13 07:14:52', '2023-09-10 03:27:28'),
(46, '42', '15', 'estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas', 'Pargo Dorado', 'pargo@gmail.co', 'https://acientos.xedik.com/', '3123456543', 2, 'Monterrey, Roma Norte, Ciudad de México, CDMX, México', '1687540251536.jpg', '1687540251436.jpg', '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', 0, NULL, 0, '$2y$10$.CerlFvqNTsQNlG5/Chvje3iP4qwkH1g.nnmcdzdl5GaLGsv8R58G', '123456789', NULL, '7000', '0', 0, 0, 1, '12', NULL, NULL, 0, '25', 200, '19.4178619', '-99.1642576', '1', '16', 1, 5, '0', '0', '0', 0, 1, '1', 0, 0, '1', 2, 4, 0, 1, '0', '0', 'a:2:{i:0;a:0:{}i:1;a:0:{}}', '2023-06-13 07:21:06', '2023-08-14 14:13:46'),
(47, '56', '20', 'estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas', 'Galeón', 'galeon@gmail.co', 'https://acientos.xedik.com/', '3331224323', 2, 'Nuevo Casas Grandes, Chih., México', '1687540053270.jpg', '1687540053647.jpg', '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', 0, NULL, 0, '$2y$10$/i0H9xXxEQlPzPwbr94ly.JGXD93h8tT3RQBFeTTuPKaUCLZdCxlS', '123456789', NULL, '8000', '0', 0, 1, 1, '12', NULL, NULL, 0, '15', 250, '30.4124523', '-107.9144836', '1', '16', 1, 3, '0', '0', '0', 0, 1, '1', 0, 0, '1', 2, 4, 0, 1, '0', '0', 'a:2:{i:0;a:0:{}i:1;a:0:{}}', '2023-06-13 07:24:08', '2023-08-15 11:17:28'),
(48, '50', '20', 'estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que tambien ingresó como texto de relleno en documentos electrónicos, quedando esencialmente igual al original. Fue popularizado en los 60s con la creación de las hojas', 'Fogon', 'fogon@gmail.co', 'https://acientos.xedik.com/', '3212341232', 2, 'Monterrey, N.L., México', '1687539728445.jpg', '1687539728121.jpg', 'iVBORw0KGgoAAAANSUhEUgAAAMgAAADICAAAAACIM/FCAAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAAAmJLR0QA/4ePzL8AAA08SURBVHja7Z1vjFXFFcB/b/exsC5xt7ACAV0VBNcK0g9K6qJWU3VrBBvigrFWyWpR22QboTGFNNumxaYkGrSFCNooXWxiAzSUgKkWW9uifIDGlD8RpXmk8LDBLehuebJ7Ye9OP8xb7rl33ty97+0f/jjny5575syce969c/acmTPnQnLYoyJwQNNXKqXUcVuvatFhutl8XCmlVpr07UoptSf5zZVxkYBTxCniFImHdLEd/vwoAC/em7jHlQAcHiZFeuOYXn4ywNUR/SfKM7YX4NRoo3NnZ4DvFfTH1hmsB64N8JSgr328/5cqXahjSZAaBJ5UCf2Um+xOkeGzWvPajfbN4xIO9OncxDK/JS3YfUl7tc8zSOM2WxRp32mbSgHceSboV6/xcgAl+zZuAxihnUbDnfxUsu5MqogyORsG8n8k1CMdx9Rbsgg32Z0iF7Kv9d4LBumeRw3S/ChhgbYaG2L/t7cK/KnZQ6xI16ZY49H8IkClwfMn7XGpFLBFAXxP+1rHq4A1SwCQQz8x1E+kPxgFnI5nGWl0cHPEKXIRWa3i4fvSFhmtPz1XitzRAXBwFgBt3zw7ecd2BH5XhcZrdIS4CoAOgFtWiZE6AFasMCTsmgYweqgVKa+WV9UFUY2Ho+dqU3SVRUS1m+xOkQvZau3ZasRJL4qL8Yss/Z4xKM8PnSKbjXiQ8VHCf1ujlFOS0hwoUnZM0K/VTIK0zKDkobbwnY43OVM2RcYN7tMeb5IuM17l9NgBDOcmu1Nk+KzWyyX17nqpILn319oJ+A5AiEU3LIr+fO8cBGDeOGCfXvb5Wr1of2lwld6jlFLbNb41k8lk+jZDM5lMJpO3Wkop5Wl8ulJK9RnCTCaTyeQ3Qz2llGrWuNwMPaCUUnnzXuxmaMne72TgQ4GfSMDv5ohT5AsUIXZtFBcbB3ADfxkkRVJFGIaplUDHEQBvltG69EGAUdOA03rBZ/o+4RApgBn7tdWqAA52A7wuI8QD9cCnRwGoqwG6/pX8idxQpOY1NQC7C7QUOdI0AF436GPGBHjlDW6yO0XOudV6O779tgrgw6MDF/R2UsbsR+LimquAU9r7umwm4L+jJ8/sYMzU1wHSd8UPe2w88LcnLa1tkwFujZIrdphP2yLnoXsBdi8RHp3cVd1wFXBM910+E8hpvGk20KPxusMD8rU03AIcLUxOBtqN3O3miFPkovO18rDbgvcToVnoJ3fHCogVXGhzUi7B3TUS2HcYoGuBwaMNzMqpAW5C9W+jlNVvxaoph9awdhLAhBsB/4/ECYt4tqogbAhJKynvV0NjvPhdSim1Q1LWRkfocpP9AlBEXSxWKz7N8OOTAxeh11rqAQ72Ju8QTzEVaQOg9Ujh5nWtpn+lvbkouUrTFxr8ndcFEeL9+4Mh/rrOMvQsg2IO2jQ3oNct1wKUUkrVWazWclO3HYVPK2jIWX8xeVpBLtBJkAt0eadRKaUyJmeTUkrptDfqlFJKOavlFBkqq2UL/tpPFznS0SG5v6NJ6ekr8hMWYJNI5HxGJino1fIlxtKQpn8Z4MQVoqGxMeCv/klAf7wn8FTvmAHQvkIIqAGYJIUtMMS3XA2wZBNAQ5P5UvUqpVSDsFotsjUjfK0dhT2xkK/VqJRSvs3XkrA0H6hH6aavld8LbRG+VoPo4Ca787XOja/VBycsuF5kuiSWvzChUPuYVCni84rkZ1sKoPE2IJ9zlQfdPEVQjFUsVi4O8ObxACuM7IUpnZZ71AK0yTtQX7j1SbGutmoVQNM1EElmtZmTvNU6ppRSa+N/TRkhys1QabWsOVjGZmjIasX6WiFwVsspMlRW6/NQdATQFQrjPh+wiM+LZK1K3Fk2pkPZnGfSwCM6RV0HPhMEvk7gEmoB0pp+NUCZ5O8cHe32n7cEJQ1Qq3EdS+66CbikWfhaGIInAvTYM1HPKKVUk8Y7RISYwNcywcdiHfPrWrlohzaxrqUhtCS5PMp/xk1252sNu6/VawsLT0fxCktjWUnL+709sRIlySYgTNYZC43GS2f6WlvnBFGnjA2bXxXhleW2JzUG7p2GXy4RHUYAvHurMURrK0DLr6LD1V1nKqLhD4NzyKbsTUvDK7YeLxhO42PBYa1PJti6vemsllNkKK1WQSOSxNAkaCyLw5UqZWQrTyFFzFOEevF5v6DMtfCMhEi+Vj7eVAAzRb5WgZoPAGxLsD/YXSlEVtqfiAFbJgMbF8TyzPnFsL9Ol77nJrtTxClSmvnVizadBj7F4EG0mqB5yiV/Kpa1U0SIBhyaYum1MwV9+VrJIkQJ5h6ihqWx4WJoXcuW5G+Cua7VYkSIbg/RKeIUSQKpRFYrNNlvAf5xp9FqW6auaAeo6SxSDJZWTbl7A9AzQgoukPkg4ZiRr7VDKaV2abzNsocYuhdbvlZO7CFKMNe1RL5Wh6Y0uXUtp4hTpFhfa0Z8+50G5bsCf/ZZgMdbShL91cScq1cDfPuHSXh93/d9WTuHDt/3/eU2/q2+7/uhfC3f930/l8Rq+b7v+36fr+VHwWDN+1rLLVarzvd93+/zflOpIt+6stJf0rLk/coSj+cmu1NkiCPEe4yWBxIYEgGfPVjaDTwEwKsTgY16dXvFV842frDE0uvkN0qTlvE8z9tg0ts8z/M838zX8jzP82xWS0NoUzUbu4e41vM8z+tRSinleZ7n9eVreZ7neZ5SSqmE+zIVJdB7B++9qYig3Sbd7SGed4qkLjKrFQ/PFDvsoxb8Fcvv9mOBr1kDsOjmCMuJpwG47uno0OW6IkYul8vlcvkIMRdAAUdwTy4KZ4wIsTmXy+XyHtd0gfe5dIbVOp7L5XK2Sv5KiJFZpnm6XNcKV+saGf+AqhI8iyqCreUk/PFMVXH0HueiOEWGw2otk1f6/M7PRvTb7aPfiIsb708s7kcG5bk49kPaIM2eI2jLAGp/EKX0mcPjAPfpJP+uUcD/zgCs0aplqiGUlrtbnh/S6bI6HzddHeCpMQGu4Xa5n3oc4Dmd5J+tBN6QR5C23wnsnal9rSeCgXQibtNGzi7Qhf+PGLnDl4auElTzGpsAD8GoqhIEdLrJ7hQ5D3ytNXr9SiQ7bYkfRBQqrH3YIC9OcBtm0Z59+wL81PMA1yQ6Mt2rlFJHs9lsNtvPHmIoQsxms9mspDQbWaYFvpqUzWaz2awyVuMPZLPZ7FabMOu6VjabzWZDT2RS0Q/0cko5JTauIma4f5Z0E26yO0XObYRohfUFqeo1k+cRQfndwO97fWmKHADYp/O1dtQCJ7WvJZ2jpQshn3h2RtI7FwaK/L4X4KmFCURuvxw4PdPSukkfqHwlcBeTKVIxGegz7PUUrvJR3/8404r4zesJf2WJeJFusjtFhsNqvSnXJeSx3w8+GLCgbUXyd29LOsQ2U5HlOkLcBfCadNHmBnSmJrANmjNUAlEOt8vS70oLv4zDW4RXqr9yNNdqtWaMAl4z6SMTFxu8CeJW42dWDODR3uQmu1Pk/Pa12g/aWt5NPIac7DeXAwfbi7wLLatcrNin86WhUwA/1+Z3JMDD5kfY6gD2yjqFbRMD/C7jAxzTjVr9i/W6ljxJfnws8Ia56bndoAjB3XqEBpEbn5bJJrf3bxwiEPQ+EdtaAkQ7f+Imu1Pk3Fitvcl5p5pHffYCfOkKS4ckY3/8cUxjvgJz7UTLoAIvZlN3zw3A29p46DSIfEWcxcDpLYJiBSN74v0VtggxuhpvPYdY99xAYvbKOYQrqlXMh/4P4d8ffZXfH4S3ar6b7E6R88nX6oND/RIKwb+BQf9gxCGpSHwxGlHy5vK1IoDT+DSAE/L8UOO8SK8862rN5CUNrGq1gOsFqeX66NBHQieXeuPOFeW13BNQ+knyb7QUr5DlDZWyJPnnzW/0JgoUCnOT3Sky3FarPcGXxU5/lmTYT/qnnOgpdohYevhr4OZ3qo9FNfl7vho90FffS0LzZIDWCQDTH4CzH8udILqVAzy9TlAktEbjwRDkC4XNDDjrFhlWq8Hsdyxqtfq+mmQpb2j9apKGAoln0YG2JnnirijrBaDIF6y8oQkiTWdk8oIwJ2MHqi5JvMZLdRrlYvnKxcCIlsCOlWlce1QaX68l10ivSbtTgmKWN5S5rqsEZZX43vaRmoFYLQkrE1QNK/BjmwcqLaWkna/lFLkgI0QJ3eKHqTDIoxJ0IzlP91AoolO7loi1dFEorFev51V3ANytAD7cL7qNNgaqMCgLDMoqUeK6YaJ5S6VZrTallCo+8cwrfDQp5GttL1zesENSXClpp8iFYrUM6DEv0sV2G4gi48zZntynbAhMUb5QWN6l0xnsCmDSpcGgo3UHEZSuXygGSgOUGzwpg1JIkc0DeQq3JSgUJgse6nqLy8xbeiHYvrz+PQjXDtK1wbor3WR3igy71RrqkFcF01wlYrXYGmUZND0kT0Yfa9QfMKquBujUAvwy4J63DFYJMs1rw/xoiFsjeu0sg0H6sGNhqDgM0Juv0Hg4GuOG4P2xpUiYZRxNcpPdKeIUiYf/A/C26vQ3P3KEAAAAAElFTkSuQmCC', 0, NULL, 0, '$2y$10$4xwswbVEj0Te5i1eUfCBCOSey1zfYRSDuZt69W0hstX7NPQ5SO9aa', '123456789', NULL, '7000', '0', 0, 1, 1, '10', NULL, NULL, 1, '25', 250, '25.6866142', '-100.3161126', '1', '16', 1, 5, '0', '0', '0', 0, 1, '1', 0, 0, '1', 2, 4, 0, 1, '0', '0', 'a:2:{i:0;a:0:{}i:1;a:0:{}}', '2023-06-13 07:27:07', '2023-08-18 18:14:19'),
(49, '20', '30', 'Esta es una descripción muy especial para mi restaurante japonés :D', 'Mauricio Velasco', 'velascoflores93@gmail.com', 'https://google.com', '5568046397', 2, 'Alondra 105, Cuauhtémoc, San Nicolás de los Garza, Nuevo León, Mexico', '1710899558156.jpg', '1710899558265.jpg', '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', 0, NULL, 0, '$2y$10$PYoSkwwoDSQAxrPxphBRnu3nMWwvAfnVacL.ouTwPf0CtgSUFb896', '123456', NULL, NULL, '0', 0, 0, 1, '0', NULL, NULL, 1, NULL, NULL, '25.7263786', '-100.2976036', '0', '0', 0, 0, '0', '0', '0', 0, 1, '1', 0, 0, '1', 2, 3, 0, 1, '0', '0', 'a:2:{i:0;a:0:{}i:1;a:0:{}}', '2024-03-19 19:52:38', '2024-03-20 11:12:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(2500) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `lat` varchar(250) DEFAULT NULL,
  `lng` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_image`
--

CREATE TABLE `user_image` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visits_store`
--

CREATE TABLE `visits_store` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `visits` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `addon`
--
ALTER TABLE `addon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner_store`
--
ALTER TABLE `banner_store`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `blocked_days`
--
ALTER TABLE `blocked_days`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `bloquear`
--
ALTER TABLE `bloquear`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cards_user`
--
ALTER TABLE `cards_user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart_addon`
--
ALTER TABLE `cart_addon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cart_coupen`
--
ALTER TABLE `cart_coupen`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cashbacks`
--
ALTER TABLE `cashbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorystore`
--
ALTER TABLE `categorystore`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `changed_rewards`
--
ALTER TABLE `changed_rewards`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coleccioninits`
--
ALTER TABLE `coleccioninits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coleccions`
--
ALTER TABLE `coleccions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `commaned`
--
ALTER TABLE `commaned`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`),
  ADD KEY `status_2` (`status`);

--
-- Indices de la tabla `delivery_boys`
--
ALTER TABLE `delivery_boys`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `deposits`
--
ALTER TABLE `deposits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `feedback_survey`
--
ALTER TABLE `feedback_survey`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `follownegocios`
--
ALTER TABLE `follownegocios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `gift_cards`
--
ALTER TABLE `gift_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `horas`
--
ALTER TABLE `horas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_addon`
--
ALTER TABLE `item_addon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_loyalty`
--
ALTER TABLE `item_loyalty`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `loyalty`
--
ALTER TABLE `loyalty`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `offer_store`
--
ALTER TABLE `offer_store`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opening_times`
--
ALTER TABLE `opening_times`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `orders_staff`
--
ALTER TABLE `orders_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_addon`
--
ALTER TABLE `order_addon`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `perm`
--
ALTER TABLE `perm`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `rate`
--
ALTER TABLE `rate`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rate_staff`
--
ALTER TABLE `rate_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `recompensas`
--
ALTER TABLE `recompensas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportars`
--
ALTER TABLE `reportars`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sociales`
--
ALTER TABLE `sociales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sociales_negocios`
--
ALTER TABLE `sociales_negocios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `text`
--
ALTER TABLE `text`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trending_users_xp`
--
ALTER TABLE `trending_users_xp`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_image`
--
ALTER TABLE `user_image`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `visits_store`
--
ALTER TABLE `visits_store`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `addon`
--
ALTER TABLE `addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `banner_store`
--
ALTER TABLE `banner_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `blocked_days`
--
ALTER TABLE `blocked_days`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `bloquear`
--
ALTER TABLE `bloquear`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cards_user`
--
ALTER TABLE `cards_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cart_addon`
--
ALTER TABLE `cart_addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cart_coupen`
--
ALTER TABLE `cart_coupen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cashbacks`
--
ALTER TABLE `cashbacks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorystore`
--
ALTER TABLE `categorystore`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `changed_rewards`
--
ALTER TABLE `changed_rewards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `coleccioninits`
--
ALTER TABLE `coleccioninits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `coleccions`
--
ALTER TABLE `coleccions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `commaned`
--
ALTER TABLE `commaned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `delivery_boys`
--
ALTER TABLE `delivery_boys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `deposits`
--
ALTER TABLE `deposits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `feedback_survey`
--
ALTER TABLE `feedback_survey`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `follownegocios`
--
ALTER TABLE `follownegocios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `gift_cards`
--
ALTER TABLE `gift_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `horas`
--
ALTER TABLE `horas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `item_addon`
--
ALTER TABLE `item_addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `item_loyalty`
--
ALTER TABLE `item_loyalty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `loyalty`
--
ALTER TABLE `loyalty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `offer_store`
--
ALTER TABLE `offer_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `opening_times`
--
ALTER TABLE `opening_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orders_staff`
--
ALTER TABLE `orders_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_addon`
--
ALTER TABLE `order_addon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `perm`
--
ALTER TABLE `perm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rate`
--
ALTER TABLE `rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rate_staff`
--
ALTER TABLE `rate_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `recompensas`
--
ALTER TABLE `recompensas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT de la tabla `reportars`
--
ALTER TABLE `reportars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sociales`
--
ALTER TABLE `sociales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sociales_negocios`
--
ALTER TABLE `sociales_negocios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de la tabla `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `text`
--
ALTER TABLE `text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de la tabla `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `trending_users_xp`
--
ALTER TABLE `trending_users_xp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT de la tabla `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user_image`
--
ALTER TABLE `user_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `visits_store`
--
ALTER TABLE `visits_store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
