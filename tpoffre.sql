-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 31 mars 2020 à 13:48
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tpoffre`
--

-- --------------------------------------------------------

--
-- Structure de la table `entreprises`
--

CREATE TABLE `entreprises` (
  `id` int(255) NOT NULL,
  `nom` varchar(255) COLLATE utf8_bin NOT NULL,
  `adresse` varchar(255) COLLATE utf8_bin NOT NULL,
  `mail` varchar(255) COLLATE utf8_bin NOT NULL,
  `contact` varchar(255) COLLATE utf8_bin NOT NULL,
  `telephone` int(255) NOT NULL,
  `ville` varchar(255) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_31_092446_create_users_table', 2),
(5, '2020_03_31_105008_create_offres_table', 3),
(6, '2020_03_31_105645_create_users_table', 4),
(7, '2020_03_31_105908_create_offres_table', 5),
(8, '2020_03_31_105943_create_users_table', 5),
(9, '2020_03_31_110243_create_offres_table', 6),
(10, '2020_03_31_110354_create_users_table', 6);

-- --------------------------------------------------------

--
-- Structure de la table `offres`
--

CREATE TABLE `offres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `offres`
--

INSERT INTO `offres` (`id`, `titre`, `description`, `niveau`, `pdf`, `created_at`, `updated_at`) VALUES
(1, 'Administrateur réseaux informatique F/H - Exploitation, maintenance informatique (H/F)', 'Au sein de la Direction des S.I (100 personnes), rattaché(e) au Responsable Infrastructure et Réseaux, au sein d\'une équipe de 6 personnes, vous assurez l\'exploitation de l\'infrastructure réseau du groupe, le support niveau 2/3 et participez au projet de modernisation du SI. Vos principales missions seront les suivantes : EXPLOITATIONExploiter les réseaux (Switch HP, Firewall Fortinet, Plateforme de management IMC HP, supervision)Réaliser des rapports d\'exploitation mensuels,Exploitation indirecte via un partenaire de la sécurité périmétrique (LoadBalancer F5, Netscaler Citrix, Firewall Fortinet),Gérer au travers d\'un catalogue de service et suivre des SLAs avec ce partenaire,Exploiter les Wifi (Borne et contrôleur wifi Extrem Network). ADMINISTRATIONAdministrer quotidiennement l\'infrastructure LAN, WLAN, SDWAN et sécurité de l\'entreprise, en garantissant notamment son maintien en condition opérationnelle,Opérer un support technique de niveau 3 auprès des établissements et des équipes supports,Suivre la résolution des incidents opérateurs sur un VPN MPLS opérateur de 400 établissements,Rédaction de notes techniques et de tutoriels,Favoriser le rapprochement des différents systèmes informatiques et assurer conjointement avec d\'autres personnels la maintenance au quotidien. GESTION DES EVOLUTIONSÊtre force de propositions pour faire évoluer les infrastructures,Piloter les mises en place de ces évolutions - gestion de projets. - De formation supérieure informatique, vous avez une première expérience acquise dans l\'administration réseaux, vous avez une certaine aisance relationnelle et un fort esprit d\'initiatives. Vous êtes reconnu(e) pour vos capacités de synthèse dans l\'analyse des besoins utilisateurs, vos capacités à gérer les priorités et les risques, votre rigueur de pilotage, et votre sens du service interne.Vous souhaitez intégrer une structure à taille humaine avec une délégation importante et une obligation de résultats.  Poste à pourvoir en CDI, basé à Lyon (69) - .Notre client, Groupe français de santé, recherche dans le cadre de la croissance de son Système d\'Information : Un(e) Administrateur réseaux.', 'BAC + 3', '\\uploads\\2020-03-31 - JSE - PRESENTATION - S1.pdf', '2020-03-31 09:07:32', '2020-03-31 09:07:32');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Admin', 'Admin', 'admin@material.com', '$2y$10$G0TyyOY2FrnfX07u3.DvPejU9EAqDVq4RzQl1d2cIYvtAE9ZgEE92', NULL, '2020-03-31 09:07:32', '2020-03-31 09:07:32');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `offres`
--
ALTER TABLE `offres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `offres`
--
ALTER TABLE `offres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
