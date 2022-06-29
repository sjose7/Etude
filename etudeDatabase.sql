-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE IF NOT EXISTS `carts` (
  `id` int(10) unsigned NOT NULL,
  `user_session_id` char(32) NOT NULL,
  `product_type` int(10) NOT NULL,
  `product_id` mediumint(8) unsigned NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `score_categories`
--

CREATE TABLE IF NOT EXISTS `score_categories` (
  `id` smallint(5) unsigned NOT NULL,
  `category` varchar(45) NOT NULL,
  `description` tinytext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score_categories`
--

INSERT INTO `score_categories` (`id`, `category`, `description`) VALUES
(1, 'Piano', 'Sheet music arranged for the piano.'),
(2, 'Orchestra', 'Scores for String Ensembles.');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id` int(10) unsigned NOT NULL,
  `score_categories_id` smallint(5) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `composer` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL DEFAULT 'cover.png'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `score_categories_id`, `title`, `composer`, `image`) VALUES
(1, 1, 'Claire De Lune', 'Claude Debussy', 'pianocover.png'),
(2, 1, 'Doctor Gradus Ad Parnessum', 'Claude Debussy', 'pianocover.png'),
(3, 1, 'Reverie', 'Claude Debussy', 'pianocover.png'),
(4, 1, 'Arabesque No. 1', 'Claude Debussy', 'pianocover.png'),
(5, 2, 'Apotheosis (Violin 1)', 'Austin Wintory', 'orchestracover.png'),
(6, 2, 'Apotheosis (Violin 2)', 'Austin Wintory', 'orchestracover.png'),
(7, 2, 'Apotheosis (Cello)', 'Austin Wintory', 'orchestracover.png'),
(8, 2, 'Apotheosis (Viola)', 'Austin Wintory', 'orchestracover.png'),
(9, 2, 'Apotheosis (Bass)', 'Austin Wintory', 'orchestracover.png'),
(10, 2, 'Apotheosis (Ensemble)', 'Austin Wintory', 'orchestracover.png'),
(11, 2, 'Symphony No. 29', 'W. A. Mozart', 'orchestracover.png'),
(12, 2, 'Symphony No. 25', 'W. A. Mozart', 'orchestracover.png'),
(13, 1, 'M54', 'Curtis Schweitzer', 'pianocover.png'),
(14, 2, 'Piano Concerto No. 2 (Ensemble)', 'Sergei Rachmaninoff', 'orchestracover.png'),
(15, 1, 'Piano Concerto No. 2 (Piano)', 'Sergei Rachmaninoff', 'pianocover.png'),
(16, 2, 'Warsaw Concerto (Ensemble)', 'Richard Addinsell', 'orchestracover.png'),
(17, 1, 'Warsaw Concerto (Piano)', 'Richard Addinsell', 'pianocover.png'),
(18, 2, 'Resurgence', 'Cameron Munoz', 'orchestracover.png'),
(19, 2, 'Slipping Past Time''s Grasp', 'Cameron Munoz', 'orchestracover.png'),
(20, 2, 'Far Away Thoughts', 'Cameron Munoz (Arr. Stephen Jose)', 'orchestracover.png'),
(21, 2, 'Your Contract Has Expired', 'Pascal Michael Stiefel (arr. Cameron Munoz)', 'orchestracover.png'),
(22, 2, 'Golliwog''s Cakewalk', 'Claude Debussy', 'orchestracover.png');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE IF NOT EXISTS `tutorials` (
  `id` int(10) unsigned NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` tinytext NOT NULL,
  `content` longtext,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `image` varchar(50) NOT NULL DEFAULT 'tutorialpreview.png'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `description`, `content`, `date_created`, `image`) VALUES
(1, 'Claire De Lune', 'A tutorial for "Claire de Lune" by Claude Debussy', NULL, '2018-05-02 03:28:16', 'tutorialpreview.png'),
(2, 'Doctor Gradus Ad Parnassum', 'A tutorial for "Doctor Gradus Ad Parnassum" by Claude Debussy', NULL, '2018-05-02 03:28:47', 'tutorialpreview.png'),
(3, 'Reverie', 'A tutorial for "Reverie" by Claude Debussy', NULL, '2018-05-02 03:29:00', 'tutorialpreview.png'),
(4, 'Arabesque No. 1', 'A tutorial for "Arabesque No. 1" by Claude Debussy', NULL, '2018-05-02 03:29:13', 'tutorialpreview.png'),
(5, 'Golliwog''s Cakewalk', 'A tutorial for "Golliwog''s Cakewalk" by Claude Debussy, arranged for piano by Stephen Jose', NULL, '2018-05-02 03:29:28', 'tutorialpreview.png'),
(6, 'M54', 'A tutorial for "M54" from the soundtrack of <i>Starbound</i> by 	\r\nCurtis Schweitzer', NULL, '2018-05-02 03:31:22', 'tutorialpreview.png'),
(7, 'Rachmaninoff Piano Concerto No. 2', 'Piano Tutorial', NULL, '2018-05-02 03:31:54', 'tutorialpreview.png'),
(8, 'Warsaw Piano Concerto', 'A tutorial for the "Warsaw Piano Concerto"', NULL, '2018-05-02 03:32:25', 'tutorialpreview.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(45) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `date_created`) VALUES
(3, 'smjose', '$2y$10$cagGEhux7Ih3kx6szGnSPuENBjF2k4lr.jCyFrXuQNTF1DBjLgEea', '2018-05-01 22:30:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score_categories`
--
ALTER TABLE `score_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_UNIQUE` (`category`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `login` (`username`,`pass`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `score_categories`
--
ALTER TABLE `score_categories`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
