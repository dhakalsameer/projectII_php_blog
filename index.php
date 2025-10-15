<?php
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}
?>

<?php
include_once("admin/data/Post.php");
include_once("db_conn.php"); // Ensure  database connection is established

$recent_posts = getRecentPosts($conn, 5); // Fetch the 5 most recent posts
$popular_posts = getPopularPosts($conn, 5); // Fetch 5 most liked posts
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechTitans Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7f6;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Navbar Styling */
        nav {
            background-color: #343a40;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav a:hover {
            color: #00aced;
        }

        /* Welcome to Tech Blog Section */
        .welcome-tech-blog {
            font-size: 1.5rem;
            font-weight: bold;
            color: #004d40;
            text-align: center;
            margin-bottom: 40px;
        }

        .welcome-tech-blog p {
            font-size: 1.25rem;
            color: #555;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Recent Posts Section (Updated) */
        .recent-posts-container {
            background: linear-gradient(135deg, #f8fdff, #e7f2fa);
            /* Matching gradient */
            padding: 60px 20px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .recent-posts .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .recent-posts .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .recent-posts .card-img-top {
            height: 220px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .recent-posts .card-body {
            padding: 20px;
        }

        .recent-posts .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #004d40;
        }

        .recent-posts .card-text {
            font-size: 1rem;
            color: #555;
        }

        .recent-posts .btn-outline-primary {
            font-size: 1rem;
            font-weight: bold;
            color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }

        .recent-posts .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* About Us */
        .about-us {
            background: linear-gradient(rgba(255, 255, 255, 0.85), rgba(255, 255, 255, 0.85)),
                url('images/Tech.jpg') no-repeat center center / cover;
            padding: 80px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .about-us h3 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #343a40;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }

        .about-us p {
            font-size: 1.25rem;
            line-height: 1.8;
            color: #555;
            max-width: 800px;
            margin: 0 auto 20px;
        }

        .about-us .cta-btn {
            padding: 12px 24px;
            font-size: 1.2rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 30px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 123, 255, 0.3);
        }

        .about-us .cta-btn:hover {
            background-color: #0056b3;
            box-shadow: 0 8px 16px rgba(0, 123, 255, 0.5);
            transform: translateY(-2px);
        }

        /* Recent Posts */
        .recent-posts .card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.3s;
        }

        .recent-posts .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }

        .recent-posts .card-img-top {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 20px;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            font-size: 1rem;
            color: #555;
        }

        /* Popular Blogs Section */
        .popular-posts-container {
            background: linear-gradient(135deg, #f8fdff, #e7f2fa);
            padding: 60px 20px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .popular-posts .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .popular-posts .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }

        .popular-posts .card-img-top {
            height: 220px;
            object-fit: cover;
            border-radius: 15px 15px 0 0;
        }

        .popular-posts .card-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #004d40;
        }

        .popular-posts .card-text {
            font-size: 1rem;
            color: #555;
        }

        .popular-posts .badge {
            background-color: #00bcd4;
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 12px;
            color: #fff;
        }

        .popular-posts .btn-outline-primary {
            font-size: 1rem;
            font-weight: bold;
            color: #007bff;
            border-color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }

        .popular-posts .btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
        }

        /* Section Heading */
        h2.section-heading {
            font-size: 2rem;
            font-weight: bold;
            color: #004d40;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            text-align: center;
            margin-bottom: 40px;
        }

        /* Box Shadow for All Sections */
        .container-section {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 15px;
            margin-bottom: 30px;
        }

        /* Footer Styling */
        footer {
            background-color: #212121;
            /* Dark background for footer */
            color: white;
            padding: 60px 20px;
            margin-top: 80px;
        }

        /* Footer Social Icons Styling */
        .footer-social {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-icon {
            margin: 0 20px;
            /* More margin between icons */
        }

        /* Social Icon Hover Effects */
        .social-icon i {
            font-size: 50px;
            /* Increase icon size */
            transition: transform 0.3s, color 0.3s;
        }

        .social-icon i:hover {
            transform: scale(1.1);
            /* Slightly increase icon size on hover */
        }

        /* Change icon colors */
        .social-icon i.fab.fa-facebook {
            color: #4267B2;
            /* Facebook icon color */
        }

        .social-icon i.fab.fa-github {
            color: #f8f8f8;
            /* Lighter color for GitHub icon */
        }

        /* Footer Text Links */
        .footer-links li a {
            font-size: 1rem;
            color: #bbb;
        }

        .footer-links li a:hover {
            color: #00aced;
        }
    </style>
</head>

<body>
    <?php include 'inc/NavBar.php'; ?>

    <!-- About Us Section -->
    <div class="container mt-5">
        <h1 class="text-center mb-4 welcome-tech-blog">Welcome to Tech Blog</h1>
        <div class="about-us">
            <h3>About Us</h3>
            <p>TechTitans Blog is your go-to platform for insights on technology, AI, cybersecurity, and programming languages.</p>
            <a href="blog.php" class="cta-btn">Explore Blogs</a>
        </div>
    </div>

    <!-- Recent Posts Section -->
    <div class="container mt-5 recent-posts-container">
        <h2 class="text-center mb-4 welcome-tech-blog">Recent Posts</h2>
        <div class="row recent-posts">
            <?php foreach ($recent_posts as $post) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="upload/blog/<?= htmlspecialchars($post['cover_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($post['post_title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($post['post_title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars(substr(strip_tags($post['post_text']), 0, 90)) ?>...</p>
                            <a href="blog-view.php?post_id=<?= $post['post_id'] ?>" class="btn btn-outline-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <!-- Most Popular Posts Section -->
    <div class="container mt-5 popular-posts-container">
        <h2 class="section-heading">Most Popular Blogs</h2>
        <div class="row popular-posts">
            <?php foreach ($popular_posts as $post) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="upload/blog/<?= htmlspecialchars($post['cover_url']) ?>"
                            class="card-img-top"
                            alt="<?= htmlspecialchars($post['post_title']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($post['post_title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars(substr(strip_tags($post['post_text']), 0, 90)) ?>...</p>
                            <span class="badge">Likes: <?= $post['likes'] ?></span>
                            <a href="blog-view.php?post_id=<?= $post['post_id'] ?>"
                                class="btn btn-outline-primary mt-2">Read More</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>



    <!-- Footer Section -->
    <footer style="background-color: #212121; padding: 60px 20px; color: white;">
        <div class="container text-center">
            <div class="row">
                <div class="col-md-4">
                    <h5>About TechTitans</h5>
                    <p>TechTitans Blog offers expert articles, guides, and news on technology trends.</p>
                </div>
                <div class="col-md-4">
                    <h5>Quick Links</h5>
                    <ul class="footer-links list-unstyled">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="category.php">Category</a></li>
                        <li><a href="loginfo.php">Login / Signup</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="footer-social">
                        <!-- Facebook Icon -->
                        <a href="https://www.facebook.com/prajwal.giri.982" target="_blank" class="social-icon" style="margin: 0 15px;">
                            <i class="fab fa-facebook" style="font-size: 50px; color: #4267B2; transition: transform 0.3s;"></i>
                        </a>
                        <!-- GitHub Icon -->
                        <a href="https://github.com/dhakalsameer" target="_blank" class="social-icon" style="margin: 0 15px;">
                            <i class="fab fa-github" style="font-size: 50px; color: #f8f8f8; transition: transform 0.3s;"></i>
                        </a>
                        <!-- YouTube Icon -->
                        <a href="https://www.youtube.com/@susanpariyar1214" target="_blank" class="social-icon" style="margin: 0 15px;">
                            <i class="fab fa-youtube" style="font-size: 50px; color: #FF0000; transition: transform 0.3s;"></i>
                        </a>
                    </div>
                </div>
            </div>
            <hr style="border-color: rgba(255, 255, 255, 0.2);">
            <p class="text-center">&copy; <?= date('Y') ?> Tech Blog. All rights reserved.</p>
        </div>
    </footer>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>

</html>