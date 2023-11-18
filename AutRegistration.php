<?php
require_once "../configs/Dbconn.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $address = $_POST['address'];
    $fullNames = $_POST['fullname'];
    $biography = $_POST['biography'];
    $dateOfBirth = $_POST['date_of_birth'];
    $suspension = isset($_POST['suspension']) ? 1 : 0;

    $stmt = $DBconn->prepare("INSERT INTO authorstb (email, address, fullname, biography, date_of_birth, suspension) 
                             VALUES (:email, :address, :fullNames, :biography, :dateOfBirth, :suspension)");

    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':fullname', $fullname);
    $stmt->bindParam(':biography', $biography);
    $stmt->bindParam(':dateOfBirth', $dateOfBirth);
    $stmt->bindParam(':suspension', $suspension);


    try {
        $stmt->execute();
        echo "Registration successful. Details recorded in the database.";
    } catch (PDOException $e) {
        echo "Error recording details: " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <h2>User Registration</h2>
    <form method="post" action="">
    <label for="Author id">Author id:</label><br>
    <input type="text" name="author_id" required><br><br>

        <label>Full Names:</label>
        <input type="text" name="fullname" required><br>


        <label>Email:</label>
        <input type="email" name="email" required><br>

        <label>Address:</label>
        <input type="text" name="address" required><br>

       

        <label>Biography:</label>
        <textarea name="biography" rows="4" required></textarea><br>

        <label>Date of Birth:</label>
        <input type="date" name="date_of_birth" required><br>

        <label>Suspend Account:</label>
        <input type="checkbox" name="suspension"><br>

        <input type="submit" value="Register">
    </form>
    <link rel="stylesheet" href="css/style.css" />
</body>
</html>