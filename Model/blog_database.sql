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
  `date` datetime NOT NULL,
  `user_id` int(25) NOT NULL COMMENT 'FOREIGN KEY',
  `post_id` int(25) NOT NULL COMMENT 'FOREIGN KEY'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(25) NOT NULL,
  `post_title` varchar(50) DEFAULT NULL,
  `post_content` varchar(500) DEFAULT NULL,
  `date` datetime NOT NULL,
  `user_id` varchar(100) NOT NULL COMMENT 'FOREIGN KEY',
  `tags` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_content`, `date`, `user_id`, `tags`) VALUES
(1, 'Test', 'Testing', '2017-04-08 19:44:27', '', 0),
(2, 'Test', 'Testing', '2017-04-08 19:44:58', '', 0),
(3, 'Linda', 'Test post with session', '2017-04-08 20:24:27', '4', 0),
(4, 'New Post', 'Another Post by Linda for Testing.', '2017-04-08 22:19:46', '4', 0);

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
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'leriksson', 'Linda', 'Eriksson', 'linda.nibelheim@gmail.com', 'testing'),
(2, 'Win', 'Winnie', 'The Pooh', 'winnie@sherwood.com', '$2y$10$2uSEMLbilVbsw'),
(3, 'Tigg', 'Tigger', 'McTiggface', 'tigger@sherwood.com', '$2y$10$GktostWGZ8R3VPjfzmZpuOp.OpwfJF/cS.RQ3bEcnr0nlbo7mZWMK'),
(4, 'linda', 'Linda', 'E', 'linda@mail.com', '$2y$10$2aNyIXKZJSgjvN3GEEc6TO0AnweslZsWH3ygnZp9V6SV1z5pIaPve');

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
  MODIFY `post_id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key', AUTO_INCREMENT=5;
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
