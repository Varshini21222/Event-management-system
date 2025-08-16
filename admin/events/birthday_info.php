<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Birthday Party</title>
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
        <h1>🎂 Birthday Party</h1>
        
        <div class="event-info">
            <img src="../../assets/images/events/birthday.jpg" alt="Birthday Party">

            <div class="event-text">
                <h2>🎊 Event Details</h2>
                <p><strong>Organizer:</strong> Happy Moments Party Planners</p>
                <p><strong>📞 Contact:</strong> +91 9988776655</p>
                <p><strong>📧 Email:</strong> happymoments@example.com</p>
                <p><strong>📍 Venue:</strong> Funland Kids Party Hall</p>
                <p><strong>💰 Package:</strong> ₹50,000 (Includes cake, decoration, entertainment, and photography)</p>
                <p>Make your birthday memorable with themed decorations, magicians, and delicious cakes.</p>
                <p>We provide customized birthday themes, exciting games, and fun-filled activities for all ages.</p>
                <a href="http://localhost/event-management/admin/register_event.php" class="btn">Register</a>
                </div>
        </div>

        <h2>📸 Birthday Gallery</h2>
        <p>Check out the joyful moments from our past birthday events:</p>
        <div class="gallery">
            <img src="../../assets/images/birthday/birthday1.jpg" alt="Birthday 1">
            <img src="../../assets/images/birthday/birthday2.jpg" alt="Birthday 2">
            <img src="../../assets/images/birthday/birthday3.jpg" alt="Birthday 3">
        </div>
    </section>

</body>
</html>
