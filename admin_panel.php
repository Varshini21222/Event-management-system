<?php
session_start();
require_once "config.php";

// Redirect if not logged in or not admin
if (!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1) {
    header("Location: ../login.php");
    exit();
}

// Fetch all users
$usersQuery = "SELECT id, username, email, phone, place FROM users";
$usersResult = $conn->query($usersQuery);

// Fetch all event registrations
$eventsQuery = "SELECT ue.*, u.username FROM user_events ue 
                JOIN users u ON ue.user_id = u.id 
                ORDER BY ue.booking_time DESC";
$eventsResult = $conn->query($eventsQuery);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Event Management</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 30px; background: #f2f2f2; }
        h2 { color: #333; }
        table { width: 100%; border-collapse: collapse; background: white; margin-bottom: 40px; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: center; }
        th { background: #444; color: white; }
        .container { max-width: 1200px; margin: auto; }
    </style>
</head>
<body>
<div class="container">
    <h2>👥 Registered Users</h2>
    <table>
        <tr><th>ID</th><th>Username</th><th>Email</th><th>Phone</th><th>Place</th></tr>
        <?php while ($user = $usersResult->fetch_assoc()): ?>
            <tr>
                <td><?= $user['id'] ?></td>
                <td><?= htmlspecialchars($user['username']) ?></td>
                <td><?= htmlspecialchars($user['email']) ?></td>
                <td><?= htmlspecialchars($user['phone']) ?></td>
                <td><?= htmlspecialchars($user['place']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h2>📅 Event Registrations</h2>
    <table>
        <tr>
            <th>Username</th>
            <th>Full Name</th>
            <th>Event</th>
            <th>Place</th>
            <th>Date</th>
            <th>Contact</th>
            <th>Alt Contact</th>
            <th>Payment</th>
            <th>Booked On</th>
        </tr>
        <?php while ($event = $eventsResult->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($event['username']) ?></td>
                <td><?= htmlspecialchars($event['full_name']) ?></td>
                <td><?= htmlspecialchars($event['event_name']) ?></td>
                <td><?= htmlspecialchars($event['event_place']) ?></td>
                <td><?= htmlspecialchars($event['event_date']) ?></td>
                <td><?= htmlspecialchars($event['contact']) ?></td>
                <td><?= htmlspecialchars($event['alt_contact']) ?></td>
                <td><?= htmlspecialchars($event['payment_method']) ?></td>
                <td><?= htmlspecialchars($event['booking_time']) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
