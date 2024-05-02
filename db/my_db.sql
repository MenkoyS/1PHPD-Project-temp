-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : db
-- Généré le : jeu. 02 mai 2024 à 20:49
-- Version du serveur : 8.3.0
-- Version de PHP : 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `my_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `film`
--

CREATE TABLE `film` (
  `id` int NOT NULL,
  `genre` enum('action','drama') DEFAULT NULL,
  `image_link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `actors` text,
  `price` decimal(10,2) DEFAULT NULL,
  `in_cart` tinyint(1) DEFAULT '0',
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `film`
--

INSERT INTO `film` (`id`, `genre`, `image_link`, `title`, `director`, `actors`, `price`, `in_cart`, `description`) VALUES
(1, 'drama', 'https://imgs.search.brave.com/1DIPbjzVSUZyEIfPH16aLG0E_M7eQprpo33cVAsRjPQ/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9tb21l/bnRzZGhpc3RvaXJl/LmZyL3dwLWNvbnRl/bnQvdXBsb2Fkcy8y/MDIzLzA2LzI2NjMx/NC0yLTc2OHgxMDI1/LmpwZw', 'Dunkirk', 'Christopher Nolan', 'Fionn Whitehead', 5.00, 0, 'C\'est la seconde guerre mondiale.'),
(2, 'action', 'https://fr.web.img4.acsta.net/pictures/14/10/08/11/49/255061.jpg', 'John Wick', 'Chad Stahelski', 'Howard Phillips Lovecraft', 5.00, 0, 'Un assassin très fort à la bagarre.'),
(3, 'action', 'https://fr.web.img3.acsta.net/c_310_420/pictures/14/05/23/17/03/300170.jpg', 'Edge of Tomorrow', 'Doug Liman', 'Christopher McQuarrie,Jez Butterworth', 5.00, 0, 'Il meurt et revit.'),
(4, 'action', 'https://m.media-amazon.com/images/I/81hTNKvTlLL._AC_UF1000,1000_QL80_.jpg', 'Die Hard', 'Roderick Thorp', 'Bruce Willis', 5.00, 0, 'Film d\'action très cool.'),
(5, 'action', 'https://m.media-amazon.com/images/M/MV5BMzMzYzk3ZTEtZDg0My00MTY5LWE3ZmQtYzNhYjhjN2RhZGRjL2ltYWdlXkEyXkFqcGdeQXVyNTAyODkwOQ@@._V1_.jpg', 'Die Hard 2', 'Roderick Thorp', 'Bruce Willis', 5.00, 0, 'Film d\'action très cool 2.'),
(6, 'action', 'https://fr.web.img6.acsta.net/medias/nmedia/18/36/04/16/18686568.jpg', 'Die Hard 3', 'Roderick Thorp', 'Bruce Willis', 5.00, 0, 'Film d\'action très cool 3.'),
(7, 'action', 'https://imgs.search.brave.com/_N5DTokVvPwki0JY-u4n5h7s9YbBwjPQoK-NgGu0_z4/rs:fit:860:0:0/g:ce/aHR0cDovL2ltZzUu/YWxsb2NpbmUuZnIv/YWNtZWRpYS9tZWRp/YXMvbm1lZGlhLzE4/LzM1LzkxLzA5LzE5/MjU1NjE5LmpwZw', 'Terminator', 'James Cameroun', 'Arnold Schwarzenegger', 5.00, 0, 'Les robots sont terrifiants.'),
(8, 'action', 'https://fr.web.img3.acsta.net/pictures/15/04/14/18/30/215297.jpg', 'Mad Max', 'George Miller', 'Zoë Kravitz', 5.00, 0, 'Dans le désert avec des bagarres.'),
(9, 'action', 'https://fr.web.img6.acsta.net/medias/04/34/49/043449_af.jpg', 'Matrix', 'Lilly Wachowski', 'Laurence Fishburne,Joe Pantoliano,Keanu Reeves', 5.00, 0, 'C\'est cool comme film d\'action aussi.'),
(10, 'action', 'https://fr.web.img2.acsta.net/medias/nmedia/18/35/13/44/18364816.jpg', 'Kill Bill', 'Quentin Tarantino', 'Jun Kunimura,David Carradine', 5.00, 0, 'C\'est kill qui tue bill.'),
(11, 'action', 'https://fr.web.img6.acsta.net/pictures/19/08/19/11/51/5296343.jpg', 'Rambo', 'Ted Kotcheff', 'Sylvester Stallone', 5.00, 0, 'Stallone avec des armes.'),
(12, 'drama', 'https://resizing.flixster.com/-XZAfHZM39UwaGJIFWKAE8fS0ak=/v3/t/assets/p24429_p_v12_bf.jpg', 'The Green Mile', 'Frank Darabont', 'Tom Hanks', 5.00, 0, 'C\'est trop triste.'),
(13, 'drama', 'https://media.senscritique.com/media/000008845171/300/million_dollar_baby.jpg', 'Million Dollar Baby', 'Clint Eastwood', 'Anthony Mackie,Hilary Swank', 5.00, 0, 'J\'ai pas vu le film.'),
(14, 'drama', 'https://media.senscritique.com/media/000020846881/300/forrest_gump.jpg', 'Forrest Gump', 'Robert Zemeckis', 'Tom Hanks,Robin Wright', 5.00, 0, 'Il court vite et loin.'),
(15, 'drama', 'https://media.senscritique.com/media/000007087633/300/gran_torino.jpg', 'Gran Torino', 'Clint Eastwood', 'Clint Eastwood', 5.00, 0, 'J\'ai pas vu le film non plus.'),
(16, 'drama', 'https://media.senscritique.com/media/000021973040/300/titanic.png', 'Titanic', 'James Cameron', 'Billy Zane,Kate Winslet', 5.00, 0, 'C\'est triste mais j\'ai pas vu.'),
(17, 'drama', 'https://media.senscritique.com/media/000012359351/300/fight_club.jpg', 'Fight Club', 'David Fincher', 'Brad Pitt', 5.00, 0, 'Apparemment la fin est cool. Surtout la musique.'),
(18, 'drama', 'https://media.senscritique.com/media/000017381024/300/douze_hommes_en_colere.jpg', '12 Angry Men', 'Sidney Lumet', 'Martin Balsam', 5.00, 0, 'Je l\'ai vue en cours d\'anglais et c\'était très bien.'),
(19, 'drama', 'https://media.senscritique.com/media/000004675233/300/leon.jpg', 'Leon', 'Luc Besson', 'Jean Reno', 5.00, 0, 'Les on.'),
(20, 'drama', 'https://media.senscritique.com/media/000020072264/300/le_parrain.jpg', 'The Godfather', 'Francis Ford Coppola', 'Diane Keaton,Al Pacino', 5.00, 0, 'Le parrain (godfather en français)');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `film`
--
ALTER TABLE `film`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
