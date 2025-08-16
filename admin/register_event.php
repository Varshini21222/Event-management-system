<?php
session_start();
require_once "../config.php";

$message = "";

// Check login
if (!isset($_SESSION['user_id'])) {
    echo "Please login first.";
    exit;
}

// Always set full_name so it’s accessible outside POST
$full_name = $_SESSION['username'] ?? '';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user_id = $_SESSION['user_id'];
    $event_name = $_POST['event_name'] ?? '';
    $event_place = $_POST['event_place'] ?? '';
    $event_date = $_POST['event_date'] ?? '';
    $contact = $_POST['contact'] ?? '';
    $alt_contact = $_POST['alt_contact'] ?? '';
    $payment_method = $_POST['payment_method'] ?? '';
    

    if (!$full_name || !$event_name || !$event_place || !$event_date || !$contact || !$payment_method) {
        $message = "❌ All required fields must be filled.";
    } else {
        // Check for duplicates
        $stmt = $conn->prepare("SELECT * FROM user_events WHERE user_id = ? AND event_name = ? AND event_place = ? AND event_date = ?");
        if ($stmt === false) die("Prepare failed: " . $conn->error);

        $stmt->bind_param("isss", $user_id, $event_name, $event_place, $event_date);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "❌ You have already registered for this event at the same place.";
        } else {
            $insert = $conn->prepare("INSERT INTO user_events (user_id, full_name, event_name, event_place, event_date, contact, alt_contact, payment_method, booking_time) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
            if ($insert === false) die("Insert failed: " . $conn->error);

            $insert->bind_param("isssssss", $user_id, $full_name, $event_name, $event_place, $event_date, $contact, $alt_contact, $payment_method);
            if ($insert->execute()) {
                $message = "✅ Registered successfully! Redirecting to your profile...";
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'profile.php';
                    }, 2000);
                </script>";
            } else {
                $message = "❌ Error: " . $insert->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register for Event</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f5f5f5;
    }
    .container {
      width: 500px;
      margin: 50px auto;
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 0 8px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }
    label {
      display: block;
      margin: 10px 0 5px;
    }
    input, select {
      width: 100%;
      padding: 8px;
      margin-bottom: 15px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    input[type=submit] {
      background: #007bff;
      color: white;
      cursor: pointer;
      font-weight: bold;
    }
    .message {
      text-align: center;
      font-weight: bold;
      color: red;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Register for an Event</h2>

    <?php if ($message): ?>
      <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <form method="post" action="">
        
      <label>Full Name:</label>
      <input type="text" name="full_name" value="<?= htmlspecialchars($full_name) ?>">

      <label for="event_name">Choose Event:</label>
      <select name="event_name" id="event_name" required>
        <option value="">-- Select Event --</option>
        <option value="Birthday">Birthday Party</option>
        <option value="Marriage">Wedding Ceremony</option>
        <option value="Anniversary">Anniversary Celebration</option>
        <option value="Baby Shower">Baby Shower</option>
        <option value="New Year">New Year</option>
        <option value="Retirement">Retirement Event</option>
      </select>

      <label for="event_place">Place:</label>
      <input type="text" name="event_place" id="event_place" required>

      <label for="event_date">Event Date:</label>
      <input type="date" name="event_date" id="event_date" min="<?= date('Y-m-d', strtotime('+1 day')) ?>" required>

      <label for="contact">Contact Number:</label>
      <input type="text" name="contact" id="contact" required pattern="\d{10}" maxlength="10">

      <label for="alt_contact">Alternate Contact:</label>
      <input type="text" name="alt_contact" id="alt_contact" pattern="\d{10}" maxlength="10">

      <label for="payment_method">Payment Mode:</label>
      <select name="payment_method" id="payment_method" required>
        <option value="Cash">Cash</option>
      </select>

      <input type="submit" value="Register">
    </form>
  </div>
</body>
</html>
