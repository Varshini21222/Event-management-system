<?php
session_start();
include('../config.php');

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$userId = $_SESSION['user_id'];

// Fetch user details
$userQuery = "SELECT username, email, phone, place FROM users WHERE id = $userId";
$userResult = $conn->query($userQuery);
$user = $userResult->fetch_assoc();

// Handle delete request
if (isset($_GET['delete_id'])) {
    $deleteId = $_GET['delete_id'];
    $deleteQuery = "DELETE FROM user_events WHERE id = $deleteId AND user_id = $userId";
    $conn->query($deleteQuery);
    header("Location: profile.php");
    exit();
}

// Fetch user's events
$eventQuery = "SELECT * FROM user_events WHERE user_id = $userId ORDER BY event_date ASC";
$eventResult = $conn->query($eventQuery);

// Check if just registered
$showSuccess = false;
if (isset($_SESSION['registered'])) {
    $showSuccess = true;
    unset($_SESSION['registered']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Event Management</title>
    <link rel="stylesheet" href="../assets/css/index.css">
    <link rel="stylesheet" href="../assets/css/header.css">

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f9f9f9;
        }
    
        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #333;
            color: white;
        }
        .delete-btn {
            background-color: #d9534f;
            color: white;
            padding: 6px 10px;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .delete-btn:hover {
            background-color: #c9302c;
        }
        .success {
            color: green;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .class{
            padding-top: 80px;
        }

        h3{
            padding-top:10px;
        }
    </style>
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

    
    <?php if ($showSuccess): ?>
        <p class="success">✅ You have successfully registered for an event.</p>
    <?php endif; ?>
    
    <div class="class">
        <h3>Your Details:</h3>
    <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
    <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
    <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
    <p><strong>Place:</strong> <?php echo htmlspecialchars($user['place']); ?></p>
    </div>
    
    
    <hr>

    <h3>Your Registered Events:</h3>
    <?php if ($eventResult->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Full Name</th>
                    <th>Event Name</th>
                    <th>Event Place</th>
                    <th>Event Date</th>
                    <th>Contact</th>
                    <th>Alt. Contact</th>
                    <th>Payment Method</th>
                    <th>Booked On</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($event = $eventResult->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($event['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($event['event_name']); ?></td>
                        <td><?php echo htmlspecialchars($event['event_place']); ?></td>
                        <td><?php echo htmlspecialchars($event['event_date']); ?></td>
                        <td><?php echo htmlspecialchars($event['contact']); ?></td>
                        <td><?php echo htmlspecialchars($event['alt_contact']); ?></td>
                        <td><?php echo htmlspecialchars($event['payment_method']); ?></td>
                        <td><?php echo htmlspecialchars($event['booking_time']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No events registered yet.</p>
    <?php endif; ?>
</body>
</html>
