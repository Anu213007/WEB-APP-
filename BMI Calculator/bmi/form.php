<?php
session_start();
if (!isset($_SESSION['userID'])) {
    header("Location: ../auth/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Calculator</title>
    <link rel="stylesheet" href="../assets/style.css"> 
</head>
<body>

    <div>
        <h2>BMI Calculator</h2>
        <form action="calculate.php" method="POST">
            <input type="text" name="name" placeholder="Name" required>
            <input type="number" name="age" placeholder="Age" required>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <input type="number" step="0.01" name="height" placeholder="Height (m)" required>
            <input type="number" step="0.01" name="weight" placeholder="Weight (kg)" required>
            <button type="submit">Calculate</button>
        </form>
    </div>
</body>
</html>
