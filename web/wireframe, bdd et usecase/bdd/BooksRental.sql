-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 04 Décembre 2017 à 10:28
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `BooksRental`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `member_id` int(11) DEFAULT NULL,
  `category` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resume` longtext COLLATE utf8_unicode_ci NOT NULL,
  `releaseDate` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `book`
--

INSERT INTO `book` (`id`, `member_id`, `category`, `title`, `author`, `resume`, `releaseDate`, `availability`) VALUES
(1, NULL, 'roman', 'Terre(s)', 'Thomas Pesquet', 'C\'est sous un angle délibérément artistique que Thomas Pesquet a souhaité envisager cet ouvrage. En effet, au-delà de la mission scientifique, c’est un photographe d’une rare sensibilité qui s’est révélé au grand public six mois durant. Le sujet, lui, ne s’était encore jamais montré à la fois si distant et si proche, riche de tant de nuances. La Terre, notre planète, notre fragile et ultime bien commun, comme une femme coquette s’est dévoilée au fil des jours sous de très multiples atours : d’étendues désertiques en parcelles cultivées par l’homme, d’îles émergeant de mers azuréennes en mégalopoles parées de leurs éclats nocturnes ; nous sommes restés saisis par l’infinie variété de ses reliefs, l’étendue de sa palette de couleurs. Sous l’œil de Thomas Pesquet, la Terre n’était plus seulement une œuvre d’art, elle était le chef-d’œuvre absolu. TERRE(S), donc, tant elle apparaît plurielle, tour à tour minérale et végétale, aride et aquatique, sauvage et domestiquée, déserte et surpeuplée. Inclassables paysages surgis au fil de la mission Proxima et desquels l’ouvrage conserve l’ordre chronologique : jour après jour, retracez le périple de l’ISS tel que l’ont suivi des millions d’internautes ! Les droits d’auteur de cet ouvrage seront reversés aux Restos du Cœur.  Né en 1978, Thomas Pesquet est astronaute de l’Agence spatiale européenne (ESA). Entre novembre 2016 et juin 2017, il a passé 196 jours, soit 6 mois, à bord de la Station spatiale internationale (ISS) pour la mission Proxima. Il y a mené 60 expériences en rapport avec la force de pesanteur, ainsi que des opérations de maintenance de l’avant-poste orbital. Thomas a également effectué deux sorties dans l’espace… et partagé sur les réseaux sociaux son extraordinaire aventure !', 2017, 1),
(3, NULL, 'BD', 'Tintin au Tibet', 'Hergé', 'Un avion de ligne à bord duquel le jeune Chinois Tchang se rendait en Europe s\'est écrasé dans l\'Himalaya. Tintin au Tibet (1960), pure histoire d\'amitié, sans le moindre méchant, décrit la recherche désespérée à laquelle Tintin se livre pour retrouver son ami. Ce récit pathétique, qui rompt avec le ton extraverti des épisodes précédents, démontre que la fidélité et l\'espoir sont capables de vaincre tous les obstacles, et que les préjugés - en l\'occurrence, à l\'égard de l\'"abominable homme des neiges" - sont bien souvent le fruit de l\'ignorance', 1993, 1),
(4, NULL, 'roman', 'Desproges par Desproges', 'Pierre Desproges', 'Desproges comme vous ne l’avez jamais lu ! Ce premier ouvrage illustré sur Desproges se compose d’entretiens et de centaines de documents rares issus de ses archives personnelles : manuscrits, photos, correspondances, textes inédits, interviews exhumées… Dans sa correspondance, s’esquisse déjà le Desproges en devenir : sa drôlerie, son mordant, son plaisir de la belle langue et son goût de l’absurde. On lit la rage du troufion pendant la guerre d’Algérie, l’exaltation de l’amoureux, son lyrisme, et, toujours, l’humour en contrepoint. Au fil de ses chansons de jeunesse, de ses reportages à L’Aurore ou de ses contes écrits pour Tonus, le quotidien du médecin, on découvre le Pierre potache, journaliste en herbe, puis le papa poule. Enfin se dessine sous un nouveau jour le Desproges que nous connaissons mieux, à travers ses articles de Pilote, Le Nouvel Observateur, Charlie Hebdo, ses parodies dans 30 millions d’amis, ses vraies et fausses publicités, ses collages cocasses, ses correspondances imaginaires : du tailleur de Napoléon à l’Empereur, de Staline au colonel Gorski, d’Himmler à Landru… Ses incroyables archives nous dévoilent les points cardinaux de son existence : l’écriture, toujours, sa joie à pourfendre les idées reçues et les bons sentiments, et sa jubilation à ne pas être compris des imbéciles. Ce livre nous éclaire sur ce personnage complexe et parfois paradoxal : cet épicurien à l’imagination foisonnante, “perturbé congénital, névrosé et psychotique”, qui soigne son angoisse de la mort par un humour dévastateur. Préface de Philippe Meyer Édition élaborée par Perrine Desproges et Cécile ThomasHomme de radio, de télévision et de littérature, Pierre Desproges (1939-1988) s’est fait connaître dans Le Petit Rapporteur, en 1975, avant d’intégrer Le Tribunal des flagrants délires sur France Inter. Il a publié de nombreux ouvrages, dont Les Chroniques de la haine ordinaire, Le Manuel de savoir-vivre à l’usage des rustres et des malpolis, Vivons heureux en attendant la mort (Seuil, Points). Dernières parutions : Encore des nouilles (Les Échappés, Points) et La Pensée du jour (Seuil).', 2017, 1),
(5, 1, 'Humour', 'Le livre de Guillaume', 'Dussart', 'C\'était un développeur hors norme', 3078, 0),
(6, NULL, 'Humour', 'Livret éducatif pour les filles qui ont toujours envie de faire pipi !', 'Marie-Périnée Goguenot ', 'Les toilettes et les filles… une grande histoire !Que ce soient les files d’attente horriblement longues, les dames pipi pas très aimables ou la musique d’ambiance kitsch à mort… entre les toilettes et les filles, c’est une grande histoire ! Avec ce Livret éducatif pour les filles qui ont toujours envie de faire pipi, Marie-Périnée Goguenot - latrinologue de renom et spécialiste en pipitologie - nous éclaire, entre textes et illustrations, sur ce fléau que constitue l’envie pressante chez la gent féminine.Astuces, anecdotes croustillantes et analyses pertinentes composent ainsi cet ouvrage hilarant pour un hymne aux WC et à la vessie pleine. Un album qui pourra également intéresser les garçons (si, si) et peut-être répondre à la question qu’ils se posent TOUS : mais que font les filles aux toilettes pour être aussi longues ?', 2013, 1),
(7, NULL, 'BD', 'Boule et Bill - Tome 1 : Boule et Bill\r\n', 'Jean Roba', 'Boule, un petit garçon comme les autres, a comme meilleur copain Bill, son adorable et facétieux cocker. Outre Boule, Bill a une autre grande passion : Caroline, la mignonne tortue... Dans un univers familial plein de gentillesse et de joie de vivre, les bêtises et les espiègleries de Boule et Bill déchainent les éclats de rire des lecteurs de tout âge.\r\n\r\n', 2008, 1);

-- --------------------------------------------------------

--
-- Structure de la table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `numberMember` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(70) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `member`
--

INSERT INTO `member` (`id`, `numberMember`, `name`, `mail`) VALUES
(1, '3660AZ', 'clement', 'clement@live.fr'),
(2, '5467TF', 'paul', 'paul@gmail.com');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CBE5A3317597D3FE` (`member_id`);

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_70E4FA784639901A` (`numberMember`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `FK_CBE5A3317597D3FE` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
