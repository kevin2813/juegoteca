-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-07-2021 a las 17:02:49
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_juego` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `apodo` varchar(100) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `likes` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_juego`, `id_usuario`, `apodo`, `comentario`, `fecha`, `likes`) VALUES
(4, 1, 'Esven', 'Muy bueno y entretenido para jugar con amigos o solo, las estrategias de los personajes y sus historias lo hacen más interesante al juego. Tiene varios modos de juego y vale la pena probarlos, súper recomendado para pasar el tiempo. :)', '2021-07-15 03:11:00', 8),
(4, 2, 'test-user', 'Es un excelente juego para jugar con amigos, divertirse y pasar el rato haciendo sus aventuras o travesuras como el golpear a tus compañeros, y a medida que pasan los días se vuelve cada vez más difícil y hay que craftear un montón de objetos para sobrevi', '2021-07-15 12:41:37', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE `contactos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `comentario` varchar(255) NOT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `contactos`
--

INSERT INTO `contactos` (`id`, `nombre`, `correo`, `telefono`, `comentario`, `fecha`) VALUES
(1, 'test1', 'test@test.cl', '123123112', 'asdasdsadasdasd', '2021-07-16 16:36:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` float NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `plataforma` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `miniatura` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `categoria`, `imagen`, `descripcion`, `plataforma`, `cantidad`, `miniatura`) VALUES
(1, 'Rust', 14900, 'supervivencia,fabricacion,multijugador,sandbox', 'https://cdn.cloudflare.steamstatic.com/steam/apps/252490/ss_e825b087b95e51c3534383cfd75ad6e8038147c3.600x338.jpg?t=1624541649', 'El único objetivo de Rust es sobrevivir, todo quiere que mueras, la vida silvestre de la isla y otros habitantes, el medio ambiente, otros sobrevivientes. Haz lo que sea necesario para que sobrevivir otra noche.', 'pc,ps4', 16, 'https://cdn.cloudflare.steamstatic.com/steam/apps/252490/header.jpg?t=1624541649'),
(2, 'Fall Guys: Ultimate Knockout', 7700, 'multijugador,divertido,batalla real,coqueto', 'https://cdn.cloudflare.steamstatic.com/steam/apps/1097150/ss_b2b6b170330b8af1f50d0e90efad984adafeb281.600x338.jpg?t=1621939955', 'Fall Guys es un juego multijugador masivo tipo party con hasta 60 jugadores online en un enfrentamiento todos contra todos que se desarrolla ronda tras ronda entre un caos creciente hasta que solo queda un único vencedor.', 'pc', 9, 'https://cdn.cloudflare.steamstatic.com/steam/apps/1097150/header.jpg?t=1621939955'),
(3, 'Age of Empires II: Definitive Edition', 8799, 'estrategia,rts,constructor de ciudades,accion', 'https://cdn.cloudflare.steamstatic.com/steam/apps/813780/ss_f270aa4e146459dc8b75a69bfecf23d13b0e8df6.600x338.jpg?t=1625261006', 'Age of Empires II: Definitive Edition presenta \"Los últimos Khanes\" con 3 nuevas campañas y 4 nuevas Civilizaciones. Las actualizaciones frecuentes incluyen eventos, contenido adicional, nuevos modos de juego y características mejoradas con la reciente ad', 'pc', 25, 'https://cdn.cloudflare.steamstatic.com/steam/apps/813780/header.jpg?t=1625261006'),
(4, 'Don\'t Starve Together', 6400, 'supervivencia,2d', 'https://cdn.cloudflare.steamstatic.com/steam/apps/322330/ss_24608cbb9e37cfa46751c93312f14b3e18854137.600x338.jpg?t=1624553984', 'Don\'t Starve Together es la expansión multijugador independiente del juego de supervivencia sin límites Don\'t Starve.', 'pc', 30, 'https://cdn.cloudflare.steamstatic.com/steam/apps/322330/header_alt_assets_23.jpg?t=1624553984');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `apodo` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rut` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `region` int(11) NOT NULL,
  `comuna` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `fecha` varchar(100) NOT NULL,
  `fecha_registro` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `apodo`, `correo`, `clave`, `rut`, `telefono`, `region`, `comuna`, `direccion`, `fecha`, `fecha_registro`, `tipo`) VALUES
(1, 'kevin', 'rodast', 'Esven', 'kevin.rodast.95@gmail.com', 'test', '188253733', '+9999999', 15, 15101, 'dir 5999', '1995-07-15', '2021-07-14 11:32:09', 'admin'),
(2, 'test', 'test', 'test-user', 'test@gmail.com', 'test', '123456789', '12312312', 15, 15101, 'test 123', '2021-07-08', '2021-07-15 11:30:24', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_juego`,`id_usuario`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
