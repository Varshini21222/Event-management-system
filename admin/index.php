<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Event Management</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/header.css">
    <script defer src="../assets/js/index.js"></script>
</head>
<body>
    <nav class="navbar">
        <div class="container">
        <a href="index.php" class="logo">
            <img src="../assets/images/login/logo1.jpg" alt="Event Management Logo">
        </a>
            <div class="nav-links">
                <a href="index.php">Home</a>
                <a href="events.php">Events</a>
                <a href="profile.php">Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    
    <section class="slideshow">
        <img src="../assets/images/login/marriage.jpg" alt="Event 1" class="slide">
        <img src="../assets/images/login/baby_shower.jpg" alt="Event 2" class="slide">
        <img src="../assets/images/login/birthday.jpg" alt="Event 3" class="slide">
        <img src="../assets/images/login/anniversary.jpg" alt="Event 4" class="slide">
        <img src="../assets/images/login/year1.jpg" alt="Event 5" class="slide">
        <img src="../assets/images/login/retirement.jpg" alt="Event 6" class="slide">
    </section>
</body>
</html>
