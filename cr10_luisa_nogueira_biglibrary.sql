-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Nov-2018 às 15:57
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr10_luisa_nogueira_biglibrary`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `author`
--

CREATE TABLE `author` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `author`
--

INSERT INTO `author` (`ID`, `name`, `surname`) VALUES
(1, 'Tara', 'Westover'),
(2, 'Stephen', 'King'),
(3, 'Bryan ', 'Gruley'),
(4, 'Arthut Conan', 'Doyle'),
(5, 'Burton', 'Malkiel'),
(6, 'Christopher', 'Bollen'),
(7, 'Helen', 'Castor'),
(8, 'Andre', 'Aciman'),
(9, 'John', 'Grisham'),
(16, 'Wes', 'Craven'),
(17, 'Antony', 'Jay Jonathan Lynn'),
(18, 'Norman', 'Taurog'),
(19, 'The', 'Beatles'),
(20, 'Freddy', 'Mercury'),
(21, 'Michael', 'Fogus'),
(22, 'Mark', 'Bittman'),
(25, 'Lea', 'Verou'),
(30, 'Tara', 'Westover'),
(32, 'Stephen', 'King'),
(34, 'Bryan', 'Gruley');

-- --------------------------------------------------------

--
-- Estrutura da tabela `media`
--

CREATE TABLE `media` (
  `ID` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `media`
--

INSERT INTO `media` (`ID`, `title`, `image`) VALUES
(31, 'Sherlock Holmes: The Complete Novels and Stories', 'https://images-na.ssl-images-amazon.com/images/I/5'),
(32, 'A Random Walk Down Wall Street', 'https://images-na.ssl-images-amazon.com/images/I/5'),
(33, 'Orient', 'https://kbimages1-a.akamaihd.net/5e7f1ef6-edaf-4af'),
(54, 'A Nightmare on Elm Street', 'https://images-na.ssl-images-amazon.com/images/I/9'),
(55, 'Yes, Minister: The Complete Collection', 'https://images-na.ssl-images-amazon.com/images/I/9'),
(56, 'Live a Little, Love a Little', 'https://images-na.ssl-images-amazon.com/images/I/5'),
(57, 'The Beatles The White Album', 'https://images-na.ssl-images-amazon.com/images/I/8'),
(58, 'The Platinum Collection: Greatest Hits I, II & III', 'https://images-na.ssl-images-amazon.com/images/I/7'),
(59, 'The Joy of Clojure', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD'),
(60, 'How to Cook Everything', 'http://media.oregonlive.com/foodday_impact/photo/h'),
(63, 'CSS Secrets - better solutions to everyday web des', 'https://images-na.ssl-images-amazon.com/images/I/5'),
(68, 'Educated: A Memoir', 'https://images-na.ssl-images-amazon.com/images/I/4'),
(70, 'Elevation', 'https://d28hgpri8am2if.cloudfront.net/book_images/'),
(72, 'Bleak Harbor: A Novel', 'https://images-na.ssl-images-amazon.com/images/I/5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `media_info`
--

CREATE TABLE `media_info` (
  `ID` int(11) NOT NULL,
  `ISBN` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `publish_date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `author_ID` int(11) NOT NULL,
  `publisher_ID` int(11) NOT NULL,
  `media_ID` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `media_info`
--

INSERT INTO `media_info` (`ID`, `ISBN`, `description`, `publish_date`, `type`, `author_ID`, `publisher_ID`, `media_ID`, `status`) VALUES
(10, 0, 'Movie about Freddy Krueger', '2010-04-13', 'DVD', 16, 18, 54, 'available'),
(11, 0, 'Political satire about Minister of Administrative Affairs', '2005-09-27', 'DVD', 17, 19, 55, 'available'),
(12, 0, 'Movie with Elvis Presley where the character works as photographer while pursued by a beautiful woma', '2007-08-07', 'DVD', 18, 20, 56, 'reserved'),
(13, 0, 'Includes 6 CDs', '1968-11-22', 'CD', 19, 21, 57, 'reserved'),
(14, 0, 'A very complete collection of Queen hits', '2000-11-13', '', 20, 22, 58, 'available'),
(15, 2220, 'A collection of Sherlock Holmes novels.', '2003-09-00', 'book', 4, 11, 31, 'available'),
(16, 3330, 'A novel where a stranger comes to a town where mysterious murders happen.', '2015-00-00', 'book', 6, 14, 33, 'reserved'),
(17, 4440, 'Book about investing in finance markets.', '2016-00-00', 'book', 5, 12, 32, ''),
(18, 9781, 'Useful information about functional programming and other aspects about Clojure language.', '2014-00-00', 'book', 21, 23, 59, 'reserved'),
(19, 23495, 'A cooking manual with many practical recipes step-by-step and pictures.', '2012-00-00', 'book', 22, 24, 60, 'available'),
(22, 23495, 'Great tips for better CSS and solutions to solve common web design problems.', '2015-00-00', 'book', 25, 25, 63, 'available'),
(27, 9780, 'A woman who was kept out of school fights to get a PhD at Cambridge University.', '2018-02-20', 'book', 30, 30, 68, 'available'),
(29, 9781, 'The main character has a mysterious disease and struggles to fight it.', '2018-10-30', 'book', 32, 32, 70, 'reserved'),
(31, 1234, 'A family hides a lot of secrets while their son disappears and they start receiving disturbing messa', '2018-11-01', 'book', 34, 34, 72, 'reserved');

-- --------------------------------------------------------

--
-- Estrutura da tabela `publisher`
--

CREATE TABLE `publisher` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `publisher`
--

INSERT INTO `publisher` (`ID`, `name`, `address`, `size`) VALUES
(1, 'Penguin Random House', '1745 Broadway New York, NY 10019', 'big'),
(2, 'Simon & Schuster', '1230 6th Ave, New York, NY 10020', 'medium'),
(10, 'Thomas & Mercer', 'Amazon Publishing House - Seattle', 'medium'),
(11, 'Bantam Dell', 'Division of Random House - New York', 'small'),
(12, 'W. W. Norton & Company', '500 Fifth Avenue, New York, NY 10110', 'medium'),
(13, 'Simon & Schuster', 'Ltd 1st Floor 222 Gray\'s Inn Road London', 'big'),
(14, 'Harper Collins', '195 Broadway New York, NY 10007', 'small'),
(15, 'Farrar, Straus e Giroux', '175 Varick Street, 9th Floor, New York, NY 10014', 'small'),
(16, 'Doubleday', 'Division of Pengiun Random House LLC, New York', 'small'),
(18, '-', '-', '-'),
(19, 'Antony Jay Jonathan Lynn', '-', '-'),
(20, '-', '-', '-'),
(21, '-', '-', '-'),
(22, 'Queen', '-', '-'),
(23, 'Manning Publications', '20 Baldwin Road PO Box 261 Shelter Island, NY 1196', 'medium'),
(24, 'John Wiley & Sons', '111 River Street, Hoboken, New Jersey 07030', 'medium'),
(25, 'O Reilly Media Inc', '1005 Gravenstein Highway North, Sebastopol, CA 954', 'small'),
(30, 'Random House', 'division of Penguin Random House - New York', 'medium'),
(32, 'Simon & Schuster', '1230 Avenue of the Americas, 10th F, New York', 'medium'),
(34, 'Thomas & Mercer', 'Amazon Publishing', 'medium');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `media_info`
--
ALTER TABLE `media_info`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `media_ID4` (`media_ID`),
  ADD KEY `media_info_author` (`author_ID`),
  ADD KEY `media_info_pub` (`publisher_ID`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `media_info`
--
ALTER TABLE `media_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `media_info`
--
ALTER TABLE `media_info`
  ADD CONSTRAINT `media_ID4` FOREIGN KEY (`media_ID`) REFERENCES `media` (`ID`),
  ADD CONSTRAINT `media_info_author` FOREIGN KEY (`author_ID`) REFERENCES `author` (`ID`),
  ADD CONSTRAINT `media_info_pub` FOREIGN KEY (`publisher_ID`) REFERENCES `publisher` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
