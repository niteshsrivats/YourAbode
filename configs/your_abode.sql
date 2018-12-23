-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 18, 2018 at 06:33 AM
-- Server version: 5.7.24-0ubuntu0.16.04.1
-- PHP Version: 7.0.32-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `your_abode`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(5) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone_number` bigint(10) DEFAULT NULL,
  `email_id` varchar(35) NOT NULL,
  `password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`account_id`, `name`, `phone_number`, `email_id`, `password`) VALUES
(1, 'Nitesh Srivats', 7795108392, 'Nitesh@gmail.com', 'Admin!123'),
(2, 'Ayush Sonthalia', 9731762162, 'Ayush@gmail.com', 'Admin!123'),
(3, 'Adhyayan Panwar', 7760694184, 'Adhyayan@gmail.com', 'Ayush!123');

-- --------------------------------------------------------

--
-- Table structure for table `commercial`
--

CREATE TABLE `commercial` (
  `house_id` int(7) NOT NULL,
  `house_name` varchar(20) NOT NULL,
  `city` varchar(3) NOT NULL,
  `address` varchar(200) NOT NULL,
  `images` varchar(250) NOT NULL,
  `features` varchar(200) NOT NULL,
  `description` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commercial`
--

INSERT INTO `commercial` (`house_id`, `house_name`, `city`, `address`, `images`, `features`, `description`) VALUES
(500000, 'Coworking Office', 'BLR', 'Richmond Circle \r\n', '../images/c1.jpg', 'Pantry WiFi Coffee AC White Board\r\n', 'A very well sought after shared office space in Bangalore and centrally located. Just minutes away from ITC Gardenia and Mallya Hospital. The space is fully equipped with air-conditioning, power backup, whiteboard and also have a conference room for meetings. There is a three months refundable deposit on monthly bookings.\r\n'),
(500001, 'Quest Office', 'BOM', 'BKC, Mumbai\r\n', '../images/c2.jpg', 'AC White Board Security Lift Reception\r\n', 'The Business world demands quality and consistent return on investment. Quest Offices, near Standard Chartered Bank, puts that demand at the forefront by eliminating capital outlay, time delays and overheads. We offer workspaces on rent for large businesses, independent professionals and remote teams.\r\n'),
(500002, 'iShare Office', 'MAA', 'Anna Salai, Chennai\r\n', '../images/c3.jpg', 'Parking Security Lift Power backup\r\n', 'Looking for a office space @anna salai chennai 600002 Contact us for a cheaper price.We provide  Co working spaces, Private office, Manager Cabin, Conference room for rent, with all basic amenities for free in an affordable price.\r\n'),
(500003, '22Workspace', 'DEL', 'Central Delhi, New Delhi\r\n', '../images/c4.jpg', 'Reception Security AC White Board\r\n', 'Fully furnished, ready to use office space of your own, enough for accommodating a team starting from 4 to 50 members. Your own office space that grows as required by your business.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `commercial_types`
--

CREATE TABLE `commercial_types` (
  `house_id` int(7) NOT NULL,
  `hourly_rate` int(5) DEFAULT NULL,
  `weekly_rate` int(5) DEFAULT NULL,
  `rent_price` int(6) DEFAULT NULL,
  `area` int(3) NOT NULL,
  `type` varchar(2) NOT NULL,
  `count` mediumint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commercial_types`
--

INSERT INTO `commercial_types` (`house_id`, `hourly_rate`, `weekly_rate`, `rent_price`, `area`, `type`, `count`) VALUES
(500000, 500, 2500, 40000, 6, 'MR', 1),
(500001, 2000, 12000, 100000, 10, 'MR', 2),
(500002, 900, 6500, 50000, 15, 'MR', 3),
(500003, 750, 5000, 45000, 8, 'MR', 4),
(500000, 400, 6000, 39000, 20, 'OD', 5),
(500001, 200, 1000, 22000, 20, 'OD', 6),
(500002, 170, 5100, 25000, 20, 'OD', 7),
(500003, 300, 6000, 30000, 16, 'OD', 8),
(500000, 500, 2500, 40000, 6, 'PC', 9),
(500001, 200, 1500, 15000, 5, 'PC', 10),
(500002, 300, 1750, 45000, 10, 'PC', 11),
(500003, 250, 1500, 30000, 4, 'PC', 12),
(500000, 750, 5000, 45000, 100, 'EH', 13),
(500001, 650, 4500, 30000, 75, 'EH', 14),
(500002, 1200, 7000, 50000, 70, 'EH', 15),
(500003, 2000, 10000, 75400, 50, 'EH', 16);

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE `houses` (
  `house_id` int(7) NOT NULL,
  `account_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `houses`
--

INSERT INTO `houses` (`house_id`, `account_id`) VALUES
(1, 2),
(2, 3),
(3, 3),
(4, 2),
(5, 3),
(6, 1),
(7, 1),
(8, 3),
(9, 1),
(10, 3),
(11, 1),
(12, 3),
(13, 1),
(500000, 1),
(500001, 2),
(500002, 2),
(500003, 1),
(500010, 1);

-- --------------------------------------------------------

--
-- Table structure for table `residential`
--

CREATE TABLE `residential` (
  `house_id` int(7) NOT NULL,
  `house_name` varchar(30) NOT NULL,
  `city` varchar(3) NOT NULL,
  `area` mediumint(5) NOT NULL,
  `sell_price` bigint(10) DEFAULT NULL,
  `rent_price` int(10) DEFAULT NULL,
  `address` varchar(200) NOT NULL,
  `images` varchar(250) NOT NULL,
  `features` varchar(200) DEFAULT NULL,
  `description` varchar(800) NOT NULL,
  `type` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `residential`
--

INSERT INTO `residential` (`house_id`, `house_name`, `city`, `area`, `sell_price`, `rent_price`, `address`, `images`, `features`, `description`, `type`) VALUES
(1, 'Residential Plot', 'BLR', 1200, 2500000, 50000, 'Kenchanapura, Bangalore - West, Karnataka', '../images/r1.jpg', 'Bank & ATM Maintenance Staff Vaastu Compliant Reserved Parking Earth quake resistant Swimming Pool Outdoor Tennis Courts Park\r\n', 'Planning to buy a plot to build your dream house? Here is an ultimate opportunity to consider. Situated in one of the elite residential neighbourhoods in Kenchanapura, Bangalore, a 1200 sq. ft. Residential Plot is up for sale. Investment in land never goes out of fashion and due to its continuous demand and limited supply, the prospective buyer is benefitted with excellent returns in the near future.', 'OP'),
(2, 'Residential Plot', 'BOM', 2970, 2080000, 42000, 'Plot no.24 Vikrant Estate Emerald Phase-1, Wakas Village, Taluka-Karjat.District-Raigad, Mumbai, Maharashtra', '../images/r2.jpg', 'Library And Business Centre Multipurpose Hall Swimming Pool CCTV Camera Flower Gardens Indoor Games Room\r\n', 'Surrounded by lush greenery, this spacious residential plot for sale in Neral, Mumbai is a perfect place to build your dream home. Located near Neral Raim lway Station (6km), this property is in high demand and can be regarded as one of the lucrative deals as its value will certainly increase with time and offers greater returns.', 'OP'),
(3, 'Residential Plot', 'MAA', 1800, 3100000, 65000, 'Maraimalai Nagar, Chennai - South, Tamil Nadu', '../images/r3.png', 'Jogging and Strolling Track Visitor Parking Waste Disposal Rain Water Harvesting Service/Goods Lift Water Storage\r\n', 'CMDA approved plots located inside Thirumazhisai, SIDCO Industrial Estate at Poonamallee with less than 1min (800m) from the bustling and ever busy Bangalore Highway and just under 600m access to the town of Thirumazhisai through the road connecting to tiruvallur tirupati highway from the site.', 'OP'),
(4, 'Residential Plot', 'DEL', 2160, 13200000, 120000, 'Saroop Nagar, New Delhi - North, Delhi NCR', '../images/r4.jpg', 'Maintenance Staff Vaastu Compliant Reserved Parking Power Back UpEarth quake resistant Swimming Poo lOutdoor Tennis Courts Park\r\n', 'Grab this fabulous opportunity of owning a spacious residential plot located in Saroop Nagar, New Delhi. Offering close proximity to well developed social infrastructure, this plot is absolutely ideal for experiencing a comfortable life with your beloved family. ', 'OP'),
(5, '3 BHK Flat', 'BLR', 1750, 16300000, 5075000, 'BTM Layout Stage 2, Bangalore - South, Karnataka', '../images/r5.jpg', 'Power Back Up Visitor Parking Maintenance StaffPiped Gas Vaastu Compliant Lift\r\n', 'Green City Eutopia believes that the science behind a successful living revolves around fresh ideas, stimulating research, accurate planning and the flair towards its execution. A space that is devised with the same level of commitment, bringing into life the Science of Real Estate, while keeping innovation as its partner, Green City Eutopia ventures out into a world of limitless possibilities in delivering not just a living space but a lifestyle that only a few are entitled to', 'RM'),
(6, '2 BHK Flat', 'BOM', 2000, 21500000, 6500000, 'Jogeshwari East, Mumbai - Western Suburbs, Maharashtra', '../images/r6.jpg', 'Jogging and Strolling Track Visitor Parking Waste Disposal Rain Water Harvesting Service/Goods Lift Water Storage\r\n', 'Lily White is the home which will always be close to you, no matter which part of the city, one is commuting from. Lily White comes with 2 and 3 bedroom hall apartments.Located in the heart of the rapidly developing Jogeshwari-Vikhroli link road, Lily White stands tall and statuesque, adjacent to the Ganesh Talao.', 'RM'),
(7, '2 BHK Flat', 'MAA', 1191, 6370000, 1325000, 'Ambattur, Chennai - North, Tamil Nadu', '../images/r7.jpg', 'Multipurpose Hal lWaste Disposal Rain Water Harvesting Service/Goods Lift Indoor Games Room\r\n', 'A spacious 2bhk premium property in the prime location of Ambattur , just a 5min drive from Anna Nagar.', 'RM'),
(8, '4 BHK Flat', 'DEL', 2700, 60000000, 7500000, 'Greater Kailash 1, GK I, New Delhi - South, Delhi NCR', '../images/r8.jpg', 'Bank & ATM Maintenance Staff Vaastu Compliant Reserved Parking Earth quake resistant Swimming Pool Outdoor Tennis Courts Park\r\n', 'PARK FACING, NEW builder floor having 4 spacious bedrooms with attached baths drawing/dinning, kitchen is available on sale in GK-1, a very posh locality of new delhi. Plot size is 500 yds and the floor is First. Lift, Covered Parkings. Wide Road. Modular Kitchen,Italian Flooring,Huge Coverage. Semi-Furnished. ', 'RM'),
(9, '3 BHK Villa', 'BLR', 4230, 6650000, 100000, 'Sarjapur, Bangalore, Sarjapur, Bangalore - South East, Karnataka', '../images/r9.jpg', 'Library And Business Centre Multipurpose Hall Swimming Pool CCTV Camera Flower Gardens Indoor Games Room\r\n', 'Beautifully designed 3BHK Villa is up for sale located in Sarjapur, Bangalore. This amazing villa is a brand new property and has been approved by the Bangalore Metropolitan Region Development Authority (BMRDA). Further, this is an vaastu compliant house offered with freehold ownership rights, which makes it more valuable, desirable and truly worth consideration.', 'VI'),
(10, '4 BHK Villa', 'BOM', 4000, 145000000, 5000000, '2nd cross road, lokhandwala complex, andheri west., Lokhandwala Complex, Mumbai - Western Suburbs, Maharashtra', '../images/r10.jpg', 'Library And Business Centre Multipurpose Hall Swimming Pool CCTV Camera Flower Gardens Indoor Games Room\r\n', 'Bunglow available for sale in lokhandwala complex, 2nd cross lane. Can be accessed from backroad of lokhandwala. Peaceful surrounding. Its made into 4bhk at present. Approx of 1500sqft F.S.I more available. Has a huge garden area attached to the property. Actual pictures are attached. Kindly contact for further assistance and inspection required', 'VI'),
(11, '4 BHK Villa', 'BOM', 4000, 145000000, 5000000, 'Lokhandwala Complex, Mumbai - Western Suburbs, Maharashtra', '../images/r11.jpg', 'Visitor Parking Jogging and Strolling Track Waste Disposal Rain Water Harvesting Water Storage Service/Goods LiftSecurity\r\n', 'Bunglow available for sale in lokhandwala complex, 2nd cross lane. Can be accessed from backroad of lokhandwala. Peaceful surrounding. Its made into 4bhk at present. Approx of 1500sqft F.S.I more available. Has a huge garden area attached to the property. Actual pictures are attached. Kindly contact for further assistance and inspection required', 'VI'),
(12, '3 BHK Villa', 'MAA', 3778, 31000000, 1000000, 'Palavakkam, Chennai - South, Tamil Nadu', '../images/r12.jpg', 'Maintenance Staff Vaastu Compliant Reserved Parking Power Back UpEarth quake resistant Swimming Poo lOutdoor Tennis Courts Park\r\n', 'Promising an opulent & comfortable lifestyle, here is an amazing opportunity to own a luxurious 3BHK villa situated in the marvelous society of "BBCL SandShore", Palavakkam, Chennai. Property Specifications Spanning over 3 floors (i.e.Ground+2); this exclusive villa is spread across a super built-up area of 2787sqft. Facing towards the auspicious east direction, this bright and ethereal abode basks in the glory of early morning sunrise and is bestowed with a refreshing ambiance all day long. Absolutely ready for possession, this relatively new property is benefitted with complete proprietorship rights. ', 'VI'),
(13, '4 BHK Villa', 'DEL', 5700, 7400000, 1002000, 'Dera Basi, Zirakpur, New Delhi, Delhi NCR', '../images/r13.jpg', 'Jogging and Strolling Track Visitor Parking Waste Disposal Rain Water Harvesting Service/Goods Lift Water Storage\r\n', 'The property is new and is ideal for a family or even a company guest house. Having four bedrooms, & four bathrooms, two balconies and a spacious penthouse for  official parties, this is a very spacious house and ideal for a top executive wishing to stay away from the hustle and bustle of the city. Very close to airport, Chandigarh, shopping mall and hospital, it is very well located within a gated and secure community.', 'VI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`),
  ADD UNIQUE KEY `ACCOUNT ID` (`account_id`),
  ADD UNIQUE KEY `email_id` (`email_id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `commercial`
--
ALTER TABLE `commercial`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `commercial_types`
--
ALTER TABLE `commercial_types`
  ADD PRIMARY KEY (`count`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`house_id`);

--
-- Indexes for table `residential`
--
ALTER TABLE `residential`
  ADD PRIMARY KEY (`house_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `commercial`
--
ALTER TABLE `commercial`
  MODIFY `house_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500012;
--
-- AUTO_INCREMENT for table `commercial_types`
--
ALTER TABLE `commercial_types`
  MODIFY `count` mediumint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `residential`
--
ALTER TABLE `residential`
  MODIFY `house_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
