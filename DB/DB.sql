-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 mars 2022 à 12:16
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `reservation`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `password`) VALUES
(1, 'med', 'Me', '$2y$12$uTuj.5HbYMQttjxMpGSW4.SZ/IGRWh3GpTM/Pd13tgoY982TiX4gW'),
(2, 'test', 'test', '$2y$12$7OKQNTj0lM4db6/8QGczZOLU7rBog34O7RCSJnD0LGOnLQZTNlqs2');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `NumRes` int(11) NOT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `datenaissance` date DEFAULT NULL,
  `idVoyage` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`NumRes`, `nom`, `prenom`, `datenaissance`, `idVoyage`, `idUser`) VALUES
(12, 'Voluptatem exercita', '25-Oct-2019', '2014-12-17', 3, 1),
(13, 'Ad et porro a beatae', '12-Jun-2008', '1986-01-04', 4, 1),
(14, 'Architecto accusanti', '16-Sep-2015', '1985-05-03', 4, 1),
(15, 'Unde quia ullamco an', '24-Nov-2001', '2000-03-03', 4, 1),
(16, 'In sint nisi sequi o', '22-May-2009', '1984-10-20', 4, 1),
(17, 'Ut doloremque et et ', '10-Feb-1989', '1985-12-11', 3, 1),
(18, 'Deleniti aut vero be', '19-Apr-1982', '2012-07-08', 3, 1),
(19, 'Quis fugiat volupta', '31-Jan-1977', '2005-02-05', 3, 1),
(20, 'Assumenda facilis al', '06-Jul-1979', '1970-08-23', 3, 1),
(21, 'Enim eaque cum volup', '02-Jul-1971', '1974-03-06', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `telephone` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `telephone`, `email`, `password`) VALUES
(1, 'Mohamed', 'Balizi', '0612345678', 'mrbalizi52@gmail.com', '$2y$12$IH7RBfGxd5YInzFmNWZEHeZCsDXU5F9YBgbRqGSNu0Y');

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `idV` int(11) NOT NULL,
  `date_depart` datetime DEFAULT NULL,
  `ville_depart` varchar(20) DEFAULT NULL,
  `date_arrive` datetime DEFAULT NULL,
  `ville_arrive` varchar(20) DEFAULT NULL,
  `prix_voyage` int(11) DEFAULT NULL,
  `nomber_place` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`idV`, `date_depart`, `ville_depart`, `date_arrive`, `ville_arrive`, `prix_voyage`, `nomber_place`) VALUES
(3, '2022-03-17 14:00:00', 'Agadir', '2022-03-17 19:00:00', 'Bern', 700, 40),
(4, '2022-02-22 12:00:00', 'Ouarzazate', '2022-02-22 14:30:00', 'Casablanca', 35, 80);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`NumRes`),
  ADD KEY `idVoyage` (`idVoyage`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`idV`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `NumRes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `idV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`idVoyage`) REFERENCES `voyage` (`idV`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
