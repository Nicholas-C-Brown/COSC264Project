-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 04, 2019 at 11:19 AM
-- Server version: 5.7.25-0ubuntu0.16.04.2
-- PHP Version: 7.0.33-0ubuntu0.16.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `roastgen`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `subscribed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `age`, `subscribed`) VALUES
(1, 'Nick', '*D37C49F9CBEFBF8B6F4B165AC703AA271E079004', 'brown.nicholas360@gmail.com', 19, 1),
(2, 'Keeglesberg', '*A4B6157319038724E3560894F7F932C8886EBFCF', 'rennie.wright@alumni.ubc.ca', 93, 0),
(3, 'SirLaddie', '*2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', 'cardiacexorcist@gmail.com', 7, 0),
(4, 'jdoe', '*D37C49F9CBEFBF8B6F4B165AC703AA271E079004', 'sneakylunatic69@gmail.com', 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roastees`
--

CREATE TABLE `roastees` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `roast_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roastees`
--

INSERT INTO `roastees` (`id`, `name`, `roast_type_id`) VALUES
(1, 'Parker', 2),
(2, 'Ryan', 1),
(3, 'Keegan', 1),
(4, 'Kyle', 3),
(5, 'Andrew', 5),
(6, 'Nick', 4),
(9, 'Ross', 5),
(10, 'Alec', 6),
(11, 'Eric', 6),
(12, 'Josh', 3),
(13, 'Hana', 2),
(14, 'Wyatt', 1),
(15, 'Nicole', 5),
(16, 'Nate', 6),
(17, 'Nathan', 4),
(18, 'Jordan', 5),
(19, 'Cassie', 7),
(20, 'Cody', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roasts`
--

CREATE TABLE `roasts` (
  `id` int(11) NOT NULL,
  `roast` text NOT NULL,
  `roast_type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roasts`
--

INSERT INTO `roasts` (`id`, `roast`, `roast_type_id`) VALUES
(1, '$ is so fat, that when they fell, no one was laughing but the ground was cracking up.', 1),
(2, '$ is so ugly when they tried to join an ugly contest they said, "Sorry, no professionals."', 6),
(3, '$ is so fat when they sat on WalMart, they lowered the prices.', 1),
(4, '$ is so fat their bellybutton gets home 15 minutes before they do.', 1),
(5, '$ is so fat they don\'t need the internet, because they\'re already world wide!', 1),
(6, '$ is so short, you can see their feet on their driver\'s license.', 2),
(7, '$ is so short, they need a ladder to pick up a dime.', 2),
(8, '$ is so short they can tie their shoes while standing up.', 2),
(9, '$ is so skinny, that they have to run around in the shower to get wet.', 5),
(10, '$ is so scrawny they makes skinny jeans look fat.', 5),
(11, '$ is so skinny, they could hula hoop with a Cheerio!', 5),
(12, '$ is so stupid, they ate a TV dinner and choked on the antenna.', 4),
(13, '$ is so stupid, they got locked in a grocery store and starved to death.', 4),
(14, '$ is so stupid, they studied for their blood test.', 4),
(15, '$ is so tall they tripped on a rock and hit the moon.', 3),
(16, '$ is so tall that when I told them to take one step back they went to the other side of the world.', 3),
(17, '$ is so tall, you can swim as far as you want in the river for you will be at their hand when in danger.', 3),
(18, '$ is almost as short as Parker.', 2),
(19, '$ is so stupid that they climbed over a glass wall to see what was on the other side', 4),
(20, '$ is so fat, they got baptised at Sea World', 1),
(21, '$ is so old, they make a raisin look tight.', 7);

-- --------------------------------------------------------

--
-- Table structure for table `roast_types`
--

CREATE TABLE `roast_types` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roast_types`
--

INSERT INTO `roast_types` (`id`, `type`) VALUES
(1, 'fat'),
(2, 'short'),
(3, 'tall'),
(4, 'stupid'),
(5, 'skinny'),
(6, 'ugly'),
(7, 'old');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `roastees`
--
ALTER TABLE `roastees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `roasts`
--
ALTER TABLE `roasts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roast_types`
--
ALTER TABLE `roast_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `roastees`
--
ALTER TABLE `roastees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `roasts`
--
ALTER TABLE `roasts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `roast_types`
--
ALTER TABLE `roast_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
