-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2025 at 11:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `first_name`, `last_name`, `username`, `password`) VALUES
(1, 'Prajwal', 'Giri', 'Prajwal', '$2y$10$fTOIOdviuQqOyCLywFbYHOO8mESGFkRRX6IcHhYrTnXOmzMJv6DFu');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Cybersecurity'),
(2, 'AI'),
(6, 'Programming'),
(8, 'Data Science'),
(11, 'Machine Learning');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `user_id`, `post_id`, `created_at`) VALUES
(22, 'I love PHP and it is a good programming language for backend development', 13, 20, '2024-11-27 05:58:17'),
(23, 'Data Science is an interesting topic ', 13, 19, '2024-11-27 06:00:25'),
(27, 'I love penetration testing', 16, 16, '2024-11-27 08:24:10'),
(28, 'Wow very influencial', 16, 22, '2024-11-27 08:24:46'),
(29, 'I like more designing, can you please share about the UI/UX design', 20, 16, '2024-11-27 08:30:30'),
(30, 'wow now time for master in cybersecurity in gandaki university', 20, 22, '2024-11-27 08:31:22'),
(31, 'I don\'t understand the data science topic', 20, 19, '2024-11-27 08:32:19'),
(32, 'babaal xa hai vai', 15, 23, '2024-12-03 08:54:26'),
(33, 'wow I love cyber security', 13, 22, '2025-10-15 15:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(127) NOT NULL,
  `post_text` longtext DEFAULT NULL,
  `category` int(11) NOT NULL,
  `publish` int(2) NOT NULL DEFAULT 1,
  `cover_url` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_text`, `category`, `publish`, `cover_url`, `created_at`) VALUES
(16, 'Penetration testing', '<b><u><font face=\"Arial Black\"><h4>Penetration Testing</h4></font></u></b><div>Penetration testing, also known as pen testing or ethical hacking,is a simulated cyber attack performed to evaluate the security of a computer system, network, or web application</div><div>Penetration testing, also known as pen testing or ethical hacking,is a simulated cyber attack performed to evaluate the security of a computer system, network, or web applicati</div><div><b>Penetration testing, also known as pen testing or ethical hacking,is a simulated cyber attack performed to evaluate the security of a computer system, network, or web applicati</b></div>                                ', 1, 1, 'COVER-673716ca630c84.28672090.jpg', '2024-08-12 22:17:29'),
(19, 'The data science lifecycle', '<div>The data science lifecycle refers to the various stages a data science project generally undergoes, from initial conception and data collection to communicating results and insights.</div><div>Despite every data science project being unique—depending on the problem, the industry it\'s applied in, and the data involved—most projects follow a similar lifecycle.</div><div>This lifecycle provides a structured approach for handling complex data, drawing accurate conclusions, and making data-driven decisions.</div><div><br></div><div><div>Here are the five main phases that structure the data science lifecycle:</div><h4 id=\"data-collection-and-storage-thisi\" dir=\"ltr\" style=\"margin-top: 8px; margin-bottom: 16px; max-width: 100%; font-size: 1.25rem; scroll-margin-top: 80px; color: rgb(5, 25, 45); font-family: Studio-Feixen-Sans, Arial;\">Data collection and storage</h4><div>This initial phase involves collecting data from various sources, such as databases, Excel files, text files, APIs, web scraping, or even real-time data streams. The type and volume of data collected largely depend on the problem you’re addressing.</div><div>Once collected, this data is stored in an appropriate format ready for further processing. Storing the data securely and efficiently is important to allow quick retrieval and processing.</div><h4 id=\"data-preparation-often\" dir=\"ltr\" style=\"margin-top: 8px; margin-bottom: 16px; max-width: 100%; font-size: 1.25rem; scroll-margin-top: 80px; color: rgb(5, 25, 45); font-family: Studio-Feixen-Sans, Arial;\">Data preparation</h4><div>Often considered the most time-consuming phase, data preparation involves cleaning and transforming raw data into a suitable format for analysis. This phase includes handling missing or inconsistent data, removing duplicates, normalization, and data type conversions. The objective is to create a clean, high-quality dataset that can yield accurate and reliable analytical results.</div><h4 id=\"exploration-and-visualization-durin\" dir=\"ltr\" style=\"margin-top: 8px; margin-bottom: 16px; max-width: 100%; font-size: 1.25rem; scroll-margin-top: 80px; color: rgb(5, 25, 45); font-family: Studio-Feixen-Sans, Arial;\">Exploration and visualization</h4><div>During this phase, data scientists explore the prepared data to understand its patterns, characteristics, and potential anomalies. Techniques like statistical analysis and data visualization summarize the data\'s main characteristics, often with visual methods.</div><div>Visualization tools, such as charts and graphs, make the data more understandable, enabling stakeholders to comprehend the data trends and patterns better.</div><h4 id=\"experimentation-and-prediction-datas\" dir=\"ltr\" style=\"margin-top: 8px; margin-bottom: 16px; max-width: 100%; font-size: 1.25rem; scroll-margin-top: 80px; color: rgb(5, 25, 45); font-family: Studio-Feixen-Sans, Arial;\">Experimentation and prediction</h4><div>Data scientists use&nbsp;<a href=\"https://www.datacamp.com/blog/top-machine-learning-use-cases-and-algorithms\" target=\"_blank\" rel=\"noopener\" style=\"max-width: 100%; color: rgb(0, 117, 173); font-weight: 700; text-decoration-line: none; font-family: Studio-Feixen-Sans !important;\">machine learning algorithms</a>&nbsp;and statistical models to identify patterns, make predictions, or discover insights in this phase. The goal here is to derive something significant from the data that aligns with the project\'s objectives, whether predicting future outcomes, classifying data, or uncovering hidden patterns.</div><h4 id=\"data-storytelling-and-communication-thefi\" dir=\"ltr\" style=\"margin-top: 8px; margin-bottom: 16px; max-width: 100%; font-size: 1.25rem; scroll-margin-top: 80px; color: rgb(5, 25, 45); font-family: Studio-Feixen-Sans, Arial;\">Data Storytelling and communication</h4><div>The final phase involves interpreting and communicating the results derived from the data analysis. It\'s not enough to have insights; you must communicate them effectively, using clear, concise language and compelling visuals. The goal is to convey these findings to non-technical stakeholders in a way that influences decision-making or drives strategic initiatives.</div><div>Understanding and implementing this lifecycle allows for a more systematic and successful approach to data science projects. Let\'s now delve into why data science is so important.</div></div>                ', 8, 1, 'COVER-6745920d7b2c65.25344036.png', '2024-11-26 15:02:01'),
(20, 'PHP for backend development', '<div><b><u>PHP (Hypertext Preprocessor)</u></b> is one of the most popular server-side scripting languages used for backend development. It is open-source, flexible, and highly efficient for creating dynamic web applications and websites. Since its introduction in 1995, PHP has evolved to power a significant portion of the web, including platforms like WordPress, Facebook, and Wikipedia.<font face=\"Arial Black\"><br><br></font><h3><font face=\"Arial Black\"><span style=\"font-size:20px;\"><span style=\"font-size:22px;\"><span style=\"font-size:24px;\">Key Features of PHP for Backend Development:</span></span></span></font></h3><ol><li><div><strong>Server-Side Execution</strong>:</div><ul><li>PHP code is executed on the server, generating HTML or other outputs that are sent to the client browser. This ensures security and a lightweight client experience.</li></ul></li><li><div><strong>Integration with Databases</strong>:</div><ul><li>PHP supports a wide range of databases like MySQL, PostgreSQL, MariaDB, and SQLite. Its integration capabilities make it ideal for applications that require robust data handling.</li></ul></li><li><div><strong>Frameworks for Enhanced Development</strong>:</div><ul><li>PHP frameworks like Laravel, Symfony, CodeIgniter, and CakePHP simplify development by offering built-in tools for routing, authentication, database migration, and templating.</li></ul></li><li><div><strong>Cross-Platform Support</strong>:</div><ul><li>PHP works seamlessly across various operating systems, including Linux, Windows, and macOS, making it a versatile choice for developers.</li></ul></li><li><div><strong>Easy to Learn and Use</strong>:</div><ul><li>With a straightforward syntax, PHP is beginner-friendly while also offering advanced features for seasoned developers.</li></ul></li><li><div><strong>Rich Library Support</strong>:</div><ul><li>PHP comes with extensive libraries and built-in functions to handle tasks like file manipulation, session management, and email sending.</li></ul></li><li><div><strong>Scalability</strong>:</div><ul><li>PHP applications can handle small personal websites and scale up to enterprise-level solutions with proper architecture.</li></ul></li><li><div><strong>Community Support</strong>:</div><ul><li>With a large, active developer community, PHP benefits from extensive documentation, tutorials, and forums, making troubleshooting and learning easier.</li></ul></li></ol><hr><h3>Why Choose PHP for Backend Development?</h3><ol><li><div><strong>Dynamic Content Management</strong>:</div><ul><li>PHP excels in creating dynamic content, such as blogs, e-commerce websites, and social networks.</li></ul></li><li><div><strong>Cost-Effective Development</strong>:</div><ul><li>Being open-source, PHP is free to use, reducing the cost of development.</li></ul></li><li><div><strong>Compatibility with Web Servers</strong>:</div><ul><li>PHP is compatible with major web servers like Apache, Nginx, and IIS.</li></ul></li><li><div><strong>Security Features</strong>:</div><ul><li>Built-in features like data encryption and support for third-party security libraries help secure PHP applications.</li></ul></li><li><div><strong>Fast Prototyping</strong>:</div><ul><li>The simplicity and speed of PHP enable rapid development and prototyping of web applications.</li></ul></li></ol><hr><h3>Common Use Cases of PHP in Backend Development:</h3><ol><li><div><strong>Content Management Systems (CMS)</strong>:</div><ul><li>Examples: WordPress, Joomla, and Drupal.</li></ul></li><li><div><strong>E-commerce Platforms</strong>:</div><ul><li>Examples: Magento, OpenCart, and WooCommerce.</li></ul></li><li><div><strong>Custom Web Applications</strong>:</div><ul><li>Examples: Social networks, forums, and SaaS platforms.</li></ul></li><li><div><strong>API Development</strong>:</div><ul><li>PHP is widely used to create RESTful APIs and microservices.</li></ul></li><li><div><strong>Automation Scripts</strong>:</div><ul><li>PHP is useful for creating cron jobs and automating server-side tasks.</li></ul></li></ol><hr><h3>Modern PHP Practices for Backend Development:</h3><ol><li><div><strong>Use of Frameworks</strong>:</div><ul><li>Opt for frameworks like Laravel or Symfony to build robust, scalable, and maintainable applications.</li></ul></li><li><div><strong>Adopting Object-Oriented Programming (OOP)</strong>:</div><ul><li>Write modular and reusable code using PHP’s OOP features.</li></ul></li><li><div><strong>Dependency Management</strong>:</div><ul><li>Use Composer, PHP’s dependency manager, to manage libraries and packages.</li></ul></li><li><div><strong>Following PSR Standards</strong>:</div><ul><li>Adopt PHP-FIG standards (e.g., PSR-4 for autoloading) to maintain consistency in codebases.</li></ul></li><li><div><strong>Secure Coding Practices</strong>:</div><ul><li>Avoid vulnerabilities like SQL injection, XSS, and CSRF by using prepared statements, escaping output, and token-based security measures.</li></ul></li></ol></div>                                ', 1, 1, 'COVER-67465f5e98b034.01759574.jpg', '2024-11-27 05:38:02'),
(21, 'Introduction to Reverse Engineering', '<div>Reverse engineering is the process of analyzing and deconstructing a product, system, or software to understand its components, functionality, and underlying code. This practice is commonly used in various fields, such as software development, cybersecurity, and hardware design. The goal is to learn how the system works, either to replicate, modify, or improve upon it, or to uncover vulnerabilities that can be exploited or patched.</div><h3>Applications of Reverse Engineering</h3><ol><li><div><strong>Software Analysis</strong>: Reverse engineering helps in understanding how a particular software operates, enabling developers to spot bugs, improve performance, or ensure compatibility with other software.</div></li><li><div><strong>Security Auditing</strong>: In cybersecurity, reverse engineering is crucial for discovering security flaws in applications and systems. By dissecting malware, security experts can understand how it spreads, behaves, and how to counteract its effects.</div></li><li><div><strong>Hardware Deconstruction</strong>: Engineers reverse-engineer physical products to understand their design, construction, and materials. This is particularly useful in electronics and manufacturing, allowing companies to analyze competitors’ products.</div></li><li><div><strong>Product Improvement</strong>: Companies may reverse-engineer their own products to find ways to make improvements or create better versions. This can also include benchmarking and comparing to competitors’ designs.</div></li></ol><h3>Tools and Techniques</h3><div>Reverse engineering can be accomplished using various tools, such as:</div><ul><li><strong>Disassemblers</strong>: Software like IDA Pro and Ghidra helps break down compiled code into human-readable assembly language.</li><li><strong>Debuggers</strong>: Tools such as OllyDbg and x64dbg allow analysts to step through code execution and understand its behavior.</li><li><strong>Decompilers</strong>: These tools convert executable files into higher-level source code (e.g., from binary to C++ or Java).</li><li><strong>Hex Editors</strong>: Used to examine and manipulate raw binary files, enabling the detection of hidden or obfuscated data.</li></ul><h3>Ethical Considerations</h3><div>While reverse engineering has legitimate applications, it can also be used unethically, such as bypassing software licenses or stealing intellectual property. The legality of reverse engineering varies by jurisdiction and use case, so it is essential to be aware of the relevant laws.</div><h3>Conclusion</h3><div>Reverse engineering is an invaluable skill in both software development and cybersecurity, helping to uncover vulnerabilities, improve products, and understand the inner workings of systems. However, it must be done responsibly and ethically to ensure that its use remains legitimate and beneficial.</div>                ', 1, 1, 'COVER-67467243a79fa4.59237389.jpg', '2024-11-27 06:58:39'),
(22, 'Gandaki University MIT With AI', '<div>At <strong>Gandaki University</strong>, located in Pokhara, Nepal, a <strong>Master’s in Information Technology (IT)</strong> with a focus on <strong>Artificial Intelligence (AI)</strong> could provide an excellent opportunity for students to deepen their technical knowledge and expertise in both IT and AI. While specific details on the current offerings at Gandaki University may vary, here\'s a general overview of what such a program could look like and how it might align with the university\'s goals.</div><h3>Master\'s in Information Technology with AI Focus at Gandaki University</h3><h4>Program Overview:</h4><div>A <strong>Master’s in Information Technology with a focus on Artificial Intelligence (AI)</strong> is designed for students who wish to enhance their understanding of both IT infrastructure and AI technologies. The program would likely emphasize a blend of theoretical knowledge and practical skills, preparing students for leadership roles in the tech industry.</div><h4>Key Components of the Program:</h4><ol><li><div><strong>Core IT Curriculum:</strong></div><ul><li><strong>Computer Networks</strong>: Understanding how modern networks are structured and secured, which is essential for implementing AI solutions in real-world applications.</li><li><strong>Software Engineering</strong>: Learning advanced software development techniques and methodologies for building scalable AI systems.</li><li><strong>Database Management</strong>: Focusing on how to manage large datasets necessary for training AI models, including knowledge of both relational and non-relational databases.</li><li><strong>Cloud Computing and Virtualization</strong>: With AI workloads growing, understanding cloud technologies would be crucial, including deploying AI applications on platforms like AWS, Azure, or Google Cloud.</li><li><strong>Cybersecurity</strong>: Ensuring the integrity and security of AI systems, particularly in fields where data privacy is paramount.</li></ul></li><li><div><strong>AI Specialization:</strong></div><ul><li><strong>Machine Learning</strong>: A central component of AI, focusing on algorithms that enable systems to learn from data and improve over time.</li><li><strong>Deep Learning</strong>: Involving more advanced neural network models such as CNNs (Convolutional Neural Networks) and RNNs (Recurrent Neural Networks), which are critical for tasks like image recognition and natural language processing.</li><li><strong>Natural Language Processing (NLP)</strong>: A vital AI field that deals with how machines can understand and generate human language. This includes applications such as chatbots, translation systems, and voice assistants.</li><li><strong>Robotics</strong>: AI-driven automation and robotics are becoming increasingly important in industries like manufacturing, healthcare, and agriculture. A program in IT with AI would offer the chance to explore these fields.</li><li><strong>Data Science and Big Data</strong>: Understanding how to process and analyze large datasets, as AI often requires big data to achieve accurate results.</li></ul></li><li><div><strong>Practical Experience and Projects:</strong></div><ul><li><strong>Research Projects and Case Studies</strong>: Students would likely work on real-world projects that require AI and IT integration, developing AI-powered software or systems for practical applications.</li><li><strong>Internships</strong>: Offering exposure to industry applications of AI, where students can work with tech companies or research institutions.</li><li><strong>Capstone Project</strong>: A final project that could involve building an AI-based system or conducting original research in AI, under the guidance of faculty.</li></ul></li><li><div><strong>Emerging Topics in IT and AI:</strong></div><ul><li><strong>AI Ethics and Governance</strong>: As AI technology continues to advance, understanding the ethical implications, including issues of data privacy, algorithmic bias, and AI\'s impact on society, would be key.</li><li><strong>IoT and AI</strong>: With the rise of the Internet of Things (IoT), integrating AI into IoT devices for smart solutions could be part of the curriculum.</li></ul></li><li><div><strong>Research and Development Opportunities:</strong>\r\nGandaki University could offer avenues for students to engage in AI-focused research, possibly collaborating with faculty or industry experts. AI is an evolving field, and the university\'s research could focus on areas such as:</div><ul><li><strong>AI for Healthcare</strong>: Developing AI-driven diagnostic tools or healthcare management systems.</li><li><strong>Agricultural AI</strong>: Nepal, being a largely agrarian society, could benefit from AI applications in agriculture, such as precision farming and crop prediction.</li><li><strong>AI in Education</strong>: Gandaki University could also be at the forefront of using AI in educational technologies for personalized learning and student performance analysis.</li></ul></li></ol><h4>Career Opportunities:</h4><div>Graduates of this program would be well-equipped to pursue a range of roles in the rapidly growing field of AI and IT, including:</div><ul><li><strong>AI Engineer</strong>: Developing AI models and systems for a variety of industries.</li><li><strong>Data Scientist</strong>: Leveraging AI techniques to analyze large datasets and derive meaningful insights.</li><li><strong>Machine Learning Engineer</strong>: Specializing in building and optimizing machine learning models.</li><li><strong>Robotics Engineer</strong>: Designing robots that incorporate AI for automation in various sectors.</li><li><strong>AI Researcher</strong>: Contributing to the development of new AI algorithms and technologies.</li><li><strong>IT Consultant</strong>: Advising companies on how to integrate AI into their IT systems to improve efficiency and decision-making.</li></ul><h4>Why Gandaki University?</h4><ul><li><strong>Reputation</strong>: As a young and dynamic institution, Gandaki University is positioned to provide a fresh and innovative approach to higher education in IT, particularly with the increasing importance of AI.</li><li><strong>Location</strong>: Located in <strong>Pokhara</strong>, a growing tech hub in Nepal, students would have access to an expanding tech ecosystem, offering internship and job opportunities in both traditional and AI-powered industries.</li><li><strong>Global Partnerships</strong>: Potential collaborations with international institutions and companies could enhance the scope of research and internships available to students.</li></ul><h4>Conclusion:</h4><div>A <strong>Master\'s in Information Technology with a focus on AI</strong> at Gandaki University would offer students a comprehensive education, blending IT skills with advanced AI techniques. The program would provide hands-on learning, cutting-edge research opportunities, and career prospects in a rapidly growing field that is transforming industries worldwide. With the global demand for AI talent continuing to rise, this program would prepare graduates to lead in the next era of technological innovation.</div>                ', 2, 1, 'COVER-6746756d5f25b5.61713556.jpg', '2024-11-27 07:12:09'),
(23, 'Gandaki University', 'Gandaki University pokhara Nepal', 1, 1, 'COVER-6746b4f3ba3250.33790615.jpg', '2024-11-27 11:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_text` text NOT NULL,
  `cover_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `like_id` int(11) NOT NULL,
  `liked_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liked_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`like_id`, `liked_by`, `post_id`, `liked_at`) VALUES
(43, 6, 16, '2024-08-12 22:18:57'),
(51, 9, 16, '2024-11-15 12:10:00'),
(53, 13, 20, '2024-11-27 05:57:46'),
(54, 13, 19, '2024-11-27 06:00:04'),
(55, 13, 22, '2024-11-27 07:14:04'),
(56, 16, 16, '2024-11-27 08:23:59'),
(57, 16, 22, '2024-11-27 08:24:35'),
(58, 20, 16, '2024-11-27 08:29:45'),
(59, 20, 22, '2024-11-27 08:30:48'),
(60, 20, 19, '2024-11-27 08:31:44'),
(61, 15, 23, '2024-12-03 08:54:16'),
(62, 13, 23, '2025-10-15 15:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `username`, `password`) VALUES
(4, 'Prajwal Giri', 'prajwal', '$2y$10$ADiQb3lNvPI/qSip0j4p1.f/bV9T4dZ8IrA4FWIYbOY3rzo6kxPrC'),
(13, 'Spinner Dhaklu', 'spinner', '$2y$10$Y0ClyIH1zqnE.VDsRF8cdeMeNq8VQfxJ5EW3XgIDsiNsCWE8Dsku6'),
(14, 'Susan Pariyar', 'susan', '$2y$10$waHX05tusqGGr7nzYJPh.OzLLJRio3KE2POy.OGvPdxSVE1lA5EzC'),
(15, 'saugat gurung', 'saugat', '$2y$10$ARN3iOEfbZJGlEu3MzyaMuo57kiTtaULT2tPlcjFF0qKajVR6CUue'),
(16, 'Nishan Poudel', 'nishan', '$2y$10$cc82xStJ5UxnyB39tMdjLu3CD8wGAJmKKmS5Jdqv02CEozYPfn.wS'),
(20, 'saugat grg', 'bandre', '$2y$10$3Jx1FmMjBcioBZ2fsB3ScOHIgfTtiEli0e38T6o91iB1KBCjekpsy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
