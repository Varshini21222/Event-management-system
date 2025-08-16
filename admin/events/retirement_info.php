<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Retirement Celebration</title>
    <link rel="stylesheet" href="../event_info/wedding_info.css">
    <link rel="stylesheet" href="../../assets/css/header.css">
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <a href="../../index.php" class="logo">
                <img src="../../assets/images/login/logo1.jpg" alt="Event Management Logo">
            </a>
            <div class="nav-links">
                <a href="../../index.php">Home</a>
                <a href="../../admin/events.php">Events</a>
                <a href="../../admin/profile.php">Profile</a>
                <a href="../../admin/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <section class="event-details">
        <h1>🎉 Retirement Celebration</h1>
        
        <div class="event-info">
            <img src="../../assets/images/events/retirement.jpg" alt="Retirement Celebration">

            <div class="event-text">
                <h2>🎊 Event Details</h2>
                <p><strong>Organizer:</strong> Golden Years Events</p>
                <p><strong>📞 Contact:</strong> +91 8765432100</p>
                <p><strong>📧 Email:</strong> goldenyears@example.com</p>
                <p><strong>📍 Venue:</strong> Grand City Banquet Hall</p>
                <p><strong>💰 Package:</strong> ₹70,000 (Includes decoration, dinner, live music, and mementos)</p>
                <p>Celebrate the remarkable journey of a retiree with a heartwarming event.</p>
                <p>Includes guest speeches, live music, and a grand dinner to make it a memorable day.</p>
                <a href="http://localhost/event-management/admin/register_event.php" class="btn">Register</a>
                </div>
        </div>

        <h2>📸 Retirement Gallery</h2>
        <p>Take a look at some beautiful moments from our past retirement events:</p>
        <div class="gallery">
            <img src="../../assets/images/retirement/retirement.jpg" alt="Retirement 1">
            <img src="../../assets/images/retirement/retirement.jpg" alt="Retirement 2">
            <img src="../../assets/images/retirement/retirement.jpg" alt="Retirement 3">
        </div>
    </section>

</body>
</html>
