-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 11:53 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `byte_105`
--

-- --------------------------------------------------------

--
-- Table structure for table `arksaji`
--

CREATE TABLE `arksaji` (
  `_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `no_emp` int(11) NOT NULL,
  `no_days` int(11) NOT NULL,
  `emp_days` int(11) NOT NULL,
  `e_sal_day` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dawasaji`
--

CREATE TABLE `dawasaji` (
  `_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `no_emp` int(11) NOT NULL,
  `no_days` int(11) NOT NULL,
  `emp_days` int(11) NOT NULL,
  `e_sal_day` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `grinding`
--

CREATE TABLE `grinding` (
  `_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `input` float(5,2) NOT NULL,
  `output` float(5,2) NOT NULL,
  `no_emp` float(5,2) NOT NULL,
  `hrs_day` float(5,2) NOT NULL,
  `hrs` float(5,2) NOT NULL,
  `no_days` float(5,2) NOT NULL,
  `tot_emp_days` float(5,2) NOT NULL,
  `sal_day` float(5,2) NOT NULL,
  `tot_emp_cost` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_sheet`
--

CREATE TABLE `ingredient_sheet` (
  `_id` int(6) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `raw_mat_name` varchar(100) NOT NULL,
  `raw_mat_qty` float(5,2) NOT NULL,
  `rate` float(7,2) NOT NULL,
  `amount` float(8,2) NOT NULL,
  `unit_size` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `labor_prod_summary`
--

CREATE TABLE `labor_prod_summary` (
  `_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `tablet` float(5,2) NOT NULL,
  `syrup` float(5,2) NOT NULL,
  `arksaji` float(5,2) NOT NULL,
  `dawasaji` float(5,2) NOT NULL,
  `grinding` float(5,2) NOT NULL,
  `total` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `packaging_material`
--

CREATE TABLE `packaging_material` (
  `_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `cover_box` float(5,2) NOT NULL,
  `label` float(5,2) NOT NULL,
  `jar` float(5,2) NOT NULL,
  `carton` float(5,2) NOT NULL,
  `cap` float(5,2) NOT NULL,
  `total_cost` float(5,2) NOT NULL,
  `unit_per_lot` float(5,2) NOT NULL,
  `total_cost_per_lot` float(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(2) NOT NULL,
  `sizes` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `_id` int(5) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `store_output_in_kg` float(5,2) NOT NULL,
  `prod_input` float(5,2) NOT NULL,
  `prod_output` float(5,2) NOT NULL,
  `packaging_input` float(5,2) NOT NULL,
  `prod_per_ghan` float(5,2) NOT NULL,
  `raw_mat_cost` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `raw_material`
--

CREATE TABLE `raw_material` (
  `_id` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rate` float(8,2) NOT NULL,
  `old_rate` float(8,2) NOT NULL,
  `final_rate` float(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `syrup`
--

CREATE TABLE `syrup` (
  `_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `sup_emp` float(5,2) NOT NULL,
  `sup_days` float(5,2) NOT NULL,
  `gh_emp` float(5,2) NOT NULL,
  `gh_days` float(5,2) NOT NULL,
  `fill_emp` float(5,2) NOT NULL,
  `fill_days` float(5,2) NOT NULL,
  `seal_emp` float(5,2) NOT NULL,
  `seal_days` float(5,2) NOT NULL,
  `chk_emp` float(5,2) NOT NULL,
  `chk_days` float(5,2) NOT NULL,
  `total_emp` float(5,2) NOT NULL,
  `e_sal_day` float(5,2) NOT NULL,
  `total_emp_cost` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tablet`
--

CREATE TABLE `tablet` (
  `_id` int(6) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unit_size` varchar(6) NOT NULL,
  `lc_noe` float(5,2) NOT NULL,
  `lc_nod` float(5,2) NOT NULL,
  `mx_noe` float(5,2) NOT NULL,
  `mx_nod` float(5,2) NOT NULL,
  `gr_noe` float(5,2) NOT NULL,
  `gr_nod` float(5,2) NOT NULL,
  `tab_noe` float(5,2) NOT NULL,
  `tab_nod` float(5,2) NOT NULL,
  `total_noe` float(5,2) NOT NULL,
  `total_nod` float(5,2) NOT NULL,
  `emp_days` float(5,2) NOT NULL,
  `emp_sal` float(5,2) NOT NULL,
  `cost` float(7,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arksaji`
--
ALTER TABLE `arksaji`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `dawasaji`
--
ALTER TABLE `dawasaji`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `grinding`
--
ALTER TABLE `grinding`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `ingredient_sheet`
--
ALTER TABLE `ingredient_sheet`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `labor_prod_summary`
--
ALTER TABLE `labor_prod_summary`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `packaging_material`
--
ALTER TABLE `packaging_material`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `raw_material`
--
ALTER TABLE `raw_material`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `syrup`
--
ALTER TABLE `syrup`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tablet`
--
ALTER TABLE `tablet`
  ADD PRIMARY KEY (`_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arksaji`
--
ALTER TABLE `arksaji`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dawasaji`
--
ALTER TABLE `dawasaji`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grinding`
--
ALTER TABLE `grinding`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingredient_sheet`
--
ALTER TABLE `ingredient_sheet`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labor_prod_summary`
--
ALTER TABLE `labor_prod_summary`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packaging_material`
--
ALTER TABLE `packaging_material`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `raw_material`
--
ALTER TABLE `raw_material`
  MODIFY `_id` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `syrup`
--
ALTER TABLE `syrup`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tablet`
--
ALTER TABLE `tablet`
  MODIFY `_id` int(6) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
