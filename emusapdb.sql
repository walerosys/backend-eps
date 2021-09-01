-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-09-2021 a las 04:24:22
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emusapdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividads`
--

CREATE TABLE `actividads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actividad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unidad_de_medida` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especificacion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo` double(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `actividads`
--

INSERT INTO `actividads` (`id`, `nombre`, `actividad`, `unidad_de_medida`, `especificacion`, `costo`, `created_at`, `updated_at`) VALUES
(2, 'corte y rotura', 'corte y rotura de pavimento de dos metros de profundidad', 'm2', 'esta actividad comprende dsdfdfv', 25.94, '2021-06-28 23:21:10', '2021-06-28 23:21:10'),
(3, 'corte y rotura de pavimento', 'corte y rotura de pavimento de tres metros de profundidad', 'm2', 'esta actividad comprende dsdfdfvfffd', 25.94, '2021-08-14 00:07:45', '2021-08-14 00:07:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacions`
--

CREATE TABLE `instalacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_id` bigint(20) UNSIGNED NOT NULL,
  `uservicio_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `sub_total` double(9,2) NOT NULL,
  `utilidad` double(9,2) NOT NULL,
  `igv` double(9,2) NOT NULL,
  `monto_total` double(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instalacions`
--

INSERT INTO `instalacions` (`id`, `tipo_id`, `uservicio_id`, `user_id`, `fecha`, `sub_total`, `utilidad`, `igv`, `monto_total`, `created_at`, `updated_at`) VALUES
(9, 2, 1, 1, '2021-08-13 19:07:45', 34.50, 23.38, 45.67, 88.50, '2021-08-14 02:55:13', '2021-08-14 02:55:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instalacions_actividads`
--

CREATE TABLE `instalacions_actividads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actividad_id` bigint(20) UNSIGNED NOT NULL,
  `instalacion_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` double(9,2) NOT NULL,
  `costo_de_instalacion` double(9,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `instalacions_actividads`
--

INSERT INTO `instalacions_actividads` (`id`, `actividad_id`, `instalacion_id`, `cantidad`, `costo_de_instalacion`, `created_at`, `updated_at`) VALUES
(1, 2, 9, 8.00, 56.70, '2021-08-14 02:55:13', '2021-08-14 02:55:13'),
(2, 3, 9, 4.00, 66.70, '2021-08-14 02:55:13', '2021-08-14 02:55:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_20_134452_create_roles_table', 1),
(5, '2021_03_20_134746_create_role_user_table', 1),
(6, '2021_03_20_140557_create_actividads_table', 1),
(7, '2021_03_20_141036_create_usuario_del_servicios_table', 1),
(8, '2021_03_20_141131_create_tipodeinstalacions_table', 1),
(9, '2021_03_20_141224_create_instalacions_table', 1),
(10, '2021_03_20_142027_create_instalacions_actividads_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2021-03-20 19:23:57', '2021-03-20 19:23:57'),
(2, 'user', 'User', '2021-03-20 19:23:57', '2021-03-20 19:23:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2021-03-20 19:36:52', '2021-03-20 19:36:52'),
(2, 2, 2, '2021-06-28 19:40:46', '2021-06-28 19:40:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodeinstalacions`
--

CREATE TABLE `tipodeinstalacions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipodeinstalacions`
--

INSERT INTO `tipodeinstalacions` (`id`, `codigo`, `nombre`, `created_at`, `updated_at`) VALUES
(2, 'ABC', 'INSTALACION DE AGUA POTABLE DE 6P', '2021-08-11 20:47:18', '2021-08-11 20:47:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `dni`, `celular`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'wagner', 'leon ramos', '87654322', '922222221', 'wagner@gmail.com', NULL, '$2y$10$PO.wGcQM6u8Ypet6H1azm.MOl/JbiUH1oNPnOGnqr.ZETpT0hWT7q', NULL, '2021-03-20 19:36:52', '2021-03-21 00:08:22'),
(2, 'raul', 'leon ramos', '87654327', '922222222', 'alex@gmail.com', NULL, '$2y$10$HRWY3aoqEr7v7WfU2FMwYexH2e4lkx79UuEvUVebxoRFfkYDN7VUO', NULL, '2021-06-28 19:40:46', '2021-06-28 19:43:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_del_servicios`
--

CREATE TABLE `usuario_del_servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `razon_social` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ruc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `codigo_catastral` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `inscripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_del_servicios`
--

INSERT INTO `usuario_del_servicios` (`id`, `nombre`, `apellidos`, `tipo`, `razon_social`, `ruc`, `dni`, `direccion`, `codigo_catastral`, `inscripcion`, `created_at`, `updated_at`) VALUES
(1, 'Juan', 'Lopez', 'Zuñiga', 'america expres', '10765434569', '76543219', 'Av. pachacutek', '9876', 'tyu', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividads`
--
ALTER TABLE `actividads`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instalacions`
--
ALTER TABLE `instalacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instalacions_tipo_id_foreign` (`tipo_id`),
  ADD KEY `instalacions_uservicio_id_foreign` (`uservicio_id`),
  ADD KEY `instalacions_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `instalacions_actividads`
--
ALTER TABLE `instalacions_actividads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instalacions_actividads_actividad_id_foreign` (`actividad_id`),
  ADD KEY `instalacions_actividads_instalacion_id_foreign` (`instalacion_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `tipodeinstalacions`
--
ALTER TABLE `tipodeinstalacions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario_del_servicios`
--
ALTER TABLE `usuario_del_servicios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividads`
--
ALTER TABLE `actividads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `instalacions`
--
ALTER TABLE `instalacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `instalacions_actividads`
--
ALTER TABLE `instalacions_actividads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipodeinstalacions`
--
ALTER TABLE `tipodeinstalacions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario_del_servicios`
--
ALTER TABLE `usuario_del_servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `instalacions`
--
ALTER TABLE `instalacions`
  ADD CONSTRAINT `instalacions_tipo_id_foreign` FOREIGN KEY (`tipo_id`) REFERENCES `tipodeinstalacions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `instalacions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `instalacions_uservicio_id_foreign` FOREIGN KEY (`uservicio_id`) REFERENCES `usuario_del_servicios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `instalacions_actividads`
--
ALTER TABLE `instalacions_actividads`
  ADD CONSTRAINT `instalacions_actividads_actividad_id_foreign` FOREIGN KEY (`actividad_id`) REFERENCES `actividads` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `instalacions_actividads_instalacion_id_foreign` FOREIGN KEY (`instalacion_id`) REFERENCES `instalacions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
