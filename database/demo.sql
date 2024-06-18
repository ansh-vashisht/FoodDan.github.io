-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 18, 2023 at 04:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";   /* Doeesny give automatic starting value to 0*/
START TRANSACTION;                        /* Strats Database. All actions will start taking place*/
SET time_zone = "+00:00";                /*For all time zones*/



--Creating Table admin

CREATE TABLE `admin` (
  `Aid` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) DEFAULT NULL,
  `password` text NOT NULL,
  `location` text NOT NULL,
  `address` text NOT NULL
);

--
-- Creating table delivery-person
--


CREATE TABLE `delivery_persons` (
  `Did` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `city` varchar(50) DEFAULT NULL
);

-- Creating table food-donation
--

CREATE TABLE `food_donations` (
  `Fid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `food` varchar(50) NOT NULL,
  `type` text NOT NULL,
  `category` text NOT NULL,
  `quantity` text NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `address` text NOT NULL,
  `location` varchar(50) NOT NULL,
  `phoneno` varchar(25) NOT NULL,
  `assigned_to` int(11) DEFAULT NULL,
  `delivery_by` int(11) DEFAULT NULL
);
--
--Creating table login  (donor)
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` text NOT NULL,
  `gender` text NOT NULL
);
--
-- Creating table for user-feedback from donor to admin of same location
--

CREATE TABLE `user_feedback` (
  `feedback_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
);


--To make aid primary key which was not done before unique key is email that is it must be diff for each (admin table)
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Aid`),
  ADD UNIQUE KEY `email` (`email`);

--To make did primary key which was not done before unique key is email that is it must be diff for each (delivery table)

ALTER TABLE `delivery_persons`
  ADD PRIMARY KEY (`Did`),
  ADD UNIQUE KEY `email` (`email`);

----To make fid primary key in food table

ALTER TABLE `food_donations`
  ADD PRIMARY KEY (`Fid`);

--To make emai; primary key which was not done before inique id is uid that is it must be diff for each (login/user/donor table)
ALTER TABLE `login`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `id` (`id`);


---To make feedback_id primary key in feedback
ALTER TABLE `user_feedback`
  ADD PRIMARY KEY (`feedback_id`);


ALTER TABLE `admin`
  MODIFY `Aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

  -- Remove the UNIQUE constraint on feedback_id in user_feedback table
ALTER TABLE `user_feedback` DROP INDEX `feedback_id`;


--
-- AUTO_INCREMENT for table `delivery_persons` and its did increases by 3 each time
--
ALTER TABLE `delivery_persons`
  MODIFY `Did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `food_donations` and its fid increases by 26 each time
--
ALTER TABLE `food_donations`
  MODIFY `Fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `login` and increasess it by 17
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;


ALTER TABLE `login` ADD COLUMN `gender` VARCHAR(10) NOT NULL DEFAULT 'male' AFTER `password`;

--
-- AUTO_INCREMENT for table `user_feedback` byb 7
--
ALTER TABLE `user_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;   --To put all chnages in action

--used to have bar chart of veg and non veg but not possible due to teachnical errors 

ALTER TABLE `food_donations`
  ADD COLUMN `food_type` ENUM('Vegetarian', 'Non-Vegetarian') NOT NULL DEFAULT 'Vegetarian' AFTER `food`;



