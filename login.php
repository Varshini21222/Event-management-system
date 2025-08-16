<?php
session_start();
include "config.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $stmt = $conn->prepare("SELECT * FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["username"];
        $_SESSION["email"] = $user["email"];
        header("Location: admin/index.php");
        exit();
    } else {
        echo "<script>alert('Invalid email or password'); window.location.href='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <script defer src="assets/js/index.js"></script>
</head>
<body>

    <div class="container">
        <section class="slideshow">
            <img src="assets/images/login/marriage.jpg" alt="Marriage Event" class="slide active">
            <img src="assets/images/login/baby_shower.jpg" alt="Baby Shower" class="slide">
            <img src="assets/images/login/birthday.jpg" alt="Birthday Event" class="slide">
            <img src="assets/images/login/anniversary.jpg" alt="Anniversary Event" class="slide">
            <img src="assets/images/login/year1.jpg" alt="New Year Celebration" class="slide">
            <img src="assets/images/login/retirement.jpg" alt="Retirement Event" class="slide">
        </section>

        <form action="login.php" method="POST">
            <h2>Login</h2>
            <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
            <input type="email" name="email" placeholder="Email" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <button type="submit">Login</button>
            <p class="login-prompt">Create New Account &nbsp<a href="register.php">Register</a></p>
            <p><a href="index.php" class="back-home">Back to Home?</a></p>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let slides = document.querySelectorAll(".slide");
            let index = 0;

            function showSlide() {
                slides.forEach((slide, i) => {
                    slide.classList.remove("active");
                    if (i === index) {
                        slide.classList.add("active");
                    }
                });

                index = (index + 1) % slides.length;
            }

            showSlide();
            setInterval(showSlide, 3000);
        });
    </script>

</body>
</html>
