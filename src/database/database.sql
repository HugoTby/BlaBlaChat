-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 14 avr. 2023 à 08:49
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
  `contenu` varchar(5000) NOT NULL,
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
(322, 'Un 20 pour tous !', 1, 3, '2023-03-29 14:43:15'),
(323, 'Général', 12, 2, '2023-03-29 16:20:48'),
(324, 'Gaming', 13, 2, '2023-03-29 16:20:54'),
(325, 'Humour', 14, 2, '2023-03-29 16:21:00'),
(326, 'FAQ', 15, 2, '2023-03-29 16:21:04'),
(327, 'bonjour', 14, 1, '2023-03-29 17:13:25'),
(328, 'bonjour', 15, 1, '2023-03-29 17:13:31'),
(329, 'bonjour', 13, 1, '2023-03-29 17:13:38'),
(330, 'bonjour', 12, 1, '2023-03-29 17:13:44'),
(331, 'bonjour', 12, 1, '2023-03-29 17:13:57'),
(332, 'coucou je suis un gamer', 13, 2, '2023-03-29 17:17:58'),
(333, 'bonjour je suis en bac général', 12, 2, '2023-03-29 17:18:10'),
(334, 'test', 1, 1, '2023-03-29 17:23:22'),
(335, 'test', 1, 1, '2023-03-29 17:23:43'),
(336, 'test', 1, 1, '2023-03-29 17:25:49'),
(337, 'test', 1, 1, '2023-03-29 17:26:08'),
(338, 'test', 1, 1, '2023-03-29 17:27:39'),
(339, 'test', 1, 1, '2023-03-29 17:28:00'),
(340, 'dsfdsf', 2, 2, '2023-03-29 17:28:03'),
(341, 'cocuouc je suis quentin je mange des cartes graphiques', 2, 2, '2023-03-29 17:28:29'),
(342, 'ujgvghfc', 1, 2, '2023-03-29 17:29:42'),
(343, 'coucou hugo', 1, 2, '2023-03-29 17:30:37'),
(344, 'hgfhg', 1, 2, '2023-03-29 17:30:49'),
(345, 'gvhgvhgvh', 1, 1, '2023-03-29 17:30:57'),
(346, 'gvhgvhgvh', 1, 1, '2023-03-29 17:34:42'),
(347, 'miam', 2, 1, '2023-03-29 17:37:55'),
(348, 'lol', 1, 29, '2023-03-29 17:39:31'),
(349, 'ges', 1, 1, '2023-03-29 17:43:02'),
(350, 'gros noob', 15, 29, '2023-03-30 11:50:49'),
(351, 'gros noob', 14, 29, '2023-03-30 11:50:55'),
(352, 'gros noob', 13, 29, '2023-03-30 11:51:02'),
(353, 'gros noob', 12, 29, '2023-03-30 11:51:07'),
(354, 'gros noob', 1, 29, '2023-03-30 11:51:11'),
(355, 'bah wsh,pas cool :b', 1, 1, '2023-03-30 20:07:34'),
(356, 'bahahahahhahaha', 1, 29, '2023-03-31 08:03:58'),
(357, ':)', 1, 1, '2023-03-31 08:13:42'),
(358, 'cocuouc', 1, 2, '2023-03-31 11:07:57'),
(359, 'test', 1, 1, '2023-03-31 11:07:58'),
(361, 'test', 1, 1, '2023-03-31 11:09:25'),
(362, 'sale merde', 1, 2, '2023-03-31 11:09:36'),
(363, 'test', 1, 1, '2023-03-31 11:10:40'),
(364, 'test', 1, 1, '2023-03-31 11:11:28'),
(365, 'test', 1, 1, '2023-03-31 11:11:46'),
(366, 'test', 1, 1, '2023-03-31 11:14:24'),
(367, 'test', 1, 1, '2023-03-31 11:14:55'),
(368, 'test', 1, 1, '2023-03-31 11:15:13'),
(369, 'test', 1, 1, '2023-03-31 11:16:11'),
(370, 'test', 1, 1, '2023-03-31 11:17:07'),
(371, 'test', 1, 1, '2023-03-31 11:17:16'),
(374, 'lala', 1, 29, '2023-03-31 14:24:19'),
(375, 'pas cool damien :/', 1, 1, '2023-03-31 14:26:08'),
(376, 'lala', 1, 29, '2023-03-31 14:26:28'),
(385, 'pas cool damien :/', 1, 1, '2023-03-31 14:26:58'),
(387, 'grsdgfrs', 5, 1, '2023-03-31 15:48:50'),
(388, 'grsdgfrs', 5, 1, '2023-03-31 15:48:54'),
(389, 'grsdgfrs', 5, 1, '2023-03-31 15:48:55'),
(390, 'grsdgfrs', 5, 1, '2023-03-31 15:48:56'),
(391, 'test', 1, 2, '2023-03-31 16:34:27'),
(392, 'test', 1, 1, '2023-03-31 16:34:32'),
(393, 'test', 1, 1, '2023-03-31 16:34:37'),
(394, 'salut', 14, 31, '2023-03-31 16:34:44'),
(395, 'test', 1, 1, '2023-03-31 16:34:44'),
(396, 'test', 1, 1, '2023-03-31 16:35:05'),
(398, 'salut', 14, 31, '2023-03-31 16:35:23'),
(399, 'nan', 1, 31, '2023-03-31 16:35:56'),
(400, 'nan', 1, 31, '2023-03-31 16:36:00'),
(401, 'test', 1, 1, '2023-03-31 16:36:03'),
(402, 'nan', 1, 31, '2023-03-31 16:36:04'),
(403, 'nan', 1, 31, '2023-03-31 16:36:05'),
(404, 'nan', 1, 31, '2023-03-31 16:36:07'),
(405, 'salut', 1, 31, '2023-03-31 16:36:26'),
(406, 'test', 1, 1, '2023-03-31 16:36:54'),
(407, 'prout', 1, 2, '2023-03-31 16:37:04'),
(408, 'salut', 1, 31, '2023-03-31 16:37:06'),
(409, 'salut', 1, 31, '2023-03-31 16:37:11'),
(410, '<embed src=\"https://www.afmc.ch/fileadmin/user_upload/exemple-1.pdf\" \n type=\"application/pdf\">', 1, 1, '2023-03-31 16:37:12'),
(411, 'salut', 1, 31, '2023-03-31 16:37:18'),
(412, 'gegr ger', 1, 2, '2023-03-31 16:37:32'),
(434, 'test', 1, 1, '2023-03-31 16:42:58'),
(435, '\'', 1, 31, '2023-03-31 16:43:01'),
(436, 'test', 1, 1, '2023-03-31 16:43:33'),
(437, '\'', 1, 31, '2023-03-31 16:43:34'),
(438, '\'', 1, 31, '2023-03-31 16:44:03'),
(439, '\'', 1, 31, '2023-03-31 16:44:22'),
(440, '\'', 1, 31, '2023-03-31 16:44:53'),
(441, '\'', 1, 31, '2023-03-31 16:44:55'),
(442, 'test', 1, 1, '2023-03-31 16:44:56'),
(451, '<embed src\"\">', 1, 31, '2023-03-31 16:45:47'),
(454, 'menfou', 1, 21, '2023-03-31 16:47:03'),
(458, 'yo les gars', 1, 33, '2023-04-01 09:47:45'),
(459, 'cc', 1, 33, '2023-04-01 09:48:41'),
(460, 'eee', 1, 33, '2023-04-01 09:48:44'),
(461, 'aazrfg', 1, 33, '2023-04-01 09:48:48'),
(463, 'hugo tu ressembles à stuart little', 12, 31, '2023-04-01 09:49:20'),
(465, '<br><br><h1><mark style=\"font-size:50px;border-radius:5px;background-color:orange;padding:5px\" id=\"myMar\">Tous 20 au projet Qt !!!!!</mark></h1>\n\n\n<style>\n  #myMark {\npadding-top:20px;\n    /*animation: blink 0.5s linear infinite;*/\n  }\n  \n  @keyframes blink {\n    0% {\n      opacity: 1;\n    }\n    50% {\n      opacity: 0;\n    }\n    100% {\n      opacity: 1;\n    }\n  }\n</style>\n<br>', 1, 33, '2023-04-01 09:50:02'),
(466, 'cest cadeau', 1, 33, '2023-04-01 09:50:20'),
(468, 'tom tu ressembles au skin de base dans fortnite', 1, 33, '2023-04-01 09:54:04'),
(469, '<br><embed>\r\n<div class=\"discord-embed\">\r\n\r\n  <div class=\"discord-embed-content\">\r\n    <div class=\"discord-embed-title\">Titre de l\'embed</div>\r\n    <div class=\"discord-embed-description\">Contenu de l\'embed</div>\r\n    <div class=\"discord-embed-footer\">Footer de l\'embed</div>\r\n  </div>\r\n</div>\r\n<style>\r\n.discord-embed{display:flex;background-color:#2f3136;border-radius:5px;padding:10px;box-shadow:0 1px 3px rgba(0,0,0,.6)}.discord-embed-author{display:flex;align-items:center;margin-right:10px}.discord-embed-author-avatar{width:32px;height:32px;border-radius:50%}.discord-embed-author-name{color:#b9bbbe;font-size:14px;font-weight:700;margin-left:10px}.discord-embed-content{display:flex;flex-direction:column}.discord-embed-title{color:#fff;font-size:18px;font-weight:700;margin-bottom:10px}.discord-embed-description{color:#b9bbbe;font-size:14px;margin-bottom:10px}.discord-embed-footer{color:#b9bbbe;font-size:12px;margin-top:auto}\r\n</style>\r\n</embed>', 1, 1, '2023-04-01 09:54:33'),
(478, 'test', 1, 1, '2023-04-05 12:19:53'),
(483, 'yo', 1, 31, '2023-04-05 17:33:30'),
(624, 'on se fait quand un mc', 13, 31, '2023-04-05 17:39:57'),
(625, '<br><br><h1><mark style=\"font-size:50px;border-radius:5px;background-color:orange;padding:5px\" id=\"myMar\">Un 20 pour tous !!!!!</mark></h1>\n\n\n<style>\n  #myMark {\npadding-top:20px;\n    /*animation: blink 0.5s linear infinite;*/\n  }\n  \n  @keyframes blink {\n    0% {\n      opacity: 1;\n    }\n    50% {\n      opacity: 0;\n    }\n    100% {\n      opacity: 1;\n    }\n  }\n</style>\n<br>', 1, 3, '2023-04-05 17:40:16'),
(627, 'test', 1, 5, '2023-04-06 21:56:02'),
(628, 'tu vois mon message ?', 1, 17, '2023-04-07 08:33:51'),
(629, 'cc', 1, 17, '2023-04-07 08:35:42'),
(630, 'test', 1, 5, '2023-04-07 08:38:39'),
(631, 'aa', 1, 17, '2023-04-07 08:49:46'),
(632, 'j adore les zizis', 1, 17, '2023-04-07 08:51:49'),
(633, 'www.faustin.com', 1, 17, '2023-04-07 08:52:33'),
(634, 'https://faustin.com', 1, 17, '2023-04-07 08:52:41'),
(635, 'cc le serveur sn2', 2, 2, '2023-04-07 08:53:41'),
(636, 'mathias est le roi de ce monde, je suis son esclave', 1, 2, '2023-04-07 08:54:01'),
(637, 'branle moi vite', 13, 17, '2023-04-07 08:55:31'),
(638, 'yo', 1, 17, '2023-04-07 08:56:34'),
(639, 'reel', 1, 17, '2023-04-07 08:56:55'),
(640, '??????????????', 12, 17, '2023-04-07 08:57:40'),
(641, '^^^^^^ppp', 12, 17, '2023-04-07 08:57:47'),
(642, 'gv', 12, 17, '2023-04-07 08:57:59'),
(643, 'gv', 12, 17, '2023-04-07 08:58:04'),
(644, 'r', 12, 17, '2023-04-07 08:58:08'),
(645, 'r', 12, 17, '2023-04-07 08:58:13'),
(646, 'r', 12, 17, '2023-04-07 08:58:19'),
(647, 'r', 12, 17, '2023-04-07 08:58:20'),
(648, 'r', 12, 17, '2023-04-07 08:58:22'),
(649, 'bonjour', 1, 1, '2023-04-11 13:07:50'),
(650, 'bonsoir', 1, 17, '2023-04-11 13:46:15'),
(651, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/R6XvDnCVYxU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, 17, '2023-04-12 13:29:11'),
(652, 'faustin sal fiotte', 1, 17, '2023-04-12 13:31:24'),
(653, 'comme laurent blanc', 1, 17, '2023-04-12 13:31:36'),
(654, 'wé wé wé Mathias', 1, 1, '2023-04-12 14:29:31'),
(655, 'https://youtu.be/C6L89nl646U', 1, 1, '2023-04-12 17:33:40'),
(672, 'test1', 1, 2, '2023-04-14 08:20:48'),
(673, 'test2', 1, 2, '2023-04-14 08:21:09'),
(674, 'test2', 1, 2, '2023-04-14 08:21:22'),
(675, 'test2', 1, 2, '2023-04-14 08:21:25'),
(676, '<h1>test2</h1>', 1, 2, '2023-04-14 08:22:14'),
(677, 'test2', 1, 2, '2023-04-14 08:22:18'),
(678, '&lt;h1&gt;test2&lt;/h1&gt;', 1, 2, '2023-04-14 08:26:37'),
(679, 'mm', 1, 2, '2023-04-14 08:30:09'),
(680, 'coucou', 1, 2, '2023-04-14 08:46:51'),
(681, 'salut salut', 1, 2, '2023-04-14 08:47:03');

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
(11, 'L3 EDD - Energies et Développement Durable', 'L3 EDD'),
(12, 'Général', 'GÉNÉRAL'),
(13, 'Gaming', 'GAMING'),
(14, 'Humour', 'HUMOUR'),
(15, 'FAQ', 'FAQ');

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
  `description` varchar(180) DEFAULT NULL,
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

PRIVATE DATA
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=682;

--
-- AUTO_INCREMENT pour la table `server`
--
ALTER TABLE `server`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

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