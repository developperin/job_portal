-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2024 at 03:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `job_description` text NOT NULL,
  `job_requirements` text NOT NULL,
  `salary` varchar(50) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `job_title`, `job_description`, `job_requirements`, `salary`, `location`, `created_at`, `user_id`) VALUES
(16, 'Software Developer', 'Develop and maintain software applications.', 'Bachelor\'s degree in Computer Science, 3+ years of experience.', '$80,000 - $100,000', 'New York, NY', '2024-08-17 12:30:27', 1),
(17, 'Data Analyst', 'Analyze and interpret complex data sets.', 'Proficiency in SQL, experience with data visualization tools.', '$70,000 - $90,000', 'San Francisco, CA', '2024-08-17 12:30:27', 2),
(18, 'Project Manager', 'Manage project timelines and deliverables.', 'Strong leadership skills, PMP certification preferred.', '$90,000 - $120,000', 'Chicago, IL', '2024-08-17 12:30:27', 3),
(19, 'Graphic Designer', 'Create visual content for digital and print media.', 'Experience with Adobe Creative Suite, strong portfolio.', '$60,000 - $80,000', 'Los Angeles, CA', '2024-08-17 12:30:27', 4),
(20, 'Marketing Specialist', 'Develop and execute marketing strategies.', 'Experience in digital marketing, strong analytical skills.', '$65,000 - $85,000', 'Boston, MA', '2024-08-17 12:30:27', 5),
(21, 'Web Developer', 'Build and maintain websites and web applications.', 'Proficiency in HTML, CSS, JavaScript, and backend languages.', '$75,000 - $95,000', 'Austin, TX', '2024-08-17 12:30:27', 6),
(22, 'Customer Support Representative', 'Assist customers with inquiries and issues.', 'Excellent communication skills, experience in customer service.', '$50,000 - $60,000', 'Seattle, WA', '2024-08-17 12:30:27', 7),
(23, 'Database Administrator', 'Manage and maintain database systems.', 'Experience with MySQL, PostgreSQL, or Oracle.', '$85,000 - $105,000', 'Denver, CO', '2024-08-17 12:30:27', 8),
(24, 'HR Manager', 'Oversee recruitment and employee relations.', 'Strong understanding of HR practices and employment laws.', '$80,000 - $100,000', 'Philadelphia, PA', '2024-08-17 12:30:27', 9),
(25, 'Content Writer', 'Write and edit content for various platforms.', 'Excellent writing skills, experience with SEO.', '$55,000 - $70,000', 'San Diego, CA', '2024-08-17 12:30:27', 10),
(26, 'Sales Representative', 'Generate leads and close sales.', 'Proven track record in sales, strong negotiation skills.', '$70,000 - $90,000', 'Miami, FL', '2024-08-17 12:30:27', 11),
(27, 'Software Engineer', 'Develop and test software applications.', 'Experience with coding languages and software development.', '$85,000 - $110,000', 'San Jose, CA', '2024-08-17 12:30:27', 12),
(28, 'Business Analyst', 'Evaluate business processes and suggest improvements.', 'Strong analytical skills, experience with business analysis tools.', '$75,000 - $95,000', 'Dallas, TX', '2024-08-17 12:30:27', 13),
(29, 'Operations Manager', 'Oversee daily operations and ensure efficiency.', 'Experience in operations management, strong leadership skills.', '$90,000 - $115,000', 'Atlanta, GA', '2024-08-17 12:30:27', 14),
(30, 'UX/UI Designer', 'Design user interfaces and improve user experience.', 'Experience with UX/UI design principles, proficiency in design tools.', '$70,000 - $90,000', 'Washington, DC', '2024-08-17 12:30:27', 15),
(31, 'Network Engineer', 'Design and manage network infrastructure.', 'Experience with network protocols, strong problem-solving skills.', '$80,000 - $100,000', 'Orlando, FL', '2024-08-17 12:30:27', 16),
(32, 'Product Manager', 'Coordinate product development and market launch.', 'Experience in product management, strong project management skills.', '$95,000 - $120,000', 'Minneapolis, MN', '2024-08-17 12:30:27', 17),
(33, 'Finance Analyst', 'Analyze financial data and prepare reports.', 'Strong understanding of finance, experience with financial software.', '$70,000 - $85,000', 'San Antonio, TX', '2024-08-17 12:30:27', 18),
(34, 'Administrative Assistant', 'Provide administrative support and manage office tasks.', 'Excellent organizational skills, proficiency in office software.', '$45,000 - $55,000', 'Cleveland, OH', '2024-08-17 12:30:27', 19),
(35, 'IT Support Specialist', 'Provide technical support and troubleshoot issues.', 'Experience with IT support, strong problem-solving skills.', '$55,000 - $70,000', 'Charlotte, NC', '2024-08-17 12:30:27', 20),
(36, 'software enginner', 'Develop and test software applications.', 'Experience with coding languages and software deve...', '$85,000 - $110,000', 'San Jose, CA', '2024-08-17 12:45:55', 31),
(37, 'Web Developer', 'Provide technical support and troubleshoot issues.', 'Provide technical support and troubleshoot issues.', '12000000', 'surat', '2024-08-17 12:48:05', 32);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobilenumber` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `role` enum('company','user') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobilenumber`, `city`, `role`, `created_at`) VALUES
(32, 'nirav', 'nirav@co.in', '147852369', '963258741', 'surat', 'company', '2024-08-17 12:47:28'),
(33, 'nirav', 'niravmathukiya1507@gmail.com', '123456789', '123456789', 'SURAT', 'user', '2024-08-17 12:48:27'),
(34, 'nirav', 'xyz19072005@gmail.com', '123456789', '12345687978', '464646', 'user', '2024-08-17 12:50:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
