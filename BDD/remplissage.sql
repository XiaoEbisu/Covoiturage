--
-- Déchargement des données de la table `trajet`
--

INSERT INTO `trajet` (`Id_Trajet`, `IdU`, `vd`, `va`, `date`, `heure`, `adr_DP`, `adr_RV`, `type_voiture`, `place`, `prix`) VALUES
(6, 2, 'Montpellier', 'Paris', '2017-12-15', '23:00:00', 'Louvre', 'Comedi', 'BMV', 3, 30),
(10, 13, 'Montpellier', 'Toulouse', '2018-03-15', '13:00:00', 'Capitole', 'Comédi', 'Mistubishi', 3, 30),
(11, 15, 'Avignon', 'Béziers', '2018-06-14', '09:00:00', 'B', 'A', 'Ferraris', 1, 90),
(12, 13, 'Béziers', 'Paris', '2018-02-12', '21:00:00', 'b', 'a', '', 1, 50),
(13, 20, 'Paris', 'Rennes', '2018-02-20', '21:00:00', 'Rennes', 'Champs-Élysées, Paris', '', 1, 65);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`IdU`, `nom`, `prenom`, `adresse`, `age`, `mail`, `isAdmin`, `mdp`, `avis`, `cle`, `image`, `active`) VALUES
(1, 'Tran', 'My', 'Montpellier', 16, 'tranmy@gmail.com', 1, '123456', 0, '', '', 0),
(2, 'Nguyen', 'Khang', 'Toulouse', 50, 'nguyenkhang@gmail.com', 0, '123456', 0, '', '', 0),
(6, 'thao', 'abc', '13 rue Franceze de Cezelli', 21, 'abc@yopmail.com', 0, '123456', 0, 'KwrUH', 'abc.jpg', 0),
(12, 'Nguyen', 'Thao', 'montpellier', 18, 'xyz@gmail.com', 0, '123456', 0, 'RTVos', 'hihi', 0),
(13, 'Tran', 'Sep', '9 Rue d\'Alger, Montpellier', 23, 'boss@gmail.com', 0, '123456', 0, 'amAv9', '', 0),
(14, 'Nguyen', 'Mimi', '4 Franceze de Cezelli Montpellier', 18, 'mimi@gmail.com', 0, '123456', 0, 'h5HLP', '', 0),
(15, 'Tran ', 'Java', 'Place d\'Italie Paris ', 30, 'java@gmail.com', 0, '123456', 0, 'u8Q2d', '', 0),
(16, 'Tran ', 'Eclipse', 'Place d\'Italie Paris ', 20, 'eclipse@gmail.com', 0, '123456', 0, 'vW4lf', '', 0),
(17, 'Ebisu', 'Xiao', '1 Rue Charancy, Montpellier', 20, 'XiaoEbisu@gmail.com', 0, '123456', 0, '8Lmek', '', 0),
(18, 'Ebisu', 'Mizuki', '2 Rue Charancy, Montpellier', 22, 'EbisuMizuki@gmail.com', 0, '123456', 0, 'i5rUK', '', 0),
(19, 'Sup ', 'Janna', 'Odysseum, Montpellier', 24, 'janna@gmail.com', 0, '123456', 0, '3YUyL', '', 0),
(20, 'Ad carry', 'Varus', '1 Champs-Élysées, Paris', 30, 'varus@lol.com', 0, '123456', 0, 'azC8t', '', 0),
(21, 'Justice', 'Garen', 'Avignon', 35, 'garen@lol.com', 0, '123456', 0, 'TR9Nt', '', 0);

-- --------------------------------------------------------

--
-- Déchargement des données de la table `voiture`
--

INSERT INTO `voiture` (`IdV`, `IdU`, `type`, `place`) VALUES
('29A-49822', 13, 'Honda', 4),
('29A-7334', 13, 'Mitsubishi', 4),
('29D-11834', 13, 'Kiaa', 2),
('AB-9876', 15, 'Ferraris', 2),
('KDA-20 2 1', 20, 'Ferraris ', 2);
