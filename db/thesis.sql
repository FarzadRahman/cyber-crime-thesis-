-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 09:12 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactId` int(11) NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `body` mediumtext,
  `personEmail` varchar(45) DEFAULT NULL,
  `personNumber` varchar(25) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactId`, `title`, `body`, `personEmail`, `personNumber`, `created_at`) VALUES
(1, 'Please Help ', 'Its So urgent Somebody is blackmailling me', 'victim@gmail.com', '01718000000', '2018-06-06 04:59:44'),
(2, 'Hi I\'m a victim', 'My Facebook id is hacked . Hacker is asking for money', 'demovictim@yahoo.com', '01816000000', '2018-06-06 05:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` mediumtext NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postId`, `title`, `details`, `userId`, `created_at`) VALUES
(1, 'ICT ACT 354', '<p>Act 354-With an intention of ruining a woman\'s decency,harming or frightening her will lead to a penalty of 2<br />years in custody.(Spreading rumours about a woman\'s decency has been ruined.-7 years)</p>', 1, '2018-04-25 14:39:54'),
(2, 'Law 2006 57(2)', '<p>According to the act as information and communication technology 2006 57(2) posting something false,inappropriate<br />defamatory on a website or Electronic Form will lead to a penalty upto 14 years in jail,minumum of 7 years along<br />with a fine of 1 crore tk.</p>', 1, '2018-04-28 05:09:33'),
(3, 'Act 506', '<p>Act 506-Exhibition of criminal terrorism will lead to 2 years of penalty.</p>', 1, '2018-06-09 14:54:41'),
(4, 'Law 2012 8(2)', '<p>Act of Pornography Control Law 2012 8(2),If a person harms someone\'s social and personal respect,claims<br />money by frighting,physchologicaly tortures through pornoghrapy,the respective person will be penalised 5 years<br />in custody along with a fine of 2 lakh tk.</p>', 1, '2018-06-09 14:55:07'),
(5, 'Act 507', '<p>Act 507 the penalty of blackmailing via anonymous messaging will be penalised 2 years in custody</p>', 1, '2018-06-09 15:24:31'),
(6, 'Facebook Recovery', '<p>You can recover by following this steps :</p>\r\n<p>1. forgotten account from Facebok index page .</p>\r\n<p>2.Insert email or phone number -&gt; search .</p>\r\n<p>3.If the you receive recovey code . You have successfully recovered your account.</p>\r\n<p>4. If you dont receive code. -&gt;no longer hace access to these.</p>\r\n<p>5. Then insert image of your National Id and additional information.If everything ok after few days facebook will mail you the authentication link of your account</p>', 1, '2018-06-10 19:05:58'),
(7, 'Secure Facebook account', '<p>1. Use Two Step varification for login <a title=\"two step\" href=\"https://www.wikihow.com/Activate-2-Step-Verification-in-Facebook\" target=\"_blank\" rel=\"noopener\">link</a></p>\r\n<p>2. Use Trusted Contacts <a title=\"trusted contact\" href=\"https://www.facebook.com/help/119897751441086\" target=\"_blank\" rel=\"noopener\">link</a></p>', 1, '2018-06-10 19:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `userType` varchar(20) NOT NULL,
  `remember_token` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `userType`, `remember_token`, `created_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$iZulWAQ1e/CVhqnnajUZS.GeoNAk2cb6UioJ0f9d1mTchtItfcYaW', 'admin', 'ptXmB3Re3yNIuHSYQEpUwg3Lj0uKxXwdKWkUCa8z12OoB691uLz2s6LMWCfj', '2018-04-22 16:56:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
