-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-10-2018 a las 20:09:37
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicajuventud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `1breaks`
--

CREATE TABLE `1breaks` (
  `id` int(10) UNSIGNED NOT NULL,
  `h1` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `1breaks`
--

INSERT INTO `1breaks` (`id`, `h1`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Contribuimos \r\na mejorar la calidad \r\nde vida de la población \r\nde Chihuahua', 'fondo.jpg', '2018-10-17 17:00:00', '2018-10-17 22:27:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `2breaks`
--

CREATE TABLE `2breaks` (
  `id` int(10) UNSIGNED NOT NULL,
  `h1` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `2breaks`
--

INSERT INTO `2breaks` (`id`, `h1`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Ahora consultar\r\ntus resultados\r\nes muy sencillo', 'fondo.jpg', '2018-10-17 17:00:00', '2018-10-17 17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `3breaks`
--

CREATE TABLE `3breaks` (
  `id` int(10) UNSIGNED NOT NULL,
  `h1` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `3breaks`
--

INSERT INTO `3breaks` (`id`, `h1`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Contribuimos \r\na mejorar la calidad \r\nde vida de la población \r\nde Chihuahua', 'fondo.jpg', '2018-10-17 17:00:00', '2018-10-17 17:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `title`, `slug`, `content`, `img`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Artículo #1', 'articulo-1', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<ul>\r\n	<li>Objeto #1</li>\r\n	<li>Objeto #2</li>\r\n	<li>Objeto #3</li>\r\n</ul>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<ol>\r\n	<li>Objeto #1</li>\r\n	<li>Objeto #2</li>\r\n	<li>Objeto #3</li>\r\n</ol>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'article_5bc781b46678c0.04022543.jpg', 1, 1, '2018-10-18 00:38:44', '2018-10-18 09:20:31'),
(2, 'Artículo #2', 'articulo-2', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', 'article_5bc781ccc00fb0.53737164.jpg', 1, 1, '2018-10-18 00:39:08', '2018-10-18 00:39:08'),
(3, 'Artículo #3', 'articulo-3', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'article_5bc781e89d1855.37490523.jpg', 1, 1, '2018-10-18 00:39:36', '2018-10-18 00:39:36'),
(4, 'Artículo #4', 'articulo-4', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n\r\n<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>', 'article_5bc8ae43d17145.04242383.jpg', 1, 1, '2018-10-18 22:01:07', '2018-10-18 22:01:07'),
(5, 'Artículo #5', 'articulo-5', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>\r\n\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?</p>', 'article_5bc8aec490ebd3.12512527.jpg', 1, 1, '2018-10-18 22:03:16', '2018-10-18 22:03:16'),
(6, 'Artículo de prueba', 'articulo-de-prueba', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'article_5bc8aedb22f9d5.61255537.jpg', 1, 1, '2018-10-18 22:03:39', '2018-10-19 02:46:03'),
(7, 'Artículo de prueba #7', 'articulo-de-prueba-7', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'article_5bc8f1705b2364.10268715.jpg', 1, 1, '2018-10-19 02:47:44', '2018-10-19 02:47:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `headers`
--

CREATE TABLE `headers` (
  `id` int(10) UNSIGNED NOT NULL,
  `h1` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `headers`
--

INSERT INTO `headers` (`id`, `h1`, `sub`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Clínica Juventud te ofrece los servicios de laboratorio, imagenología, farmacia con servicio a domicilio y consulta médica en un mismo lugar, de manera oportuna y eficaz.', 'Además, podemos toma tus muestras médicas en la comodidad del hogar.\r\nContamos con profesionales altamente capacitados y estrictos procesos de calidad.', 'fondo.jpg', '2018-10-17 17:00:00', '2018-10-19 22:08:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(29, '2014_10_12_000000_create_users_table', 1),
(30, '2014_10_12_100000_create_password_resets_table', 1),
(31, '2018_10_09_183256_create_profiles_table', 1),
(32, '2018_10_10_155649_create_articles_table', 1),
(33, '2018_10_10_202630_create_packs_table', 1),
(34, '2018_10_10_203001_create_packservices_table', 1),
(35, '2018_10_10_212642_create_packrequeriments_table', 1),
(36, '2018_10_16_172953_create_services_table', 1),
(37, '2018_10_16_173232_create_serviceservices_table', 1),
(38, '2018_10_16_173330_create_servicerequirements_table', 1),
(39, '2018_10_16_200241_create_headers_table', 1),
(40, '2018_10_16_200351_create_1breaks_table', 1),
(41, '2018_10_16_200403_create_2breaks_table', 1),
(42, '2018_10_16_200416_create_3breaks_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packrequeriments`
--

CREATE TABLE `packrequeriments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `packservice_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `packrequeriments`
--

INSERT INTO `packrequeriments` (`id`, `name`, `packservice_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Anticuerpos anti tiroideos', 2, 1, 1, '2018-10-18 04:36:19', '2018-10-18 04:36:19'),
(2, 'Coagulación', 2, 1, 1, '2018-10-18 04:36:27', '2018-10-18 04:36:27'),
(3, 'Ck total yfraccion mb', 2, 1, 1, '2018-10-18 04:36:35', '2018-10-18 04:36:35'),
(4, 'Electrolítos séricos', 2, 1, 1, '2018-10-18 04:36:45', '2018-10-18 04:36:45'),
(5, 'Número #1', 3, 1, 1, '2018-10-19 02:56:58', '2018-10-19 02:56:58'),
(6, '#2: Número #2', 2, 1, 1, '2018-10-19 02:57:11', '2018-10-19 02:57:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packs`
--

CREATE TABLE `packs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `packs`
--

INSERT INTO `packs` (`id`, `title`, `slug`, `img`, `cover`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Perfiles', 'perfiles', 'pack_5bc7846e5467e5.57846885.jpg', 'cover_5bc7846e54f8a2.47851808.jpg', 1, 1, '2018-10-18 00:50:22', '2018-10-18 00:50:22'),
(2, 'Check-Ups', 'check-ups', 'pack_5bc78483cdeef1.95517295.jpg', 'cover_5bc78483ce7914.75787047.jpg', 1, 1, '2018-10-18 00:50:43', '2018-10-18 00:50:43'),
(3, 'Promocionesss', 'promocionesss', 'pack_5bc784c9470563.73439501.jpg', 'cover_5bc8f358800581.15877307.jpg', 1, 1, '2018-10-18 00:51:53', '2018-10-19 02:55:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `packservices`
--

CREATE TABLE `packservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `pack_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `packservices`
--

INSERT INTO `packservices` (`id`, `name`, `pack_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ácido úrico en orina de 24 horas', 3, 1, 1, '2018-10-18 02:48:04', '2018-10-18 02:48:04'),
(2, 'Clínicos', 1, 1, 1, '2018-10-18 04:35:39', '2018-10-18 04:35:39'),
(3, 'Empresariales', 2, 1, 1, '2018-10-18 04:35:49', '2018-10-19 02:56:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2018-10-17 21:47:28', '2018-10-17 21:47:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicerequirements`
--

CREATE TABLE `servicerequirements` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `serviceservice_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicerequirements`
--

INSERT INTO `servicerequirements` (`id`, `name`, `serviceservice_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'No requiere ayuno.', 1, 1, 1, '2018-10-18 03:03:11', '2018-10-18 03:13:10'),
(2, 'Se requiere la recolección de orina de 24 horas.', 1, 1, 1, '2018-10-18 03:15:13', '2018-10-18 03:15:13'),
(3, 'Acuda al laboratorio para recibir las instrucciones y el recipiente para la recolección de orina de 24 horas.', 1, 1, 1, '2018-10-18 03:15:28', '2018-10-18 03:15:28'),
(4, 'Número #1', 3, 1, 1, '2018-10-19 02:52:19', '2018-10-19 02:55:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `subtitle` varchar(400) NOT NULL,
  `img` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `subtitle`, `img`, `cover`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Laboratorio', 'laboratorio', 'Amplia gama en análisis clínicos para la prevención y diagnóstico de padecimientos que pueden poner en riesgo tu salud y la de tus seres queridos.', 'service_5bc8f0166a00f3.59144644.svg', 'cover_5bc8f0bbf3d4d1.87706253.jpg', 1, 1, '2018-10-17 22:44:09', '2018-10-19 02:49:18'),
(2, 'Imagenología', 'imagenologia', 'Alta tecnología en rayos X y sonografía para la prevención y diagnóstico de padecimientos que pueden poner en riesgo tu salud y la de los tuyos. Prevenir es quererse.', 'service_5bc8f00b49c080.12824072.svg', 'cover_5bc76a2b2d3457.52831176.jpg', 1, 1, '2018-10-17 22:58:19', '2018-10-19 02:41:47'),
(3, 'Atención Médica', 'atencion-medica', 'Médicos generales y de especialidad, reconocidos y con una amplia trayectoria al servicio de tu salud y la de quienes más te importan.', 'service_5bc8f00362d4a0.59147961.svg', 'cover_5bc76c0990d1a5.33038592.jpg', 1, 1, '2018-10-17 23:06:17', '2018-10-19 02:41:39'),
(4, 'Farmacia', 'farmacia', 'Contamos con una completa gama de medicamentos de patente. Además, podemos llevarlos hasta la comodidad de tu propia casa. Surte tu receta médica con nosotros sin necesidad de salir de tu hogar. Aprovecha hoy mismo los beneficios que Clínica Juventud tiene para ti.', 'service_5bc8effc199d29.62057583.svg', 'cover_5bc76cd23c0b36.17706040.jpg', 1, 1, '2018-10-17 23:09:38', '2018-10-19 02:41:32'),
(5, 'Servicio a Domicilio', 'servicio-a-domicilio', 'Cuídate sin salir de casa. Contamos con servicio a domicilio en farmacia y toma de muestras. Quédate a descansar en la comodidad de tu hogar déjanos encargarnos de tu salud sin que tengas que dejar tu espacio. Llámanos y estaremos muy pronto contigo para poder ayudarte.', 'service_5bc8eff454e6f8.48625588.svg', 'cover_5bc76d70167476.01739338.jpg', 1, 1, '2018-10-17 23:12:16', '2018-10-19 02:41:24'),
(6, 'Servicios a Empresas', 'servicios-a-empresas', 'En Clínica Juventud apoyamos al sector empresarial con los servicios de medicina preventiva, medicina ocupacional y control de calidad externo, a través de nuestro gabinete de laboratorio e imagenología con la siguiente gama de estudios y servicios.', 'service_5bc8efea1dc281.10461517.svg', 'cover_5bc76e9eb579d5.92017167.jpg', 1, 1, '2018-10-17 23:17:18', '2018-10-19 02:41:14'),
(7, 'Consultorios Disponibles', 'consultorios-disponibles', 'Amigo médico, en Clínica Juventud tenemos un espacio para ti, un lugar totalmente equipado, amueblado y con todos los servicios que necesitas para tu consulta privada. Pregunta por nuestros consultorios disponibles hoy mismo. Estaremos felices de contar contigo en nuestras instalaciones.', 'service_5bc8efd1094b17.55510896.svg', 'cover_5bc76f053f6968.78553960.jpg', 1, 1, '2018-10-17 23:19:01', '2018-10-19 02:40:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serviceservices`
--

CREATE TABLE `serviceservices` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `serviceservices`
--

INSERT INTO `serviceservices` (`id`, `name`, `service_id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Ácido úrico en orina de 24 horas', 1, 1, 1, '2018-10-18 02:50:37', '2018-10-18 02:50:37'),
(2, 'Ácido úrico en sangre', 1, 1, 1, '2018-10-18 02:51:04', '2018-10-18 02:51:04'),
(3, 'Albúmina en orina de 24 horasss', 2, 1, 1, '2018-10-18 02:51:14', '2018-10-19 02:49:36'),
(4, 'Servicio #4', 1, 1, 1, '2018-10-19 02:50:51', '2018-10-19 02:51:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `email`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administración', 'Mixen', 'admin@mixen.mx', '$2y$10$MzHDN9fZ0pEpcKeV/y.we.4QcpTBDCh5t.R7xE3MgHyGm9RGXdqnO', 1, 'ZVj2UeCp5um5S0Y6AsvwHDd4MAj2hx45jL8ZIIrONIvf5FXf1fR4ZaPyT6A0', '2018-10-17 21:47:27', '2018-10-19 02:06:20');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `1breaks`
--
ALTER TABLE `1breaks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `2breaks`
--
ALTER TABLE `2breaks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `3breaks`
--
ALTER TABLE `3breaks`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `articles_title_unique` (`title`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `headers`
--
ALTER TABLE `headers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `packrequeriments`
--
ALTER TABLE `packrequeriments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packrequeriments_packservice_id_foreign` (`packservice_id`),
  ADD KEY `packrequeriments_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `packs`
--
ALTER TABLE `packs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `packs_title_unique` (`title`),
  ADD KEY `packs_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `packservices`
--
ALTER TABLE `packservices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `packservices_pack_id_foreign` (`pack_id`),
  ADD KEY `packservices_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `servicerequirements`
--
ALTER TABLE `servicerequirements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicerequirements_serviceservice_id_foreign` (`serviceservice_id`),
  ADD KEY `servicerequirements_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `services_title_unique` (`title`),
  ADD KEY `services_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `serviceservices`
--
ALTER TABLE `serviceservices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceservices_service_id_foreign` (`service_id`),
  ADD KEY `serviceservices_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `1breaks`
--
ALTER TABLE `1breaks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `2breaks`
--
ALTER TABLE `2breaks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `3breaks`
--
ALTER TABLE `3breaks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `headers`
--
ALTER TABLE `headers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `packrequeriments`
--
ALTER TABLE `packrequeriments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `packs`
--
ALTER TABLE `packs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `packservices`
--
ALTER TABLE `packservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `servicerequirements`
--
ALTER TABLE `servicerequirements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `serviceservices`
--
ALTER TABLE `serviceservices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `packrequeriments`
--
ALTER TABLE `packrequeriments`
  ADD CONSTRAINT `packrequeriments_packservice_id_foreign` FOREIGN KEY (`packservice_id`) REFERENCES `packservices` (`id`),
  ADD CONSTRAINT `packrequeriments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `packs`
--
ALTER TABLE `packs`
  ADD CONSTRAINT `packs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `packservices`
--
ALTER TABLE `packservices`
  ADD CONSTRAINT `packservices_pack_id_foreign` FOREIGN KEY (`pack_id`) REFERENCES `packs` (`id`),
  ADD CONSTRAINT `packservices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `servicerequirements`
--
ALTER TABLE `servicerequirements`
  ADD CONSTRAINT `servicerequirements_serviceservice_id_foreign` FOREIGN KEY (`serviceservice_id`) REFERENCES `serviceservices` (`id`),
  ADD CONSTRAINT `servicerequirements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `serviceservices`
--
ALTER TABLE `serviceservices`
  ADD CONSTRAINT `serviceservices_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `serviceservices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
