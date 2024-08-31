<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to BMI App</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="container">
    <h2 class="highlight">Welcome to the BMI Calculator App</h2>
    <?php if (isset($_SESSION['userID'])): ?>
        <p><a href="bmi/form.php" class="btn">Go to BMI Calculator</a></p>
        <p><a href="auth/logout.php" class="btn">Logout</a></p>
    <?php else: ?>
        <p><a href="auth/login.php" class="btn">Login</a> or <a href="auth/register.php" class="btn">Register</a> to use the BMI Calculator.</p>
    <?php endif; ?>
</div>

</body>
</html>
