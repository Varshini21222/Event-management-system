<?php
session_start();
include "config.php";

$success = false;
$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $phone = trim($_POST["phone"]);
    $place = trim($_POST["place"]);

    // Check if passwords match
    if ($password !== $confirm_password) {
        $error = "Passwords do not match.";
    } 
    // Validate email format
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    } 
    // Validate phone number (exactly 10 digits)
    elseif (!preg_match('/^\d{10}$/', $phone)) {
        $error = "Phone number must be exactly 10 digits.";
    } 
    // Password strength validation (at least 8 characters, 1 capital, 1 special character, 1 digit)
    elseif (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $error = "Password must be at least 8 characters long, contain at least one capital letter, one special character (e.g. @), and one digit.";
    }
    // Check if username already exists
    elseif (empty($username)) {
        $error = "Username is required.";
    } else {
        // Check if username already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
        if ($stmt->num_rows > 0) {
            $error = "Username already exists. Please choose a different username.";
        } else {
            // Check if email already exists
            $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->store_result();
            
            if ($stmt->num_rows > 0) {
                $error = "Email already exists. Please use another email.";
            } else {
                // Check if phone number already exists
                $stmt = $conn->prepare("SELECT id FROM users WHERE phone = ?");
                $stmt->bind_param("s", $phone);
                $stmt->execute();
                $stmt->store_result();
                
                if ($stmt->num_rows > 0) {
                    $error = "Phone number already exists. Please use a different phone number.";
                } else {
                    // Hash password securely
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

                    // Insert new user
                    $stmt = $conn->prepare("INSERT INTO users (username, email, password, phone, place) VALUES (?, ?, ?, ?, ?)");
                    $stmt->bind_param("sssss", $username, $email, $hashed_password, $phone, $place);

                    if ($stmt->execute()) {
                        $_SESSION["success_message"] = "Registration successful! Redirecting to login...";
                        header("Location: login.php");
                        exit();
                    } else {
                        $error = "Error: " . $stmt->error;
                    }
                }
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <script>
        // Client-side validation
        function validateForm() {
            var username = document.forms["registerForm"]["username"].value;
            var email = document.forms["registerForm"]["email"].value;
            var password = document.forms["registerForm"]["password"].value;
            var confirm_password = document.forms["registerForm"]["confirm_password"].value;
            var phone = document.forms["registerForm"]["phone"].value;
            var place = document.forms["registerForm"]["place"].value;

            // Username validation
            if (username == "") {
                alert("Username must be filled out");
                return false;
            }

            // Email validation
            var emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!emailRegex.test(email)) {
                alert("Please enter a valid email address.");
                return false;
            }

            // Password validation (at least 8 characters, 1 capital, 1 special character, 1 digit)
            var passwordRegex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
            if (!passwordRegex.test(password)) {
                alert("Password must be at least 8 characters long, contain at least one capital letter, one special character (e.g. @), and one digit.");
                return false;
            }

            // Confirm password validation
            if (password !== confirm_password) {
                alert("Passwords do not match.");
                return false;
            }

            // Phone number validation (exactly 10 digits)
            var phoneRegex = /^\d{10}$/;
            if (!phoneRegex.test(phone)) {
                alert("Phone number must be exactly 10 digits.");
                return false;
            }

            // Place validation
            if (place == "") {
                alert("Place must be filled out.");
                return false;
            }

            return true; // Allow form submission if all validations pass
        }
    </script>
</head>
<body>

<?php if (!empty($error)): ?>
    <script>
        alert("<?php echo $error; ?>");
        window.history.back();
    </script>
<?php endif; ?>

<section class="slideshow">
    <img src="assets/images/login/marriage.jpg" alt="Event 1" class="slide">
    <img src="assets/images/login/baby_shower.jpg" alt="Event 2" class="slide">
    <img src="assets/images/login/birthday.jpg" alt="Event 3" class="slide">
    <img src="assets/images/login/anniversary.jpg" alt="Event 4" class="slide">
    <img src="assets/images/login/year1.jpg" alt="Event 5" class="slide">
    <img src="assets/images/login/retirement.jpg" alt="Event 6" class="slide">
</section>

<form name="registerForm" action="register.php" method="POST" onsubmit="return validateForm()">
    <h2>Register</h2>
    <input type="text" name="username" placeholder="Username" required><br>
    <input type="email" name="email" placeholder="Email" required><br>
    <input type="password" name="password" placeholder="Password" required><br>
    <input type="password" name="confirm_password" placeholder="Confirm Password" required><br>
    <input type="text" name="phone" placeholder="Phone Number" required><br>
    <input type="text" name="place" placeholder="Place" required><br>
    <button type="submit">Register</button>
    <p class="login-prompt">Already have an account? <a href="login.php">Login</a></p>
    <p><a href="index.php" class="back-home">Back to Home?</a></p>
</form>

</body>
</html>
