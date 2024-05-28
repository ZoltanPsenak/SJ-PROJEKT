<?php
function addUserToDatabase($firstName, $lastName, $email, $password) {
    $conn = new mysqli("localhost", "root", "", "projekt");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO uzivatelia (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $firstName, $lastName, $email, $password);

    if ($stmt->execute() === TRUE) {
        echo "Registracia prebehla úspešne";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>
