-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2020 at 06:22 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teamone`
--

-- --------------------------------------------------------

--
-- Table structure for table `administradores_cp`
--

CREATE TABLE `administradores_cp` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `administradores_cp`
--

INSERT INTO `administradores_cp` (`id`, `nombre`, `email`, `foto`, `password`, `perfil`, `estado`, `fecha`) VALUES
(1, 'Brayan Alexander Gómez Manco', 'gomezmancobrayanalexander@gmail.com', 'assets/dist/img/profiles/54/avatar04.png', 'cf0e09bbab45cdf179e2f421fad4fe65', 'administrador', 1, '2020-10-21 20:08:49');

-- --------------------------------------------------------

--
-- Table structure for table `bandeja_de_entrada`
--

CREATE TABLE `bandeja_de_entrada` (
  `id` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `labor` text COLLATE utf8_spanish_ci NOT NULL,
  `para` text COLLATE utf8_spanish_ci NOT NULL,
  `de` text COLLATE utf8_spanish_ci NOT NULL,
  `asunto` text COLLATE utf8_spanish_ci NOT NULL,
  `informacion` text COLLATE utf8_spanish_ci NOT NULL,
  `archivo` text COLLATE utf8_spanish_ci NOT NULL,
  `visto` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `bandeja_de_entrada`
--

INSERT INTO `bandeja_de_entrada` (`id`, `id_institucion`, `id_usuario`, `nombre`, `labor`, `para`, `de`, `asunto`, `informacion`, `archivo`, `visto`, `fecha`) VALUES
(2, 1, 51, 'Alex Manco Usuga ', 'profesor', 'brayan@gmail.com', 'alex@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Algoritmo_voltaje.java', 'fa', '2020-10-08 19:43:55'),
(3, 1, 51, 'Alex Manco Usuga ', 'profesor', 'alex@gmail.com', 'alex@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', '', 'fa', '2020-10-08 19:34:01'),
(4, 1, 51, 'Alex Manco Usuga ', 'estudiante', 'brayan@gmail.com', 'alex@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', '', 'fa', '2020-10-08 19:34:04'),
(6, 1, 55, 'Brayan Manco', 'profesor', 'alex@gmail.com', 'brayan@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', '', 'fa', '2020-10-08 19:34:13'),
(7, 1, 51, 'Alex Manco Usuga ', 'profesor', 'brayan@gmail.com', 'alex@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Guía 2 - Filosofía - Once - digital.pdf', 'far', '2020-10-08 19:34:15'),
(8, 1, 55, 'Brayan Manco', 'profesor', 'alex@gmail.com', 'brayan@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Algoritmo_voltaje.java', 'far', '2020-10-08 19:28:29'),
(9, 1, 55, 'Brayan Manco', 'profesor', 'alex@gmail.com', 'brayan@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Algoritmo_voltaje.java', 'far', '2020-10-08 19:28:31'),
(10, 1, 51, 'Alex Manco Usuga ', 'estudiante', 'brayan@gmail.com', 'alex@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', '', 'fa', '2020-10-08 19:34:27'),
(11, 1, 55, 'Brayan Manco', 'profesor', 'alex@gmail.com', 'brayan@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Algoritmo_voltaje.java', 'far', '2020-10-08 19:29:25'),
(12, 1, 51, 'Alex Manco Usuga ', 'estudiante', 'brayan@gmail.com', 'alex@gmail.com', 'tarea', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Algoritmo_voltaje.java', 'fa', '2020-10-13 18:28:32'),
(23, 1, 51, 'Alex Manco Usuga ', 'estudiante', 'alex@gmail.com', 'alex@gmail.com', 'tarea de física ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Algoritmo_voltaje.java', 'fa', '2020-10-08 19:34:36'),
(24, 1, 51, 'Alex Manco Usuga ', 'estudiante', 'alex@gmail.com', 'alex@gmail.com', 'tarea de física ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', '', 'fa', '2020-10-08 19:34:39'),
(25, 1, 51, 'Alex Manco Usuga ', 'estudiante', 'brayan@gmail.com', 'alex@gmail.com', 'tarea de física ', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', '', 'fa', '2020-10-08 19:34:41'),
(34, 1, 51, 'Alex Manco Usuga ', 'estudiante', 'alex@gmail.com', 'alex@gmail.com', 'primer ensayo con muchas imagenes', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'Guía 2 - Filosofía - Once - digital.pdf', 'fa', '2020-10-08 19:34:49'),
(36, 1, 55, 'Brayan Manco', 'profesor', 'mery@gmail.com', 'brayan@gmail.com', 'Caso de prueba', '&lt;p&gt;Hello, how are you mery?&lt;/p&gt;', 'exercise_four.cpp', 'fa', '2020-10-09 02:37:45'),
(37, 1, 55, 'Brayan Manco', 'profesor', 'juan@gmail.com', 'brayan@gmail.com', 'tarea de física ', '&lt;p&gt;hola&lt;/p&gt;', 'Algoritmo_voltaje.java', 'fa', '2020-10-13 18:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `chat_group`
--

CREATE TABLE `chat_group` (
  `id` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `informacion` text COLLATE utf8_spanish_ci NOT NULL,
  `grupo` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `chat_group`
--

INSERT INTO `chat_group` (`id`, `id_institucion`, `id_usuario`, `nombre`, `foto`, `informacion`, `grupo`, `fecha`) VALUES
(1, 1, 55, 'Brayan Manco Usuga', 'assets/img/users/55/225.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '11-1', '2020-10-21 20:01:02'),
(4, 1, 51, 'Alex manco', 'assets/img/users/51/867.jpg', 'Lorem ipsum dolor, sit amet consectetur adipisicing.', '11-1', '2020-10-07 23:11:15'),
(11, 1, 55, 'Brayan Manco Usuga', 'assets/img/users/55/225.jpg', 'hola amigos, como están ? ', '11-1', '2020-10-21 20:01:02'),
(12, 1, 55, 'Brayan Manco Usuga', 'assets/img/users/55/225.jpg', 'quiero saber como se encuentran ?', '11-1', '2020-10-21 20:01:02'),
(29, 1, 55, 'Brayan Manco Usuga', 'assets/img/users/55/225.jpg', 'está vez si ', '11-1', '2020-10-21 20:01:02'),
(30, 2, 59, 'Carol Gómez', 'assets/img/default/anonymous.jpg', 'hola amigos ', '11-1', '2020-10-08 18:55:46'),
(31, 2, 59, 'Carol Gómez', 'assets/img/default/anonymous.jpg', 'mañama hay clase ?', '11-1', '2020-10-08 19:01:41'),
(32, 2, 63, 'Erick Manco', 'assets/img/default/anonymous.jpg', 'no, no hay', '11-1', '2020-10-08 19:08:25'),
(33, 1, 62, 'Mery Usuga', 'assets/img/default/anonymous.jpg', 'muy bien', '11-1', '2020-10-09 01:46:19'),
(34, 1, 62, 'Mery Usuga', 'assets/img/default/anonymous.jpg', 'yes', '11-1', '2020-10-09 19:31:31'),
(35, 1, 66, 'Juan Diego', 'assets/img/users/66/767.jpg', 'holas', '11-1', '2020-10-10 02:01:50'),
(36, 1, 55, 'Brayan Manco Usuga', 'assets/img/users/55/225.jpg', 'pepe', '11-1', '2020-10-21 20:01:02'),
(37, 1, 55, 'Brayan Manco Usuga', 'assets/img/users/55/225.jpg', 'hola amigos ', '11-1', '2020-10-21 20:01:02'),
(38, 1, 55, 'Brayan Manco Usuga', 'assets/img/users/55/225.jpg', 'JHONATAN', '11-1', '2020-10-21 20:01:02');

-- --------------------------------------------------------

--
-- Table structure for table `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `me_gustas` int(11) NOT NULL,
  `respuestas` int(11) NOT NULL,
  `comentarios` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `comentarios`
--

INSERT INTO `comentarios` (`id`, `id_institucion`, `id_usuario`, `nombre`, `me_gustas`, `respuestas`, `comentarios`, `foto`, `fecha`) VALUES
(44, 1, 55, 'Brayan Manco Usuga', 14, 3, 'hola me llamo brayan', 'assets/img/users/55/225.jpg', '2020-10-21 20:01:01'),
(46, 1, 51, 'alex manco ', 16, 1, 'hola, soy su nuevo profesor de física', 'assets/img/users/51/867.jpg', '2020-10-14 19:42:26'),
(47, 1, 51, 'alex manco ', 2, 0, 'mañana no hay clase', 'assets/img/users/51/867.jpg', '2020-10-14 21:43:45'),
(54, 1, 55, 'Brayan Manco Usuga', 0, 3, 'Caso de prueba', 'assets/img/users/55/225.jpg', '2020-10-21 20:01:01'),
(55, 1, 66, 'Juan Diego', 0, 1, 'hello, soy nuevo', 'assets/img/users/66/767.jpg', '2020-10-21 20:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `logo` varchar(130) COLLATE utf8_spanish_ci NOT NULL,
  `departamento` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ubicacion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `instituciones`
--

INSERT INTO `instituciones` (`id`, `nombre`, `logo`, `departamento`, `ciudad`, `ubicacion`, `fecha`) VALUES
(1, 'San Pablo', 'http://www.iesanpablo.edu.co/wp-content/uploads/2018/10/cropped-Escudo-San-Pablo-1-32x32.jpg', 'Antioquia ', 'Medellin', 'Cr 36 BB # 105-56', '2020-09-04 21:37:41'),
(2, 'Maria Cano', 'https://iemariacano.edu.co/wp-content/uploads/2020/02/icono.ico', 'Antioquia ', 'Medellin', 'Cr 36 BB # 105-56', '2020-09-07 04:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `id_comentario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `id_usuario`, `usuario`, `id_comentario`, `fecha`) VALUES
(126, 51, 'alex manco usuga ', 44, '2020-09-07 05:04:41'),
(128, 51, 'alex manco usuga ', 46, '2020-09-07 05:04:47');

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `nuevosUsuarios` int(11) NOT NULL,
  `nuevasVisitas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `nuevosUsuarios`, `nuevasVisitas`) VALUES
(1, 1, 47);

-- --------------------------------------------------------

--
-- Table structure for table `respuestas_comentarios`
--

CREATE TABLE `respuestas_comentarios` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `comentario` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `respuestas_comentarios`
--

INSERT INTO `respuestas_comentarios` (`id`, `id_usuario`, `id_comentario`, `nombre`, `comentario`, `fecha`) VALUES
(37, 55, 44, 'Brayan Manco Usuga', 'yo tambien', '2020-10-21 20:01:02'),
(39, 51, 46, 'alex manco ', 'que bien', '2020-07-05 22:53:16'),
(41, 55, 44, 'Brayan Manco Usuga', 'no lo puedo creer', '2020-10-21 20:01:02'),
(43, 51, 44, 'alex manco', 'no me importa', '2020-09-22 14:05:32'),
(87, 62, 54, 'Mery Usuga', 'funciona.', '2020-10-09 19:40:37'),
(88, 55, 54, 'Brayan Manco Usuga', 'funciona.', '2020-10-21 20:01:02'),
(89, 66, 54, 'Juan Diego', 'funciona.', '2020-10-14 19:44:10'),
(90, 51, 55, 'alex manco ', 'yo igual', '2020-10-21 20:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `solicitudes_lms`
--

CREATE TABLE `solicitudes_lms` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `labor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `solicitudes_lms`
--

INSERT INTO `solicitudes_lms` (`id`, `id_usuario`, `id_institucion`, `nombre`, `labor`, `mensaje`, `fecha`) VALUES
(2, 55, 1, 'Brayan Manco', 'rector', 'Hello, how are you ?', '2020-10-03 01:54:12');

-- --------------------------------------------------------

--
-- Table structure for table `subir_tareas`
--

CREATE TABLE `subir_tareas` (
  `id` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombreMaestro` text COLLATE utf8_spanish_ci NOT NULL,
  `labor` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `tituloTarea` text COLLATE utf8_spanish_ci NOT NULL,
  `materia` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `archivo` text COLLATE utf8_spanish_ci NOT NULL,
  `grupo` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `subir_tareas`
--

INSERT INTO `subir_tareas` (`id`, `id_institucion`, `id_usuario`, `nombreMaestro`, `labor`, `email`, `tituloTarea`, `materia`, `descripcion`, `archivo`, `grupo`, `fecha`) VALUES
(1, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'La guerra fria', 'sociales', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'primer ejercicio.docx', '11-1', '2020-10-09 02:59:40'),
(2, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'Polinomios ', 'matematicas', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'primer ejercicio.docx', '8', '2020-10-09 03:00:15'),
(3, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'Don quijote', 'Español', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'primer ejercicio.docx', '8', '2020-10-09 03:00:15'),
(4, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'Fracciones', 'matemáticas', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'primer ejercicio.docx', '11-1', '2020-10-09 03:00:15'),
(5, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'Movimiento Rectilineo', 'fisica', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'primer ejercicio.docx', '11-1', '2020-10-09 03:00:15'),
(6, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'Estética', 'filosofía', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'primer ejercicio.docx', '11-2', '2020-10-09 03:00:15'),
(7, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'Virus mortal', 'Sociales', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', 'ClaseVirtual2.Septimo.CC.1P.2020.docx', '11-1', '2020-10-09 03:00:15'),
(10, 1, 55, 'Brayan Manco', 'profesor', 'brayan@gmail.com', 'pandemia', 'Sociales', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sint magnam soluta deserunt autem dolores iste. Optio, aliquid tenetur', '', '11-1', '2020-10-09 03:14:17'),
(11, 1, 55, 'Brayan Manco', '', 'brayan@gmail.com', 'Desarrollo de Software', 'Media Técnica 10-1', 'Está tarea es para el día de mañana, sábado 10 de octubre  ', 'exercise_seven.cpp', '10-1', '2020-10-09 18:59:55');

-- --------------------------------------------------------

--
-- Table structure for table `testimonios`
--

CREATE TABLE `testimonios` (
  `id` int(11) NOT NULL,
  `imgTestimonio` text COLLATE utf8_spanish_ci NOT NULL,
  `nombreTestimonio` text COLLATE utf8_spanish_ci NOT NULL,
  `opinionTestimonio` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `testimonios`
--

INSERT INTO `testimonios` (`id`, `imgTestimonio`, `nombreTestimonio`, `opinionTestimonio`, `fecha`) VALUES
(1, 'assets/dist/img/testimonials/ada.jpg', 'Ada Lovelace', 'La mejor plataforma de educación.', '2020-10-11 20:56:09'),
(2, 'assets/dist/img/testimonials/cr7.jpg', 'CR7', 'Me pareció súper chévere el servicio que me prestaron la empresa, son los mejores.', '2020-10-11 20:57:15'),
(3, 'assets/dist/img/testimonials/snoop.jpg', 'Snoop Dogg', 'Son una empresa muy profesional y su atención es excelente.', '2020-10-11 20:57:57'),
(4, 'assets/dist/img/testimonials/will.jpg', 'Will Smith', 'La plataforma LMS esta súper me encanta. Uno puede realizar todas sus actividades fácil y rápido.', '2020-10-11 20:58:23'),
(12, 'assets/dist/img/testimonials/elon.jpg', 'Elon Musk', 'Excelente servicio, me encanta poder interactuar libremente con mis compañeros y profesores.', '2020-10-11 20:58:52'),
(13, 'assets/dist/img/testimonials/chaquira.jpeg', 'Chaquira bebe', 'El servicio del hosting es excelente y muy económico. ¡¡ Me encanta !!', '2020-10-22 14:42:13');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `id_institucion` int(11) NOT NULL,
  `acceso` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `labor` text COLLATE utf8_spanish_ci NOT NULL,
  `grupo` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `verificacion` int(11) NOT NULL,
  `emailEncriptado` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `id_institucion`, `acceso`, `nombre`, `labor`, `grupo`, `password`, `email`, `foto`, `verificacion`, `emailEncriptado`, `fecha`) VALUES
(51, 1, 0, 'alex manco ', 'estudiante', '11-1', '$2a$07$asxx54ahjppf45sd87a5auWwohELds8rQyoUKlSMW/p5gIImn0S06', 'alex@gmail.com', 'assets/img/users/51/867.jpg', 0, '0312d0d39585741666c19c217ed769f7', '2020-10-21 20:08:38'),
(55, 1, 1, 'Brayan Manco Usuga', 'profesor', '11-1', '$2a$07$asxx54ahjppf45sd87a5auWQTpSLNG.7Q8cieZkip5db7h55lHwCO', 'brayan@gmail.com', 'assets/img/users/55/225.jpg', 0, '27d1f42c957d4b73ca604201b028e6f6', '2020-10-21 20:06:53'),
(57, 2, 0, 'Sebastian Gómez', 'profesor', '2-3', '$2a$07$asxx54ahjppf45sd87a5au3vWTWSn8LKglIUZQ2c29hHgIsifnsC6', 'sebastian@gmail.com', '', 0, '1c372610d00d4735266585475764b200', '2020-10-17 21:26:54'),
(59, 2, 1, 'Carol Gómez', 'estudiante', '11-1', '$2a$07$asxx54ahjppf45sd87a5auTx991w8N.oJSa43Mv0fYsWsFGDAwn8C', 'carol@gmail.com', '', 0, 'cce54cc9ad484aa1da17a81c5baaa348', '2020-10-08 18:56:12'),
(60, 1, 0, 'Lorena Manco', 'estudiante', '5-3', '$2a$07$asxx54ahjppf45sd87a5au7CK6Xl2mdLiC87S9bO/sEayYdc07qo2', 'lorena@gmail.com', '', 1, '358bf518cd92a84643f43492aadacb40', '2020-10-17 21:25:16'),
(61, 2, 0, 'Jhonatan Gómez', 'estudiante', '8-2', '$2a$07$asxx54ahjppf45sd87a5auIhJ8QLOfBTmaw4s1mA6aEBymy3U3MMK', 'jhonatan@gmail.com', '', 1, '3f1ad6ad7102647f1784a7598ba6bb27', '2020-10-09 01:45:32'),
(62, 1, 1, 'Mery Usuga', 'estudiante', '11-1', '$2a$07$asxx54ahjppf45sd87a5au.3e6mAhplvwGaVjojPaz87VdnhkyP5O', 'mery@gmail.com', '', 0, '41eefbde1cc000f2f46a3c5174ae3ef6', '2020-10-21 19:59:53'),
(63, 2, 1, 'Erick Manco', 'estudiante', '11-1', '$2a$07$asxx54ahjppf45sd87a5aujkpGvSXBEczQDD.61kq2mwKcb6uruiq', 'erick@gmail.com', '', 0, '10ef013c978968b8be23a648801548cb', '2020-10-08 19:06:20'),
(66, 1, 1, 'Juan Diego', 'estudiante', '11-1', '$2a$07$asxx54ahjppf45sd87a5auwRi.z6UsW7kVIpm0CUEuCpmsvT2sG6O', 'Juan@gmail.com', 'assets/img/users/66/767.jpg', 0, 'a099d8f65b7335fb4d86db827bde4898', '2020-10-10 02:01:50'),
(67, 1, 1, 'Andres Usuga', 'rector', '', '$2a$07$asxx54ahjppf45sd87a5auG6wzcvHQX0OYqZGMhIPic7EbdRk/KIC', 'andres@gmail.com', '', 0, 'eff6290cd447ba13392318b78f9a68f3', '2020-10-11 15:51:17');

-- --------------------------------------------------------

--
-- Table structure for table `visitaspaises`
--

CREATE TABLE `visitaspaises` (
  `id` int(11) NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `codigo` text COLLATE utf8_spanish_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `visitaspaises`
--

INSERT INTO `visitaspaises` (`id`, `pais`, `codigo`, `cantidad`, `fecha`) VALUES
(1, 'Spain', 'ES', 4, '2019-12-28 18:17:43'),
(2, 'United States', 'US', 14, '2020-10-21 18:57:29'),
(3, 'Mexico', 'MX', 10, '2019-12-28 18:15:24'),
(4, 'Japan', 'JP', 5, '2019-12-28 18:15:31'),
(5, 'Colombia', 'CO', 3, '2019-12-28 18:18:00'),
(6, 'Brazil', 'BR', 50, '2020-10-06 00:34:22'),
(7, 'Germany', 'DE', 8, '2019-12-28 18:15:42'),
(8, 'Ireland', 'IE', 70, '2020-10-03 02:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `visitaspersonas`
--

CREATE TABLE `visitaspersonas` (
  `id` int(11) NOT NULL,
  `ip` text COLLATE utf8_spanish_ci NOT NULL,
  `pais` text COLLATE utf8_spanish_ci NOT NULL,
  `visitas` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `visitaspersonas`
--

INSERT INTO `visitaspersonas` (`id`, `ip`, `pais`, `visitas`, `fecha`) VALUES
(1, '204.199.83.171', 'United States', 1, '2019-11-26 17:16:20'),
(8, '125.168.48.14', 'Australia', 1, '2019-12-26 17:57:45'),
(10, '43.87.68.114', 'Japan', 1, '2019-12-26 18:00:07'),
(11, '201.91.114.22', 'Brazil', 1, '2019-12-26 18:01:30'),
(14, '189.190.165.61', 'Mexico', 1, '2019-12-26 18:02:27'),
(17, '176.0.202.224', 'Germany', 1, '2019-12-26 18:04:16'),
(18, '103.142.222.240', 'Mexico', 1, '2019-12-26 18:08:02'),
(19, '151.16.107.247', 'Mexico', 1, '2019-12-26 18:08:13'),
(20, '55.84.7.80', 'United States', 1, '2019-12-26 18:06:38'),
(21, '83.158.46.46', 'United States', 1, '2019-12-26 18:08:27'),
(22, '132.119.103.210', 'United States', 1, '2019-12-26 18:07:08'),
(23, '58.231.193.14', 'Brazil', 1, '2019-12-26 18:08:34'),
(24, '54.155.248.10', 'Ireland', 1, '2019-11-26 18:32:11'),
(25, '204.199.83.171', 'United States', 1, '2019-12-26 18:49:20'),
(26, '54.155.248.10', 'Ireland', 1, '2019-12-26 18:50:07'),
(27, '54.155.248.10', 'Ireland', 1, '2019-12-26 19:09:55'),
(28, '54.155.248.10', 'Ireland', 1, '2019-12-27 14:52:45'),
(29, '54.155.248.10', 'Ireland', 1, '2019-12-28 18:33:04'),
(30, '54.155.248.10', 'Ireland', 1, '2019-12-29 18:18:03'),
(31, '54.155.248.10', 'Ireland', 1, '2019-12-30 12:37:58'),
(32, '54.155.248.10', 'Ireland', 1, '2019-12-31 15:57:52'),
(33, '54.155.248.10', 'Ireland', 1, '2020-01-02 16:21:07'),
(34, '54.155.248.10', 'Ireland', 1, '2020-01-03 13:25:24'),
(35, '54.155.248.10', 'Ireland', 1, '2020-01-04 17:09:47'),
(36, '54.155.248.10', 'Ireland', 1, '2020-01-05 16:54:12'),
(37, '54.155.248.10', 'Ireland', 1, '2020-01-06 16:49:40'),
(38, '54.155.248.10', 'Ireland', 1, '2020-01-07 15:43:34'),
(39, '54.155.248.10', 'Ireland', 1, '2020-01-08 16:58:48'),
(40, '54.155.248.10', 'Ireland', 1, '2020-01-09 15:53:29'),
(41, '54.155.248.10', 'Ireland', 1, '2020-01-10 17:30:43'),
(42, '54.155.248.10', 'Ireland', 1, '2020-01-12 17:11:27'),
(43, '54.155.248.10', 'Ireland', 1, '2020-01-13 16:53:21'),
(44, '54.155.248.10', 'Ireland', 1, '2020-01-14 16:36:39'),
(45, '54.155.248.10', 'Ireland', 1, '2020-01-16 01:45:51'),
(46, '54.155.248.10', 'Ireland', 1, '2020-01-16 21:39:02'),
(47, '54.155.248.10', 'Ireland', 1, '2020-01-30 00:08:28'),
(48, '54.155.248.10', 'Ireland', 1, '2020-02-03 18:30:37'),
(49, '54.155.248.10', 'Ireland', 1, '2020-02-09 16:37:52'),
(50, '54.155.248.10', 'Ireland', 1, '2020-02-10 16:14:59'),
(51, '54.155.248.10', 'Ireland', 1, '2020-02-14 01:45:14'),
(52, '54.155.248.10', 'Ireland', 1, '2020-02-14 20:42:56'),
(53, '54.155.248.10', 'Ireland', 1, '2020-02-20 00:52:25'),
(54, '54.155.248.10', 'Ireland', 1, '2020-02-23 18:23:49'),
(55, '54.155.248.10', 'Unknown', 1, '2020-02-25 19:40:39'),
(56, '54.155.248.10', 'Ireland', 1, '2020-02-29 20:48:30'),
(57, '54.155.248.10', 'Ireland', 1, '2020-03-10 21:18:30'),
(58, '54.155.248.10', 'Ireland', 1, '2020-03-13 20:18:51'),
(59, '54.155.248.10', 'Ireland', 1, '2020-03-16 20:16:19'),
(60, '54.155.248.10', 'Ireland', 1, '2020-03-18 01:22:21'),
(61, '54.155.248.10', 'Ireland', 1, '2020-03-23 18:15:41'),
(62, '54.155.248.10', 'Ireland', 1, '2020-03-24 23:45:04'),
(63, '54.155.248.10', 'Ireland', 1, '2020-03-25 20:24:54'),
(64, '54.155.248.10', 'Ireland', 1, '2020-03-28 17:15:25'),
(65, '54.155.248.10', 'Ireland', 1, '2020-03-30 23:35:44'),
(66, '54.155.248.10', 'Ireland', 1, '2020-04-01 01:56:45'),
(67, '54.155.248.10', 'Ireland', 1, '2020-04-01 19:00:11'),
(68, '54.155.248.10', 'Ireland', 1, '2020-04-04 00:29:33'),
(69, '54.155.248.10', 'Ireland', 1, '2020-05-11 05:41:33'),
(70, '54.155.248.10', 'Ireland', 1, '2020-05-12 21:28:56'),
(71, '54.155.248.10', 'Ireland', 1, '2020-05-14 02:51:44'),
(72, '54.155.248.10', 'Ireland', 1, '2020-06-26 18:38:54'),
(73, '54.155.248.10', 'Ireland', 1, '2020-06-28 05:28:01'),
(74, '54.155.248.10', 'Ireland', 1, '2020-07-29 02:46:54'),
(75, '54.155.248.10', 'Ireland', 1, '2020-08-27 00:35:40'),
(76, '54.155.248.10', 'Ireland', 1, '2020-08-27 19:46:38'),
(77, '54.155.248.10', 'Ireland', 1, '2020-08-29 16:31:28'),
(78, '54.155.248.10', 'Ireland', 1, '2020-09-08 02:24:46'),
(79, '54.155.248.10', 'Ireland', 1, '2020-10-03 02:48:42'),
(80, '54.155.248.10', 'Ireland', 1, '2020-10-05 23:28:38'),
(81, '180.26.2.19', 'Japan', 1, '2020-10-05 23:45:38'),
(82, '13.175.124.46', 'United States', 1, '2020-10-05 23:47:03'),
(83, '16.63.79.84', 'United States', 1, '2020-10-05 23:53:13'),
(84, '16.63.79.84', 'United States', 1, '2020-10-07 02:23:59'),
(85, '16.63.79.84', 'United States', 1, '2020-10-07 22:19:41'),
(86, '16.63.79.84', 'United States', 1, '2020-10-08 18:01:32'),
(87, '16.63.79.84', 'United States', 1, '2020-10-09 18:51:36'),
(88, '16.63.79.84', 'United States', 1, '2020-10-10 16:33:57'),
(89, '16.63.79.84', 'United States', 1, '2020-10-11 15:47:40'),
(90, '16.63.79.84', 'United States', 1, '2020-10-13 14:39:46'),
(91, '16.63.79.84', 'United States', 1, '2020-10-14 19:15:16'),
(92, '16.63.79.84', 'United States', 1, '2020-10-17 02:27:05'),
(93, '16.63.79.84', 'United States', 1, '2020-10-17 20:15:15'),
(94, '16.63.79.84', 'United States', 1, '2020-10-21 18:57:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administradores_cp`
--
ALTER TABLE `administradores_cp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bandeja_de_entrada`
--
ALTER TABLE `bandeja_de_entrada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indexes for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indexes for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indexes for table `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_comentario` (`id_comentario`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `respuestas_comentarios`
--
ALTER TABLE `respuestas_comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_comentario` (`id_comentario`);

--
-- Indexes for table `solicitudes_lms`
--
ALTER TABLE `solicitudes_lms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indexes for table `subir_tareas`
--
ALTER TABLE `subir_tareas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indexes for table `testimonios`
--
ALTER TABLE `testimonios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indexes for table `visitaspaises`
--
ALTER TABLE `visitaspaises`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administradores_cp`
--
ALTER TABLE `administradores_cp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bandeja_de_entrada`
--
ALTER TABLE `bandeja_de_entrada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `chat_group`
--
ALTER TABLE `chat_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `respuestas_comentarios`
--
ALTER TABLE `respuestas_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `solicitudes_lms`
--
ALTER TABLE `solicitudes_lms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subir_tareas`
--
ALTER TABLE `subir_tareas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonios`
--
ALTER TABLE `testimonios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `visitaspaises`
--
ALTER TABLE `visitaspaises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `visitaspersonas`
--
ALTER TABLE `visitaspersonas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bandeja_de_entrada`
--
ALTER TABLE `bandeja_de_entrada`
  ADD CONSTRAINT `bandeja_de_entrada_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `bandeja_de_entrada_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id`);

--
-- Constraints for table `chat_group`
--
ALTER TABLE `chat_group`
  ADD CONSTRAINT `chat_group_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `chat_group_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id`);

--
-- Constraints for table `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`);

--
-- Constraints for table `respuestas_comentarios`
--
ALTER TABLE `respuestas_comentarios`
  ADD CONSTRAINT `respuestas_comentarios_ibfk_1` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`),
  ADD CONSTRAINT `respuestas_comentarios_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `solicitudes_lms`
--
ALTER TABLE `solicitudes_lms`
  ADD CONSTRAINT `solicitudes_lms_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `solicitudes_lms_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id`);

--
-- Constraints for table `subir_tareas`
--
ALTER TABLE `subir_tareas`
  ADD CONSTRAINT `subir_tareas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `subir_tareas_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id`);

--
-- Constraints for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `instituciones` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
