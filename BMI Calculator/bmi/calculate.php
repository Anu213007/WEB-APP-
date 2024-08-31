<?php

session_start();
include('../db.php');

if (!isset($_SESSION['userID'])) {
    header("Location: ../auth/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];

    // Calculate BMI
    $bmi = $weight / ($height * $height);

    // Save BMI User
    $stmt = $conn->prepare("INSERT INTO BMIUsers (Name, Age, Gender) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $name, $age, $gender);
    $stmt->execute();
    $bmiUserID = $stmt->insert_id;

    // Save BMI Record
    $stmt = $conn->prepare("INSERT INTO BMIRecords (BMIUserID, Height, Weight, BMI) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iddd", $bmiUserID, $height, $weight, $bmi);
    $stmt->execute();

    $bmiFormatted = number_format($bmi, 2); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BMI Result</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>

<div class="result-container">
    <p class="bmi-result">Your BMI is: <?php echo htmlspecialchars($bmiFormatted); ?></p>
    <a href="form.php" class="go-back-btn">Go Back</a>
    <a href="../auth/logout.php" class="logout-btn">Logout</a>
</div>

</body>
</html>
