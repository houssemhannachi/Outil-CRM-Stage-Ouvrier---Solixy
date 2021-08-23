-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 23 août 2021 à 10:49
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sol`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `rs_client` text NOT NULL,
  `ref_client` text NOT NULL,
  `fj_client` text NOT NULL,
  `email_client` text NOT NULL,
  `adresse_client` varchar(50) NOT NULL,
  `ville_client` text NOT NULL,
  `pays_client` text NOT NULL,
  `tel_client` text NOT NULL,
  `sw_client` text NOT NULL,
  `mf_client` text NOT NULL,
  `riprib_client` bigint(20) NOT NULL,
  `tauxtva_client` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_client`, `rs_client`, `ref_client`, `fj_client`, `email_client`, `adresse_client`, `ville_client`, `pays_client`, `tel_client`, `sw_client`, `mf_client`, `riprib_client`, `tauxtva_client`) VALUES
(2, 'Houssem', 'CA1920', 'SA', 'houssem.hannachi@enis.tn', 'Rue el Afrah', 'Metouia', 'Tunisie', '222222', 'www.houssem.Com', '13267', 12222, 212112);

-- --------------------------------------------------------

--
-- Structure de la table `devis`
--

CREATE TABLE `devis` (
  `nom_client` text NOT NULL,
  `id_client` int(11) NOT NULL,
  `adresse_client` text NOT NULL,
  `reference_client` text NOT NULL,
  `date` date NOT NULL,
  `designation` text NOT NULL,
  `quantite` int(11) NOT NULL,
  `TVA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `invoice_order`
--

CREATE TABLE `invoice_order` (
  `user_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_receiver_name` varchar(255) NOT NULL,
  `order_receiver_address` varchar(255) NOT NULL,
  `order_total_before_tax` varchar(255) NOT NULL,
  `order_total_tax` varchar(255) NOT NULL,
  `order_tax_per` varchar(255) NOT NULL,
  `order_total_after_tax` varchar(255) NOT NULL,
  `order_amount_paid` varchar(255) NOT NULL,
  `order_total_amount_due` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT current_timestamp(),
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `invoice_order`
--

INSERT INTO `invoice_order` (`user_id`, `order_id`, `order_receiver_name`, `order_receiver_address`, `order_total_before_tax`, `order_total_tax`, `order_tax_per`, `order_total_after_tax`, `order_amount_paid`, `order_total_amount_due`, `order_date`, `note`) VALUES
(1, 5, 'Assestit Company', '247 Clan Alpine Way', '4116', '288.12', '7', '4404.12', '4404.12', '0', '2021-07-12 00:06:31', 'none at the moment!!'),
(1, 13, 'HAHHAHAH', 'HAHHAHHAHA', '49377284', '987545.68', '2', '50364829.68', '50364829', '0.6799999997019768', '2021-08-20 15:38:27', ''),
(1, 14, 'Ghassen', 'Metouia', '2000', '100', '5', '2100', '100', '2000', '2021-08-20 15:48:07', ''),
(1, 16, 'Houssem', 'meya metouia', '2950', '59', '2', '3009', '0', '3009', '2021-08-21 10:43:55', ''),
(1, 17, 'Houssem', 'Metouia', '25000', '1250', '5', '26250', '250', '26000', '2021-08-21 14:40:44', ''),
(1, 18, 'Ahmed', 'Gabès', '550', '104.5', '19', '654.5', '54', '600.5', '2021-08-23 09:11:32', '');

-- --------------------------------------------------------

--
-- Structure de la table `invoice_order_item`
--

CREATE TABLE `invoice_order_item` (
  `order_id` int(11) NOT NULL,
  `item_code` varchar(255) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `order_item_quantity` varchar(255) NOT NULL,
  `order_item_price` varchar(255) NOT NULL,
  `order_item_final_amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `invoice_order_item`
--

INSERT INTO `invoice_order_item` (`order_id`, `item_code`, `item_name`, `order_item_quantity`, `order_item_price`, `order_item_final_amount`) VALUES
(8, '2', 'PC', '50', '200', '10000'),
(9, '1', 'Book', '100', '100', '10000'),
(10, 'ZZAE', 'sqddsqd', '2', '2', '4'),
(11, 'sss', 'ssss', '3', '5', '15'),
(12, 'SSSsss', 'sSSSSSSSSSSssss', '4', '11', '44'),
(13, '33', '22', '2222', '22222', '49377284'),
(15, '22', 'GHJNK?L', '5', '5', '25'),
(15, '2345', 'fghjklm', '10', '4', '40'),
(15, '', '', '', '', '0'),
(14, '2', 'SiteWeb', '10', '200', '2000'),
(16, '1', 'PC Gamer', '1', '2700', '2700'),
(16, '3', 'Clavier', '5', '50', '250'),
(17, '1', 'Ordinateur', '5', '1000', '5000'),
(17, '2', 'Camera', '1', '20000', '20000'),
(18, '1', 'Ordinateur', '55', '10', '550');

-- --------------------------------------------------------

--
-- Structure de la table `invoice_user`
--

CREATE TABLE `invoice_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Déchargement des données de la table `invoice_user`
--

INSERT INTO `invoice_user` (`id`, `email`, `password`, `first_name`, `last_name`, `address`, `mobile`) VALUES
(1, 'contact@solixy.com', 'admin', 'Solixy', 'TEAM 2021', 'Avenue de la république - Immeuble Al Ahram 4ème étage\r\nGabes - Tunisie', '00216 288 299 79');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

CREATE TABLE `paiements` (
  `id_paiement` int(11) NOT NULL,
  `rs_client` text NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_paiement` date NOT NULL,
  `mode_de_paiement` text NOT NULL,
  `id_facture` int(11) NOT NULL,
  `prix` double NOT NULL,
  `status_paiement` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `paiements`
--

INSERT INTO `paiements` (`id_paiement`, `rs_client`, `id_client`, `date_paiement`, `mode_de_paiement`, `id_facture`, `prix`, `status_paiement`) VALUES
(2, 'Houssem', 2, '2021-08-01', 'Chèque', 4, 6, 'Payé'),
(3, 'Houssem', 2, '2021-08-15', 'Espèces', 4, 10, 'Sent');

-- --------------------------------------------------------

--
-- Structure de la table `propects`
--

CREATE TABLE `propects` (
  `id_prospect` int(11) NOT NULL,
  `rs_prospect` text NOT NULL,
  `adresse_prospect` text NOT NULL,
  `email_prospect` text NOT NULL,
  `ville_prospect` text NOT NULL,
  `pays_prospect` text NOT NULL,
  `tel_prospect` int(11) NOT NULL,
  `facebook_prospect` text NOT NULL,
  `siteweb_prospect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `propects`
--

INSERT INTO `propects` (`id_prospect`, `rs_prospect`, `adresse_prospect`, `email_prospect`, `ville_prospect`, `pays_prospect`, `tel_prospect`, `facebook_prospect`, `siteweb_prospect`) VALUES
(11, 'aaa', 'aaaa', 'aaaa@gmail.com', 'aaaaaaa', 'aaaaaaa', 0, 'aaaaaa', 'aaaaaaaaaaa'),
(12, 'Houssem', 'Rue el Afrah', 'houssem.hannachi@enis.tn', 'Metouia', 'Tunisie', 52215947, 'Houssem Hannachi', 'www.houssem.com');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(88) NOT NULL,
  `password` varchar(88) NOT NULL,
  `name` varchar(88) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `name`) VALUES
(4, 'admin', 'admin', 'Solixy');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`) USING BTREE;

--
-- Index pour la table `invoice_order`
--
ALTER TABLE `invoice_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Index pour la table `invoice_user`
--
ALTER TABLE `invoice_user`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `test2` (`id_client`);

--
-- Index pour la table `propects`
--
ALTER TABLE `propects`
  ADD PRIMARY KEY (`id_prospect`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `invoice_order`
--
ALTER TABLE `invoice_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `invoice_user`
--
ALTER TABLE `invoice_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `propects`
--
ALTER TABLE `propects`
  MODIFY `id_prospect` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `paiements`
--
ALTER TABLE `paiements`
  ADD CONSTRAINT `test2` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
