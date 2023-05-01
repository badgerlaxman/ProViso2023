-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 08:37 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `provisoadvising`
--

-- --------------------------------------------------------

--
-- Table structure for table `careerrequires`
--

CREATE TABLE `careerrequires` (
  `CareerID` int(11) NOT NULL,
  `SkillID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careerrequires`
--

INSERT INTO `careerrequires` (`CareerID`, `SkillID`) VALUES
(0, 0),
(0, 1),
(0, 7),
(0, 10),
(0, 13),
(0, 17),
(0, 19),
(0, 20),
(0, 22),
(0, 23),
(0, 24),
(0, 25),
(0, 26),
(0, 27),
(0, 28),
(0, 29),
(0, 30),
(0, 38),
(0, 40),
(0, 50),
(0, 52),
(0, 57),
(0, 58),
(0, 80),
(0, 81),
(1, 0),
(1, 1),
(1, 7),
(1, 9),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 40),
(1, 50),
(1, 52),
(1, 50),
(1, 52),
(1, 53),
(1, 106),
(2, 0),
(2, 1),
(2, 2),
(2, 7),
(2, 9),
(2, 22),
(2, 23),
(2, 25),
(2, 26),
(2, 28),
(2, 27),
(2, 36),
(2, 39),
(2, 41),
(2, 43),
(2, 52),
(2, 106),
(2, 17),
(3, 0),
(3, 1),
(3, 10),
(3, 11),
(3, 22),
(3, 25),
(3, 26),
(3, 28),
(3, 30),
(3, 50),
(3, 52),
(3, 58),
(3, 89),
(3, 38),
(4, 0),
(4, 1),
(4, 2),
(4, 19),
(4, 20),
(4, 22),
(4, 23),
(4, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 40),
(4, 52),
(4, 39),
(4, 49),
(4, 72),
(5, 0),
(5, 1),
(5, 7),
(5, 19),
(5, 20),
(5, 22),
(5, 24),
(5, 25),
(5, 26),
(5, 27),
(5, 28),
(5, 40),
(5, 52),
(5, 39),
(5, 62),
(5, 60),
(5, 49),
(6, 0),
(6, 1),
(6, 2),
(6, 13),
(6, 12),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 18),
(6, 22),
(6, 23),
(6, 24),
(6, 25),
(6, 26),
(6, 27),
(6, 28),
(6, 29),
(6, 41),
(6, 50),
(6, 52),
(6, 53),
(6, 57);

-- --------------------------------------------------------

--
-- Table structure for table `careers`
--

CREATE TABLE `careers` (
  `ID` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Description` varchar(2048) NOT NULL,
  `MinorIDRecommend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careers`
--

INSERT INTO `careers` (`ID`, `Title`, `Description`, `MinorIDRecommend`) VALUES
(0, 'Software Engineer', 'A software engineer is a computer science professional who uses knowledge of engineering principles and programming languages to build software products, develop computer games, run network control systems, and more. Some important skills are programming languages, object-oriented design, data structures, algorithms, source control, and databases. ', 0),
(1, 'Data Engineer', 'A data engineer designs, builds, and optimizes systems for data collection, storage, access, and analytics at scale. Important skills are data processing, knowledge of data storage, databases, SQL, and machine learning frameworks. ', 1),
(2, 'Data Scientist', 'A data scientist collects, analyzes, and interprets complex digital data in order to assist in decision-making. Some important skills are statistical analysis, machine learning, deep learning, mathematics, programming languages, and database knowledge. ', 0),
(3, 'Video Game Developer', 'Video Game Developers are involved in lots of different stages of game creation, design, and production. Game Developers conceptualize a game, create assets like graphics and sounds, write code, improve the user experience, and continuously test the game. Important skills are knowledge of game engines, object-oriented programming languages, creativity, and 2D or 3D software animation. ', 1),
(4, 'Information Security Analyst', 'Information security analysts are IT experts who help clients protect their computer networks by installing software and executing other security measures. Important skills are scripting, networks, operating systems, and cybersecurity controls and frameworks. ', 0),
(5, 'Cloud Engineer', 'A cloud engineer is an IT expert who analyzes a company\'s technology infrastructure and manages its cloud-based processes and systems. Important skills are Linux, programming languages, database skills, networking, knowledge of cloud providers, and operating systems. ', 1),
(6, 'User Experience (UX) Designer', 'A UX designer contributes to end-to-end aspects of a user\'s interaction with a product including the creation, planning, usability, function, and branding. Important skills are virtual design, software programming, user research and usability testing, Agile practices, and information architecture. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `careersavailable`
--

CREATE TABLE `careersavailable` (
  `CareerID` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careersavailable`
--

INSERT INTO `careersavailable` (`CareerID`, `CompanyID`) VALUES
(0, 0),
(0, 1),
(0, 2),
(0, 3),
(0, 4),
(0, 5),
(0, 6),
(0, 7),
(0, 8),
(0, 9),
(0, 10),
(0, 11),
(0, 12),
(0, 20),
(1, 0),
(1, 1),
(1, 2),
(1, 4),
(1, 6),
(1, 8),
(1, 12),
(1, 20),
(2, 0),
(2, 1),
(2, 3),
(2, 4),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 12),
(2, 20),
(3, 0),
(3, 4),
(3, 6),
(3, 12),
(3, 20),
(4, 0),
(4, 1),
(4, 3),
(4, 4),
(4, 6),
(4, 7),
(4, 8),
(4, 10),
(4, 11),
(5, 0),
(5, 1),
(5, 2),
(5, 3),
(5, 5),
(5, 6),
(5, 9),
(5, 11),
(5, 12),
(5, 20),
(6, 0),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 6),
(6, 10),
(6, 11),
(6, 12);

-- --------------------------------------------------------

--
-- Table structure for table `careerselected`
--

CREATE TABLE `careerselected` (
  `ID` int(11) NOT NULL,
  `CareerID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `careerselected`
--

INSERT INTO `careerselected` (`ID`, `CareerID`) VALUES
(1, 6),
(19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `ID` int(11) NOT NULL,
  `Subject` varchar(32) NOT NULL,
  `Course#` int(11) NOT NULL,
  `Title` varchar(64) NOT NULL,
  `Year` int(11) NOT NULL,
  `Class` varchar(32) GENERATED ALWAYS AS (concat(`Subject`,`Course#`)) VIRTUAL,
  `Credits` int(11) NOT NULL,
  `Semester` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`ID`, `Subject`, `Course#`, `Title`, `Year`, `Credits`, `Semester`) VALUES
(0, 'CS', 120, 'Computer Science 1', 1, 4, 3),
(1, 'CS', 121, 'Computer Science 2', 1, 3, 3),
(2, 'CS', 210, 'Programming Languages', 2, 3, 3),
(3, 'CS', 240, 'Computer Operating Systems', 2, 3, 3),
(4, 'CS', 150, 'Computer Organization and Architecture', 1, 3, 3),
(5, 'MATH', 176, 'Discrete Mathematics', 1, 3, 3),
(6, 'MATH', 170, 'Calculus 1', 1, 3, 4),
(7, 'MATH', 175, 'Calculus 2', 2, 3, 4),
(8, 'CS', 383, 'Software Engineering', 3, 4, 3),
(9, 'CS', 385, 'Theory of Computation', 3, 3, 0),
(10, 'CS', 404, 'Special Projects', 3, 3, 3),
(11, 'CS', 270, 'System Software', 2, 3, 3),
(12, 'CS', 395, 'Analysis of Algorithms', 3, 3, 3),
(13, 'CS', 360, 'Database Systems', 3, 4, 3),
(14, 'CS', 480, 'Senior Capstone Design 1', 4, 3, 3),
(15, 'CS', 481, 'Senior Capstone Design 2', 4, 3, 3),
(16, 'CS', 400, 'Contemporary Issues in Computer Science', 4, 1, 3),
(17, 'CS', 445, 'Compiler Design', 3, 4, 3),
(18, 'MATH', 330, 'Linear Algebra', 3, 3, 4),
(19, 'ENGL', 317, 'Technical Writing', 3, 3, 4),
(20, 'ENGL', 102, 'College Writing and Rhetoric', 1, 3, 4),
(21, 'COMM', 101, 'Fundamentals of Public Speaking', 1, 3, 3),
(22, 'STAT', 301, 'Probability and Statistics', 3, 3, 3),
(10057, 'ENGL', 101, 'Writing and Rhetoric', 1, 3, 4),
(10058, 'GEOL', 102, 'Historical geology', 0, 4, 3),
(10059, 'CS', 415, 'Computational Biology', 0, 3, 1),
(10060, 'CS', 477, 'Python for Machine Learning', 0, 3, 1),
(10061, 'ENGL', 175, 'Literature and Ideas', 0, 3, 3),
(10062, 'PHIL', 103, 'Intro to Ethics', 0, 3, 3),
(10063, 'SPAN', 101, 'Elementary Spanish I', 0, 4, 3),
(10064, 'SPAN', 102, 'Elementary Spanish II', 0, 4, 3),
(10065, 'HIST', 111, 'Intro to US History I', 0, 3, 4),
(10066, 'HIST', 102, 'Intro to US History II', 0, 3, 3),
(10067, 'POLS', 101, 'Intro to Political Science/American Government', 0, 3, 3),
(10068, 'BIOL', 102, 'Biology and Society', 0, 3, 4),
(10069, 'CHEM', 111, 'General Chemistry I', 0, 4, 3),
(10070, 'CHEM', 112, 'General Chemistry II', 0, 4, 3),
(10071, 'ENVS', 101, 'Intro to Environmental Science', 0, 3, 4),
(10072, 'PHYS', 211, 'Engineering Physics I', 0, 4, 3),
(10073, 'PHYS', 111, 'General Physics I', 0, 4, 3),
(10074, 'CS', 112, 'Computational Thinking and Problem Solving', 0, 3, 3),
(10075, 'CS', 431, 'SFS Professional Development', 0, 3, 3),
(10076, 'CS', 452, 'Real-time Operating Systems', 0, 3, 1),
(10077, 'CS', 460, 'Database Management Systems Design', 0, 3, 1),
(10078, 'CS', 212, 'Practical Python', 0, 3, 3),
(10079, 'CS', 398, 'Computer Science Cooperative Internship', 0, 2, 3),
(10081, 'CS', 298, 'Internship', 0, 1, 3),
(10082, 'CS', 470, 'Artificial Intelligence', 0, 3, 2),
(10083, 'CS', 466, 'PLC Programming for Automation', 0, 3, 0),
(10085, 'GEOG', 100, 'Physical Geography', 0, 4, 4),
(20001, 'MATH', 275, 'Calculus III', 2, 3, 4),
(20002, 'MATH', 310, 'Ordinary Differential Equations', 3, 3, 4),
(20003, 'MATH', 385, 'Theory of Computation', 1, 3, 5),
(20004, 'MATH', 388, 'History of Mathematics', 3, 3, 1),
(20005, 'MATH', 390, 'Axiomatic Geometry', 3, 3, 3),
(30001, 'MUS', 114, 'Studio Instruction', 1, 1, 3),
(30002, 'MUS', 114, 'Studio Instruction', 1, 1, 3),
(30003, 'MUS', 114, 'Studio Instruction', 2, 1, 3),
(30004, 'MUS', 114, 'Studio Instruction', 2, 1, 3),
(30005, 'MUS', 145, 'Piano Class 1', 1, 1, 0),
(30006, 'MUS', 146, 'Piano Class 2', 1, 1, 1),
(30007, 'MUS', 139, 'Aural Skills 1', 1, 2, 0),
(30008, 'MUS', 140, 'Aural Skills 2', 1, 2, 1),
(30009, 'MUS', 141, 'Theory of Music 1', 1, 2, 0),
(30010, 'MUS', 142, 'Theory of Music 2', 1, 2, 1),
(30011, 'MUS', 140, 'Convocation (Recital Attendance)', 0, 0, 3),
(30012, 'MUS', 140, 'Convocation (Recital Attendance)', 0, 0, 3),
(30013, 'MUS', 111, 'Introduction to Music', 1, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Responsibilities` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`ID`, `Name`, `Responsibilities`) VALUES
(0, 'Amazon', '• Collaborate with experienced cross-disciplinary Amazonians to conceive, design, and bring innovative products and services to market.\r\n• Design and build innovative technologies in a large distributed computing environment and help lead fundamental changes in the industry.\r\n• Create solutions to run predictions on distributed systems with exposure to innovative technologies at incredible scale and speed.\r\n• Build distributed storage, index, and query systems that are scalable, fault-tolerant, low cost, and easy to manage/use.\r\n• Design and code the right solutions starting with broadly defined problems.\r\n• Work in an agile environment to deliver high-quality software.'),
(1, 'Cisco', '• Designing and implementing (usually in C/C++) features to improve the reliability, simplicity, and performance of our devices, as well as make them more flexible and powerful\r\n• Bringing up our Linux-based system on new hardware platforms\r\n• Collaborating with our hardware engineers on the design of new platforms'),
(2, 'Siemens', '• Developing a proof-of-concept system for automation customers\r\n• Upgrading demo equipment for the marketing team, or creating a new demo as new products and features are released\r\n• Debugging, improving, or documenting both customer programs and internal demos\r\n• Assisting experienced Siemens Applications Engineers with their ongoing projects, which can include any of the above and more'),
(3, 'Citrix', '• Plans, designs, develops and tests software systems and/or applications for software enhancements and new products.\r\n• Apps--Uses Agile development methodology to develop user-level applications on a variety of platforms including desktop operating systems (Windows, Linux, Mac) and/or mobile operating systems (iOS, Android).\r\n• Works at any level of the application stack for different users of the product (IT vs corporate user).\r\n• Systems software--Uses virtualization technologies and techniques to develop operating systems, device drivers, utilities, and software; development tools (e.g., assemblers, compilers, etc.) for different operating system architectures (Windows, Linux, Mac OS), driver development, experience with inserting (\"\"hooking\"\") custom code into normal operating path in order to modify operation of platform.'),
(4, 'Epic Games', '• Debugging CPU, GPU, and/or peripherals of modern game consoles\r\n• Performance analysis and optimization on game consoles\r\n• Development of workflow tools for game console targets\r\n• Assist in various improvements to the EOS Client SDK.\r\n• This work could cover direct feature implementation or support (such as voice, lobbies, new features), or assist with the integration effort of the SDK into Fortnite. \r\n• Get exposure to first party platform SDK work while hooking up our crossplay features backed by Switch/XBL/PSN platform APIs. \r\n• Implement and address external team feedback and quality of life feature requests\r\n• Leverage Data from Infrastructure metrics and other resources to understand where best to implement automation\r\n• Work with the Global Infrastructure team to build requirements for automation / project for deliverable\r\n• Create documentation and presentation for what they want to implement\r\n• Working with Senior Developers/Mentor to submit code to central repository for peer reviews and feedback'),
(5, 'Climate', '• Front-end/Web Applications - JavaScript and CSS development for our web applications. We leverage several leading edge JS frameworks (including React, D3, and more). You will work primarily on the Web Interfaces for these applications, which are used by farmers to manage and insure their farms and crops. \r\n• Back-end/Platform Services - Large-scale distributed services for applications and data management. We use a mix of Java, Ruby on Rails, Python and Clojure code. You will work primarily on the back-end services that power our web and mobile applications. These cloud based services are built on AWS infrastructure and are designed for 7x24 operation, with manageability, availability, reliability and scalability in mind. \r\n• Mobile - Phone and Tablet application development for both the iOS and Android platforms. The applications complement our Web Applications by providing unique mobile device specific capabilities and core functionality to improve farming and insurance operations. \r\n• Science - Large-scale distributed data services for scientific computing (we use Clojure) \r\n• Data Analytics- we work with big-data, and invest considerably in our analytics capabilities. You will work with Hadoop/Map Reduce, RDBMS and data visualization tools '),
(6, 'Microsoft', '• Applies engineering principles to solve complex problems through sound and creative engineering. \r\n• Quickly learns new engineering methods and incorporates them into his or her work processes. \r\n• Seeks feedback and applies internal or industry best practices to improve his or her technical solutions. \r\n• Demonstrates skill in time management and completing software projects in a cooperative team environment. '),
(7, 'TuSimple', '• Research and prototype development using deep learning and machine learning algorithms for the most challenging problems in multi-sensor perception and fusion, including camera, LiDAR, RADAR, etc. \r\n• Deliver high-quality, robust, and reliable codes for the perception system on the L4 autonomous driving trucks. \r\n• Collaborate with other engineers on cross-functional efforts.'),
(8, 'Addepar', '• Manage individual project priorities, deadlines, and deliverables.\r\n• Collaborate effectively with product managers, engineers and team members on your project.\r\n• Document software functionality, system design, and project plans; this includes clean, readable code with comments.\r\n• Learn and demonstrate engineering standard processes and principles.\r\n• Produce a retrospective and demonstrate your summer project to an internal audience.'),
(9, 'Coda', '• Work with our product, design and growth teams to enhance Coda, while working with new product features, APIs, performance, quality, and scale—we will match you to a project based on your interests\r\n• Learn and deepen your experience with React, TypeScript, NodeJS, Kubernetes, and AWS\r\n• Work in a collaborative environment across multiple geo-located offices (locations in Seattle, San Francisco, and Mountain View). Like many of our engineers, you can also work remotely\r\n• Help ensure our customers have an excellent experience using Coda'),
(10, 'IXL Learning', 'As a Software Engineer, you will build the back-end wiring, application logic, and UI that engage our users. You will find and use the best technologies to add features and create new products. You’ll be involved in all aspects of the development process – including design, coding, testing, debugging, and tuning. You will own your projects from start to end as they travel through our fast-paced development cycle. In addition to working with your fellow engineers, you’ll collaborate with other teams to design amazing products that meet the needs of our users, who are students and teachers all over the world.'),
(11, 'iboss', '• Ability to design and develop clean and maintainable code\r\n• Quickly understand and extend engineering architectural patterns\r\n• Document engineering designs\r\n• Analyze and estimate development efforts\r\n• Deliver high quality code that has been thoroughly tested'),
(12, 'Oracle', '• Work individually or as part of a team of problem solvers, using a structured project delivery method to help solve complex business issues from strategy to execution in cloud-based environments. \r\n• Deliver high-quality projects, identify and make suggestions for improvements when problems or opportunities arise, advise on industry best practices, and manage gaps in customer requirements and NetSuite functionality.\r\n• Consult with clients to understand their business requirements, map them to NetSuite, and support them in configuring their NetSuite systems. You will help them transition to new ways of working by designing and developing creative scripted solutions, leveraging the powerful features of the NetSuite SuiteCloud platform.'),
(13, 'Carson last\'s custom selection', 'Custom skills.'),
(15, '19 19\'s custom selection', 'Custom skills.'),
(16, 'carson sloan\'s custom selection', 'Custom skills.'),
(20, 'IBM', ''),
(21, '13 13\'s custom selection', 'Custom skills.');

-- --------------------------------------------------------

--
-- Table structure for table `minors`
--

CREATE TABLE `minors` (
  `ID` int(11) NOT NULL,
  `Minor` varchar(255) NOT NULL,
  `Description` varchar(2048) DEFAULT NULL,
  `Subject` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minors`
--

INSERT INTO `minors` (`ID`, `Minor`, `Description`, `Subject`) VALUES
(0, 'Mathematics', 'A minor in mathematics can help build stronger credentials for employment and improve your opportunities to attend graduate school. A mathematics minor can be added to any degree program and requires just eight courses (26 credits) to complete. Computer Science, Physics, and most Engineering majors can qualify for this minor by taking one to three extra courses.', 'MATH'),
(1, 'Music', 'No audition is required to become a music minor. This is a great way for students to continue exploring music at the University of Idaho while pursuing another degree. Eleven courses (21 credits) are required for a music minor. ', 'MUS');

-- --------------------------------------------------------

--
-- Table structure for table `minorselected`
--

CREATE TABLE `minorselected` (
  `ID` int(11) NOT NULL,
  `MinorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `minorselected`
--

INSERT INTO `minorselected` (`ID`, `MinorID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

CREATE TABLE `prerequisites` (
  `Class` varchar(32) NOT NULL,
  `Prereq` varchar(32) NOT NULL,
  `Requirement` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`Class`, `Prereq`, `Requirement`) VALUES
('CS121', 'CS120', ''),
('CS121', 'MATH176', ''),
('MATH175', 'MATH170', 'C or better'),
('CS270', 'CS121', ''),
('CS240', 'CS270', 'Corequisite'),
('CS240', 'CS121', ''),
('CS240', 'CS150', ''),
('CS210', 'CS121', ''),
('STAT301', 'MATH175', ''),
('CS383', 'CS210', ''),
('CS383', 'CS240', ''),
('CS383', 'CS270', ''),
('MATH330', 'MATH170', 'MATH175 recommended'),
('CS395', 'MATH175', ''),
('CS395', 'CS121', ''),
('CS360', 'CS240', ''),
('CS360', 'CS270', ''),
('ENGL317', 'ENGL102', 'Junior standing'),
('CS480', 'CS383', 'Senior standing'),
('CS480', 'ENGL317', 'Senior standing'),
('CS445', 'CS210', ''),
('CS445', 'CS385', ''),
('CS481', 'CS480', ''),
('CS445', 'CS210', NULL),
('CS445', 'CS385', NULL),
('CS460', 'CS360', NULL),
('CS415', 'CS120', NULL),
('CS452', 'CS240', NULL),
('CS477', 'CS121', NULL),
('CS477', 'STAT301', NULL),
('CS470', 'CS210', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `requires`
--

CREATE TABLE `requires` (
  `CompanyID` int(11) NOT NULL,
  `SkillID` int(11) NOT NULL,
  `Priority` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requires`
--

INSERT INTO `requires` (`CompanyID`, `SkillID`, `Priority`) VALUES
(0, 51, 0),
(0, 52, 1),
(0, 53, 2),
(0, 54, 1),
(0, 55, 1),
(0, 56, 1),
(0, 58, 1),
(0, 59, 0),
(0, 0, -1),
(0, 1, -1),
(0, 3, -1),
(0, 7, -1),
(0, 10, -1),
(0, 15, -1),
(0, 42, -1),
(1, 52, 0),
(1, 1, -1),
(1, 0, -1),
(1, 49, -1),
(1, 60, 1),
(1, 40, 0),
(1, 61, 0),
(1, 62, 0),
(1, 63, 0),
(1, 20, 0),
(1, 64, 1),
(1, 58, 0),
(2, 52, 0),
(2, 65, 0),
(2, 66, -1),
(2, 10, -1),
(2, 1, -1),
(2, 0, -1),
(2, 3, -1),
(2, 7, -1),
(2, 67, -1),
(2, 68, -1),
(2, 42, -1),
(2, 15, -1),
(2, 40, 1),
(2, 69, 1),
(2, 70, 2),
(2, 71, 2),
(2, 72, 1),
(3, 73, 0),
(3, 57, 1),
(3, 51, 0),
(3, 34, 0),
(3, 1, -1),
(3, 0, -1),
(3, 3, -1),
(3, 74, 0),
(3, 75, 0),
(3, 76, 0),
(3, 78, 1),
(3, 49, 1),
(4, 73, 0),
(4, 0, 0),
(4, 79, 0),
(4, 80, 0),
(4, 81, 0),
(4, 82, 1),
(4, 26, 1),
(4, 10, 1),
(4, 40, 0),
(4, 54, 0),
(4, 64, 1),
(4, 83, 1),
(4, 7, 1),
(4, 39, 1),
(4, 84, 2),
(4, 19, 2),
(4, 85, 1),
(4, 38, 0),
(5, 73, 0),
(5, 38, 0),
(5, 40, 0),
(5, 51, 0),
(5, 86, 0),
(5, 50, 1),
(5, 59, 1),
(5, 20, 1),
(5, 27, 1),
(5, 62, 1),
(5, 42, 1),
(5, 12, 2),
(5, 87, 2),
(5, 88, 2),
(5, 3, 1),
(5, 7, 1),
(5, 44, 2),
(5, 67, 2),
(5, 68, 2),
(7, 52, 0),
(7, 64, 0),
(7, 7, -1),
(7, 0, -1),
(7, 42, 0),
(7, 87, 0),
(7, 84, 0),
(7, 89, 1),
(7, 90, 1),
(7, 55, 1),
(8, 73, 0),
(8, 38, 0),
(8, 51, 0),
(8, 23, 0),
(8, 58, 0),
(8, 33, 1),
(8, 40, 0),
(8, 83, 0),
(8, 7, 0),
(8, 3, 0),
(8, 55, 0),
(8, 42, 0),
(8, 17, 0),
(8, 91, 0),
(8, 62, 0),
(8, 39, 0),
(9, 58, 0),
(9, 73, 0),
(9, 0, -1),
(9, 1, -1),
(9, 3, -1),
(9, 7, -1),
(9, 10, -1),
(9, 42, -1),
(9, 44, -1),
(9, 92, 1),
(9, 87, 1),
(9, 84, 1),
(9, 55, 1),
(9, 93, 1),
(9, 56, 1),
(10, 52, 0),
(10, 51, 0),
(10, 33, 1),
(10, 58, 1),
(10, 3, 1),
(10, 7, 1),
(10, 17, 1),
(10, 42, 1),
(10, 20, 1),
(10, 62, 1),
(10, 67, 1),
(10, 68, 1),
(10, 94, 1),
(11, 59, 0),
(11, 3, 0),
(11, 42, 0),
(11, 13, 0),
(11, 12, 0),
(11, 17, 0),
(11, 30, 0),
(11, 38, 0),
(11, 57, 0),
(11, 20, 0),
(11, 58, 0),
(11, 32, 0),
(11, 23, 0),
(11, 95, 1),
(11, 96, 1),
(11, 97, 1),
(11, 40, 1),
(11, 50, 1),
(11, 83, 1),
(12, 52, 0),
(12, 51, 0),
(12, 38, 0),
(12, 74, 1),
(12, 49, 1),
(12, 40, 1),
(12, 42, 1),
(12, 3, 0),
(12, 15, 1),
(12, 98, 1),
(12, 13, 0),
(12, 50, 0),
(12, 41, 0),
(12, 83, 0),
(12, 33, 1),
(12, 56, 0),
(12, 58, 0),
(12, 87, 1),
(10, 86, 2),
(11, 86, 0),
(13, 18, 0),
(13, 0, 0),
(13, 3, 0),
(13, 1, 0),
(14, 14, 0),
(15, 0, 0),
(16, 8, 0),
(16, 13, 0),
(16, 7, 0),
(15, 87, 0),
(15, 3, 0),
(15, 7, 0),
(15, 90, 0),
(15, 84, 0),
(15, 42, 0),
(15, 12, 0),
(15, 13, 0),
(15, 17, 0),
(15, 106, 0),
(15, 93, 0),
(15, 57, 0),
(15, 50, 0),
(20, 0, 1),
(20, 87, 1),
(20, 3, 1),
(20, 7, 1),
(20, 90, 1),
(20, 84, 1),
(20, 42, 1),
(20, 12, 1),
(20, 13, 1),
(20, 17, 1),
(20, 106, 1),
(20, 93, 1),
(20, 57, 1),
(20, 50, 1),
(15, 4, 0),
(15, 16, 0),
(15, 2, 0),
(21, 1, 0),
(21, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `selections`
--

CREATE TABLE `selections` (
  `ID` int(11) NOT NULL,
  `CompanyID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `selections`
--

INSERT INTO `selections` (`ID`, `CompanyID`) VALUES
(1, 21);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`ID`, `Name`, `Description`) VALUES
(0, 'C++', 'Good understanding of C++ design and programming principles.'),
(1, 'C', 'Good understanding of low level programming in C.'),
(2, 'Research', ''),
(3, 'Java', ''),
(4, 'Memory management', ''),
(5, 'Prolog', ''),
(6, 'YACC', ''),
(7, 'Python', ''),
(8, 'SML', ''),
(9, 'R', ''),
(10, 'C#', ''),
(11, 'Unity', ''),
(12, 'CSS', ''),
(13, 'HTML', ''),
(14, 'Bootstrap', ''),
(15, 'PHP', ''),
(16, 'Laravel', ''),
(17, 'SQL', ''),
(18, 'MySQL', ''),
(19, 'Bash', ''),
(20, 'Unix', ''),
(21, 'Batch', ''),
(22, 'Ethics', ''),
(23, 'Technical writing', ''),
(24, 'Makefile', ''),
(25, 'Git', ''),
(26, 'GitHub', ''),
(27, 'Command line editors', ''),
(28, 'Calculus', ''),
(29, 'Relational algebra', ''),
(30, 'Design patterns', ''),
(31, 'Time management diagrams', ''),
(32, 'Oral communication', ''),
(33, 'Formal logic', ''),
(34, 'Integrated circuits', ''),
(35, 'Digital logic', ''),
(36, 'Statistics', ''),
(37, 'Probability', ''),
(38, 'Object oriented programming', ''),
(39, 'Scripting', ''),
(40, 'Networking', ''),
(41, 'Unit testing', ''),
(42, 'JavaScript', ''),
(43, 'Research papers', ''),
(44, 'Ruby on Rails', ''),
(45, 'Binary', ''),
(46, 'Regular expressions', ''),
(47, 'Finite state machines', ''),
(48, 'Turing machines', ''),
(49, 'Operating systems', ''),
(50, 'Debugging', ''),
(51, 'Software development experience', ''),
(52, 'Completed BS CS', ''),
(53, 'Full stack development', ''),
(54, 'Distributed systems', ''),
(55, 'AWS platform', ''),
(56, 'Client communication', ''),
(57, 'Agile development', ''),
(58, 'Team programming', ''),
(59, '1 year of experience', ''),
(60, 'OS design', ''),
(61, 'Embedded platforms', ''),
(62, 'Linux', ''),
(63, 'Working in kernel space', ''),
(64, 'Internship experience', ''),
(65, 'Microsoft office suite', ''),
(66, 'Ladder logic', ''),
(67, 'iOS development', ''),
(68, 'Android development', ''),
(69, 'Windows app development', ''),
(70, 'Engineering statics and dynamics', ''),
(71, 'Power electronics', ''),
(72, 'Control systems', ''),
(73, 'Seeking BS CS', ''),
(74, 'Hardware architecture', ''),
(75, 'Reverse engineering', ''),
(76, 'Low level debugging', ''),
(77, 'Compiler design', ''),
(78, 'Device drivers', ''),
(79, 'Basic game design', ''),
(80, 'Data structures', ''),
(81, 'Algorithm design', ''),
(82, 'Performance optimization', ''),
(83, 'REST architectural style', ''),
(84, 'Node.js', ''),
(85, 'MongoDB', ''),
(86, 'Server design', ''),
(87, 'React', ''),
(88, 'Clojure', ''),
(89, '3D graphics', ''),
(90, 'Flask', ''),
(91, 'Database transaction logging', ''),
(92, 'TypeScript', ''),
(93, 'Kubernetes', ''),
(94, 'Apache', ''),
(95, 'Apache Tomcat', ''),
(96, 'Spring Framework', ''),
(97, 'AngularJS', ''),
(98, '.NET', ''),
(99, 'Leadership', ''),
(100, 'Biology', ''),
(101, 'Spanish', ''),
(102, 'Chemistry', ''),
(103, 'Physics', ''),
(104, 'Geology', ''),
(105, 'Geography', ''),
(106, 'Machine Learning', ''),
(107, 'TensorFlow', ''),
(108, 'Environmental Science', ''),
(109, 'Government', ''),
(110, 'U.S. History', ''),
(111, 'Security', ''),
(112, 'Lisp', '');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `ID` int(11) NOT NULL,
  `Password` varchar(64) NOT NULL,
  `First` varchar(32) NOT NULL,
  `Last` varchar(32) NOT NULL,
  `Major` varchar(32) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `Password`, `First`, `Last`, `Major`, `Year`) VALUES
(0, '$2y$10$ZK6Kw.rMh3NYahjm5lzDf.MdrHuPz7ah9k.gYtGoMMId34DsnyGjy', 'youre', 'mom', 'CS', 2023),
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Jane', 'Doe', 'Computer Science', 1),
(2, 'daeccf0ad3c1fc8c8015205c332f5b42', 'Molly', 'Meadows', 'Computer Science', 3),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Carson', 'Sus', 'CS', 1),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'Bob', 'Joe', 'Computer Science', 2),
(5, 'p', 'Billy', 'Bob', 'Computer Science', 2),
(6, '6', '6', '6', 'Computer Science', 2),
(7, '$2y$10$a2nrNGYkDAKroNxm6WM23eGPSiPFTPXCm7aPZX0/wvmqkdul53zea', '7', '7', 'CS', 2),
(8, '$2y$10$i5nd7Jgb4jmXhZcI8wY4AOjqLymSeeQmlQgO2qZtXAinnQdhDFKWS', '8', '8', 'CS', 3),
(9, '$2y$10$kxknGERlFFXmc0Y0yIqgEecd8jiafhmpLl86MLM78y2i9qqvXw2Fu', '9', '9', '9', 9),
(10, '$2y$10$662bmVRhNUi.nRyR5oVNk.WNBkD7Rz8cqCpo8ZIFM8mMJ5EIvMs7O', '10', '10', '10', 10),
(11, '$2y$10$v2AVgCDo30piBQdZqaBJD.xu.gJe9RzdeuR0z073slcFrIZ5BIRtW', '11', '11', '11', 11),
(12, '$2y$10$/xe9tv5OJ9L5sgKaGqWcxudPDUsXM0tx19i99ioxRCG/YgL8COQ5u', '12', '12', '12', 12),
(13, '$2y$10$2YvuIFfujz1nnuYGpQ.B4.45LckFiFktHrj5dQKMgl6Zu51h.8Hde', '13', '13', '13', 13),
(15, '$2y$10$I5SynFaiOygxa4LvPUtP/ehlBC0t9h2FrSPYrd8dXajWu2fKufEEi', '15', '15', 'CS', 2),
(16, '$2y$10$XRfozIneOWcIr/e0mrd9i.rde51.V0qf5tVdySRXftzgPq9JYsy6i', '16', '16', '16', 16),
(17, '$2y$10$0a7Wk08z04iWfIopDEYp.uDZxx7/5PQoqOXi2o5CBwzPloNjGQGz6', '17', '17', '17', 17),
(18, '$2y$10$AvE9J6/6pfvMX3ME8ratKeuorzUKjfNX77sgympXffzSc1f0Ivg.i', '18', '18', '18', 18),
(19, '$2y$10$SXR.CIiMvJ9UgKKKeUpfMOMEamihXtS80mUIPamfRrMoH7acAXpLa', '19', '19', '19', 19),
(100, '$2y$10$G9fYlPktsuUiyCQeJvyuyuQPrul2DdNfdmIMnhWfedAQs.H.Un6Hu', 'Janet', 'Doe', 'CS', 1),
(1234, 'd41d8cd98f00b204e9800998ecf8427e', 'John', 'Doe', 'Computer Science', 1),
(1300, '$2y$10$BBVWZsYGgFr.qbWZB.0Xguk9Islb8AFvA4EEnngPMPDEaA5OhnDPm', 'Jackson', 'Baldwin', 'CS', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `ID` int(11) NOT NULL,
  `Name` varchar(32) NOT NULL,
  `Responsibilities` varchar(2048) NOT NULL,
  `SkillIDs` varchar(2048) NOT NULL,
  `User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `taken`
--

CREATE TABLE `taken` (
  `ID` int(11) NOT NULL,
  `Class` varchar(8) NOT NULL,
  `Grade` varchar(1) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `taken`
--

INSERT INTO `taken` (`ID`, `Class`, `Grade`, `Year`) VALUES
(1234, 'MATH170', '', 1),
(1234, 'MATH176', '', 1),
(1234, 'ENGL102', '', 1),
(1234, 'COMM101', '', 1),
(1234, 'CS120', '', 1),
(2, 'CS120', '', 1),
(2, 'CS120', '', 1),
(4, 'CS120', '', 1),
(4, 'CS480', '', 4),
(2, 'CS120', 'A', 1),
(19, 'CS121', 'A', 1),
(19, 'CS120', 'A', 1),
(19, 'CS210', 'C', 2),
(19, 'CS240', 'B', 2),
(19, 'CS150', 'A', 1),
(19, 'MATH176', 'A', 1),
(19, 'MATH175', 'A', 1),
(19, 'MATH170', 'A', 1),
(1, 'CS120', 'A', 1),
(1, 'CS121', 'C', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teaches`
--

CREATE TABLE `teaches` (
  `Class` varchar(32) NOT NULL,
  `SkillID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `teaches`
--

INSERT INTO `teaches` (`Class`, `SkillID`) VALUES
('CS120', 0),
('CS121', 0),
('CS121', 1),
('ENGL317', 2),
('ENGL102', 2),
('CS480', 2),
('CS481', 2),
('CS383', 10),
('CS383', 11),
('CS383', 25),
('CS383', 26),
('CS383', 30),
('CS383', 31),
('CS150', 45),
('CS150', 35),
('CS150', 34),
('CS210', 3),
('CS210', 5),
('CS210', 6),
('CS210', 7),
('CS210', 8),
('CS360', 12),
('CS360', 13),
('CS360', 14),
('CS360', 15),
('CS360', 16),
('CS360', 17),
('CS360', 18),
('ENGL317', 23),
('COMM101', 32),
('STAT301', 36),
('STAT301', 37),
('MATH170', 28),
('MATH175', 28),
('CS121', 45),
('CS240', 19),
('CS270', 19),
('CS121', 27),
('CS210', 27),
('CS240', 27),
('CS270', 27),
('MATH176', 33),
('MATH176', 37),
('CS270', 39),
('CS385', 46),
('CS385', 29),
('CS240', 49),
('CS150', 47),
('CS150', 48),
('CS480', 43),
('CS481', 43),
('ENGL317', 43),
('CS240', 21),
('CS270', 40),
('CS210', 38),
('CS120', 38),
('CS400', 22),
('CS240', 20),
('CS270', 20),
('CS398', 64),
('CS398', 59),
('CS298', 64),
('ENGL175', 23),
('ENGL175', 43),
('MATH330', 28),
('CS385', 33),
('CS385', 47),
('CS385', 48),
('CS383', 99),
('POLS101', 109),
('CS383', 89),
('CS383', 79),
('CS383', 58),
('CS383', 59),
('CS383', 56),
('CS383', 41),
('CS383', 82),
('CS112', 38),
('ENGL101', 23),
('ENGL101', 32),
('HIST111', 110),
('HIST102', 110),
('SPAN101', 101),
('SPAN102', 101),
('CS415', 100),
('CS452', 4),
('CS452', 45),
('CS452', 49),
('CS452', 60),
('CS452', 61),
('CS452', 63),
('CS452', 76),
('CS452', 82),
('CHEM111', 102),
('ENVS101', 108),
('CHEM112', 102),
('CS445', 77),
('CS445', 76),
('CS445', 74),
('CS445', 6),
('CS212', 7),
('CS212', 39),
('GEOG100', 105),
('GEOL102', 104),
('PHYS111', 103),
('PHIL103', 22),
('CS460', 17),
('CS460', 80),
('CS460', 18),
('CS460', 91),
('CS460', 85),
('CS460', 82),
('CS460', 2),
('CS460', 54),
('CS460', 111),
('CS466', 35),
('CS466', 72),
('CS466', 66),
('CS466', 40),
('CS466', 45),
('CS470', 112),
('CS470', 80),
('CS470', 106),
('CS470', 81),
('CS395', 81),
('CS395', 82),
('CS477', 106),
('CS477', 7),
('CS477', 80),
('CS477', 58),
('BIOL102', 100),
('PHYS211', 103),
('CS383', 51),
('CS360', 53),
('CS240', 62),
('CS240', 86),
('CS270', 24),
('CS383', 57),
('CS466', 71),
('CS360', 94),
('CS210', 50),
('CS120', 50),
('CS121', 50),
('CS383', 50),
('STAT301', 9),
('CS240', 78);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `created_at` timestamp NULL DEFAULT NULL,
  `email` varchar(64) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `id` bigint(20) NOT NULL,
  `name` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `remember_token` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`created_at`, `email`, `email_verified_at`, `id`, `name`, `password`, `remember_token`, `updated_at`) VALUES
('2023-04-27 00:08:45', 'fake@gmail.com', NULL, 0, 'youre mom', '$2y$10$sEMPdVQjUDNtfc6OyLRYyu2w6z57SUvA41usQxdz4j9lIDGN5tuyK', NULL, '2023-04-27 00:08:45'),
('2022-11-24 08:27:52', '13', NULL, 1, '13 13', '$2y$10$HAlv.ZdzTbtVfPU.SqQLO.F3HhwfWA27UcAnHsCi68bR5vSPmtmL6', NULL, '2022-11-24 08:27:52'),
('2022-11-30 10:32:21', '15', NULL, 2, '15 15', '$2y$10$wI0hlidYQtoii1bkxDUdp.JCYI2Vp67qSJqPxpiBHSFVy9YJ.SON.', NULL, '2022-11-30 10:32:21'),
('2022-12-01 02:50:42', '19', NULL, 19, '19 19', '$2y$10$8RVX7VBMzTj9jKk.dS49jexp4R6MvoOaLy4OxCU6lq5.AX/05sHoa', NULL, '2022-12-01 02:50:42'),
('2022-12-18 01:23:39', 'temp@gmail', NULL, 100, 'Janet Doe', '$2y$10$BjYFlwkmmcS7IygMGd0BkuNVuwjVLf2zgsrIU9QPb9Tq0ThaPcyKG', NULL, '2022-12-18 01:23:39'),
('2023-04-27 00:40:10', '1200', NULL, 1300, 'Jackson Baldwin', '$2y$10$MSobVRDfk3J.1qZvVlaOjujDHW7IUqgteBD6SwQoFBRCoP1ewKURa', NULL, '2023-04-27 00:40:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `careerselected`
--
ALTER TABLE `careerselected`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `minors`
--
ALTER TABLE `minors`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `minorselected`
--
ALTER TABLE `minorselected`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`ID`);

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
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30014;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
