<?php
function storeContactFormSubmission($name, $email, $subject, $message) {
    $conn = new mysqli("localhost", "root", "", "projekt");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "INSERT INTO formular (name, email, subject, message) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $name, $email, $subject, $message);
    if ($stmt->execute() === TRUE) {
        echo "Nový záznam bol úspešne vytvorený";
    } else {
        echo "Chyba: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
    $conn->close();
}
?>
