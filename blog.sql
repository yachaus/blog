-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 14, 2019 at 11:35 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `author`, `date`, `post_id`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. ', 'Vlad', '2019-10-11 18:35:44', 9),
(2, 'Lectus quam id leo in vitae turpis.', 'Victor', '2019-10-11 18:35:44', 9),
(3, 'Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. ', 'Maria', '2019-10-11 18:35:44', 9),
(4, 'Bibendum enim facilisis gravida neque.', 'Sasha', '2019-10-11 18:35:44', 9),
(5, 'Libero justo laoreet sit amet cursus sit amet dictum.', 'Vika', '2019-10-11 18:37:04', 8),
(6, 'Mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar.', 'Vlada', '2019-10-11 18:37:04', 8),
(13, 'Id neque aliquam vestibulum morbi.', 'George', '2019-10-13 09:06:55', 3),
(14, 'Dignissim enim sit amet venenatis urna cursus. ', 'Eva', '2019-10-13 09:10:15', 5),
(15, 'Vulputate ut pharetra sit amet aliquam id diam maecenas ultricies.', 'Olivia', '2019-10-13 09:18:26', 7),
(21, 'In est ante in nibh mauris cursus mattis molestie.', 'Valentin', '2019-10-13 21:24:11', 9);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `text`, `author`, `date`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Interdum posuere lorem ipsum dolor sit. Laoreet non curabitur gravida arcu ac tortor. Nisi lacus sed viverra tellus in hac habitasse. Lorem sed risus ultricies tristique nulla aliquet enim. Ut aliquam purus sit amet. Luctus venenatis lectus magna fringilla urna porttitor rhoncus. Imperdiet nulla malesuada pellentesque elit eget. Morbi tristique senectus et netus et malesuada. Sapien pellentesque habitant morbi tristique senectus et netus et. Pharetra pharetra massa massa ultricies mi quis hendrerit dolor magna. Integer eget aliquet nibh praesent tristique. Commodo odio aenean sed adipiscing diam donec adipiscing tristique.', 'Bill', '2019-10-11 16:44:47'),
(2, 'Fringilla phasellus faucibus scelerisque eleifend. Velit euismod in pellentesque massa placerat duis ultricies. Eget duis at tellus at urna condimentum mattis pellentesque. Orci porta non pulvinar neque. Quis eleifend quam adipiscing vitae proin sagittis nisl. Vulputate odio ut enim blandit volutpat maecenas. Erat nam at lectus urna duis convallis convallis tellus id. Ultrices in iaculis nunc sed augue lacus viverra vitae congue. Et netus et malesuada fames ac turpis. Morbi leo urna molestie at elementum eu facilisis sed odio. Accumsan in nisl nisi scelerisque eu ultrices. Laoreet non curabitur gravida arcu ac tortor dignissim. Mi proin sed libero enim sed faucibus turpis in eu. Quis hendrerit dolor magna eget est.', 'Jane', '2019-10-11 16:44:48'),
(3, 'Nisl suscipit adipiscing bibendum est ultricies integer quis auctor. Eget nunc scelerisque viverra mauris. Nunc mattis enim ut tellus elementum sagittis vitae et leo. Vehicula ipsum a arcu cursus vitae congue mauris rhoncus. Bibendum arcu vitae elementum curabitur vitae. Et ultrices neque ornare aenean euismod elementum nisi quis. Purus viverra accumsan in nisl. Habitant morbi tristique senectus et netus et. Mi in nulla posuere sollicitudin. Eu augue ut lectus arcu bibendum at varius vel pharetra. Morbi quis commodo odio aenean sed adipiscing diam donec. Diam phasellus vestibulum lorem sed risus ultricies tristique nulla. Dignissim convallis aenean et tortor at. Tellus in metus vulputate eu. Urna neque viverra justo nec ultrices dui sapien eget mi. Vulputate enim nulla aliquet porttitor lacus luctus. Sit amet nulla facilisi morbi tempus iaculis urna id volutpat. Eu consequat ac felis donec et odio pellentesque diam', 'Andrew', '2019-10-11 16:54:22'),
(4, 'Id venenatis a condimentum vitae sapien. Enim blandit volutpat maecenas volutpat blandit aliquam etiam erat velit. Pellentesque adipiscing commodo elit at imperdiet dui accumsan. Massa sed elementum tempus egestas sed. Duis ut diam quam nulla porttitor. Vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi. Tincidunt lobortis feugiat vivamus at augue eget arcu dictum varius. Habitant morbi tristique senectus et netus et malesuada fames. Scelerisque varius morbi enim nunc faucibus a pellentesque sit. Interdum velit euismod in pellentesque massa placerat duis ultricies. Nunc pulvinar sapien et ligula ullamcorper malesuada proin libero. Pellentesque sit amet porttitor eget dolor. Viverra nibh cras pulvinar mattis nunc sed blandit libero. Porttitor leo a diam sollicitudin tempor id. Eu ultrices vitae auctor eu augue ut. Fermentum et sollicitudin ac orci phasellus egestas tellus rutrum tellus. Vulputate sapien nec sagittis aliquam malesuada bibendum.', 'Kate', '2019-10-11 16:54:35'),
(5, 'Ut placerat orci nulla pellentesque dignissim enim sit amet. Montes nascetur ridiculus mus mauris vitae. In ante metus dictum at tempor commodo ullamcorper. Hac habitasse platea dictumst vestibulum. Dictum varius duis at consectetur lorem donec massa. Eget nunc lobortis mattis aliquam. Bibendum neque egestas congue quisque egestas diam in arcu cursus. Neque convallis a cras semper auctor neque vitae. Massa placerat duis ultricies lacus sed turpis tincidunt. Id porta nibh venenatis cras sed felis eget velit aliquet. Id diam vel quam elementum pulvinar etiam. Dolor sit amet consectetur adipiscing elit pellentesque habitant. Metus vulputate eu scelerisque felis imperdiet proin fermentum leo vel. Duis convallis convallis tellus id interdum velit. Urna condimentum mattis pellentesque id nibh tortor id aliquet. Augue mauris augue neque gravida in fermentum et. Lacus vel facilisis volutpat est velit. Scelerisque fermentum dui faucibus in ornare quam viverra. Ultricies integer quis auctor elit. Fames ac turpis egestas sed tempus.', 'Oliver', '2019-10-11 16:54:46'),
(6, 'Bibendum arcu vitae elementum curabitur vitae nunc sed. Cursus mattis molestie a iaculis at erat pellentesque adipiscing commodo. Lectus arcu bibendum at varius vel pharetra vel. Rutrum quisque non tellus orci ac auctor augue mauris augue. Id diam maecenas ultricies mi eget mauris pharetra et. Orci porta non pulvinar neque laoreet suspendisse interdum consectetur. Nam libero justo laoreet sit amet. Pellentesque pulvinar pellentesque habitant morbi tristique. Aliquam vestibulum morbi blandit cursus risus. Consectetur adipiscing elit duis tristique sollicitudin nibh. Scelerisque viverra mauris in aliquam sem fringilla. Adipiscing commodo elit at imperdiet. Sed vulputate odio ut enim blandit volutpat maecenas. Sit amet nisl suscipit adipiscing bibendum est. Venenatis a condimentum vitae sapien. Scelerisque eu ultrices vitae auctor eu augue ut.', 'Daniel', '2019-10-11 16:54:58'),
(7, 'Ut porttitor leo a diam sollicitudin tempor id eu nisl. At imperdiet dui accumsan sit. Quis imperdiet massa tincidunt nunc pulvinar. Habitant morbi tristique senectus et netus et malesuada fames ac. Enim blandit volutpat maecenas volutpat blandit aliquam etiam. Nunc consequat interdum varius sit amet mattis vulputate enim nulla. Congue quisque egestas diam in arcu cursus euismod. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Vulputate sapien nec sagittis aliquam malesuada. Venenatis tellus in metus vulputate eu. Lectus quam id leo in vitae turpis massa sed. Id semper risus in hendrerit. Nulla aliquet porttitor lacus luctus accumsan tortor posuere ac. Suspendisse sed nisi lacus sed viverra. Suscipit adipiscing bibendum est ultricies integer. Penatibus et magnis dis parturient montes nascetur ridiculus mus. Nec ultrices dui sapien eget mi proin sed. Leo vel fringilla est ullamcorper eget nulla facilisi. In vitae turpis massa sed elementum.', 'Emily', '2019-10-11 16:57:14'),
(8, 'Ut etiam sit amet nisl. Sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque. Viverra nibh cras pulvinar mattis nunc sed blandit libero volutpat. Sit amet consectetur adipiscing elit duis tristique sollicitudin nibh. Sit amet est placerat in egestas erat imperdiet sed euismod. Velit ut tortor pretium viverra suspendisse potenti nullam. Tristique senectus et netus et malesuada. Neque ornare aenean euismod elementum nisi. Odio ut sem nulla pharetra. Ac placerat vestibulum lectus mauris. Aliquam eleifend mi in nulla. Tristique sollicitudin nibh sit amet commodo nulla facilisi nullam. Vitae congue eu consequat ac felis. Viverra ipsum nunc aliquet bibendum enim facilisis gravida. Quisque egestas diam in arcu cursus euismod quis viverra nibh. Aenean pharetra magna ac placerat vestibulum lectus mauris ultrices eros. Tellus in hac habitasse platea dictumst vestibulum rhoncus est. Massa sed elementum tempus egestas sed. Eget aliquet nibh praesent tristique magna sit amet. Pharetra diam sit amet nisl suscipit adipiscing bibendum est ultricies.', 'Olivia', '2019-10-11 16:57:18'),
(9, 'Sit amet purus gravida quis. Feugiat nibh sed pulvinar proin gravida. Pellentesque dignissim enim sit amet venenatis urna cursus eget. Congue quisque egestas diam in arcu cursus euismod quis. Commodo quis imperdiet massa tincidunt nunc pulvinar sapien et ligula. Nec ullamcorper sit amet risus nullam eget felis eget. Mattis enim ut tellus elementum. Eget aliquet nibh praesent tristique magna sit amet purus gravida. Feugiat in fermentum posuere urna nec tincidunt praesent semper feugiat. Nunc sed augue lacus viverra vitae congue. Interdum varius sit amet mattis. Lacinia quis vel eros donec ac odio tempor orci. Sed sed risus pretium quam vulputate dignissim. Iaculis at erat pellentesque adipiscing commodo elit at imperdiet. Tincidunt vitae semper quis lectus nulla. Et netus et malesuada fames. Sed viverra tellus in hac habitasse platea. Dui nunc mattis enim ut tellus elementum sagittis vitae. Posuere ac ut consequat semper viverra nam libero. Tortor dignissim convallis aenean et tortor at risus.', 'Jack', '2019-10-11 16:57:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `publication_id` (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
