<?php
session_start();
include "config.php";

// Fetch events from database
$sql = "SELECT * FROM user_events"; 
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Events</title>
    <link rel="stylesheet" href="../assets/css/event.css">
    <link rel="stylesheet" href="../assets/css/header.css">
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

    <section class="events">
    <div class="event-card">
        <img src="../assets/images/login/marriage.jpg" alt="Wedding Ceremony">
        <h2>Wedding Ceremony</h2>
        <a href="events/wedding_info.php" class="btn">More Info</a>
    </div>

    <div class="event-card">
        <img src="../assets/images/login/birthday.jpg" alt="Birthday Party">
        <h2>Birthday Party</h2>
        <a href="events/birthday_info.php" class="btn">More Info</a>
    </div>

    <div class="event-card">
        <img src="../assets/images/login/retirement.jpg" alt="Retirement Event">
        <h2>Retirement Event</h2>
        <a href="events/retirement_info.php" class="btn">More Info</a>
    </div>

    <div class="event-card">
        <img src="../assets/images/login/baby_shower.jpg" alt="Baby Shower">
        <h2>Baby Shower</h2>
        <a href="events/babyshower_info.php" class="btn">More Info</a>
    </div>

    <div class="event-card">
        <img src="../assets/images/login/anniversary.jpg" alt="Anniversary Celebration">
        <h2>Anniversary Celebration</h2>
        <a href="events/anniversary_info.php" class="btn">More Info</a>
    </div>

    <div class="event-card">
        <img src="../assets/images/login/new_year.jpg" alt="New Year Party">
        <h2>New Year Party</h2>
        <a href="events/newyear_info.php" class="btn">More Info</a>
    </div>
</section>


</body>
</html>
