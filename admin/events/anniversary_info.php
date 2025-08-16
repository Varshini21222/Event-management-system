<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Anniversary Celebration</title>
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
        <h1>💖 Anniversary Celebration</h1>
        
        <div class="event-info">
            <img src="../../assets/images/events/anniversary.jpg" alt="Anniversary Celebration">

            <div class="event-text">
                <h2>🎊 Event Details</h2>
                <p><strong>Organizer:</strong> Everlasting Love Events</p>
                <p><strong>📞 Contact:</strong> +91 8877665544</p>
                <p><strong>📧 Email:</strong> loveevents@example.com</p>
                <p><strong>📍 Venue:</strong> Rosewood Banquet Hall</p>
                <p><strong>💰 Package:</strong> ₹70,000 (Includes elegant decorations, live music, dinner, and special couple surprises)</p>
                <p>Celebrate your years of love with an elegant and beautifully arranged anniversary event.</p>
                <p>From romantic settings to surprise elements, we ensure your special day is unforgettable.</p>
                <a href="http://localhost/event-management/admin/register_event.php" class="btn">Register</a>
                </div>
        </div>

        <h2>📸 Anniversary Celebration Gallery</h2>
        <p>Take a look at some beautiful moments from our past anniversary celebrations:</p>
        <div class="gallery">
            <img src="../../assets/images/anniversary/anniversary1.jpg" alt="Anniversary 1">
            <img src="../../assets/images/anniversary/anniversary2.jpg" alt="Anniversary 2">
            <img src="../../assets/images/anniversary/anniversary3.jpg" alt="Anniversary 3">
        </div>
    </section>

</body>
</html>
