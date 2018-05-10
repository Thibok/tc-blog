-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 10 Mai 2018 à 14:40
-- Version du serveur :  5.7.22-0ubuntu0.16.04.1
-- Version de PHP :  7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tcBlog`
--
CREATE DATABASE IF NOT EXISTS `tcBlog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `tcBlog`;

-- --------------------------------------------------------

--
-- Structure de la table `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `add_at` datetime NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `news_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `comment`
--

INSERT INTO `comment` (`id`, `content`, `add_at`, `valid`, `user_id`, `news_id`) VALUES
(1, 'Un super commentaire !', '2018-05-10 14:17:31', 1, 4, 17),
(2, '...', '2018-05-10 14:17:38', 1, 4, 17),
(3, 'Héhéhéhé !', '2018-05-10 14:34:45', 0, 5, 17);

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

CREATE TABLE `connexion` (
  `ip` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(80) NOT NULL,
  `chapo` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `add_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `news`
--

INSERT INTO `news` (`id`, `title`, `chapo`, `content`, `add_at`, `update_at`, `user_id`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'Praesent consequat accumsan leo, nec euismod nibh hendrerit sed. Donec a diam dapibus, tincidunt elit nec, bibendum ante. Mauris tincidunt felis vitae felis ultrices vulputate. Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie.', 'Praesent consequat accumsan leo, nec euismod nibh hendrerit sed. Donec a diam dapibus, tincidunt elit nec, bibendum ante. Mauris tincidunt felis vitae felis ultrices vulputate. Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo. Mauris sodales facilisis semper. Nulla facilisi. Quisque quis orci sit amet lectus vehicula tempor sed ac orci. Sed mauris quam, varius at mollis pellentesque, laoreet sed odio.Praesent consequat accumsan leo, nec euismod nibh hendrerit sed. Donec a diam dapibus, tincidunt elit nec, bibendum ante. Mauris tincidunt felis vitae felis ultrices vulputate. Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo. Mauris sodales facilisis semper. Nulla facilisi. Quisque quis orci sit amet lectus vehicula tempor sed ac orci. Sed mauris quam, varius at mollis pellentesque, laoreet sed odio.', '2018-04-26 23:23:42', '2018-04-26 23:23:42', 4),
(2, 'Dolor sit amet', 'Nec euismod nibh hendrerit sed. Donec a diam dapibus, tincidunt elit nec, bibendum ante. Mauris tincidunt felis vitae felis ultrices vulputate. Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie.', 'Praesent consequat accumsan leo, nec euismod nibh hendrerit sed. Donec a diam dapibus, tincidunt elit nec, bibendum ante. Mauris tincidunt felis vitae felis ultrices vulputate. Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo. Mauris sodales facilisis semper. Nulla facilisi. Quisque quis orci sit amet lectus vehicula tempor sed ac orci. Sed mauris quam, varius at mollis pellentesque, laoreet sed odio.Praesent consequat accumsan leo, nec euismod nibh hendrerit sed. Donec a diam dapibus, tincidunt elit nec, bibendum ante. Mauris tincidunt felis vitae felis ultrices vulputate. Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo. Mauris sodales facilisis semper. Nulla facilisi. Quisque quis orci sit amet lectus vehicula tempor sed ac orci. Sed mauris quam, varius at mollis pellentesque, laoreet sed odio.', '2018-04-26 23:24:30', '2018-04-26 23:24:30', 4),
(3, 'Praesent consequat accumsan leo', 'Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo.', 'Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo. Mauris sodales facilisis semper. Nulla facilisi. Quisque quis orci sit amet lectus vehicula tempor sed ac orci. Sed mauris quam, varius at mollis pellentesque, laoreet sed odio. In mi enim, volutpat ac urna nec, dapibus condimentum turpis. Sed vitae egestas enim.', '2018-04-26 23:25:18', '2018-04-26 23:25:18', 4),
(4, 'Tonsequat accumsan leo', 'Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo.', 'Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo. Mauris sodales facilisis semper. Nulla facilisi. Quisque quis orci sit amet lectus vehicula tempor sed ac orci. Sed mauris quam, varius at mollis pellentesque, laoreet sed odio. In mi enim, volutpat ac urna nec, dapibus condimentum turpis. Sed vitae egestas enim.Nam leo ipsum, cursus at tincidunt at, pretium in ipsum. Mauris molestie ligula at felis accumsan gravida. Phasellus sit amet ante orci. Suspendisse molestie risus ac ipsum tempor feugiat. Aenean semper pretium sem in commodo. Mauris sodales facilisis semper. Nulla facilisi. Quisque quis orci sit amet lectus vehicula tempor sed ac orci. Sed mauris quam, varius at mollis pellentesque, laoreet sed odio. In mi enim, volutpat ac urna nec, dapibus condimentum turpis. Sed vitae egestas enim.', '2018-04-26 23:25:59', '2018-04-26 23:25:59', 4),
(5, 'Vestibulum ultrices', 'Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ', 'Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.', '2018-04-26 23:28:45', '2018-04-26 23:28:45', 4),
(6, 'Phasellus eleifend', 'Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ', 'Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.Mauris laoreet nulla purus. Phasellus eleifend cursus leo eu semper. Etiam convallis, augue sit amet posuere pharetra, tortor odio lacinia tellus, at dapibus ligula quam ac dui. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin ut suscipit magna, in posuere diam. Curabitur pharetra nulla ut dolor placerat euismod. Vivamus ex risus, blandit tempor finibus ut, porttitor eu quam.', '2018-04-26 23:29:17', '2018-04-26 23:29:17', 4),
(7, 'Aliquam faucibus', 'Aliquam faucibus tellus sed est imperdiet, vitae ullamcorper massa vestibulum. Proin odio libero, condimentum sed massa quis, maximus bibendum neque. Sed eget pretium lorem. Sed rhoncus mauris metus, ut finibus felis malesuada in. In tortor elit, tin', 'Aliquam faucibus tellus sed est imperdiet, vitae ullamcorper massa vestibulum. Proin odio libero, condimentum sed massa quis, maximus bibendum neque. Sed eget pretium lorem. Sed rhoncus mauris metus, ut finibus felis malesuada in. In tortor elit, tincidunt id tincidunt vitae, pulvinar eget felis. Proin feugiat, orci id egestas tincidunt, mi nibh egestas odio, mattis tempor metus lectus et erat. Suspendisse non felis vel erat euismod pellentesque in tincidunt magna. Phasellus pharetra lorem tellus, vitae euismod felis fermentum laoreet. Aenean non facilisis neque, id fermentum odio. Curabitur sed ex et ipsum congue porttitor id sit amet nibh. Phasellus dictum tempor dui eget posuere. Aliquam ut ligula interdum eros porta luctus ac id mauris. Vestibulum placerat eros mi, aliquam condimentum diam feugiat non. In sagittis rhoncus nulla, non posuere quam.\r\n\r\nAliquam faucibus tellus sed est imperdiet, vitae ullamcorper massa vestibulum. Proin odio libero, condimentum sed massa quis, maximus bibendum neque. Sed eget pretium lorem. Sed rhoncus mauris metus, ut finibus felis malesuada in. In tortor elit, tincidunt id tincidunt vitae, pulvinar eget felis. Proin feugiat, orci id egestas tincidunt, mi nibh egestas odio, mattis tempor metus lectus et erat. Suspendisse non felis vel erat euismod pellentesque in tincidunt magna. Phasellus pharetra lorem tellus, vitae euismod felis fermentum laoreet. Aenean non facilisis neque, id fermentum odio. Curabitur sed ex et ipsum congue porttitor id sit amet nibh. Phasellus dictum tempor dui eget posuere. Aliquam ut ligula interdum eros porta luctus ac id mauris. Vestibulum placerat eros mi, aliquam condimentum diam feugiat non. In sagittis rhoncus nulla, non posuere quam.', '2018-04-26 23:29:51', '2018-04-26 23:30:40', 4),
(8, 'Morbi feugiat tortor', 'Morbi sodales a magna elementum fermentum. In bibendum nunc sem, ut cursus dui pretium nec. Mauris in commodo purus. Mauris pellentesque risus diam, id porttitor lorem feugiat a. Don', 'Morbi feugiat tortor et laoreet tincidunt. Mauris a posuere ligula. Morbi sodales a magna elementum fermentum. In bibendum nunc sem, ut cursus dui pretium nec. Mauris in commodo purus. Mauris pellentesque risus diam, id porttitor lorem feugiat a. Donec feugiat, dui at lobortis scelerisque, nisl leo dictum sapien, quis tincidunt arcu nunc et lorem. Sed rhoncus semper bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam scelerisque arcu justo, in ullamcorper magna vulputate ac. Aenean consectetur nulla id orci rutrum, a lacinia turpis fermentum. Aenean mollis neque non sapien lacinia dapibus. Vivamus non augue eu ligula eleifend mollis non et justo. Curabitur pulvinar odio nec orci tempor, eget lobortis ante sodales. Ut ornare pharetra mi sed feugiat.Morbi feugiat tortor et laoreet tincidunt. Mauris a posuere ligula. Morbi sodales a magna elementum fermentum. In bibendum nunc sem, ut cursus dui pretium nec. Mauris in commodo purus. Mauris pellentesque risus diam, id porttitor lorem feugiat a. Donec feugiat, dui at lobortis scelerisque, nisl leo dictum sapien, quis tincidunt arcu nunc et lorem. Sed rhoncus semper bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam scelerisque arcu justo, in ullamcorper magna vulputate ac. Aenean consectetur nulla id orci rutrum, a lacinia turpis fermentum. Aenean mollis neque non sapien lacinia dapibus. Vivamus non augue eu ligula eleifend mollis non et justo. Curabitur pulvinar odio nec orci tempor, eget lobortis ante sodales. Ut ornare pharetra mi sed feugiat.Morbi feugiat tortor et laoreet tincidunt. Mauris a posuere ligula. Morbi sodales a magna elementum fermentum. In bibendum nunc sem, ut cursus dui pretium nec. Mauris in commodo purus. Mauris pellentesque risus diam, id porttitor lorem feugiat a. Donec feugiat, dui at lobortis scelerisque, nisl leo dictum sapien, quis tincidunt arcu nunc et lorem. Sed rhoncus semper bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam scelerisque arcu justo, in ullamcorper magna vulputate ac. Aenean consectetur nulla id orci rutrum, a lacinia turpis fermentum. Aenean mollis neque non sapien lacinia dapibus. Vivamus non augue eu ligula eleifend mollis non et justo. Curabitur pulvinar odio nec orci tempor, eget lobortis ante sodales. Ut ornare pharetra mi sed feugiat.', '2018-04-26 23:31:38', '2018-04-26 23:31:38', 4),
(9, 'Mauris pellentesque', 'Mauris pellentesque risus diam, id porttitor lorem feugiat a. Donec feugiat, dui at lobortis scelerisque, nisl leo dictum sapien, quis tincidunt arcu nunc et lorem. Sed rhoncus semper bibendum. Class aptent taciti sociosqu ad litora torquent per...', 'Morbi feugiat tortor et laoreet tincidunt. Mauris a posuere ligula. Morbi sodales a magna elementum fermentum. In bibendum nunc sem, ut cursus dui pretium nec. Mauris in commodo purus. Mauris pellentesque risus diam, id porttitor lorem feugiat a. Donec feugiat, dui at lobortis scelerisque, nisl leo dictum sapien, quis tincidunt arcu nunc et lorem. Sed rhoncus semper bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam scelerisque arcu justo, in ullamcorper magna vulputate ac. Aenean consectetur nulla id orci rutrum, a lacinia turpis fermentum. Aenean mollis neque non sapien lacinia dapibus. Vivamus non augue eu ligula eleifend mollis non et justo. Curabitur pulvinar odio nec orci tempor, eget lobortis ante sodales. Ut ornare pharetra mi sed feugiat.Morbi feugiat tortor et laoreet tincidunt. Mauris a posuere ligula. Morbi sodales a magna elementum fermentum. In bibendum nunc sem, ut cursus dui pretium nec. Mauris in commodo purus. Mauris pellentesque risus diam, id porttitor lorem feugiat a. Donec feugiat, dui at lobortis scelerisque, nisl leo dictum sapien, quis tincidunt arcu nunc et lorem. Sed rhoncus semper bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam scelerisque arcu justo, in ullamcorper magna vulputate ac. Aenean consectetur nulla id orci rutrum, a lacinia turpis fermentum. Aenean mollis neque non sapien lacinia dapibus. Vivamus non augue eu ligula eleifend mollis non et justo. Curabitur pulvinar odio nec orci tempor, eget lobortis ante sodales. Ut ornare pharetra mi sed feugiat.Morbi feugiat tortor et laoreet tincidunt. Mauris a posuere ligula. Morbi sodales a magna elementum fermentum. In bibendum nunc sem, ut cursus dui pretium nec. Mauris in commodo purus. Mauris pellentesque risus diam, id porttitor lorem feugiat a. Donec feugiat, dui at lobortis scelerisque, nisl leo dictum sapien, quis tincidunt arcu nunc et lorem. Sed rhoncus semper bibendum. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam scelerisque arcu justo, in ullamcorper magna vulputate ac. Aenean consectetur nulla id orci rutrum, a lacinia turpis fermentum. Aenean mollis neque non sapien lacinia dapibus. Vivamus non augue eu ligula eleifend mollis non et justo. Curabitur pulvinar odio nec orci tempor, eget lobortis ante sodales. Ut ornare pharetra mi sed feugiat.', '2018-04-26 23:32:34', '2018-04-26 23:32:34', 4),
(10, 'In tristique arcu ligula', 'In tristique arcu ligula, eu facilisis est luctus id. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus, justo in bibendum dictum, lectus nunc placerat justo, ut eleifend enim mauris sit amet...', 'In tristique arcu ligula, eu facilisis est luctus id. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus, justo in bibendum dictum, lectus nunc placerat justo, ut eleifend enim mauris sit amet lorem. Fusce ut quam nec risus elementum eleifend. Maecenas vestibulum sapien placerat, condimentum felis sit amet, mattis nisl. Praesent laoreet, quam nec consequat pulvinar, nunc ligula condimentum urna, sed pretium purus enim a nisl. Praesent orci quam, porta varius ornare vitae, ultricies vitae lacus. Proin id sapien tortor. Pellentesque mattis ex at sem blandit sagittis. In vel fringilla arcu, ut pretium enim.In tristique arcu ligula, eu facilisis est luctus id. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque faucibus, justo in bibendum dictum, lectus nunc placerat justo, ut eleifend enim mauris sit amet lorem. Fusce ut quam nec risus elementum eleifend. Maecenas vestibulum sapien placerat, condimentum felis sit amet, mattis nisl. Praesent laoreet, quam nec consequat pulvinar, nunc ligula condimentum urna, sed pretium purus enim a nisl. Praesent orci quam, porta varius ornare vitae, ultricies vitae lacus. Proin id sapien tortor. Pellentesque mattis ex at sem blandit sagittis. In vel fringilla arcu, ut pretium enim.', '2018-04-26 23:34:06', '2018-04-26 23:34:06', 4),
(16, 'Morbi efficitur velit sed enim pellentesque', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet dui id turpis luctus cursus sit amet vitae velit. Pellentesque elementum suscipit leo in vulputate. Mauris sodales molestie nibh, sit amet elementum nibh pharetra vitae.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet dui id turpis luctus cursus sit amet vitae velit. Pellentesque elementum suscipit leo in vulputate. Mauris sodales molestie nibh, sit amet elementum nibh pharetra vitae. Aenean est nunc, consequat nec euismod sed, malesuada in nibh. Quisque tortor est, interdum at scelerisque eget, gravida venenatis orci. Donec vitae auctor velit, at pharetra quam. In eget est at neque pulvinar consectetur. Aenean consequat venenatis scelerisque. Nunc nec scelerisque magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam urna felis, accumsan eget ipsum sed, pellentesque aliquam arcu. Cras faucibus sodales dui quis aliquet. Suspendisse cursus eros sit amet metus tempor venenatis. Nullam pellentesque libero a sem vestibulum laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet dui id turpis luctus cursus sit amet vitae velit. Pellentesque elementum suscipit leo in vulputate. Mauris sodales molestie nibh, sit amet elementum nibh pharetra vitae. Aenean est nunc, consequat nec euismod sed, malesuada in nibh. Quisque tortor est, interdum at scelerisque eget, gravida venenatis orci. Donec vitae auctor velit, at pharetra quam. In eget est at neque pulvinar consectetur. Aenean consequat venenatis scelerisque. Nunc nec scelerisque magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam urna felis, accumsan eget ipsum sed, pellentesque aliquam arcu. Cras faucibus sodales dui quis aliquet. Suspendisse cursus eros sit amet metus tempor venenatis. Nullam pellentesque libero a sem vestibulum laoreet.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sit amet dui id turpis luctus cursus sit amet vitae velit. Pellentesque elementum suscipit leo in vulputate. Mauris sodales molestie nibh, sit amet elementum nibh pharetra vitae. Aenean est nunc, consequat nec euismod sed, malesuada in nibh. Quisque tortor est, interdum at scelerisque eget, gravida venenatis orci. Donec vitae auctor velit, at pharetra quam. In eget est at neque pulvinar consectetur. Aenean consequat venenatis scelerisque. Nunc nec scelerisque magna. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam urna felis, accumsan eget ipsum sed, pellentesque aliquam arcu. Cras faucibus sodales dui quis aliquet. Suspendisse cursus eros sit amet metus tempor venenatis. Nullam pellentesque libero a sem vestibulum laoreet.', '2018-05-10 14:13:14', '2018-05-10 14:13:14', 4),
(17, 'Morbi non tempus risus', 'Sed sit amet ante vestibulum, luctus ex a, fermentum nisi. Sed viverra dictum eleifend. Praesent non placerat velit, eu dapibus enim. Donec libero quam, eleifend sed posuere nec, semper vehicula mi. Donec eget ex eget sapien suscipit dapibus at quis.', 'Sed sit amet ante vestibulum, luctus ex a, fermentum nisi. Sed viverra dictum eleifend. Praesent non placerat velit, eu dapibus enim. Donec libero quam, eleifend sed posuere nec, semper vehicula mi. Donec eget ex eget sapien suscipit dapibus at quis metus. In ultrices sapien et bibendum egestas. Donec ut purus eleifend, placerat mauris aliquet, consectetur augue. Curabitur tortor justo, ultrices et ornare sed, pulvinar at velit. Vivamus nibh justo, tincidunt nec hendrerit sit amet, feugiat at mauris. Vestibulum placerat nisi in nulla tempus, sit amet euismod ex laoreet. Quisque pellentesque odio vel mi aliquam viverra.Sed sit amet ante vestibulum, luctus ex a, fermentum nisi. Sed viverra dictum eleifend. Praesent non placerat velit, eu dapibus enim. Donec libero quam, eleifend sed posuere nec, semper vehicula mi. Donec eget ex eget sapien suscipit dapibus at quis metus. In ultrices sapien et bibendum egestas. Donec ut purus eleifend, placerat mauris aliquet, consectetur augue. Curabitur tortor justo, ultrices et ornare sed, pulvinar at velit. Vivamus nibh justo, tincidunt nec hendrerit sit amet, feugiat at mauris. Vestibulum placerat nisi in nulla tempus, sit amet euismod ex laoreet. Quisque pellentesque odio vel mi aliquam viverra.', '2018-05-10 14:14:27', '2018-05-10 14:14:27', 4);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `reset_code` varchar(100) DEFAULT NULL,
  `code_expiration_date` datetime DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `register_date` date NOT NULL,
  `role` enum('Membre','Administrateur') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `password`, `reset_code`, `code_expiration_date`, `email`, `register_date`, `role`) VALUES
(4, 'SuperUser', '$2y$10$uQpV/DRCBVVh8XnpwCatG.uzwAwGC5znuCkDh6DppvkTqYs8G.ZWG', NULL, NULL, 'email@superuser.com', '2018-05-01', 'Administrateur'),
(5, 'User', '$2y$10$HQGtDtUpvKZacOS2VIiIJOsXrr7wISZ2CSpcjTmoPzxVl7oMwXwT2', NULL, NULL, 'user@email.com', '2018-05-10', 'Membre');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_comment_user_idx` (`user_id`),
  ADD KEY `fk_comment_news1_idx` (`news_id`);

--
-- Index pour la table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_news_user1_idx` (`user_id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ind_pseudo` (`pseudo`),
  ADD UNIQUE KEY `ind_email` (`email`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_news1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comment_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Contraintes pour la table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `fk_news_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
