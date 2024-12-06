-- Base de données : `competition`


CREATE TABLE `organs` (
  `id` int(11) NOT NULL,
  `organ_name` varchar(100) NOT NULL,
  `relation` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `organs`
--
ALTER TABLE `organs`
  ADD PRIMARY KEY (`id`);
CREATE TABLE `QCM` (
  `id_question` int(11) NOT NULL,
  `question` text NOT NULL,
  `réponses` text NOT NULL,
  `bonne_réponse` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `QCM`
--

INSERT INTO `QCM` (`id_question`, `question`, `réponses`, `bonne_réponse`) VALUES
(1, 'Je reçois un email me demandant mes coordonnées bancaires. Je réponds à l\'email pour les donner ?', 'oui,non', 'non'),
(2, 'Qu\'est-ce quune attaque par phishing ?', 'Un virus informatique,Une forme descroquerie sur Internet,Un logiciel malveillant,Un virus par clé USB', 'Une forme descroquerie sur Internet'),
(3, 'Afin de me souvenir de mon mot de passe, jutilise ...', 'ma date de naissance comme mot de passe,un gestionnaire de mot de passe,azerty,un mot du dictionnaire', 'un gestionnaire de mot de passe'),
(4, 'Quelle est la première chose à faire si vous pensez que votre compte a été piraté ?', 'Ignorer le problème,changer de mot de passe au plus vite,débrancher votre box internet', 'changer de mot de passe au plus vite'),
(5, 'Est-ce qu un VPN (Virtual Private Network) me rend totalement anonyme ?', 'oui car le VPN cache ma véritable IP,non car la société du VPN a toujours accès à mes données de navigation ', 'non car la société du VPN a toujours accès à mes données de navigation'),
(6, 'Pourquoi est-il important de mettre à jour les logiciels ?', 'pour bénificier des nouvelles fonctionnalités,pour bénificier des nouveaux correctifs de sécurité,pour éviter que mon PC explose', 'pour bénificier des nouveaux correctifs de sécurité'),
(7, 'Pourquoi est-il important de ne pas utiliser le même mot de passe pour plusieurs comptes ?', 'pour limiter les risques si lun de nos mots de passe fuite,pour faire travailler sa créativité,pour améliorer sa mémoire', 'pour limiter les risques si l un de nos mots de passe fuite');


--
-- Indexes for dumped tables
--

--
-- Indexes for table `QCM`
--
ALTER TABLE `QCM`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `QCM`
--
ALTER TABLE `QCM`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;


  CREATE TABLE `QCM_Principal` (
  `id_question` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `réponses` text NOT NULL,
  `bonne_réponse` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `QCM_Principal`
--

INSERT INTO `QCM_Principal` (`id_question`, `question`, `réponses`, `bonne_réponse`) VALUES
(1, 'La capacité de l’océan à stocker la chaleur est ...', 'aussi efficace que les continents.,bien plus efficace que les continents.,est moins efficace que les continents.', 'bien plus efficace que les continents.'),
(2, 'Quelle est la part de la surface de l’océan sur la surface de la planète ?', '50 %,70 %,90 %', '70 %'),
(3, 'A quelle profondeur se situe le plus large espace de la planète occupé par la vie sous la surface des mers et océans ?', 'à plus de 80m,à plus de 200m,à plus de 500m', 'à plus de 200m'),
(4, 'Quelle est la profondeur moyenne des oceans ?', '500 mètres,1 000 mètres,3 682 mètres,5 343 mètres', '3 682 mètres'),
(5, 'L océan mondial joue un rôle majeur dans la température terrestre. Quel part du climat de la Terre l océan régule t-il ?', 'plus de 20 %,plus de 50 %,plus de 80 %,plus de 90 %', 'plus de 80 %'),
(6, 'Quel est l océan le plus grand ?', 'Océan Arctique,\r\nOcéan Atlantique,\r\nOcéan Indien,\r\nOcéan Pacifique,\r\nOcéan Austral', 'Océan Pacifique');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `QCM_Principal`
--
ALTER TABLE `QCM_Principal`
  ADD PRIMARY KEY (`id_question`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `QCM_Principal`
--
ALTER TABLE `QCM_Principal`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;