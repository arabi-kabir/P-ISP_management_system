-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2018 at 04:46 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_username` text NOT NULL,
  `admin_password` text NOT NULL,
  `admin_email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_username`, `admin_password`, `admin_email`) VALUES
(1, 'as', 'as', 'as@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customer_area_table`
--

CREATE TABLE `customer_area_table` (
  `customer_id` int(11) NOT NULL,
  `customer_area` text NOT NULL,
  `customer_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_area_table`
--

INSERT INTO `customer_area_table` (`customer_id`, `customer_area`, `customer_address`) VALUES
(1, 'Mirpur', 'Sankar, dhaka        '),
(2, 'Dhanmondi', 'ECB, Mirpur Dhaka       '),
(3, 'Mirpur', 'Mirpur 10, Dhaka '),
(4, 'Mohammadpur', 'Barisal, India   '),
(5, 'Gulshan', 'Gulshan 2'),
(6, 'Mirpur', 'Mirpur 10'),
(7, 'Banani', 'Banani 2, Dhaka'),
(8, 'Dhanmondi', 'Mitali Road'),
(9, 'Mirpur', 'Mirpur 12, Dhaka.'),
(10, 'Gulshan', 'Gulshan 2, house 22');

-- --------------------------------------------------------

--
-- Table structure for table `customer_complain_table`
--

CREATE TABLE `customer_complain_table` (
  `customer_id` int(11) NOT NULL,
  `customer_complain_number` int(11) NOT NULL,
  `customer_complain_info` text NOT NULL,
  `customer_complain_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_complain_table`
--

INSERT INTO `customer_complain_table` (`customer_id`, `customer_complain_number`, `customer_complain_info`, `customer_complain_status`) VALUES
(1, 1, 'Slow net connection', 'unsolved'),
(3, 2, 'not getting ftp service', 'solved'),
(3, 3, 'need to change package', 'unsolved'),
(6, 4, 'my router is broke', 'solved'),
(6, 5, 'i lost my wifi password. please help.', 'unsolved'),
(6, 7, 'vfsv', 'solved'),
(1, 8, 'i broke my router', 'solved');

-- --------------------------------------------------------

--
-- Table structure for table `customer_contact_table`
--

CREATE TABLE `customer_contact_table` (
  `customer_id` int(11) NOT NULL,
  `customer_first_name` text NOT NULL,
  `customer_last_name` text NOT NULL,
  `customer_email` text NOT NULL,
  `customer_NID` text NOT NULL,
  `customer_contact_number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_contact_table`
--

INSERT INTO `customer_contact_table` (`customer_id`, `customer_first_name`, `customer_last_name`, `customer_email`, `customer_NID`, `customer_contact_number`) VALUES
(1, 'arabi', 'kabir', 'arabi@gmail.com', 'ARABI_0987', '01944009966'),
(2, 'zawad', 'khan', 'ehzawad@gmail.com', 'zawad_0987', '0987654433'),
(3, 'afifa', 'lazy', 'lazy_Afif@gmail.com', 'lazy_afif1234', '123456789'),
(4, 'first_test', 'alast_test', 'atest@gmail.com', 'atest_12345', 'a000000000'),
(5, 'Adit', 'Hasan', 'Adit@gmail.com', 'adit_nid1234', '1234567'),
(6, 'sadik', 'khan', 'sadik@gmail.com', 'sadik123435456', '98765453'),
(7, 'Adit', 'khan', 'aditkhan@yahoo.com', 'nid_1234', '1235666'),
(8, 'linda', 'kabir', 'linda@gmail.com', 'nid_123214', '999356778'),
(9, 'amir', 'khan', 'amir@yahoo.com', 'nid_123_amir', '018765432'),
(10, 'Sumi', 'Rahaman', 'sumi@gmail.com', 'sumi_nid123', '01789765');

-- --------------------------------------------------------

--
-- Table structure for table `customer_login_table`
--

CREATE TABLE `customer_login_table` (
  `customer_id` int(10) NOT NULL,
  `customer_username` text NOT NULL,
  `customer_password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_login_table`
--

INSERT INTO `customer_login_table` (`customer_id`, `customer_username`, `customer_password`) VALUES
(1, 'arabi', 'arabipass'),
(2, 'Zawadproblem', 'zawadpass'),
(3, 'lazy_Afif', 'simple'),
(4, 'atest_user', 'test_user'),
(5, 'Adit', 'aditpass'),
(6, 'Sadik', 'sadikpass'),
(7, 'aditkhan', 'qwer'),
(8, 'linda', 'asdfg'),
(9, 'Amir', 'amir'),
(10, 'Sumi', 'sumipass');

-- --------------------------------------------------------

--
-- Table structure for table `customer_package_info_table`
--

CREATE TABLE `customer_package_info_table` (
  `customer_id` int(11) NOT NULL,
  `customer_curr_package` text NOT NULL,
  `customer_ip_address` text NOT NULL,
  `customer_joindate` date NOT NULL,
  `customer_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_package_info_table`
--

INSERT INTO `customer_package_info_table` (`customer_id`, `customer_curr_package`, `customer_ip_address`, `customer_joindate`, `customer_status`) VALUES
(1, 'Package 4', '192.10.91.00', '2018-03-08', 'active'),
(2, 'Package 5', '192.20.91.3', '2018-02-01', 'active'),
(3, 'Package 3', '10.10.10.10', '2018-01-09', 'inactive'),
(4, 'Package 3', '1.1.1.1.2', '2018-04-18', 'active'),
(5, 'Package 2', '1.2.3.4', '2018-04-16', 'inactive'),
(6, 'Package 4', '2.4.1.3', '2018-02-14', 'active'),
(7, 'Package 3', '12.43.13.13', '2018-04-03', 'active'),
(8, 'Package 5', '12.234.123.131', '2018-06-13', 'active'),
(9, 'Package 1', '12..345.22.12', '2018-04-22', 'inactive'),
(10, 'Package 4', '123.123.12.12', '2018-04-17', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `customer_payments`
--

CREATE TABLE `customer_payments` (
  `payment_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `pay_month` text NOT NULL,
  `pay_year` text NOT NULL,
  `payment_status` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_payments`
--

INSERT INTO `customer_payments` (`payment_id`, `customer_id`, `pay_month`, `pay_year`, `payment_status`) VALUES
(16, 1, '03', '2018', 'Paid'),
(17, 2, '03', '2018', 'Paid'),
(18, 4, '03', '2018', 'Due'),
(19, 7, '03', '2018', 'Paid'),
(20, 8, '03', '2018', 'Paid'),
(21, 1, '04', '2018', 'Due'),
(22, 2, '04', '2018', 'Paid'),
(23, 4, '04', '2018', 'Paid'),
(24, 7, '04', '2018', 'Due'),
(25, 8, '04', '2018', 'Due');

-- --------------------------------------------------------

--
-- Table structure for table `employee_salary_table`
--

CREATE TABLE `employee_salary_table` (
  `salary_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `sal_month` text NOT NULL,
  `sal_year` text NOT NULL,
  `sal_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee_table`
--

CREATE TABLE `employee_table` (
  `employee_id` int(11) NOT NULL,
  `employee_name` text NOT NULL,
  `employee_email` text NOT NULL,
  `employee_username` text NOT NULL,
  `employee_password` text NOT NULL,
  `employee_nid` text NOT NULL,
  `employee_join_date` date NOT NULL,
  `employee_salary` int(11) NOT NULL,
  `employee_moderator_access` text NOT NULL,
  `employee_address` text NOT NULL,
  `employee_contact_number` text NOT NULL,
  `emp_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee_table`
--

INSERT INTO `employee_table` (`employee_id`, `employee_name`, `employee_email`, `employee_username`, `employee_password`, `employee_nid`, `employee_join_date`, `employee_salary`, `employee_moderator_access`, `employee_address`, `employee_contact_number`, `emp_status`) VALUES
(1, 'afif', 'afif@gmail.com', 'afif', 'afif', 'afif123456', '2018-01-03', 50, 'Yes', 'mirpur, dhaka', '01788888889', 'active'),
(3, 'zawad khan', 'zawad@gmail.com', 'zawad', 'zawad', 'zawad12345', '2018-03-05', 10000, 'No', 'ECB, Mirpur', '019878765', 'active'),
(4, 'Habib', 'habib@gmail.com', 'habibi', 'ya_habibi', 'habib_12345', '2018-03-14', 123, 'Yes', 'Basundhara, Dhaka', '12345678', 'inactive'),
(5, 'Alif', 'alif@gmail.com', 'alif', 'alifpass', 'nid_alif1234', '2018-02-22', 5000, 'No', 'Kalsi, dhaka', '09876543', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `expense_table`
--

CREATE TABLE `expense_table` (
  `expense_id` int(11) NOT NULL,
  `expense_type` text NOT NULL,
  `expense_name` text NOT NULL,
  `expense_date` date DEFAULT NULL,
  `expense_paid_or_not` text,
  `expense_additional_info` text,
  `expense_amount` double NOT NULL,
  `expense_year` int(11) NOT NULL,
  `expense_month` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `expense_table`
--

INSERT INTO `expense_table` (`expense_id`, `expense_type`, `expense_name`, `expense_date`, `expense_paid_or_not`, `expense_additional_info`, `expense_amount`, `expense_year`, `expense_month`) VALUES
(1, 'Food', '3 Pizza', '2018-04-10', 'Yes', 'For lunch.', 500, 2018, '04'),
(2, 'Component', '3 Multi Plug', '2018-04-03', 'Yes', 'for connecting new laptop', 470, 2018, '04'),
(3, 'Others', '15 New Books', '2018-04-04', 'No', 'for employee', 1200, 2017, '06'),
(4, 'Food', '5 Burger', '2018-04-12', 'Yes', 'lunch for employee', 2000, 2018, '04'),
(5, 'Buy Item', '2 Mobile', '0000-00-00', 'Yes', 'For Office Use', 10000, 2017, '11'),
(7, 'Food', 'Lunch', '2018-04-13', 'No', 'Lunch For employee', 260, 2018, '04'),
(8, 'Buy Item', 'Laptop', '0000-00-00', 'No', 'Laptop for employee', 25000, 2017, '10'),
(9, 'Component', 'Electric Parts', '0000-00-00', 'No', 'for office', 2000, 2017, '09'),
(10, 'Component', '5 Mobile', '0000-00-00', 'Yes', 'Phone for office use', 10000, 2018, '03'),
(13, 'Others', 'Salary', '2018-04-22', 'Yes', 'Rahim salary', 10000, 2018, '04'),
(14, 'Food', 'Lunch', '0000-00-00', 'Yes', 'lunch for employee.', 400, 2018, '02');

-- --------------------------------------------------------

--
-- Table structure for table `new_message_table`
--

CREATE TABLE `new_message_table` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `name` text NOT NULL,
  `contact_number` text NOT NULL,
  `message` text NOT NULL,
  `read_status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `new_message_table`
--

INSERT INTO `new_message_table` (`id`, `email`, `name`, `contact_number`, `message`, `read_status`) VALUES
(1, 'latifkabirarabi@gmail.com', 'khan', '1234567', 'i want a new connection', 'new'),
(2, 'arabi@gmail.com', 'kabir', '178888813', 'Where is your office', 'new');

-- --------------------------------------------------------

--
-- Table structure for table `package_information`
--

CREATE TABLE `package_information` (
  `package_name` text NOT NULL,
  `package_price` text NOT NULL,
  `package_speed` text NOT NULL,
  `package_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package_information`
--

INSERT INTO `package_information` (`package_name`, `package_price`, `package_speed`, `package_id`) VALUES
('Package 1', '500', '1 mbps', 1),
('Package 2', '800', '2 mbps', 2),
('Package 3', '1000', '3 mbps', 3),
('Package 4', '1500', '4 mbps', 4),
('Package 5', '2000', '8 mbps', 5);

-- --------------------------------------------------------

--
-- Table structure for table `set_due_all_table`
--

CREATE TABLE `set_due_all_table` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `click` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `set_due_all_table`
--

INSERT INTO `set_due_all_table` (`id`, `year`, `month`, `click`) VALUES
(11, 2018, 3, 'done'),
(12, 2018, 4, 'done');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `customer_area_table`
--
ALTER TABLE `customer_area_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_complain_table`
--
ALTER TABLE `customer_complain_table`
  ADD PRIMARY KEY (`customer_complain_number`);

--
-- Indexes for table `customer_contact_table`
--
ALTER TABLE `customer_contact_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_login_table`
--
ALTER TABLE `customer_login_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_package_info_table`
--
ALTER TABLE `customer_package_info_table`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_payments`
--
ALTER TABLE `customer_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `employee_salary_table`
--
ALTER TABLE `employee_salary_table`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `employee_table`
--
ALTER TABLE `employee_table`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `expense_table`
--
ALTER TABLE `expense_table`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `new_message_table`
--
ALTER TABLE `new_message_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_information`
--
ALTER TABLE `package_information`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `set_due_all_table`
--
ALTER TABLE `set_due_all_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_area_table`
--
ALTER TABLE `customer_area_table`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_complain_table`
--
ALTER TABLE `customer_complain_table`
  MODIFY `customer_complain_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `customer_contact_table`
--
ALTER TABLE `customer_contact_table`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_login_table`
--
ALTER TABLE `customer_login_table`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_package_info_table`
--
ALTER TABLE `customer_package_info_table`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customer_payments`
--
ALTER TABLE `customer_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employee_salary_table`
--
ALTER TABLE `employee_salary_table`
  MODIFY `salary_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employee_table`
--
ALTER TABLE `employee_table`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_table`
--
ALTER TABLE `expense_table`
  MODIFY `expense_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `new_message_table`
--
ALTER TABLE `new_message_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `package_information`
--
ALTER TABLE `package_information`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `set_due_all_table`
--
ALTER TABLE `set_due_all_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_area_table`
--
ALTER TABLE `customer_area_table`
  ADD CONSTRAINT `customer_area_table_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_login_table` (`customer_id`);

--
-- Constraints for table `customer_contact_table`
--
ALTER TABLE `customer_contact_table`
  ADD CONSTRAINT `customer_contact_table_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_login_table` (`customer_id`);

--
-- Constraints for table `customer_package_info_table`
--
ALTER TABLE `customer_package_info_table`
  ADD CONSTRAINT `customer_package_info_table_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer_login_table` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
