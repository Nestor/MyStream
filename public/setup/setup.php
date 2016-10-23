<?php
include("../../core/init.php");
$setup_tables = $conn->prepare('
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` longtext,
  `thumb` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `series` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` longtext,
  `description` longtext,
  `views` int(11) DEFAULT NULL,
  `category` longtext,
  `thumb` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `show` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` longtext,
  `description` longtext,
  `views` int(11) DEFAULT NULL,
  `category` longtext,
  `series` longtext,
  `thumb_url` longtext,
  `file_link` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` longtext,
  `password` longtext,
  `email` longtext,
  `rank` int(11) DEFAULT NULL,
  `verified` int(11) DEFAULT NULL,
  `emailauthverify` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `show`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
ALTER TABLE `series`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
ALTER TABLE `show`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;');
$setup_tables->execute();

echo "Finished! <br>";
echo "<button><a href='register_admin.php'>Continue</a></button>";

?>