-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 08 fév. 2021 à 12:26
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tshajj_pelerin.sql`
--

-- --------------------------------------------------------

--
-- Structure de la table `tshajj_agentcomptoire`
--

CREATE TABLE `tshajj_agentcomptoire` (
  `id` int(11) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `tshajj_agentcomptoire`
--

INSERT INTO `tshajj_agentcomptoire` (`id`, `fullname`, `email`, `password`) VALUES
(1, 'kouakou stephanie', 'fanny@gmail.com', 'fanny1234');

-- --------------------------------------------------------

--
-- Structure de la table `tshajj_pelerin`
--

CREATE TABLE `tshajj_pelerin` (
  `id_pel` int(11) NOT NULL,
  `identifiant` varchar(50) DEFAULT NULL,
  `nom_pel` varchar(50) DEFAULT NULL,
  `prenom_pel` varchar(50) DEFAULT NULL,
  `dat_nais_pel` varchar(10) DEFAULT NULL,
  `passport_pel` int(50) DEFAULT NULL,
  `proff_pel` varchar(50) DEFAULT NULL,
  `niv_etu_pel` varchar(50) DEFAULT NULL,
  `cont_pel` varchar(13) DEFAULT NULL,
  `email_pel` varchar(50) DEFAULT NULL,
  `lang_parl_pel` varchar(50) DEFAULT NULL,
  `affinite_pel` varchar(50) DEFAULT NULL,
  `ville_pel` varchar(20) DEFAULT NULL,
  `comm_pel` varchar(20) DEFAULT NULL,
  `quart_pel` varchar(20) DEFAULT NULL,
  `rue_pel` varchar(20) DEFAULT NULL,
  `port_pel` int(4) DEFAULT NULL,
  `nb_part_pel` int(3) DEFAULT NULL,
  `sit_matri_pel` varchar(20) DEFAULT NULL,
  `nom_conj_pel` varchar(50) DEFAULT NULL,
  `cont_conj_pel` varchar(13) DEFAULT NULL,
  `nb_enf_pel` int(3) DEFAULT NULL,
  `orig_pel` varchar(20) DEFAULT NULL,
  `nom_urg_pel` varchar(50) DEFAULT NULL,
  `prenom_urg_pel` varchar(50) DEFAULT NULL,
  `cont_urg_pel` varchar(13) DEFAULT NULL,
  `lang_parl_urg_pel` varchar(20) DEFAULT NULL,
  `ville_urg_pel` varchar(20) DEFAULT NULL,
  `comm_urg_pel` varchar(20) DEFAULT NULL,
  `quart_urg_pel` varchar(20) DEFAULT NULL,
  `rue_urg_pel` varchar(20) DEFAULT NULL,
  `porte_urg_pel` int(4) DEFAULT NULL,
  `cert_apt_medi_pel` varchar(20) DEFAULT NULL,
  `centre_deli_pel` varchar(50) DEFAULT NULL,
  `med_del_pel` varchar(50) DEFAULT NULL,
  `gp_sang_pel` varchar(3) DEFAULT NULL,
  `mal_sign_pel` varchar(50) DEFAULT NULL,
  `autr_info_pel` varchar(50) DEFAULT NULL,
  `all_pel` varchar(20) DEFAULT NULL,
  `plats_pref_pel` varchar(50) DEFAULT NULL,
  `nb_plats_jr_pel` int(2) DEFAULT NULL,
  `clim_pel` varchar(20) DEFAULT NULL,
  `affi1_pel` varchar(50) DEFAULT NULL,
  `date_register` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tshajj_pelerin`
--

INSERT INTO `tshajj_pelerin` (`id_pel`, `identifiant`, `nom_pel`, `prenom_pel`, `dat_nais_pel`, `passport_pel`, `proff_pel`, `niv_etu_pel`, `cont_pel`, `email_pel`, `lang_parl_pel`, `affinite_pel`, `ville_pel`, `comm_pel`, `quart_pel`, `rue_pel`, `port_pel`, `nb_part_pel`, `sit_matri_pel`, `nom_conj_pel`, `cont_conj_pel`, `nb_enf_pel`, `orig_pel`, `nom_urg_pel`, `prenom_urg_pel`, `cont_urg_pel`, `lang_parl_urg_pel`, `ville_urg_pel`, `comm_urg_pel`, `quart_urg_pel`, `rue_urg_pel`, `porte_urg_pel`, `cert_apt_medi_pel`, `centre_deli_pel`, `med_del_pel`, `gp_sang_pel`, `mal_sign_pel`, `autr_info_pel`, `all_pel`, `plats_pref_pel`, `nb_plats_jr_pel`, `clim_pel`, `affi1_pel`, `date_register`) VALUES
(5, '../../image/601efb0175509.png', 'toure', 'ali', '2021-02-05', 123456, 'informaticien', 'bac 2', '04859623', 'toure@gmail.com', 'francaise', 'neant', 'abidjan', 'yopougon', 'zone industriel', 'micao', 35, 0, 'celibataire', '', '', 1, 'ivoirienne', 'ouatara', 'ali', '45896321', 'francais', 'abidjan', 'yopougon', 'maroc', 'maroc', 12, 'sder', 'abobo sante', 'koffi', 'A', 'neant', 'neant', 'neant', 'placali', 2, 'climatiseur', 'neant', '06-02-21 09:24:33'),
(6, '../../image/60211f4f2e17f.png', 'kouame', 'francis', '1983-07-15', 5896321, 'technicien', 'bac5', '96564231', 'kouame@gmail.com', 'francais', 'neant', 'abidjan', 'ab0bo', 'pk18', 'pk18', 12, 1, 'celibataire', '', '', 2, 'ivoirienne', 'kouame', 'alice virginie', '05896321', 'francais', 'abidjan', 'yopougon', 'maroc', 'maroc', 5, 'lorem eupsu', 'abobo sante', 'bernad koffi', 'O', 'neant', 'neant', 'neant', 'alloco', 2, 'climatiseur', 'neant', '08-02-21 12:23:59');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `tshajj_agentcomptoire`
--
ALTER TABLE `tshajj_agentcomptoire`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tshajj_pelerin`
--
ALTER TABLE `tshajj_pelerin`
  ADD PRIMARY KEY (`id_pel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `tshajj_agentcomptoire`
--
ALTER TABLE `tshajj_agentcomptoire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tshajj_pelerin`
--
ALTER TABLE `tshajj_pelerin`
  MODIFY `id_pel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
