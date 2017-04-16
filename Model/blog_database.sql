--
-- Database: `blog_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(25) NOT NULL,
  `comment_content` varchar(300) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(25) NOT NULL COMMENT 'FOREIGN KEY',
  `post_id` int(25) NOT NULL COMMENT 'FOREIGN KEY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(25) NOT NULL,
  `post_title` varchar(150) DEFAULT NULL,
  `post_content` varchar(5000) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_slug` varchar(225) NOT NULL,
  `user_id` varchar(100) NOT NULL COMMENT 'FOREIGN KEY',
  `tags` int(25) NOT NULL,
  `image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `date`, `post_slug`, `user_id`, `tags`, `image`) VALUES
(1, 'Test', 'Testing', '2017-04-08 18:44:27', 'test', '', 0, NULL),
(2, 'Test', 'Testing', '2017-04-08 18:44:58', 'test2', '', 0, NULL),
(4, 'New update', 'Test post with session', '2017-04-14 22:00:26', 'new-post', '4', 0, NULL),
(5, 'test', 'testttfyfx,aulchlhbik', '2017-04-09 15:20:57', 'test-3', '5', 0, NULL),
(6, 'Techo 4 life', 'Untz untz untz', '2017-04-12 21:21:20', '', '4', 0, NULL),
(7, 'Yo', 'BFace checking in', '2017-04-12 21:59:14', '', '6', 0, NULL),
(11, 'Happy Easter', 'Find some eggs.', '2017-04-15 00:01:42', '', '4', 0, NULL),
(17, 'With picture', 'With picture', '2017-04-15 21:42:26', '', '4', 0, NULL),
(29, 'This is a Monkey', 'Monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey  monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey monkey', '2017-04-15 23:39:57', '', '4', 0, '14922995971825058f2af4decc9e.jpg'),
(30, 'Tigger''s first post', 'Whohohoooo', '2017-04-16 02:43:04', '', '3', 0, NULL),
(31, 'Tigger''s second post', 'Lalallala', '2017-04-16 02:45:54', '', '3', 0, ''),
(32, 'Tigger''s picture', 'This is me.', '2017-04-16 02:46:34', '', '3', 0, '14923107941060658f2db0ac9959.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL COMMENT 'Primary key',
  `user_name` varchar(45) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `bio` varchar(500) DEFAULT NULL,
  `admin` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `password`, `bio`, `admin`) VALUES
(3, 'Tigg', 'Tigger', 'McTiggface', 'tigger@sherwood.com', '$2y$10$GktostWGZ8R3VPjfzmZpuOp.OpwfJF/cS.RQ3bEcnr0nlbo7mZWMK', NULL, NULL),
(4, 'linda', 'Linda', 'E', 'linda@mail.com', '$2y$10$2aNyIXKZJSgjvN3GEEc6TO0AnweslZsWH3ygnZp9V6SV1z5pIaPve', 'Linda''s biography text', 2),
(5, 'lejohnson', 'Lee', 'Johnson', 'lejohnson@tom.com', '$2y$10$aL1M6oBbEhXeB9XPSEOeRuV.1W31tAu6nV0.RoMWvzZna9kZ4HPpW', NULL, NULL),
(6, 'BFace', 'Boaty', 'McBoatface', 'boat@boatface.com', '$2y$10$aZ9fxhoOMNj9CtuGlte5JeECfByZP3Pj12beZWB4RoMJY14401bP.', NULL, NULL),
(7, 'Admin', 'Admin', 'Account', 'admin@getintotechno.com', '$2y$10$ElSMtcEmRQXAuVrHyEglP.nVa9LjCkdeJd0goWZw7.w/f5QKvhBxW', NULL, 3),
(8, 'Monster', 'Monster', 'Monsterface', 'mon@mail.com', '$2y$10$e0.TdLCom58EwwA4PgHgeuaQ9WItcbUZRToUQ4Q1RWGbxV343kPrW', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(25) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`post_id`) REFERENCES `posts` (`post_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
