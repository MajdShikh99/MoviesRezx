SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `genre_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `genre_slug` varchar(150) COLLATE utf8_unicode_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `movies` (
  `movie_id` int(11) NOT NULL,
  `movie_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `movie_description` text COLLATE utf8_unicode_ci NOT NULL,
  `movie_year` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `movie_duration` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `movie_genree` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `movie_trailer` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `movie_link` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `movie_slug` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `movie_stars` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `movie_status` int(11) NOT NULL,
  `movie_featured` int(11) NOT NULL,
  `movie_date` datetime NOT NULL DEFAULT current_timestamp(),
  `movie_image` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `movies_reviews` (
  `id` int(11) NOT NULL,
  `item` int(11) NOT NULL,
  `user` varchar(255) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `rating` int(11) NOT NULL,
  `published` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `movies_genres` (
  `genre_id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE `settings` (
  `st_sitename` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `st_keywords` text COLLATE utf8_unicode_ci NOT NULL,
  `projectname` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook_personal` text COLLATE utf8_unicode_ci NOT NULL,
  `author` text COLLATE utf8_unicode_ci NOT NULL,
  `st_description` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `settings` (`st_sitename`, `st_keywords`, `projectname`, `facebook_personal`, `author`, `st_description`) VALUES
('RezxMovies - Online Cinema, Watch Movies For Free!', 'movies,watch movies,rezx,rezxmovies,free movies,netflix,egybest,fasharr,shahid,im here', 'REZX', 'https://www.facebook.com/alshikh.majd', 'M0ajod', 'Good Place to watch movies for free!');

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_role` tinyint(1) NOT NULL DEFAULT 2,
  `user_status` tinyint(1) NOT NULL DEFAULT 1,
  `user_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`, `user_role`, `user_status`, `user_updated`, `user_created`) VALUES
(1, 'Admin', 'admin@admin.com', 'ba3253876aed6bc22d4a6ff53d8406c6ad864195ed144ab5c87621b6c233b548baeae6956df346ec8c17f5ea10f35ee3cbc514797ed7ddd3145464e2a0bab413', 1, 1, '2020-06-16 14:01:03', '2020-04-14 20:33:33');

ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`);

ALTER TABLE `movies`
  ADD PRIMARY KEY (`movie_id`);

ALTER TABLE `movies_reviews`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `movies`
  MODIFY `movie_id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

ALTER TABLE `movies_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

