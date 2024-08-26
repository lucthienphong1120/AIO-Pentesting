-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2022 at 08:36 AM
-- Server version: 10.3.25-MariaDB
-- PHP Version: 7.4.29
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `cutephp`
--
-- --------------------------------------------------------
--
-- Table structure for table `blog`
--
CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `cover` text NOT NULL,
  `content` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;
--
-- Dumping data for table `blog`
--
INSERT INTO `blog` (`id`, `title`, `description`, `cover`, `content`)
VALUES (
    9,
    'Welcome',
    'Hey welcome to cuteblog for PHP , this is a new modern blog build with native PHP',
    'https://img.freepik.com/free-vector/developer-activity-concept-illustration_114360-2801.jpg?w=2000',
    'A Cuteblog for native php blogger, so if you a php lovers this source code is best solution for build modern blog with fast using php ,simple and fast including auto SEO with using this project. lets get started now using cuteblog PHP'
  ),
  (
    10,
    'Download',
    'You can download this full source code free gratis for built your blog using PHP',
    'https://img.freepik.com/free-vector/programmer-concept-illustration_114360-2284.jpg?w=2000',
    'Of course this is a open source code so you can download it, change any code with you needed and deploy on your host. you can download it on our github repo copy this link https://github.com/mesinkasir/cuteblog-php , or you can use terminal and run this command git clone &quot;https://github.com/mesinkasir/cuteblog-php.git&quot;'
  ),
  (
    11,
    'Installation',
    'How to install cuteblog on your shared or cloud hosting, read this post',
    'https://img.freepik.com/free-vector/developer-activity-concept-illustration_114360-1643.jpg?w=2000',
    'For installting cuteblog native php, for first make sure you have a domain and hosting, then you can login on cpanel hosting, upload source code file on your project, you can install on root domain with myblog.com or on directori with myblog.com/cuteblog or you can create sub domain and install it on your sub domain with cuteblog.myblog.com for example, just upload on your shared cloud hosting, create new mysql database , and add user on your database, then import cuteblog.mysql database files, after import database you can visit on your project folder, open cutes.php files and you can integration mysql database in here, just change username with your mysql username hosting, then password and database name for your mysql, thats it and your website blog is online now.'
  ),
  (
    12,
    'Work',
    'How to work with this source code file cuteblog for PHP ??',
    'https://img.freepik.com/free-vector/pair-programming-concept-illustration_114360-2751.jpg?w=2000',
    'Oke after installing on your cloud or shared hosting now you can write update new post or edit and delete article, for check post list you can visit on yourblog.com/cuteblog.php then you can see all article page in here, and you can edit just click on pen icon or delete post with click on trash button, for create new you can push add new button. then create insert title, description and cover link url and write article and publish post. then cuteblog is autmaticly displaying your new post blog including auto SEO generate'
  ),
  (
    13,
    'Contact',
    'Need help for build modern website with cute cms .just contact us',
    'https://i.pinimg.com/736x/ce/98/9c/ce989c0dd688b3b99a31400129d2d211.jpg',
    'So if you need to build and develop modern website with cute and unique design so you can call us. whatsapp : +6285646104747 / or email axcora@gmail.com'
  );
--
-- Indexes for dumped tables
--
--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
ADD PRIMARY KEY (`id`);
--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 14;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;