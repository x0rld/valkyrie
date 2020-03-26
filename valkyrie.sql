
--
-- Base de données :  `valkyrie`
--

-- --------------------------------------------------------

--
-- Structure de la table `account_activation`
--

CREATE TABLE  `ACCOUNT_ACTIVATION` (
  `id_active` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(100) NOT NULL,
  `mail` varchar(60) NOT NULL,
  `expire_date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_active`)
);
-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

CREATE TABLE  `CHAT` (
  `id_chat` int(11) NOT NULL AUTO_INCREMENT,
  `message` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_games` int(11) NOT NULL,
  PRIMARY KEY (`id_chat`),
  KEY `fk_user` (`id_user`),
  KEY `fk_games` (`id_games`)
);
--
-- Déchargement des données de la table `chat`
--
-- --------------------------------------------------------

--
-- Structure de la table `chef_doeuvre`
--


CREATE TABLE  `CHEF_DOEUVRE` (
  `id_chef_doeuvre` int(11) NOT NULL AUTO_INCREMENT,
  `path` varchar(100) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_chef_doeuvre`),
  KEY `fk_user` (`id_user`)
);
--
-- Déchargement des données de la table `chef_doeuvre`
--

INSERT INTO `CHEF_DOEUVRE` (`id_chef_doeuvre`, `path`, `id_user`) VALUES
(1, '\\img\\chef_doeuvre\\pika.png', 8);

-- --------------------------------------------------------

--
-- Structure de la table `games`
--


CREATE TABLE  `GAMES` (
  `id_game` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) NOT NULL,
  `draw` varchar(255) NOT NULL DEFAULT '../img/empty_canvas.png',
  `max_players` int(11) NOT NULL DEFAULT '12',
  `nb_player` int(11) NOT NULL DEFAULT '0',
  `R18` tinyint(1) NOT NULL,
  `vote` int(11) DEFAULT '0',
  `id_user` int(11) NOT NULL,
  `tournament` tinyint(1) NOT NULL DEFAULT '0',
  `id_sub` int(11) NOT NULL,
  `id_tournament` int(11) DEFAULT NULL,
  `ranked` tinyint(1) DEFAULT NULL,
  `id_winner` int(11) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `actual_player` int(11) NOT NULL,
  `tmpwin` varchar(255) NOT NULL DEFAULT '../img/empty_canvas.png',
  PRIMARY KEY (`id_game`),
  KEY `fk_sub` (`id_sub`),
  KEY `fk_tournament` (`id_tournament`),
  KEY `fk_user` (`id_user`)
);
--
-- Déchargement des données de la table `games`
--

INSERT INTO `GAMES` (`id_game`, `name`, `draw`, `max_players`, `nb_player`, `R18`, `vote`, `id_user`, `tournament`, `id_sub`, `id_tournament`, `ranked`, `id_winner`, `active`, `actual_player`, `tmpwin`) VALUES
(32, '456@gmail.com', '../img/empty_canvas.png', 12, 0, 0, 0, 17, 0, 13, NULL, 0, 17, 1, 19, '../img/empty_canvas.png'),
(31, 'arthur', '../img/tmpdraw/5cc5995d0243f.png', 12, 0, 0, 0, 19, 0, 13, NULL, 0, 0, 1, 19, '../img/empty_canvas.png');

-- --------------------------------------------------------

--
-- Structure de la table `generate`
--


CREATE TABLE  `GENERATE` (
  `id_notif` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  PRIMARY KEY (`id_notif`,`id_user`,`id_game`),
  KEY `fk_user` (`id_user`),
  KEY `fk_game` (`id_game`)
);
-- --------------------------------------------------------

--
-- Structure de la table `invite`
--

CREATE TABLE  `INVITE` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_notif`,`id_user`),
  KEY `fk_user` (`id_user`)
);
-- --------------------------------------------------------

--
-- Structure de la table `ladder`
--


CREATE TABLE  `LADDER` (
  `id_ladder` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) DEFAULT '0',
  `score` int(11) NOT NULL DEFAULT '0',
  `win` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL DEFAULT '0',
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_ladder`),
  KEY `fk_user` (`id_user`)
);
--
-- Déchargement des données de la table `ladder`
--

INSERT INTO `LADDER` (`id_ladder`, `rank`, `score`, `win`, `total`, `id_user`) VALUES
(1, 1000, 100, 2, 10, 8),
(2, 544, 12, 45, 122, 17);

-- --------------------------------------------------------

--
-- Structure de la table `notification`
--


CREATE TABLE  `NOTFICATION` (
  `id_notif` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_notif`)
);
--
-- Déchargement des données de la table `notification`
--

-- --------------------------------------------------------

--
-- Structure de la table `participate`
--

CREATE TABLE  `PARTICIPATE` (
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `word` varchar(27) DEFAULT NULL,
  PRIMARY KEY (`id_game`,`id_user`),
  KEY `fk_user` (`id_user`)
);
--
-- Déchargement des données de la table `participate`
--


-- --------------------------------------------------------

--
-- Structure de la table `player_tour`
--

CREATE TABLE  `PLAYER_TOUR` (
  `id_player` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`id_player`)
);
--
-- Déchargement des données de la table `player_tour`
--

INSERT INTO `PLAYER_TOUR` (`id_player`, `username`) VALUES
(1, 'toto'),
(2, 'toto'),
(3, 'wqs'),
(4, 'wqs'),
(5, 'wqs'),
(6, 'wqs'),
(7, 'wqs'),
(8, 'toto'),
(9, 'wqs'),
(10, 'wqs'),
(11, 'wqs'),
(12, 'wqs');

-- --------------------------------------------------------

--
-- Structure de la table `proposals`
--


CREATE TABLE  `PROPOSALS` (
  `id_chat` int(11) NOT NULL,
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_chat`,`id_game`,`id_user`),
  KEY `fk_user` (`id_user`),
  KEY `fk_game` (`id_game`)
);

-- --------------------------------------------------------

--
-- Structure de la table `signup`
--


CREATE TABLE  `SIGNUP` (
  `id_tournament` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  PRIMARY KEY (`id_tournament`,`id_player`),
  UNIQUE KEY `fk_tournament` (`id_tournament`),
  KEY `fk_player` (`id_player`)
);

-- --------------------------------------------------------

--
-- Structure de la table `subjects`
--


CREATE TABLE  `SUBJECTS` (
  `id_sub` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(27) DEFAULT NULL,
  `R18` tinyint(1) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sub`)
);

--
-- Déchargement des données de la table `subjects`
--

INSERT INTO `SUBJECTS` (`id_sub`, `name`, `R18`, `active`) VALUES
(1, 'maliste', 1, 1),
(13, 'pokemon', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `tournament`
--


CREATE TABLE  `TOURNAMENT` (
  `id_tournament` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  PRIMARY KEY (`id_tournament`)
);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--


CREATE TABLE  `USER` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(60) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '0',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `profile_pic` varchar(100) NOT NULL DEFAULT 'img/profile_pic/default.png',
  `chef_doeuvre` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_user`),
  KEY `fk_chef` (`chef_doeuvre`)
);

--
-- Déchargement des données de la table `user`
--

INSERT INTO `USER` (`id_user`, `mail`, `username`, `password`, `statut`, `banned`, `profile_pic`, `chef_doeuvre`, `active`) VALUES
(17, '456@gmail.com', '456@gmail.com', '$argon2id$v=19$m=1024,t=2,p=2$T3lhZDJTMlRjZHZGMHZCVw$I3egOFjEesl/GimKUIMSeWRlReDqEA1JveA2uToPzoQ', 0, 0, 'img/profile_pic/27cb063cfef1a0c4fcaf2966365619cf7e05a650.png', NULL, 1),
(20, 'yanis@mail.com', 'yanis', '$argon2id$v=19$m=1024,t=2,p=2$bFduWU1VQi5tQTZXWHpCQg$LaHNv6S28jw9vReI3/3BocDTRXY1Y53e01+j/YwKrBY', 0, 0, 'img/profile_pic/d197ee544a3c0608f151981b8db0215ce4a64c14.png', NULL, 1),
(19, 'arthur@mail.com', 'arthur', '$argon2id$v=19$m=1024,t=2,p=2$Snd4aDROZk1DcEdKMWt2dw$3X5Mtugsg6dckb2YGb7PxFhLv04OAJkUz7QzGm1ZsLw', 0, 0, 'img/profile_pic/829c1ea09db14ab6d880d0ffb44e2be3de7ea611.png', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE  `VOTE` (
  `id_game` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_game`)
);

--
-- Déchargement des données de la table `vote`
--

INSERT INTO `VOTE` (`id_game`, `id_user`) VALUES
(26, 19);

-- --------------------------------------------------------

--
-- Structure de la table `words`
--

CREATE TABLE  `WORDS` (
  `id_words` int(11) NOT NULL AUTO_INCREMENT,
  `word` varchar(27) NOT NULL,
  `id_subject` int(11) NOT NULL,
  PRIMARY KEY (`id_words`),
  KEY `fk_subjects` (`id_subject`)
);

--
-- Déchargement des données de la table `words`
--

INSERT INTO `WORDS` (`id_words`, `word`, `id_subject`) VALUES
(1, 'tortifion', 13),
(2, 'carapute', 13),
(3, 'vulvisar', 13),
(4, 'chattosore', 13);