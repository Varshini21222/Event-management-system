<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Baby Shower</title>
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
                <a href="../../admin/profiler.php">Profile</a>
                <a href="../../admin/logout.php">Logout</a>
            </div>
        </div>
    </nav>

    <section class="event-details">
        <h1>🎀 Baby Shower Celebration</h1>
        
        <div class="event-info">
            <img src="../../assets/images/events/baby_shower.jpg" alt="Baby Shower">

            <div class="event-text">
                <h2>🎊 Event Details</h2>
                <p><strong>Organizer:</strong> Sweet Moments Events</p>
                <p><strong>📞 Contact:</strong> +91 9988776655</p>
                <p><strong>📧 Email:</strong> sweetmoments@example.com</p>
                <p><strong>📍 Venue:</strong> Blooming Rose Hall</p>
                <p><strong>💰 Package:</strong> ₹60,000 (Includes theme decorations, cake, gifts, and fun activities)</p>
                <p>Celebrate the joy of parenthood with a beautifully decorated baby shower.</p>
                <p>Our event includes fun games, adorable decorations, and a warm, loving atmosphere.</p>
                <a href="http://localhost/event-management/admin/register_event.php" class="btn">Register</a>
                </div>
        </div>

        <h2>📸 Baby Shower Gallery</h2>
        <p>Take a look at some memorable moments from our past baby showers:</p>
        <div class="gallery">
            <img src="../../assets/images/baby_shower/babyshower1.jpg" alt="Baby Shower 1">
            <img src="../../assets/images/baby_shower/babyshower2.jpg" alt="Baby Shower 2">
            <img src="../../assets/images/baby_shower/babyshower3.jpg" alt="Baby Shower 3">
        </div>
    </section>

</body>
</html>
