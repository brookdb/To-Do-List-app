-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

SET time_zone = "+00:00";


-- Database: `todo`
-- --------------------------------------------------------

Table structure for table `tasks`

CREATE TABLE `tasks` (
    `id` int(11) NOT NULL,

	`name` varchar(150) NOT NULL,
 
	`complete` tinyint(1) NOT NULL
) 
	ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `tasks` (`id`, `name`, `complete`) 
	VALUES
(27, 'task1', 0),
		
(28, 'task2', 0),
		
(29, 'task3', 0);


ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);


AUTO_INCREMENT for table `tasks`
--

ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
