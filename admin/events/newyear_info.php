<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Year Party</title>
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
        <h1>🎆 New Year Party</h1>
        
        <div class="event-info">
            <img src="../../assets/images/events/new_year.jpg" alt="New Year Party">

            <div class="event-text">
                <h2>🎊 Event Details</h2>
                <p><strong>Organizer:</strong> Celebration Nights</p>
                <p><strong>📞 Contact:</strong> +91 9876543210</p>
                <p><strong>📧 Email:</strong> celebrationnights@example.com</p>
                <p><strong>📍 Venue:</strong> The Grand Ballroom</p>
                <p><strong>💰 Package:</strong> ₹80,000 (Includes DJ, dance floor, food, and unlimited drinks)</p>
                <p>Ring in the New Year with an unforgettable party featuring live DJs, fireworks, and a fantastic dinner.</p>
                <p>Enjoy a night full of music, dance, and unlimited fun with your friends and family.</p>
                <a href="http://localhost/event-management/admin/register_event.php" class="btn">Register</a>
                </div>
        </div>

        <h2>📸 New Year Party Gallery</h2>
        <p>Take a look at some energetic moments from our past New Year celebrations:</p>
        <div class="gallery">
            <img src="../../assets/images/new_year/newyear1.jpg" alt="New Year 1">
            <img src="../../assets/images/new_year/newyear2.jpg" alt="New Year 2">
            <img src="../../assets/images/new_year/newyear3.jpg" alt="New Year 3">
        </div>
    </section>

</body>
</html>
