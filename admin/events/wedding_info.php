<?php
session_start();
include "config.php"; // Include your database connection

// Check if user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION["user_id"];  // Get the logged-in user's ID

// Initialize the event status
$event_status = "Add To Profile"; // Default status

// Check if the 'event' parameter is passed in the URL
if (isset($_GET['event'])) {
    $event = $_GET['event'];

    // Check if the event is already added by the user
    $sql = "SELECT * FROM user_events WHERE user_id = ? AND event_key = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("is", $user_id, $event);
    $stmt->execute();
    $stmt->store_result();

    // If event is not added, insert it
    if ($stmt->num_rows == 0) {
        $event_status = "Add To Profile";  // Event not added
        // Insert the event into the user's profile
        $insert_sql = "INSERT INTO user_events (user_id, event_key) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("is", $user_id, $event);
        $insert_stmt->execute();
        $insert_stmt->close();
    } else {
        // If event already added, set the status to "Added"
        $event_status = "Added";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Event Details</title>
    <link rel="stylesheet" href="../../assets/css/header.css">
    <link rel="stylesheet" href="../event_info/wedding_info.css">
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
        <h1>💖 Event Details</h1>
        
        <div class="event-info">
            <img src="../../assets/images/events/anniversary.jpg" alt="Anniversary Celebration">

            <div class="event-text">
                <h2>🎊 Anniversary Celebration</h2>
                <p><strong>Organizer:</strong> Everlasting Love Events</p>
                <p><strong>📞 Contact:</strong> +91 8877665544</p>
                <p><strong>📧 Email:</strong> loveevents@example.com</p>
                <p><strong>📍 Venue:</strong> Rosewood Banquet Hall</p>
                <p><strong>💰 Package:</strong> ₹70,000 (Includes elegant decorations, live music, dinner, and special couple surprises)</p>
                <p>Celebrate your years of love with an elegant and beautifully arranged anniversary event.</p>
                <p>From romantic settings to surprise elements, we ensure your special day is unforgettable.</p>

                <!-- Show Add To Profile Button if event is not added -->
                <?php if ($event_status == "Add To Profile"): ?>
                    <a href="http://localhost/event-management/admin/register_event.php" class="btn">Register</a>
                    <?php else: ?>
                    <span class="added"><?php echo $event_status; ?></span>  
                <?php endif; ?>
            </div>
        </div>

        <!-- Event Gallery -->
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
