-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 27, 2018 at 06:57 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cormanDev`
--



--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `title`, `type`, `venue`, `multimedia`, `public`, `created_at`, `updated_at`) VALUES
(1, 'IOT usability', 'journal', 'HCI conference', '', 1, '2018-01-27 15:59:41', '2018-01-27 15:59:41'),
(2, 'End-user composition of interactive applications through actionable UI components.', 'journal', 'Journal of Visual Language Computing', '', 1, '2018-01-27 16:31:33', '2018-01-27 16:31:33'),
(3, 'Visual composition of data sources by end users.', 'conference', 'AVI', '', 1, '2018-01-27 17:30:19', '2018-01-27 17:30:19'),
(4, 'Proceedings of the First International Workshop on Smart Ecosystems cReation by Visual dEsign co-located with the International Working Conference on Advanced Visual Interfaces (AVI 2016), Bari, Italy, June 07, 2016.', 'editorship', 'CEUR Workshop Proceedings', '', 1, '2018-01-27 17:36:56', '2018-01-27 17:36:56');

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `birth_date`, `email`, `password`, `picture`, `role`, `reference_link`, `created_at`, `updated_at`) VALUES
(1, 'Giuseppe', 'Desolda', '1989-01-10', 'giuseppeDesolda@gmail.com', 'admin', 'http://ivu.di.uniba.it/people/desolda/img/mia-foto.jpg', 'Researcher', 'https://www.facebook.com/giuseppe.desolda.3', '2018-01-27 15:54:25', '2018-01-27 15:54:25');

--
-- Dumping data for table `user_publication`
--

INSERT INTO `user_publication` (`id`, `user_id`, `publication_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4);

--
-- Dumping data for table `conferences`
--

INSERT INTO `conferences` (`publication_id`, `abstract`, `pages`, `days`, `year`, `key`, `doi`, `ee`, `url`) VALUES
(3, 'Etiam euismod augue euismod, bibendum tortor a, posuere ipsum. Nulla cursus non turpis vel rhoncus. Nulla et nisi aliquam, elementum dolor eu, volutpat mi. Phasellus scelerisque sagittis finibus. In eu malesuada massa. Sed volutpat sed tellus nec egestas. Nullam fermentum libero eu aliquet consectetur. Curabitur rhoncus lectus sed quam ornare, id consectetur nunc pharetra. Praesent laoreet sodales condimentum. Vivamus mattis ex massa. In consectetur in augue et facilisis. Nullam laoreet congue nibh vitae ultricies. In id tempus ante.', '257-260', '', '2018-01-19', 'aaaaaaaaa', 'abbbbbbbb', 'bvvvvvvvvvvvv', 'dsdsdsdsds');

--
-- Dumping data for table `editorships`
--

INSERT INTO `editorships` (`publication_id`, `abstract`, `volume`, `publisher`, `year`, `key`, `doi`, `ee`, `url`) VALUES
(4, 'Duis ornare consectetur lectus, at egestas nisl. Donec condimentum libero nisi, a dictum quam condimentum sit amet. Nam nisi ante, dictum sed augue a, semper consequat elit. Nam viverra scelerisque sapien in tincidunt. Praesent eget eros ut sem ultrices ullamcorper non vitae orci. Vestibulum convallis ante metus, in porta dui volutpat eget. Nunc dignissim leo purus, imperdiet viverra neque finibus sit amet. Proin id pharetra mi. Sed blandit efficitur arcu pulvinar accumsan. Maecenas mattis ligula ac tortor sollicitudin placerat. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.', '1602', 'CEUR-WS.org', '2016-01-18', 'saasas', 'shfhf', '', '');

--
-- Dumping data for table `journals`
--

INSERT INTO `journals` (`publication_id`, `abstract`, `volume`, `number`, `pages`, `year`, `key`, `doi`, `ee`, `url`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum aliquam neque sed euismod tempus. Vestibulum porttitor sagittis neque vel volutpat. Etiam malesuada posuere diam, sit amet cursus velit ultricies non. Etiam vehicula consectetur odio, tempor aliquet justo posuere quis. Donec sed convallis sapien. Nulla dui nunc, dictum ut pulvinar ut, pretium vehicula metus. Etiam vitae mattis justo. Aenean molestie eget enim nec malesuada. Morbi dapibus ex id massa tempor posuere. Suspendisse sit amet felis felis. Phasellus quis tempor purus. Suspendisse luctus congue metus, in euismod nibh tempus non. Maecenas elementum libero tortor, at volutpat erat lacinia eu. Phasellus quis sem diam. Mauris interdum viverra finibus.', 'hci usability', 4, '231-590', '2003-01-01', 'wqwwww', 'qwwqw', 'wqwq', 'qwwqwqwq'),
(2, 'Maecenas lacinia, diam ornare imperdiet feugiat, nibh tellus ultricies ipsum, in tempor ex eros id urna. Maecenas ac metus hendrerit, blandit justo ut, consectetur magna. Nunc vel ullamcorper nisl. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Mauris rutrum urna et tincidunt dictum. Morbi vel enim eu diam dapibus mollis. Duis quis urna orci.', '42', 0, '123-254', '2017-12-27', 'aaaaa', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
