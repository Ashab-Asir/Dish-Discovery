-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 05:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dish_discovery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `adminid` varchar(30) NOT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`adminid`, `pass`) VALUES
('a-1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `chef_table`
--

CREATE TABLE `chef_table` (
  `chefid` varchar(30) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobileno` varchar(30) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `cuisinetype` varchar(40) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chef_table`
--

INSERT INTO `chef_table` (`chefid`, `fname`, `lname`, `email`, `mobileno`, `pic`, `cuisinetype`, `gender`, `pass`) VALUES
('c-1', 'Safayete', 'Nava', 'nava@gmail.com', '01877544736', 'cff5ce606202e55c1abf58f77d56d290.jpg', 'Bangaldeshi', 'Female', '2'),
('c-2', 'Tanzim', 'Dia', 'dia@gmail.com', '+8801811863362', 'e0a58169db018028525f44975d603be2.jpg', 'Bangaldeshi', 'Female', '2'),
('c-3', 'Tazmin', 'Nishi', 'nishi@gmail.com', '019821221', 'ebf7670a8b0e6a6dfda7403332cfd418.jpg', 'Chinese', 'Female', '3');

-- --------------------------------------------------------

--
-- Table structure for table `recipe_table`
--

CREATE TABLE `recipe_table` (
  `recipeid` varchar(30) NOT NULL,
  `chefid` varchar(30) DEFAULT NULL,
  `recipename` varchar(100) DEFAULT NULL,
  `preparationtime` varchar(50) DEFAULT NULL,
  `postdate` date DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  `cuisinetype` varchar(40) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `ingredients` longtext DEFAULT NULL,
  `steps` longtext DEFAULT NULL,
  `status` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe_table`
--

INSERT INTO `recipe_table` (`recipeid`, `chefid`, `recipename`, `preparationtime`, `postdate`, `pic`, `cuisinetype`, `description`, `ingredients`, `steps`, `status`) VALUES
('r1', 'c-1', 'Caprese Pasta', '50min', '2023-08-30', '9f7381fdcad03d8c7a0f008ad7f9f199.webp', 'Indian', 'A fast and simple recipe that works as a meal or a side, its equally good warm or at room temp.', '1=>2 tablespoons, plus 1 1/2 teaspoons kosher salt, divided\r\n2=>16 ounces farfalle (bow-tie) pasta\r\n3=>1/2 cup extra-virgin olive oil\r\n4=>4 cups cherry tomatoes (about 20 ounces)\r\n5=>1/2 teaspoon black pepper, plus more for serving\r\n6=>3 tablespoons red wine vinegar\r\n7=>1 (8-ounce) container fresh mozzarella cheese pearls in water, drained\r\n8=>1 cup fresh basil leaves, roughly torn', '1.Cook the pasta:\r\nBring 4 quarts of water and 2 tablespoons of the salt to a boil in a large saucepan over medium-high. Stir in the farfalle and cook according to package directions until al dente, about 10 minutes. Drain and transfer to a large bowl.\r\n 2.Cook the tomatoes:\r\nWhile pasta cooks, heat the oil in a large nonstick skillet over medium. Add the tomatoes, pepper, and remaining 1 1/2 teaspoons salt; cook, stirring often, until the tomatoes begin to burst, about 3 minutes. Stir in the vinegar. Cook, stirring often, until the sauce thickens slightly and the tomatoes begin to break down, about 6 minutes.\r\n 3.Assemble the pasta salad: \r\nStir the tomato mixture into the bowl with pasta and toss to coat. Stir in mozzarella pearls and basil. Top with additional black pepper, if desired.\r\nYou can refrigerate the pasta salad for up to 3 days. For the best flavor, let it sit at room temperature before serving.', 1),
('r2', 'c-1', 'Brownies ', '35min', '2023-04-17', 'cd3c468400e4349b7093e6b28c0c2282.webp', 'Bangladeshi', 'With beautiful swirls on top, kids and adults alike wiil not be able to resist.', '3/4 cup (170g) unsalted butter \r\n6 ounces semi-sweet chocolate, chopped, or semisweet chocolate chips\r\n1=>3 large eggs\r\n 2=>2/3 cup (133g) granulated sugar\r\n 3=>3/4 cup (160g) packed light brown sugar\r\n 4=>1 1/4 cups (150g) all-purpose flour\r\n 5=>2 tablespoons Dutch-processed cocoa powder\r\n 6=>Pinch salt\r\n 7=>1/3 cup creamy peanut butter\r\n 8=>1/3 cup marshmallow fluff', '1.Preheat the oven to 350°F.\r\nSpray an 8x8-inch square pan with baking spray and line with parchment paper.\r\n\r\n 2.Melt the butter and chocolate:\r\nIn a small microwave-safe bowl, add the butter and chocolate and heat it in the microwave for 20-second intervals, stirring each time, just until melted and smooth. Set aside to cool a bit.\r\n\r\n 3.Beat the eggs and sugar:\r\nIn a mixing bowl, add the eggs, granulated sugar, and brown sugar and beat with a whisk until pale and fluffy, about 4 minutes. Alternatively, you can use an electric beater and meat on medium speed for about 2 minutes. ', 1),
('r3', 'c-2', 'Chocolate Roll Cake', '60min', '2023-09-13', 'bf751ace90839f3299c9f4e54d4f78c5.webp', 'Chinese', 'This chocolate sponge cake is filled with whipped cream and coated in a thin layer of ganache to create the perfect chocolate swiss roll. All of your childhood dreams definitely just came true.', '3/4 cup (100g) cake flour\r\n1=>1/2 cup (56g) cocoa powder\r\n 2=>3 1/2 tablespoons (26g) cornstarch\r\n 3=>3/4 cups (170g) granulated sugar\r\n 4=>6 large eggs, room temperature\r\n 5=>1/2 teaspoon (3g) kosher salt\r\n 6=>4 tablespoons (58g) melted unsalted butter\r\n 7=>1 teaspoon vanilla extract\r\n 8=>2 tablespoons cocoa powder (for dusting the tea towel)', '1.Sift the dry ingredients:\r\nInto a large bowl, sift together the cake flour, cocoa powder, and cornstarch three times. Set the dry ingredients aside.\r\n 2.Warm sugar in the oven while it preheats:\r\nLine the half-sheet pan with parchment paper, then sprinkle the sugar onto the paper in an even layer.\r\n\r\nPlace the pan in the oven. Set the oven to 400°F. You will have the sugar in the oven while it preheats and remove it from the oven when it is warm to the touch, in step 4.\r\n 3.Whisk the eggs in a stand mixer:\r\nWhile the sugar is warming, use a stand mixer fitted with the whisk attachment to lightly beat the eggs, at low speed, until they look foamy with small bubbles, for 30 to 45 seconds.\r\n\r\n 4.Add the sugar to the eggs:\r\nBy now, the sugar should be warm to the touch. Remove the pan from the oven, hold the parchment paper by the sides and, while the mixer is still running, sprinkle the warm sugar into the eggs, followed by the salt.\r\n\r\nOnce all of the sugar has been added to the eggs, increase the mixer’s speed to medium-high. Whip the mixture, until lemon-yellow and very thick, about 8 minutes.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `userid` varchar(30) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `lname` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `mobileno` varchar(30) DEFAULT NULL,
  `pic` varchar(100) DEFAULT NULL,
  `profession` varchar(40) DEFAULT NULL,
  `gender` varchar(30) DEFAULT NULL,
  `pass` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`userid`, `fname`, `lname`, `email`, `mobileno`, `pic`, `profession`, `gender`, `pass`) VALUES
('u-1', 'Ashab', 'Asir', 'ashab@gmail.com', '01877544736', '64c1cde1acb213cead5395592a05ac63.jpeg', 'Student', 'Male', '2'),
('U-444', 'Jannatul', 'Niha', 'niha@gmail.com', '01877545421', '359a24f991019b9b2338d838d082029c.jpg', 'House Wife', 'Female', '4444');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `chef_table`
--
ALTER TABLE `chef_table`
  ADD PRIMARY KEY (`chefid`);

--
-- Indexes for table `recipe_table`
--
ALTER TABLE `recipe_table`
  ADD PRIMARY KEY (`recipeid`),
  ADD KEY `chefid` (`chefid`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`userid`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `recipe_table`
--
ALTER TABLE `recipe_table`
  ADD CONSTRAINT `recipe_table_ibfk_1` FOREIGN KEY (`chefid`) REFERENCES `chef_table` (`chefid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
