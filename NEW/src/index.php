<?php
$servername = "db";
$username = "root";
$password = "rootpassword";
$dbname = "sqli_test";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
     
    $sql = "SELECT * FROM users WHERE name = ?"; // Gebruik een prepared statement
    if ($stmt = $conn->prepare($sql)) {          // Bereid de SQL-query voor
        $stmt->bind_param("s", $name);           // Voeg het variabel toe aan de query
        $stmt->execute();                        // Query uitvoeren
        $result = $stmt->get_result(); 

        if ($result->num_rows > 0) {
            echo "User found: <br>";
            while ($row = $result->fetch_assoc()) {
                echo "id: " . $row["id"] . " - Name: " . $row["name"] . "<br>";
            }
        } else {
            echo "No user found";
        }
        $stmt->close();
    } else {
        echo "Error preparing the query.";
    }
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vind gebruiker</title>
</head>
<body>
    <h1>Vind Gebruiker</h1>
    <form method="POST">
        <input type="text" name="name" required>
        <input type="submit" value="Search">
    </form>
</body>
</html>
