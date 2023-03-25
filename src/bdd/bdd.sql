-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 25 mars 2023 à 16:22
-- Version du serveur : 10.5.18-MariaDB-0+deb11u1
-- Version de PHP : 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blablachat`
--

-- --------------------------------------------------------

--
-- Structure de la table `blacklist`
--

CREATE TABLE `blacklist` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `raison` varchar(100) NOT NULL,
  `statut` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `blacklist`
--

INSERT INTO `blacklist` (`id`, `ip`, `raison`, `statut`) VALUES
(1, '8.8.8.8', 'Google Public DNS Server', 0);

-- --------------------------------------------------------

--
-- Structure de la table `infractions`
--

CREATE TABLE `infractions` (
  `id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `id_user` int(11) NOT NULL,
  `raison` varchar(300) NOT NULL,
  `sanction` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `infractions`
--

INSERT INTO `infractions` (`id`, `ip`, `id_user`, `raison`, `sanction`) VALUES
(1, '192.168.65.31', 1, 'Cet utilisateur a commis une infraction sur l\'un des serveurs de BlaBlaChat', 'TEMP_BAN');

-- --------------------------------------------------------

--
-- Structure de la table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `contenu` varchar(1000) NOT NULL,
  `idServer` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `message`
--

INSERT INTO `message` (`id`, `contenu`, `idServer`, `idUser`, `date`) VALUES
(1, 'coucou', 1, 2, '2023-03-02 15:54:31'),
(2, 'coucou mathias', 1, 2, '2023-03-23 15:53:48'),
(5, 'coucou', 2, 14, '2023-03-24 14:03:35'),
(7, 'coucoucccc', 1, 2, '2023-03-24 14:33:13'),
(121, 'bite', 1, 19, '2023-03-24 16:15:36'),
(122, 'test', 1, 16, '2023-03-24 16:16:31'),
(123, 'sdfgdfg', 1, 16, '2023-03-24 16:17:16'),
(124, 'fdgfgdfg', 1, 16, '2023-03-24 16:17:18'),
(125, 'gdfgdfgdfg', 1, 16, '2023-03-24 16:17:20'),
(126, 'gfdgdfgdfgd', 1, 16, '2023-03-24 16:17:22'),
(127, 'gdfgfdgfdg', 1, 16, '2023-03-24 16:17:24'),
(128, 'dfgdfgdfgdf', 1, 16, '2023-03-24 16:17:26'),
(129, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:17:48'),
(130, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:18:19'),
(131, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:18:32'),
(132, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:18:33'),
(133, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:18:34'),
(134, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:20:39'),
(135, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:20:42'),
(136, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipiscing elit,  eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit ea sunt in culpa qui commodo conseqa', 1, 1, '2023-03-24 16:20:49'),
(137, 'ifebizbzekbn vf', 1, 2, '2023-03-01 16:26:15'),
(138, 'coucou', 1, 16, '2023-03-24 16:37:33'),
(139, 'cedk;vsz', 1, 16, '2023-03-24 16:37:37'),
(140, 'cozecijzejiz', 1, 16, '2023-03-24 16:37:46'),
(141, 'gfdfg', 1, 16, '2023-03-24 16:37:49'),
(142, 'salut', 1, 16, '2023-03-24 16:38:07'),
(143, 'test', 1, 16, '2023-03-24 16:38:37'),
(144, 'test', 1, 16, '2023-03-24 16:38:43'),
(145, 'test', 1, 1, '2023-03-24 16:39:02'),
(146, 'test', 1, 1, '2023-03-24 16:39:08'),
(147, 'coucou hugo', 1, 16, '2023-03-24 16:39:12'),
(148, 'test', 1, 1, '2023-03-24 16:39:25'),
(149, 'test', 1, 1, '2023-03-24 16:39:30'),
(150, 'test', 1, 1, '2023-03-24 16:39:30'),
(151, 'test', 1, 1, '2023-03-24 16:39:33'),
(152, 'j\'aime les hommes', 1, 17, '2023-03-24 16:43:02'),
(153, 'test', 1, 1, '2023-03-24 16:43:15'),
(154, 'surtout faustin <3', 1, 17, '2023-03-24 16:43:55'),
(155, 'FDP DE TABARY', 1, 17, '2023-03-24 16:46:07'),
(156, 'hmtest', 1, 1, '2023-03-24 20:09:11'),
(157, 'hmtest', 1, 1, '2023-03-24 20:09:21'),
(158, 'test', 1, 2, '2023-03-25 09:31:19'),
(159, 'juste le code sera pas tres beau et yaura bcp de ligne', 1, 2, '2023-03-25 09:35:32'),
(160, 'mais en gros on va transformé les boutons des servers en submit, et on va mettre une condition pour dire si ce message est cliqué, alors on affiche le contenu des messages de ce server', 1, 2, '2023-03-25 09:36:50'),
(161, 'si ce server*', 1, 2, '2023-03-25 09:37:49'),
(162, 'coucou', 1, 2, '2023-03-25 12:11:03'),
(163, 'sdfdsv', 1, 2, '2023-03-25 12:11:38'),
(164, 'coucou', 1, 2, '2023-03-25 12:14:41'),
(165, 'test', 2, 2, '2023-03-25 12:41:03'),
(166, 'test', 2, 2, '2023-03-25 12:41:40'),
(167, 'coucou', 2, 2, '2023-03-25 12:41:46'),
(168, 'je fais un test', 1, 2, '2023-03-25 12:41:56'),
(169, 'test', 2, 1, '2023-03-25 13:38:09'),
(170, 'test', 1, 1, '2023-03-25 13:38:15');

-- --------------------------------------------------------

--
-- Structure de la table `server`
--

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `server`
--

INSERT INTO `server` (`id`, `nom`) VALUES
(1, 'BTS SN 1 - Systèmes Numérique'),
(2, 'BTS SN 2 - Systèmes Numérique'),
(3, 'BTS CIEL 1 - CyberSécurité Électronique'),
(4, 'BTS CIEL 2 - CyberSécurité Électronique'),
(5, 'BTS E 1 - Électrotechnique'),
(6, 'BTS E 2 - Électrotechnique'),
(7, 'BTS MS 1 - Systèmes Energétiques & Fluidiques'),
(8, 'BTS MS 2 - Systèmes Energétiques & Fluidiques'),
(9, 'BTS FED 1 - Génie Climatique & Fluidique'),
(10, 'BTS FED 2 - Génie Climatique & Fluidique'),
(11, 'L3 EDD - Energies et Développement Durable');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'eleve',
  `classe` varchar(200) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `avatar` varchar(1000) NOT NULL DEFAULT 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png',
  `icon` varchar(1000) DEFAULT NULL,
  `icon2` varchar(1000) DEFAULT NULL,
  `icon3` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `nom`, `mail`, `role`, `classe`, `login`, `password`, `avatar`, `icon`, `icon2`, `icon3`) VALUES
(1, 'Hugo', 'Tabary', 'hugotabary@la-providence.net', 'developpeur', '1', 'hugo.tabary', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'https://media.istockphoto.com/id/1133737051/vector/neon-circle-with-light-effect-on-black-background-modern-round-frame-with-empty-space-for.jpg?s=612x612&w=0&k=20&c=Iq9_UAOaE2pk6DcKw0bda4zIP0JCrqV2lin44k14ZZo=', 'https://freepngimg.com/save/107722-verified-badge-facebook-free-download-png-hd/940x930', 'https://cdn3.emoji.gg/emojis/9755-discord-staff-animated.gif', 'https://cdn3.emoji.gg/emojis/7596-certified-moderator-animated.gif'),
(2, 'Faustin', 'Botel', 'faustinbotel@la-providence.net', 'developpeur', '1', 'faustin.botel', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', 'https://freepngimg.com/save/107722-verified-badge-facebook-free-download-png-hd/940x930', 'https://cdn3.emoji.gg/emojis/9755-discord-staff-animated.gif', 'https://cdn3.emoji.gg/emojis/7596-certified-moderator-animated.gif'),
(3, 'Julien', 'Langlacé', 'julienlanglace@la-providence.net', 'professeur', '1;2', 'julien.langlace', 'd91d471bd918001d9141a1c5ed7ea71fe936dbda60da448daadb9807ac0b7b0e', 'https://marketplace.canva.com/EAFEits4-uw/1/0/1600w/canva-boy-cartoon-gamer-animated-twitch-profile-photo-oEqs2yqaL8s.jpg', NULL, NULL, NULL),
(5, 'root', 'root', 'root@la-providence.net', 'eleve', '1', 'root', 'd41ca9b3ff93b24da439c32ab28c24fd03220fbee13d3c4650f20125172ae72d', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL),
(14, 'Théo', 'Bilhaut', 'bilhaut.th@gmail.com', 'eleve', '1', 'Skillex80', '77e546375e068a888a9c770fe4f69fbe6e33b90eefac4d2e064ecb242307e1a8', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL),
(16, 'Tom', 'Lefevre', 'tomlefevre60@gmail.com', 'eleve', '1', 'tomtom667', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL),
(17, 'Mathias', 'Sénépart', 'senepart.mathias@gmail.com', 'eleve', '1', 'Tchomat', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 'https://www.1999.co.jp/itbig93/10933963a2.jpg', '', '', NULL),
(18, 'Lucas', 'Burguet', 'lucasburguet22020@gmail.com', 'eleve', '1', 'lucasfilm', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'https://sm.ign.com/ign_nordic/cover/s/sherlock-h/sherlock-holmes-chapter-one_4tyw.jpg', NULL, NULL, NULL),
(19, 'Eloise', 'Lecronier', 'eloise.lecronier@gmail.com', 'eleve', '10', 'clio3', 'd49c456fbd82a864f78db985672ebee9843a4749e272ae3e1c272c894f78f34a', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `blacklist`
--
ALTER TABLE `blacklist`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `infractions`
--
ALTER TABLE `infractions`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idServer` (`idServer`),
  ADD KEY `idUser` (`idUser`);

--
-- Index pour la table `server`
--
ALTER TABLE `server`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `blacklist`
--
ALTER TABLE `blacklist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `infractions`
--
ALTER TABLE `infractions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;

--
-- AUTO_INCREMENT pour la table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idServer`) REFERENCES `server` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
