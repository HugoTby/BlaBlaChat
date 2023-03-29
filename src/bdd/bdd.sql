-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : mer. 29 mars 2023 à 15:14
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
(297, 'SALON 1', 1, 1, '2023-03-27 17:08:19'),
(298, 'SALON 2', 2, 1, '2023-03-27 17:08:23'),
(299, 'Salon 5', 2, 2, '2023-03-28 11:58:25'),
(300, 'test', 2, 2, '2023-03-28 12:00:29'),
(301, 'fdsgdfg', 2, 2, '2023-03-28 12:00:36'),
(302, 'fdgdf', 2, 2, '2023-03-28 12:00:41'),
(303, 'SALON 3', 1, 1, '2023-03-28 13:22:36'),
(304, 'bonjour', 1, 1, '2023-03-28 13:23:57'),
(305, 'test', 2, 2, '2023-03-29 08:48:27'),
(306, 'coucou', 2, 2, '2023-03-29 11:23:10'),
(307, 'test', 2, 2, '2023-03-29 11:23:14'),
(308, 'testtt', 2, 2, '2023-03-29 11:24:17'),
(309, 'testtt', 2, 2, '2023-03-29 11:24:20'),
(310, 'test', 1, 1, '2023-03-29 11:25:08'),
(311, 'prout', 2, 2, '2023-03-29 11:28:05'),
(312, 'test', 1, 2, '2023-03-29 11:28:30'),
(313, 'Salon 5', 5, 2, '2023-03-29 11:30:14'),
(314, 'Salon 6', 6, 2, '2023-03-29 11:30:18'),
(315, 'test', 1, 2, '2023-03-29 11:36:57'),
(316, 'copucou', 5, 2, '2023-03-29 11:37:02'),
(317, 'test', 1, 1, '2023-03-29 11:37:52'),
(318, 'test', 2, 1, '2023-03-29 11:37:55'),
(320, 'hey', 1, 17, '2023-03-29 13:02:31'),
(321, 'yo', 1, 1, '2023-03-29 13:03:05'),
(322, 'cc jsuis un SN1', 1, 17, '2023-03-29 14:43:15');

-- --------------------------------------------------------

--
-- Structure de la table `server`
--

CREATE TABLE `server` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `nom2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `server`
--

INSERT INTO `server` (`id`, `nom`, `nom2`) VALUES
(1, 'BTS SN 1 - Systèmes Numérique', 'BTS SN 1'),
(2, 'BTS SN 2 - Systèmes Numérique', 'BTS SN 2'),
(3, 'BTS CIEL 1 - CyberSécurité Électronique', 'BTS CIEL 1'),
(4, 'BTS CIEL 2 - CyberSécurité Électronique', 'BTS CIEL 2'),
(5, 'BTS E 1 - Électrotechnique', 'BTS E 1'),
(6, 'BTS E 2 - Électrotechnique', 'BTS E 2'),
(7, 'BTS MS 1 - Systèmes Energétiques & Fluidiques', 'BTS MS 1'),
(8, 'BTS MS 2 - Systèmes Energétiques & Fluidiques', 'BTS MS 2'),
(9, 'BTS FED 1 - Génie Climatique & Fluidique', 'BTS FED 1'),
(10, 'BTS FED 2 - Génie Climatique & Fluidique', 'BTS FED 2'),
(11, 'L3 EDD - Energies et Développement Durable', 'L3 EDD');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `idbdd` varchar(5) DEFAULT NULL,
  `prenom` varchar(30) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `classe` int(11) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'eleve',
  `login` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `avatar` varchar(3000) NOT NULL DEFAULT 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png',
  `icon` varchar(1000) DEFAULT NULL,
  `icon2` varchar(1000) DEFAULT NULL,
  `icon3` varchar(1000) DEFAULT NULL,
  `general` int(11) DEFAULT NULL,
  `gaming` int(11) DEFAULT NULL,
  `humour` int(11) DEFAULT NULL,
  `faq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `idbdd`, `prenom`, `nom`, `mail`, `classe`, `role`, `login`, `password`, `avatar`, `icon`, `icon2`, `icon3`, `general`, `gaming`, `humour`, `faq`) VALUES
(1, '2648', 'Hugo', 'Tabary', 'hugotabary@la-providence.net', 1, 'developpeu', 'hugo.tabary', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'https://media.istockphoto.com/id/1133737051/vector/neon-circle-with-light-effect-on-black-background-modern-round-frame-with-empty-space-for.jpg?s=612x612&w=0&k=20&c=Iq9_UAOaE2pk6DcKw0bda4zIP0JCrqV2lin44k14ZZo=', 'https://freepngimg.com/save/107722-verified-badge-facebook-free-download-png-hd/940x930', 'https://cdn3.emoji.gg/emojis/9755-discord-staff-animated.gif', 'https://cdn3.emoji.gg/emojis/7596-certified-moderator-animated.gif', 6, NULL, NULL, NULL),
(2, '1615', 'Faustin', 'Botel', 'faustinbotel@la-providence.net', 2, 'developpeur', 'faustin.botel', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', 'https://freepngimg.com/save/107722-verified-badge-facebook-free-download-png-hd/940x930', 'https://cdn3.emoji.gg/emojis/9755-discord-staff-animated.gif', 'https://cdn3.emoji.gg/emojis/7596-certified-moderator-animated.gif', 6, NULL, NULL, NULL),
(3, '1631', 'Julien', 'Langlacé', 'julienlanglace@la-providence.net', 1, 'professeur', 'julien.langlace', 'd91d471bd918001d9141a1c5ed7ea71fe936dbda60da448daadb9807ac0b7b0e', 'https://marketplace.canva.com/EAFEits4-uw/1/0/1600w/canva-boy-cartoon-gamer-animated-twitch-profile-photo-oEqs2yqaL8s.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, '3106', 'root', 'root', 'root@la-providence.net', 1, 'eleve', 'root', 'd41ca9b3ff93b24da439c32ab28c24fd03220fbee13d3c4650f20125172ae72d', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, '2462', 'Théo', 'Bilhaut', 'bilhaut.th@gmail.com', 1, 'eleve', 'Skillex80', '77e546375e068a888a9c770fe4f69fbe6e33b90eefac4d2e064ecb242307e1a8', 'https://www.programme-tv.net/imgre/fit/~2~providerPerson~26a210e5a2cb1a8b.jpeg/300x300/quality/80/jean-dujardin.jpeg', 'https://upload.wikimedia.org/wikipedia/commons/f/fb/Gay_Pride_Flag_-_Animated.gif', NULL, NULL, NULL, NULL, NULL, NULL),
(16, '2614', 'Tom', 'Lefevre', 'tomlefevre60@gmail.com', 1, 'eleve', 'tomtom667', '31f7a65e315586ac198bd798b6629ce4903d0899476d5741a9f32e2e521b6a66', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(17, '5728', 'Mathias', 'Sénépart', 'senepart.mathias@gmail.com', 1, 'eleve', 'Tchomat', '4813494d137e1631bba301d5acab6e7bb7aa74ce1185d456565ef51d737677b2', 'https://pbs.twimg.com/media/FsXlBzFXgAAZuVP?format=jpg&name=small', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(18, '3894', 'Lucas', 'Burguet', 'lucasburguet22020@gmail.com', 1, 'eleve', 'lucasfilm', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'https://sm.ign.com/ign_nordic/cover/s/sherlock-h/sherlock-holmes-chapter-one_4tyw.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(19, '8458', 'Eloise', 'Lecronier', 'eloise.lecronier@gmail.com', 1, 'eleve', 'clio3', 'd49c456fbd82a864f78db985672ebee9843a4749e272ae3e1c272c894f78f34a', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(21, '6468', 'Edouard', 'Hautemaniere', 'edouar.hte@gmail.com', 1, 'eleve', 'eXo_', '1f5d55ce6f11b74256f21f4a9bfbb27b57ab9abf948f7dcc97af14753f4fdb94', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(29, '2646', 'Damien', 'Lopes', 'damso@gmail.com', 1, 'eleve', 'dlvdams', 'cb3a4b17e81be7e645d6791ee21afa92586a0dd02b808f403bd2c0850eeffbea', 'https://www.pngmart.com/files/22/User-Avatar-Profile-Download-PNG-Isolated-Image.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `serverSup1` (`general`,`gaming`,`humour`,`faq`),
  ADD KEY `serverSup2` (`gaming`),
  ADD KEY `serverSup3` (`humour`),
  ADD KEY `serverSup4` (`faq`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=323;

--
-- AUTO_INCREMENT pour la table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idServer`) REFERENCES `server` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`id`);

--
-- Contraintes pour la table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`general`) REFERENCES `server` (`id`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`gaming`) REFERENCES `server` (`id`),
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`humour`) REFERENCES `server` (`id`),
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`faq`) REFERENCES `server` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
